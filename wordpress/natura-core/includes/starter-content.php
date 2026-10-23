<?php
/**
 * Starter guides: finished, sourced guides shipped with the plugin, ready to
 * import as drafts from Tools → Natura starter guides.
 *
 * Each guide is created as a draft with its text, facts, lists, FAQ and
 * sources. Its photo and Pinterest image are drawn stand-ins (see
 * covers.php) until the site owner adds their own; they read the draft and
 * publish it. Nothing is imported unless an
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
 * @param string               $image_base Image folder or URL; '' draws stand-in covers.
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
	} elseif ( 'space' === $kind ) {
		natura_core_spaces_activate();
	}

	$post = array(
		'post_type'    => $kind,
		'post_status'  => $status,
		'post_author'  => $author,
		'post_name'    => $slug,
		'post_title'   => $guide['title'],
		'post_excerpt' => $guide['excerpt'],
		'post_content' => $guide['content'],
		'menu_order'   => (int) ( $guide['order'] ?? 0 ),
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
	} else {
		natura_core_add_covers( (int) $post_id );
	}

	foreach ( (array) ( $guide['facts'] ?? array() ) as $key => $value ) {
		update_post_meta( $post_id, natura_core_meta_key( $key ), $value );
	}
	foreach ( (array) ( $guide['timing'] ?? array() ) as $key => $value ) {
		$value = natura_core_clean_range( $value );
		if ( '' !== $value ) {
			update_post_meta( $post_id, natura_core_meta_key( 'timing_' . sanitize_key( $key ) ), $value );
		}
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
		case 'space':
			update_post_meta( $post_id, natura_core_meta_key( 'short_name' ), sanitize_text_field( (string) ( $guide['short_name'] ?? '' ) ) );
			update_post_meta( $post_id, natura_core_meta_key( 'space_term' ), natura_core_clean_space_term( $guide['space_term'] ?? '' ) );
			$related = array();
			foreach ( (array) ( $guide['related'] ?? array() ) as $type => $slugs ) {
				foreach ( (array) $slugs as $related_slug ) {
					$related_post = post_type_exists( $type ) ? get_page_by_path( $related_slug, OBJECT, $type ) : null;
					if ( $related_post ) {
						$related[] = (int) $related_post->ID;
					}
				}
			}
			natura_core_set_space_related( $post_id, $related );
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
		'space'   => array(),
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

/*
 * Stand-in covers for guides that still have no photo or Pinterest image,
 * a few at a time so a slow server does not time out.
 */
add_action(
	'admin_post_natura_add_covers',
	static function (): void {
		if ( ! current_user_can( 'edit_others_posts' ) ) {
			wp_die( esc_html__( 'You are not allowed to add images.', 'natura-core' ), 403 );
		}
		check_admin_referer( 'natura_add_covers' );

		$added = 0;
		foreach ( natura_core_guides_without_images( 15 ) as $post_id ) {
			$added += natura_core_add_covers( (int) $post_id );
		}

		wp_safe_redirect( add_query_arg( 'covers', $added, admin_url( 'tools.php?page=natura-starter-guides' ) ) );
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
	$covers   = isset( $_GET['covers'] ) ? absint( $_GET['covers'] ) : null; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
	$bare     = natura_core_guides_without_images();
	$waiting  = array_filter( $guides, static fn( array $item ): bool => ! natura_core_starter_existing( $item['kind'], $item['slug'] ) );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Natura starter guides', 'natura-core' ); ?></h1>
		<p><?php esc_html_e( 'Finished guides written for Natura from the sources listed in each one. Importing creates a draft with a drawn stand-in photo and Pinterest image: replace them with your own when you have them, read the draft through, then publish. A guide already on your site is never changed.', 'natura-core' ); ?></p>

		<?php if ( null !== $imported ) : ?>
			<div class="notice notice-success is-dismissible"><p>
				<?php
				/* translators: %d: number of drafts. */
				echo esc_html( sprintf( _n( '%d draft created.', '%d drafts created.', $imported, 'natura-core' ), $imported ) );
				?>
			</p></div>
		<?php endif; ?>

		<?php if ( null !== $covers ) : ?>
			<div class="notice notice-success is-dismissible"><p>
				<?php
				/* translators: %d: number of images. */
				echo esc_html( sprintf( _n( '%d stand-in image added.', '%d stand-in images added.', $covers, 'natura-core' ), $covers ) );
				?>
			</p></div>
		<?php endif; ?>

		<?php if ( $bare && natura_core_covers_available() ) : ?>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="natura_add_covers">
				<?php wp_nonce_field( 'natura_add_covers' ); ?>
				<p>
					<?php
					printf(
						/* translators: %d: number of guides. */
						esc_html( _n( '%d guide has no photo or no Pinterest image yet.', '%d guides have no photo or no Pinterest image yet.', count( $bare ), 'natura-core' ) ),
						count( $bare )
					);
					echo ' ';
					submit_button( __( 'Add stand-in images (15 guides at a time)', 'natura-core' ), 'secondary', 'submit', false );
					?>
				</p>
			</form>
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
						<td>
							<strong><?php echo esc_html( $item['guide']['title'] ); ?></strong>
							<?php if ( ! empty( $item['guide']['image_prompt'] ) ) : ?>
								<details class="natura-prompts">
									<summary><?php esc_html_e( 'Image prompts', 'natura-core' ); ?></summary>
									<p>
										<label for="<?php echo esc_attr( 'photo-' . $key ); ?>"><?php esc_html_e( 'Main photo (landscape 3:2)', 'natura-core' ); ?></label>
										<textarea id="<?php echo esc_attr( 'photo-' . $key ); ?>" class="large-text" rows="4" readonly onclick="this.select()"><?php echo esc_textarea( $item['guide']['image_prompt'] ); ?></textarea>
									</p>
									<?php if ( ! empty( $item['guide']['pin_prompt'] ) ) : ?>
										<p>
											<label for="<?php echo esc_attr( 'pin-' . $key ); ?>"><?php esc_html_e( 'Pinterest image (portrait 2:3, 1000 × 1500 px)', 'natura-core' ); ?></label>
											<textarea id="<?php echo esc_attr( 'pin-' . $key ); ?>" class="large-text" rows="4" readonly onclick="this.select()"><?php echo esc_textarea( $item['guide']['pin_prompt'] ); ?></textarea>
										</p>
									<?php endif; ?>
								</details>
							<?php endif; ?>
						</td>
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
