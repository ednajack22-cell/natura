<?php
/**
 * Place guide card, on the Small Spaces page.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;
?>
<article class="post-card space-card">
	<a class="post-card-link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-card-media"><?php the_post_thumbnail( 'medium_large', array( 'alt' => '', 'sizes' => '(min-width: 1024px) 380px, (min-width: 640px) 50vw, 100vw' ) + natura_pin_attributes( (int) get_the_ID() ) ); ?></div>
		<?php endif; ?>
		<div class="post-card-text">
			<p class="label post-card-category"><?php esc_html_e( 'Small Spaces', 'natura' ); ?></p>
			<h3 class="post-card-title"><?php the_title(); ?></h3>
			<p class="post-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
			<span class="read-more"><?php esc_html_e( 'Read the guide', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></span>
		</div>
	</a>
</article>
