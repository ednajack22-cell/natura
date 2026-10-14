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
		'natura_home_season'     => '',
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
			'natura_home_season'     => array( __( 'What\'s in season', 'natura' ), 'textarea', 'sanitize_textarea_field', __( 'What to sow or plant this month, one per line. Add a link after a vertical bar: "Garlic | /plants/garlic/". Leave empty to hide the strip.', 'natura' ) ),
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
 * "What's in season" chips from the Customizer: one per line, with an
 * optional link after a vertical bar.
 *
 * @return array<int, array{name: string, url: string}>
 */
function natura_home_season(): array {
	$items = array();
	foreach ( preg_split( '/\R/', natura_home_setting( 'natura_home_season' ) ) ?: array() as $line ) {
		$parts = array_map( 'trim', explode( '|', $line, 2 ) );
		if ( '' === $parts[0] ) {
			continue;
		}
		$url = $parts[1] ?? '';
		if ( str_starts_with( $url, '/' ) ) {
			$url = home_url( $url );
		}
		$items[] = array(
			'name' => $parts[0],
			'url'  => $url ? esc_url_raw( $url, array( 'http', 'https' ) ) : '',
		);
	}

	return array_slice( $items, 0, 8 );
}

/**
 * "Our picks": products recommended in the guides' shopping lists, with a
 * shop link, newest guides first, each product once. Products with a photo
 * come first. Nothing is invented: every pick is in a guide.
 *
 * @param int $limit Number of products.
 * @return array<int, array{name: string, badge: string, note: string, url: string, image: int, guide: int}>
 */
function natura_home_picks( int $limit = 3 ): array {
	$guides = get_posts(
		array(
			'post_type'      => array_values( array_filter( array( 'plant', 'problem', 'post' ), 'post_type_exists' ) ),
			'posts_per_page' => 30,
			'no_found_rows'  => true,
			'meta_key'       => '_natura_products', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- home page only, cached by the page cache.
		)
	);

	$picks  = array();
	$images = array();
	foreach ( $guides as $guide ) {
		foreach ( natura_field_list( 'products', $guide->ID ) as $row ) {
			$name  = trim( (string) ( $row['name'] ?? '' ) );
			$url   = (string) ( $row['url'] ?? '' );
			$image = absint( $row['image'] ?? 0 );
			$key   = strtolower( $name );
			// The same product often appears in several guides, under slightly
			// different names but with the same photo (sometimes uploaded twice,
			// as photo.jpg and photo-1.jpg): show it once.
			$photo = $image ? preg_replace( '/-\d+$/', '', (string) pathinfo( (string) get_attached_file( $image ), PATHINFO_FILENAME ) ) : '';
			if ( '' === $name || '' === $url || isset( $picks[ $key ] ) || ( $photo && isset( $images[ $photo ] ) ) ) {
				continue;
			}
			if ( $photo ) {
				$images[ $photo ] = true;
			}
			$picks[ $key ] = array(
				'name'  => $name,
				'badge' => (string) ( $row['badge'] ?? '' ),
				'note'  => (string) ( $row['note'] ?? '' ),
				'url'   => $url,
				'image' => absint( $row['image'] ?? 0 ),
				'guide' => (int) $guide->ID,
			);
		}
	}

	$picks = array_values( $picks );
	usort( $picks, static fn( array $a, array $b ): int => (int) ( $b['image'] > 0 ) <=> (int) ( $a['image'] > 0 ) );

	return array_slice( $picks, 0, $limit );
}

/**
 * Guides that have a vertical Pinterest image, newest first.
 *
 * @param int $limit Number of guides.
 * @return WP_Post[]
 */
function natura_home_pins( int $limit = 6 ): array {
	return get_posts(
		array(
			'post_type'      => array_values( array_filter( array( 'plant', 'problem', 'post' ), 'post_type_exists' ) ),
			'posts_per_page' => $limit,
			'no_found_rows'  => true,
			'meta_key'       => '_natura_pin_image', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- home page only, cached by the page cache.
		)
	);
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
