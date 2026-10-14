<?php
/**
 * Plant guide lists: every plant (/plants/) and one plant type
 * (/plants/herbs/).
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_current_type = is_tax( 'plant_type' ) ? get_queried_object() : null;
$natura_types        = get_terms(
	array(
		'taxonomy'   => 'plant_type',
		'hide_empty' => true,
	)
);
?>
<main id="main-content" class="site-container plant-archive">
	<header class="page-intro">
		<h1>
			<?php
			if ( $natura_current_type ) {
				/* translators: %s: plant type, e.g. "Herbs". */
				printf( esc_html__( '%s to grow in pots', 'natura' ), esc_html( $natura_current_type->name ) );
			} else {
				esc_html_e( 'Plants to grow in pots', 'natura' );
			}
			?>
		</h1>
		<p>
			<?php
			echo esc_html(
				$natura_current_type && $natura_current_type->description
					? $natura_current_type->description
					: __( 'Growing guides for balconies, patios, and windowsills: what each plant needs, and how to get a good harvest.', 'natura' )
			);
			?>
		</p>
	</header>

	<?php if ( ! is_wp_error( $natura_types ) && count( $natura_types ) > 1 ) : ?>
		<nav class="filter-chips" aria-label="<?php esc_attr_e( 'Plant types', 'natura' ); ?>">
			<a href="<?php echo esc_url( (string) get_post_type_archive_link( 'plant' ) ); ?>"<?php echo $natura_current_type ? '' : ' aria-current="page"'; ?>><?php esc_html_e( 'All', 'natura' ); ?></a>
			<?php foreach ( $natura_types as $natura_type_term ) : ?>
				<a href="<?php echo esc_url( (string) get_term_link( $natura_type_term ) ); ?>"<?php echo ( $natura_current_type && $natura_current_type->term_id === $natura_type_term->term_id ) ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $natura_type_term->name ); ?></a>
			<?php endforeach; ?>
		</nav>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<div class="plant-grid">
			<?php
			$natura_count = 0;
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/plant-card' );
				++$natura_count;
				if ( 6 === $natura_count ) {
					echo '<div class="plant-grid-break">' . natura_ad_slot( __( 'After the first six plants', 'natura' ) ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot().
				}
			endwhile;
			?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p class="empty-state"><?php esc_html_e( 'No plant guides here yet.', 'natura' ); ?></p>
	<?php endif; ?>
</main>
<?php
get_footer();
