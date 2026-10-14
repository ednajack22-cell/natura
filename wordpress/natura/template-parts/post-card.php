<?php
/**
 * Article card, used on the home page and in article lists.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_card_category = get_the_category();
?>
<article class="post-card">
	<a class="post-card-link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-card-media"><?php the_post_thumbnail( 'natura-card', array( 'sizes' => '(min-width: 1024px) 380px, 100vw' ) ); ?></div>
		<?php endif; ?>
		<?php if ( $natura_card_category ) : ?>
			<p class="post-card-category"><?php echo esc_html( $natura_card_category[0]->name ); ?></p>
		<?php endif; ?>
		<h3 class="post-card-title"><?php the_title(); ?></h3>
		<p class="post-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
	</a>
</article>
