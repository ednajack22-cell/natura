<?php
/**
 * Site header: brand and search on the first row, the main menu on the
 * second (wide screens). On phones the menu is a sheet behind one button.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'natura' ); ?></a>

<header class="site-header"<?php echo natura_section_enabled( 'site_header_autohide' ) ? ' data-autohide' : ''; ?>>
	<div class="site-container header-inner">
		<?php if ( has_custom_logo() ) : ?>
			<div class="brand brand-logo"><?php the_custom_logo(); ?></div>
		<?php else : ?>
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<span class="brand-mark"><?php natura_the_icon( 'leaf' ); ?></span>
				<span class="brand-text">
					<span class="brand-name"><?php bloginfo( 'name' ); ?></span>
					<?php if ( get_bloginfo( 'description' ) ) : ?>
						<small><?php bloginfo( 'description' ); ?></small>
					<?php endif; ?>
				</span>
			</a>
		<?php endif; ?>

		<?php if ( natura_section_enabled( 'site_header_search' ) ) : ?>
			<?php get_search_form( array( 'natura_context' => 'header' ) ); ?>

			<a class="header-icon-button header-search-link" href="<?php echo esc_url( home_url( '/?s=' ) ); ?>">
				<?php natura_the_icon( 'search' ); ?>
				<span class="screen-reader-text"><?php esc_html_e( 'Search', 'natura' ); ?></span>
			</a>
		<?php endif; ?>

		<details class="mobile-menu">
			<summary class="header-icon-button">
				<?php natura_the_icon( 'menu', 'mobile-menu-open' ); ?>
				<?php natura_the_icon( 'close', 'mobile-menu-close' ); ?>
				<span class="mobile-menu-label"><?php esc_html_e( 'Menu', 'natura' ); ?></span>
			</summary>
			<div class="mobile-sheet">
				<?php get_search_form( array( 'natura_context' => 'mobile' ) ); ?>
				<?php natura_mobile_navigation(); ?>
			</div>
		</details>
	</div>
	<div class="header-nav">
		<div class="site-container">
			<?php natura_desktop_navigation(); ?>
		</div>
	</div>
</header>
