<?php
/**
 * Featured plant guide card for the home page: one large card, or a small
 * horizontal one in the list beside it.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_size     = ( $args['size'] ?? 'large' ) === 'small' ? 'small' : 'large';
$natura_type     = natura_plant_type();
$natura_meta     = array_filter( array( $natura_type ? $natura_type->name : '', (string) natura_field( 'difficulty' ) ) );
$natura_excerpt  = has_excerpt() ? wp_trim_words( get_the_excerpt(), 'large' === $natura_size ? 40 : 14 ) : '';
?>
<article class="feature-card feature-card-<?php echo esc_attr( $natura_size ); ?>">
	<a class="feature-card-link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="feature-card-media">
				<?php
				the_post_thumbnail(
					'large' === $natura_size ? 'large' : 'thumbnail',
					array(
						'alt'   => '',
						'sizes' => 'large' === $natura_size ? '(min-width: 1024px) 720px, 100vw' : '120px',
					)
				);
				?>
			</div>
		<?php endif; ?>
		<div class="feature-card-text">
			<?php if ( $natura_meta ) : ?>
				<p class="label"><?php echo esc_html( implode( ' · ', $natura_meta ) ); ?></p>
			<?php endif; ?>
			<h3><?php the_title(); ?></h3>
			<?php if ( $natura_excerpt ) : ?>
				<p class="feature-card-excerpt"><?php echo esc_html( $natura_excerpt ); ?></p>
			<?php endif; ?>
			<span class="read-more"><?php esc_html_e( 'Read the guide', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></span>
		</div>
	</a>
</article>
