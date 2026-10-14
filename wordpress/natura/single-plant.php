<?php
/**
 * Plant guide.
 *
 * Built for a reader arriving from a Pinterest pin or a search result, usually
 * on a phone: the answer first (title, summary, quick facts), the long guide
 * after, and the shopping list where the guide has explained why each item
 * matters.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_type     = natura_plant_type();
	$natura_facts    = natura_plant_quick_facts();
	$natura_botany   = (string) natura_plant_field( 'botanical_name' );
	$natura_pin_url  = natura_pinterest_save_url();
	$natura_faq      = natura_plant_list( 'faq' );
	$natura_sources  = natura_plant_list( 'sources' );
	$natura_prepared = natura_prepare_plant_content( (string) apply_filters( 'the_content', get_the_content() ), natura_plant_products_box() );
	$natura_crumbs   = natura_plant_breadcrumbs();
	?>
	<main id="main-content" class="plant-page">
		<?php echo natura_plant_structured_data(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>

		<nav class="site-container breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'natura' ); ?>">
			<ol>
				<?php foreach ( $natura_crumbs as $natura_index => $natura_crumb ) : ?>
					<li>
						<?php if ( $natura_index < count( $natura_crumbs ) - 1 ) : ?>
							<a href="<?php echo esc_url( $natura_crumb['url'] ); ?>"><?php echo esc_html( $natura_crumb['name'] ); ?></a>
						<?php else : ?>
							<span aria-current="page"><?php echo esc_html( $natura_crumb['name'] ); ?></span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</nav>

		<header class="site-container plant-hero">
			<div class="plant-hero-text">
				<h1><?php the_title(); ?></h1>
				<?php if ( $natura_botany ) : ?>
					<p class="plant-botanical"><?php echo esc_html( $natura_botany ); ?></p>
				<?php endif; ?>
				<?php if ( has_excerpt() ) : ?>
					<p class="plant-lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
				<p class="plant-byline">
					<?php
					$natura_updated = '<time datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>';
					if ( get_the_author() ) {
						/* translators: 1: author name, 2: date. */
						printf( esc_html__( 'By %1$s · Updated %2$s', 'natura' ), esc_html( get_the_author() ), $natura_updated ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
					} else {
						/* translators: %s: date. */
						printf( esc_html__( 'Updated %s', 'natura' ), $natura_updated ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
					}
					?>
				</p>
			</div>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="plant-hero-media">
					<?php
					the_post_thumbnail(
						'large',
						array(
							'sizes'         => '(min-width: 1024px) 560px, 100vw',
							'fetchpriority' => 'high',
							'loading'       => 'eager',
						)
					);
					?>
					<?php if ( $natura_pin_url ) : ?>
						<a class="pin-button" href="<?php echo esc_url( $natura_pin_url ); ?>" target="_blank" rel="noopener">
							<?php natura_the_icon( 'pin' ); ?>
							<span><?php esc_html_e( 'Save', 'natura' ); ?></span>
							<span class="screen-reader-text"><?php esc_html_e( 'this guide to Pinterest (opens in a new tab)', 'natura' ); ?></span>
						</a>
					<?php endif; ?>
				</figure>
			<?php endif; ?>
		</header>

		<?php if ( $natura_facts ) : ?>
			<section class="site-container plant-facts" aria-labelledby="plant-facts-title">
				<h2 id="plant-facts-title" class="plant-facts-title"><?php esc_html_e( 'Quick facts', 'natura' ); ?></h2>
				<dl>
					<?php foreach ( $natura_facts as $natura_fact ) : ?>
						<div>
							<dt><?php echo esc_html( $natura_fact['label'] ); ?></dt>
							<dd><?php echo esc_html( $natura_fact['value'] ); ?></dd>
						</div>
					<?php endforeach; ?>
				</dl>
			</section>
		<?php endif; ?>

		<div class="site-container">
			<?php echo natura_ad_slot( __( 'After the quick facts', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
		</div>

		<div class="site-container plant-layout">
			<?php if ( count( $natura_prepared['toc'] ) > 2 ) : ?>
				<aside class="plant-toc-wrap">
					<details class="plant-toc">
						<summary><?php esc_html_e( 'In this guide', 'natura' ); ?></summary>
						<ol>
							<?php foreach ( $natura_prepared['toc'] as $natura_entry ) : ?>
								<li><a href="#<?php echo esc_attr( $natura_entry['id'] ); ?>"><?php echo esc_html( $natura_entry['title'] ); ?></a></li>
							<?php endforeach; ?>
							<?php if ( $natura_faq ) : ?>
								<li><a href="#plant-faq"><?php esc_html_e( 'Questions & answers', 'natura' ); ?></a></li>
							<?php endif; ?>
						</ol>
					</details>
					<?php if ( $natura_pin_url ) : ?>
						<a class="pin-button pin-button-wide" href="<?php echo esc_url( $natura_pin_url ); ?>" target="_blank" rel="noopener">
							<?php natura_the_icon( 'pin' ); ?>
							<span><?php esc_html_e( 'Save this guide', 'natura' ); ?></span>
							<span class="screen-reader-text"><?php esc_html_e( 'to Pinterest (opens in a new tab)', 'natura' ); ?></span>
						</a>
					<?php endif; ?>
				</aside>
			<?php endif; ?>

			<article <?php post_class( 'plant-article' ); ?>>
				<div class="entry-content plant-content">
					<?php echo $natura_prepared['html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- post content filtered by the_content, plus escaped theme markup. ?>
				</div>

				<?php if ( $natura_faq ) : ?>
					<section class="plant-faq" id="plant-faq" aria-labelledby="plant-faq-title">
						<h2 id="plant-faq-title"><?php esc_html_e( 'Questions & answers', 'natura' ); ?></h2>
						<?php foreach ( $natura_faq as $natura_row ) : ?>
							<details>
								<summary><?php echo esc_html( $natura_row['question'] ?? '' ); ?></summary>
								<p><?php echo esc_html( $natura_row['answer'] ?? '' ); ?></p>
							</details>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>

				<?php if ( $natura_sources ) : ?>
					<section class="plant-sources" aria-labelledby="plant-sources-title">
						<h2 id="plant-sources-title"><?php esc_html_e( 'Sources', 'natura' ); ?></h2>
						<ul>
							<?php foreach ( $natura_sources as $natura_source ) : ?>
								<li>
									<?php if ( ! empty( $natura_source['url'] ) ) : ?>
										<a href="<?php echo esc_url( $natura_source['url'] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $natura_source['title'] ?? '' ); ?></a>
									<?php else : ?>
										<?php echo esc_html( $natura_source['title'] ?? '' ); ?>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</section>
				<?php endif; ?>
			</article>
		</div>

		<?php
		$natura_related = new WP_Query(
			array(
				'post_type'           => 'plant',
				'posts_per_page'      => 4,
				'post__not_in'        => array( get_the_ID() ),
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
				'orderby'             => 'rand',
			)
		);
		if ( $natura_related->have_posts() ) :
			?>
			<section class="site-container plant-related" aria-labelledby="plant-related-title">
				<?php echo natura_ad_slot( __( 'Before "More plants"', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
				<h2 id="plant-related-title"><?php esc_html_e( 'More plants to grow', 'natura' ); ?></h2>
				<div class="plant-grid">
					<?php
					while ( $natura_related->have_posts() ) :
						$natura_related->the_post();
						get_template_part( 'template-parts/plant-card' );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</section>
		<?php endif; ?>
	</main>
	<?php
endwhile;

get_footer();
