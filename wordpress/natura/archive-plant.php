<?php
/**
 * Plant guide lists: every plant (/plants/), one plant type (/plants/herbs/),
 * one light level (/plants/sun/full-sun/) or one growing space
 * (/plants/space/balcony/). Sun and space lists say how much light or room
 * that means, and stay out of search results below six plants.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_current_type = is_tax( 'plant_type' ) ? get_queried_object() : null;
$natura_condition    = is_tax( array( 'plant_sun', 'plant_space' ) ) ? get_queried_object() : null;
$natura_types        = get_terms(
	array(
		'taxonomy'   => 'plant_type',
		'hide_empty' => true,
	)
);

$natura_crumbs = array(
	natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
	natura_crumb( __( 'Plants', 'natura' ), (string) get_post_type_archive_link( 'plant' ) ),
);
foreach ( array( $natura_current_type, $natura_condition ) as $natura_term ) {
	if ( $natura_term instanceof WP_Term ) {
		$natura_crumbs[] = natura_crumb( $natura_term->name, (string) get_term_link( $natura_term ) );
	}
}
?>
<main id="main-content" class="plant-archive">
	<?php echo natura_list_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
	<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

	<div class="site-container">
		<header class="page-intro">
			<h1>
				<?php
				if ( $natura_condition instanceof WP_Term ) {
					echo esc_html( natura_condition_title( $natura_condition ) );
				} elseif ( $natura_current_type ) {
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
					$natura_condition instanceof WP_Term && $natura_condition->description
						? $natura_condition->description
						: ( $natura_current_type && $natura_current_type->description
							? $natura_current_type->description
							: natura_home_setting( 'natura_intro_plants' ) )
				);
				?>
			</p>
		</header>

		<?php if ( ! $natura_condition && ! is_wp_error( $natura_types ) && count( $natura_types ) > 1 ) : ?>
			<nav class="filter-chips" aria-label="<?php esc_attr_e( 'Plant types', 'natura' ); ?>">
				<a href="<?php echo esc_url( (string) get_post_type_archive_link( 'plant' ) ); ?>"<?php echo $natura_current_type ? '' : ' aria-current="page"'; ?>><?php esc_html_e( 'All', 'natura' ); ?></a>
				<?php foreach ( $natura_types as $natura_type_term ) : ?>
					<a href="<?php echo esc_url( (string) get_term_link( $natura_type_term ) ); ?>"<?php echo ( $natura_current_type && $natura_current_type->term_id === $natura_type_term->term_id ) ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $natura_type_term->name ); ?></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<?php natura_the_condition_chips(); ?>

		<?php if ( have_posts() ) : ?>
			<div class="plant-grid">
				<?php
				$natura_count = 0;
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/plant-card' );
					++$natura_count;
					natura_the_list_break( $natura_count );
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
			<?php natura_the_share_bar( 'share_lists', __( 'Share this list', 'natura' ) ); ?>
			<?php natura_the_problem_band(); ?>
		<?php else : ?>
			<p class="empty-state"><?php esc_html_e( 'No plant guides here yet.', 'natura' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
