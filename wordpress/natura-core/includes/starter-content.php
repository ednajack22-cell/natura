<?php
/**
 * Starter guides: finished, sourced guides shipped with the plugin, ready to
 * import as drafts from Tools → Natura starter guides.
 *
 * Each guide is created as a draft with its text, facts, lists, FAQ and
 * sources, but no photo or Pinterest image: the site owner adds their own,
 * reads the draft, and publishes it. Nothing is imported unless an
 * administrator or editor asks for it, and a guide whose address is already
 * taken is never overwritten.
 *
 * The guides themselves live in includes/starter/, one file per batch.
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Creates one guide of any Natura type from the shared guide format (the
 * same arrays as the demo content).
 *
 * @param string               $kind       plant, problem, post, gear or project.
 * @param string               $slug       Address.
 * @param array<string, mixed> $guide      Guide data.
 * @param string               $status     publish or draft.
 * @param string               $image_base Image folder or URL; '' adds no image.
 * @param int                  $author     Author ID.
 * @return int|WP_Error Guide ID.
 */
function natura_core_create_guide( string $kind, string $slug, array $guide, string $status, string $image_base, int $author ) {
	if ( ! post_type_exists( $kind ) ) {
		return new WP_Error( 'natura_type', __( 'This content type is not active.', 'natura-core' ) );
	}
	if ( get_page_by_path( $slug, OBJECT, $kind ) ) {
		return new WP_Error( 'natura_exists', __( 'A guide already uses this address.', 'natura-core' ) );
	}

	// Terms the guide may be filed under.
	natura_core_plant_data_activate();
	if ( 'gear' === $kind ) {
		natura_core_gear_activate();
	} elseif ( 'project' === $kind ) {
		natura_core_projects_activate();
	}

	$post = array(
		'post_type'    => $kind,
		'post_status'  => $status,
		'post_author'  => $author,
		'post_name'    => $slug,
		'post_title'   => $guide['title'],
		'post_excerpt' => $guide['excerpt'],
		'post_content' => $guide['content'],
	);
	if ( 'post' === $kind ) {
		$topic                 = get_term_by( 'slug', (string) ( $guide['topic'] ?? '' ), 'category' );
		$post['post_category'] = $topic ? array( (int) $topic->term_id ) : array();
	}

	$post_id = wp_insert_post( wp_slash( $post ), true );
	if ( is_wp_error( $post_id ) ) {
		return $post_id;
	}

	$lists = (array) ( $guide['lists'] ?? array() );
	$pin   = (string) ( $guide['pin'] ?? '' );
	if ( '' === $image_base ) {
		$lists = natura_core_starter_clean_lists( $lists );
		$pin   = '';
	}
	natura_core_demo_save_fields( $post_id, $lists, $pin, $image_base );
	if ( '' !== $image_base ) {
		natura_core_demo_set_photo( $post_id, $guide, $image_base );
	}

	foreach ( (array) ( $guide['facts'] ?? array() ) as $key => $value ) {
		update_post_meta( $post_id, natura_core_meta_key( $key ), $value );
	}

	switch ( $kind ) {
		case 'plant':
			wp_set_object_terms( $post_id, $guide['type'], 'plant_type' );
			foreach ( array( 'sun' => 'plant_sun', 'space' => 'plant_space' ) as $key => $taxonomy ) {
				if ( ! empty( $guide[ $key ] ) && taxonomy_exists( $taxonomy ) ) {
					wp_set_object_terms( $post_id, $guide[ $key ], $taxonomy );
				}
			}
			foreach ( (array) ( $guide['months'] ?? array() ) as $activity => $months ) {
				natura_core_set_plant_months( $post_id, $activity, $months );
			}
			break;
		case 'problem':
			natura_core_set_problem_plants( $post_id, natura_core_starter_plant_ids( (array) ( $guide['plants'] ?? array() ) ) );
			if ( ! empty( $guide['parts'] ) && taxonomy_exists( 'problem_part' ) ) {
				wp_set_object_terms( $post_id, $guide['parts'], 'problem_part' );
			}
			break;
		case 'gear':
			wp_set_object_terms( $post_id, $guide['category'], 'gear_category' );
			update_post_meta( $post_id, natura_core_meta_key( 'method' ), $guide['method'] );
			break;
		case 'project':
			wp_set_object_terms( $post_id, $guide['category'], 'project_category' );
			natura_core_set_project_plants( $post_id, natura_core_starter_plant_ids( (array) ( $guide['plants'] ?? array() ) ) );
			break;
	}

	return (int) $post_id;
}

/**
 * IDs of the plant guides with these addresses, drafts included.
 *
 * @param string[] $slugs Plant guide addresses.
 * @return int[]
 */
function natura_core_starter_plant_ids( array $slugs ): array {
	$ids = array();
	foreach ( $slugs as $slug ) {
		$plant = get_page_by_path( $slug, OBJECT, 'plant' );
		if ( $plant ) {
			$ids[] = (int) $plant->ID;
		}
	}

	return $ids;
}

/**
 * Lists without demo images and placeholder shop links: the owner adds
 * their own photos and affiliate links.
 *
 * @param array<string, array> $lists Lists, keyed by field.
 * @return array<string, array>
 */
function natura_core_starter_clean_lists( array $lists ): array {
	foreach ( $lists as $key => $rows ) {
		foreach ( $rows as $index => $row ) {
			if ( ! is_array( $row ) ) {
				continue;
			}
			unset( $row['image'] );
			if ( isset( $row['url'] ) && str_contains( (string) $row['url'], 'example.com' ) ) {
				$row['url'] = '';
			}
			$lists[ $key ][ $index ] = $row;
		}
	}

	return $lists;
}

/**
 * Every starter guide, in the order to import them: plants first, so
 * problem guides and projects can link to them.
 *
 * @return array<string, array{kind: string, slug: string, guide: array, batch: string}>
 */
function natura_core_starter_guides(): array {
	$sets = array(
		'plant'   => array(),
		'problem' => array(),
		'post'    => array(),
		'gear'    => array(),
		'project' => array(),
	);

	// The guides written for the demo are real, sourced guides too.
	$demo = array(
		'plant'   => natura_core_demo_plants(),
		'problem' => natura_core_demo_problems(),
		'post'    => natura_core_demo_articles(),
		'gear'    => natura_core_demo_gear(),
		'project' => natura_core_demo_projects(),
	);
	foreach ( $demo as $kind => $guides ) {
		foreach ( $guides as $slug => $guide ) {
			$sets[ $kind ][ $slug ] = array( $guide, __( 'First guides', 'natura-core' ) );
		}
	}

	foreach ( glob( NATURA_CORE_DIR . 'includes/starter/*.php' ) ?: array() as $file ) {
		$batch = require $file;
		if ( ! is_array( $batch ) || empty( $batch['guides'] ) ) {
			continue;
		}
		foreach ( $batch['guides'] as $kind => $guides ) {
			foreach ( $guides as $slug => $guide ) {
				if ( isset( $sets[ $kind ] ) ) {
					$sets[ $kind ][ $slug ] = array( $guide, (string) $batch['name'] );
				}
			}
		}
	}

	$all = array();
	foreach ( $sets as $kind => $guides ) {
		foreach ( $guides as $slug => list( $guide, $batch ) ) {
			$all[ $kind . ':' . $slug ] = array(
				'kind'  => $kind,
				'slug'  => $slug,
				'guide' => $guide,
				'batch' => $batch,
			);
		}
	}

	return $all;
}

/**
 * The existing guide at a starter guide's address, if any.
 *
 * @param string $kind Post type.
 * @param string $slug Address.
 */
function natura_core_starter_existing( string $kind, string $slug ): ?WP_Post {
	$post = post_type_exists( $kind ) ? get_page_by_path( $slug, OBJECT, $kind ) : null;

	return $post instanceof WP_Post ? $post : null;
}

add_action(
	'admin_menu',
	static function (): void {
		add_management_page(
			__( 'Natura starter guides', 'natura-core' ),
			__( 'Natura starter guides', 'natura-core' ),
			'edit_others_posts',
			'natura-starter-guides',
			'natura_core_render_starter_page'
		);
	}
);

/*
 * Import: one guide, or every guide not yet on the site. Editors and
 * administrators only; checked again here, with the nonce.
 */
add_action(
	'admin_post_natura_import_starter',
	static function (): void {
		if ( ! current_user_can( 'edit_others_posts' ) ) {
			wp_die( esc_html__( 'You are not allowed to import guides.', 'natura-core' ), 403 );
		}
		check_admin_referer( 'natura_import_starter' );

		$guides = natura_core_starter_guides();
		$wanted = sanitize_text_field( wp_unslash( $_POST['guide'] ?? '' ) );
		$keys   = 'all' === $wanted ? array_keys( $guides ) : array( $wanted );

		$created = 0;
		foreach ( $keys as $key ) {
			if ( ! isset( $guides[ $key ] ) ) {
				continue;
			}
			$item = $guides[ $key ];
			if ( natura_core_starter_existing( $item['kind'], $item['slug'] ) ) {
				continue;
			}
			$result = natura_core_create_guide( $item['kind'], $item['slug'], $item['guide'], 'draft', '', get_current_user_id() );
			if ( ! is_wp_error( $result ) ) {
				++$created;
			}
		}

		wp_safe_redirect( add_query_arg( 'imported', $created, admin_url( 'tools.php?page=natura-starter-guides' ) ) );
		exit;
	}
);

/**
 * Prints Tools → Natura starter guides.
 */
function natura_core_render_starter_page(): void {
	if ( ! current_user_can( 'edit_others_posts' ) ) {
		return;
	}
	$guides   = natura_core_starter_guides();
	$imported = isset( $_GET['imported'] ) ? absint( $_GET['imported'] ) : null; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
	$waiting  = array_filter( $guides, static fn( array $item ): bool => ! natura_core_starter_existing( $item['kind'], $item['slug'] ) );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Natura starter guides', 'natura-core' ); ?></h1>
		<p><?php esc_html_e( 'Finished guides written for Natura from the sources listed in each one. Importing creates a draft: add your own photo and Pinterest image, read it through, then publish. A guide already on your site is never changed.', 'natura-core' ); ?></p>

		<?php if ( null !== $imported ) : ?>
			<div class="notice notice-success is-dismissible"><p>
				<?php
				/* translators: %d: number of drafts. */
				echo esc_html( sprintf( _n( '%d draft created.', '%d drafts created.', $imported, 'natura-core' ), $imported ) );
				?>
			</p></div>
		<?php endif; ?>

		<?php if ( $waiting ) : ?>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="natura_import_starter">
				<input type="hidden" name="guide" value="all">
				<?php wp_nonce_field( 'natura_import_starter' ); ?>
				<p>
					<?php
					/* translators: %d: number of guides. */
					submit_button( sprintf( _n( 'Import %d guide as draft', 'Import all %d guides as drafts', count( $waiting ), 'natura-core' ), count( $waiting ) ), 'primary', 'submit', false );
					?>
				</p>
			</form>
		<?php endif; ?>

		<table class="widefat striped">
			<thead>
				<tr>
					<th scope="col"><?php esc_html_e( 'Guide', 'natura-core' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Type', 'natura-core' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Batch', 'natura-core' ); ?></th>
					<th scope="col"><?php esc_html_e( 'On your site', 'natura-core' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $guides as $key => $item ) : ?>
					<?php
					$existing = natura_core_starter_existing( $item['kind'], $item['slug'] );
					$type     = get_post_type_object( $item['kind'] );
					?>
					<tr>
						<td><strong><?php echo esc_html( $item['guide']['title'] ); ?></strong></td>
						<td><?php echo esc_html( $type ? $type->labels->singular_name : $item['kind'] ); ?></td>
						<td><?php echo esc_html( $item['batch'] ); ?></td>
						<td>
							<?php if ( $existing ) : ?>
								<a href="<?php echo esc_url( (string) get_edit_post_link( $existing->ID ) ); ?>">
									<?php echo esc_html( 'publish' === $existing->post_status ? __( 'Published', 'natura-core' ) : __( 'Draft: edit', 'natura-core' ) ); ?>
								</a>
							<?php elseif ( $type ) : ?>
								<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
									<input type="hidden" name="action" value="natura_import_starter">
									<input type="hidden" name="guide" value="<?php echo esc_attr( $key ); ?>">
									<?php wp_nonce_field( 'natura_import_starter' ); ?>
									<?php submit_button( __( 'Import as draft', 'natura-core' ), 'secondary small', 'submit', false ); ?>
								</form>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php
}
