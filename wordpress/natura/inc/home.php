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
 * Subjects for the "Browse by subject" tiles: plant types, then Plant Care
 * topics, each with at least one guide.
 *
 * @return array<int, array{name: string, url: string, count: string, icon: string}>
 */
function natura_home_subjects(): array {
	$subjects = array();

	if ( taxonomy_exists( 'plant_type' ) ) {
		$types = get_terms(
			array(
				'taxonomy'   => 'plant_type',
				'hide_empty' => true,
			)
		);
		foreach ( is_wp_error( $types ) ? array() : $types as $type ) {
			$subjects[] = array(
				'name'  => $type->name,
				'url'   => (string) get_term_link( $type ),
				/* translators: %d: number of guides. */
				'count' => sprintf( _n( '%d guide', '%d guides', $type->count, 'natura' ), $type->count ),
				'icon'  => 'pot',
			);
		}
	}

	foreach ( natura_topics() as $topic ) {
		$subjects[] = array(
			'name'  => $topic->name,
			'url'   => (string) get_term_link( $topic ),
			/* translators: %d: number of articles. */
			'count' => sprintf( _n( '%d article', '%d articles', $topic->count, 'natura' ), $topic->count ),
			'icon'  => 'drop',
		);
	}

	return $subjects;
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
