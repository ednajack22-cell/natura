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
 * adid (AdSense ID), pincode (Pinterest verification code), color, page (one
 * of the site's pages), select (one of fixed choices), gverify / bverify
 * (Google / Bing verification code), ga4 (Google Analytics measurement ID).
 *
 * @return array<string, array{title: string, icon: string, intro: string, fields: array<string, array{type: string, label: string, help?: string, placeholder?: string, choices?: array<string, string>}>}>
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
				'guide_key_points'  => $switch( __( 'In short (plant guides)', 'natura' ), __( 'The key points under the photo: the answer in a few lines.', 'natura' ) ),
				'guide_glance'      => $switch( __( 'At a glance (plant guides)', 'natura' ), __( 'The box of key facts under the photo: sun, pot size, watering, harvest.', 'natura' ) ),
				'guide_calendar'    => $switch( __( 'Planting calendar (plant guides)', 'natura' ), __( 'The 12-month table (sow, plant out, harvest), and "In October: harvest" under the title.', 'natura' ) ),
				'guide_varieties'   => $switch( __( 'Varieties to try (plant guides)', 'natura' ), __( 'Variety cards after the text, with optional links to seeds or plants.', 'natura' ) ),
				'guide_toc'         => $switch( __( 'In this guide (contents)', 'natura' ), __( 'The numbered list of sections, before the text.', 'natura' ) ),
				'guide_faq'         => $switch( __( 'Questions & answers', 'natura' ), __( 'The questions under the text. Hidden questions are also left out of the data given to Google.', 'natura' ) ),
				'guide_sources'     => $switch( __( 'Sources', 'natura' ), __( 'The references under each guide (RHS, university extensions…). Showing them builds trust with readers and Google; keep filling them in even when hidden.', 'natura' ) ),
				'guide_read_next'   => $switch( __( 'Read next', 'natura' ), __( 'Three guides in the side column.', 'natura' ) ),
				'guide_related'     => $switch( __( 'Related guides', 'natura' ), __( 'Common problems, plants affected, more guides: under the text.', 'natura' ) ),
			),
		),
		'pages'      => array(
			'title'  => __( 'Pages & lists', 'natura' ),
			'icon'   => 'dashicons-admin-page',
			'intro'  => __( 'Your site\'s own pages, and the texts of the lists, the 404 page, and the search page. The legal pages are needed for AdSense and affiliate programmes.', 'natura' ),
			'fields' => array(
				'natura_page_about'       => array(
					'type'  => 'page',
					'label' => __( 'About page', 'natura' ),
					'help'  => __( 'Linked from the footer and from "Who writes Natura".', 'natura' ),
				),
				'natura_page_editorial'   => array(
					'type'  => 'page',
					'label' => __( 'How we write and test', 'natura' ),
					'help'  => __( 'Your editorial policy: how guides are written, checked, and updated.', 'natura' ),
				),
				'natura_page_contact'     => array(
					'type'  => 'page',
					'label' => __( 'Contact page', 'natura' ),
				),
				'natura_page_privacy'     => array(
					'type'  => 'page',
					'label' => __( 'Privacy policy', 'natura' ),
					'help'  => __( 'Required by AdSense and by the GDPR.', 'natura' ),
				),
				'natura_page_legal'       => array(
					'type'  => 'page',
					'label' => __( 'Legal notice', 'natura' ),
				),
				'natura_page_disclosure'  => array(
					'type'  => 'page',
					'label' => __( 'Affiliate disclosure', 'natura' ),
					'help'  => __( 'Linked from every affiliate notice ("How we choose products").', 'natura' ),
				),
				'natura_intro_plants'     => array(
					'type'  => 'textarea',
					'label' => __( 'Plants list: introduction', 'natura' ),
					'help'  => __( 'Also its description for Google. A plant type with its own description uses that instead.', 'natura' ),
				),
				'natura_intro_problems'   => array(
					'type'  => 'textarea',
					'label' => __( 'Plant problems list: introduction', 'natura' ),
				),
				'natura_intro_plant_care' => array(
					'type'  => 'textarea',
					'label' => __( 'Plant Care page: introduction', 'natura' ),
				),
				'care_problems'           => $switch( __( 'Plant Care page: What is wrong with your plant?', 'natura' ), __( 'The dark panel with the problem guides.', 'natura' ) ),
				'care_checks'             => $switch( __( 'Plant Care page: Three checks', 'natura' ), __( 'The three checks before treating anything.', 'natura' ) ),
				'list_problem_band'       => $switch( __( 'Plant looking unwell? band', 'natura' ), __( 'Under the plant list, towards the problem guides.', 'natura' ) ),
				'natura_404_title'        => array(
					'type'  => 'text',
					'label' => __( 'Page not found: title', 'natura' ),
				),
				'natura_404_text'         => array(
					'type'  => 'textarea',
					'label' => __( 'Page not found: text', 'natura' ),
				),
				'natura_search_empty'     => array(
					'type'  => 'textarea',
					'label' => __( 'Search with no result: text', 'natura' ),
				),
			),
		),
		'calendar'   => array(
			'title'  => __( 'Calendar & lists', 'natura' ),
			'icon'   => 'dashicons-calendar-alt',
			'intro'  => __( 'The planting calendar (/calendar/ and one page per month) and the plant lists by light and space. Plants appear from the Planting calendar box and the Sun and Growing spaces boxes of each plant guide. Pages with fewer than 6 plants are kept out of Google until they fill up.', 'natura' ),
			'fields' => array(
				'natura_calendar_intro'   => array(
					'type'  => 'textarea',
					'label' => __( 'Calendar: introduction', 'natura' ),
					'help'  => __( 'Under the title of the year page. Also its description for Google.', 'natura' ),
				),
				'natura_calendar_climate' => array(
					'type'  => 'textarea',
					'label' => __( 'Climate note', 'natura' ),
					'help'  => __( 'Says which climate the months are for. Shown on every month page and under the calendar of each plant guide.', 'natura' ),
				),
				'calendar_months_nav'     => $switch( __( 'Month strip', 'natura' ), __( 'The row of months at the top of every calendar page.', 'natura' ) ),
				'calendar_summary'        => $switch( __( 'Sow / Plant out / Harvest counts', 'natura' ), __( 'The three buttons under the title of a month page, which jump to each section.', 'natura' ) ),
				'calendar_year_table'     => $switch( __( 'Year table', 'natura' ), __( 'Every plant and its twelve months, on the year page.', 'natura' ) ),
				'calendar_jobs'           => $switch( __( 'Jobs for your pots', 'natura' ), __( 'The list set below for each month. A month with no jobs shows nothing.', 'natura' ) ),
				'list_conditions'         => $switch( __( 'By light / By space buttons (plant lists)', 'natura' ), __( 'Under the title of the plant lists: Full sun, Part shade, Balcony…', 'natura' ) ),
				'guide_conditions'        => $switch( __( 'Suits: Full sun · Balcony (plant guides)', 'natura' ), __( 'Under the title of plant guides, linking to the plants with the same light or space.', 'natura' ) ),
				'natura_calendar_jobs_1' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 1 ) ),
				),
				'natura_calendar_jobs_2' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 2 ) ),
				),
				'natura_calendar_jobs_3' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 3 ) ),
				),
				'natura_calendar_jobs_4' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 4 ) ),
				),
				'natura_calendar_jobs_5' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 5 ) ),
				),
				'natura_calendar_jobs_6' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 6 ) ),
				),
				'natura_calendar_jobs_7' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 7 ) ),
				),
				'natura_calendar_jobs_8' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 8 ) ),
				),
				'natura_calendar_jobs_9' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 9 ) ),
				),
				'natura_calendar_jobs_10' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 10 ) ),
				),
				'natura_calendar_jobs_11' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 11 ) ),
				),
				'natura_calendar_jobs_12' => array(
					'type'  => 'textarea',
					/* translators: %s: month name. */
					'help'  => __( 'One job per line, shown on that month\'s page. Only what you have checked yourself.', 'natura' ),
					'label' => sprintf( __( 'Jobs for pots in %s', 'natura' ), natura_month_name( 12 ) ),
				),
			),
		),
		'tools'      => array(
			'title'  => __( 'Tools', 'natura' ),
			'icon'   => 'dashicons-admin-tools',
			'intro'  => __( 'The tools page (/tools/) and each tool. A tool switched off disappears from the tools page and its address shows "Page not found".', 'natura' ),
			'fields' => array(
				'natura_tools_intro'             => array(
					'type'  => 'textarea',
					'label' => __( 'Tools page: introduction', 'natura' ),
					'help'  => __( 'Also its description for Google.', 'natura' ),
				),
				'tool_plant_finder'              => $switch( __( 'Plant finder', 'natura' ), __( 'Questions about light, space, type, experience, and timing; answers from the plant guides.', 'natura' ) ),
				'natura_tool_intro_plant_finder' => array(
					'type'  => 'textarea',
					'label' => __( 'Plant finder: introduction', 'natura' ),
				),
				'tool_pot_size_calculator'       => $switch( __( 'Pot size calculator', 'natura' ), __( 'Volume of a round or square pot or a trough, bags of compost to buy, and the pot size from each plant guide.', 'natura' ) ),
				'natura_tool_intro_pot_size_calculator' => array(
					'type'  => 'textarea',
					'label' => __( 'Pot size calculator: introduction', 'natura' ),
				),
				'tool_watering_calculator'       => $switch( __( 'Watering routine', 'natura' ), __( 'Season, pot size and material, sun, heat, and rain shadow; the routine follows RHS advice.', 'natura' ) ),
				'natura_tool_intro_watering_calculator' => array(
					'type'  => 'textarea',
					'label' => __( 'Watering routine: introduction', 'natura' ),
				),
				'tool_frost_risk'                => $switch( __( 'Frost risk check', 'natura' ), __( 'Tonight\'s forecast low against the RHS hardiness rating set in each plant guide\'s Quick facts.', 'natura' ) ),
				'natura_tool_intro_frost_risk'   => array(
					'type'  => 'textarea',
					'label' => __( 'Frost risk check: introduction', 'natura' ),
				),
				'tool_guided_diagnosis'          => $switch( __( 'Symptom checker', 'natura' ), __( 'Plant, then where the problem shows; answers from the problem guides ("Plants affected", "Where it shows", and each cause\'s "What you see").', 'natura' ) ),
				'natura_tool_intro_guided_diagnosis' => array(
					'type'  => 'textarea',
					'label' => __( 'Symptom checker: introduction', 'natura' ),
				),
				'tool_planting_calendar'         => $switch( __( 'Planting calendar on the tools page', 'natura' ), __( 'The calendar itself is set in the Calendar & lists tab.', 'natura' ) ),
			),
		),
		'pinterest'  => array(
			'title'  => __( 'Pinterest & sharing', 'natura' ),
			'icon'   => 'dashicons-pinterest',
			'intro'  => __( 'Your Pinterest profile and claimed website, the Save buttons, and the Share bars (phone share sheet, Pinterest, WhatsApp, Facebook, email, copy link). The bars are plain links: no script or cookie from these networks.', 'natura' ),
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
				'share_guides'            => $switch( __( 'Share bar on guides', 'natura' ), __( 'Plant guides, problem guides, and articles, before the questions.', 'natura' ) ),
				'share_tools'             => $switch( __( 'Share bar on tools', 'natura' ), __( 'Under each tool: shares the reader\'s own result.', 'natura' ) ),
				'share_calendar'          => $switch( __( 'Share bar on the calendar', 'natura' ) ),
				'share_lists'             => $switch( __( 'Share bar on plant lists', 'natura' ), __( 'All plants, plant types, and lists by light or space.', 'natura' ) ),
				'natura_tool_pin_tools' => array(
					'type'  => 'media',
					/* translators: %s: tool name. */
					'label' => sprintf( __( 'Pinterest image: %s', 'natura' ), __( 'Tools page', 'natura' ) ),
					'help'  => __( 'Vertical, 1000 × 1500 px. Leave empty to use the image that comes with the theme.', 'natura' ),
				),
				'natura_tool_pin_plant_finder' => array(
					'type'  => 'media',
					/* translators: %s: tool name. */
					'label' => sprintf( __( 'Pinterest image: %s', 'natura' ), __( 'Plant finder', 'natura' ) ),
					'help'  => __( 'Vertical, 1000 × 1500 px. Leave empty to use the image that comes with the theme.', 'natura' ),
				),
				'natura_tool_pin_pot_size_calculator' => array(
					'type'  => 'media',
					/* translators: %s: tool name. */
					'label' => sprintf( __( 'Pinterest image: %s', 'natura' ), __( 'Pot size calculator', 'natura' ) ),
					'help'  => __( 'Vertical, 1000 × 1500 px. Leave empty to use the image that comes with the theme.', 'natura' ),
				),
				'natura_tool_pin_watering_calculator' => array(
					'type'  => 'media',
					/* translators: %s: tool name. */
					'label' => sprintf( __( 'Pinterest image: %s', 'natura' ), __( 'Watering routine', 'natura' ) ),
					'help'  => __( 'Vertical, 1000 × 1500 px. Leave empty to use the image that comes with the theme.', 'natura' ),
				),
				'natura_tool_pin_frost_risk' => array(
					'type'  => 'media',
					/* translators: %s: tool name. */
					'label' => sprintf( __( 'Pinterest image: %s', 'natura' ), __( 'Frost risk check', 'natura' ) ),
					'help'  => __( 'Vertical, 1000 × 1500 px. Leave empty to use the image that comes with the theme.', 'natura' ),
				),
				'natura_tool_pin_guided_diagnosis' => array(
					'type'  => 'media',
					/* translators: %s: tool name. */
					'label' => sprintf( __( 'Pinterest image: %s', 'natura' ), __( 'Symptom checker', 'natura' ) ),
					'help'  => __( 'Vertical, 1000 × 1500 px. Leave empty to use the image that comes with the theme.', 'natura' ),
				),

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
		'footer'     => array(
			'title'  => __( 'Footer & social', 'natura' ),
			'icon'   => 'dashicons-share',
			'intro'  => __( 'The footer text and your profiles on social networks. Profiles also tell Google which accounts belong to the site.', 'natura' ),
			'fields' => array(
				'natura_footer_text'      => array(
					'type'  => 'textarea',
					'label' => __( 'Footer text', 'natura' ),
					'help'  => __( 'One or two sentences under the logo: what the site is about.', 'natura' ),
				),
				'natura_social_instagram' => array(
					'type'        => 'url',
					'label'       => __( 'Instagram', 'natura' ),
					'placeholder' => 'https://www.instagram.com/yourname/',
				),
				'natura_social_youtube'   => array(
					'type'        => 'url',
					'label'       => __( 'YouTube', 'natura' ),
					'placeholder' => 'https://www.youtube.com/@yourname',
				),
				'natura_social_facebook'  => array(
					'type'        => 'url',
					'label'       => __( 'Facebook', 'natura' ),
					'placeholder' => 'https://www.facebook.com/yourpage',
				),
				'natura_social_tiktok'    => array(
					'type'        => 'url',
					'label'       => __( 'TikTok', 'natura' ),
					'placeholder' => 'https://www.tiktok.com/@yourname',
				),
				'site_footer_social'      => $switch( __( 'Social links in the footer', 'natura' ), __( 'Pinterest is set in the Pinterest tab.', 'natura' ) ),
			),
		),
		'seo'        => array(
			'title'  => __( 'SEO & Google', 'natura' ),
			'icon'   => 'dashicons-search',
			'intro'  => __( 'Prove to Google and Bing that the site is yours, and measure visits. Titles, descriptions, Open Graph, breadcrumbs, and structured data are written by the theme (or by an SEO plugin if you install one).', 'natura' ),
			'fields' => array(
				'natura_google_verify' => array(
					'type'  => 'gverify',
					'label' => __( 'Google Search Console verification', 'natura' ),
					'help'  => __( 'Search Console → Add property → URL prefix → "HTML tag". Paste the tag or only the code. Then submit your sitemap: /wp-sitemap.xml.', 'natura' ),
				),
				'natura_bing_verify'   => array(
					'type'  => 'bverify',
					'label' => __( 'Bing Webmaster Tools verification', 'natura' ),
					'help'  => __( 'Bing also powers DuckDuckGo and Yahoo. Paste the tag or only the code.', 'natura' ),
				),
				'natura_ga4_id'        => array(
					'type'        => 'ga4',
					'label'       => __( 'Google Analytics measurement ID', 'natura' ),
					'help'        => __( 'Analytics → Admin → Data streams. Visits by logged-in editors are not counted.', 'natura' ),
					'placeholder' => 'G-XXXXXXXXXX',
				),
				'natura_ga4_consent'   => array(
					'type'    => 'select',
					'label'   => __( 'Analytics and visitor consent', 'natura' ),
					'help'    => __( 'With Google consent mode, no analytics cookie is set until the visitor accepts in a consent banner (AdSense → Privacy & messaging, or a certified consent plugin). Without a banner, Google only receives anonymous, cookieless pings.', 'natura' ),
					'choices' => array(
						'eu'  => __( 'Ask for consent in the EU, UK, and Switzerland (recommended)', 'natura' ),
						'all' => __( 'Ask for consent everywhere', 'natura' ),
					),
				),
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
				'ads_tools'                     => $switch( __( 'Tools ad', 'natura' ), __( 'One ad on each tool page, below the tool.', 'natura' ) ),
				'ads_calendar'                  => $switch( __( 'Calendar ad', 'natura' ), __( 'One ad on month pages, after the first section.', 'natura' ) ),
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
		case 'page':
			$page = absint( $value );
			return ( $page && 'page' === get_post_type( $page ) ) ? $page : 0;
		case 'select':
			return $value; // Checked against the field's choices in natura_save_options().
		case 'gverify':
			return natura_sanitize_verification( $value, '[A-Za-z0-9_-]{20,100}' );
		case 'bverify':
			return strtoupper( natura_sanitize_verification( $value, '[A-Fa-f0-9]{32}' ) );
		case 'ga4':
			$value = strtoupper( trim( $value ) );
			return preg_match( '/^G-[A-Z0-9]{4,16}$/', $value ) ? $value : '';
		case 'color':
			$color = (string) sanitize_hex_color( $value );
			return ( '' !== $color && natura_contrast_with_white( $color ) >= 4.5 ) ? strtolower( $color ) : '';
		default:
			return sanitize_text_field( $value );
	}
}

/**
 * Keeps only the code of a search engine's verification tag, even when the
 * whole <meta> tag was pasted.
 *
 * @param string $value   Pasted value.
 * @param string $pattern Allowed code, as a regular expression fragment.
 */
function natura_sanitize_verification( string $value, string $pattern ): string {
	$value = trim( $value );
	if ( preg_match( '/content=["\']?(' . $pattern . ')["\'\s\/>]/', $value, $match ) ) {
		return $match[1];
	}

	return preg_match( '/^' . $pattern . '$/', $value ) ? $value : '';
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
	$values  = natura_export_options()['values'];
	// Same settings as the last copy kept: nothing new to remember.
	if ( isset( $history[0]['values'] ) && $history[0]['values'] === $values ) {
		return;
	}
	array_unshift(
		$history,
		array(
			'time'   => time(),
			'user'   => wp_get_current_user()->display_name,
			'what'   => $what,
			'values' => $values,
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
		if ( 'select' === $field['type'] && ! isset( $field['choices'][ $value ] ) ) {
			continue;
		}
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
		// The version to restore is read before the current settings are kept.
		$version = null;
		if ( 'restore' === $op ) {
			$history = get_option( 'natura_options_history', array() );
			$index   = isset( $_POST['natura_version'] ) ? absint( $_POST['natura_version'] ) : -1;
			$version = is_array( $history ) ? ( $history[ $index ] ?? null ) : null;
		}

		// The copy kept is the state before this change.
		natura_remember_version( $names[ $op ] . ( in_array( $op, array( 'save', 'reset_section' ), true ) ? ' · ' . $tabs[ $tab ]['title'] : '' ) );

		if ( 'restore' === $op ) {
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
			'done'  => natura_newsletter_ready(),
			'label' => __( 'Newsletter form', 'natura' ),
			'tab'   => 'newsletter',
		),
		array(
			'done'  => '' !== natura_home_setting( 'natura_google_verify' ),
			'label' => __( 'Google Search Console verification', 'natura' ),
			'tab'   => 'seo',
		),
		array(
			'done'  => (bool) absint( get_theme_mod( 'natura_page_privacy' ) ),
			'label' => __( 'Privacy policy page (needed for AdSense)', 'natura' ),
			'tab'   => 'pages',
		),
		array(
			'done'  => (bool) absint( get_theme_mod( 'natura_page_about' ) ),
			'label' => __( 'About page', 'natura' ),
			'tab'   => 'pages',
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
 * @param array{type: string, label: string, help?: string, placeholder?: string, choices?: array<string, string>} $field Field.
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
				case 'page':
					wp_dropdown_pages(
						array(
							'name'              => esc_attr( $name ),
							'id'                => esc_attr( $id ),
							'selected'          => absint( $value ),
							'show_option_none'  => esc_html__( '— Not chosen yet —', 'natura' ),
							'option_none_value' => '0',
						)
					);
					if ( ! absint( $value ) ) {
						printf( ' <a href="%1$s">%2$s</a>', esc_url( admin_url( 'post-new.php?post_type=page' ) ), esc_html__( 'Create the page', 'natura' ) );
					}
					break;
				case 'select':
					printf( '<select id="%1$s" name="%2$s">', esc_attr( $id ), esc_attr( $name ) );
					foreach ( $field['choices'] ?? array() as $choice => $choice_label ) {
						printf( '<option value="%1$s"%2$s>%3$s</option>', esc_attr( $choice ), selected( $value, $choice, false ), esc_html( $choice_label ) );
					}
					echo '</select>';
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
				<p class="natura-panel-title">
					<?php esc_html_e( 'Natura Options', 'natura' ); ?> <span><?php echo esc_html( NATURA_VERSION ); ?></span>
					<?php
					$natura_issues = count( array_filter( natura_site_status(), static fn( array $row ): bool => ! $row['ok'] && empty( $row['note'] ) ) );
					?>
					<a class="natura-panel-status <?php echo $natura_issues ? 'is-warn' : 'is-ok'; ?>" href="<?php echo esc_url( natura_tab_url( 'dashboard' ) ); ?>">
						<?php
						echo esc_html(
							$natura_issues
								/* translators: %d: number of site status points to check. */
								? sprintf( _n( '%d point to check', '%d points to check', $natura_issues, 'natura' ), $natura_issues )
								: __( 'Site ready', 'natura' )
						);
						?>
					</a>
				</p>
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
 * What the site needs to run Natura well, each with a short fix.
 *
 * A row marked note is advice: shown in blue, never counted as a problem.
 *
 * @return array<int, array{ok: bool, label: string, value: string, fix: string, url: string, note?: bool}>
 */
function natura_site_status(): array {
	global $wp_version;
	$memory = wp_convert_hr_to_bytes( (string) WP_MEMORY_LIMIT );
	$webp   = wp_image_editor_supports( array( 'mime_type' => 'image/webp' ) );

	return array(
		array(
			'ok'    => function_exists( 'natura_core_meta_key' ),
			'label' => __( 'Natura Core plugin', 'natura' ),
			'value' => function_exists( 'natura_core_meta_key' ) ? __( 'Active', 'natura' ) : __( 'Not active', 'natura' ),
			'fix'   => __( 'Plant guides, problems, planting calendars and shopping lists come from this plugin. Activate it.', 'natura' ),
			'url'   => admin_url( 'plugins.php' ),
		),
		array(
			'ok'    => '' !== (string) get_option( 'permalink_structure' ),
			'label' => __( 'Readable addresses', 'natura' ),
			'value' => '' !== (string) get_option( 'permalink_structure' ) ? (string) get_option( 'permalink_structure' ) : __( 'Plain (?p=123)', 'natura' ),
			'fix'   => __( 'Guides need addresses like /plants/basil/. Choose "Post name" and save.', 'natura' ),
			'url'   => admin_url( 'options-permalink.php' ),
		),
		array(
			'ok'    => str_starts_with( home_url(), 'https://' ),
			'label' => __( 'HTTPS', 'natura' ),
			'value' => str_starts_with( home_url(), 'https://' ) ? __( 'On', 'natura' ) : __( 'Off', 'natura' ),
			'fix'   => __( 'Google, AdSense, and Pinterest expect a secure site. Ask your host for a free certificate, then change the site address.', 'natura' ),
			'url'   => admin_url( 'options-general.php' ),
		),
		array(
			'ok'    => $webp,
			'label' => __( 'WebP images', 'natura' ),
			'value' => $webp ? __( 'Supported', 'natura' ) : __( 'Not supported', 'natura' ),
			'fix'   => __( 'Without WebP, photos stay in JPEG, about a third heavier on phones. Ask your host to enable WebP in GD or Imagick.', 'natura' ),
			'url'   => admin_url( 'site-health.php' ),
		),
		array(
			'ok'    => natura_seo_plugin_active(),
			'label' => __( 'SEO plugin', 'natura' ),
			'value' => natura_seo_plugin_active() ? __( 'Active', 'natura' ) : __( 'None (the theme writes the basics)', 'natura' ),
			'fix'   => __( 'Optional. The theme writes titles, descriptions, Open Graph and structured data; an SEO plugin adds the sitemap and redirects.', 'natura' ),
			'url'   => admin_url( 'plugin-install.php?s=seo&tab=search&type=term' ),
			'note'  => true,
		),
		array(
			'ok'    => version_compare( PHP_VERSION, '8.1', '>=' ),
			'label' => __( 'PHP version', 'natura' ),
			'value' => PHP_VERSION,
			'fix'   => __( 'PHP 8.1 or newer is faster and still receives security fixes. Ask your host to switch.', 'natura' ),
			'url'   => admin_url( 'site-health.php?tab=debug' ),
		),
		array(
			'ok'    => $memory >= 128 * MB_IN_BYTES,
			'label' => __( 'WordPress memory', 'natura' ),
			'value' => size_format( $memory ),
			'fix'   => __( '128 MB or more avoids errors when uploading large photos.', 'natura' ),
			'url'   => admin_url( 'site-health.php?tab=debug' ),
		),
		array(
			'ok'    => true,
			'label' => __( 'WordPress', 'natura' ),
			'value' => (string) $wp_version,
			'fix'   => '',
			'url'   => '',
		),
		array(
			'ok'    => '' === natura_home_setting( 'natura_newsletter_code' ) || natura_newsletter_ready(),
			'label' => __( 'Newsletter form', 'natura' ),
			'value' => '' === natura_home_setting( 'natura_newsletter_code' ) ? __( 'Not set', 'natura' ) : ( natura_newsletter_ready() ? __( 'Working', 'natura' ) : __( 'Plugin missing', 'natura' ) ),
			'fix'   => __( 'The shortcode is set but its email plugin is not active, so the form is hidden. Activate the plugin or change the shortcode.', 'natura' ),
			'url'   => admin_url( 'plugins.php' ),
		),
	);
}

/**
 * The Dashboard tab: getting started in steps, site status, content, help.
 *
 * @param array{title: string, intro: string} $section Tab.
 */
function natura_render_dashboard_tab( array $section ): void {
	$checklist = natura_setup_checklist();
	$done      = count( array_filter( wp_list_pluck( $checklist, 'done' ) ) );
	$counts    = array();
	foreach ( array( 'plant', 'problem', 'post' ) as $type ) {
		$object = get_post_type_object( $type );
		if ( $object ) {
			$counts[ $type ] = array( (int) wp_count_posts( $type )->publish, $object->labels->name );
		}
	}
	$plants = $counts['plant'][0] ?? 0;
	$status = natura_site_status();
	$issues = count( array_filter( $status, static fn( array $row ): bool => ! $row['ok'] && empty( $row['note'] ) ) );
	$steps  = array(
		array(
			'done'  => 0 === $issues,
			'title' => __( 'Check that the site is ready', 'natura' ),
			'text'  => 0 === $issues ? __( 'Everything Natura needs is in place.', 'natura' ) : __( 'Some points need attention: see Site status.', 'natura' ),
		),
		array(
			'done'  => $done === count( $checklist ),
			'title' => __( 'Fill in the essentials', 'natura' ),
			/* translators: 1: settings done, 2: all settings. */
			'text'  => sprintf( __( '%1$d of %2$d done.', 'natura' ), $done, count( $checklist ) ),
		),
		array(
			'done'  => $plants >= 6,
			'title' => __( 'Publish your first plant guides', 'natura' ),
			/* translators: %d: number of published plant guides. */
			'text'  => sprintf( _n( '%d guide published. Aim for six before launch: lists and the home page look complete from there.', '%d guides published. Aim for six before launch: lists and the home page look complete from there.', $plants, 'natura' ), $plants ),
		),
	);
	?>
	<div class="natura-section-head">
		<h2><?php echo esc_html( $section['title'] ); ?></h2>
		<p><?php echo esc_html( $section['intro'] ); ?></p>
	</div>

	<ol class="natura-steps">
		<?php foreach ( $steps as $number => $step ) : ?>
			<li class="<?php echo $step['done'] ? 'is-done' : ''; ?>">
				<span class="natura-step-number" aria-hidden="true"><?php echo $step['done'] ? '<span class="dashicons dashicons-yes"></span>' : esc_html( (string) ( $number + 1 ) ); ?></span>
				<span>
					<strong><?php echo esc_html( $step['title'] ); ?></strong>
					<span><?php echo esc_html( $step['text'] ); ?><?php echo $step['done'] ? '<span class="screen-reader-text"> ' . esc_html__( '(done)', 'natura' ) . '</span>' : ''; ?></span>
				</span>
			</li>
		<?php endforeach; ?>
	</ol>

	<div class="natura-dashboard">
		<section class="natura-box">
			<h3>
				<?php
				/* translators: 1: settings done, 2: all settings. */
				printf( esc_html__( 'Essentials: %1$d of %2$d done', 'natura' ), (int) $done, count( $checklist ) );
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
			<h3><?php esc_html_e( 'Site status', 'natura' ); ?></h3>
			<ul class="natura-status">
				<?php foreach ( $status as $row ) : ?>
					<?php $state = $row['ok'] ? 'ok' : ( empty( $row['note'] ) ? 'warn' : 'info' ); ?>
					<li class="is-<?php echo esc_attr( $state ); ?>">
						<span class="dashicons <?php echo 'ok' === $state ? 'dashicons-yes-alt' : ( 'info' === $state ? 'dashicons-info' : 'dashicons-warning' ); ?>" aria-hidden="true"></span>
						<span class="natura-status-label"><?php echo esc_html( $row['label'] ); ?></span>
						<span class="natura-status-value"><?php echo esc_html( $row['value'] ); ?></span>
						<?php if ( ! $row['ok'] && $row['fix'] ) : ?>
							<span class="natura-status-fix">
								<?php echo esc_html( $row['fix'] ); ?>
								<?php if ( $row['url'] ) : ?>
									<a href="<?php echo esc_url( $row['url'] ); ?>"><?php echo empty( $row['note'] ) ? esc_html__( 'Fix it', 'natura' ) : esc_html__( 'See the options', 'natura' ); ?></a>
								<?php endif; ?>
							</span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>

		<section class="natura-box">
			<h3><?php esc_html_e( 'Your content', 'natura' ); ?></h3>
			<ul class="natura-counts">
				<?php foreach ( $counts as $type => list( $count, $name ) ) : ?>
					<li><a href="<?php echo esc_url( admin_url( 'edit.php?post_type=' . $type ) ); ?>"><strong><?php echo esc_html( number_format_i18n( $count ) ); ?></strong> <?php echo esc_html( $name ); ?></a></li>
				<?php endforeach; ?>
			</ul>
			<p><a class="button" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=plant' ) ); ?>"><?php esc_html_e( 'Add a plant guide', 'natura' ); ?></a></p>
		</section>

		<section class="natura-box">
			<h3><?php esc_html_e( 'Help', 'natura' ); ?></h3>
			<ul class="natura-help">
				<li><a href="https://github.com/ednajack22-cell/natura/blob/claude/site-design-ux-analysis-2hwbga/wordpress/README.md" target="_blank" rel="noopener"><?php esc_html_e( 'Theme guide (in French): how to fill a plant guide, the planting calendar, Pinterest, ads', 'natura' ); ?></a></li>
				<li><a href="<?php echo esc_url( admin_url( 'site-health.php' ) ); ?>"><?php esc_html_e( 'WordPress Site Health: full server check', 'natura' ); ?></a></li>
				<li><a href="https://support.google.com/adsense/answer/9724" target="_blank" rel="noopener"><?php esc_html_e( 'AdSense: getting started and policies', 'natura' ); ?></a></li>
				<li><a href="https://help.pinterest.com/en/business/article/claim-your-website" target="_blank" rel="noopener"><?php esc_html_e( 'Pinterest: claim your website', 'natura' ); ?></a></li>
			</ul>
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

/**
 * Search engine verification tags (Google Search Console, Bing), on every
 * page; the engines check the home page.
 */
add_action(
	'wp_head',
	static function (): void {
		$tags = array(
			'google-site-verification' => natura_sanitize_verification( natura_home_setting( 'natura_google_verify' ), '[A-Za-z0-9_-]{20,100}' ),
			'msvalidate.01'            => natura_sanitize_verification( natura_home_setting( 'natura_bing_verify' ), '[A-Fa-f0-9]{32}' ),
		);
		foreach ( array_filter( $tags ) as $name => $code ) {
			printf( '<meta name="%1$s" content="%2$s">' . "\n", esc_attr( $name ), esc_attr( $code ) );
		}
	},
	1
);

/**
 * Google Analytics 4 with Google consent mode: storage is denied until the
 * visitor accepts in a consent banner, in the EU, UK and Switzerland (or
 * everywhere). Logged-in editors are not counted.
 */
add_action(
	'wp_head',
	static function (): void {
		$id = strtoupper( trim( natura_home_setting( 'natura_ga4_id' ) ) );
		if ( ! preg_match( '/^G-[A-Z0-9]{4,16}$/', $id ) || current_user_can( 'edit_posts' ) ) {
			return;
		}
		$denied = array(
			'ad_storage'         => 'denied',
			'ad_user_data'       => 'denied',
			'ad_personalization' => 'denied',
			'analytics_storage'  => 'denied',
			'wait_for_update'    => 500,
		);
		if ( 'all' !== natura_home_setting( 'natura_ga4_consent' ) ) {
			// EEA, UK, Switzerland.
			$denied['region'] = array( 'AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IS', 'IE', 'IT', 'LV', 'LI', 'LT', 'LU', 'MT', 'NL', 'NO', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE', 'GB', 'CH' );
		}
		printf(
			'<script async src="%1$s"></script>' . "\n" .
			'<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag("consent","default",%2$s);gtag("js",new Date());gtag("config",%3$s);</script>' . "\n",
			esc_url( 'https://www.googletagmanager.com/gtag/js?id=' . rawurlencode( $id ) ),
			wp_json_encode( $denied ),
			wp_json_encode( $id )
		);
	},
	2
);

