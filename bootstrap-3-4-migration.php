<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://bitbucket.org/1101c/
 * @since             1.0.0
 * @package           Bootstrap_3_4_Migration
 *
 * @wordpress-plugin
 * Plugin Name:       Bootstrap 3 to 4 Migration 
 * Plugin URI:        https://bitbucket.org/1101c/bootstrap-3-4-migration/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Calin Armenean
 * Author URI:        https://bitbucket.org/1101c/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bootstrap-3-4-migration
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BOOTSTRAP_3_4_MIGRATION_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bootstrap-3-4-migration-activator.php
 */
function activate_bootstrap_3_4_migration() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bootstrap-3-4-migration-activator.php';
	Bootstrap_3_4_Migration_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bootstrap-3-4-migration-deactivator.php
 */
function deactivate_bootstrap_3_4_migration() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bootstrap-3-4-migration-deactivator.php';
	Bootstrap_3_4_Migration_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bootstrap_3_4_migration' );
register_deactivation_hook( __FILE__, 'deactivate_bootstrap_3_4_migration' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bootstrap-3-4-migration.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bootstrap_3_4_migration() {

	$plugin = new Bootstrap_3_4_Migration();
	$plugin->run();

}
run_bootstrap_3_4_migration();
