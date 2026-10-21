<?php
/**
 * Every problem guide (/problems/).
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_crumbs = natura_problem_breadcrumbs( false );
?>
<main id="main-content" class="plant-archive">
	<?php echo natura_list_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
	<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

	<div class="site-container">
		<header class="page-intro">
			<h1><?php esc_html_e( 'Plant problems', 'natura' ); ?></h1>
			<p><?php echo esc_html( natura_problems_intro() ); ?></p>
		</header>

		<?php natura_the_topic_chips( null, true ); ?>

		<?php if ( have_posts() ) : ?>
			<div class="problem-grid">
				<?php
				$natura_count = 0;
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/problem-card' );
					++$natura_count;
					natura_the_list_break( $natura_count );
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p class="empty-state"><?php esc_html_e( 'No problem guides here yet.', 'natura' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
