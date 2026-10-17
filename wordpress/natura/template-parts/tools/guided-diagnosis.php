<?php
/**
 * Symptom checker: the plant, then where the problem shows, then the problem
 * guides that match, each with the signs that point to each cause.
 *
 * The method of the UC IPM diagnostic tool (plant, part, damage), answered
 * from the site's own problem guides: their "Plants affected", "Where it
 * shows", and the "What you see" of each likely cause. Nothing is guessed:
 * the reader compares what they see and opens the guide.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_questions = natura_diagnosis_questions();
$natura_answers   = natura_diagnosis_answers();
$natura_results   = natura_diagnosis_query( $natura_answers );
$natura_url       = natura_tool_url( 'guided-diagnosis' );
?>
<form class="finder" method="get" action="<?php echo esc_url( $natura_url . '#results' ); ?>">
	<?php if ( ! $natura_questions ) : ?>
		<p class="empty-state"><?php esc_html_e( 'The symptom checker needs problem guides with "Plants affected" or "Where it shows" filled in.', 'natura' ); ?></p>
	<?php endif; ?>
	<?php
	foreach ( $natura_questions as $natura_key => $natura_question ) {
		natura_the_tool_question( $natura_key, $natura_question, $natura_answers );
	}
	?>
	<?php if ( $natura_questions ) : ?>
		<div class="finder-actions">
			<button type="submit" class="button button-primary"><?php natura_the_icon( 'lens' ); ?> <?php esc_html_e( 'Show likely problems', 'natura' ); ?></button>
			<?php if ( $natura_answers ) : ?>
				<a class="text-link" href="<?php echo esc_url( $natura_url ); ?>"><?php esc_html_e( 'Start again', 'natura' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</form>

<section class="finder-results" id="results" aria-labelledby="diagnosis-results-title">
	<h2 id="diagnosis-results-title">
		<?php
		if ( $natura_answers ) {
			/* translators: %s: number of problem guides. */
			echo esc_html( sprintf( _n( '%s problem matches', '%s problems match', $natura_results->post_count, 'natura' ), number_format_i18n( $natura_results->post_count ) ) );
		} else {
			esc_html_e( 'All plant problems', 'natura' );
		}
		?>
	</h2>
	<?php if ( $natura_results->have_posts() ) : ?>
		<p class="diagnosis-how"><?php esc_html_e( 'Compare what you see with the signs below. The first sign that matches usually points to the cause; open the guide to confirm it before you treat anything.', 'natura' ); ?></p>
		<ul class="diagnosis-list">
			<?php
			while ( $natura_results->have_posts() ) :
				$natura_results->the_post();
				$natura_causes = array_filter( natura_problem_causes(), static fn( array $cause ): bool => '' !== trim( $cause['sign'] ) );
				?>
				<li class="diagnosis-card">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php if ( has_excerpt() ) : ?>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
					<?php endif; ?>
					<?php if ( $natura_causes ) : ?>
						<dl class="diagnosis-signs">
							<?php foreach ( $natura_causes as $natura_cause ) : ?>
								<div>
									<dt><?php esc_html_e( 'If you see', 'natura' ); ?></dt>
									<dd class="diagnosis-sign"><?php echo esc_html( $natura_cause['sign'] ); ?></dd>
									<dt><?php esc_html_e( 'Likely cause', 'natura' ); ?></dt>
									<dd><a href="<?php echo esc_url( get_permalink() . '#' . $natura_cause['id'] ); ?>"><?php echo esc_html( $natura_cause['cause'] ); ?></a></dd>
								</div>
							<?php endforeach; ?>
						</dl>
					<?php endif; ?>
					<a class="text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read the full guide', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a>
				</li>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</ul>
	<?php else : ?>
		<p class="empty-state"><?php esc_html_e( 'No problem guide matches these answers yet. Set one of them back to "Any", or browse all plant problems.', 'natura' ); ?></p>
	<?php endif; ?>
	<p class="diagnosis-more"><a class="text-link" href="<?php echo esc_url( natura_problems_url() ); ?>"><?php esc_html_e( 'Browse all plant problems', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a></p>
</section>
