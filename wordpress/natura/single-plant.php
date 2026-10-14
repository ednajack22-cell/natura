<?php
/**
 * Plant guide.
 *
 * Built for a reader arriving from a Pinterest pin or a search result, usually
 * on a phone: the answer first (title, summary, quick facts), the long guide
 * after, and the shopping list where the guide has explained why each item
 * matters. It ends with the problems this plant is prone to, then more plants.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_type     = natura_plant_type();
	$natura_facts    = natura_plant_quick_facts();
	$natura_botany   = (string) natura_field( 'botanical_name' );
	$natura_pin_url  = natura_pinterest_save_url();
	$natura_crumbs   = natura_plant_breadcrumbs();
	$natura_prepared = natura_prepare_content(
		(string) apply_filters( 'the_content', get_the_content() ),
		array(
			// The shopping list follows the second section, once the reader
			// knows what the plant needs; the ad follows the fourth, well inside
			// the guide, never above the first useful answer.
			2 => natura_products_box( __( 'What you need', 'natura' ) ),
			4 => natura_ad_slot( __( 'Inside the guide, after the fourth section', 'natura' ) ),
		),
		array( 2 )
	);
	?>
	<main id="main-content" class="plant-page">
		<?php echo natura_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

		<header class="site-container plant-hero">
			<div class="plant-hero-text">
				<h1><?php the_title(); ?></h1>
				<?php if ( $natura_botany ) : ?>
					<p class="plant-botanical"><?php echo esc_html( $natura_botany ); ?></p>
				<?php endif; ?>
				<?php if ( has_excerpt() ) : ?>
					<p class="plant-lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
				<?php natura_the_byline(); ?>
			</div>

			<?php natura_the_hero_media( $natura_pin_url ); ?>
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
				<?php natura_the_toc( $natura_prepared['toc'], __( 'In this guide', 'natura' ), $natura_pin_url ); ?>
			<?php endif; ?>

			<article <?php post_class( 'plant-article' ); ?>>
				<div class="entry-content plant-content">
					<?php echo $natura_prepared['html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- post content filtered by the_content, plus escaped theme markup. ?>
				</div>

				<?php natura_the_faq_and_sources(); ?>
			</article>
		</div>

		<?php
		$natura_problems = natura_plant_problems( get_the_ID() );
		if ( $natura_problems && $natura_problems->have_posts() ) :
			?>
			<section class="site-container plant-related" aria-labelledby="plant-problems-title">
				<h2 id="plant-problems-title"><?php esc_html_e( 'Common problems', 'natura' ); ?></h2>
				<div class="problem-grid">
					<?php
					while ( $natura_problems->have_posts() ) :
						$natura_problems->the_post();
						get_template_part( 'template-parts/problem-card' );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</section>
		<?php endif; ?>

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
