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

		// Cards use a 4:5 crop: tall enough to show a whole plant, and close to
		// the 2:3 format readers know from Pinterest.
		add_image_size( 'natura-card', 640, 800, true );
		// Between "large" (1024) and the original: what a phone screen needs
		// for a full-width photo, without sending the original file.
		add_image_size( 'natura-wide', 1200, 0, false );

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
 * New image sizes are saved as WebP, about a third lighter than JPEG at the
 * same quality; the original upload stays as it is (Pinterest and social
 * networks read it through the og:image tag). WordPress keeps JPEG when the
 * server cannot write WebP.
 */
add_filter(
	'image_editor_output_format',
	static function ( array $formats ): array {
		$formats['image/jpeg'] = 'image/webp';

		return $formats;
	}
);

/**
 * WordPress's emoji script and styles: every phone already draws emoji, so
 * they only cost a request on every page.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * The fonts (Newsreader for headings and reading text, Inter for the
 * interface) are self-hosted and preloaded, so the browser can start fetching
 * them before the stylesheet is parsed. No third-party request, nothing to
 * declare under GDPR.
 */
add_action(
	'wp_head',
	static function (): void {
		foreach ( array( 'newsreader-latin-opsz-normal.woff2', 'inter-latin-wght-normal.woff2' ) as $font ) {
			printf(
				'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
				esc_url( get_template_directory_uri() . '/assets/fonts/' . $font )
			);
		}
	},
	1
);

/*
 * Lists show 12 guides a page: four full rows of three on a computer, six
 * of two on a tablet. WordPress's own default (10) left one card alone on
 * the last row.
 */
add_action(
	'pre_get_posts',
	static function ( WP_Query $query ): void {
		if ( is_admin() || ! $query->is_main_query() || ! ( $query->is_archive() || $query->is_home() ) ) {
			return;
		}
		$query->set( 'posts_per_page', 12 );
	}
);
