<?php
/**
 * Field helpers shared by every content type: repeating lists (shopping list,
 * FAQ, sources, causes), their meta boxes, and saving.
 *
 * Every field is stored as post meta under a key starting with an underscore,
 * which keeps it out of the generic Custom Fields box, where it could be
 * edited without validation.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Meta key for a field.
 *
 * @param string $key Field key.
 */
function natura_core_meta_key( string $key ): string {
	return '_natura_' . $key;
}

/**
 * Lists every guide can carry: key => [label, help, add button, sub-fields].
 *
 * @return array<string, array{label: string, help: string, add: string, fields: array<string, array{label: string, type: string}>}>
 */
function natura_core_shared_lists(): array {
	return array(
		'products' => array(
			'label'  => __( 'What you need', 'natura-core' ),
			'help'   => __( 'The shopping list shown in the guide, as product cards. Paste the affiliate link in "Link"; leave it empty and the item shows without a button. Use your own photo or one you are allowed to use. Do not write prices: they change.', 'natura-core' ),
			'add'    => __( 'Add item', 'natura-core' ),
			'fields' => array(
				'name'  => array( 'label' => __( 'Item', 'natura-core' ), 'type' => 'text' ),
				'badge' => array( 'label' => __( 'Label (optional), e.g. "Best for small balconies"', 'natura-core' ), 'type' => 'text' ),
				'note'  => array( 'label' => __( 'Why it matters (one line)', 'natura-core' ), 'type' => 'text' ),
				'url'   => array( 'label' => __( 'Link', 'natura-core' ), 'type' => 'url' ),
				'image' => array( 'label' => __( 'Photo', 'natura-core' ), 'type' => 'image' ),
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
 * Only people allowed to edit the post may read or write its fields through
 * the REST API.
 *
 * @param bool   $allowed  Default.
 * @param string $meta_key Meta key.
 * @param int    $post_id  Post ID.
 */
function natura_core_can_edit_meta( $allowed, $meta_key, $post_id ): bool {
	return current_user_can( 'edit_post', $post_id );
}

/**
 * Registers repeating lists as typed array meta.
 *
 * @param string $post_type Post type.
 * @param array  $lists     Lists, as returned by natura_core_shared_lists().
 */
function natura_core_register_list_meta( string $post_type, array $lists ): void {
	foreach ( $lists as $key => $list ) {
		$properties = array();
		foreach ( array_keys( $list['fields'] ) as $sub ) {
			$properties[ $sub ] = array( 'type' => 'string' );
		}

		register_post_meta(
			$post_type,
			natura_core_meta_key( $key ),
			array(
				'type'          => 'array',
				'single'        => true,
				'default'       => array(),
				'auth_callback' => 'natura_core_can_edit_meta',
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

/**
 * Post types whose edit screen uses the field scripts and styles.
 */
function natura_core_field_post_types(): array {
	return array( 'plant', 'problem', 'post', 'gear', 'project', 'space' );
}

add_action(
	'admin_enqueue_scripts',
	static function ( string $hook ): void {
		$screen = get_current_screen();
		if ( ! $screen || ! in_array( $screen->post_type, natura_core_field_post_types(), true ) || ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
			return;
		}
		wp_enqueue_media();
		wp_enqueue_style( 'natura-core-fields', NATURA_CORE_URL . 'assets/fields.css', array(), NATURA_CORE_VERSION );
		wp_enqueue_script( 'natura-core-fields', NATURA_CORE_URL . 'assets/fields.js', array(), NATURA_CORE_VERSION, true );
	}
);

/**
 * The nonce every Natura meta box shares. Printed once per edit screen.
 */
function natura_core_nonce_field(): void {
	static $printed = false;
	if ( ! $printed ) {
		wp_nonce_field( 'natura_core_save', 'natura_core_nonce' );
		$printed = true;
	}
}

/**
 * Prints repeating lists.
 *
 * @param WP_Post $post  Post being edited.
 * @param array   $lists Lists to print.
 */
function natura_core_render_lists( WP_Post $post, array $lists ): void {
	natura_core_nonce_field();

	foreach ( $lists as $key => $list ) {
		$rows = get_post_meta( $post->ID, natura_core_meta_key( $key ), true );
		$rows = is_array( $rows ) ? $rows : array();

		echo '<fieldset class="natura-list" data-natura-list="' . esc_attr( $key ) . '">';
		printf( '<legend>%s</legend>', esc_html( $list['label'] ) );
		printf( '<p class="description">%s</p>', esc_html( $list['help'] ) );
		echo '<ol class="natura-list-rows">';
		foreach ( array_values( $rows ) as $index => $row ) {
			natura_core_render_list_row( $key, $list['fields'], (string) $index, is_array( $row ) ? $row : array() );
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
		if ( 'image' === $field['type'] ) {
			echo '<div class="natura-list-cell natura-list-image"><span>' . esc_html( $field['label'] ) . '</span>';
			natura_core_render_image_picker( $name, absint( $value ) );
			echo '</div>';
			continue;
		}
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
 * Prints an image picker: a hidden field holding the attachment ID, a
 * preview, and Choose / Remove buttons (wired up in fields.js).
 *
 * @param string $name     Field name.
 * @param int    $image_id Attachment ID, or 0.
 * @param string $id       Optional id for the hidden field.
 */
function natura_core_render_image_picker( string $name, int $image_id, string $id = '' ): void {
	echo '<div class="natura-image-field" data-natura-image>';
	printf( '<input type="hidden"%s name="%s" value="%s">', $id ? ' id="' . esc_attr( $id ) . '"' : '', esc_attr( $name ), esc_attr( $image_id ? (string) $image_id : '' ) );
	echo '<div class="natura-image-preview">' . ( $image_id ? wp_get_attachment_image( $image_id, 'thumbnail' ) : '' ) . '</div>';
	printf( '<button type="button" class="button" data-natura-image-choose>%s</button> ', esc_html__( 'Choose image', 'natura-core' ) );
	printf( '<button type="button" class="button-link-delete" data-natura-image-remove%s>%s</button>', $image_id ? '' : ' hidden', esc_html__( 'Remove', 'natura-core' ) );
	echo '</div>';
}

/**
 * An attachment ID if it is an image, or 0.
 *
 * @param string $raw Raw value.
 */
function natura_core_clean_image( string $raw ): int {
	$image_id = absint( $raw );

	return $image_id && wp_attachment_is_image( $image_id ) ? $image_id : 0;
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
 * The submitted fields, or null when this is not a real save by someone
 * allowed to edit the post.
 *
 * @param int $post_id Post ID.
 */
function natura_core_submitted_fields( int $post_id ): ?array {
	if ( ! isset( $_POST['natura_core_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['natura_core_nonce'] ) ), 'natura_core_save' ) ) {
		return null;
	}
	if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return null;
	}

	// Each value is sanitised by the caller according to its declared type.
	return isset( $_POST['natura'] ) && is_array( $_POST['natura'] ) ? wp_unslash( $_POST['natura'] ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
}

/**
 * Saves repeating lists from the submitted fields.
 *
 * @param int   $post_id Post ID.
 * @param array $lists   Lists to save.
 * @param array $input   Submitted fields.
 */
function natura_core_save_lists( int $post_id, array $lists, array $input ): void {
	foreach ( $lists as $key => $list ) {
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
					'image'    => (string) ( natura_core_clean_image( $raw ) ?: '' ),
					'textarea' => sanitize_textarea_field( $raw ),
					default    => sanitize_text_field( $raw ),
				};
			}
			// The first sub-field (item, question, title, cause) is required.
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

/*
 * Articles (ordinary posts) carry the same shopping list, FAQ, and sources as
 * the guides, so every page that gives advice can show where it comes from.
 */
add_action(
	'init',
	static function (): void {
		natura_core_register_list_meta( 'post', natura_core_shared_lists() );
	}
);

add_action(
	'add_meta_boxes_post',
	static function (): void {
		add_meta_box(
			'natura-post-lists',
			__( 'Shopping list, FAQ, and sources', 'natura-core' ),
			static fn( WP_Post $post ) => natura_core_render_lists( $post, natura_core_shared_lists() ),
			'post',
			'normal',
			'default'
		);
	}
);

add_action(
	'save_post_post',
	static function ( int $post_id ): void {
		$input = natura_core_submitted_fields( $post_id );
		if ( null !== $input ) {
			natura_core_save_lists( $post_id, natura_core_shared_lists(), $input );
		}
	}
);

/*
 * Pinterest image for problem guides, articles, and buying guides. Plant guides have it in
 * their quick facts box.
 */
add_action(
	'init',
	static function (): void {
		foreach ( array( 'problem', 'post', 'gear', 'project', 'space' ) as $post_type ) {
			register_post_meta(
				$post_type,
				natura_core_meta_key( 'pin_image' ),
				array(
					'type'          => 'integer',
					'single'        => true,
					'show_in_rest'  => true,
					'auth_callback' => 'natura_core_can_edit_meta',
				)
			);
		}
	}
);

add_action(
	'add_meta_boxes',
	static function ( string $post_type ): void {
		if ( ! in_array( $post_type, array( 'problem', 'post', 'gear', 'project', 'space' ), true ) ) {
			return;
		}
		add_meta_box(
			'natura-pin-image',
			__( 'Pinterest image', 'natura-core' ),
			static function ( WP_Post $post ): void {
				natura_core_nonce_field();
				printf( '<p class="description">%s</p>', esc_html__( 'A vertical image (2:3, e.g. 1000 × 1500 px) with the title on it. Shown in the guide with a "Save" button, and used when readers pin the page.', 'natura-core' ) );
				natura_core_render_image_picker( 'natura[pin_image]', absint( get_post_meta( $post->ID, natura_core_meta_key( 'pin_image' ), true ) ) );
			},
			$post_type,
			'side',
			'default'
		);
	}
);

/**
 * Saves the Pinterest image of a problem guide or an article.
 *
 * @param int $post_id Post ID.
 */
function natura_core_save_pin_image( int $post_id ): void {
	$input = natura_core_submitted_fields( $post_id );
	if ( null === $input || ! array_key_exists( 'pin_image', $input ) ) {
		return;
	}

	$image_id = natura_core_clean_image( is_scalar( $input['pin_image'] ) ? (string) $input['pin_image'] : '' );
	if ( $image_id ) {
		update_post_meta( $post_id, natura_core_meta_key( 'pin_image' ), $image_id );
	} else {
		delete_post_meta( $post_id, natura_core_meta_key( 'pin_image' ) );
	}
}
add_action( 'save_post_problem', 'natura_core_save_pin_image' );
add_action( 'save_post_post', 'natura_core_save_pin_image' );
add_action( 'save_post_gear', 'natura_core_save_pin_image' );
add_action( 'save_post_project', 'natura_core_save_pin_image' );
