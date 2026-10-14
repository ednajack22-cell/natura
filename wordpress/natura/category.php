<?php
/**
 * Articles on one Plant Care topic (/plant-care/watering/).
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_topic  = get_queried_object();
$natura_topic  = $natura_topic instanceof WP_Term ? $natura_topic : null;
$natura_crumbs = natura_topic_breadcrumbs( $natura_topic );
?>
<main id="main-content" class="plant-archive">
	<?php echo natura_list_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
	<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

	<div class="site-container">
		<header class="page-intro">
			<h1><?php single_cat_title(); ?></h1>
			<?php if ( $natura_topic && $natura_topic->description ) : ?>
				<p><?php echo esc_html( $natura_topic->description ); ?></p>
			<?php endif; ?>
		</header>

		<?php natura_the_topic_chips( $natura_topic ); ?>

		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				$natura_count = 0;
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/post-card' );
					++$natura_count;
					if ( 3 === $natura_count && $GLOBALS['wp_query']->post_count > 3 ) {
						echo '<div class="plant-grid-break">' . natura_ad_slot( __( 'In the list, after the first row', 'natura' ) ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built and escaped in natura_ad_slot().
					}
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p class="empty-state"><?php esc_html_e( 'No articles on this topic yet.', 'natura' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
