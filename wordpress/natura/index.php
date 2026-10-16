<?php
/**
 * Fallback template. Each content type gets its own template in the next
 * steps; until then everything renders as a simple list or single entry.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main-content" class="site-main site-container">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-intro"><h1><?php single_post_title(); ?></h1></header>
	<?php elseif ( is_search() ) : ?>
		<header class="page-intro">
			<h1>
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Results for “%s”', 'natura' ), esc_html( get_search_query() ) );
				?>
			</h1>
		</header>
	<?php elseif ( is_archive() ) : ?>
		<header class="page-intro"><?php the_archive_title( '<h1>', '</h1>' ); ?></header>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php if ( is_singular() ) : ?>
			<?php the_post(); ?>
			<article <?php post_class( 'entry' ); ?>>
				<h1><?php the_title(); ?></h1>
				<div class="entry-content"><?php the_content(); ?></div>
			</article>
		<?php else : ?>
			<div class="entry-list">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'entry-card' ); ?>>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo esc_html( get_the_excerpt() ); ?></p>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php endif; ?>
	<?php else : ?>
		<p class="empty-state"><?php echo is_search() ? esc_html( natura_home_setting( 'natura_search_empty' ) ) : esc_html__( 'Nothing here yet.', 'natura' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</main>
<?php
get_footer();
