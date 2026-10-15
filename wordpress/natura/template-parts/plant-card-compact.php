<?php
/**
 * Compact plant guide card for the home page grid (Stitch "Mobile Homepage"):
 * photo with the plant type, name, and the two facts readers compare first.
 * Two per row on phones, four on wide screens.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_card_type  = natura_plant_type();
$natura_card_facts = array_filter( array( (string) natura_field( 'sun' ), (string) natura_field( 'pot_size' ) ) );
?>
<article class="mini-card">
	<a class="mini-card-link" href="<?php the_permalink(); ?>">
		<div class="mini-card-media">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'natura-card', array( 'alt' => '', 'sizes' => '(min-width: 1024px) 290px, 45vw' ) + natura_pin_attributes( (int) get_the_ID() ) ); ?>
			<?php endif; ?>
			<?php if ( $natura_card_type ) : ?>
				<span class="plant-card-type"><?php echo esc_html( $natura_card_type->name ); ?></span>
			<?php endif; ?>
		</div>
		<div class="mini-card-text">
			<h3><?php the_title(); ?></h3>
			<?php if ( $natura_card_facts ) : ?>
				<p><?php echo esc_html( implode( ' · ', $natura_card_facts ) ); ?></p>
			<?php endif; ?>
		</div>
	</a>
</article>
