<?php
/**
 * DIY project card, on the DIY Projects page, project categories, and under
 * a project: photo, category, title, difficulty and time, summary.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

$natura_card_category = natura_project_category();
$natura_card_facts    = array_filter( array( (string) natura_field( 'difficulty' ), (string) natura_field( 'time' ) ) );
?>
<article class="problem-card project-card">
	<a class="problem-card-link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="problem-card-media"><?php the_post_thumbnail( 'medium_large', array( 'alt' => '', 'sizes' => '(min-width: 1024px) 380px, (min-width: 640px) 45vw, 100vw' ) + natura_pin_attributes( (int) get_the_ID() ) ); ?></div>
		<?php endif; ?>
		<div class="problem-card-text">
			<p class="label"><?php echo esc_html( $natura_card_category ? $natura_card_category->name : __( 'DIY project', 'natura' ) ); ?></p>
			<h3 class="problem-card-title"><?php the_title(); ?></h3>
			<?php if ( $natura_card_facts ) : ?>
				<p class="problem-card-meta"><?php echo esc_html( implode( ' · ', $natura_card_facts ) ); ?></p>
			<?php endif; ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="problem-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
			<?php endif; ?>
			<span class="read-more"><?php esc_html_e( 'See the project', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></span>
		</div>
	</a>
</article>
