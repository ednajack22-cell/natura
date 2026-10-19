<?php
/**
 * The guide layout shared by plant guides, problem guides, and articles.
 *
 * Structure (see wordpress/design/BLUEPRINT.md, from the Stitch "Monetized
 * Garden Article" and "Pinterest-Optimized Diagnostic Guide" mock-ups):
 *
 *   breadcrumbs, tag, title, summary, byline with the Pinterest button,
 *   affiliate note when the guide has affiliate links;
 *   then 8 + 4 columns on wide screens:
 *     main:    photo, "At a glance", "In this guide", numbered sections with
 *              an ad after section 1, the shopping list after section 2, the
 *              Pinterest image after section 3, an ad after section 5;
 *              then FAQ, sources, author;
 *     sidebar: Pinterest box, 300 × 600 ad, "Read next" (sticky);
 *   then related guides and a multiplex ad, full width.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

/**
 * Whether the current guide links to at least one shop.
 */
function natura_guide_has_affiliate_links(): bool {
	$products  = natura_section_enabled( 'guide_products' ) && array_filter( array_column( natura_field_list( 'products' ), 'url' ) );
	$varieties = function_exists( 'natura_plant_varieties' ) && array_filter( array_column( natura_plant_varieties(), 'url' ) );
	$picks     = 'gear' === get_post_type() && array_filter( array_column( natura_field_list( 'picks' ), 'url' ) );

	$diy       = 'project' === get_post_type() && ( array_filter( array_column( natura_field_list( 'materials' ), 'url' ) ) || array_filter( array_column( natura_field_list( 'tools' ), 'url' ) ) );

	return $products || $varieties || $picks || $diy;
}

/**
 * The dedicated vertical Pinterest image of the current guide, if any.
 */
function natura_guide_pin_image_id(): int {
	$image_id = absint( natura_field( 'pin_image' ) );

	return $image_id && wp_attachment_is_image( $image_id ) ? $image_id : 0;
}

/**
 * Address of the affiliate disclosure page.
 */
function natura_disclosure_url(): string {
	return natura_page_url( 'disclosure', '/commercial-disclosure/' );
}

/**
 * Prints the top of a guide: breadcrumbs, tag, title, summary, byline, and
 * the affiliate note.
 *
 * @param array{crumbs: array, tag?: string, tag_url?: string, botanical?: string, now?: string} $args Header parts.
 */
function natura_the_guide_header( array $args ): void {
	$pin_url = natura_pinterest_save_url();
	natura_the_breadcrumbs( $args['crumbs'] );
	?>
	<header class="site-container guide-header">
		<?php if ( ! empty( $args['tag'] ) ) : ?>
			<p class="tag">
				<?php if ( ! empty( $args['tag_url'] ) ) : ?>
					<a href="<?php echo esc_url( $args['tag_url'] ); ?>"><?php echo esc_html( $args['tag'] ); ?></a>
				<?php else : ?>
					<?php echo esc_html( $args['tag'] ); ?>
				<?php endif; ?>
			</p>
		<?php endif; ?>
		<h1><?php the_title(); ?></h1>
		<?php if ( ! empty( $args['now'] ) ) : ?>
			<p class="guide-now"><?php natura_the_icon( 'calendar' ); ?> <?php echo esc_html( $args['now'] ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $args['botanical'] ) ) : ?>
			<p class="plant-botanical"><?php echo esc_html( $args['botanical'] ); ?></p>
		<?php endif; ?>
		<?php if ( has_excerpt() ) : ?>
			<p class="plant-lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>

		<div class="guide-byline">
			<p class="byline">
				<span class="avatar" aria-hidden="true"><?php echo esc_html( natura_author_initials() ); ?></span>
				<span>
					<?php if ( get_the_author() ) : ?>
						<strong><?php the_author(); ?></strong>
					<?php endif; ?>
					<span>
						<?php
						/* translators: %s: date. */
						printf( esc_html__( 'Updated %s', 'natura' ), '<time datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
						?>
					</span>
				</span>
			</p>
			<?php if ( $pin_url && natura_section_enabled( 'guide_pin_header' ) ) : ?>
				<a class="pin-button" href="<?php echo esc_url( $pin_url ); ?>" target="_blank" rel="noopener">
					<?php natura_the_icon( 'pin' ); ?>
					<span><?php esc_html_e( 'Save to Pinterest', 'natura' ); ?></span>
					<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'natura' ); ?></span>
				</a>
			<?php endif; ?>
		</div>

		<?php if ( natura_guide_has_affiliate_links() ) : ?>
			<p class="affiliate-note">
				<?php
				printf(
					/* translators: %s: link to the disclosure page. */
					esc_html__( 'This guide contains affiliate links: if you buy through them, we may earn a commission at no extra cost to you. %s', 'natura' ),
					'<a href="' . esc_url( natura_disclosure_url() ) . '">' . esc_html__( 'How we choose products', 'natura' ) . '</a>'
				);
				?>
			</p>
		<?php endif; ?>
	</header>
	<?php
}

/**
 * Prints the main photo with its caption.
 */
function natura_the_guide_photo(): void {
	if ( ! has_post_thumbnail() ) {
		return;
	}
	$caption = wp_get_attachment_caption( (int) get_post_thumbnail_id() );
	?>
	<figure class="guide-photo">
		<?php
		the_post_thumbnail(
			'large',
			array(
				'sizes'         => '(min-width: 1024px) 780px, 100vw',
				'fetchpriority' => 'high',
				'loading'       => 'eager',
			) + natura_pin_attributes( (int) get_the_ID() )
		);
		?>
		<?php if ( $caption ) : ?>
			<figcaption><?php echo esc_html( $caption ); ?></figcaption>
		<?php endif; ?>
	</figure>
	<?php
}

/**
 * Prints "In this guide": the sections, numbered, in two columns.
 *
 * @param array<int, array{id: string, title: string}> $toc Sections.
 */
function natura_the_guide_toc( array $toc ): void {
	if ( ! natura_section_enabled( 'guide_toc' ) ) {
		return;
	}
	if ( function_exists( 'natura_plant_varieties' ) && natura_plant_varieties() ) {
		$toc[] = array(
			'id'    => 'plant-varieties',
			'title' => __( 'Varieties to try', 'natura' ),
		);
	}
	if ( natura_field_list( 'faq' ) && natura_section_enabled( 'guide_faq' ) ) {
		$toc[] = array(
			'id'    => 'plant-faq',
			'title' => __( 'Questions & answers', 'natura' ),
		);
	}
	if ( count( $toc ) < 3 ) {
		return;
	}
	?>
	<nav class="guide-toc" aria-labelledby="guide-toc-title">
		<h2 id="guide-toc-title" class="label"><?php esc_html_e( 'In this guide', 'natura' ); ?></h2>
		<ol>
			<?php foreach ( $toc as $entry ) : ?>
				<li><a href="#<?php echo esc_attr( $entry['id'] ); ?>"><?php echo esc_html( $entry['title'] ); ?></a></li>
			<?php endforeach; ?>
		</ol>
	</nav>
	<?php
}

/**
 * The shopping list as product cards, or nothing when the list is empty.
 *
 * @param string $title Box heading.
 */
function natura_products_box( string $title ): string {
	$products = natura_field_list( 'products' );
	if ( ! $products || ! natura_section_enabled( 'guide_products' ) ) {
		return '';
	}

	ob_start();
	?>
	<aside class="product-box" aria-labelledby="product-box-title">
		<div class="product-box-head">
			<p class="label"><?php esc_html_e( 'Our picks', 'natura' ); ?></p>
			<h2 id="product-box-title"><?php echo esc_html( $title ); ?></h2>
		</div>
		<ul class="product-list">
			<?php
			foreach ( $products as $product ) {
				natura_the_product_card( $product );
			}
			?>
		</ul>
	</aside>
	<?php
	return (string) ob_get_clean();
}

/**
 * Prints one product card: photo, label, name, why it matters, and the shop
 * button (sponsored, opens in a new tab).
 *
 * @param array  $product Product row: name, badge, note, url, image.
 * @param string $size    Photo size.
 * @param string $sizes   Width the photo is shown at, for the browser's choice
 *                        among the image files.
 */
function natura_the_product_card( array $product, string $size = 'thumbnail', string $sizes = '72px' ): void {
	$natura_image = absint( $product['image'] ?? 0 );
	?>
		<li class="product-card<?php echo $natura_image ? ' has-image' : ''; ?>">
		<?php if ( $natura_image ) : ?>
			<div class="product-card-media"><?php echo wp_get_attachment_image( $natura_image, $size, false, array( 'alt' => '', 'sizes' => $sizes, 'loading' => 'lazy' ) + natura_no_pin() ); ?></div>
		<?php endif; ?>
		<div class="product-card-text">
			<?php if ( ! empty( $product['badge'] ) ) : ?>
				<p class="label"><?php echo esc_html( $product['badge'] ); ?></p>
			<?php endif; ?>
			<strong><?php echo esc_html( $product['name'] ?? '' ); ?></strong>
			<?php if ( ! empty( $product['note'] ) ) : ?>
				<span><?php echo esc_html( $product['note'] ); ?></span>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $product['url'] ) ) : ?>
			<a class="button button-buy" href="<?php echo esc_url( $product['url'] ); ?>" rel="sponsored nofollow noopener" target="_blank">
				<?php esc_html_e( 'Check price', 'natura' ); ?>
				<span class="screen-reader-text">
					<?php
					/* translators: %s: product name. */
					printf( esc_html__( 'for %s (opens in a new tab)', 'natura' ), esc_html( $product['name'] ?? '' ) );
					?>
				</span>
			</a>
		<?php endif; ?>
	</li>
	<?php
}

/**
 * The "Save this guide" block with the vertical Pinterest image, placed in
 * the middle of the guide. Nothing without a dedicated Pinterest image: a
 * landscape photo makes a poor pin.
 */
function natura_pin_block(): string {
	$image_id = natura_guide_pin_image_id();
	$pin_url  = natura_pinterest_save_url();
	if ( ! $image_id || ! $pin_url || ! natura_section_enabled( 'guide_pin_block' ) ) {
		return '';
	}

	ob_start();
	?>
	<aside class="pin-block" aria-labelledby="pin-block-title">
		<div class="pin-block-media"><?php echo wp_get_attachment_image( $image_id, 'medium', false, array( 'alt' => '' ) + natura_pin_attributes( (int) get_the_ID() ) ); ?></div>
		<div class="pin-block-text">
			<p class="label label-pinterest"><?php natura_the_icon( 'pin' ); ?> <?php esc_html_e( 'Pinterest', 'natura' ); ?></p>
			<h2 id="pin-block-title"><?php esc_html_e( 'Save this guide for later', 'natura' ); ?></h2>
			<p><?php esc_html_e( 'Pin it to a board and find it again when you are out on the balcony.', 'natura' ); ?></p>
			<a class="pin-button" href="<?php echo esc_url( $pin_url ); ?>" target="_blank" rel="noopener">
				<?php natura_the_icon( 'pin' ); ?>
				<span><?php esc_html_e( 'Save', 'natura' ); ?></span>
				<span class="screen-reader-text"><?php esc_html_e( 'this guide to Pinterest (opens in a new tab)', 'natura' ); ?></span>
			</a>
		</div>
	</aside>
	<?php
	return (string) ob_get_clean();
}

/**
 * Blocks placed between the sections of a guide, by section number.
 *
 * @param string $products_title Heading of the shopping list.
 * @return array{inserts: array<int, string>, keep: int[]}
 */
function natura_guide_inserts( string $products_title ): array {
	return array(
		'inserts' => array(
			1 => natura_ad_slot( __( 'Guide, after section 1', 'natura' ), 'in-content', 'ads_guide_text' ),
			2 => natura_products_box( $products_title ),
			3 => natura_pin_block(),
			5 => natura_ad_slot( __( 'Guide, after section 5', 'natura' ), 'in-content', 'ads_guide_text' ),
		),
		// A short guide still shows its shopping list and Pinterest block.
		'keep'    => array( 2, 3 ),
	);
}

/**
 * The author's initials, shown instead of a Gravatar picture: no request to a
 * third-party server, nothing to declare under GDPR.
 */
function natura_author_initials(): string {
	$words    = preg_split( '/\s+/', trim( (string) get_the_author() ) ) ?: array();
	$initials = '';
	foreach ( array_slice( $words, 0, 2 ) as $word ) {
		$initials .= mb_strtoupper( mb_substr( $word, 0, 1 ) );
	}

	return $initials ?: 'N';
}

/**
 * Prints the author box when the author has written a biography (Users →
 * Profile → Biographical Info).
 */
function natura_the_author_box(): void {
	$bio = (string) get_the_author_meta( 'description' );
	if ( '' === trim( $bio ) || ! natura_section_enabled( 'guide_author' ) ) {
		return;
	}
	?>
	<section class="author-box" aria-label="<?php esc_attr_e( 'About the author', 'natura' ); ?>">
		<span class="avatar avatar-large" aria-hidden="true"><?php echo esc_html( natura_author_initials() ); ?></span>
		<div>
			<p class="label"><?php esc_html_e( 'Written by', 'natura' ); ?></p>
			<strong><?php the_author(); ?></strong>
			<p><?php echo esc_html( $bio ); ?></p>
		</div>
	</section>
	<?php
}

/**
 * Prints the sticky right column: Pinterest box and 300 × 600 ad. The "Read
 * next" list sits at the end of the text instead (natura_the_read_next()), so
 * it is never shown twice on phones, where this column follows the text.
 */
function natura_the_guide_sidebar(): void {
	$pin_url  = natura_section_enabled( 'guide_side_pin' ) ? natura_pinterest_save_url() : '';
	$image_id = natura_guide_pin_image_id() ?: (int) get_post_thumbnail_id();
	$ad       = natura_ad_slot( __( 'Guide sidebar', 'natura' ), 'sidebar', 'ads_sidebar' );
	// Everything switched off: no column at all, the text takes the full width.
	if ( ! $pin_url && ! $ad ) {
		return;
	}
	?>
	<aside class="guide-sidebar" aria-label="<?php esc_attr_e( 'More from Natura', 'natura' ); ?>">
		<div class="guide-sidebar-inner">
			<?php if ( $pin_url ) : ?>
				<div class="side-card side-pin">
					<?php if ( $image_id ) : ?>
						<?php echo wp_get_attachment_image( $image_id, 'thumbnail', false, array( 'alt' => '' ) + natura_no_pin() ); ?>
					<?php endif; ?>
					<div>
						<p class="label label-pinterest"><?php esc_html_e( 'Save for later', 'natura' ); ?></p>
						<p><?php esc_html_e( 'Keep this guide on a Pinterest board.', 'natura' ); ?></p>
					</div>
					<a class="pin-button pin-button-wide" href="<?php echo esc_url( $pin_url ); ?>" target="_blank" rel="noopener">
						<?php natura_the_icon( 'pin' ); ?>
						<span><?php esc_html_e( 'Save this guide', 'natura' ); ?></span>
						<span class="screen-reader-text"><?php esc_html_e( 'to Pinterest (opens in a new tab)', 'natura' ); ?></span>
					</a>
				</div>
			<?php endif; ?>

			<?php echo $ad; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
		</div>
	</aside>
	<?php
}

/**
 * The post types that use the guide layout, with the taxonomy whose terms
 * make two guides "related" for the "Read next" list.
 *
 * @return array<string, string>
 */
function natura_guide_taxonomies(): array {
	return array(
		'plant'   => 'plant_type',
		'problem' => 'problem_part',
		'post'    => 'category',
		'gear'    => 'gear_category',
		'project' => 'project_category',
	);
}

/**
 * IDs of up to 5 published guides to read next: same type and same term
 * first (for a problem, the same part of the plant, then the same plants),
 * then the newest guides of the same type.
 *
 * Cached for 12 hours per guide. Saving or deleting any guide starts a new
 * cache generation (natura_flush_read_next()), so a renamed, unpublished or
 * new guide shows up at once.
 *
 * @param int $post_id Current guide.
 * @return int[]
 */
function natura_read_next_ids( int $post_id ): array {
	$type = (string) get_post_type( $post_id );
	$map  = natura_guide_taxonomies();
	if ( ! isset( $map[ $type ] ) ) {
		return array();
	}

	$key    = 'natura_read_next_' . $post_id . '_' . (int) get_option( 'natura_read_next_gen', 0 );
	$cached = get_transient( $key );
	if ( is_array( $cached ) ) {
		return array_map( 'intval', $cached );
	}

	$ids  = array();
	$base = array(
		'post_type'           => $type,
		'post_status'         => 'publish',
		'fields'              => 'ids',
		'orderby'             => 'date',
		'order'               => 'DESC',
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);
	$add  = static function ( array $args ) use ( &$ids, $base, $post_id ): void {
		$left = 5 - count( $ids );
		if ( $left < 1 ) {
			return;
		}
		$found = get_posts(
			$args + array(
				'posts_per_page' => $left,
				'post__not_in'   => array_merge( array( $post_id ), $ids ),
			) + $base
		);
		$ids   = array_merge( $ids, array_map( 'intval', $found ) );
	};

	$taxonomy = $map[ $type ];
	if ( taxonomy_exists( $taxonomy ) ) {
		$terms = wp_get_post_terms( $post_id, $taxonomy, array( 'fields' => 'ids' ) );
		$terms = is_array( $terms ) ? array_map( 'intval', $terms ) : array();
		if ( 'category' === $taxonomy ) {
			// "Uncategorized" says nothing about the subject.
			$terms = array_values( array_diff( $terms, array( (int) get_option( 'default_category' ) ) ) );
		}
		if ( $terms ) {
			$add(
				array(
					'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- cached for 12 hours.
						array(
							'taxonomy' => $taxonomy,
							'terms'    => $terms,
						),
					),
				)
			);
		}
	}

	if ( 'problem' === $type ) {
		$plants = array_filter( array_map( 'absint', (array) get_post_meta( $post_id, '_natura_plant' ) ) );
		if ( $plants ) {
			$add(
				array(
					'meta_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query -- cached for 12 hours.
						array(
							'key'     => '_natura_plant',
							'value'   => array_values( $plants ),
							'compare' => 'IN',
						),
					),
				)
			);
		}
	}

	$add( array() );

	set_transient( $key, $ids, 12 * HOUR_IN_SECONDS );

	return $ids;
}

/**
 * Starts a new "Read next" cache generation when a guide is saved or
 * deleted: the lists of other guides may name it.
 *
 * @param int $post_id Saved or deleted post.
 */
function natura_flush_read_next( int $post_id ): void {
	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
		return;
	}
	if ( ! isset( natura_guide_taxonomies()[ (string) get_post_type( $post_id ) ] ) ) {
		return;
	}
	update_option( 'natura_read_next_gen', (int) get_option( 'natura_read_next_gen', 0 ) + 1, true );
}
add_action( 'save_post', 'natura_flush_read_next' );
add_action( 'before_delete_post', 'natura_flush_read_next' );

/**
 * The short line under a "Read next" title: the kind of guide, and its
 * plant type, topic, or category.
 *
 * @param WP_Post $item Guide.
 */
function natura_read_next_meta( WP_Post $item ): string {
	$labels = array(
		'plant'   => __( 'Growing guide', 'natura' ),
		'problem' => __( 'Plant problem', 'natura' ),
		'post'    => __( 'Plant Care', 'natura' ),
		'gear'    => __( 'Buying guide', 'natura' ),
		'project' => __( 'DIY project', 'natura' ),
	);
	$label    = $labels[ $item->post_type ] ?? '';
	$taxonomy = natura_guide_taxonomies()[ $item->post_type ] ?? '';
	if ( 'problem' === $item->post_type || ! $taxonomy || ! taxonomy_exists( $taxonomy ) ) {
		return $label;
	}

	$terms = get_the_terms( $item, $taxonomy );
	if ( is_array( $terms ) ) {
		foreach ( $terms as $term ) {
			if ( 'category' === $taxonomy && (int) get_option( 'default_category' ) === $term->term_id ) {
				continue;
			}
			// A Plant Care article shows its topic alone: "Watering".
			return 'post' === $item->post_type ? $term->name : $label . ' · ' . $term->name;
		}
	}

	return $label;
}

/**
 * Prints "Read next" at the end of a guide: a numbered list of titles,
 * without images, so it costs almost nothing to load. Shown from 2 guides.
 */
function natura_the_read_next(): void {
	if ( ! natura_section_enabled( 'guide_read_next' ) ) {
		return;
	}
	$ids   = natura_read_next_ids( (int) get_the_ID() );
	$items = $ids ? get_posts(
		array(
			'post_type'           => array_keys( natura_guide_taxonomies() ),
			'post_status'         => 'publish',
			'post__in'            => $ids,
			'orderby'             => 'post__in',
			'posts_per_page'      => 5,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	) : array();
	if ( count( $items ) < 2 ) {
		return;
	}
	$title = trim( natura_home_setting( 'natura_read_next_title' ) );
	if ( '' === $title ) {
		$title = __( 'Read next', 'natura' );
	}
	?>
	<section class="read-next" aria-labelledby="read-next-title">
		<h2 id="read-next-title"><?php echo esc_html( $title ); ?></h2>
		<ol>
			<?php foreach ( $items as $natura_item ) : ?>
				<?php $natura_meta = natura_read_next_meta( $natura_item ); ?>
				<li>
					<a href="<?php echo esc_url( get_permalink( $natura_item ) ); ?>">
						<span class="read-next-title"><?php echo esc_html( get_the_title( $natura_item ) ); ?></span>
						<?php if ( '' !== $natura_meta ) : ?>
							<span class="read-next-meta"><?php echo esc_html( $natura_meta ); ?></span>
						<?php endif; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ol>
	</section>
	<?php
}

/**
 * The reading progress bar of guides: a 3 px line at the top of the screen,
 * filled by assets/js/navigation.js as the reader moves through the text.
 * Decorative (the scroll bar already says the same), and hidden until the
 * script runs.
 */
add_action(
	'wp_body_open',
	static function (): void {
		if ( ! is_singular( array_keys( natura_guide_taxonomies() ) ) || ! natura_section_enabled( 'guide_progress' ) ) {
			return;
		}
		echo '<div class="reading-progress" aria-hidden="true" hidden></div>' . "\n";
	}
);

/**
 * Prints a full-width related section.
 *
 * @param string   $id       Heading id.
 * @param string   $label    Small-caps label.
 * @param string   $title    Heading.
 * @param WP_Post[] $items   Posts.
 * @param string   $template Card template part.
 * @param string   $grid     Grid class.
 */
function natura_the_related( string $id, string $label, string $title, array $items, string $template, string $grid ): void {
	if ( ! $items || ! natura_section_enabled( 'guide_related' ) ) {
		return;
	}
	?>
	<section class="site-container guide-related" aria-labelledby="<?php echo esc_attr( $id ); ?>">
		<p class="label"><?php echo esc_html( $label ); ?></p>
		<h2 id="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $title ); ?></h2>
		<div class="<?php echo esc_attr( $grid ); ?>">
			<?php
			foreach ( $items as $natura_item ) {
				setup_postdata( $GLOBALS['post'] = $natura_item ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- restored below.
				get_template_part( $template );
			}
			wp_reset_postdata();
			?>
		</div>
	</section>
	<?php
}

/**
 * Prints the multiplex ad at the end of a guide.
 */
function natura_the_guide_end_ad(): void {
	$ad = natura_ad_slot( __( 'End of guide', 'natura' ), 'multiplex', 'ads_guide_end' );
	if ( $ad ) {
		echo '<div class="site-container">' . $ad . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot().
	}
}
