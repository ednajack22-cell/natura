<?php
/**
 * Small Spaces: one guide per kind of place where city gardeners grow food
 * (/small-spaces/, /small-spaces/{slug}/): balconies, rooftops and roof
 * terraces, patios and small yards, windowsills and indoors, vertical
 * gardens, community gardens.
 *
 * A place guide says what is particular to growing there, then sends readers
 * on: the plant guides tagged for that place (the plant_space term it is
 * linked to) are listed by the theme, and the existing guides chosen in
 * "Related guides" are linked at the end. It never repeats them.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers the place guide type.
 */
function natura_core_register_spaces(): void {
	register_post_type(
		'space',
		array(
			'labels'        => array(
				'name'               => __( 'Small Spaces', 'natura-core' ),
				'singular_name'      => __( 'Place guide', 'natura-core' ),
				'add_new'            => __( 'Add place guide', 'natura-core' ),
				'add_new_item'       => __( 'Add place guide', 'natura-core' ),
				'edit_item'          => __( 'Edit place guide', 'natura-core' ),
				'new_item'           => __( 'New place guide', 'natura-core' ),
				'view_item'          => __( 'View place guide', 'natura-core' ),
				'search_items'       => __( 'Search place guides', 'natura-core' ),
				'not_found'          => __( 'No place guides found.', 'natura-core' ),
				'all_items'          => __( 'All place guides', 'natura-core' ),
				'featured_image'     => __( 'Photo of the place', 'natura-core' ),
				'set_featured_image' => __( 'Set photo of the place', 'natura-core' ),
			),
			'public'        => true,
			'show_in_rest'  => true,
			'menu_position' => 6,
			'menu_icon'     => 'dashicons-building',
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions', 'page-attributes' ),
			'has_archive'   => 'small-spaces',
			'rewrite'       => array(
				'slug'       => 'small-spaces',
				'with_front' => false,
			),
		)
	);

	natura_core_register_list_meta( 'space', natura_core_shared_lists() );
	register_post_meta(
		'space',
		natura_core_meta_key( 'short_name' ),
		array(
			'type'              => 'string',
			'single'            => true,
			'show_in_rest'      => true,
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => 'natura_core_can_edit_meta',
		)
	);
	register_post_meta(
		'space',
		natura_core_meta_key( 'space_term' ),
		array(
			'type'          => 'string',
			'single'        => true,
			'show_in_rest'  => true,
			'auth_callback' => 'natura_core_can_edit_meta',
		)
	);
}
add_action( 'init', 'natura_core_register_spaces' );

/**
 * The guides a place guide links to, in the order chosen.
 *
 * @param int $post_id Place guide.
 * @return int[]
 */
function natura_core_space_related( int $post_id ): array {
	return array_values( array_filter( array_map( 'intval', get_post_meta( $post_id, natura_core_meta_key( 'space_related' ) ) ) ) );
}

/**
 * Replaces the guides a place guide links to.
 *
 * @param int   $post_id Place guide.
 * @param int[] $ids     Guide IDs, of any Natura type but place guides.
 */
function natura_core_set_space_related( int $post_id, array $ids ): void {
	delete_post_meta( $post_id, natura_core_meta_key( 'space_related' ) );
	$types = array( 'plant', 'problem', 'post', 'gear', 'project' );
	foreach ( array_unique( array_filter( array_map( 'absint', $ids ) ) ) as $id ) {
		if ( in_array( get_post_type( $id ), $types, true ) ) {
			add_post_meta( $post_id, natura_core_meta_key( 'space_related' ), $id );
		}
	}
}

/**
 * The plant tag ("balcony", "patio"…) a place guide lists plants from.
 *
 * @param string $raw Submitted value.
 */
function natura_core_clean_space_term( $raw ): string {
	$slug = sanitize_key( is_scalar( $raw ) ? (string) $raw : '' );

	return ( '' !== $slug && taxonomy_exists( 'plant_space' ) && term_exists( $slug, 'plant_space' ) ) ? $slug : '';
}

add_action(
	'add_meta_boxes_space',
	static function (): void {
		add_meta_box(
			'natura-space-lists',
			__( 'Shopping list, FAQ, and sources', 'natura-core' ),
			static fn( WP_Post $post ) => natura_core_render_lists( $post, natura_core_shared_lists() ),
			'space',
			'normal',
			'default'
		);

		add_meta_box(
			'natura-space-plants',
			__( 'Place guide settings', 'natura-core' ),
			static function ( WP_Post $post ): void {
				natura_core_nonce_field();
				printf(
					'<p><label for="natura-short-name"><strong>%1$s</strong></label><br><input type="text" id="natura-short-name" name="natura[short_name]" value="%2$s" class="widefat" placeholder="%3$s"></p>',
					esc_html__( 'Name in the menu', 'natura-core' ),
					esc_attr( (string) get_post_meta( $post->ID, natura_core_meta_key( 'short_name' ), true ) ),
					esc_attr__( 'e.g. Balconies', 'natura-core' )
				);
				printf( '<p><strong>%s</strong></p>', esc_html__( 'Plants listed on this page', 'natura-core' ) );
				$current = (string) get_post_meta( $post->ID, natura_core_meta_key( 'space_term' ), true );
				$terms   = taxonomy_exists( 'plant_space' ) ? get_terms(
					array(
						'taxonomy'   => 'plant_space',
						'hide_empty' => false,
					)
				) : array();
				printf( '<p class="description">%s</p>', esc_html__( 'The plant guides with this space are shown on the page, with a link to the full list.', 'natura-core' ) );
				echo '<select name="natura[space_term]" class="widefat"><option value="">' . esc_html__( '— None —', 'natura-core' ) . '</option>';
				foreach ( is_array( $terms ) ? $terms : array() as $term ) {
					printf( '<option value="%1$s"%2$s>%3$s</option>', esc_attr( $term->slug ), selected( $current, $term->slug, false ), esc_html( $term->name ) );
				}
				echo '</select>';
			},
			'space',
			'side',
			'default'
		);

		add_meta_box(
			'natura-space-related',
			__( 'Related guides', 'natura-core' ),
			static function ( WP_Post $post ): void {
				$chosen = natura_core_space_related( $post->ID );
				printf( '<p class="description">%s</p>', esc_html__( 'Existing guides this page sends readers to, shown at the end. Choose the ones about this place, not every guide.', 'natura-core' ) );
				echo '<input type="hidden" name="natura[space_related][]" value="0">';
				foreach ( array( 'post', 'problem', 'project', 'gear' ) as $type ) {
					$object = get_post_type_object( $type );
					if ( ! $object ) {
						continue;
					}
					$items = get_posts(
						array(
							'post_type'      => $type,
							'post_status'    => array( 'publish', 'future', 'draft', 'pending', 'private' ),
							'posts_per_page' => 500,
							'orderby'        => 'title',
							'order'          => 'ASC',
							'no_found_rows'  => true,
						)
					);
					$count = count( array_intersect( $chosen, wp_list_pluck( $items, 'ID' ) ) );
					printf( '<details%1$s><summary>%2$s (%3$d)</summary><ul class="natura-checklist">', $count ? ' open' : '', esc_html( $object->labels->name ), (int) $count );
					foreach ( $items as $item ) {
						printf(
							'<li><label><input type="checkbox" name="natura[space_related][]" value="%d"%s> %s</label></li>',
							(int) $item->ID,
							checked( in_array( (int) $item->ID, $chosen, true ), true, false ),
							esc_html( get_the_title( $item ) )
						);
					}
					echo '</ul></details>';
				}
			},
			'space',
			'side',
			'default'
		);
	}
);

add_action(
	'save_post_space',
	static function ( int $post_id ): void {
		$input = natura_core_submitted_fields( $post_id );
		if ( null === $input ) {
			return;
		}
		natura_core_save_lists( $post_id, natura_core_shared_lists(), $input );
		if ( array_key_exists( 'short_name', $input ) ) {
			$short = sanitize_text_field( is_scalar( $input['short_name'] ) ? (string) $input['short_name'] : '' );
			if ( '' === $short ) {
				delete_post_meta( $post_id, natura_core_meta_key( 'short_name' ) );
			} else {
				update_post_meta( $post_id, natura_core_meta_key( 'short_name' ), $short );
			}
		}
		if ( array_key_exists( 'space_term', $input ) ) {
			$term = natura_core_clean_space_term( $input['space_term'] );
			if ( '' === $term ) {
				delete_post_meta( $post_id, natura_core_meta_key( 'space_term' ) );
			} else {
				update_post_meta( $post_id, natura_core_meta_key( 'space_term' ), $term );
			}
		}
		if ( isset( $input['space_related'] ) && is_array( $input['space_related'] ) ) {
			natura_core_set_space_related( $post_id, $input['space_related'] );
		}
	}
);

/**
 * Activation: the place guide addresses.
 */
function natura_core_spaces_activate(): void {
	natura_core_register_spaces();
}
