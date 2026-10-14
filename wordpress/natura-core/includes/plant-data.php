<?php
/**
 * Structured plant data: the planting calendar of each guide.
 *
 * Free-text facts ("60–80 days after planting out") read well but cannot be
 * listed or linked. The months can: they are stored one meta row per month
 * and activity (sow, plant out, harvest), so "what to do this month" is one
 * plain meta query. The home page's "This month" strip uses them; the monthly
 * calendar pages will too.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Calendar activities: meta key suffix => label.
 *
 * @return array<string, string>
 */
function natura_core_month_activities(): array {
	return array(
		'sow'     => __( 'Sow', 'natura-core' ),
		'plant'   => __( 'Plant out', 'natura-core' ),
		'harvest' => __( 'Harvest', 'natura-core' ),
	);
}

/**
 * Month slugs, 1 => january.
 *
 * @return array<int, string>
 */
function natura_core_month_slugs(): array {
	return array( 1 => 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december' );
}

/**
 * Registers the month fields.
 */
function natura_core_register_plant_data(): void {
	foreach ( array_keys( natura_core_month_activities() ) as $activity ) {
		register_post_meta(
			'plant',
			natura_core_meta_key( $activity . '_month' ),
			array(
				'type'          => 'integer',
				'single'        => false,
				'show_in_rest'  => true,
				'auth_callback' => 'natura_core_can_edit_meta',
			)
		);
	}
}
add_action( 'init', 'natura_core_register_plant_data', 5 );

/**
 * The months set for one activity of a plant, sorted.
 *
 * @param int    $post_id  Plant ID.
 * @param string $activity sow, plant, or harvest.
 * @return int[]
 */
function natura_core_plant_months( int $post_id, string $activity ): array {
	$months = array_map( 'intval', (array) get_post_meta( $post_id, natura_core_meta_key( $activity . '_month' ) ) );
	$months = array_values( array_unique( array_filter( $months, static fn( int $m ): bool => $m >= 1 && $m <= 12 ) ) );
	sort( $months );

	return $months;
}

/**
 * Replaces the months of one activity.
 *
 * @param int    $post_id  Plant ID.
 * @param string $activity sow, plant, or harvest.
 * @param int[]  $months   Months, 1–12.
 */
function natura_core_set_plant_months( int $post_id, string $activity, array $months ): void {
	$key = natura_core_meta_key( $activity . '_month' );
	delete_post_meta( $post_id, $key );
	foreach ( array_unique( array_map( 'intval', $months ) ) as $month ) {
		if ( $month >= 1 && $month <= 12 ) {
			add_post_meta( $post_id, $key, $month );
		}
	}
}

add_action(
	'add_meta_boxes_plant',
	static function (): void {
		add_meta_box( 'natura-plant-calendar', __( 'Planting calendar', 'natura-core' ), 'natura_core_render_calendar_box', 'plant', 'normal', 'high' );
	}
);

/**
 * Prints the month grid: one row per activity, one checkbox per month.
 *
 * @param WP_Post $post Plant being edited.
 */
function natura_core_render_calendar_box( WP_Post $post ): void {
	natura_core_nonce_field();
	printf( '<p class="description">%s</p>', esc_html__( 'Tick the months for a temperate climate such as the UK or northern Europe. They fill the "This month" strip on the home page.', 'natura-core' ) );

	echo '<table class="natura-months"><thead><tr><th></th>';
	foreach ( natura_core_month_slugs() as $number => $slug ) {
		printf( '<th scope="col" title="%s">%s</th>', esc_attr( ucfirst( $slug ) ), esc_html( strtoupper( substr( $slug, 0, 1 ) ) ) );
	}
	echo '</tr></thead><tbody>';

	foreach ( natura_core_month_activities() as $activity => $label ) {
		$set = natura_core_plant_months( $post->ID, $activity );
		printf( '<tr><th scope="row">%s</th>', esc_html( $label ) );
		// Always submitted, so unticking every month clears the row.
		printf( '<input type="hidden" name="natura[months][%s][]" value="0">', esc_attr( $activity ) );
		foreach ( natura_core_month_slugs() as $number => $slug ) {
			printf(
				'<td><input type="checkbox" name="natura[months][%1$s][]" value="%2$d" aria-label="%3$s"%4$s></td>',
				esc_attr( $activity ),
				(int) $number,
				esc_attr( $label . ' — ' . ucfirst( $slug ) ),
				checked( in_array( $number, $set, true ), true, false )
			);
		}
		echo '</tr>';
	}
	echo '</tbody></table>';
}

/**
 * Saves the months.
 *
 * @param int $post_id Plant ID.
 */
function natura_core_save_plant_months( int $post_id ): void {
	$input = natura_core_submitted_fields( $post_id );
	if ( null === $input || ! isset( $input['months'] ) || ! is_array( $input['months'] ) ) {
		return;
	}

	foreach ( array_keys( natura_core_month_activities() ) as $activity ) {
		$rows = isset( $input['months'][ $activity ] ) && is_array( $input['months'][ $activity ] ) ? $input['months'][ $activity ] : array();
		natura_core_set_plant_months( $post_id, $activity, array_map( 'absint', $rows ) );
	}
}
add_action( 'save_post_plant', 'natura_core_save_plant_months' );
