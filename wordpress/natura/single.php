<?php
/**
 * Plant Care article, e.g. "How often to water container plants".
 *
 * Same reading layout as a plant guide: the answer in the summary, a table of
 * contents for longer articles, the shopping list after the second section,
 * then FAQ and sources. It ends with more articles on the same topic.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_crumbs   = natura_topic_breadcrumbs();
	$natura_topic    = natura_post_topic();
	$natura_pin_url  = natura_pinterest_save_url();
	$natura_prepared = natura_prepare_content(
		(string) apply_filters( 'the_content', get_the_content() ),
		array(
			2 => natura_products_box( __( 'What you need', 'natura' ) ),
			3 => natura_ad_slot( __( 'Inside the article, after the third section', 'natura' ) ),
		),
		array( 2 )
	);
	?>
	<main id="main-content" class="plant-page article-page">
		<?php echo natura_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

		<header class="site-container plant-hero">
			<div class="plant-hero-text">
				<?php if ( $natura_topic ) : ?>
					<p class="eyebrow"><a href="<?php echo esc_url( (string) get_term_link( $natura_topic ) ); ?>"><?php echo esc_html( $natura_topic->name ); ?></a></p>
				<?php endif; ?>
				<h1><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="plant-lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
				<?php natura_the_byline(); ?>
			</div>

			<?php natura_the_hero_media( $natura_pin_url ); ?>
		</header>

		<div class="site-container plant-layout">
			<?php if ( count( $natura_prepared['toc'] ) > 2 ) : ?>
				<?php natura_the_toc( $natura_prepared['toc'], __( 'In this article', 'natura' ), $natura_pin_url ); ?>
			<?php endif; ?>

			<article <?php post_class( 'plant-article' ); ?>>
				<div class="entry-content plant-content">
					<?php echo $natura_prepared['html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- post content filtered by the_content, plus escaped theme markup. ?>
				</div>

				<?php natura_the_faq_and_sources(); ?>
			</article>
		</div>

		<?php
		$natura_related = $natura_topic ? new WP_Query(
			array(
				'post_type'           => 'post',
				'cat'                 => $natura_topic->term_id,
				'posts_per_page'      => 3,
				'post__not_in'        => array( get_the_ID() ),
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			)
		) : null;
		if ( $natura_related && $natura_related->have_posts() ) :
			?>
			<section class="site-container plant-related" aria-labelledby="article-related-title">
				<?php echo natura_ad_slot( __( 'Before "More on this topic"', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
				<div class="section-heading">
					<h2 id="article-related-title">
						<?php
						/* translators: %s: topic, e.g. "Watering". */
						printf( esc_html__( 'More on %s', 'natura' ), esc_html( mb_strtolower( $natura_topic->name ) ) );
						?>
					</h2>
					<a class="text-link" href="<?php echo esc_url( (string) get_term_link( $natura_topic ) ); ?>"><?php esc_html_e( 'All articles on this topic', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
				</div>
				<div class="post-grid">
					<?php
					while ( $natura_related->have_posts() ) :
						$natura_related->the_post();
						get_template_part( 'template-parts/post-card' );
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
