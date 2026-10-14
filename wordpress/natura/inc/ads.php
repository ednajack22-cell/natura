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
			'natura_adsense_client' => array( __( 'Publisher ID', 'natura' ), 'ca-pub-1234567890123456' ),
			'natura_adsense_slot'   => array( __( 'In-content ad unit ID', 'natura' ), '1234567890' ),
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
 * Markup for one ad placement.
 *
 * @param string $placement Short name of the placement, shown to editors.
 */
function natura_ad_slot( string $placement ): string {
	if ( natura_ads_enabled() ) {
		return sprintf(
			'<aside class="ad-slot" aria-label="%1$s"><span class="ad-slot-label">%1$s</span><ins class="adsbygoogle" style="display:block" data-ad-client="%2$s" data-ad-slot="%3$s" data-ad-format="auto" data-full-width-responsive="true"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></aside>',
			esc_attr__( 'Advertisement', 'natura' ),
			esc_attr( get_theme_mod( 'natura_adsense_client' ) ),
			esc_attr( get_theme_mod( 'natura_adsense_slot' ) )
		);
	}

	if ( current_user_can( 'edit_theme_options' ) ) {
		return sprintf(
			'<aside class="ad-slot ad-slot-preview" aria-hidden="true"><span>%s</span><small>%s</small></aside>',
			esc_html__( 'Ad placement (visible to administrators only)', 'natura' ),
			esc_html( $placement )
		);
	}

	return '';
}
