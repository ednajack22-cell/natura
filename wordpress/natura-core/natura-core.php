<?php
/**
 * Plugin Name: Natura Core
 * Description: Content types for Natura: plant guides with their quick facts, shopping list, FAQ, and sources. Keeps content safe when the theme changes.
 * Version: 0.1.0
 * Requires at least: 6.5
 * Requires PHP: 8.1
 * Author: Natura
 * License: GPL-2.0-or-later
 * Text Domain: natura-core
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

define( 'NATURA_CORE_VERSION', '0.1.0' );
define( 'NATURA_CORE_FILE', __FILE__ );
define( 'NATURA_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'NATURA_CORE_URL', plugin_dir_url( __FILE__ ) );

require_once NATURA_CORE_DIR . 'includes/post-types.php';
require_once NATURA_CORE_DIR . 'includes/plant-fields.php';
require_once NATURA_CORE_DIR . 'includes/demo-content.php';

register_activation_hook( __FILE__, 'natura_core_activate' );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
