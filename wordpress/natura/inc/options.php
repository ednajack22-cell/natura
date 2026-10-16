<?php
/**
 * Natura Options: the theme's settings panel (admin menu "Natura Options").
 *
 * Laid out like the option panels of premium themes (Redux-style): a dark
 * header with the theme's name and version, vertical tabs with icons, a
 * Show / Hide switch for each block of the site, Save / Reset section / Reset
 * all at the top and bottom, one sub-menu entry per tab, and Import / Export.
 * Built into the theme, with no options framework to install.
 *
 * From the review of current panels (design/THEME-OPTIONS.md): a search
 * across all settings (Redux), the last ten versions with one-click restore
 * (Newspaper), brand colours (Trellis, Kadence), a warning before leaving
 * with unsaved changes, and a typed confirmation before Reset All.
 *
 * Values are stored where the theme already reads them: texts, photos and
 * IDs as theme mods (so the Customizer's live preview keeps working on the
 * same values), Show / Hide switches in the "natura_sections" option. Every
 * block is shown by default, and also stays hidden while it has nothing to
 * show.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * The panel's tabs and their fields.
 *
 * Field types: switch (Show / Hide), text, textarea, url, media (image ID),
 * adid (AdSense ID), pincode (Pinterest verification code), color.
 *
 * @return array<string, array{title: string, icon: string, intro: string, fields: array<string, array{type: string, label: string, help?: string, placeholder?: string}>}>
 */
function natura_option_tabs(): array {
	$switch = static fn( string $label, string $help = '' ): array => array(
		'type'  => 'switch',
		'label' => $label,
		'help'  => $help,
	);

	return array(
		'dashboard'  => array(
			'title'  => __( 'Dashboard', 'natura' ),
			'icon'   => 'dashicons-dashboard',
			'intro'  => __( 'What is set up, and what is left to do before launch.', 'natura' ),
			'fields' => array(),
		),
		'general'    => array(
			'title'  => __( 'General', 'natura' ),
			'icon'   => 'dashicons-admin-generic',
			'intro'  => __( 'Logo and the parts shared by every page.', 'natura' ),
			'fields' => array(
				'custom_logo'        => array(
					'type'  => 'media',
					'label' => __( 'Logo', 'natura' ),
					'help'  => __( 'Upload your logo, or leave empty to show the site name with the leaf mark.', 'natura' ),
				),
				'site_header_search' => $switch( __( 'Search in the header', 'natura' ), __( 'The home page always has its own search instead.', 'natura' ) ),
			),
		),
		'design'     => array(
			'title'  => __( 'Colours', 'natura' ),
			'icon'   => 'dashicons-art',
			'intro'  => __( 'The two brand colours used across the site. Both carry white text (buttons, header, bands), so a colour too light to read is refused.', 'natura' ),
			'fields' => array(
				'natura_color_primary' => array(
					'type'  => 'color',
					'label' => __( 'Main colour', 'natura' ),
					'help'  => __( 'Header, footer, dark bands, main buttons. Default: forest green #1b3b2b.', 'natura' ),
				),
				'natura_color_accent'  => array(
					'type'  => 'color',
					'label' => __( 'Accent colour', 'natura' ),
					'help'  => __( 'Labels, search and "Check price" buttons, links in labels. Default: terracotta #9b441f.', 'natura' ),
				),
			),
		),
		'home'       => array(
			'title'  => __( 'Home page', 'natura' ),
			'icon'   => 'dashicons-admin-home',
			'intro'  => __( 'The opening band, and which sections the home page shows.', 'natura' ),
			'fields' => array(
				'natura_hero_photo'  => array(
					'type'  => 'media',
					'label' => __( 'Opening photo', 'natura' ),
					'help'  => __( 'A photo of a real balcony, patio, or windowsill garden, at least 1200 px wide. Without one, the photo of the newest guide is used.', 'natura' ),
				),
				'natura_home_title'  => array(
					'type'  => 'text',
					'label' => __( 'Main title', 'natura' ),
				),
				'natura_home_intro'  => array(
					'type'  => 'textarea',
					'label' => __( 'Introduction', 'natura' ),
					'help'  => __( 'Also used as the home page\'s description for Google and Pinterest.', 'natura' ),
				),
				'home_topics'        => $switch( __( 'Topic bar', 'natura' ), __( 'Buttons under the opening band: plant types, problems, care topics.', 'natura' ) ),
				'home_new'           => $switch( __( 'New on Natura', 'natura' ), __( 'The newest guide in large, and the next ones as a list.', 'natura' ) ),
				'home_month'         => $switch( __( 'In your pots this month', 'natura' ), __( 'Plants to sow, plant out, or harvest this month, from each guide\'s planting calendar.', 'natura' ) ),
				'natura_home_season' => array(
					'type'  => 'textarea',
					'label' => __( 'This month: other jobs', 'natura' ),
					'help'  => __( 'One per line, with an optional link after a vertical bar: "Garlic | /plants/garlic/".', 'natura' ),
				),
				'home_more_guides'   => $switch( __( 'More growing guides', 'natura' ) ),
				'home_problems'      => $switch( __( 'Something wrong with a plant?', 'natura' ), __( 'The dark band with the plant problem guides.', 'natura' ) ),
				'home_more_posts'    => $switch( __( 'More from Plant Care', 'natura' ) ),
			),
		),
		'author'     => array(
			'title'  => __( 'Who writes Natura', 'natura' ),
			'icon'   => 'dashicons-admin-users',
			'intro'  => __( 'The real person behind the site. Readers and Google both look for it: write only facts you can stand behind.', 'natura' ),
			'fields' => array(
				'home_author'         => $switch( __( 'Show on the home page', 'natura' ), __( 'Appears once a name and a bio are filled in.', 'natura' ) ),
				'natura_author_name'  => array(
					'type'  => 'text',
					'label' => __( 'Name', 'natura' ),
				),
				'natura_author_role'  => array(
					'type'        => 'text',
					'label'       => __( 'Role', 'natura' ),
					'placeholder' => __( 'Grows vegetables on a 4 m² balcony since 2019', 'natura' ),
				),
				'natura_author_bio'   => array(
					'type'  => 'textarea',
					'label' => __( 'Short bio', 'natura' ),
					'help'  => __( 'Two or three sentences: what you grow, where, and how you test advice.', 'natura' ),
				),
				'natura_author_photo' => array(
					'type'  => 'media',
					'label' => __( 'Photo', 'natura' ),
				),
				'natura_author_url'   => array(
					'type'        => 'text',
					'label'       => __( 'Link', 'natura' ),
					'help'        => __( 'Your About page.', 'natura' ),
					'placeholder' => '/about/',
				),
				'guide_author'        => $switch( __( 'Author box at the end of guides', 'natura' ), __( 'Uses the biographical info of each author\'s WordPress profile.', 'natura' ) ),
			),
		),
		'guides'     => array(
			'title'  => __( 'Guides', 'natura' ),
			'icon'   => 'dashicons-media-document',
			'intro'  => __( 'Plant guides, problem guides, and articles.', 'natura' ),
			'fields' => array(
				'guide_read_next'   => $switch( __( 'Read next', 'natura' ), __( 'Three guides in the side column.', 'natura' ) ),
				'guide_related'     => $switch( __( 'Related guides', 'natura' ), __( 'Common problems, plants affected, more guides: under the text.', 'natura' ) ),
				'list_problem_band' => $switch( __( 'Plant looking unwell? band', 'natura' ), __( 'Under the plant list, towards the problem guides.', 'natura' ) ),
			),
		),
		'pinterest'  => array(
			'title'  => __( 'Pinterest', 'natura' ),
			'icon'   => 'dashicons-pinterest',
			'intro'  => __( 'Your profile, your claimed website, and the Save buttons.', 'natura' ),
			'fields' => array(
				'natura_pinterest_url'    => array(
					'type'        => 'url',
					'label'       => __( 'Profile address', 'natura' ),
					'help'        => __( 'Shows the Follow buttons on the home page and in the footer.', 'natura' ),
					'placeholder' => 'https://www.pinterest.com/yourname/',
				),
				'natura_pinterest_verify' => array(
					'type'  => 'pincode',
					'label' => __( 'Site verification code', 'natura' ),
					'help'  => __( 'Pinterest → Settings → Claimed accounts → Websites → "Add HTML tag". Paste the tag or only the code. Claiming puts your profile on every pin from the site.', 'natura' ),
				),
				'home_pins'               => $switch( __( 'Save ideas for later (home page)', 'natura' ), __( 'The guides\' vertical Pinterest images.', 'natura' ) ),
				'guide_pin_header'        => $switch( __( 'Save to Pinterest button', 'natura' ), __( 'Next to the author and date, at the top of guides.', 'natura' ) ),
				'guide_pin_block'         => $switch( __( 'Save this guide block', 'natura' ), __( 'The vertical image after section 3 of guides.', 'natura' ) ),
				'guide_side_pin'          => $switch( __( 'Pinterest box in the side column', 'natura' ) ),
				'site_footer_follow'      => $switch( __( 'Follow us on Pinterest (footer)', 'natura' ) ),
			),
		),
		'affiliate'  => array(
			'title'  => __( 'Affiliate products', 'natura' ),
			'icon'   => 'dashicons-cart',
			'intro'  => __( 'Products come from each guide\'s shopping list. Hide these blocks until you have products you recommend.', 'natura' ),
			'fields' => array(
				'home_picks'     => $switch( __( 'Our picks (home page)', 'natura' ), __( 'Three products from the guides\' shopping lists, with the affiliate notice.', 'natura' ) ),
				'guide_products' => $switch( __( 'What you need (guides)', 'natura' ), __( 'The shopping list after section 2, and the affiliate notice at the top.', 'natura' ) ),
			),
		),
		'ads'        => array(
			'title'  => __( 'Ads', 'natura' ),
			'icon'   => 'dashicons-megaphone',
			'intro'  => __( 'Both IDs come from your AdSense account. Until they are set, visitors see no ads and administrators see dashed outlines. Set up Google\'s consent message before showing ads in the EU, UK, or Switzerland.', 'natura' ),
			'fields' => array(
				'natura_adsense_client'         => array(
					'type'        => 'adid',
					'label'       => __( 'Publisher ID', 'natura' ),
					'placeholder' => 'ca-pub-1234567890123456',
				),
				'natura_adsense_slot'           => array(
					'type'        => 'adid',
					'label'       => __( 'In-content ad unit ID', 'natura' ),
					'placeholder' => '1234567890',
				),
				'natura_adsense_slot_sidebar'   => array(
					'type'        => 'adid',
					'label'       => __( 'Sidebar ad unit ID (300 × 600)', 'natura' ),
					'help'        => __( 'Optional: the in-content unit is used otherwise.', 'natura' ),
					'placeholder' => '1234567890',
				),
				'natura_adsense_slot_multiplex' => array(
					'type'        => 'adid',
					'label'       => __( 'Multiplex ad unit ID', 'natura' ),
					'help'        => __( 'Optional: no ad at the end of guides otherwise.', 'natura' ),
					'placeholder' => '1234567890',
				),
				'ads_home'                      => $switch( __( 'Home page ad', 'natura' ), __( 'One ad, after the guides.', 'natura' ) ),
				'ads_guide_text'                => $switch( __( 'Ads in the text of guides', 'natura' ), __( 'After sections 1 and 5.', 'natura' ) ),
				'ads_sidebar'                   => $switch( __( 'Side column ad', 'natura' ), __( 'Wide screens only.', 'natura' ) ),
				'ads_guide_end'                 => $switch( __( 'End of guide ad (multiplex)', 'natura' ) ),
				'ads_lists'                     => $switch( __( 'Ads in lists', 'natura' ), __( 'After the first row of cards, and on the Plant Care page.', 'natura' ) ),
			),
		),
		'newsletter' => array(
			'title'  => __( 'Newsletter', 'natura' ),
			'icon'   => 'dashicons-email-alt',
			'intro'  => __( 'The "Monthly planting reminder" signup on the home page.', 'natura' ),
			'fields' => array(
				'home_newsletter'        => $switch( __( 'Show on the home page', 'natura' ), __( 'Appears once a form shortcode is set.', 'natura' ) ),
				'natura_newsletter_code' => array(
					'type'        => 'text',
					'label'       => __( 'Form shortcode', 'natura' ),
					'help'        => __( 'From your email plugin (MailerLite, Mailchimp for WordPress…).', 'natura' ),
					'placeholder' => '[mc4wp_form id="12"]',
				),
				'natura_newsletter_text' => array(
					'type'  => 'textarea',
					'label' => __( 'Text', 'natura' ),
				),
			),
		),
		'transfer'   => array(
			'title'  => __( 'Import / Export', 'natura' ),
			'icon'   => 'dashicons-update',
			'intro'  => __( 'Copy all Natura Options to another site, or keep a backup before big changes.', 'natura' ),
			'fields' => array(),
		),
	);
}

/**
 * Whether a block is shown. Blocks are shown unless hidden in Natura Options.
 *
 * @param string $key Switch key from natura_option_tabs().
 */
function natura_section_enabled( string $key ): bool {
	$saved = get_option( 'natura_sections', array() );

	return ! is_array( $saved ) || ! isset( $saved[ $key ] ) || (bool) $saved[ $key ];
}

/**
 * Every field, by key, with its tab.
 *
 * @return array<string, array{type: string, label: string, tab: string}>
 */
function natura_option_fields(): array {
	$fields = array();
	foreach ( natura_option_tabs() as $tab => $section ) {
		foreach ( $section['fields'] as $key => $field ) {
			$fields[ $key ] = $field + array( 'tab' => $tab );
		}
	}

	return $fields;
}

/**
 * Cleans one submitted value for its field type.
 *
 * @param string $type  Field type.
 * @param mixed  $value Submitted value.
 * @return mixed
 */
function natura_sanitize_option( string $type, $value ) {
	$value = is_scalar( $value ) ? (string) $value : '';
	switch ( $type ) {
		case 'switch':
			return '1' === $value;
		case 'textarea':
			return sanitize_textarea_field( $value );
		case 'url':
			return esc_url_raw( $value, array( 'http', 'https' ) );
		case 'media':
			$id = absint( $value );
			return ( $id && wp_attachment_is_image( $id ) ) ? $id : 0;
		case 'adid':
			return natura_sanitize_ad_id( $value );
		case 'pincode':
			return natura_sanitize_pinterest_code( $value );
		case 'color':
			$color = (string) sanitize_hex_color( $value );
			return ( '' !== $color && natura_contrast_with_white( $color ) >= 4.5 ) ? strtolower( $color ) : '';
		default:
			return sanitize_text_field( $value );
	}
}

/**
 * Contrast ratio between a colour and white text (WCAG 2): 4.5 or more reads
 * well at normal text sizes.
 *
 * @param string $hex Colour, #rgb or #rrggbb.
 */
function natura_contrast_with_white( string $hex ): float {
	$hex = ltrim( $hex, '#' );
	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}
	$channels = array_map(
		static function ( string $pair ): float {
			$c = hexdec( $pair ) / 255;
			return $c <= 0.03928 ? $c / 12.92 : ( ( $c + 0.055 ) / 1.055 ) ** 2.4;
		},
		str_split( $hex, 2 )
	);
	$luminance = 0.2126 * $channels[0] + 0.7152 * $channels[1] + 0.0722 * $channels[2];

	return 1.05 / ( $luminance + 0.05 );
}

/**
 * Keeps a copy of every setting before a change, the last ten.
 *
 * @param string $what What is about to change (Save, Reset…), for the list.
 */
function natura_remember_version( string $what ): void {
	$history = get_option( 'natura_options_history', array() );
	$history = is_array( $history ) ? $history : array();
	array_unshift(
		$history,
		array(
			'time'   => time(),
			'user'   => wp_get_current_user()->display_name,
			'what'   => $what,
			'values' => natura_export_options()['values'],
		)
	);
	update_option( 'natura_options_history', array_slice( $history, 0, 10 ), false );
}

/**
 * Turns exported values back into what the form would send.
 *
 * @param array<string, mixed> $values Exported values.
 * @return array<string, mixed>
 */
function natura_values_as_input( array $values ): array {
	foreach ( $values as $key => $value ) {
		if ( is_bool( $value ) ) {
			$values[ $key ] = $value ? '1' : '0';
		}
	}

	return $values;
}

/**
 * Saves values for the given fields. Switches go to the natura_sections
 * option, everything else to theme mods.
 *
 * @param array<string, array{type: string}> $fields Fields to save.
 * @param array<string, mixed>               $input  Submitted values, by key.
 */
function natura_save_options( array $fields, array $input ): void {
	$sections = get_option( 'natura_sections', array() );
	$sections = is_array( $sections ) ? $sections : array();
	foreach ( $fields as $key => $field ) {
		if ( ! array_key_exists( $key, $input ) ) {
			continue;
		}
		$value = natura_sanitize_option( $field['type'], $input[ $key ] );
		if ( 'switch' === $field['type'] ) {
			$sections[ $key ] = $value;
		} elseif ( '' === $value || 0 === $value ) {
			remove_theme_mod( $key );
		} else {
			set_theme_mod( $key, $value );
		}
	}
	update_option( 'natura_sections', $sections, true );
}

/**
 * Puts the given fields back to their defaults.
 *
 * @param array<string, array{type: string}> $fields Fields to reset.
 */
function natura_reset_options( array $fields ): void {
	$sections = get_option( 'natura_sections', array() );
	$sections = is_array( $sections ) ? $sections : array();
	foreach ( $fields as $key => $field ) {
		if ( 'switch' === $field['type'] ) {
			unset( $sections[ $key ] );
		} else {
			remove_theme_mod( $key );
		}
	}
	update_option( 'natura_sections', $sections, true );
}

/**
 * All current values, for the export.
 *
 * @return array<string, mixed>
 */
function natura_export_options(): array {
	$values = array();
	foreach ( natura_option_fields() as $key => $field ) {
		$values[ $key ] = 'switch' === $field['type'] ? natura_section_enabled( $key ) : get_theme_mod( $key, '' );
	}

	return array(
		'natura_options' => 1,
		'theme_version'  => NATURA_VERSION,
		'values'         => $values,
	);
}

/**
 * The menu: "Natura Options", with one entry per tab.
 */
add_action(
	'admin_menu',
	static function (): void {
		$tabs  = natura_option_tabs();
		$hooks = array();

		$hooks[] = add_menu_page(
			__( 'Natura Options', 'natura' ),
			__( 'Natura Options', 'natura' ),
			'edit_theme_options',
			'natura',
			'natura_render_options',
			'dashicons-carrot',
			3
		);
		foreach ( $tabs as $tab => $section ) {
			$hooks[] = add_submenu_page(
				'natura',
				$section['title'] . ' ‹ ' . __( 'Natura Options', 'natura' ),
				$section['title'],
				'edit_theme_options',
				'dashboard' === $tab ? 'natura' : 'natura-' . $tab,
				'natura_render_options'
			);
		}

		foreach ( array_filter( $hooks ) as $hook ) {
			add_action( 'admin_enqueue_scripts', static function ( string $current ) use ( $hook ): void {
				if ( $current !== $hook ) {
					return;
				}
				wp_enqueue_media();
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_style( 'natura-options', get_template_directory_uri() . '/assets/css/admin-options.css', array(), NATURA_VERSION );
				wp_enqueue_script( 'natura-options', get_template_directory_uri() . '/assets/js/admin-options.js', array( 'jquery', 'wp-color-picker' ), NATURA_VERSION, true );
				$index = array();
				foreach ( natura_option_tabs() as $tab => $section ) {
					$index[] = array(
						'label' => $section['title'],
						'help'  => $section['intro'],
						'tab'   => '',
						'url'   => natura_tab_url( $tab ),
					);
					foreach ( $section['fields'] as $key => $field ) {
						$index[] = array(
							'label' => $field['label'],
							'help'  => $field['help'] ?? '',
							'tab'   => $section['title'],
							'url'   => natura_tab_url( $tab ) . '#field-' . $key,
							// The tab's introduction also matches ("AdSense" finds the ad IDs).
							'more'  => $section['intro'],
						);
					}
				}
				wp_localize_script(
					'natura-options',
					'naturaOptions',
					array(
						'choose'       => __( 'Choose an image', 'natura' ),
						'use'          => __( 'Use this image', 'natura' ),
						'resetSection' => __( 'Put every setting of this tab back to its default?', 'natura' ),
						'resetAll'     => __( 'Every Natura Option will go back to its default. The current settings stay in "Recent versions" (Import / Export). Type reset to confirm.', 'natura' ),
						'unsaved'      => __( 'You have unsaved changes.', 'natura' ),
						'noResults'    => __( 'No setting matches.', 'natura' ),
						'index'        => $index,
					)
				);
			} );
		}
	}
);

/**
 * The tab of the page being viewed.
 */
function natura_current_tab(): string {
	$page = isset( $_GET['page'] ) ? sanitize_key( wp_unslash( $_GET['page'] ) ) : 'natura'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only navigation.
	$tab  = 'natura' === $page ? 'dashboard' : (string) preg_replace( '/^natura-/', '', $page );

	return array_key_exists( $tab, natura_option_tabs() ) ? $tab : 'dashboard';
}

/**
 * Address of a tab.
 *
 * @param string $tab Tab key.
 */
function natura_tab_url( string $tab ): string {
	return admin_url( 'admin.php?page=' . ( 'dashboard' === $tab ? 'natura' : 'natura-' . $tab ) );
}

/**
 * Handles Save, Reset section, Reset all, and Import.
 */
add_action(
	'admin_post_natura_options',
	static function (): void {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			wp_die( esc_html__( 'Sorry, you are not allowed to change the site\'s settings.', 'natura' ), '', array( 'response' => 403 ) );
		}
		$tab = isset( $_POST['natura_tab'] ) ? sanitize_key( wp_unslash( $_POST['natura_tab'] ) ) : '';
		if ( ! array_key_exists( $tab, natura_option_tabs() ) ) {
			wp_die( esc_html__( 'Unknown settings tab.', 'natura' ), '', array( 'response' => 400 ) );
		}
		check_admin_referer( 'natura_options_' . $tab );

		$op     = isset( $_POST['natura_op'] ) ? sanitize_key( wp_unslash( $_POST['natura_op'] ) ) : 'save';
		$fields = natura_option_fields();
		$notice = 'saved';
		$tabs   = natura_option_tabs();
		$names  = array(
			'save'          => __( 'Saved', 'natura' ),
			'reset_section' => __( 'Reset section', 'natura' ),
			'reset_all'     => __( 'Reset all', 'natura' ),
			'import'        => __( 'Import', 'natura' ),
			'restore'       => __( 'Restore', 'natura' ),
		);
		if ( ! isset( $names[ $op ] ) ) {
			wp_die( esc_html__( 'Unknown action.', 'natura' ), '', array( 'response' => 400 ) );
		}
		// The copy kept is the state before this change.
		natura_remember_version( $names[ $op ] . ( in_array( $op, array( 'save', 'reset_section' ), true ) ? ' · ' . $tabs[ $tab ]['title'] : '' ) );

		if ( 'restore' === $op ) {
			$history = get_option( 'natura_options_history', array() );
			$index   = isset( $_POST['natura_version'] ) ? absint( $_POST['natura_version'] ) : -1;
			// Index 0 is now the copy just taken; the chosen version moved down by one.
			$version = is_array( $history ) ? ( $history[ $index + 1 ] ?? null ) : null;
			if ( is_array( $version ) && isset( $version['values'] ) && is_array( $version['values'] ) ) {
				natura_save_options( $fields, natura_values_as_input( $version['values'] ) );
				$notice = 'restored';
			} else {
				$notice = 'restore_error';
			}
		} elseif ( 'reset_all' === $op ) {
			natura_reset_options( $fields );
			$notice = 'reset_all';
		} elseif ( 'reset_section' === $op ) {
			natura_reset_options( array_filter( $fields, static fn( array $field ): bool => $field['tab'] === $tab ) );
			$notice = 'reset_section';
		} elseif ( 'import' === $op ) {
			$data   = json_decode( isset( $_POST['natura_import'] ) ? (string) wp_unslash( $_POST['natura_import'] ) : '', true ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- JSON, each value is sanitized per field below.
			$values = is_array( $data ) && ! empty( $data['natura_options'] ) && isset( $data['values'] ) && is_array( $data['values'] ) ? $data['values'] : null;
			if ( null === $values ) {
				$notice = 'import_error';
			} else {
				natura_save_options( $fields, natura_values_as_input( $values ) );
				$notice = 'imported';
			}
		} else {
			$input = isset( $_POST['natura'] ) && is_array( $_POST['natura'] ) ? wp_unslash( $_POST['natura'] ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- each value is sanitized per field in natura_save_options().
			$tab_fields = array_filter( $fields, static fn( array $field ): bool => $field['tab'] === $tab );
			natura_save_options( $tab_fields, $input );
			// A colour given but refused (unreadable with white text) is reported.
			foreach ( $tab_fields as $key => $field ) {
				if ( 'color' === $field['type'] && ! empty( $input[ $key ] ) && '' === natura_sanitize_option( 'color', $input[ $key ] ) ) {
					$notice = 'colour_refused';
				}
			}
		}

		wp_safe_redirect( add_query_arg( 'natura-notice', $notice, natura_tab_url( $tab ) ) );
		exit;
	}
);

/**
 * What is still to set up, with the tab where it is done.
 *
 * @return array<int, array{done: bool, label: string, tab: string}>
 */
function natura_setup_checklist(): array {
	return array(
		array(
			'done'  => (bool) natura_home_hero_photo(),
			'label' => __( 'Opening photo of your own balcony or pots', 'natura' ),
			'tab'   => 'home',
		),
		array(
			'done'  => (bool) natura_home_author(),
			'label' => __( 'Who writes Natura: name, photo, and short bio', 'natura' ),
			'tab'   => 'author',
		),
		array(
			'done'  => '' !== natura_home_setting( 'natura_pinterest_url' ),
			'label' => __( 'Pinterest profile address', 'natura' ),
			'tab'   => 'pinterest',
		),
		array(
			'done'  => '' !== natura_sanitize_pinterest_code( natura_home_setting( 'natura_pinterest_verify' ) ),
			'label' => __( 'Pinterest website claimed', 'natura' ),
			'tab'   => 'pinterest',
		),
		array(
			'done'  => '' !== natura_home_setting( 'natura_newsletter_code' ),
			'label' => __( 'Newsletter form', 'natura' ),
			'tab'   => 'newsletter',
		),
		array(
			'done'  => natura_ads_enabled(),
			'label' => __( 'AdSense publisher ID and ad unit', 'natura' ),
			'tab'   => 'ads',
		),
	);
}

/**
 * Current value of a field, for the form.
 *
 * @param string $key   Field key.
 * @param string $type  Field type.
 * @return mixed
 */
function natura_option_value( string $key, string $type ) {
	if ( 'switch' === $type ) {
		return natura_section_enabled( $key );
	}
	$defaults = natura_home_defaults();

	return get_theme_mod( $key, $defaults[ $key ] ?? '' );
}

/**
 * Prints one field row.
 *
 * @param string                                                         $key   Field key.
 * @param array{type: string, label: string, help?: string, placeholder?: string} $field Field.
 */
function natura_render_option_field( string $key, array $field ): void {
	$value = natura_option_value( $key, $field['type'] );
	$id    = 'natura-' . $key;
	$name  = 'natura[' . $key . ']';
	?>
	<div class="natura-field natura-field-<?php echo esc_attr( $field['type'] ); ?>" id="field-<?php echo esc_attr( $key ); ?>">
		<div class="natura-field-label">
			<?php if ( 'switch' === $field['type'] ) : ?>
				<strong id="<?php echo esc_attr( $id ); ?>-label"><?php echo esc_html( $field['label'] ); ?></strong>
			<?php else : ?>
				<label for="<?php echo esc_attr( $id ); ?>"><strong><?php echo esc_html( $field['label'] ); ?></strong></label>
			<?php endif; ?>
			<?php if ( ! empty( $field['help'] ) ) : ?>
				<p><?php echo esc_html( $field['help'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="natura-field-control">
			<?php
			switch ( $field['type'] ) {
				case 'switch':
					?>
					<div class="natura-buttonset" role="radiogroup" aria-labelledby="<?php echo esc_attr( $id ); ?>-label">
						<input type="radio" id="<?php echo esc_attr( $id ); ?>-on" name="<?php echo esc_attr( $name ); ?>" value="1" <?php checked( $value ); ?>>
						<label for="<?php echo esc_attr( $id ); ?>-on"><?php esc_html_e( 'Show', 'natura' ); ?></label>
						<input type="radio" id="<?php echo esc_attr( $id ); ?>-off" name="<?php echo esc_attr( $name ); ?>" value="0" <?php checked( ! $value ); ?>>
						<label for="<?php echo esc_attr( $id ); ?>-off"><?php esc_html_e( 'Hide', 'natura' ); ?></label>
					</div>
					<?php
					break;
				case 'color':
					printf(
						'<input type="text" id="%1$s" name="%2$s" value="%3$s" class="natura-color" data-default-color="%4$s">',
						esc_attr( $id ),
						esc_attr( $name ),
						esc_attr( (string) $value ),
						esc_attr( 'natura_color_primary' === $key ? '#1b3b2b' : '#9b441f' )
					);
					break;
				case 'textarea':
					printf( '<textarea id="%1$s" name="%2$s" rows="4" class="large-text">%3$s</textarea>', esc_attr( $id ), esc_attr( $name ), esc_textarea( (string) $value ) );
					break;
				case 'media':
					$image = absint( $value );
					?>
					<div class="natura-media">
						<input type="hidden" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $image ?: '' ); ?>">
						<div class="natura-media-preview"><?php echo $image ? wp_get_attachment_image( $image, 'medium' ) : ''; ?></div>
						<button type="button" class="button natura-media-choose"><?php esc_html_e( 'Upload', 'natura' ); ?></button>
						<button type="button" class="button natura-media-remove"<?php echo $image ? '' : ' hidden'; ?>><?php esc_html_e( 'Remove', 'natura' ); ?></button>
					</div>
					<?php
					break;
				default:
					printf(
						'<input type="%1$s" id="%2$s" name="%3$s" value="%4$s" class="regular-text" placeholder="%5$s">',
						'url' === $field['type'] ? 'url' : 'text',
						esc_attr( $id ),
						esc_attr( $name ),
						esc_attr( (string) $value ),
						esc_attr( $field['placeholder'] ?? '' )
					);
			}
			?>
		</div>
	</div>
	<?php
}

/**
 * Save / Reset section / Reset all.
 */
function natura_render_option_actions(): void {
	?>
	<div class="natura-actions">
		<button type="submit" class="button button-primary" name="natura_op" value="save"><?php esc_html_e( 'Save Changes', 'natura' ); ?></button>
		<button type="submit" class="button natura-reset-section" name="natura_op" value="reset_section"><?php esc_html_e( 'Reset Section', 'natura' ); ?></button>
		<button type="submit" class="button natura-reset-all" name="natura_op" value="reset_all"><?php esc_html_e( 'Reset All', 'natura' ); ?></button>
	</div>
	<?php
}

/**
 * Prints the panel.
 */
function natura_render_options(): void {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'Sorry, you are not allowed to change the site\'s settings.', 'natura' ), '', array( 'response' => 403 ) );
	}
	$tabs    = natura_option_tabs();
	$tab     = natura_current_tab();
	$section = $tabs[ $tab ];
	$notices = array(
		'saved'         => array( 'success', __( 'Settings saved.', 'natura' ) ),
		'reset_section' => array( 'success', __( 'This tab is back to its defaults.', 'natura' ) ),
		'reset_all'     => array( 'success', __( 'All Natura Options are back to their defaults.', 'natura' ) ),
		'imported'      => array( 'success', __( 'Settings imported.', 'natura' ) ),
		'import_error'  => array( 'error', __( 'Nothing imported: paste the whole text of a Natura Options export.', 'natura' ) ),
		'restored'      => array( 'success', __( 'That version is back. The settings you had just before are kept at the top of the list.', 'natura' ) ),
		'restore_error' => array( 'error', __( 'That version could not be found.', 'natura' ) ),
		'colour_refused' => array( 'warning', __( 'Saved, except a colour too light to carry white text: the default is used. Choose a darker shade.', 'natura' ) ),
	);
	$notice  = isset( $_GET['natura-notice'] ) ? sanitize_key( wp_unslash( $_GET['natura-notice'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
	?>
	<div class="wrap natura-options">
		<h1 class="screen-reader-text"><?php echo esc_html( __( 'Natura Options', 'natura' ) . ': ' . $section['title'] ); ?></h1>
		<?php if ( isset( $notices[ $notice ] ) ) : ?>
			<div class="notice notice-<?php echo esc_attr( $notices[ $notice ][0] ); ?> is-dismissible"><p><?php echo esc_html( $notices[ $notice ][1] ); ?></p></div>
		<?php endif; ?>

		<div class="natura-panel">
			<header class="natura-panel-header">
				<p class="natura-panel-title"><?php esc_html_e( 'Natura Options', 'natura' ); ?> <span><?php echo esc_html( NATURA_VERSION ); ?></span></p>
				<div class="natura-search" role="search">
					<label class="screen-reader-text" for="natura-search"><?php esc_html_e( 'Search the settings', 'natura' ); ?></label>
					<input type="search" id="natura-search" placeholder="<?php esc_attr_e( 'Search the settings…', 'natura' ); ?>" autocomplete="off" aria-controls="natura-search-results">
					<ul id="natura-search-results" class="natura-search-results" hidden></ul>
				</div>
				<nav class="natura-panel-links">
					<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Live preview', 'natura' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'View site', 'natura' ); ?></a>
				</nav>
			</header>

			<div class="natura-panel-body">
				<nav class="natura-tabs" aria-label="<?php esc_attr_e( 'Natura Options sections', 'natura' ); ?>">
					<?php foreach ( $tabs as $key => $item ) : ?>
						<a href="<?php echo esc_url( natura_tab_url( $key ) ); ?>"<?php echo $key === $tab ? ' class="is-active" aria-current="page"' : ''; ?>>
							<span class="dashicons <?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></span>
							<?php echo esc_html( $item['title'] ); ?>
						</a>
					<?php endforeach; ?>
				</nav>

				<div class="natura-panel-content">
					<?php if ( 'dashboard' === $tab ) : ?>
						<?php natura_render_dashboard_tab( $section ); ?>
					<?php elseif ( 'transfer' === $tab ) : ?>
						<?php natura_render_transfer_tab( $section ); ?>
					<?php else : ?>
						<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="natura-form">
							<input type="hidden" name="action" value="natura_options">
							<input type="hidden" name="natura_tab" value="<?php echo esc_attr( $tab ); ?>">
							<?php wp_nonce_field( 'natura_options_' . $tab ); ?>
							<?php natura_render_option_actions(); ?>
							<div class="natura-section-head">
								<h2><?php echo esc_html( $section['title'] ); ?></h2>
								<p><?php echo esc_html( $section['intro'] ); ?></p>
							</div>
							<?php
							foreach ( $section['fields'] as $key => $field ) {
								natura_render_option_field( $key, $field );
							}
							?>
							<?php natura_render_option_actions(); ?>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * The Dashboard tab: setup checklist and quick links.
 *
 * @param array{title: string, intro: string} $section Tab.
 */
function natura_render_dashboard_tab( array $section ): void {
	$checklist = natura_setup_checklist();
	$done      = count( array_filter( wp_list_pluck( $checklist, 'done' ) ) );
	?>
	<div class="natura-section-head">
		<h2><?php echo esc_html( $section['title'] ); ?></h2>
		<p><?php echo esc_html( $section['intro'] ); ?></p>
	</div>
	<div class="natura-dashboard">
		<section class="natura-box">
			<h3>
				<?php
				/* translators: 1: settings done, 2: all settings. */
				printf( esc_html__( 'Setup: %1$d of %2$d done', 'natura' ), (int) $done, count( $checklist ) );
				?>
			</h3>
			<progress max="<?php echo esc_attr( (string) count( $checklist ) ); ?>" value="<?php echo esc_attr( (string) $done ); ?>"></progress>
			<ul class="natura-checklist">
				<?php foreach ( $checklist as $item ) : ?>
					<li class="<?php echo $item['done'] ? 'is-done' : ''; ?>">
						<span class="dashicons <?php echo $item['done'] ? 'dashicons-yes-alt' : 'dashicons-marker'; ?>" aria-hidden="true"></span>
						<?php if ( $item['done'] ) : ?>
							<span><?php echo esc_html( $item['label'] ); ?><span class="screen-reader-text"> <?php esc_html_e( '(done)', 'natura' ); ?></span></span>
						<?php else : ?>
							<a href="<?php echo esc_url( natura_tab_url( $item['tab'] ) ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
		<section class="natura-box">
			<h3><?php esc_html_e( 'Your content', 'natura' ); ?></h3>
			<ul class="natura-counts">
				<?php
				foreach ( array( 'plant', 'problem', 'post' ) as $type ) {
					$object = get_post_type_object( $type );
					if ( ! $object ) {
						continue;
					}
					printf(
						'<li><a href="%1$s"><strong>%2$s</strong> %3$s</a></li>',
						esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
						esc_html( number_format_i18n( (int) wp_count_posts( $type )->publish ) ),
						esc_html( $object->labels->name )
					);
				}
				?>
			</ul>
			<p><a class="button" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=plant' ) ); ?>"><?php esc_html_e( 'Add a plant guide', 'natura' ); ?></a></p>
		</section>
	</div>
	<?php
}

/**
 * The Import / Export tab.
 *
 * @param array{title: string, intro: string} $section Tab.
 */
function natura_render_transfer_tab( array $section ): void {
	$export = (string) wp_json_encode( natura_export_options(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
	?>
	<div class="natura-section-head">
		<h2><?php echo esc_html( $section['title'] ); ?></h2>
		<p><?php echo esc_html( $section['intro'] ); ?></p>
	</div>
	<div class="natura-field natura-field-stack">
		<div class="natura-field-label">
			<label for="natura-export"><strong><?php esc_html_e( 'Export', 'natura' ); ?></strong></label>
			<p><?php esc_html_e( 'Copy this text and keep it, or paste it into Import on another site. Photos are referenced by their media library ID: on another site, choose them again.', 'natura' ); ?></p>
		</div>
		<textarea id="natura-export" class="large-text code" rows="10" readonly><?php echo esc_textarea( $export ); ?></textarea>
		<p>
			<button type="button" class="button natura-copy" data-target="natura-export"><?php esc_html_e( 'Copy', 'natura' ); ?></button>
			<button type="button" class="button natura-download" data-target="natura-export" data-filename="natura-options.json"><?php esc_html_e( 'Download', 'natura' ); ?></button>
		</p>
	</div>
	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="natura-field natura-field-stack">
		<input type="hidden" name="action" value="natura_options">
		<input type="hidden" name="natura_tab" value="transfer">
		<input type="hidden" name="natura_op" value="import">
		<?php wp_nonce_field( 'natura_options_transfer' ); ?>
		<div class="natura-field-label">
			<label for="natura-import"><strong><?php esc_html_e( 'Import', 'natura' ); ?></strong></label>
			<p><?php esc_html_e( 'Paste a Natura Options export. Only known settings are imported, each checked like a normal save.', 'natura' ); ?></p>
		</div>
		<textarea id="natura-import" name="natura_import" class="large-text code" rows="8"></textarea>
		<p><button type="submit" class="button button-primary"><?php esc_html_e( 'Import', 'natura' ); ?></button></p>
	</form>
	<?php
	$history = get_option( 'natura_options_history', array() );
	$history = is_array( $history ) ? $history : array();
	?>
	<div class="natura-field natura-field-stack" id="field-history">
		<div class="natura-field-label">
			<strong><?php esc_html_e( 'Recent versions', 'natura' ); ?></strong>
			<p><?php esc_html_e( 'A copy of all settings is kept before each change, the last ten. Restoring one keeps the current settings at the top of the list, so it can be undone.', 'natura' ); ?></p>
		</div>
		<?php if ( ! $history ) : ?>
			<p><?php esc_html_e( 'No change saved yet.', 'natura' ); ?></p>
		<?php else : ?>
			<table class="widefat striped natura-history">
				<thead><tr><th><?php esc_html_e( 'Before', 'natura' ); ?></th><th><?php esc_html_e( 'Date', 'natura' ); ?></th><th><?php esc_html_e( 'By', 'natura' ); ?></th><th></th></tr></thead>
				<tbody>
					<?php foreach ( $history as $index => $version ) : ?>
						<tr>
							<td><?php echo esc_html( (string) ( $version['what'] ?? '' ) ); ?></td>
							<td><?php echo esc_html( wp_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), (int) ( $version['time'] ?? 0 ) ) ); ?></td>
							<td><?php echo esc_html( (string) ( $version['user'] ?? '' ) ); ?></td>
							<td>
								<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
									<input type="hidden" name="action" value="natura_options">
									<input type="hidden" name="natura_tab" value="transfer">
									<input type="hidden" name="natura_op" value="restore">
									<input type="hidden" name="natura_version" value="<?php echo esc_attr( (string) $index ); ?>">
									<?php wp_nonce_field( 'natura_options_transfer' ); ?>
									<button type="submit" class="button"><?php esc_html_e( 'Restore', 'natura' ); ?></button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Brand colours chosen in Natura Options, as overrides of the stylesheet's
 * colour variables. The darker shades follow the chosen colour.
 */
add_action(
	'wp_head',
	static function (): void {
		$primary = (string) get_theme_mod( 'natura_color_primary', '' );
		$accent  = (string) get_theme_mod( 'natura_color_accent', '' );
		$rules   = array();
		if ( sanitize_hex_color( $primary ) ) {
			$rules[] = '--forest:' . $primary . ';--forest-dark:color-mix(in srgb,' . $primary . ' 78%,#000);--forest-soft:color-mix(in srgb,' . $primary . ' 85%,#fff);--heading:color-mix(in srgb,' . $primary . ' 60%,#000)';
		}
		if ( sanitize_hex_color( $accent ) ) {
			$rules[] = '--clay:' . $accent . ';--clay-strong:color-mix(in srgb,' . $accent . ' 90%,#fff);--clay-tint:color-mix(in srgb,' . $accent . ' 18%,#fff)';
		}
		if ( $rules ) {
			echo '<style id="natura-brand-colours">:root{' . esc_html( implode( ';', $rules ) ) . '}</style>' . "\n";
		}
	},
	20
);
