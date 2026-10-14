<?php
/**
 * Home page settings and helpers.
 *
 * The home page is built from sections that appear only when they have
 * something to show: no empty "Latest articles" block before the first
 * article, no newsletter box without a newsletter. Settings live under
 * Appearance → Customize → Natura: home page.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * Default text for the editable parts of the home page.
 *
 * @return array<string, string>
 */
function natura_home_defaults(): array {
	return array(
		'natura_home_title'      => __( 'Grow your own food in a small space', 'natura' ),
		'natura_home_intro'      => __( 'Clear, tested advice for balconies, patios, and windowsills: what to grow, how to look after it, and what to do when something goes wrong.', 'natura' ),
		'natura_pinterest_url'   => '',
		'natura_newsletter_code' => '',
		'natura_newsletter_text' => __( 'One email a month: what to sow and plant now, and one problem to watch for. No spam, unsubscribe in one click.', 'natura' ),
	);
}

/**
 * One home page setting, or its default.
 *
 * @param string $key Setting ID.
 */
function natura_home_setting( string $key ): string {
	$defaults = natura_home_defaults();

	return (string) get_theme_mod( $key, $defaults[ $key ] ?? '' );
}

add_action(
	'customize_register',
	static function ( WP_Customize_Manager $customizer ): void {
		$customizer->add_section(
			'natura_home',
			array(
				'title'    => __( 'Natura: home page', 'natura' ),
				'priority' => 150,
			)
		);

		$defaults = natura_home_defaults();
		$fields   = array(
			'natura_home_title'      => array( __( 'Main title', 'natura' ), 'text', 'sanitize_text_field', '' ),
			'natura_home_intro'      => array( __( 'Introduction', 'natura' ), 'textarea', 'sanitize_textarea_field', '' ),
			'natura_pinterest_url'   => array( __( 'Pinterest profile address', 'natura' ), 'url', 'esc_url_raw', __( 'Shows a "Follow on Pinterest" block. Example: https://www.pinterest.com/yourname/', 'natura' ) ),
			'natura_newsletter_code' => array( __( 'Newsletter form shortcode', 'natura' ), 'text', 'sanitize_text_field', __( 'From your email plugin (MailerLite, Mailchimp for WordPress…), e.g. [mc4wp_form id="12"]. Leave empty to hide the newsletter block.', 'natura' ) ),
			'natura_newsletter_text' => array( __( 'Newsletter text', 'natura' ), 'textarea', 'sanitize_textarea_field', '' ),
		);

		foreach ( $fields as $id => list( $label, $type, $sanitize, $description ) ) {
			$customizer->add_setting(
				$id,
				array(
					'type'              => 'theme_mod',
					'default'           => $defaults[ $id ],
					'sanitize_callback' => $sanitize,
				)
			);
			$customizer->add_control(
				$id,
				array(
					'label'       => $label,
					'description' => $description,
					'section'     => 'natura_home',
					'type'        => $type,
				)
			);
		}
	}
);

/**
 * Plant types that have at least one guide, each with a photo taken from one
 * of its guides.
 *
 * @return array<int, array{term: WP_Term, image_id: int}>
 */
function natura_home_plant_types(): array {
	if ( ! taxonomy_exists( 'plant_type' ) ) {
		return array();
	}

	$terms = get_terms(
		array(
			'taxonomy'   => 'plant_type',
			'hide_empty' => true,
		)
	);
	if ( is_wp_error( $terms ) ) {
		return array();
	}

	$types = array();
	foreach ( $terms as $term ) {
		$with_photo = get_posts(
			array(
				'post_type'      => 'plant',
				'posts_per_page' => 1,
				'fields'         => 'ids',
				'no_found_rows'  => true,
				'meta_key'       => '_thumbnail_id', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- one row, home page only, cached by the page cache.
				'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
					array(
						'taxonomy' => 'plant_type',
						'terms'    => $term->term_id,
					),
				),
			)
		);

		$types[] = array(
			'term'     => $term,
			'image_id' => $with_photo ? (int) get_post_thumbnail_id( $with_photo[0] ) : 0,
		);
	}

	return $types;
}

/**
 * Meta description for the home page when no SEO plugin writes one.
 */
add_action(
	'wp_head',
	static function (): void {
		if ( ! is_front_page() || natura_seo_plugin_active() ) {
			return;
		}
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( natura_home_setting( 'natura_home_intro' ) ) );
	}
);
