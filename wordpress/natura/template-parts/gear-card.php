<?php
/**
 * Buying guide card, on the Gear page, gear categories, and under a buying
 * guide: photo, category, title, the top pick, how the picks were chosen,
 * and the summary.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_card_picks    = natura_gear_picks();
$natura_card_method   = natura_gear_method();
$natura_card_category = natura_gear_category();
?>
<article class="problem-card gear-card">
	<a class="problem-card-link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="problem-card-media"><?php the_post_thumbnail( 'medium_large', array( 'alt' => '', 'sizes' => '(min-width: 1024px) 380px, (min-width: 640px) 45vw, 100vw' ) + natura_pin_attributes( (int) get_the_ID() ) ); ?></div>
		<?php endif; ?>
		<div class="problem-card-text">
			<p class="label"><?php echo esc_html( $natura_card_category ? $natura_card_category->name : __( 'Buying guide', 'natura' ) ); ?></p>
			<h3 class="problem-card-title"><?php the_title(); ?></h3>
			<?php if ( $natura_card_picks ) : ?>
				<p class="problem-card-meta">
					<?php
					/* translators: %s: product name. */
					printf( esc_html__( 'Top pick: %s', 'natura' ), esc_html( $natura_card_picks[0]['name'] ) );
					?>
				</p>
			<?php endif; ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="problem-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
			<?php endif; ?>
			<p class="gear-card-method is-<?php echo esc_attr( $natura_card_method['key'] ); ?>"><?php echo esc_html( $natura_card_method['label'] ); ?></p>
			<span class="read-more"><?php esc_html_e( 'Read the guide', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></span>
		</div>
	</a>
</article>
