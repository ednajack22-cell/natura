<?php
/**
 * Plant guide helpers: quick facts, plant type, and breadcrumbs. The helpers
 * every guide shares are in content.php.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * The quick facts that have a value, in display order.
 *
 * @return array<int, array{label: string, value: string}>
 */
function natura_plant_quick_facts(): array {
	$labels = array(
		'sun'        => __( 'Sun', 'natura' ),
		'pot_size'   => __( 'Pot size', 'natura' ),
		'watering'   => __( 'Water', 'natura' ),
		'harvest'    => __( 'Harvest', 'natura' ),
		'difficulty' => __( 'Difficulty', 'natura' ),
		'season'     => __( 'Season', 'natura' ),
	);

	$facts = array();
	foreach ( $labels as $key => $label ) {
		$value = (string) natura_field( $key );
		if ( '' !== $value ) {
			$facts[] = array(
				'label' => $label,
				'value' => $value,
			);
		}
	}

	return $facts;
}

/**
 * The plant's main type (Vegetables, Herbs, Fruit), if any.
 */
function natura_plant_type(): ?WP_Term {
	$terms = get_the_terms( get_the_ID(), 'plant_type' );

	return is_array( $terms ) && $terms ? $terms[0] : null;
}

/**
 * Breadcrumb trail for a plant guide.
 *
 * @return array<int, array{name: string, url: string}>
 */
function natura_plant_breadcrumbs(): array {
	$trail = array(
		natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
		natura_crumb( __( 'Plants', 'natura' ), (string) get_post_type_archive_link( 'plant' ) ),
	);

	$type = natura_plant_type();
	if ( $type ) {
		$trail[] = natura_crumb( $type->name, (string) get_term_link( $type ) );
	}

	$trail[] = natura_crumb( get_the_title(), (string) get_permalink() );

	return $trail;
}
