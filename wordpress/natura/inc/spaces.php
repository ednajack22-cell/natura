<?php
/**
 * Small Spaces: the place guides (/small-spaces/ and /small-spaces/{slug}/)
 * from the natura-core plugin. A place guide gives the advice particular to
 * one place, then lists the plant guides tagged for it and the existing
 * guides chosen in its "Related guides" box.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * The breadcrumb trail of a place guide or of the Small Spaces page.
 *
 * @param bool $current Add the current place guide.
 * @return array<int, array{name: string, url: string}>
 */
function natura_space_breadcrumbs( bool $current = false ): array {
	$trail = array(
		natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
		natura_crumb( __( 'Small Spaces', 'natura' ), (string) get_post_type_archive_link( 'space' ) ),
	);
	if ( $current ) {
		$trail[] = natura_crumb( get_the_title(), (string) get_permalink() );
	}

	return $trail;
}

/**
 * The plant tag a place guide lists plants from, when it still exists.
 *
 * @param int $post_id Place guide.
 */
function natura_space_term( int $post_id ): ?WP_Term {
	$slug = (string) get_post_meta( $post_id, '_natura_space_term', true );
	if ( '' === $slug || ! taxonomy_exists( 'plant_space' ) ) {
		return null;
	}
	$term = get_term_by( 'slug', $slug, 'plant_space' );

	return $term instanceof WP_Term ? $term : null;
}

/**
 * Up to six published plant guides for a place: two of each plant type
 * (vegetables, herbs, fruit) where there are enough, then any others.
 *
 * @param WP_Term $term Plant tag.
 * @return WP_Post[]
 */
function natura_space_plants( WP_Term $term ): array {
	$base   = array(
		'post_type'      => 'plant',
		'post_status'    => 'publish',
		'orderby'        => 'title',
		'order'          => 'ASC',
		'no_found_rows'  => true,
		'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- one small query per place guide.
			array(
				'taxonomy' => 'plant_space',
				'terms'    => $term->term_id,
			),
		),
	);
	$plants = array();
	$types  = taxonomy_exists( 'plant_type' ) ? get_terms(
		array(
			'taxonomy'   => 'plant_type',
			'hide_empty' => true,
		)
	) : array();
	foreach ( is_array( $types ) ? $types : array() as $type ) {
		$args                = $base;
		$args['tax_query'][] = array(
			'taxonomy' => 'plant_type',
			'terms'    => $type->term_id,
		);
		$plants              = array_merge( $plants, get_posts( $args + array( 'posts_per_page' => 2 ) ) );
	}
	if ( count( $plants ) < 6 ) {
		$plants = array_merge(
			$plants,
			get_posts(
				$base + array(
					'posts_per_page' => 6 - count( $plants ),
					'post__not_in'   => wp_list_pluck( $plants, 'ID' ),
				)
			)
		);
	}

	return array_slice( $plants, 0, 6 );
}

/**
 * The published guides a place guide links to, in the order chosen: six at
 * most (two full rows), so the cards stay large. The others remain linked
 * from the text.
 *
 * @param int $post_id Place guide.
 * @return WP_Post[]
 */
function natura_space_related_guides( int $post_id ): array {
	$ids = function_exists( 'natura_core_space_related' ) ? natura_core_space_related( $post_id ) : array();

	return $ids ? get_posts(
		array(
			'post_type'           => array( 'plant', 'problem', 'post', 'gear', 'project' ),
			'post_status'         => 'publish',
			'post__in'            => $ids,
			'orderby'             => 'post__in',
			'posts_per_page'      => 6,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	) : array();
}

/**
 * The card template of a guide in a mixed list.
 *
 * @param WP_Post $item Guide.
 */
function natura_space_card_template( WP_Post $item ): string {
	$templates = array(
		'plant'   => 'template-parts/plant-card',
		'problem' => 'template-parts/problem-card',
		'gear'    => 'template-parts/gear-card',
		'project' => 'template-parts/project-card',
		'space'   => 'template-parts/space-card',
	);

	return $templates[ $item->post_type ] ?? 'template-parts/post-card';
}

/**
 * Prints "Plants for this place": six plant cards and a link to the full
 * list of plants with that tag.
 *
 * @param int $post_id Place guide.
 */
function natura_the_space_plants( int $post_id ): void {
	$term = natura_space_term( $post_id );
	if ( ! $term || ! natura_section_enabled( 'space_plants' ) ) {
		return;
	}
	$plants = natura_space_plants( $term );
	if ( count( $plants ) < 2 ) {
		return;
	}
	?>
	<section class="site-container guide-related space-plants" aria-labelledby="space-plants-title">
		<div class="home-head">
			<div>
				<p class="label"><?php esc_html_e( 'What to grow', 'natura' ); ?></p>
				<h2 id="space-plants-title">
					<?php
					/* translators: %s: place, e.g. "Balcony". */
					echo esc_html( sprintf( __( 'Plants that suit a %s', 'natura' ), mb_strtolower( $term->name ) ) );
					?>
				</h2>
			</div>
			<a class="text-link" href="<?php echo esc_url( (string) get_term_link( $term ) ); ?>">
				<?php
				/* translators: %s: number of plant guides. */
				echo esc_html( sprintf( _n( 'See the %s plant', 'See all %s plants', (int) $term->count, 'natura' ), number_format_i18n( (int) $term->count ) ) );
				?>
				<?php natura_the_icon( 'arrow' ); ?>
			</a>
		</div>
		<div class="plant-grid">
			<?php
			foreach ( $plants as $natura_item ) {
				setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- restored below.
				get_template_part( 'template-parts/plant-card' );
			}
			wp_reset_postdata();
			?>
		</div>
	</section>
	<?php
}

/**
 * Prints "Guides for this place": the existing guides chosen for it.
 *
 * @param int $post_id Place guide.
 */
function natura_the_space_related( int $post_id ): void {
	if ( ! natura_section_enabled( 'space_related' ) ) {
		return;
	}
	$items = natura_space_related_guides( $post_id );
	if ( count( $items ) < 2 ) {
		return;
	}
	?>
	<section class="site-container guide-related" aria-labelledby="space-related-title">
		<p class="label"><?php esc_html_e( 'Go further', 'natura' ); ?></p>
		<h2 id="space-related-title"><?php echo esc_html( natura_home_setting( 'natura_spaces_related_title' ) ); ?></h2>
		<div class="post-grid">
			<?php
			foreach ( $items as $natura_item ) {
				setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- restored below.
				get_template_part( natura_space_card_template( $natura_item ) );
			}
			wp_reset_postdata();
			?>
		</div>
	</section>
	<?php
}

/*
 * The Small Spaces page lists every place guide in the order set in
 * "Order" (Page Attributes), then by title.
 */
add_action(
	'pre_get_posts',
	static function ( WP_Query $query ): void {
		if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'space' ) ) {
			$query->set( 'posts_per_page', 24 );
			$query->set(
				'orderby',
				array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				)
			);
		}
	},
	20
);

add_filter(
	'document_title_parts',
	static function ( array $parts ): array {
		if ( is_post_type_archive( 'space' ) ) {
			$parts['title'] = __( 'Small spaces: urban gardening for balconies, rooftops, patios, and windowsills', 'natura' );
		}
		return $parts;
	}
);

add_filter(
	'natura_archive_description',
	static function ( string $text, string $type ): string {
		return 'space' === $type ? natura_home_setting( 'natura_spaces_intro' ) : $text;
	},
	10,
	2
);

/*
 * The Small Spaces page stays out of search results until it lists six place
 * guides, like the other short lists.
 */
add_filter(
	'wp_robots',
	static function ( array $robots ): array {
		if ( is_post_type_archive( 'space' ) && (int) wp_count_posts( 'space' )->publish < NATURA_MIN_INDEXED_PLANTS ) {
			$robots['noindex'] = true;
			$robots['follow']  = true;
		}
		return $robots;
	}
);
