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
		'natura_home_title'       => __( 'Grow your own food in a small space', 'natura' ),
		'natura_home_intro'       => __( 'Clear, tested advice for balconies, patios, and windowsills: what to grow, how to look after it, and what to do when something goes wrong.', 'natura' ),
		'natura_pinterest_url'    => '',
		'natura_pinterest_verify' => '',
		'natura_newsletter_code'  => '',
		'natura_newsletter_text'  => __( 'One email a month: what to sow and plant now, and one problem to watch for. No spam, unsubscribe in one click.', 'natura' ),
		'natura_home_season'      => '',
		'natura_author_name'      => '',
		'natura_author_role'      => '',
		'natura_author_bio'       => '',
		'natura_author_photo'     => '',
		'natura_author_url'       => '/about/',
		// Footer and social profiles.
		'natura_footer_text'      => __( 'Independent, source-aware gardening guidance for balconies, patios, containers, and indoor spaces.', 'natura' ),
		'natura_social_instagram' => '',
		'natura_social_youtube'   => '',
		'natura_social_facebook'  => '',
		'natura_social_tiktok'    => '',
		// Google and other search engines.
		'natura_google_verify'    => '',
		'natura_bing_verify'      => '',
		'natura_ga4_id'           => '',
		'natura_ga4_consent'      => 'eu',
		// Texts of the lists and of the 404 and search pages.
		'natura_tools_intro'      => __( 'Small tools that each answer one question about growing in pots, from your light and space to what to sow this month.', 'natura' ),
		'natura_tool_intro_plant_finder' => __( 'Answer a few questions about your light, space, and experience, and see the plant guides that suit you.', 'natura' ),
		'natura_tool_intro_guided_diagnosis' => __( 'Choose the plant and where the trouble shows, then compare what you see with the signs of each likely cause, before you spray, feed, or repot.', 'natura' ),
		'natura_tool_intro_pot_size_calculator' => __( 'Measure your pot, trough, or window box and see how much compost it holds and how many bags to buy, with the pot size each plant needs.', 'natura' ),
		'natura_calendar_intro'   => __( 'What to sow, plant out, and harvest in pots, month by month. Each plant links to its full growing guide.', 'natura' ),
		'natura_calendar_climate' => __( 'For a temperate climate such as the UK or northern Europe. In a warmer area, start a few weeks earlier; in a colder one, later.', 'natura' ),
		'natura_calendar_jobs_1' => '',
		'natura_calendar_jobs_2' => '',
		'natura_calendar_jobs_3' => '',
		'natura_calendar_jobs_4' => '',
		'natura_calendar_jobs_5' => '',
		'natura_calendar_jobs_6' => '',
		'natura_calendar_jobs_7' => '',
		'natura_calendar_jobs_8' => '',
		'natura_calendar_jobs_9' => '',
		'natura_calendar_jobs_10' => '',
		'natura_calendar_jobs_11' => '',
		'natura_calendar_jobs_12' => '',
		'natura_intro_plants'     => __( 'Growing guides for balconies, patios, and windowsills: what each plant needs, and how to get a good harvest.', 'natura' ),
		'natura_intro_problems'   => __( 'Yellow leaves, wilting, pests, and fruit that will not ripen: each guide lists the likely causes, how to tell them apart, and what to do.', 'natura' ),
		'natura_intro_plant_care' => __( 'Keep container plants healthy: find out why a plant is struggling, then learn the watering, feeding, and positioning habits that prevent it.', 'natura' ),
		'natura_404_title'        => __( 'This page has not grown yet.', 'natura' ),
		'natura_404_text'         => __( 'The link may be old, or the section is still being written. Try a search, or start from the plant guides.', 'natura' ),
		'natura_search_empty'     => __( 'No guide matches this search yet. Try a plant name (basil, tomato) or what you can see (yellow leaves).', 'natura' ),
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
			'natura_home_title'       => array( __( 'Main title', 'natura' ), 'text', 'sanitize_text_field', '' ),
			'natura_home_intro'       => array( __( 'Introduction', 'natura' ), 'textarea', 'sanitize_textarea_field', '' ),
			'natura_pinterest_url'    => array( __( 'Pinterest profile address', 'natura' ), 'url', 'esc_url_raw', __( 'Shows a "Follow on Pinterest" button on the home page and in the footer. Example: https://www.pinterest.com/yourname/', 'natura' ) ),
			'natura_pinterest_verify' => array( __( 'Pinterest site verification code', 'natura' ), 'text', 'natura_sanitize_pinterest_code', __( 'Claim your website in Pinterest (Settings → Claimed accounts → Websites → "Add HTML tag") and paste only the code from content="…". Claiming shows your profile on every pin from the site and opens the site\'s Pinterest statistics.', 'natura' ) ),
			'natura_newsletter_code'  => array( __( 'Newsletter form shortcode', 'natura' ), 'text', 'sanitize_text_field', __( 'From your email plugin (MailerLite, Mailchimp for WordPress…), e.g. [mc4wp_form id="12"]. Leave empty to hide the newsletter block.', 'natura' ) ),
			'natura_newsletter_text'  => array( __( 'Newsletter text', 'natura' ), 'textarea', 'sanitize_textarea_field', '' ),
			'natura_home_season'      => array( __( 'This month: extra items', 'natura' ), 'textarea', 'sanitize_textarea_field', __( 'The "This month" strip lists the plant guides to sow, plant out, or harvest this month by itself. Add other things to do now, one per line, with an optional link after a vertical bar: "Garlic | /plants/garlic/".', 'natura' ) ),
			'natura_author_name'      => array( __( 'Who writes Natura: name', 'natura' ), 'text', 'sanitize_text_field', __( 'The real person behind the site. The block appears once a name and a short bio are set.', 'natura' ) ),
			'natura_author_role'      => array( __( 'Who writes Natura: role', 'natura' ), 'text', 'sanitize_text_field', __( 'Example: Grows vegetables on a 4 m² balcony in Lyon since 2019', 'natura' ) ),
			'natura_author_bio'       => array( __( 'Who writes Natura: short bio', 'natura' ), 'textarea', 'sanitize_textarea_field', __( 'Two or three sentences: what you grow, where, and how you test advice. Only facts you can stand behind.', 'natura' ) ),
			'natura_author_url'       => array( __( 'Who writes Natura: link', 'natura' ), 'text', 'sanitize_text_field', __( 'Your About page, e.g. /about/', 'natura' ) ),
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

		$customizer->add_setting(
			'natura_hero_photo',
			array(
				'type'              => 'theme_mod',
				'sanitize_callback' => 'absint',
			)
		);
		$customizer->add_control(
			new WP_Customize_Media_Control(
				$customizer,
				'natura_hero_photo',
				array(
					'label'       => __( 'Opening photo', 'natura' ),
					'description' => __( 'A photo of a real balcony, patio, or windowsill garden (at least 1200 px wide), shown beside the title. Without one, the photo of the newest guide is used.', 'natura' ),
					'section'     => 'natura_home',
					'mime_type'   => 'image',
					'priority'    => 5,
				)
			)
		);

		$customizer->add_setting(
			'natura_author_photo',
			array(
				'type'              => 'theme_mod',
				'sanitize_callback' => 'absint',
			)
		);
		$customizer->add_control(
			new WP_Customize_Media_Control(
				$customizer,
				'natura_author_photo',
				array(
					'label'     => __( 'Who writes Natura: photo', 'natura' ),
					'section'   => 'natura_home',
					'mime_type' => 'image',
				)
			)
		);
	}
);

/**
 * The everyday name of a plant guide ("Cherry tomato"), or its title.
 *
 * @param int $post_id Plant guide ID.
 */
function natura_plant_short_name( int $post_id ): string {
	$name = trim( (string) natura_field( 'short_name', $post_id ) );

	return '' !== $name ? $name : get_the_title( $post_id );
}

/**
 * "This month": the plant guides to sow, plant out, and harvest in the current
 * month (from each guide's planting calendar), then the extra items set in the
 * Customizer, one per line with an optional link after a vertical bar.
 *
 * @return array{month: string, short: string, groups: array<int, array{key: string, label: string, items: array<int, array{name: string, url: string, image: int, facts: string}>}>}
 */
function natura_home_this_month(): array {
	$month  = (int) wp_date( 'n' );
	$groups = array();
	$labels = array(
		'sow'     => __( 'Sow', 'natura' ),
		'plant'   => __( 'Plant out', 'natura' ),
		'harvest' => __( 'Harvest', 'natura' ),
	);

	if ( post_type_exists( 'plant' ) ) {
		foreach ( $labels as $activity => $label ) {
			$ids = get_posts(
				array(
					'post_type'      => 'plant',
					'posts_per_page' => 8,
					'fields'         => 'ids',
					'no_found_rows'  => true,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'meta_key'       => '_natura_' . $activity . '_month', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- home page only, cached by the page cache.
					'meta_value'     => $month, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
				)
			);
			if ( $ids ) {
				$groups[] = array(
					'key'   => $activity,
					'label' => $label,
					'items' => array_map(
						static fn( int $id ): array => array(
							'name'  => natura_plant_short_name( $id ),
							'url'   => (string) get_permalink( $id ),
							'image' => (int) get_post_thumbnail_id( $id ),
							// What a reader checks before acting: light and pot size.
							'facts' => implode( ' · ', array_filter( array( (string) natura_field( 'sun', $id ), (string) natura_field( 'pot_size', $id ) ) ) ),
						),
						$ids
					),
				);
			}
		}
	}

	$extra = array();
	foreach ( preg_split( '/\R/', natura_home_setting( 'natura_home_season' ) ) ?: array() as $line ) {
		$parts = array_map( 'trim', explode( '|', $line, 2 ) );
		if ( '' === $parts[0] ) {
			continue;
		}
		$url = $parts[1] ?? '';
		if ( str_starts_with( $url, '/' ) ) {
			$url = home_url( $url );
		}
		$extra[] = array(
			'name'  => $parts[0],
			'url'   => $url ? esc_url_raw( $url, array( 'http', 'https' ) ) : '',
			'image' => 0,
			'facts' => '',
		);
	}
	if ( $extra ) {
		$groups[] = array(
			'key'   => 'also',
			'label' => __( 'Also now', 'natura' ),
			'items' => array_slice( $extra, 0, 8 ),
		);
	}

	return array(
		'month'  => wp_date( 'F' ),
		'short'  => wp_date( 'M' ),
		'groups' => $groups,
	);
}

/**
 * The "Who writes Natura" block's content, or null until a name and a bio are
 * set in the Customizer.
 *
 * @return array{name: string, role: string, bio: string, photo: int, url: string}|null
 */
function natura_home_author(): ?array {
	$name = natura_home_setting( 'natura_author_name' );
	$bio  = natura_home_setting( 'natura_author_bio' );
	if ( '' === trim( $name ) || '' === trim( $bio ) ) {
		return null;
	}

	$url = natura_home_setting( 'natura_author_url' );
	// Left at the default: the About page chosen in Natura Options → Pages, if any.
	if ( '/about/' === $url ) {
		$url = natura_page_url( 'about', '/about/' );
	}
	if ( str_starts_with( $url, '/' ) ) {
		$url = home_url( $url );
	}

	return array(
		'name'  => $name,
		'role'  => natura_home_setting( 'natura_author_role' ),
		'bio'   => $bio,
		'photo' => absint( get_theme_mod( 'natura_author_photo' ) ),
		'url'   => $url ? esc_url_raw( $url, array( 'http', 'https' ) ) : '',
	);
}

/**
 * Address of one of the site's own pages (About, Privacy…): the page chosen
 * in Natura Options → Pages, or the usual address while none is chosen.
 *
 * @param string $key      Page key: about, editorial, contact, privacy, legal, disclosure.
 * @param string $fallback Address used while no page is chosen, e.g. /about/.
 */
function natura_page_url( string $key, string $fallback ): string {
	$id = absint( get_theme_mod( 'natura_page_' . $key ) );
	if ( $id && 'publish' === get_post_status( $id ) ) {
		return (string) get_permalink( $id );
	}

	return home_url( $fallback );
}

/**
 * Profile addresses set in Natura Options, by network, Pinterest first.
 *
 * @return array<string, string>
 */
function natura_social_profiles(): array {
	return array_filter(
		array(
			'Pinterest' => natura_home_setting( 'natura_pinterest_url' ),
			'Instagram' => natura_home_setting( 'natura_social_instagram' ),
			'YouTube'   => natura_home_setting( 'natura_social_youtube' ),
			'Facebook'  => natura_home_setting( 'natura_social_facebook' ),
			'TikTok'    => natura_home_setting( 'natura_social_tiktok' ),
		)
	);
}

/**
 * Whether the newsletter shortcode can be shown: set, and its email plugin
 * active. Without the plugin, WordPress would print the shortcode as text.
 */
function natura_newsletter_ready(): bool {
	$code = trim( natura_home_setting( 'natura_newsletter_code' ) );

	return '' !== $code && preg_match( '/^\[([\w-]+)/', $code, $match ) && shortcode_exists( $match[1] );
}

/**
 * The opening photo: the one set in the Customizer, or 0.
 */
function natura_home_hero_photo(): int {
	$id = absint( get_theme_mod( 'natura_hero_photo' ) );

	return ( $id && wp_attachment_is_image( $id ) ) ? $id : 0;
}

/**
 * The topic bar under the opening photo: plant types, plant problems, then
 * the Plant Care topics, each with its number of guides. Text buttons, as on
 * GrowVeg and the RHS: the photos are kept for the guides themselves.
 *
 * @param int $limit Number of topics.
 * @return array<int, array{name: string, url: string, count: int, icon: string}>
 */
function natura_home_topics( int $limit = 8 ): array {
	$topics = array();

	if ( taxonomy_exists( 'plant_type' ) ) {
		$types = get_terms(
			array(
				'taxonomy'   => 'plant_type',
				'hide_empty' => true,
				'orderby'    => 'count',
				'order'      => 'DESC',
			)
		);
		foreach ( is_wp_error( $types ) ? array() : $types as $type ) {
			$topics[] = array(
				'name'  => $type->name,
				'url'   => (string) get_term_link( $type ),
				'count' => (int) $type->count,
				'icon'  => 'pot',
			);
		}
	}

	$problems = post_type_exists( 'problem' ) ? (int) wp_count_posts( 'problem' )->publish : 0;
	if ( $problems ) {
		$topics[] = array(
			'name'  => __( 'Plant problems', 'natura' ),
			'url'   => natura_problems_url(),
			'count' => $problems,
			'icon'  => 'lens',
		);
	}

	$icons = array(
		'watering'     => 'drop',
		'soil-feeding' => 'roots',
	);
	foreach ( natura_topics() as $topic ) {
		$topics[] = array(
			'name'  => $topic->name,
			'url'   => (string) get_term_link( $topic ),
			'count' => (int) $topic->count,
			'icon'  => $icons[ $topic->slug ] ?? 'leaf',
		);
	}

	return array_slice( $topics, 0, $limit );
}

/**
 * The small label above a guide's title on the home page: its plant type,
 * "Plant problem", or its Plant Care topic.
 *
 * @param WP_Post $guide Guide.
 */
function natura_home_kicker( WP_Post $guide ): string {
	if ( 'plant' === $guide->post_type ) {
		$types = get_the_terms( $guide, 'plant_type' );

		return is_array( $types ) && $types ? $types[0]->name : __( 'Growing guide', 'natura' );
	}
	if ( 'problem' === $guide->post_type ) {
		return __( 'Plant problem', 'natura' );
	}
	$topics = get_the_category( $guide->ID );

	return $topics ? $topics[0]->name : __( 'Plant Care', 'natura' );
}

/**
 * WebSite and Organization data for the home page, unless an SEO plugin
 * prints its own. The site search is declared so Google knows its address.
 */
function natura_home_structured_data(): string {
	if ( natura_seo_plugin_active() ) {
		return '';
	}

	$organization = array_filter(
		array(
			'@type' => 'Organization',
			'@id'   => home_url( '/#organization' ),
			'name'  => get_bloginfo( 'name' ),
			'url'   => home_url( '/' ),
			'logo'  => has_custom_logo() ? wp_get_attachment_image_url( (int) get_theme_mod( 'custom_logo' ), 'full' ) : null,
			'sameAs' => array_values( natura_social_profiles() ) ?: null,
		)
	);

	$author = natura_home_author();
	if ( $author ) {
		$organization['founder'] = array_filter(
			array(
				'@type'    => 'Person',
				'name'     => $author['name'],
				'jobTitle' => $author['role'] ?: null,
				'url'      => $author['url'] ?: null,
			)
		);
	}

	return natura_json_ld(
		array(
			array(
				'@type'           => 'WebSite',
				'@id'             => home_url( '/#website' ),
				'name'            => get_bloginfo( 'name' ),
				'url'             => home_url( '/' ),
				'description'     => natura_home_setting( 'natura_home_intro' ),
				'inLanguage'      => get_bloginfo( 'language' ),
				'publisher'       => array( '@id' => home_url( '/#organization' ) ),
				'potentialAction' => array(
					'@type'       => 'SearchAction',
					'target'      => home_url( '/?s={search_term_string}' ),
					'query-input' => 'required name=search_term_string',
				),
			),
			$organization,
		)
	);
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
 * Keeps only the code of Pinterest's verification tag, even if the whole
 * <meta> tag was pasted.
 *
 * @param string $value Pasted value.
 */
function natura_sanitize_pinterest_code( string $value ): string {
	if ( preg_match( '/content=["\']?([a-f0-9]{16,64})/i', $value, $match ) ) {
		return strtolower( $match[1] );
	}

	return preg_match( '/^[a-f0-9]{16,64}$/i', trim( $value ) ) ? strtolower( trim( $value ) ) : '';
}

/**
 * Pinterest's site verification tag, on every page (Pinterest checks the
 * home page).
 */
add_action(
	'wp_head',
	static function (): void {
		$code = natura_sanitize_pinterest_code( natura_home_setting( 'natura_pinterest_verify' ) );
		if ( $code ) {
			printf( '<meta name="p:domain_verify" content="%s">' . "\n", esc_attr( $code ) );
		}
	},
	1
);

/**
 * Meta description and Open Graph tags for the home page when no SEO plugin
 * writes them, so a pin or a share of the home page shows the opening photo,
 * the title, and the promise.
 */
add_action(
	'wp_head',
	static function (): void {
		if ( ! is_front_page() || natura_seo_plugin_active() ) {
			return;
		}
		$intro = natura_home_setting( 'natura_home_intro' );
		$photo = natura_home_hero_photo();
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $intro ) );

		$tags = array(
			'og:type'        => 'website',
			'og:title'       => get_bloginfo( 'name' ) . ' — ' . natura_home_setting( 'natura_home_title' ),
			'og:description' => $intro,
			'og:url'         => home_url( '/' ),
			'og:site_name'   => get_bloginfo( 'name' ),
			'og:image'       => $photo ? (string) wp_get_attachment_image_url( $photo, 'full' ) : '',
		);
		foreach ( $tags as $property => $content ) {
			if ( $content ) {
				printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $property ), esc_attr( $content ) );
			}
		}
	}
);
