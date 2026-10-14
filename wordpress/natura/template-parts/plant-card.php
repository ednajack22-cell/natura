<?php
/**
 * Plant guide card, after the Stitch "Plant Library" mock-up: photo with the
 * plant type, name, botanical name, a two-line summary, and the four facts
 * readers compare plants on. Used in plant lists and related plants.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_card_type   = natura_plant_type();
$natura_card_facts  = array_filter(
	array(
		'sun'        => array( __( 'Sun', 'natura' ), (string) natura_field( 'sun' ) ),
		'pot_size'   => array( __( 'Pot', 'natura' ), (string) natura_field( 'pot_size' ) ),
		'watering'   => array( __( 'Water', 'natura' ), (string) natura_field( 'watering' ) ),
		'difficulty' => array( __( 'Level', 'natura' ), (string) natura_field( 'difficulty' ) ),
	),
	static fn( array $fact ): bool => '' !== $fact[1]
);
$natura_card_botany = (string) natura_field( 'botanical_name' );
?>
<article class="plant-card">
	<a class="plant-card-link" href="<?php the_permalink(); ?>">
		<div class="plant-card-media">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'medium_large', array( 'alt' => '', 'sizes' => '(min-width: 1024px) 400px, (min-width: 640px) 50vw, 100vw' ) ); ?>
			<?php endif; ?>
			<?php if ( $natura_card_type ) : ?>
				<span class="plant-card-type"><?php echo esc_html( $natura_card_type->name ); ?></span>
			<?php endif; ?>
		</div>
		<div class="plant-card-text">
			<h3 class="plant-card-title"><?php the_title(); ?></h3>
			<?php if ( $natura_card_botany ) : ?>
				<p class="plant-card-botany"><?php echo esc_html( $natura_card_botany ); ?></p>
			<?php endif; ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="plant-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
			<?php endif; ?>
			<?php if ( $natura_card_facts ) : ?>
				<dl class="plant-card-facts">
					<?php foreach ( $natura_card_facts as $natura_fact ) : ?>
						<div>
							<dt><?php echo esc_html( $natura_fact[0] ); ?></dt>
							<dd><?php echo esc_html( $natura_fact[1] ); ?></dd>
						</div>
					<?php endforeach; ?>
				</dl>
			<?php endif; ?>
			<span class="card-button"><?php esc_html_e( 'Read the growing guide', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></span>
		</div>
	</a>
</article>
