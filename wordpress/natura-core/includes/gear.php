<?php
/**
 * Gear: buying guides (/gear/, /gear/best-potting-mix-for-containers/) and their
 * categories (/gear/category/compost-feed/).
 *
 * A buying guide has a fixed shape, so every guide answers the same way
 * (design/GEAR.md): how it was put together (tested by us, or researched
 * without testing: said plainly, never implied), what to look for, the
 * picks with who each one is best for, a verdict, pros and cons and specs,
 * then the FAQ and sources. Prices are never stored: they change.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers the buying guide type and its categories.
 */
function natura_core_register_gear(): void {
	register_post_type(
		'gear',
		array(
			'labels'        => array(
				'name'               => __( 'Buying guides', 'natura-core' ),
				'singular_name'      => __( 'Buying guide', 'natura-core' ),
				'add_new'            => __( 'Add buying guide', 'natura-core' ),
				'add_new_item'       => __( 'Add buying guide', 'natura-core' ),
				'edit_item'          => __( 'Edit buying guide', 'natura-core' ),
				'new_item'           => __( 'New buying guide', 'natura-core' ),
				'view_item'          => __( 'View buying guide', 'natura-core' ),
				'search_items'       => __( 'Search buying guides', 'natura-core' ),
				'not_found'          => __( 'No buying guides found.', 'natura-core' ),
				'all_items'          => __( 'All buying guides', 'natura-core' ),
				'featured_image'     => __( 'Main photo', 'natura-core' ),
				'set_featured_image' => __( 'Set main photo', 'natura-core' ),
			),
			'public'        => true,
			'show_in_rest'  => true,
			'menu_position' => 7,
			'menu_icon'     => 'dashicons-cart',
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'has_archive'   => 'gear',
			'rewrite'       => array(
				'slug'       => 'gear',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'gear_category',
		'gear',
		array(
			'labels'            => array(
				'name'          => __( 'Gear categories', 'natura-core' ),
				'singular_name' => __( 'Gear category', 'natura-core' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			// Own rules below, ahead of the buying guide rules.
			'rewrite'           => false,
		)
	);
}
add_action( 'init', 'natura_core_register_gear' );

/**
 * Category addresses: /gear/category/{term}/.
 */
function natura_core_gear_rules(): void {
	add_rewrite_rule( '^gear/category/([^/]+)/page/([0-9]+)/?$', 'index.php?gear_category=$matches[1]&paged=$matches[2]', 'top' );
	add_rewrite_rule( '^gear/category/([^/]+)/?$', 'index.php?gear_category=$matches[1]', 'top' );
}
add_action( 'init', 'natura_core_gear_rules' );

add_filter(
	'term_link',
	static function ( string $url, WP_Term $term ): string {
		return 'gear_category' === $term->taxonomy ? home_url( '/gear/category/' . $term->slug . '/' ) : $url;
	},
	10,
	2
);

/**
 * Categories every install starts with.
 *
 * @return array<string, array{name: string, description: string}>
 */
function natura_core_default_gear_categories(): array {
	return array(
		'pots-planters'  => array(
			'name'        => __( 'Pots & planters', 'natura-core' ),
			'description' => __( 'Pots, troughs, window boxes, and grow bags for balconies, patios, and windowsills.', 'natura-core' ),
		),
		'compost-feed'   => array(
			'name'        => __( 'Compost & feed', 'natura-core' ),
			'description' => __( 'Compost, grit, and plant feed for container growing.', 'natura-core' ),
		),
		'watering'       => array(
			'name'        => __( 'Watering', 'natura-core' ),
			'description' => __( 'Watering cans, self-watering pots, and drip kits for small spaces.', 'natura-core' ),
		),
		'tools-supports' => array(
			'name'        => __( 'Tools & supports', 'natura-core' ),
			'description' => __( 'Hand tools, canes, ties, and supports sized for pots.', 'natura-core' ),
		),
	);
}

/**
 * How a guide's picks were chosen: value => label shown to readers.
 *
 * @return array<string, string>
 */
function natura_core_gear_methods(): array {
	return array(
		'researched' => __( 'Researched, not tested', 'natura-core' ),
		'tested'     => __( 'Tested by us', 'natura-core' ),
	);
}

/**
 * The lists of a buying guide: criteria and picks, then the shared FAQ and
 * sources.
 *
 * @return array<string, array{label: string, help: string, add: string, fields: array<string, array{label: string, type: string}>}>
 */
function natura_core_gear_lists(): array {
	$shared = natura_core_shared_lists();

	return array(
		'criteria' => array(
			'label'  => __( 'What to look for', 'natura-core' ),
			'help'   => __( 'The points that decide which product suits which reader, each with why it matters in a pot or a small space.', 'natura-core' ),
			'add'    => __( 'Add a point', 'natura-core' ),
			'fields' => array(
				'name' => array( 'label' => __( 'Point', 'natura-core' ), 'type' => 'text' ),
				'why'  => array( 'label' => __( 'Why it matters', 'natura-core' ), 'type' => 'textarea' ),
			),
		),
		'picks'    => array(
			'label'  => __( 'Picks', 'natura-core' ),
			'help'   => __( 'One row per product, best overall first. Write only what you checked: on the product, the maker\'s specification, or your own test. No prices: they change; the "Check price" button links to the shop.', 'natura-core' ),
			'add'    => __( 'Add a pick', 'natura-core' ),
			'fields' => array(
				'name'     => array( 'label' => __( 'Product', 'natura-core' ), 'type' => 'text' ),
				'best_for' => array( 'label' => __( 'Best for, e.g. "Best for small balconies"', 'natura-core' ), 'type' => 'text' ),
				'verdict'  => array( 'label' => __( 'Verdict (two or three sentences)', 'natura-core' ), 'type' => 'textarea' ),
				'pros'     => array( 'label' => __( 'Pros (one per line)', 'natura-core' ), 'type' => 'textarea' ),
				'cons'     => array( 'label' => __( 'Cons (one per line)', 'natura-core' ), 'type' => 'textarea' ),
				'specs'    => array( 'label' => __( 'Specs, one per line as "Label: value" (they fill the comparison table)', 'natura-core' ), 'type' => 'textarea' ),
				'url'      => array( 'label' => __( 'Shop link (affiliate link allowed)', 'natura-core' ), 'type' => 'url' ),
				'image'    => array( 'label' => __( 'Photo', 'natura-core' ), 'type' => 'image' ),
			),
		),
		'faq'      => $shared['faq'],
		'sources'  => $shared['sources'],
	);
}

add_action(
	'init',
	static function (): void {
		register_post_meta(
			'gear',
			natura_core_meta_key( 'method' ),
			array(
				'type'          => 'string',
				'single'        => true,
				'show_in_rest'  => true,
				'auth_callback' => 'natura_core_can_edit_meta',
			)
		);
		natura_core_register_list_meta( 'gear', natura_core_gear_lists() );
	}
);

add_action(
	'add_meta_boxes_gear',
	static function (): void {
		add_meta_box(
			'natura-gear',
			__( 'Buying guide: method, what to look for, picks, FAQ, and sources', 'natura-core' ),
			static function ( WP_Post $post ): void {
				natura_core_nonce_field();
				$method = (string) get_post_meta( $post->ID, natura_core_meta_key( 'method' ), true );
				echo '<fieldset class="natura-list"><legend>' . esc_html__( 'How the picks were chosen', 'natura-core' ) . '</legend>';
				printf( '<p class="description">%s</p>', esc_html__( 'Shown to readers under the title. Choose "Tested by us" only if you used every pick yourself.', 'natura-core' ) );
				foreach ( natura_core_gear_methods() as $value => $label ) {
					printf(
						'<label style="display:block;margin:.3rem 0"><input type="radio" name="natura[method]" value="%1$s"%2$s> %3$s</label>',
						esc_attr( $value ),
						checked( '' === $method ? 'researched' : $method, $value, false ),
						esc_html( $label )
					);
				}
				echo '</fieldset>';
				natura_core_render_lists( $post, natura_core_gear_lists() );
			},
			'gear',
			'normal',
			'high'
		);
	}
);

add_action(
	'save_post_gear',
	static function ( int $post_id ): void {
		$input = natura_core_submitted_fields( $post_id );
		if ( null === $input ) {
			return;
		}
		$method = isset( $input['method'] ) && is_scalar( $input['method'] ) ? sanitize_key( (string) $input['method'] ) : '';
		update_post_meta( $post_id, natura_core_meta_key( 'method' ), isset( natura_core_gear_methods()[ $method ] ) ? $method : 'researched' );
		natura_core_save_lists( $post_id, natura_core_gear_lists(), $input );
	}
);

/**
 * Activation: the default categories and the category addresses.
 */
function natura_core_gear_activate(): void {
	natura_core_register_gear();
	natura_core_gear_rules();
	foreach ( natura_core_default_gear_categories() as $slug => $category ) {
		if ( ! term_exists( $slug, 'gear_category' ) ) {
			wp_insert_term(
				$category['name'],
				'gear_category',
				array(
					'slug'        => $slug,
					'description' => $category['description'],
				)
			);
		}
	}
}
