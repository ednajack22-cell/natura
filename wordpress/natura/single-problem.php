<?php
/**
 * Problem guide, e.g. "Why are my plant's leaves turning yellow?".
 *
 * The reader has a sick plant in front of them. So the first screen holds the
 * short answer and the likely causes, each with the clue that points to it;
 * one tap takes them to how to confirm that cause and what to do. The longer
 * explanation, the kit, and the FAQ come after.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_crumbs    = natura_problem_breadcrumbs();
	$natura_causes    = natura_problem_causes();
	$natura_pin_url   = natura_pinterest_save_url();
	$natura_plant_ids = natura_problem_plant_ids();
	$natura_body      = trim( (string) apply_filters( 'the_content', get_the_content() ) );
	$natura_products  = natura_products_box( __( 'Useful kit', 'natura' ) );
	?>
	<main id="main-content" class="plant-page problem-page">
		<?php echo natura_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

		<header class="site-container plant-hero">
			<div class="plant-hero-text">
				<h1><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="plant-lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
				<?php natura_the_byline(); ?>
			</div>

			<?php natura_the_hero_media( $natura_pin_url ); ?>
		</header>

		<?php if ( $natura_causes ) : ?>
			<section class="site-container problem-answer" aria-labelledby="problem-answer-title">
				<h2 id="problem-answer-title" class="plant-facts-title"><?php esc_html_e( 'Most likely causes', 'natura' ); ?></h2>
				<ol class="cause-list">
					<?php foreach ( $natura_causes as $natura_cause ) : ?>
						<li>
							<a href="#<?php echo esc_attr( $natura_cause['id'] ); ?>">
								<strong><?php echo esc_html( $natura_cause['cause'] ); ?></strong>
								<?php if ( $natura_cause['sign'] ) : ?>
									<span>
										<?php
										/* translators: %s: what the reader sees on the plant. */
										printf( esc_html__( 'Look for: %s', 'natura' ), esc_html( $natura_cause['sign'] ) );
										?>
									</span>
								<?php endif; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ol>
			</section>
		<?php endif; ?>

		<div class="site-container">
			<?php echo natura_ad_slot( __( 'After the likely causes', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
		</div>

		<div class="site-container plant-layout">
			<article <?php post_class( 'plant-article' ); ?>>
				<div class="entry-content plant-content">
					<?php foreach ( $natura_causes as $natura_index => $natura_cause ) : ?>
						<section class="cause" id="<?php echo esc_attr( $natura_cause['id'] ); ?>" aria-labelledby="<?php echo esc_attr( $natura_cause['id'] ); ?>-title">
							<h2 id="<?php echo esc_attr( $natura_cause['id'] ); ?>-title">
								<span class="cause-number"><?php echo (int) $natura_index + 1; ?></span>
								<?php echo esc_html( $natura_cause['cause'] ); ?>
							</h2>
							<dl class="cause-details">
								<?php if ( $natura_cause['check'] ) : ?>
									<div>
										<dt><?php esc_html_e( 'How to confirm it', 'natura' ); ?></dt>
										<dd><?php echo wp_kses_post( wpautop( esc_html( $natura_cause['check'] ) ) ); ?></dd>
									</div>
								<?php endif; ?>
								<?php if ( $natura_cause['fix'] ) : ?>
									<div>
										<dt><?php esc_html_e( 'What to do', 'natura' ); ?></dt>
										<dd><?php echo wp_kses_post( wpautop( esc_html( $natura_cause['fix'] ) ) ); ?></dd>
									</div>
								<?php endif; ?>
								<?php if ( $natura_cause['recovery'] ) : ?>
									<div class="cause-recovery">
										<dt><?php esc_html_e( 'Recovery', 'natura' ); ?></dt>
										<dd><?php echo esc_html( $natura_cause['recovery'] ); ?></dd>
									</div>
								<?php endif; ?>
							</dl>
						</section>
						<?php
						// The kit follows the first cause: by then the reader
						// knows what to check, and what with.
						if ( 0 === $natura_index ) {
							echo $natura_products; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in natura_products_box().
							$natura_products = '';
						}
						?>
					<?php endforeach; ?>

					<?php echo $natura_body; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- post content filtered by the_content. ?>
					<?php echo $natura_products; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in natura_products_box(); empty when already shown. ?>
				</div>

				<?php natura_the_faq_and_sources(); ?>
			</article>
		</div>

		<?php if ( $natura_plant_ids ) : ?>
			<?php
			$natura_plants = new WP_Query(
				array(
					'post_type'           => 'plant',
					'post__in'            => $natura_plant_ids,
					'posts_per_page'      => 8,
					'orderby'             => 'title',
					'order'               => 'ASC',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				)
			);
			?>
			<?php if ( $natura_plants->have_posts() ) : ?>
				<section class="site-container plant-related" aria-labelledby="problem-plants-title">
					<h2 id="problem-plants-title"><?php esc_html_e( 'Plants this often affects', 'natura' ); ?></h2>
					<div class="plant-grid">
						<?php
						while ( $natura_plants->have_posts() ) :
							$natura_plants->the_post();
							get_template_part( 'template-parts/plant-card' );
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</section>
			<?php endif; ?>
		<?php endif; ?>

		<?php
		$natura_related = new WP_Query(
			array(
				'post_type'           => 'problem',
				'posts_per_page'      => 3,
				'post__not_in'        => array( get_the_ID() ),
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			)
		);
		if ( $natura_related->have_posts() ) :
			?>
			<section class="site-container plant-related" aria-labelledby="problem-related-title">
				<?php echo natura_ad_slot( __( 'Before "Other plant problems"', 'natura' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot(). ?>
				<h2 id="problem-related-title"><?php esc_html_e( 'Other plant problems', 'natura' ); ?></h2>
				<div class="problem-grid">
					<?php
					while ( $natura_related->have_posts() ) :
						$natura_related->the_post();
						get_template_part( 'template-parts/problem-card' );
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
