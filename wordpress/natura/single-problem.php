<?php
/**
 * Problem guide, e.g. "Why are my plant's leaves turning yellow?".
 *
 * The reader has a sick plant in front of them. "At a glance" lists the likely
 * causes, each with the clue that points to it; one tap jumps to how to
 * confirm that cause, what to do, and how long recovery takes. Each cause is
 * a section of the guide layout (inc/guide.php), so the ads, the useful kit,
 * and the Pinterest image fall between causes.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_crumbs    = natura_problem_breadcrumbs();
	$natura_causes    = natura_problem_causes();
	$natura_layout    = natura_guide_inserts( __( 'Useful gear', 'natura' ) );
	$natura_inserts   = $natura_layout['inserts'];
	$natura_body      = trim( (string) apply_filters( 'the_content', get_the_content() ) );
	$natura_plant_ids = natura_problem_plant_ids();
	$natura_plants    = $natura_plant_ids ? get_posts(
		array(
			'post_type'      => 'plant',
			'post__in'       => $natura_plant_ids,
			'posts_per_page' => 4,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'no_found_rows'  => true,
		)
	) : array();
	?>
	<main id="main-content" class="guide-page problem-page">
		<?php echo natura_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
		<?php
		natura_the_guide_header(
			array(
				'crumbs'  => $natura_crumbs,
				'tag'     => __( 'Plant problem', 'natura' ),
				'tag_url' => natura_problems_url(),
			)
		);
		?>

		<div class="site-container guide-layout">
			<article <?php post_class( 'guide-main' ); ?>>
				<?php natura_the_guide_photo(); ?>

				<?php if ( $natura_causes ) : ?>
					<section class="glance" aria-labelledby="glance-title">
						<h2 id="glance-title"><?php esc_html_e( 'At a glance: the likely causes', 'natura' ); ?></h2>
						<ol class="cause-list">
							<?php foreach ( $natura_causes as $natura_index => $natura_cause ) : ?>
								<li>
									<a href="#<?php echo esc_attr( $natura_cause['id'] ); ?>">
										<span class="label">
											<?php
											/* translators: %d: cause number. */
											printf( esc_html__( 'Cause %d', 'natura' ), (int) $natura_index + 1 );
											?>
										</span>
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

				<div class="entry-content guide-content">
					<?php foreach ( $natura_causes as $natura_index => $natura_cause ) : ?>
						<section class="cause" id="<?php echo esc_attr( $natura_cause['id'] ); ?>" aria-labelledby="<?php echo esc_attr( $natura_cause['id'] ); ?>-title">
							<h2 id="<?php echo esc_attr( $natura_cause['id'] ); ?>-title">
								<span class="cause-number"><?php echo esc_html( sprintf( '%02d', $natura_index + 1 ) ); ?></span>
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
						$natura_number = $natura_index + 1;
						if ( isset( $natura_inserts[ $natura_number ] ) ) {
							echo $natura_inserts[ $natura_number ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped where built (inc/guide.php, inc/ads.php).
							unset( $natura_inserts[ $natura_number ] );
						}
						?>
					<?php endforeach; ?>

					<?php echo $natura_body; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- post content filtered by the_content. ?>

					<?php
					// With few causes, the kit and the Pinterest image follow the guide.
					foreach ( $natura_layout['keep'] as $natura_key ) {
						echo $natura_inserts[ $natura_key ] ?? ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped where built.
					}
					?>
				</div>

				<?php natura_the_share_bar( 'share_guides', __( 'Found this useful? Share it', 'natura' ) ); ?>
				<?php natura_the_faq_and_sources(); ?>
				<?php natura_the_author_box(); ?>
				<?php natura_the_read_next(); ?>
			</article>

			<?php natura_the_guide_sidebar(); ?>
		</div>

		<?php
		natura_the_related( 'problem-plants-title', __( 'Plants affected', 'natura' ), __( 'Plants this often affects', 'natura' ), $natura_plants, 'template-parts/plant-card', 'plant-grid' );
		natura_the_guide_end_ad();
		?>
	</main>
	<?php
endwhile;

get_footer();
