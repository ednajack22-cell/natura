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
	return (bool) array_filter( array_column( natura_field_list( 'products' ), 'url' ) );
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
	return home_url( '/commercial-disclosure/' );
}

/**
 * Prints the top of a guide: breadcrumbs, tag, title, summary, byline, and
 * the affiliate note.
 *
 * @param array{crumbs: array, tag?: string, tag_url?: string, botanical?: string} $args Header parts.
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
			<?php if ( $pin_url ) : ?>
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
	if ( natura_field_list( 'faq' ) ) {
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
	if ( ! $products ) {
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
	if ( ! $image_id || ! $pin_url ) {
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
			1 => natura_ad_slot( __( 'Guide, after section 1', 'natura' ) ),
			2 => natura_products_box( $products_title ),
			3 => natura_pin_block(),
			5 => natura_ad_slot( __( 'Guide, after section 5', 'natura' ) ),
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
	if ( '' === trim( $bio ) ) {
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
 * Prints the sticky right column: Pinterest box, 300 × 600 ad, "Read next".
 *
 * @param string $post_type Post type of the "Read next" guides.
 */
function natura_the_guide_sidebar( string $post_type ): void {
	$pin_url  = natura_pinterest_save_url();
	$image_id = natura_guide_pin_image_id() ?: (int) get_post_thumbnail_id();
	$next     = get_posts(
		array(
			'post_type'      => $post_type,
			'posts_per_page' => 3,
			'post__not_in'   => array( get_the_ID() ),
			'no_found_rows'  => true,
		)
	);
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

			<?php echo natura_ad_slot( __( 'Guide sidebar', 'natura' ), 'sidebar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>

			<?php if ( $next ) : ?>
				<div class="side-card side-next">
					<h2 class="label"><?php esc_html_e( 'Read next', 'natura' ); ?></h2>
					<ol>
						<?php foreach ( $next as $natura_item ) : ?>
							<li>
								<a href="<?php echo esc_url( get_permalink( $natura_item ) ); ?>">
									<strong><?php echo esc_html( get_the_title( $natura_item ) ); ?></strong>
									<?php if ( has_excerpt( $natura_item ) ) : ?>
										<span><?php echo esc_html( wp_trim_words( get_the_excerpt( $natura_item ), 10 ) ); ?></span>
									<?php endif; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
			<?php endif; ?>
		</div>
	</aside>
	<?php
}

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
	if ( ! $items ) {
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
	$ad = natura_ad_slot( __( 'End of guide', 'natura' ), 'multiplex' );
	if ( $ad ) {
		echo '<div class="site-container">' . $ad . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot().
	}
}
