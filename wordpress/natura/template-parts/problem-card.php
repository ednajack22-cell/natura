<?php
/**
 * Problem guide card, used on the Plant Care page, the problem list, and plant
 * guides. Shows the photo of the symptom, the question, and the short answer.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_card_causes = count( natura_problem_causes() );
?>
<article class="problem-card">
	<a class="problem-card-link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="problem-card-media"><?php the_post_thumbnail( 'medium_large', array( 'sizes' => '(min-width: 1024px) 380px, (min-width: 640px) 45vw, 100vw' ) ); ?></div>
		<?php endif; ?>
		<div class="problem-card-text">
			<h3 class="problem-card-title"><?php the_title(); ?></h3>
			<?php if ( has_excerpt() ) : ?>
				<p class="problem-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
			<?php endif; ?>
			<?php if ( $natura_card_causes ) : ?>
				<p class="problem-card-meta">
					<?php
					/* translators: %d: number of likely causes. */
					printf( esc_html( _n( '%d likely cause', '%d likely causes', $natura_card_causes, 'natura' ) ), (int) $natura_card_causes );
					?>
				</p>
			<?php endif; ?>
		</div>
	</a>
</article>
