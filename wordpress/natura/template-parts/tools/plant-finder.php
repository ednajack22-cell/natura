<?php
/**
 * Plant finder: up to five questions, answered with chips, then the plant
 * guides that match all the answers.
 *
 * A plain form sent with GET: it works without JavaScript, the answers stay
 * in the address (shareable, Back works), and each choice also links to its
 * own list (/plants/sun/full-sun/…). Every question can be left at "Any".
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_questions = natura_finder_questions();
$natura_filters   = natura_finder_filters();
$natura_results   = natura_finder_query( $natura_filters );
$natura_url       = natura_tool_url( 'plant-finder' );
?>
<form class="finder" method="get" action="<?php echo esc_url( $natura_url . '#results' ); ?>">
	<?php if ( ! $natura_questions ) : ?>
		<p class="empty-state"><?php esc_html_e( 'The finder needs plant guides filed under Sun, Growing spaces, or Plant types.', 'natura' ); ?></p>
	<?php endif; ?>
	<?php foreach ( $natura_questions as $natura_key => $natura_question ) : ?>
		<fieldset class="finder-question">
			<legend><?php echo esc_html( $natura_question['label'] ); ?></legend>
			<?php if ( $natura_question['hint'] ) : ?>
				<p class="finder-hint"><?php echo esc_html( $natura_question['hint'] ); ?></p>
			<?php endif; ?>
			<div class="finder-choices">
				<label>
					<input type="radio" name="<?php echo esc_attr( $natura_key ); ?>" value=""<?php checked( ! isset( $natura_filters[ $natura_key ] ) ); ?>>
					<span><?php esc_html_e( 'Any', 'natura' ); ?></span>
				</label>
				<?php foreach ( $natura_question['choices'] as $natura_value => $natura_label ) : ?>
					<label>
						<input type="radio" name="<?php echo esc_attr( $natura_key ); ?>" value="<?php echo esc_attr( (string) $natura_value ); ?>"<?php checked( ( $natura_filters[ $natura_key ] ?? null ) === (string) $natura_value ); ?>>
						<span><?php echo esc_html( $natura_label ); ?></span>
					</label>
				<?php endforeach; ?>
			</div>
		</fieldset>
	<?php endforeach; ?>
	<?php if ( $natura_questions ) : ?>
		<div class="finder-actions">
			<button type="submit" class="button button-primary"><?php natura_the_icon( 'lens' ); ?> <?php esc_html_e( 'Show matching plants', 'natura' ); ?></button>
			<?php if ( $natura_filters ) : ?>
				<a class="text-link" href="<?php echo esc_url( $natura_url ); ?>"><?php esc_html_e( 'Start again', 'natura' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</form>

<section class="finder-results" id="results" aria-labelledby="finder-results-title">
	<h2 id="finder-results-title">
		<?php
		if ( $natura_filters ) {
			/* translators: %s: number of plants. */
			echo esc_html( sprintf( _n( '%s plant matches your answers', '%s plants match your answers', $natura_results->post_count, 'natura' ), number_format_i18n( $natura_results->post_count ) ) );
		} else {
			esc_html_e( 'All plants', 'natura' );
		}
		?>
	</h2>
	<?php if ( $natura_results->have_posts() ) : ?>
		<div class="plant-grid">
			<?php
			while ( $natura_results->have_posts() ) {
				$natura_results->the_post();
				get_template_part( 'template-parts/plant-card' );
			}
			wp_reset_postdata();
			?>
		</div>
	<?php else : ?>
		<p class="empty-state"><?php esc_html_e( 'No plant guide matches all of these answers yet. Set one of them back to "Any".', 'natura' ); ?></p>
	<?php endif; ?>
</section>
