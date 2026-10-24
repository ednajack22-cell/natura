<?php
/**
 * A page of the site itself: About, How we write, Contact, Privacy policy,
 * Affiliate disclosure. A plain reading column, with no ads and no sidebar.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$natura_crumbs = array(
		natura_crumb( __( 'Home', 'natura' ), home_url( '/' ) ),
		natura_crumb( get_the_title(), (string) get_permalink() ),
	);
	?>
	<main id="main-content" class="site-page">
		<?php
		if ( ! natura_seo_plugin_active() ) {
			echo natura_json_ld( array( natura_breadcrumb_data( $natura_crumbs ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG.
		}
		natura_the_breadcrumbs( $natura_crumbs );
		?>
		<article <?php post_class( 'site-container site-page-body' ); ?>>
			<header class="page-intro">
				<h1><?php the_title(); ?></h1>
			</header>
			<div class="entry-content guide-content">
				<?php the_content(); ?>
			</div>
		</article>
	</main>
	<?php
endwhile;

get_footer();
