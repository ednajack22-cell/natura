<?php
/**
 * Article card, used on the home page and in article lists.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_card_topic = natura_post_topic();
?>
<article class="post-card">
	<a class="post-card-link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-card-media"><?php the_post_thumbnail( 'medium_large', array( 'alt' => '', 'sizes' => '(min-width: 1024px) 380px, 100vw' ) + natura_pin_attributes( (int) get_the_ID() ) ); ?></div>
		<?php endif; ?>
		<div class="post-card-text">
			<?php if ( $natura_card_topic ) : ?>
				<p class="label post-card-category"><?php echo esc_html( $natura_card_topic->name ); ?></p>
			<?php endif; ?>
			<h3 class="post-card-title"><?php the_title(); ?></h3>
			<p class="post-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
			<span class="read-more"><?php esc_html_e( 'Read the article', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></span>
		</div>
	</a>
</article>
