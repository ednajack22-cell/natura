<?php
/**
 * Watering routine: six quick answers (season, pot size, material, sun,
 * heat, rain shadow), then when to check, how to tell, how to water, and
 * why these pots dry out the way they do.
 *
 * Every line comes from RHS advice, cited under the routine; no watering
 * frequency is made up (design/TOOLS.md).
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_answers = natura_watering_answers();
$natura_steps   = natura_watering_routine( $natura_answers );
$natura_url     = natura_tool_url( 'watering-calculator' );
$natura_topic   = get_category_by_slug( 'watering' );
?>
<form class="finder" method="get" action="<?php echo esc_url( $natura_url . '#results' ); ?>">
	<?php
	foreach ( natura_watering_questions() as $natura_key => $natura_question ) {
		natura_the_tool_question( $natura_key, $natura_question, $natura_answers, false );
	}
	?>
	<div class="finder-actions">
		<button type="submit" class="button button-primary"><?php natura_the_icon( 'drop' ); ?> <?php esc_html_e( 'Show my routine', 'natura' ); ?></button>
	</div>
</form>

<section class="finder-results watering-routine" id="results" aria-labelledby="watering-title" aria-live="polite">
	<h2 id="watering-title"><?php esc_html_e( 'Your watering routine', 'natura' ); ?></h2>
	<ol class="watering-steps">
		<?php foreach ( $natura_steps as $natura_step ) : ?>
			<li>
				<h3><?php echo esc_html( $natura_step['title'] ); ?></h3>
				<ul>
					<?php foreach ( $natura_step['points'] as $natura_point ) : ?>
						<li><?php natura_the_icon( 'check' ); ?><span><?php echo esc_html( $natura_point ); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</li>
		<?php endforeach; ?>
	</ol>
	<p class="frost-sources">
		<?php esc_html_e( 'Sources:', 'natura' ); ?>
		<a href="https://www.rhs.org.uk/garden-jobs/watering" rel="noopener" target="_blank"><?php esc_html_e( 'RHS: watering', 'natura' ); ?></a> ·
		<a href="https://www.rhs.org.uk/container-gardening/growing-plants-in-containers" rel="noopener" target="_blank"><?php esc_html_e( 'RHS: growing plants in containers', 'natura' ); ?></a>
		<?php if ( $natura_topic instanceof WP_Term && $natura_topic->count ) : ?>
			· <a href="<?php echo esc_url( (string) get_term_link( $natura_topic ) ); ?>"><?php esc_html_e( 'Our watering guides', 'natura' ); ?></a>
		<?php endif; ?>
	</p>
</section>
