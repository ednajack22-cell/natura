<?php
/**
 * Imports the site owner's images in one go: each file named after a
 * guide's address ({slug}-photo.jpg for the main photo, {slug}-pin.jpg for
 * the Pinterest image, as listed in design/IMAGE-PROMPTS.md) goes to that
 * guide and replaces its stand-in. An image the owner chose themselves is
 * never replaced.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * The guide at an address, of any Natura type, drafts included.
 *
 * @param string $slug Address.
 */
function natura_core_guide_by_slug( string $slug ): ?WP_Post {
	$types = array_values( array_filter( array( 'plant', 'problem', 'post', 'gear', 'project', 'space' ), 'post_type_exists' ) );
	$found = get_posts(
		array(
			'name'           => $slug,
			'post_type'      => $types,
			'post_status'    => array( 'publish', 'draft', 'pending', 'future', 'private' ),
			'posts_per_page' => 2,
			'no_found_rows'  => true,
		)
	);

	return 1 === count( $found ) ? $found[0] : null;
}

/**
 * Places one uploaded image on its guide.
 *
 * @param array{name: string, tmp_name: string, error: int, size: int} $file Uploaded file.
 * @return string placed, kept (the guide has the owner's own image), unknown (no guide or bad name) or failed.
 */
function natura_core_place_image( array $file ): string {
	if ( UPLOAD_ERR_OK !== (int) $file['error'] || ! is_uploaded_file( $file['tmp_name'] ) ) {
		return 'failed';
	}
	$name = strtolower( sanitize_file_name( $file['name'] ) );
	if ( ! preg_match( '/^([a-z0-9-]+)-(photo|pin)\.(jpe?g|png|webp)$/', $name, $parts ) ) {
		return 'unknown';
	}
	$guide = natura_core_guide_by_slug( $parts[1] );
	if ( ! $guide ) {
		return 'unknown';
	}

	$is_pin  = 'pin' === $parts[2];
	$pin_key = natura_core_meta_key( 'pin_image' );
	$current = $is_pin ? absint( get_post_meta( $guide->ID, $pin_key, true ) ) : (int) get_post_thumbnail_id( $guide );
	if ( $current && ! natura_core_is_cover( $current ) ) {
		return 'kept';
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$image_id = media_handle_sideload(
		array(
			'name'     => $name,
			'tmp_name' => $file['tmp_name'],
		),
		$guide->ID
	);
	if ( is_wp_error( $image_id ) ) {
		return 'failed';
	}
	$title = html_entity_decode( get_the_title( $guide ), ENT_QUOTES, 'UTF-8' );
	update_post_meta( $image_id, '_wp_attachment_image_alt', $title );

	if ( $is_pin ) {
		update_post_meta( $guide->ID, $pin_key, (int) $image_id );
	} else {
		set_post_thumbnail( $guide->ID, (int) $image_id );
	}
	// The stand-in is no longer used anywhere: remove it from the library.
	if ( $current ) {
		wp_delete_attachment( $current, true );
	}

	return 'placed';
}

add_action(
	'admin_post_natura_import_images',
	static function (): void {
		if ( ! current_user_can( 'upload_files' ) || ! current_user_can( 'edit_others_posts' ) ) {
			wp_die( esc_html__( 'You are not allowed to add images.', 'natura-core' ), 403 );
		}
		check_admin_referer( 'natura_import_images' );

		$counts = array(
			'placed'  => 0,
			'kept'    => 0,
			'unknown' => 0,
			'failed'  => 0,
		);
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- each file is checked in natura_core_place_image().
		$files = $_FILES['natura_images'] ?? array();
		foreach ( (array) ( $files['name'] ?? array() ) as $index => $file_name ) {
			$result = natura_core_place_image(
				array(
					'name'     => (string) $file_name,
					'tmp_name' => (string) ( $files['tmp_name'][ $index ] ?? '' ),
					'error'    => (int) ( $files['error'][ $index ] ?? UPLOAD_ERR_NO_FILE ),
					'size'     => (int) ( $files['size'][ $index ] ?? 0 ),
				)
			);
			++$counts[ $result ];
		}

		wp_safe_redirect( add_query_arg( array( 'images' => implode( '-', $counts ) ), admin_url( 'tools.php?page=natura-starter-guides' ) ) );
		exit;
	}
);

/**
 * Prints the "Import your images" form and the result of the last import.
 */
function natura_core_render_image_import(): void {
	if ( ! current_user_can( 'upload_files' ) ) {
		return;
	}
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
	$result = isset( $_GET['images'] ) ? array_map( 'absint', explode( '-', sanitize_text_field( wp_unslash( $_GET['images'] ) ) ) ) : null;
	if ( $result && 4 === count( $result ) ) {
		list( $placed, $kept, $unknown, $failed ) = $result;
		$lines = array(
			/* translators: %d: number of images. */
			sprintf( _n( '%d image placed on its guide.', '%d images placed on their guides.', $placed, 'natura-core' ), $placed ),
		);
		if ( $kept ) {
			/* translators: %d: number of images. */
			$lines[] = sprintf( _n( '%d image skipped: the guide already has your own image.', '%d images skipped: the guides already have your own images.', $kept, 'natura-core' ), $kept );
		}
		if ( $unknown ) {
			/* translators: %d: number of images. */
			$lines[] = sprintf( _n( '%d image skipped: its name matches no guide (address-photo.jpg or address-pin.jpg).', '%d images skipped: their names match no guide (address-photo.jpg or address-pin.jpg).', $unknown, 'natura-core' ), $unknown );
		}
		if ( $failed ) {
			/* translators: %d: number of images. */
			$lines[] = sprintf( _n( '%d image could not be uploaded.', '%d images could not be uploaded.', $failed, 'natura-core' ), $failed );
		}
		printf( '<div class="notice notice-%1$s is-dismissible"><p>%2$s</p></div>', $unknown || $failed ? 'warning' : 'success', esc_html( implode( ' ', $lines ) ) );
	}
	$most = max( 1, (int) ini_get( 'max_file_uploads' ) );
	?>
	<h2><?php esc_html_e( 'Import your images', 'natura-core' ); ?></h2>
	<p>
		<?php
		printf(
			/* translators: %d: most files per upload. */
			esc_html__( 'Name each image after its guide, as listed in IMAGE-PROMPTS.md: cherry-tomato-photo.jpg for the main photo, cherry-tomato-pin.jpg for the Pinterest image (JPG, PNG, or WebP). Each one replaces the stand-in of its guide; images you chose yourself are kept. Up to %d images at a time.', 'natura-core' ),
			(int) $most
		);
		?>
	</p>
	<form method="post" enctype="multipart/form-data" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<input type="hidden" name="action" value="natura_import_images">
		<?php wp_nonce_field( 'natura_import_images' ); ?>
		<p>
			<label class="screen-reader-text" for="natura-images"><?php esc_html_e( 'Images', 'natura-core' ); ?></label>
			<input type="file" id="natura-images" name="natura_images[]" multiple accept="image/jpeg,image/png,image/webp">
			<?php submit_button( __( 'Import images', 'natura-core' ), 'secondary', 'submit', false ); ?>
		</p>
	</form>
	<?php
}
