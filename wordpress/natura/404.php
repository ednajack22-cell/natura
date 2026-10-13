<?php
/**
 * Page not found.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main-content" class="site-main site-container">
	<header class="page-intro">
		<p class="eyebrow"><?php esc_html_e( 'Page not found', 'natura' ); ?></p>
		<h1><?php esc_html_e( 'This page has not grown yet.', 'natura' ); ?></h1>
		<p><?php esc_html_e( 'The link may be old, or the section is still being written. Try a search, or start from the plant guides.', 'natura' ); ?></p>
	</header>
	<?php get_search_form(); ?>
	<p><a class="button button-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to the home page', 'natura' ); ?> <?php natura_the_icon( 'arrow' ); ?></a></p>
</main>
<?php
get_footer();
