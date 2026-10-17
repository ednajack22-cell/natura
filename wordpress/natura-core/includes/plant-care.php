<?php
/**
 * Plant Care: problem guides, articles by topic, and the section page.
 *
 * Addresses:
 *   /plant-care/                          the section: problems first, then topics
 *   /problems/                            every problem guide
 *   /problems/yellow-leaves-in-pots/      one problem guide
 *   /plant-care/watering/                 articles on one topic
 *   /how-often-to-water-container-plants/ one article
 *
 * Problems are their own post type: each has a fixed shape (likely causes,
 * how to confirm each one, what to do) that readers scan the same way every
 * time. Articles are ordinary posts, and their categories are the topics, so
 * editors use the screens WordPress already has.
 *
 * Topic addresses come from the category base, set to "plant-care" when the
 * plugin is activated on a site that has none yet. Articles keep the site's
 * own permalink structure: putting them under /plant-care/ too would collide
 * with the topic addresses.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers the problem post type.
 */
function natura_core_register_problems(): void {
	register_post_type(
		'problem',
		array(
			'labels'        => array(
				'name'               => __( 'Plant problems', 'natura-core' ),
				'singular_name'      => __( 'Problem', 'natura-core' ),
				'add_new'            => __( 'Add problem guide', 'natura-core' ),
				'add_new_item'       => __( 'Add problem guide', 'natura-core' ),
				'edit_item'          => __( 'Edit problem guide', 'natura-core' ),
				'new_item'           => __( 'New problem guide', 'natura-core' ),
				'view_item'          => __( 'View problem guide', 'natura-core' ),
				'search_items'       => __( 'Search problem guides', 'natura-core' ),
				'not_found'          => __( 'No problem guides found.', 'natura-core' ),
				'all_items'          => __( 'All problem guides', 'natura-core' ),
				'featured_image'     => __( 'Photo of the symptom', 'natura-core' ),
				'set_featured_image' => __( 'Set photo of the symptom', 'natura-core' ),
			),
			'public'        => true,
			'show_in_rest'  => true,
			'menu_position' => 6,
			'menu_icon'     => 'dashicons-sos',
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'has_archive'   => 'problems',
			'rewrite'       => array(
				'slug'       => 'problems',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'natura_core_register_problems' );

/**
 * Where a problem shows on the plant. The symptom checker asks it second,
 * after the plant, like the UC IPM diagnostic tool.
 *
 * @return array<string, string> Slug => name.
 */
function natura_core_default_problem_parts(): array {
	return array(
		'leaves'        => __( 'Leaves', 'natura-core' ),
		'flowers-fruit' => __( 'Flowers or fruit', 'natura-core' ),
		'stems'         => __( 'Stems', 'natura-core' ),
		'roots-compost' => __( 'Roots or compost', 'natura-core' ),
		'whole-plant'   => __( 'Whole plant', 'natura-core' ),
	);
}

add_action(
	'init',
	static function (): void {
		register_taxonomy(
			'problem_part',
			'problem',
			array(
				'labels'            => array(
					'name'          => __( 'Where it shows', 'natura-core' ),
					'singular_name' => __( 'Where it shows', 'natura-core' ),
				),
				// Only a question in the symptom checker: no pages of its own.
				'public'            => false,
				'show_ui'           => true,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'hierarchical'      => true,
				'rewrite'           => false,
			)
		);
	}
);

/**
 * The section page at /plant-care/. It is a single page: full lists live on
 * the problem list and the topic pages.
 */
function natura_core_plant_care_rules(): void {
	add_rewrite_rule( '^plant-care/?$', 'index.php?natura_section=plant-care', 'top' );
}
add_action( 'init', 'natura_core_plant_care_rules' );

add_filter(
	'query_vars',
	static function ( array $vars ): array {
		$vars[] = 'natura_section';
		return $vars;
	}
);

/**
 * Whether a query is the Plant Care section page.
 *
 * @param WP_Query|null $query Query, the main query by default.
 */
function natura_core_is_plant_care_section( ?WP_Query $query = null ): bool {
	$query ??= $GLOBALS['wp_query'] ?? null;

	return $query instanceof WP_Query && 'plant-care' === $query->get( 'natura_section' );
}

/*
 * The section page is not the blog home: themes and SEO plugins must not
 * mistake it for the front page. The theme builds its sections with its own
 * queries, so the main query only needs to be cheap.
 */
add_action(
	'parse_query',
	static function ( WP_Query $query ): void {
		if ( natura_core_is_plant_care_section( $query ) ) {
			$query->is_home    = false;
			$query->is_archive = true;
			$query->set( 'post_type', 'post' );
			$query->set( 'posts_per_page', 1 );
			$query->set( 'no_found_rows', true );
		}
	}
);

/*
 * The section page exists even before the first article is published.
 */
add_filter(
	'pre_handle_404',
	static function ( bool $handled, WP_Query $query ): bool {
		if ( natura_core_is_plant_care_section( $query ) ) {
			status_header( 200 );
			return true;
		}
		return $handled;
	},
	10,
	2
);

/**
 * Topics every install starts with. They match the main menu.
 *
 * @return array<string, array{name: string, description: string}>
 */
function natura_core_default_topics(): array {
	return array(
		'watering'       => array(
			'name'        => __( 'Watering', 'natura-core' ),
			'description' => __( 'How much to water container plants, how often, and how to check before you do.', 'natura-core' ),
		),
		'soil-feeding'   => array(
			'name'        => __( 'Soil & feeding', 'natura-core' ),
			'description' => __( 'Compost for pots, fertiliser, and when to repot.', 'natura-core' ),
		),
		'light-position' => array(
			'name'        => __( 'Light & position', 'natura-core' ),
			'description' => __( 'Sun, shade, wind, and where to put each pot on a balcony or patio.', 'natura-core' ),
		),
		'seasonal-care'  => array(
			'name'        => __( 'Seasonal care', 'natura-core' ),
			'description' => __( 'What changes through the year, from the last frost to winter protection.', 'natura-core' ),
		),
	);
}

/**
 * Activation: topics, the /plant-care/ category base, and the section page.
 */
function natura_core_plant_care_activate(): void {
	natura_core_register_problems();
	natura_core_plant_care_rules();

	foreach ( natura_core_default_problem_parts() as $slug => $name ) {
		if ( taxonomy_exists( 'problem_part' ) && ! term_exists( $slug, 'problem_part' ) ) {
			wp_insert_term( $name, 'problem_part', array( 'slug' => $slug ) );
		}
	}

	foreach ( natura_core_default_topics() as $slug => $topic ) {
		if ( ! term_exists( $slug, 'category' ) ) {
			wp_insert_term(
				$topic['name'],
				'category',
				array(
					'slug'        => $slug,
					'description' => $topic['description'],
				)
			);
		}
	}

	// Only on a site that still uses the default /category/ addresses.
	if ( '' === (string) get_option( 'category_base' ) ) {
		update_option( 'category_base', 'plant-care' );
		$GLOBALS['wp_rewrite']->init();
	}
}

/*
 * Problem guide fields.
 */

/**
 * The causes list: one row per likely cause, in order of likelihood.
 *
 * @return array<string, array{label: string, help: string, add: string, fields: array<string, array{label: string, type: string}>}>
 */
function natura_core_problem_lists(): array {
	return array(
		'causes' => array(
			'label'  => __( 'Likely causes', 'natura-core' ),
			'help'   => __( 'Most likely first. "What you see" is the clue that points to this cause; it becomes the symptom checker at the top of the page.', 'natura-core' ),
			'add'    => __( 'Add cause', 'natura-core' ),
			'fields' => array(
				'cause'    => array( 'label' => __( 'Cause', 'natura-core' ), 'type' => 'text' ),
				'sign'     => array( 'label' => __( 'What you see', 'natura-core' ), 'type' => 'text' ),
				'recovery' => array( 'label' => __( 'Recovery time', 'natura-core' ), 'type' => 'text' ),
				'check'    => array( 'label' => __( 'How to confirm it', 'natura-core' ), 'type' => 'textarea' ),
				'fix'      => array( 'label' => __( 'What to do', 'natura-core' ), 'type' => 'textarea' ),
			),
		),
	) + natura_core_shared_lists();
}

/**
 * Registers the problem fields: the lists, and the plant guides a problem
 * affects (one meta row per plant, so a plant page can find its problems with
 * a plain meta query).
 */
function natura_core_register_problem_meta(): void {
	natura_core_register_list_meta( 'problem', natura_core_problem_lists() );

	register_post_meta(
		'problem',
		natura_core_meta_key( 'plant' ),
		array(
			'type'          => 'integer',
			'single'        => false,
			'show_in_rest'  => true,
			'auth_callback' => 'natura_core_can_edit_meta',
		)
	);
}
add_action( 'init', 'natura_core_register_problem_meta' );

add_action(
	'add_meta_boxes_problem',
	static function (): void {
		add_meta_box(
			'natura-problem-causes',
			__( 'Causes, kit, FAQ, and sources', 'natura-core' ),
			static fn( WP_Post $post ) => natura_core_render_lists( $post, natura_core_problem_lists() ),
			'problem',
			'normal',
			'high'
		);
		add_meta_box( 'natura-problem-plants', __( 'Plants affected', 'natura-core' ), 'natura_core_render_problem_plants_box', 'problem', 'side', 'default' );
	}
);

/**
 * Prints the plant checklist.
 *
 * @param WP_Post $post Problem being edited.
 */
function natura_core_render_problem_plants_box( WP_Post $post ): void {
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
	$chosen = array_map( 'intval', get_post_meta( $post->ID, natura_core_meta_key( 'plant' ) ) );

	printf( '<p class="description">%s</p>', esc_html__( 'Each plant guide you tick links to this problem, and this problem lists them.', 'natura-core' ) );

	// Always submitted, so unticking every plant clears the list.
	echo '<input type="hidden" name="natura[plants][]" value="0">';

	if ( ! $plants ) {
		printf( '<p>%s</p>', esc_html__( 'No plant guides yet.', 'natura-core' ) );
		return;
	}

	echo '<ul class="natura-checklist">';
	foreach ( $plants as $plant ) {
		printf(
			'<li><label><input type="checkbox" name="natura[plants][]" value="%d"%s> %s</label></li>',
			(int) $plant->ID,
			checked( in_array( (int) $plant->ID, $chosen, true ), true, false ),
			esc_html( get_the_title( $plant ) )
		);
	}
	echo '</ul>';
}

/**
 * Saves the problem fields.
 *
 * @param int $post_id Problem ID.
 */
function natura_core_save_problem( int $post_id ): void {
	$input = natura_core_submitted_fields( $post_id );
	if ( null === $input ) {
		return;
	}

	natura_core_save_lists( $post_id, natura_core_problem_lists(), $input );

	if ( isset( $input['plants'] ) && is_array( $input['plants'] ) ) {
		$ids = array_unique( array_filter( array_map( 'absint', $input['plants'] ) ) );
		$ids = array_filter( $ids, static fn( int $id ): bool => 'plant' === get_post_type( $id ) );
		natura_core_set_problem_plants( $post_id, $ids );
	}
}
add_action( 'save_post_problem', 'natura_core_save_problem' );

/**
 * Replaces the plants a problem affects.
 *
 * @param int   $post_id Problem ID.
 * @param int[] $ids     Plant IDs.
 */
function natura_core_set_problem_plants( int $post_id, array $ids ): void {
	$key = natura_core_meta_key( 'plant' );
	delete_post_meta( $post_id, $key );
	foreach ( $ids as $id ) {
		add_post_meta( $post_id, $key, (int) $id );
	}
}
