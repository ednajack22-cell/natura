<?php
/**
 * DIY Projects: step-by-step builds (/diy-projects/, /diy-projects/{slug}/) and their
 * categories (/diy-projects/category/{term}/).
 *
 * A project has a fixed shape (design/DIY.md): difficulty, time, cost level
 * and finished size at a glance; whether we built it ourselves or adapted it
 * from a source, said plainly; what to check first on a balcony; materials
 * and tools; numbered steps with a photo and a tip each; and the plants to
 * grow in it, linked to their guides. Costs are a level, never a price.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers the project type and its categories.
 */
function natura_core_register_projects(): void {
	register_post_type(
		'project',
		array(
			'labels'        => array(
				'name'               => __( 'DIY projects', 'natura-core' ),
				'singular_name'      => __( 'DIY project', 'natura-core' ),
				'add_new'            => __( 'Add project', 'natura-core' ),
				'add_new_item'       => __( 'Add DIY project', 'natura-core' ),
				'edit_item'          => __( 'Edit DIY project', 'natura-core' ),
				'new_item'           => __( 'New DIY project', 'natura-core' ),
				'view_item'          => __( 'View DIY project', 'natura-core' ),
				'search_items'       => __( 'Search DIY projects', 'natura-core' ),
				'not_found'          => __( 'No DIY projects found.', 'natura-core' ),
				'all_items'          => __( 'All DIY projects', 'natura-core' ),
				'featured_image'     => __( 'Photo of the finished project', 'natura-core' ),
				'set_featured_image' => __( 'Set photo of the finished project', 'natura-core' ),
			),
			'public'        => true,
			'show_in_rest'  => true,
			'menu_position' => 8,
			'menu_icon'     => 'dashicons-hammer',
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'has_archive'   => 'diy-projects',
			'rewrite'       => array(
				'slug'       => 'diy-projects',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'project_category',
		'project',
		array(
			'labels'            => array(
				'name'          => __( 'Project categories', 'natura-core' ),
				'singular_name' => __( 'Project category', 'natura-core' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			// Own rules below, ahead of the project rules.
			'rewrite'           => false,
		)
	);
}
add_action( 'init', 'natura_core_register_projects' );

/**
 * Category addresses: /diy-projects/category/{term}/.
 */
function natura_core_project_rules(): void {
	add_rewrite_rule( '^diy-projects/category/([^/]+)/page/([0-9]+)/?$', 'index.php?project_category=$matches[1]&paged=$matches[2]', 'top' );
	add_rewrite_rule( '^diy-projects/category/([^/]+)/?$', 'index.php?project_category=$matches[1]', 'top' );
}
add_action( 'init', 'natura_core_project_rules' );

add_filter(
	'term_link',
	static function ( string $url, WP_Term $term ): string {
		return 'project_category' === $term->taxonomy ? home_url( '/diy-projects/category/' . $term->slug . '/' ) : $url;
	},
	10,
	2
);

/**
 * Categories every install starts with.
 *
 * @return array<string, array{name: string, description: string}>
 */
function natura_core_default_project_categories(): array {
	return array(
		'planters'        => array(
			'name'        => __( 'Planters & boxes', 'natura-core' ),
			'description' => __( 'Troughs, window boxes, and planters to build for a balcony or patio.', 'natura-core' ),
		),
		'watering'        => array(
			'name'        => __( 'Watering', 'natura-core' ),
			'description' => __( 'Self-watering pots, reservoirs, and simple irrigation for containers.', 'natura-core' ),
		),
		'supports'        => array(
			'name'        => __( 'Supports & trellis', 'natura-core' ),
			'description' => __( 'Canes, frames, and trellis for climbing crops in pots.', 'natura-core' ),
		),
		'vertical'        => array(
			'name'        => __( 'Vertical & hanging', 'natura-core' ),
			'description' => __( 'Wall planters, shelves, and hanging gardens for small spaces.', 'natura-core' ),
		),
	);
}

/**
 * Single-value fields of a project: key => label, type, choices.
 *
 * @return array<string, array{label: string, help: string, type: string, options?: array<string, string>}>
 */
function natura_core_project_facts(): array {
	return array(
		'project_method' => array(
			'label'   => __( 'Where the instructions come from', 'natura-core' ),
			'help'    => __( 'Shown to readers. Choose "Built by us" only if you made it yourself, following these steps.', 'natura-core' ),
			'type'    => 'select',
			'options' => array(
				'adapted' => __( 'Adapted from a source (cite it in Sources)', 'natura-core' ),
				'built'   => __( 'Built by us', 'natura-core' ),
			),
		),
		'difficulty'     => array(
			'label'   => __( 'Difficulty', 'natura-core' ),
			'help'    => '',
			'type'    => 'select',
			'options' => array(
				''             => __( '— Choose —', 'natura-core' ),
				'Beginner'     => __( 'Beginner', 'natura-core' ),
				'Intermediate' => __( 'Intermediate', 'natura-core' ),
				'Advanced'     => __( 'Advanced', 'natura-core' ),
			),
		),
		'time'           => array(
			'label' => __( 'Time', 'natura-core' ),
			'help'  => __( 'Example: About 1 hour, plus drying time', 'natura-core' ),
			'type'  => 'text',
		),
		'cost'           => array(
			'label'   => __( 'Cost', 'natura-core' ),
			'help'    => __( 'A level, not a price: prices change and vary by country.', 'natura-core' ),
			'type'    => 'select',
			'options' => array(
				''       => __( '— Choose —', 'natura-core' ),
				'Low'    => __( 'Low: mostly reused or cheap materials', 'natura-core' ),
				'Medium' => __( 'Medium', 'natura-core' ),
				'High'   => __( 'High', 'natura-core' ),
			),
		),
		'size'           => array(
			'label' => __( 'Finished size', 'natura-core' ),
			'help'  => __( 'Example: 24 × 8 × 8 in (60 × 20 × 20 cm)', 'natura-core' ),
			'type'  => 'text',
		),
	);
}

/**
 * The lists of a project, then the shared FAQ and sources.
 *
 * @return array<string, array{label: string, help: string, add: string, fields: array<string, array{label: string, type: string}>}>
 */
function natura_core_project_lists(): array {
	$shared = natura_core_shared_lists();

	return array(
		'checks'    => array(
			'label'  => __( 'Before you start', 'natura-core' ),
			'help'   => __( 'What to check first: weight on the balcony, where water drains, wind, sharp tools. One point per row.', 'natura-core' ),
			'add'    => __( 'Add a point', 'natura-core' ),
			'fields' => array(
				'point' => array( 'label' => __( 'Point', 'natura-core' ), 'type' => 'textarea' ),
			),
		),
		'materials' => array(
			'label'  => __( 'Materials', 'natura-core' ),
			'help'   => __( 'Everything that ends up in the project. A store link is optional (affiliate allowed): no prices.', 'natura-core' ),
			'add'    => __( 'Add a material', 'natura-core' ),
			'fields' => array(
				'name'     => array( 'label' => __( 'Material', 'natura-core' ), 'type' => 'text' ),
				'quantity' => array( 'label' => __( 'Quantity', 'natura-core' ), 'type' => 'text' ),
				'url'      => array( 'label' => __( 'Shop link (optional)', 'natura-core' ), 'type' => 'url' ),
			),
		),
		'tools'     => array(
			'label'  => __( 'Tools', 'natura-core' ),
			'help'   => '',
			'add'    => __( 'Add a tool', 'natura-core' ),
			'fields' => array(
				'name' => array( 'label' => __( 'Tool', 'natura-core' ), 'type' => 'text' ),
				'url'  => array( 'label' => __( 'Shop link (optional)', 'natura-core' ), 'type' => 'url' ),
			),
		),
		'steps'     => array(
			'label'  => __( 'Steps', 'natura-core' ),
			'help'   => __( 'In order, one action per step. A photo of the step helps more than any sentence.', 'natura-core' ),
			'add'    => __( 'Add a step', 'natura-core' ),
			'fields' => array(
				'title' => array( 'label' => __( 'Step title', 'natura-core' ), 'type' => 'text' ),
				'text'  => array( 'label' => __( 'What to do', 'natura-core' ), 'type' => 'textarea' ),
				'tip'   => array( 'label' => __( 'Tip (optional)', 'natura-core' ), 'type' => 'text' ),
				'image' => array( 'label' => __( 'Photo (optional)', 'natura-core' ), 'type' => 'image' ),
			),
		),
		'faq'       => $shared['faq'],
		'sources'   => $shared['sources'],
	);
}

add_action(
	'init',
	static function (): void {
		foreach ( array_keys( natura_core_project_facts() ) as $key ) {
			register_post_meta(
				'project',
				natura_core_meta_key( $key ),
				array(
					'type'          => 'string',
					'single'        => true,
					'show_in_rest'  => true,
					'auth_callback' => 'natura_core_can_edit_meta',
				)
			);
		}
		register_post_meta(
			'project',
			natura_core_meta_key( 'project_plant' ),
			array(
				'type'          => 'integer',
				'single'        => false,
				'show_in_rest'  => true,
				'auth_callback' => 'natura_core_can_edit_meta',
			)
		);
		natura_core_register_list_meta( 'project', natura_core_project_lists() );
	}
);

add_action(
	'add_meta_boxes_project',
	static function (): void {
		add_meta_box(
			'natura-project',
			__( 'Project: at a glance, before you start, materials, tools, steps, FAQ, and sources', 'natura-core' ),
			static function ( WP_Post $post ): void {
				natura_core_nonce_field();
				echo '<fieldset class="natura-list"><legend>' . esc_html__( 'At a glance', 'natura-core' ) . '</legend><div class="natura-facts">';
				foreach ( natura_core_project_facts() as $key => $field ) {
					$value = (string) get_post_meta( $post->ID, natura_core_meta_key( $key ), true );
					printf( '<label class="natura-list-cell"><span>%s</span>', esc_html( $field['label'] ) );
					if ( 'select' === $field['type'] ) {
						printf( '<select name="natura[%s]">', esc_attr( $key ) );
						foreach ( $field['options'] as $option => $label ) {
							printf( '<option value="%1$s"%2$s>%3$s</option>', esc_attr( $option ), selected( $value, $option, false ), esc_html( $label ) );
						}
						echo '</select>';
					} else {
						printf( '<input type="text" name="natura[%1$s]" value="%2$s">', esc_attr( $key ), esc_attr( $value ) );
					}
					if ( $field['help'] ) {
						printf( '<small class="description">%s</small>', esc_html( $field['help'] ) );
					}
					echo '</label>';
				}
				echo '</div></fieldset>';
				natura_core_render_lists( $post, natura_core_project_lists() );
			},
			'project',
			'normal',
			'high'
		);
		add_meta_box(
			'natura-project-plants',
			__( 'Plants to grow in it', 'natura-core' ),
			static function ( WP_Post $post ): void {
				natura_core_nonce_field();
				$plants = get_posts(
					array(
						'post_type'      => 'plant',
						'post_status'    => array( 'publish', 'future', 'draft', 'pending', 'private' ),
						'posts_per_page' => 500,
						'orderby'        => 'title',
						'order'          => 'ASC',
						'no_found_rows'  => true,
					)
				);
				$chosen = array_map( 'intval', get_post_meta( $post->ID, natura_core_meta_key( 'project_plant' ) ) );
				printf( '<p class="description">%s</p>', esc_html__( 'The plant guides shown at the end of the project.', 'natura-core' ) );
				echo '<input type="hidden" name="natura[project_plants][]" value="0">';
				echo '<ul class="natura-checklist">';
				foreach ( $plants as $plant ) {
					printf(
						'<li><label><input type="checkbox" name="natura[project_plants][]" value="%d"%s> %s</label></li>',
						(int) $plant->ID,
						checked( in_array( (int) $plant->ID, $chosen, true ), true, false ),
						esc_html( get_the_title( $plant ) )
					);
				}
				echo '</ul>';
			},
			'project',
			'side',
			'default'
		);
	}
);

/**
 * Replaces the plants a project suggests.
 *
 * @param int   $post_id Project ID.
 * @param int[] $ids     Plant guide IDs.
 */
function natura_core_set_project_plants( int $post_id, array $ids ): void {
	delete_post_meta( $post_id, natura_core_meta_key( 'project_plant' ) );
	foreach ( array_unique( array_filter( array_map( 'absint', $ids ) ) ) as $id ) {
		if ( 'plant' === get_post_type( $id ) ) {
			add_post_meta( $post_id, natura_core_meta_key( 'project_plant' ), $id );
		}
	}
}

add_action(
	'save_post_project',
	static function ( int $post_id ): void {
		$input = natura_core_submitted_fields( $post_id );
		if ( null === $input ) {
			return;
		}
		foreach ( natura_core_project_facts() as $key => $field ) {
			$value = isset( $input[ $key ] ) && is_scalar( $input[ $key ] ) ? sanitize_text_field( (string) $input[ $key ] ) : '';
			if ( 'select' === $field['type'] && ! array_key_exists( $value, $field['options'] ) ) {
				$value = '';
			}
			if ( 'project_method' === $key && '' === $value ) {
				$value = 'adapted';
			}
			update_post_meta( $post_id, natura_core_meta_key( $key ), $value );
		}
		natura_core_save_lists( $post_id, natura_core_project_lists(), $input );
		if ( isset( $input['project_plants'] ) && is_array( $input['project_plants'] ) ) {
			natura_core_set_project_plants( $post_id, $input['project_plants'] );
		}
	}
);

/**
 * Activation: the default categories and the category addresses.
 */
function natura_core_projects_activate(): void {
	natura_core_register_projects();
	natura_core_project_rules();
	foreach ( natura_core_default_project_categories() as $slug => $category ) {
		if ( ! term_exists( $slug, 'project_category' ) ) {
			wp_insert_term(
				$category['name'],
				'project_category',
				array(
					'slug'        => $slug,
					'description' => $category['description'],
				)
			);
		}
	}
}
