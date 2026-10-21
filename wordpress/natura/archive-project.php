<?php
/**
 * DIY Projects: every project (/projects/) or one category
 * (/projects/category/watering/). Same layout as the Gear page: categories
 * as chips, then cards with difficulty and time.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

$natura_category   = is_tax( 'project_category' ) ? get_queried_object() : null;
$natura_category   = $natura_category instanceof WP_Term ? $natura_category : null;
$natura_crumbs     = natura_project_breadcrumbs( $natura_category );
$natura_categories = get_terms(
	array(
		'taxonomy'   => 'project_category',
		'hide_empty' => true,
	)
);
?>
<main id="main-content" class="plant-archive project-archive">
	<?php echo natura_list_structured_data( $natura_crumbs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG. ?>
	<?php natura_the_breadcrumbs( $natura_crumbs ); ?>

	<div class="site-container">
		<header class="page-intro">
			<h1>
				<?php
				if ( $natura_category ) {
					/* translators: %s: category, e.g. "Watering". */
					echo esc_html( sprintf( __( 'DIY projects: %s', 'natura' ), $natura_category->name ) );
				} else {
					esc_html_e( 'DIY projects for small gardens', 'natura' );
				}
				?>
			</h1>
			<p><?php echo esc_html( $natura_category && $natura_category->description ? $natura_category->description : natura_home_setting( 'natura_projects_intro' ) ); ?></p>
		</header>

		<?php if ( ! is_wp_error( $natura_categories ) && count( $natura_categories ) > 1 ) : ?>
			<nav class="filter-chips" aria-label="<?php esc_attr_e( 'Project categories', 'natura' ); ?>">
				<a href="<?php echo esc_url( (string) get_post_type_archive_link( 'project' ) ); ?>"<?php echo $natura_category ? '' : ' aria-current="page"'; ?>><?php esc_html_e( 'All', 'natura' ); ?></a>
				<?php foreach ( $natura_categories as $natura_term ) : ?>
					<a href="<?php echo esc_url( (string) get_term_link( $natura_term ) ); ?>"<?php echo ( $natura_category && $natura_category->term_id === $natura_term->term_id ) ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $natura_term->name ); ?> <span class="chip-count"><?php echo esc_html( number_format_i18n( $natura_term->count ) ); ?></span></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="problem-grid project-grid">
				<?php
				$natura_count = 0;
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/project-card' );
					++$natura_count;
					natura_the_list_break( $natura_count );
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
			<?php natura_the_share_bar( 'share_lists', __( 'Share these projects', 'natura' ) ); ?>
		<?php else : ?>
			<p class="empty-state"><?php esc_html_e( 'No DIY projects here yet.', 'natura' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
