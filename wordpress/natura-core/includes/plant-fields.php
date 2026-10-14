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
		'pin_image'      => array(
			'label' => __( 'Pinterest image', 'natura-core' ),
			'help'  => __( 'A vertical image (2:3, e.g. 1000 × 1500 px) with the title on it. Used by the "Save" button. Falls back to the main photo.', 'natura-core' ),
			'type'  => 'image',
		),
	);
}

/**
 * Repeating fields: key => [label, help, sub-fields].
 *
 * @return array<string, array{label: string, help: string, add: string, fields: array<string, array{label: string, type: string}>}>
 */
function natura_core_plant_lists(): array {
	return array(
		'products' => array(
			'label'  => __( 'What you need', 'natura-core' ),
			'help'   => __( 'The shopping list shown in the guide. Paste the affiliate link in "Link"; leave it empty and the item shows without a button.', 'natura-core' ),
			'add'    => __( 'Add item', 'natura-core' ),
			'fields' => array(
				'name' => array( 'label' => __( 'Item', 'natura-core' ), 'type' => 'text' ),
				'note' => array( 'label' => __( 'Why it matters (one line)', 'natura-core' ), 'type' => 'text' ),
				'url'  => array( 'label' => __( 'Link', 'natura-core' ), 'type' => 'url' ),
			),
		),
		'faq'      => array(
			'label'  => __( 'Questions & answers', 'natura-core' ),
			'help'   => __( 'Short questions readers actually ask. Two to three sentences per answer.', 'natura-core' ),
			'add'    => __( 'Add question', 'natura-core' ),
			'fields' => array(
				'question' => array( 'label' => __( 'Question', 'natura-core' ), 'type' => 'text' ),
				'answer'   => array( 'label' => __( 'Answer', 'natura-core' ), 'type' => 'textarea' ),
			),
		),
		'sources'  => array(
			'label'  => __( 'Sources', 'natura-core' ),
			'help'   => __( 'References used for this guide, shown at the end.', 'natura-core' ),
			'add'    => __( 'Add source', 'natura-core' ),
			'fields' => array(
				'title' => array( 'label' => __( 'Title', 'natura-core' ), 'type' => 'text' ),
				'url'   => array( 'label' => __( 'Link', 'natura-core' ), 'type' => 'url' ),
			),
		),
	);
}

/**
 * Meta key for a field. The underscore keeps it out of the generic Custom
 * Fields box, where it could be edited without validation.
 *
 * @param string $key Field key.
 */
function natura_core_meta_key( string $key ): string {
	return '_natura_' . $key;
}

/**
 * Registers every field, so it is typed, validated, and available to the
 * block editor and the REST API for editors.
 */
function natura_core_register_plant_meta(): void {
	$can_edit = static fn( $allowed, $meta_key, $post_id ): bool => current_user_can( 'edit_post', $post_id );

	foreach ( natura_core_plant_facts() as $key => $field ) {
		register_post_meta(
			'plant',
			natura_core_meta_key( $key ),
			array(
				'type'          => 'image' === $field['type'] ? 'integer' : 'string',
				'single'        => true,
				'show_in_rest'  => true,
				'auth_callback' => $can_edit,
			)
		);
	}

	foreach ( natura_core_plant_lists() as $key => $list ) {
		$properties = array();
		foreach ( array_keys( $list['fields'] ) as $sub ) {
			$properties[ $sub ] = array( 'type' => 'string' );
		}

		register_post_meta(
			'plant',
			natura_core_meta_key( $key ),
			array(
				'type'          => 'array',
				'single'        => true,
				'default'       => array(),
				'auth_callback' => $can_edit,
				'show_in_rest'  => array(
					'schema' => array(
						'type'  => 'array',
						'items' => array(
							'type'       => 'object',
							'properties' => $properties,
						),
					),
				),
			)
		);
	}
}
add_action( 'init', 'natura_core_register_plant_meta' );

add_action(
	'add_meta_boxes_plant',
	static function (): void {
		add_meta_box( 'natura-plant-facts', __( 'Quick facts', 'natura-core' ), 'natura_core_render_facts_box', 'plant', 'normal', 'high' );
		add_meta_box( 'natura-plant-lists', __( 'Shopping list, FAQ, and sources', 'natura-core' ), 'natura_core_render_lists_box', 'plant', 'normal', 'default' );
	}
);

add_action(
	'admin_enqueue_scripts',
	static function ( string $hook ): void {
		$screen = get_current_screen();
		if ( ! $screen || 'plant' !== $screen->post_type || ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
			return;
		}
		wp_enqueue_media();
		wp_enqueue_style( 'natura-core-fields', NATURA_CORE_URL . 'assets/fields.css', array(), NATURA_CORE_VERSION );
		wp_enqueue_script( 'natura-core-fields', NATURA_CORE_URL . 'assets/fields.js', array(), NATURA_CORE_VERSION, true );
	}
);

/**
 * Prints the quick-facts box.
 *
 * @param WP_Post $post Plant being edited.
 */
function natura_core_render_facts_box( WP_Post $post ): void {
	wp_nonce_field( 'natura_core_save_plant', 'natura_core_plant_nonce' );
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
			$image_id = absint( $value );
			echo '<div class="natura-image-field" data-natura-image>';
			printf( '<input type="hidden" id="%s" name="%s" value="%s">', esc_attr( $id ), esc_attr( $name ), esc_attr( $image_id ?: '' ) );
			echo '<div class="natura-image-preview">' . ( $image_id ? wp_get_attachment_image( $image_id, 'medium' ) : '' ) . '</div>';
			printf( '<button type="button" class="button" data-natura-image-choose>%s</button> ', esc_html__( 'Choose image', 'natura-core' ) );
			printf( '<button type="button" class="button-link-delete" data-natura-image-remove%s>%s</button>', $image_id ? '' : ' hidden', esc_html__( 'Remove', 'natura-core' ) );
			echo '</div>';
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
 * Prints the repeating lists box.
 *
 * @param WP_Post $post Plant being edited.
 */
function natura_core_render_lists_box( WP_Post $post ): void {
	foreach ( natura_core_plant_lists() as $key => $list ) {
		$rows = get_post_meta( $post->ID, natura_core_meta_key( $key ), true );
		$rows = is_array( $rows ) ? $rows : array();

		echo '<fieldset class="natura-list" data-natura-list="' . esc_attr( $key ) . '">';
		printf( '<legend>%s</legend>', esc_html( $list['label'] ) );
		printf( '<p class="description">%s</p>', esc_html( $list['help'] ) );
		echo '<ol class="natura-list-rows">';
		foreach ( array_values( $rows ) as $index => $row ) {
			natura_core_render_list_row( $key, $list['fields'], (string) $index, $row );
		}
		echo '</ol>';

		echo '<template>';
		natura_core_render_list_row( $key, $list['fields'], '__INDEX__', array() );
		echo '</template>';

		printf( '<button type="button" class="button" data-natura-add>%s</button>', esc_html( $list['add'] ) );
		echo '</fieldset>';
	}
}

/**
 * Prints one row of a repeating list.
 *
 * @param string $list_key List key.
 * @param array  $fields   Sub-fields.
 * @param string $index    Row index, or a placeholder in the template.
 * @param array  $row      Saved values.
 */
function natura_core_render_list_row( string $list_key, array $fields, string $index, array $row ): void {
	echo '<li class="natura-list-row">';
	foreach ( $fields as $sub => $field ) {
		$name  = sprintf( 'natura[%s][%s][%s]', $list_key, $index, $sub );
		$value = (string) ( $row[ $sub ] ?? '' );
		echo '<label class="natura-list-cell natura-list-' . esc_attr( $field['type'] ) . '"><span>' . esc_html( $field['label'] ) . '</span>';
		if ( 'textarea' === $field['type'] ) {
			printf( '<textarea name="%s" rows="3">%s</textarea>', esc_attr( $name ), esc_textarea( $value ) );
		} else {
			printf( '<input type="%s" name="%s" value="%s">', 'url' === $field['type'] ? 'url' : 'text', esc_attr( $name ), esc_attr( $value ) );
		}
		echo '</label>';
	}
	printf(
		'<div class="natura-list-actions"><button type="button" class="button-link" data-natura-up aria-label="%1$s">↑</button><button type="button" class="button-link" data-natura-down aria-label="%2$s">↓</button><button type="button" class="button-link-delete" data-natura-remove>%3$s</button></div>',
		esc_attr__( 'Move up', 'natura-core' ),
		esc_attr__( 'Move down', 'natura-core' ),
		esc_html__( 'Remove', 'natura-core' )
	);
	echo '</li>';
}

/**
 * Accepts only web addresses.
 *
 * @param string $url Raw value.
 */
function natura_core_clean_url( string $url ): string {
	$url = esc_url_raw( trim( $url ), array( 'http', 'https' ) );

	return $url ?: '';
}

/**
 * Saves the fields. Only for a real save by someone allowed to edit the plant.
 *
 * @param int $post_id Plant ID.
 */
function natura_core_save_plant( int $post_id ): void {
	if ( ! isset( $_POST['natura_core_plant_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['natura_core_plant_nonce'] ) ), 'natura_core_save_plant' ) ) {
		return;
	}
	if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Each value is sanitised below according to its declared type.
	$input = isset( $_POST['natura'] ) && is_array( $_POST['natura'] ) ? wp_unslash( $_POST['natura'] ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

	foreach ( natura_core_plant_facts() as $key => $field ) {
		$raw  = isset( $input[ $key ] ) && is_scalar( $input[ $key ] ) ? (string) $input[ $key ] : '';
		$meta = natura_core_meta_key( $key );

		if ( 'image' === $field['type'] ) {
			$image_id = absint( $raw );
			if ( $image_id && wp_attachment_is_image( $image_id ) ) {
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

	foreach ( natura_core_plant_lists() as $key => $list ) {
		$rows = isset( $input[ $key ] ) && is_array( $input[ $key ] ) ? $input[ $key ] : array();
		$keep = array();

		foreach ( $rows as $row ) {
			if ( ! is_array( $row ) ) {
				continue;
			}
			$clean = array();
			foreach ( $list['fields'] as $sub => $field ) {
				$raw           = isset( $row[ $sub ] ) && is_scalar( $row[ $sub ] ) ? (string) $row[ $sub ] : '';
				$clean[ $sub ] = match ( $field['type'] ) {
					'url'      => natura_core_clean_url( $raw ),
					'textarea' => sanitize_textarea_field( $raw ),
					default    => sanitize_text_field( $raw ),
				};
			}
			// The first sub-field (item, question, title) is required.
			if ( '' !== reset( $clean ) ) {
				$keep[] = $clean;
			}
		}

		if ( $keep ) {
			update_post_meta( $post_id, natura_core_meta_key( $key ), $keep );
		} else {
			delete_post_meta( $post_id, natura_core_meta_key( $key ) );
		}
	}
}
add_action( 'save_post_plant', 'natura_core_save_plant' );
