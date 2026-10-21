<?php
/**
 * AdSense placements.
 *
 * Set the publisher ID and the ad unit ID under Appearance → Customize →
 * Natura: ads. Until both are set, visitors see nothing at all, and logged-in
 * administrators see a dashed outline where each ad will go, so placements can
 * be judged before ads are switched on.
 *
 * Live units reserve their height before they load, so the page does not jump
 * when an ad fills. Layout shift is a ranking signal.
 *
 * Before switching ads on for visitors in the EU, UK, or Switzerland, set up
 * Google's consent message (AdSense → Privacy & messaging) or a certified
 * consent platform.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'customize_register',
	static function ( WP_Customize_Manager $customizer ): void {
		$customizer->add_section(
			'natura_ads',
			array(
				'title'       => __( 'Natura: ads', 'natura' ),
				'description' => __( 'Both IDs come from your AdSense account. Leave them empty to show no ads.', 'natura' ),
				'priority'    => 160,
			)
		);

		$fields = array(
			'natura_adsense_client'          => array( __( 'Publisher ID', 'natura' ), 'ca-pub-1234567890123456' ),
			'natura_adsense_slot'            => array( __( 'In-content ad unit ID', 'natura' ), '1234567890' ),
			'natura_adsense_slot_sidebar'    => array( __( 'Sidebar ad unit ID (300 × 600, optional: the in-content unit is used otherwise)', 'natura' ), '1234567890' ),
			'natura_adsense_slot_multiplex'  => array( __( 'Multiplex ad unit ID (end of guides, optional: no ad there otherwise)', 'natura' ), '1234567890' ),
		);

		foreach ( $fields as $id => list( $label, $placeholder ) ) {
			$customizer->add_setting(
				$id,
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'natura_sanitize_ad_id',
				)
			);
			$customizer->add_control(
				$id,
				array(
					'label'       => $label,
					'section'     => 'natura_ads',
					'type'        => 'text',
					'input_attrs' => array( 'placeholder' => $placeholder ),
				)
			);
		}
	}
);

/**
 * Keeps only the characters an AdSense ID can contain.
 *
 * @param string $value Raw value.
 */
function natura_sanitize_ad_id( $value ): string {
	return preg_replace( '/[^a-z0-9-]/', '', strtolower( (string) $value ) );
}

/**
 * Whether ads are configured.
 */
function natura_ads_enabled(): bool {
	return (bool) get_theme_mod( 'natura_adsense_client' ) && (bool) get_theme_mod( 'natura_adsense_slot' );
}

add_action(
	'wp_enqueue_scripts',
	static function (): void {
		if ( ! natura_ads_enabled() ) {
			return;
		}
		wp_enqueue_script(
			'natura-adsense',
			add_query_arg( 'client', rawurlencode( get_theme_mod( 'natura_adsense_client' ) ), 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js' ),
			array(),
			null, // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- Google serves the current version.
			array( 'strategy' => 'async' )
		);
	}
);

add_filter(
	'script_loader_tag',
	static function ( string $tag, string $handle ): string {
		return 'natura-adsense' === $handle ? str_replace( ' src=', ' crossorigin="anonymous" src=', $tag ) : $tag;
	},
	10,
	2
);

/**
 * Ad formats: the unit used, how AdSense sizes it, and the label shown to
 * administrators before ads are switched on.
 *
 * - in-content: responsive unit between sections and in lists;
 * - sidebar: 300 × 600 in the sticky right column of guides, the best-paid
 *   placement on long pages (Stitch "AdSense Revenue" screen);
 * - multiplex: a grid of native recommendations at the end of a guide.
 *
 * @return array<string, array{slot: string, attributes: string, size: string}>
 */
function natura_ad_formats(): array {
	$in_content = (string) get_theme_mod( 'natura_adsense_slot' );

	return array(
		'in-content' => array(
			'slot'       => $in_content,
			'attributes' => 'data-ad-format="auto" data-full-width-responsive="true"',
			'size'       => __( 'Responsive, 250–280 px high', 'natura' ),
		),
		'sidebar'    => array(
			'slot'       => (string) get_theme_mod( 'natura_adsense_slot_sidebar' ) ?: $in_content,
			'attributes' => 'data-ad-format="vertical"',
			'size'       => __( '300 × 600, sticky', 'natura' ),
		),
		'multiplex'  => array(
			'slot'       => (string) get_theme_mod( 'natura_adsense_slot_multiplex' ),
			'attributes' => 'data-ad-format="autorelaxed"',
			'size'       => __( 'Multiplex, grid of native ads', 'natura' ),
		),
	);
}

/**
 * Markup for one ad placement. Each format reserves its height before the ad
 * loads, so the page does not jump.
 *
 * @param string $placement Short name of the placement, shown to editors.
 * @param string $format    in-content, sidebar, or multiplex.
 * @param string $section   Switch on the Natura dashboard that can turn it off.
 */
function natura_ad_slot( string $placement, string $format = 'in-content', string $section = '' ): string {
	if ( '' !== $section && ! natura_section_enabled( $section ) ) {
		return '';
	}
	$formats = natura_ad_formats();
	$format  = isset( $formats[ $format ] ) ? $format : 'in-content';
	$unit    = $formats[ $format ];
	$class   = 'ad-slot ad-slot-' . $format;

	if ( natura_ads_enabled() ) {
		if ( '' === $unit['slot'] ) {
			return '';
		}
		return sprintf(
			'<aside class="%1$s" aria-label="%2$s"><span class="ad-slot-label">%2$s</span><ins class="adsbygoogle" style="display:block" data-ad-client="%3$s" data-ad-slot="%4$s" %5$s></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></aside>',
			esc_attr( $class ),
			esc_attr__( 'Advertisement', 'natura' ),
			esc_attr( get_theme_mod( 'natura_adsense_client' ) ),
			esc_attr( $unit['slot'] ),
			$unit['attributes']
		);
	}

	if ( current_user_can( 'edit_theme_options' ) ) {
		return sprintf(
			'<aside class="%s ad-slot-preview" aria-hidden="true"><span>%s</span><small>%s</small><small>%s</small></aside>',
			esc_attr( $class ),
			esc_html__( 'Ad placement (visible to administrators only)', 'natura' ),
			esc_html( $placement ),
			esc_html( $unit['size'] )
		);
	}

	return '';
}

/**
 * Prints the ad that sits after the first row of a list, once the third card
 * is out. Only on pages with at least six cards, so the rows after it can
 * still be filled (see "Cards and lists" in main.css), and only when an ad
 * is shown: an empty break would split the grid for nothing.
 *
 * @param int $count Cards printed so far.
 */
function natura_the_list_break( int $count ): void {
	if ( 3 !== $count || $GLOBALS['wp_query']->post_count < 6 ) {
		return;
	}
	$ad = natura_ad_slot( __( 'In the list, after the first row', 'natura' ), 'in-content', 'ads_lists' );
	if ( '' !== $ad ) {
		echo '<div class="plant-grid-break">' . $ad . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot().
	}
}
