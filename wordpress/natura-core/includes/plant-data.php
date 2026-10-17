<?php
/**
 * Structured plant data: growing conditions and the planting calendar.
 *
 * Free-text facts ("6–8 hours of direct sun") read well but cannot be listed,
 * filtered, or linked. These fields can:
 *
 *   Sun     taxonomy plant_sun    /plants/sun/full-sun/
 *   Space   taxonomy plant_space  /plants/space/balcony/
 *   Months  meta, one row per month and activity (sow, plant out, harvest),
 *           so a month's calendar is one plain meta query:
 *           /calendar/                 the year
 *           /calendar/october/         what to sow, plant out, and harvest
 *
 * Taxonomies give editors the usual checkbox panels, term pages, and sitemap
 * entries for free.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Growing-condition taxonomies: slug => labels, URL segment, default terms.
 *
 * @return array<string, array{name: string, singular: string, segment: string, terms: array<string, array{name: string, description: string}>}>
 */
function natura_core_condition_taxonomies(): array {
	return array(
		'plant_sun'   => array(
			'name'     => __( 'Sun', 'natura-core' ),
			'singular' => __( 'Sun', 'natura-core' ),
			'segment'  => 'sun',
			'terms'    => array(
				'full-sun'   => array(
					'name'        => __( 'Full sun', 'natura-core' ),
					'description' => __( 'Plants for a spot with six hours or more of direct sun a day: most fruiting vegetables and Mediterranean herbs.', 'natura-core' ),
				),
				'part-shade' => array(
					'name'        => __( 'Part shade', 'natura-core' ),
					'description' => __( 'Plants that still crop with three to six hours of direct sun a day, such as salad leaves and many herbs.', 'natura-core' ),
				),
				'shade'      => array(
					'name'        => __( 'Shade', 'natura-core' ),
					'description' => __( 'Plants that manage with less than three hours of direct sun a day, for north-facing balconies and shaded courtyards.', 'natura-core' ),
				),
			),
		),
		'plant_space' => array(
			'name'     => __( 'Growing spaces', 'natura-core' ),
			'singular' => __( 'Growing space', 'natura-core' ),
			'segment'  => 'space',
			'terms'    => array(
				'windowsill' => array(
					'name'        => __( 'Windowsill', 'natura-core' ),
					'description' => __( 'Plants small enough for a pot on a sunny windowsill, indoors or out.', 'natura-core' ),
				),
				'balcony'    => array(
					'name'        => __( 'Balcony', 'natura-core' ),
					'description' => __( 'Plants for pots and troughs on a balcony, where space, weight, and wind all count.', 'natura-core' ),
				),
				'patio'      => array(
					'name'        => __( 'Patio', 'natura-core' ),
					'description' => __( 'Plants for larger containers on a patio or terrace, with room for big pots and supports.', 'natura-core' ),
				),
			),
		),
	);
}

/**
 * Calendar activities: meta key suffix => label.
 *
 * @return array<string, string>
 */
function natura_core_month_activities(): array {
	return array(
		'sow'     => __( 'Sow', 'natura-core' ),
		'plant'   => __( 'Plant out', 'natura-core' ),
		'harvest' => __( 'Harvest', 'natura-core' ),
	);
}

/**
 * Month slugs, 1 => january.
 *
 * @return array<int, string>
 */
function natura_core_month_slugs(): array {
	return array( 1 => 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december' );
}

/**
 * Registers the condition taxonomies and the month fields.
 */
function natura_core_register_plant_data(): void {
	foreach ( natura_core_condition_taxonomies() as $taxonomy => $config ) {
		register_taxonomy(
			$taxonomy,
			'plant',
			array(
				'labels'            => array(
					'name'          => $config['name'],
					'singular_name' => $config['singular'],
				),
				'public'            => true,
				// Checkbox panel in the editor, not free tags: one spelling per condition.
				'hierarchical'      => true,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				// Own rules below, so /plants/sun/… is never read as a plant guide.
				'rewrite'           => false,
			)
		);
	}

	foreach ( array_keys( natura_core_month_activities() ) as $activity ) {
		register_post_meta(
			'plant',
			natura_core_meta_key( $activity . '_month' ),
			array(
				'type'          => 'integer',
				'single'        => false,
				'show_in_rest'  => true,
				'auth_callback' => 'natura_core_can_edit_meta',
			)
		);
	}
}
add_action( 'init', 'natura_core_register_plant_data', 5 );

/**
 * Addresses: /plants/sun/{term}/, /plants/space/{term}/, /calendar/ and
 * /calendar/{month}/. Added at the top, ahead of the plant guide rules.
 */
function natura_core_plant_data_rules(): void {
	foreach ( natura_core_condition_taxonomies() as $taxonomy => $config ) {
		$base = '^plants/' . $config['segment'] . '/([^/]+)';
		add_rewrite_rule( $base . '/page/([0-9]+)/?$', 'index.php?' . $taxonomy . '=$matches[1]&paged=$matches[2]', 'top' );
		add_rewrite_rule( $base . '/?$', 'index.php?' . $taxonomy . '=$matches[1]', 'top' );
	}

	add_rewrite_rule( '^calendar/(' . implode( '|', natura_core_month_slugs() ) . ')/?$', 'index.php?natura_section=calendar&natura_month=$matches[1]', 'top' );
	add_rewrite_rule( '^calendar/?$', 'index.php?natura_section=calendar', 'top' );
}
add_action( 'init', 'natura_core_plant_data_rules' );

add_filter(
	'term_link',
	static function ( string $url, WP_Term $term ): string {
		$taxonomies = natura_core_condition_taxonomies();

		return isset( $taxonomies[ $term->taxonomy ] )
			? home_url( '/plants/' . $taxonomies[ $term->taxonomy ]['segment'] . '/' . $term->slug . '/' )
			: $url;
	},
	10,
	2
);

add_filter(
	'query_vars',
	static function ( array $vars ): array {
		$vars[] = 'natura_month';
		return $vars;
	}
);

/**
 * Address of the calendar: the year, or one month (1–12).
 *
 * @param int $month Month number, or 0 for the year.
 */
function natura_core_calendar_url( int $month = 0 ): string {
	$slugs = natura_core_month_slugs();

	return isset( $slugs[ $month ] ) ? home_url( '/calendar/' . $slugs[ $month ] . '/' ) : home_url( '/calendar/' );
}

/**
 * Whether a query is a calendar page.
 *
 * @param WP_Query|null $query Query, the main query by default.
 */
function natura_core_is_calendar( ?WP_Query $query = null ): bool {
	$query ??= $GLOBALS['wp_query'] ?? null;

	return $query instanceof WP_Query && 'calendar' === $query->get( 'natura_section' );
}

/**
 * The month a calendar page shows, 1–12, or 0 on the year page.
 */
function natura_core_calendar_month(): int {
	$month = array_search( (string) get_query_var( 'natura_month' ), natura_core_month_slugs(), true );

	return false === $month ? 0 : (int) $month;
}

/*
 * Calendar pages build their lists with their own queries; the main query
 * only has to be cheap and must not be mistaken for the blog home.
 */
add_action(
	'parse_query',
	static function ( WP_Query $query ): void {
		if ( $query->is_main_query() && natura_core_is_calendar( $query ) ) {
			$query->is_home    = false;
			$query->is_archive = true;
			$query->set( 'post_type', 'plant' );
			$query->set( 'posts_per_page', 1 );
			$query->set( 'no_found_rows', true );
		}
	}
);

add_filter(
	'pre_handle_404',
	static function ( bool $handled, WP_Query $query ): bool {
		if ( natura_core_is_calendar( $query ) ) {
			status_header( 200 );
			return true;
		}
		return $handled;
	},
	10,
	2
);

/**
 * The published plant guides with an activity in a month, sorted by name.
 *
 * @param int    $month    Month, 1–12.
 * @param string $activity sow, plant, or harvest.
 * @return int[]
 */
function natura_core_plants_in_month( int $month, string $activity ): array {
	return array_map(
		'intval',
		get_posts(
			array(
				'post_type'      => 'plant',
				'posts_per_page' => 100,
				'fields'         => 'ids',
				'no_found_rows'  => true,
				'orderby'        => 'title',
				'order'          => 'ASC',
				'meta_key'       => natura_core_meta_key( $activity . '_month' ), // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- cached by the page cache.
				'meta_value'     => $month, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
			)
		)
	);
}

/**
 * The months set for one activity of a plant, sorted.
 *
 * @param int    $post_id  Plant ID.
 * @param string $activity sow, plant, or harvest.
 * @return int[]
 */
function natura_core_plant_months( int $post_id, string $activity ): array {
	$months = array_map( 'intval', (array) get_post_meta( $post_id, natura_core_meta_key( $activity . '_month' ) ) );
	$months = array_values( array_unique( array_filter( $months, static fn( int $m ): bool => $m >= 1 && $m <= 12 ) ) );
	sort( $months );

	return $months;
}

/**
 * Replaces the months of one activity.
 *
 * @param int    $post_id  Plant ID.
 * @param string $activity sow, plant, or harvest.
 * @param int[]  $months   Months, 1–12.
 */
function natura_core_set_plant_months( int $post_id, string $activity, array $months ): void {
	$key = natura_core_meta_key( $activity . '_month' );
	delete_post_meta( $post_id, $key );
	foreach ( array_unique( array_map( 'intval', $months ) ) as $month ) {
		if ( $month >= 1 && $month <= 12 ) {
			add_post_meta( $post_id, $key, $month );
		}
	}
}

add_action(
	'add_meta_boxes_plant',
	static function (): void {
		add_meta_box( 'natura-plant-calendar', __( 'Planting calendar', 'natura-core' ), 'natura_core_render_calendar_box', 'plant', 'normal', 'high' );
	}
);

/**
 * Prints the month grid: one row per activity, one checkbox per month.
 *
 * @param WP_Post $post Plant being edited.
 */
function natura_core_render_calendar_box( WP_Post $post ): void {
	natura_core_nonce_field();
	printf( '<p class="description">%s</p>', esc_html__( 'Tick the months for a temperate climate such as the UK or northern Europe. They fill the "This month" strip on the home page and the monthly calendar pages.', 'natura-core' ) );

	echo '<table class="natura-months"><thead><tr><th></th>';
	foreach ( natura_core_month_slugs() as $number => $slug ) {
		printf( '<th scope="col" title="%s">%s</th>', esc_attr( ucfirst( $slug ) ), esc_html( strtoupper( substr( $slug, 0, 1 ) ) ) );
	}
	echo '</tr></thead><tbody>';

	foreach ( natura_core_month_activities() as $activity => $label ) {
		$set = natura_core_plant_months( $post->ID, $activity );
		printf( '<tr><th scope="row">%s</th>', esc_html( $label ) );
		// Always submitted, so unticking every month clears the row.
		printf( '<input type="hidden" name="natura[months][%s][]" value="0">', esc_attr( $activity ) );
		foreach ( natura_core_month_slugs() as $number => $slug ) {
			printf(
				'<td><input type="checkbox" name="natura[months][%1$s][]" value="%2$d" aria-label="%3$s"%4$s></td>',
				esc_attr( $activity ),
				(int) $number,
				esc_attr( $label . ' — ' . ucfirst( $slug ) ),
				checked( in_array( $number, $set, true ), true, false )
			);
		}
		echo '</tr>';
	}
	echo '</tbody></table>';
}

/**
 * Saves the months.
 *
 * @param int $post_id Plant ID.
 */
function natura_core_save_plant_months( int $post_id ): void {
	$input = natura_core_submitted_fields( $post_id );
	if ( null === $input || ! isset( $input['months'] ) || ! is_array( $input['months'] ) ) {
		return;
	}

	foreach ( array_keys( natura_core_month_activities() ) as $activity ) {
		$rows = isset( $input['months'][ $activity ] ) && is_array( $input['months'][ $activity ] ) ? $input['months'][ $activity ] : array();
		natura_core_set_plant_months( $post_id, $activity, array_map( 'absint', $rows ) );
	}
}
add_action( 'save_post_plant', 'natura_core_save_plant_months' );

/**
 * Activation: the default sun and space terms. The addresses are rebuilt by
 * natura_core_activate().
 */
function natura_core_plant_data_activate(): void {
	natura_core_register_plant_data();
	natura_core_plant_data_rules();

	foreach ( natura_core_condition_taxonomies() as $taxonomy => $config ) {
		foreach ( $config['terms'] as $slug => $term ) {
			if ( ! term_exists( $slug, $taxonomy ) ) {
				wp_insert_term(
					$term['name'],
					$taxonomy,
					array(
						'slug'        => $slug,
						'description' => $term['description'],
					)
				);
			}
		}
	}
}
