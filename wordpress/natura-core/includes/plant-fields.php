<?php
/**
 * The fields of a plant guide.
 *
 * The long-form guide is written in the normal editor. The facts a reader
 * scans first, the shopping list, the FAQ, and the sources are separate
 * fields, so every guide shows them in the same place and the same way, and
 * none can be forgotten.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Single-value fields: key => [label, help, type].
 *
 * @return array<string, array{label: string, help: string, type: string, options?: array<string, string>}>
 */
function natura_core_plant_facts(): array {
	return array(
		'short_name'     => array(
			'label' => __( 'Short name', 'natura-core' ),
			'help'  => __( 'The plant\'s everyday name, used in lists and on the monthly calendar. Example: Cherry tomato', 'natura-core' ),
			'type'  => 'text',
		),
		'botanical_name' => array(
			'label' => __( 'Botanical name', 'natura-core' ),
			'help'  => __( 'Shown in italics under the title. Example: Solanum lycopersicum var. cerasiforme', 'natura-core' ),
			'type'  => 'text',
		),
		'difficulty'     => array(
			'label'   => __( 'Difficulty', 'natura-core' ),
			'help'    => '',
			'type'    => 'select',
			'options' => array(
				''            => __( '— Choose —', 'natura-core' ),
				'Easy'        => __( 'Easy', 'natura-core' ),
				'Moderate'    => __( 'Moderate', 'natura-core' ),
				'Challenging' => __( 'Challenging', 'natura-core' ),
			),
		),
		'sun'            => array(
			'label' => __( 'Sun', 'natura-core' ),
			'help'  => __( 'Example: 6–8 hours of direct sun', 'natura-core' ),
			'type'  => 'text',
		),
		'pot_size'       => array(
			'label' => __( 'Pot size', 'natura-core' ),
			'help'  => __( 'Example: 20–30 L (5–8 gal) per plant', 'natura-core' ),
			'type'  => 'text',
		),
		'watering'       => array(
			'label' => __( 'Watering', 'natura-core' ),
			'help'  => __( 'Example: Deeply, when the top 2–3 cm feels dry', 'natura-core' ),
			'type'  => 'text',
		),
		'harvest'        => array(
			'label' => __( 'First harvest', 'natura-core' ),
			'help'  => __( 'Example: 60–80 days after planting out', 'natura-core' ),
			'type'  => 'text',
		),
		'season'         => array(
			'label' => __( 'Growing season', 'natura-core' ),
			'help'  => __( 'Example: Late spring to early autumn', 'natura-core' ),
			'type'  => 'text',
		),
		'hardiness'      => array(
			'label'   => __( 'RHS hardiness rating', 'natura-core' ),
			'help'    => __( 'From the RHS page of this plant (rhs.org.uk/plants), for example tomato H1c, strawberry H6. Used by the Frost risk check.', 'natura-core' ),
			'type'    => 'select',
			'options' => array(
				''    => __( '— Choose —', 'natura-core' ),
				'H1a' => 'H1a — ' . __( 'under glass all year (above 15 °C)', 'natura-core' ),
				'H1b' => 'H1b — ' . __( 'outdoors in summer only (10 to 15 °C)', 'natura-core' ),
				'H1c' => 'H1c — ' . __( 'outdoors in summer only (5 to 10 °C)', 'natura-core' ),
				'H2'  => 'H2 — ' . __( 'tender, no frost (1 to 5 °C)', 'natura-core' ),
				'H3'  => 'H3 — ' . __( 'half hardy (−5 to 1 °C)', 'natura-core' ),
				'H4'  => 'H4 — ' . __( 'hardy, average winter (−10 to −5 °C)', 'natura-core' ),
				'H5'  => 'H5 — ' . __( 'hardy, cold winter (−15 to −10 °C)', 'natura-core' ),
				'H6'  => 'H6 — ' . __( 'hardy, very cold winter (−20 to −15 °C)', 'natura-core' ),
				'H7'  => 'H7 — ' . __( 'very hardy (below −20 °C)', 'natura-core' ),
			),
		),
		'pin_image'      => array(
			'label' => __( 'Pinterest image', 'natura-core' ),
			'help'  => __( 'A vertical image (2:3, e.g. 1000 × 1500 px) with the title on it. Used by the "Save" button. Falls back to the main photo.', 'natura-core' ),
			'type'  => 'image',
		),
	);
}

/**
 * Registers every field, so it is typed, validated, and available to the
 * block editor and the REST API for editors.
 */
function natura_core_register_plant_meta(): void {
	foreach ( natura_core_plant_facts() as $key => $field ) {
		register_post_meta(
			'plant',
			natura_core_meta_key( $key ),
			array(
				'type'          => 'image' === $field['type'] ? 'integer' : 'string',
				'single'        => true,
				'show_in_rest'  => true,
				'auth_callback' => 'natura_core_can_edit_meta',
			)
		);
	}

	natura_core_register_list_meta( 'plant', natura_core_shared_lists() + natura_core_plant_lists() );
}
add_action( 'init', 'natura_core_register_plant_meta' );

/**
 * Lists only plant guides have: the key points (shown as "In short" near the
 * top, the short answer Google often quotes) and the varieties to try (cards
 * like the RHS "Recommended varieties"; a link may be an affiliate link to
 * seeds or plants).
 *
 * @return array<string, array{label: string, help: string, add: string, fields: array<string, array{label: string, type: string}>}>
 */
function natura_core_plant_lists(): array {
	return array(
		'key_points' => array(
			'label'  => __( 'In short (key points)', 'natura-core' ),
			'help'   => __( 'Three to five short sentences that answer the reader at once: the essentials of growing this plant in a pot. Only facts the guide itself explains.', 'natura-core' ),
			'add'    => __( 'Add a point', 'natura-core' ),
			'fields' => array(
				'point' => array( 'label' => __( 'Point', 'natura-core' ), 'type' => 'text' ),
			),
		),
		'varieties'  => array(
			'label'  => __( 'Varieties to try', 'natura-core' ),
			'help'   => __( 'Varieties that do well in pots, each with why. A link (seed or plant shop) is optional; affiliate links get the affiliate notice.', 'natura-core' ),
			'add'    => __( 'Add a variety', 'natura-core' ),
			'fields' => array(
				'name'  => array( 'label' => __( 'Variety', 'natura-core' ), 'type' => 'text' ),
				'note'  => array( 'label' => __( 'Why it suits a pot (one line)', 'natura-core' ), 'type' => 'text' ),
				'url'   => array( 'label' => __( 'Link (optional)', 'natura-core' ), 'type' => 'url' ),
				'image' => array( 'label' => __( 'Photo (optional)', 'natura-core' ), 'type' => 'image' ),
			),
		),
	);
}

add_action(
	'add_meta_boxes_plant',
	static function (): void {
		add_meta_box( 'natura-plant-facts', __( 'Quick facts', 'natura-core' ), 'natura_core_render_facts_box', 'plant', 'normal', 'high' );
		add_meta_box(
			'natura-plant-extra',
			__( 'In short, and varieties to try', 'natura-core' ),
			static fn( WP_Post $post ) => natura_core_render_lists( $post, natura_core_plant_lists() ),
			'plant',
			'normal',
			'high'
		);
		add_meta_box(
			'natura-plant-lists',
			__( 'Shopping list, FAQ, and sources', 'natura-core' ),
			static fn( WP_Post $post ) => natura_core_render_lists( $post, natura_core_shared_lists() ),
			'plant',
			'normal',
			'default'
		);
	}
);

/**
 * Prints the quick-facts box.
 *
 * @param WP_Post $post Plant being edited.
 */
function natura_core_render_facts_box( WP_Post $post ): void {
	natura_core_nonce_field();
	echo '<div class="natura-fields-grid">';

	foreach ( natura_core_plant_facts() as $key => $field ) {
		$id    = 'natura-' . $key;
		$name  = 'natura[' . $key . ']';
		$value = get_post_meta( $post->ID, natura_core_meta_key( $key ), true );

		echo '<div class="natura-field' . ( 'image' === $field['type'] ? ' natura-field-wide' : '' ) . '">';
		printf( '<label for="%s">%s</label>', esc_attr( $id ), esc_html( $field['label'] ) );

		if ( 'select' === $field['type'] ) {
			printf( '<select id="%s" name="%s">', esc_attr( $id ), esc_attr( $name ) );
			foreach ( $field['options'] as $option => $label ) {
				printf( '<option value="%s"%s>%s</option>', esc_attr( $option ), selected( $value, $option, false ), esc_html( $label ) );
			}
			echo '</select>';
		} elseif ( 'image' === $field['type'] ) {
			natura_core_render_image_picker( $name, absint( $value ), $id );
		} else {
			printf( '<input type="text" id="%s" name="%s" value="%s" class="widefat">', esc_attr( $id ), esc_attr( $name ), esc_attr( (string) $value ) );
		}

		if ( $field['help'] ) {
			printf( '<p class="description">%s</p>', esc_html( $field['help'] ) );
		}
		echo '</div>';
	}

	echo '</div>';
	printf( '<p class="description natura-fields-note">%s</p>', esc_html__( 'The summary under the title comes from the "Excerpt" panel. Choose the plant type (Vegetables, Herbs, Fruit) in the "Plant types" panel.', 'natura-core' ) );
}

/**
 * Saves the fields. Only for a real save by someone allowed to edit the plant.
 *
 * @param int $post_id Plant ID.
 */
function natura_core_save_plant( int $post_id ): void {
	$input = natura_core_submitted_fields( $post_id );
	if ( null === $input ) {
		return;
	}

	foreach ( natura_core_plant_facts() as $key => $field ) {
		$raw  = isset( $input[ $key ] ) && is_scalar( $input[ $key ] ) ? (string) $input[ $key ] : '';
		$meta = natura_core_meta_key( $key );

		if ( 'image' === $field['type'] ) {
			$image_id = natura_core_clean_image( $raw );
			if ( $image_id ) {
				update_post_meta( $post_id, $meta, $image_id );
			} else {
				delete_post_meta( $post_id, $meta );
			}
			continue;
		}

		$value = sanitize_text_field( $raw );
		if ( 'select' === $field['type'] && ! array_key_exists( $value, $field['options'] ) ) {
			$value = '';
		}

		if ( '' === $value ) {
			delete_post_meta( $post_id, $meta );
		} else {
			update_post_meta( $post_id, $meta, $value );
		}
	}

	natura_core_save_lists( $post_id, natura_core_shared_lists() + natura_core_plant_lists(), $input );
}
add_action( 'save_post_plant', 'natura_core_save_plant' );
