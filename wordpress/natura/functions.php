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

define( 'NATURA_VERSION', '0.12.0' );

require_once get_template_directory() . '/inc/icons.php';
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/navigation.php';
require_once get_template_directory() . '/inc/ads.php';
require_once get_template_directory() . '/inc/content.php';
require_once get_template_directory() . '/inc/guide.php';
require_once get_template_directory() . '/inc/plant.php';
require_once get_template_directory() . '/inc/plant-care.php';
require_once get_template_directory() . '/inc/home.php';
require_once get_template_directory() . '/inc/options.php';
