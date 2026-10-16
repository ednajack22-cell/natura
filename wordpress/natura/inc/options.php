<?php
/**
 * The Natura dashboard (admin menu "Natura"): one page to show or hide each
 * block of the site, and a checklist of what is still to set up.
 *
 * Every block is shown by default; unticking one hides it for visitors on
 * every page that uses it. A block also stays hidden while it has nothing to
 * show (no products, no newsletter form…), whatever the switch says.
 *
 * Texts, photos and addresses stay in Appearance → Customize, where they can
 * be previewed; this page only switches blocks on and off.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * The blocks that can be switched off, by page.
 *
 * @return array<string, array{title: string, items: array<string, array{0: string, 1: string}>}>
 */
function natura_section_groups(): array {
	return array(
		'home'   => array(
			'title' => __( 'Home page', 'natura' ),
			'items' => array(
				'home_topics'      => array( __( 'Topic bar', 'natura' ), __( 'Buttons under the opening photo: plant types, problems, care topics.', 'natura' ) ),
				'home_new'         => array( __( 'New on Natura', 'natura' ), __( 'The newest guide in large, and the next ones as a list.', 'natura' ) ),
				'home_month'       => array( __( 'In your pots this month', 'natura' ), __( 'Plants to sow, plant out, or harvest this month, and the other jobs.', 'natura' ) ),
				'home_more_guides' => array( __( 'More growing guides', 'natura' ), __( 'Cards for the plant guides the list above did not show.', 'natura' ) ),
				'home_problems'    => array( __( 'Something wrong with a plant?', 'natura' ), __( 'The dark band with the plant problem guides.', 'natura' ) ),
				'home_picks'       => array( __( 'Our picks (affiliate products)', 'natura' ), __( 'Three products from your guides\' shopping lists. Switch off until you have products you recommend.', 'natura' ) ),
				'home_pins'        => array( __( 'Save ideas for later (Pinterest)', 'natura' ), __( 'The guides\' vertical Pinterest images.', 'natura' ) ),
				'home_more_posts'  => array( __( 'More from Plant Care', 'natura' ), __( 'Articles the list at the top did not show.', 'natura' ) ),
				'home_author'      => array( __( 'Who writes Natura', 'natura' ), __( 'Shown once your name and bio are filled in the Customizer.', 'natura' ) ),
				'home_newsletter'  => array( __( 'Newsletter', 'natura' ), __( 'Shown once your form shortcode is set in the Customizer.', 'natura' ) ),
			),
		),
		'guides' => array(
			'title' => __( 'Guides (plants, problems, articles)', 'natura' ),
			'items' => array(
				'guide_products'   => array( __( 'What you need (affiliate products)', 'natura' ), __( 'The shopping list after section 2, and the affiliate notice at the top.', 'natura' ) ),
				'guide_pin_header' => array( __( 'Save to Pinterest button', 'natura' ), __( 'Next to the author and date, at the top.', 'natura' ) ),
				'guide_pin_block'  => array( __( 'Save this guide (Pinterest)', 'natura' ), __( 'The vertical image after section 3.', 'natura' ) ),
				'guide_side_pin'   => array( __( 'Pinterest box in the side column', 'natura' ), '' ),
				'guide_read_next'  => array( __( 'Read next', 'natura' ), __( 'Three guides in the side column.', 'natura' ) ),
				'guide_author'     => array( __( 'Author box', 'natura' ), __( 'At the end of the text.', 'natura' ) ),
				'guide_related'    => array( __( 'Related guides', 'natura' ), __( 'Common problems, plants affected, more guides: under the text.', 'natura' ) ),
			),
		),
		'lists'  => array(
			'title' => __( 'Lists of guides', 'natura' ),
			'items' => array(
				'list_problem_band' => array( __( 'Plant looking unwell? band', 'natura' ), __( 'Under the plant list, towards the problem guides.', 'natura' ) ),
			),
		),
		'ads'    => array(
			'title' => __( 'Advertising (AdSense)', 'natura' ),
			'items' => array(
				'ads_home'       => array( __( 'Home page ad', 'natura' ), __( 'One ad, after the guides.', 'natura' ) ),
				'ads_guide_text' => array( __( 'Ads in the text of guides', 'natura' ), __( 'After sections 1 and 5.', 'natura' ) ),
				'ads_sidebar'    => array( __( 'Side column ad (300 × 600)', 'natura' ), __( 'Wide screens only.', 'natura' ) ),
				'ads_guide_end'  => array( __( 'End of guide ad (multiplex)', 'natura' ), '' ),
				'ads_lists'      => array( __( 'Ads in lists', 'natura' ), __( 'After the first row of cards, and on the Plant Care page.', 'natura' ) ),
			),
		),
		'site'   => array(
			'title' => __( 'Whole site', 'natura' ),
			'items' => array(
				'site_header_search' => array( __( 'Search in the header', 'natura' ), __( 'The home page always has its own search instead.', 'natura' ) ),
				'site_footer_follow' => array( __( 'Follow us on Pinterest (footer)', 'natura' ), __( 'Shown once your Pinterest profile address is set.', 'natura' ) ),
			),
		),
	);
}

/**
 * Whether a block is switched on. Blocks are on unless switched off here.
 *
 * @param string $key Block key from natura_section_groups().
 */
function natura_section_enabled( string $key ): bool {
	$saved = get_option( 'natura_sections', array() );

	return ! is_array( $saved ) || ! isset( $saved[ $key ] ) || (bool) $saved[ $key ];
}

/**
 * Keeps only known blocks, as true or false.
 *
 * @param mixed $input Submitted values.
 * @return array<string, bool>
 */
function natura_sanitize_sections( $input ): array {
	$input = is_array( $input ) ? $input : array();
	$clean = array();
	foreach ( natura_section_groups() as $group ) {
		foreach ( array_keys( $group['items'] ) as $key ) {
			$clean[ $key ] = ! empty( $input[ $key ] );
		}
	}

	return $clean;
}

add_action(
	'admin_init',
	static function (): void {
		register_setting(
			'natura_sections',
			'natura_sections',
			array(
				'type'              => 'array',
				'sanitize_callback' => 'natura_sanitize_sections',
				'default'           => array(),
			)
		);
	}
);

// Saving goes through options.php, which checks the nonce and asks for
// manage_options by default; the page itself is for edit_theme_options.
add_filter( 'option_page_capability_natura_sections', static fn(): string => 'edit_theme_options' );

add_action(
	'admin_menu',
	static function (): void {
		$hook = add_menu_page(
			__( 'Natura', 'natura' ),
			__( 'Natura', 'natura' ),
			'edit_theme_options',
			'natura',
			'natura_render_dashboard',
			'dashicons-carrot',
			3
		);
		add_action( 'admin_print_styles-' . $hook, 'natura_dashboard_styles' );
	}
);

/**
 * What is still to set up, with where to do it.
 *
 * @return array<int, array{done: bool, label: string, url: string}>
 */
function natura_setup_checklist(): array {
	$customize = static fn( string $section ): string => admin_url( 'customize.php?autofocus[section]=' . $section );

	return array(
		array(
			'done'  => (bool) natura_home_hero_photo(),
			'label' => __( 'Opening photo of your own balcony or pots', 'natura' ),
			'url'   => $customize( 'natura_home' ),
		),
		array(
			'done'  => (bool) natura_home_author(),
			'label' => __( 'Who writes Natura: your name, photo, and short bio', 'natura' ),
			'url'   => $customize( 'natura_home' ),
		),
		array(
			'done'  => '' !== natura_home_setting( 'natura_pinterest_url' ),
			'label' => __( 'Pinterest profile address', 'natura' ),
			'url'   => $customize( 'natura_home' ),
		),
		array(
			'done'  => '' !== natura_sanitize_pinterest_code( natura_home_setting( 'natura_pinterest_verify' ) ),
			'label' => __( 'Pinterest site verification (claim your website)', 'natura' ),
			'url'   => $customize( 'natura_home' ),
		),
		array(
			'done'  => '' !== natura_home_setting( 'natura_newsletter_code' ),
			'label' => __( 'Newsletter form', 'natura' ),
			'url'   => $customize( 'natura_home' ),
		),
		array(
			'done'  => function_exists( 'natura_ads_enabled' ) && natura_ads_enabled(),
			'label' => __( 'AdSense publisher ID and ad units', 'natura' ),
			'url'   => $customize( 'natura_ads' ),
		),
	);
}

/**
 * Prints the dashboard page.
 */
function natura_render_dashboard(): void {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'Sorry, you are not allowed to change the site\'s settings.', 'natura' ) );
	}
	$checklist = natura_setup_checklist();
	$done      = count( array_filter( wp_list_pluck( $checklist, 'done' ) ) );
	?>
	<div class="wrap natura-dashboard">
		<h1><?php esc_html_e( 'Natura', 'natura' ); ?></h1>
		<p class="natura-dashboard-intro">
			<?php esc_html_e( 'Show or hide each block of your site. A block also stays hidden while it has nothing to show. Texts, photos, and addresses are set in the Customizer, where you can preview them.', 'natura' ); ?>
			<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Open the Customizer', 'natura' ); ?></a>
		</p>

		<?php settings_errors(); // "Settings saved." after options.php sends the reader back here. ?>

		<div class="natura-dashboard-grid">
			<form method="post" action="options.php" class="natura-dashboard-main">
				<?php settings_fields( 'natura_sections' ); ?>
				<?php foreach ( natura_section_groups() as $group_key => $group ) : ?>
					<section class="natura-card">
						<h2><?php echo esc_html( $group['title'] ); ?></h2>
						<?php foreach ( $group['items'] as $key => list( $label, $help ) ) : ?>
							<div class="natura-switch-row">
								<input type="hidden" name="natura_sections[<?php echo esc_attr( $key ); ?>]" value="0">
								<input class="natura-switch" type="checkbox" role="switch" id="natura-<?php echo esc_attr( $key ); ?>" name="natura_sections[<?php echo esc_attr( $key ); ?>]" value="1" <?php checked( natura_section_enabled( $key ) ); ?>>
								<label for="natura-<?php echo esc_attr( $key ); ?>">
									<strong><?php echo esc_html( $label ); ?></strong>
									<?php if ( $help ) : ?>
										<span><?php echo esc_html( $help ); ?></span>
									<?php endif; ?>
								</label>
							</div>
						<?php endforeach; ?>
					</section>
				<?php endforeach; ?>
				<?php submit_button( __( 'Save changes', 'natura' ) ); ?>
			</form>

			<aside class="natura-dashboard-side">
				<section class="natura-card">
					<h2>
						<?php
						/* translators: 1: settings done, 2: all settings. */
						printf( esc_html__( 'Setup: %1$d of %2$d done', 'natura' ), (int) $done, count( $checklist ) );
						?>
					</h2>
					<ul class="natura-checklist">
						<?php foreach ( $checklist as $item ) : ?>
							<li class="<?php echo $item['done'] ? 'is-done' : ''; ?>">
								<span class="dashicons <?php echo $item['done'] ? 'dashicons-yes-alt' : 'dashicons-marker'; ?>" aria-hidden="true"></span>
								<?php if ( $item['done'] ) : ?>
									<span><?php echo esc_html( $item['label'] ); ?> <span class="screen-reader-text"><?php esc_html_e( '(done)', 'natura' ); ?></span></span>
								<?php else : ?>
									<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</section>
				<section class="natura-card">
					<h2><?php esc_html_e( 'Quick links', 'natura' ); ?></h2>
					<ul class="natura-links">
						<li><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=natura_home' ) ); ?>"><?php esc_html_e( 'Home page texts and photos', 'natura' ); ?></a></li>
						<li><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=natura_ads' ) ); ?>"><?php esc_html_e( 'AdSense settings', 'natura' ); ?></a></li>
						<li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Menus', 'natura' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'View the site', 'natura' ); ?></a></li>
					</ul>
				</section>
			</aside>
		</div>
	</div>
	<?php
}

/**
 * Styles for the dashboard page only.
 */
function natura_dashboard_styles(): void {
	?>
	<style>
		.natura-dashboard-intro { max-width: 760px; font-size: 14px; }
		.natura-dashboard-grid { display: grid; gap: 20px; align-items: start; }
		@media (min-width: 1100px) { .natura-dashboard-grid { grid-template-columns: minmax(0, 1fr) 340px; } }
		.natura-card { margin: 0 0 20px; padding: 16px 20px; border: 1px solid #dcdcde; border-radius: 4px; background: #fff; }
		.natura-card h2 { margin: 0 0 8px; font-size: 15px; }
		.natura-switch-row { display: flex; gap: 14px; align-items: flex-start; padding: 12px 0; border-top: 1px solid #f0f0f1; }
		.natura-switch-row:first-of-type { border-top: 0; }
		.natura-switch-row label { display: grid; gap: 2px; cursor: pointer; }
		.natura-switch-row label span { color: #646970; }
		.natura-switch { appearance: none; position: relative; flex: none; width: 40px !important; height: 22px !important; margin: 0 !important; border: 0 !important; border-radius: 11px !important; background: #c3c4c7 !important; cursor: pointer; transition: background .15s; box-shadow: none !important; }
		.natura-switch::before { position: absolute; top: 3px; left: 3px; width: 16px !important; height: 16px !important; margin: 0 !important; border-radius: 50%; background: #fff; content: "" !important; transition: transform .15s; }
		.natura-switch:checked { background: #1b3b2b !important; }
		.natura-switch:checked::before { transform: translateX(18px); }
		.natura-switch:focus-visible { outline: 2px solid #2271b1; outline-offset: 2px; }
		.natura-checklist, .natura-links { margin: 0; }
		.natura-checklist li { display: flex; gap: 8px; align-items: flex-start; }
		.natura-checklist .dashicons-yes-alt { color: #1b7a3d; }
		.natura-checklist .dashicons-marker { color: #b0532a; }
		.natura-checklist .is-done span:not(.dashicons) { color: #646970; }
	</style>
	<?php
}
