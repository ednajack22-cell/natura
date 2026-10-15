<?php
/**
 * Problem guide card, used on the Plant Care page, the problem list, and plant
 * guides: photo of the symptom, the question, the most likely cause, and the
 * short answer.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_card_causes = natura_problem_causes();
?>
<article class="problem-card">
	<a class="problem-card-link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="problem-card-media"><?php the_post_thumbnail( 'medium_large', array( 'alt' => '', 'sizes' => '(min-width: 1024px) 380px, (min-width: 640px) 45vw, 100vw' ) + natura_pin_attributes( (int) get_the_ID() ) ); ?></div>
		<?php endif; ?>
		<div class="problem-card-text">
			<?php if ( $natura_card_causes ) : ?>
				<p class="label">
					<?php
					/* translators: %d: number of likely causes. */
					printf( esc_html( _n( '%d likely cause', '%d likely causes', count( $natura_card_causes ), 'natura' ) ), (int) count( $natura_card_causes ) );
					?>
				</p>
			<?php endif; ?>
			<h3 class="problem-card-title"><?php the_title(); ?></h3>
			<?php if ( $natura_card_causes ) : ?>
				<p class="problem-card-meta">
					<?php
					/* translators: %s: most likely cause, e.g. "Too much water". */
					printf( esc_html__( 'Most often: %s', 'natura' ), esc_html( mb_strtolower( $natura_card_causes[0]['cause'] ) ) );
					?>
				</p>
			<?php endif; ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="problem-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
			<?php endif; ?>
			<span class="read-more"><?php esc_html_e( 'Read the guide', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></span>
		</div>
	</a>
</article>
