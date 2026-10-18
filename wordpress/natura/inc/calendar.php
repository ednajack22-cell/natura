<?php
/**
 * Planting calendar pages and growing-condition lists.
 *
 *   /calendar/            the year: every plant, twelve months
 *   /calendar/october/    what to sow, plant out, and harvest in pots
 *   /plants/sun/…/        plants by light (archive-plant.php)
 *   /plants/space/…/      plants by growing space (archive-plant.php)
 *
 * The addresses and the data come from Natura Core; this file only presents
 * them. From the review of RHS, Gardeners' World, Promesse de Fleurs, the Old
 * Farmer's Almanac and others (design/CALENDAR.md): a month strip at the top,
 * the work grouped by action, each plant with the two facts a pot grower
 * checks (light and pot size), and a link to the full guide.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * Pages with fewer plants than this are kept out of search engines until
 * they are worth a visit (AGENTS.md).
 */
const NATURA_MIN_INDEXED_PLANTS = 6;

/**
 * Whether the current page is a calendar page.
 */
function natura_is_calendar(): bool {
	return function_exists( 'natura_core_is_calendar' ) && natura_core_is_calendar();
}

/**
 * The calendar activities, with the headings used on a month page.
 *
 * @return array<string, array{label: string, heading: string, icon: string}>
 */
function natura_calendar_activities(): array {
	return array(
		'sow'     => array(
			'label'   => __( 'Sow', 'natura' ),
			/* translators: %s: month name. */
			'heading' => __( 'Sow in %s', 'natura' ),
			'icon'    => 'leaf',
		),
		'plant'   => array(
			'label'   => __( 'Plant out', 'natura' ),
			/* translators: %s: month name. */
			'heading' => __( 'Plant out in %s', 'natura' ),
			'icon'    => 'pot',
		),
		'harvest' => array(
			'label'   => __( 'Harvest', 'natura' ),
			/* translators: %s: month name. */
			'heading' => __( 'Harvest in %s', 'natura' ),
			'icon'    => 'basket',
		),
	);
}

/**
 * A month's name in the site's language.
 *
 * @param int    $month  Month, 1–12.
 * @param string $format F (October) or M (Oct).
 */
function natura_month_name( int $month, string $format = 'F' ): string {
	return wp_date( $format, mktime( 12, 0, 0, $month, 15, 2026 ) );
}

/**
 * What a month page lists: for each activity, the plant guide IDs.
 *
 * @param int $month Month, 1–12.
 * @return array{groups: array<string, int[]>, plants: int[]}
 */
function natura_calendar_month( int $month ): array {
	static $cache = array();
	if ( isset( $cache[ $month ] ) ) {
		return $cache[ $month ];
	}

	$groups = array();
	if ( function_exists( 'natura_core_plants_in_month' ) ) {
		foreach ( array_keys( natura_calendar_activities() ) as $activity ) {
			$ids = natura_core_plants_in_month( $month, $activity );
			if ( $ids ) {
				$groups[ $activity ] = $ids;
			}
		}
	}

	$cache[ $month ] = array(
		'groups' => $groups,
		'plants' => array_values( array_unique( array_merge( array(), ...array_values( $groups ) ) ) ),
	);

	return $cache[ $month ];
}

/**
 * Every plant guide with a planting calendar, sorted by name, with its months.
 *
 * @return array<int, array<string, int[]>> Plant ID => activity => months.
 */
function natura_calendar_year(): array {
	static $year = null;
	if ( null !== $year ) {
		return $year;
	}

	$year = array();
	if ( ! function_exists( 'natura_core_plant_months' ) ) {
		return $year;
	}
	$ids = get_posts(
		array(
			'post_type'      => 'plant',
			'posts_per_page' => 200,
			'fields'         => 'ids',
			'no_found_rows'  => true,
			'orderby'        => 'title',
			'order'          => 'ASC',
		)
	);
	foreach ( $ids as $id ) {
		$row = array();
		foreach ( array_keys( natura_calendar_activities() ) as $activity ) {
			$row[ $activity ] = natura_core_plant_months( (int) $id, $activity );
		}
		if ( array_filter( $row ) ) {
			$year[ (int) $id ] = $row;
		}
	}
	uksort( $year, static fn( int $a, int $b ): int => strcasecmp( natura_plant_short_name( $a ), natura_plant_short_name( $b ) ) );

	return $year;
}

/**
 * The climate note shown with every calendar.
 */
function natura_calendar_climate_note(): string {
	return natura_home_setting( 'natura_calendar_climate' );
}

/**
 * The jobs for pots set for a month in Natura Options, one per line.
 *
 * @param int $month Month, 1–12.
 * @return string[]
 */
function natura_calendar_jobs( int $month ): array {
	return array_values( array_filter( array_map( 'trim', preg_split( '/\R/', natura_home_setting( 'natura_calendar_jobs_' . $month ) ) ?: array() ) ) );
}

/**
 * The calendar's title on the month page and in the browser tab.
 *
 * @param int $month Month, 1–12, or 0 for the year.
 */
function natura_calendar_title( int $month ): string {
	if ( ! $month ) {
		return __( 'Planting calendar for pots (UK)', 'natura' );
	}

	/* translators: %s: month name. */
	return sprintf( __( 'What to sow, plant and harvest in pots in %s (UK)', 'natura' ), natura_month_name( $month ) );
}

/**
 * The page's description for Google and Pinterest, from what it lists.
 *
 * @param int $month Month, 1–12, or 0 for the year.
 */
function natura_calendar_description( int $month ): string {
	if ( ! $month ) {
		return natura_home_setting( 'natura_calendar_intro' );
	}

	$data  = natura_calendar_month( $month );
	$names = array_map( 'natura_plant_short_name', array_slice( $data['plants'], 0, 4 ) );
	if ( ! $names ) {
		/* translators: %s: month name. */
		return sprintf( __( 'What to sow, plant out, and harvest in pots on a balcony, patio, or windowsill in %s, for the UK.', 'natura' ), natura_month_name( $month ) );
	}

	/* translators: 1: month name, 2: plant names, e.g. "Basil, Cherry tomato". */
	return sprintf( __( 'Your pots in %1$s in the UK: what to sow, plant out, and harvest, including %2$s. Each plant links to its full growing guide.', 'natura' ), natura_month_name( $month ), implode( ', ', $names ) );
}

/**
 * The breadcrumb trail of a calendar page.
 *
 * @param int $month Month, 1–12, or 0 for the year.
 * @return array<int, array{name: string, url: string}>
 */
function natura_calendar_breadcrumbs( int $month ): array {
	$trail = array(
		natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
		natura_crumb( __( 'Planting calendar', 'natura' ), natura_core_calendar_url() ),
	);
	if ( $month ) {
		$trail[] = natura_crumb( natura_month_name( $month ), natura_core_calendar_url( $month ) );
	}

	return $trail;
}

/**
 * Whether a list page has too few plants to be worth a search result.
 */
function natura_list_is_thin(): bool {
	if ( natura_is_calendar() ) {
		$month = natura_core_calendar_month();
		$count = $month ? count( natura_calendar_month( $month )['plants'] ) : count( natura_calendar_year() );

		return $count < NATURA_MIN_INDEXED_PLANTS;
	}

	if ( is_tax( array( 'plant_sun', 'plant_space' ) ) ) {
		$term = get_queried_object();

		return ! $term instanceof WP_Term || $term->count < NATURA_MIN_INDEXED_PLANTS;
	}

	return false;
}

add_filter(
	'template_include',
	static function ( string $template ): string {
		return natura_is_calendar() ? ( locate_template( 'calendar.php' ) ?: $template ) : $template;
	}
);

add_filter(
	'document_title_parts',
	static function ( array $parts ): array {
		if ( natura_is_calendar() ) {
			$parts['title'] = natura_calendar_title( natura_core_calendar_month() );
		} elseif ( is_tax( array( 'plant_sun', 'plant_space' ) ) ) {
			$parts['title'] = natura_condition_title( get_queried_object() );
		}
		return $parts;
	}
);

/*
 * Thin lists stay out of search results but their links are still followed,
 * so the guides they list are found.
 */
add_filter(
	'wp_robots',
	static function ( array $robots ): array {
		if ( natura_list_is_thin() ) {
			$robots['noindex'] = true;
			$robots['follow']  = true;
		}
		return $robots;
	}
);

add_action(
	'wp_head',
	static function (): void {
		if ( ! natura_is_calendar() || natura_seo_plugin_active() ) {
			return;
		}
		$month = natura_core_calendar_month();
		printf( '<link rel="canonical" href="%s">' . "\n", esc_url( natura_core_calendar_url( $month ) ) );
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( wp_strip_all_tags( natura_calendar_description( $month ) ) ) );
	}
);

/**
 * Structured data of a calendar page: the breadcrumb, and the guides it lists
 * as an ItemList, in the order they appear.
 *
 * @param int   $month Month, 1–12, or 0 for the year.
 * @param int[] $ids   Plant guides listed.
 */
function natura_calendar_structured_data( int $month, array $ids ): string {
	if ( natura_seo_plugin_active() ) {
		return '';
	}
	$graph = array( natura_breadcrumb_data( natura_calendar_breadcrumbs( $month ) ) );
	if ( $ids ) {
		$graph[] = array(
			'@type'           => 'ItemList',
			'name'            => natura_calendar_title( $month ),
			'itemListElement' => array_map(
				static fn( int $id, int $i ): array => array(
					'@type'    => 'ListItem',
					'position' => $i + 1,
					'url'      => (string) get_permalink( $id ),
					'name'     => natura_plant_short_name( $id ),
				),
				array_values( $ids ),
				array_keys( array_values( $ids ) )
			),
		);
	}

	return natura_json_ld( $graph );
}

/**
 * Prints the month strip: the year page, then twelve months. Scrolls sideways
 * on phones, with the month shown scrolled into view.
 *
 * @param int $current Month shown, 0 on the year page.
 */
function natura_the_month_strip( int $current ): void {
	if ( ! natura_section_enabled( 'calendar_months_nav' ) ) {
		return;
	}
	$today = (int) wp_date( 'n' );
	?>
	<nav class="month-strip" aria-label="<?php esc_attr_e( 'Months', 'natura' ); ?>">
		<ul>
			<li><a href="<?php echo esc_url( natura_core_calendar_url() ); ?>"<?php echo $current ? '' : ' aria-current="page"'; ?>><?php esc_html_e( 'Year', 'natura' ); ?></a></li>
			<?php for ( $m = 1; $m <= 12; $m++ ) : ?>
				<li>
					<a href="<?php echo esc_url( natura_core_calendar_url( $m ) ); ?>"<?php echo $m === $current ? ' aria-current="page"' : ''; ?><?php echo $m === $today ? ' class="is-today"' : ''; ?>>
						<abbr title="<?php echo esc_attr( natura_month_name( $m ) ); ?>"><?php echo esc_html( natura_month_name( $m, 'M' ) ); ?></abbr>
						<?php if ( $m === $today ) : ?>
							<span class="screen-reader-text"><?php esc_html_e( '(this month)', 'natura' ); ?></span>
						<?php endif; ?>
					</a>
				</li>
			<?php endfor; ?>
		</ul>
	</nav>
	<script>
	/* On phones the strip scrolls: bring the month shown into view, without moving the page. */
	( function () {
		var strip = document.currentScript.previousElementSibling, link = strip.querySelector( '[aria-current]' );
		if ( link && strip.scrollWidth > strip.clientWidth ) {
			strip.scrollLeft = link.offsetLeft - ( strip.clientWidth - link.offsetWidth ) / 2;
		}
	}() );
	</script>
	<?php
}

/**
 * Prints one plant on a month page: photo, short name, light and pot size.
 *
 * @param int $id Plant guide ID.
 */
function natura_the_calendar_card( int $id ): void {
	$facts = array_filter(
		array(
			'sun' => (string) natura_field( 'sun', $id ),
			'pot' => (string) natura_field( 'pot_size', $id ),
		)
	);
	?>
	<li class="cal-card">
		<a href="<?php echo esc_url( (string) get_permalink( $id ) ); ?>">
			<span class="cal-card-media">
				<?php
				if ( has_post_thumbnail( $id ) ) {
					echo get_the_post_thumbnail( $id, 'medium', array( 'alt' => '', 'loading' => 'lazy', 'sizes' => '(min-width: 1024px) 120px, 96px' ) + natura_no_pin() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- core image markup.
				} else {
					natura_the_icon( 'leaf' );
				}
				?>
			</span>
			<span class="cal-card-text">
				<span class="cal-card-name"><?php echo esc_html( natura_plant_short_name( $id ) ); ?></span>
				<?php foreach ( $facts as $icon => $fact ) : ?>
					<span class="cal-card-fact"><?php natura_the_icon( $icon ); ?><?php echo esc_html( $fact ); ?></span>
				<?php endforeach; ?>
			</span>
		</a>
	</li>
	<?php
}

/**
 * The title of a sun or space list: "Plants for full sun", "Balcony plants".
 *
 * @param mixed $term The list's term.
 */
function natura_condition_title( $term ): string {
	if ( ! $term instanceof WP_Term ) {
		return '';
	}
	if ( 'plant_sun' === $term->taxonomy ) {
		/* translators: %s: light level, e.g. "full sun". */
		return sprintf( __( 'Plants for %s in pots', 'natura' ), mb_strtolower( $term->name ) );
	}

	/* translators: %s: growing space, e.g. "Balcony". */
	return sprintf( __( '%s plants: what grows in pots', 'natura' ), $term->name );
}

/**
 * The sun and space lists, for the chips under a list's title and on plant
 * guides: taxonomy => [label, terms that list at least one plant].
 *
 * @return array<string, array{label: string, terms: WP_Term[]}>
 */
function natura_condition_groups(): array {
	$groups = array();
	foreach ( array(
		'plant_sun'   => __( 'By light', 'natura' ),
		'plant_space' => __( 'By space', 'natura' ),
	) as $taxonomy => $label ) {
		if ( ! taxonomy_exists( $taxonomy ) ) {
			continue;
		}
		$terms = get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => true,
			)
		);
		if ( ! is_wp_error( $terms ) && $terms ) {
			$groups[ $taxonomy ] = array(
				'label' => $label,
				'terms' => $terms,
			);
		}
	}

	return $groups;
}

/**
 * Prints the "By light / By space" chips under a plant list's title.
 */
function natura_the_condition_chips(): void {
	if ( ! natura_section_enabled( 'list_conditions' ) ) {
		return;
	}
	$groups = natura_condition_groups();
	if ( ! $groups ) {
		return;
	}
	$current = is_tax( array( 'plant_sun', 'plant_space' ) ) ? get_queried_object() : null;
	?>
	<div class="condition-chips">
		<?php foreach ( $groups as $group ) : ?>
			<nav aria-label="<?php echo esc_attr( $group['label'] ); ?>">
				<span class="condition-chips-label"><?php echo esc_html( $group['label'] ); ?></span>
				<?php foreach ( $group['terms'] as $term ) : ?>
					<a href="<?php echo esc_url( (string) get_term_link( $term ) ); ?>"<?php echo ( $current instanceof WP_Term && $current->term_id === $term->term_id ) ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $term->name ); ?></a>
				<?php endforeach; ?>
			</nav>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Prints "Grows well: Full sun · Balcony" on a plant guide, linking to the
 * lists of plants with the same light or space.
 */
function natura_the_plant_conditions(): void {
	if ( ! natura_section_enabled( 'guide_conditions' ) ) {
		return;
	}
	$terms = array();
	foreach ( array( 'plant_sun', 'plant_space' ) as $taxonomy ) {
		$found = taxonomy_exists( $taxonomy ) ? get_the_terms( (int) get_the_ID(), $taxonomy ) : false;
		if ( is_array( $found ) ) {
			$terms = array_merge( $terms, $found );
		}
	}
	if ( ! $terms ) {
		return;
	}
	?>
	<p class="plant-conditions">
		<span><?php esc_html_e( 'Suits', 'natura' ); ?></span>
		<?php foreach ( $terms as $term ) : ?>
			<a href="<?php echo esc_url( (string) get_term_link( $term ) ); ?>"><?php natura_the_icon( 'plant_sun' === $term->taxonomy ? 'sun' : 'pot' ); ?><?php echo esc_html( $term->name ); ?></a>
		<?php endforeach; ?>
	</p>
	<?php
}

/*
 * The core sitemap: the calendar pages worth indexing, and no thin sun or
 * space lists.
 */
add_action(
	'init',
	static function (): void {
		if ( ! function_exists( 'natura_core_calendar_url' ) || ! function_exists( 'wp_register_sitemap_provider' ) ) {
			return;
		}
		require_once get_template_directory() . '/inc/class-natura-calendar-sitemap.php';
		wp_register_sitemap_provider( 'calendar', new Natura_Calendar_Sitemap() );
	}
);

add_filter(
	'wp_sitemaps_taxonomies_query_args',
	static function ( array $args, string $taxonomy ): array {
		if ( in_array( $taxonomy, array( 'plant_sun', 'plant_space' ), true ) ) {
			$thin = get_terms(
				array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
					'fields'     => 'ids',
				)
			);
			$args['exclude'] = array_values(
				array_filter(
					is_wp_error( $thin ) ? array() : $thin,
					static fn( $id ): bool => ( get_term( (int) $id )->count ?? 0 ) < NATURA_MIN_INDEXED_PLANTS
				)
			);
		}
		return $args;
	},
	10,
	2
);
