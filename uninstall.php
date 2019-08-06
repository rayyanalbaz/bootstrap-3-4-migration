<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://bitbucket.org/1101c/
 * @since      1.0.0
 *
 * @package    Bootstrap_3_4_Migration
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
global $wpdb;
$table_name = $wpdb->prefix . 'bootstrap_dictionary';
if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
	//if table in database. Delete table.
	global $wpdb;
	$sql = "DROP TABLE IF EXISTS $table_name;";
	$wpdb->query($sql);
}
$report_table_name = $wpdb->prefix . 'migration_report';
if ($wpdb->get_var("SHOW TABLES LIKE '$report_table_name'") == $report_table_name) {
	//if table in database. Delete table.
	global $wpdb;
	$sql = "DROP TABLE IF EXISTS $report_table_name;";
	$wpdb->query($sql);
}
