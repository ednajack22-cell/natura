<?php
/**
 * Natura theme bootstrap.
 *
 * Presentation only. Content types (plants, problems, projects, tools, gear)
 * will live in a companion plugin, so that switching or updating the theme
 * never makes content disappear.
 *
 * @package Natura
 */

defined( 'ABSPATH' ) || exit;

define( 'NATURA_VERSION', '0.1.0' );

require_once get_template_directory() . '/inc/icons.php';
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/navigation.php';
