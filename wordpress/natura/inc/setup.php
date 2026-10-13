<?php
/**
 * Theme supports, menu locations, and assets.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'after_setup_theme',
	static function (): void {
		load_theme_textdomain( 'natura', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 240,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		register_nav_menus(
			array(
				'primary' => __( 'Main menu', 'natura' ),
				'footer'  => __( 'Footer columns (top-level items become headings)', 'natura' ),
				'legal'   => __( 'Footer legal links', 'natura' ),
			)
		);
	}
);

add_action(
	'wp_enqueue_scripts',
	static function (): void {
		$theme_uri = get_template_directory_uri();

		wp_enqueue_style( 'natura-main', $theme_uri . '/assets/css/main.css', array(), NATURA_VERSION );

		wp_enqueue_script(
			'natura-navigation',
			$theme_uri . '/assets/js/navigation.js',
			array(),
			NATURA_VERSION,
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}
);

/**
 * The font is self-hosted, so the browser can start fetching it before the
 * stylesheet is parsed. No third-party request, nothing to declare under GDPR.
 */
add_action(
	'wp_head',
	static function (): void {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( get_template_directory_uri() . '/assets/fonts/inter-latin-wght-normal.woff2' )
		);
	},
	1
);
