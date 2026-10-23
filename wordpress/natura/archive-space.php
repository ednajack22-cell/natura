<?php
/**
 * Small Spaces (/small-spaces/): one guide per kind of place where city
 * gardeners grow food, in the order set for each guide.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_crumbs = natura_space_breadcrumbs();
?>
<main id="main-content" class="plant-archive space-archive">
	<?php echo natura_list_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
	<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

	<div class="site-container">
		<header class="page-intro">
			<h1><?php esc_html_e( 'Small Spaces', 'natura' ); ?></h1>
			<p><?php echo esc_html( natura_home_setting( 'natura_spaces_intro' ) ); ?></p>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/space-card' );
				endwhile;
				?>
			</div>
			<?php natura_the_share_bar( 'share_lists', __( 'Share this page', 'natura' ) ); ?>
		<?php else : ?>
			<p class="empty-state"><?php esc_html_e( 'No place guides here yet.', 'natura' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
