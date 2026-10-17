<?php
/**
 * Plant guides and plant types.
 *
 * Addresses:
 *   /plants/                 every plant guide
 *   /plants/herbs/           one plant type
 *   /plants/cherry-tomato/   one plant guide
 *
 * Guides and types share the /plants/ prefix because that is how readers and
 * search engines read the site. WordPress cannot tell "/plants/herbs/" from
 * "/plants/cherry-tomato/" on its own, so each existing type gets its own
 * rule, rebuilt whenever a type is added, renamed, or deleted.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers the plant post type and the plant type taxonomy.
 */
function natura_core_register_types(): void {
	register_post_type(
		'plant',
		array(
			'labels'        => array(
				'name'               => __( 'Plants', 'natura-core' ),
				'singular_name'      => __( 'Plant', 'natura-core' ),
				'add_new'            => __( 'Add plant guide', 'natura-core' ),
				'add_new_item'       => __( 'Add plant guide', 'natura-core' ),
				'edit_item'          => __( 'Edit plant guide', 'natura-core' ),
				'new_item'           => __( 'New plant guide', 'natura-core' ),
				'view_item'          => __( 'View plant guide', 'natura-core' ),
				'search_items'       => __( 'Search plant guides', 'natura-core' ),
				'not_found'          => __( 'No plant guides found.', 'natura-core' ),
				'all_items'          => __( 'All plant guides', 'natura-core' ),
				'featured_image'     => __( 'Main photo', 'natura-core' ),
				'set_featured_image' => __( 'Set main photo', 'natura-core' ),
			),
			'public'        => true,
			'show_in_rest'  => true,
			'menu_position' => 5,
			'menu_icon'     => 'dashicons-carrot',
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'has_archive'   => 'plants',
			'rewrite'       => array(
				'slug'       => 'plants',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'plant_type',
		'plant',
		array(
			'labels'            => array(
				'name'          => __( 'Plant types', 'natura-core' ),
				'singular_name' => __( 'Plant type', 'natura-core' ),
				'add_new_item'  => __( 'Add plant type', 'natura-core' ),
				'edit_item'     => __( 'Edit plant type', 'natura-core' ),
				'all_items'     => __( 'All plant types', 'natura-core' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			// Addresses come from natura_core_plant_type_rules() instead.
			'rewrite'           => false,
			'query_var'         => 'plant_type',
		)
	);
}
add_action( 'init', 'natura_core_register_types' );

/**
 * One rewrite rule per plant type, so /plants/herbs/ lists herbs while
 * /plants/cherry-tomato/ still opens a guide.
 */
function natura_core_plant_type_rules(): void {
	$slugs = get_terms(
		array(
			'taxonomy'   => 'plant_type',
			'hide_empty' => false,
			'fields'     => 'slugs',
		)
	);

	if ( is_wp_error( $slugs ) || ! $slugs ) {
		return;
	}

	$pattern = implode( '|', array_map( 'preg_quote', $slugs ) );
	add_rewrite_rule( '^plants/(' . $pattern . ')/page/([0-9]+)/?$', 'index.php?plant_type=$matches[1]&paged=$matches[2]', 'top' );
	add_rewrite_rule( '^plants/(' . $pattern . ')/?$', 'index.php?plant_type=$matches[1]', 'top' );
}
add_action( 'init', 'natura_core_plant_type_rules', 20 );

/**
 * Links to plant types use the same addresses.
 *
 * @param string  $url  Default term link.
 * @param WP_Term $term Term.
 */
function natura_core_plant_type_link( string $url, WP_Term $term ): string {
	return 'plant_type' === $term->taxonomy ? home_url( '/plants/' . $term->slug . '/' ) : $url;
}
add_filter( 'term_link', 'natura_core_plant_type_link', 10, 2 );

/**
 * Asks for the rules to be rebuilt after a plant type changes. The rebuild runs
 * on the next request, once the new term list is in place.
 */
function natura_core_request_rewrite_flush(): void {
	update_option( 'natura_core_flush_rewrite', 1, false );
}
add_action( 'created_plant_type', 'natura_core_request_rewrite_flush' );
add_action( 'edited_plant_type', 'natura_core_request_rewrite_flush' );
add_action( 'delete_plant_type', 'natura_core_request_rewrite_flush' );

add_action(
	'init',
	static function (): void {
		if ( get_option( 'natura_core_flush_rewrite' ) ) {
			delete_option( 'natura_core_flush_rewrite' );
			flush_rewrite_rules( false );
		}
	},
	99
);

/**
 * Plant types every install starts with. They match the main menu.
 *
 * @return array<string, array{name: string, description: string}>
 */
function natura_core_default_plant_types(): array {
	return array(
		'vegetables' => array(
			'name'        => __( 'Vegetables', 'natura-core' ),
			'description' => __( 'Tomatoes, peppers, salads, beans, and other crops that grow well in containers.', 'natura-core' ),
		),
		'herbs'      => array(
			'name'        => __( 'Herbs', 'natura-core' ),
			'description' => __( 'Kitchen herbs for balconies, patios, and sunny windowsills.', 'natura-core' ),
		),
		'fruit'      => array(
			'name'        => __( 'Fruit', 'natura-core' ),
			'description' => __( 'Strawberries and compact fruit that crop in pots.', 'natura-core' ),
		),
	);
}

/**
 * Activation: register everything, add the default plant types and Plant
 * Care topics, rebuild rules.
 */
function natura_core_activate(): void {
	natura_core_register_types();

	foreach ( natura_core_default_plant_types() as $slug => $type ) {
		if ( ! term_exists( $slug, 'plant_type' ) ) {
			wp_insert_term(
				$type['name'],
				'plant_type',
				array(
					'slug'        => $slug,
					'description' => $type['description'],
				)
			);
		}
	}

	natura_core_plant_care_activate();
	natura_core_plant_data_activate();
	natura_core_plant_type_rules();
	flush_rewrite_rules( false );
}
