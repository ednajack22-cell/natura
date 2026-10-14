<?php
/**
 * Plant guide card, used in plant lists and "More plants".
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_card_type = natura_plant_type();
$natura_card_sun  = (string) natura_field( 'sun' );
$natura_card_pot  = (string) natura_field( 'pot_size' );
?>
<article class="plant-card">
	<a class="plant-card-link" href="<?php the_permalink(); ?>">
		<div class="plant-card-media">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'natura-card', array( 'sizes' => '(min-width: 1024px) 300px, (min-width: 640px) 45vw, 50vw' ) ); ?>
			<?php endif; ?>
			<?php if ( $natura_card_type ) : ?>
				<span class="plant-card-type"><?php echo esc_html( $natura_card_type->name ); ?></span>
			<?php endif; ?>
		</div>
		<h3 class="plant-card-title"><?php the_title(); ?></h3>
		<?php if ( $natura_card_sun || $natura_card_pot ) : ?>
			<p class="plant-card-facts">
				<?php echo esc_html( implode( ' · ', array_filter( array( $natura_card_sun, $natura_card_pot ) ) ) ); ?>
			</p>
		<?php endif; ?>
	</a>
</article>
