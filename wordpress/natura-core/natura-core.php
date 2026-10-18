<?php
/**
 * Plugin Name: Natura Core
 * Description: Content types for Natura: plant guides, plant problem guides, Plant Care topics, and buying guides, with their quick facts, causes, shopping lists, FAQ, and sources. Keeps content safe when the theme changes.
 * Version: 0.13.0
 * Requires at least: 6.5
 * Requires PHP: 8.1
 * Author: Natura
 * License: GPL-2.0-or-later
 * Text Domain: natura-core
 *
 * @package NaturaCore
 */

defined( 'ABSPATH' ) || exit;

define( 'NATURA_CORE_VERSION', '0.13.0' );
define( 'NATURA_CORE_FILE', __FILE__ );
define( 'NATURA_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'NATURA_CORE_URL', plugin_dir_url( __FILE__ ) );

require_once NATURA_CORE_DIR . 'includes/fields.php';
require_once NATURA_CORE_DIR . 'includes/post-types.php';
require_once NATURA_CORE_DIR . 'includes/plant-fields.php';
require_once NATURA_CORE_DIR . 'includes/plant-data.php';
require_once NATURA_CORE_DIR . 'includes/plant-care.php';
require_once NATURA_CORE_DIR . 'includes/gear.php';
require_once NATURA_CORE_DIR . 'includes/projects.php';
require_once NATURA_CORE_DIR . 'includes/demo-content.php';
require_once NATURA_CORE_DIR . 'includes/starter-content.php';

register_activation_hook( __FILE__, 'natura_core_activate' );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );

/*
 * Updating the plugin does not run the activation hook. When the version
 * changes, run the same idempotent setup once: new topics, new addresses.
 */
add_action(
	'init',
	static function (): void {
		if ( get_option( 'natura_core_version' ) !== NATURA_CORE_VERSION ) {
			natura_core_activate();
			update_option( 'natura_core_version', NATURA_CORE_VERSION );
		}
	},
	30
);
