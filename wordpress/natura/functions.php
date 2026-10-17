<?php
/**
 * Natura theme bootstrap.
 *
 * Presentation only. Content types (plant guides and, later, problems,
 * projects, and gear) live in the Natura Core plugin, so that switching or
 * updating the theme never makes content disappear.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

// Read from style.css, so a new version always refreshes the cached CSS and JavaScript.
define( 'NATURA_VERSION', (string) wp_get_theme( get_template() )->get( 'Version' ) );

require_once get_template_directory() . '/inc/icons.php';
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/navigation.php';
require_once get_template_directory() . '/inc/ads.php';
require_once get_template_directory() . '/inc/content.php';
require_once get_template_directory() . '/inc/guide.php';
require_once get_template_directory() . '/inc/plant.php';
require_once get_template_directory() . '/inc/plant-care.php';
require_once get_template_directory() . '/inc/home.php';
require_once get_template_directory() . '/inc/calendar.php';
require_once get_template_directory() . '/inc/tools.php';
require_once get_template_directory() . '/inc/share.php';
require_once get_template_directory() . '/inc/gear.php';
require_once get_template_directory() . '/inc/projects.php';
require_once get_template_directory() . '/inc/options.php';
require_once get_template_directory() . '/inc/health.php';
