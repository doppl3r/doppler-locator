<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Doppler Locator
 * Description:       Manage store locations and preview them on a map
 * Version:           1.0.0
 * Author:            Doppler Creative
 * Author URI:        https://www.dopplercreative.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       doppler-locator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }

// Declare global variables
global $wpdb, $doppler_locator_table_name;
$doppler_locator_table_name = $wpdb->prefix . 'doppler_locator';

function activate_doppler_locator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-doppler-locator-activator.php';
	Doppler_Locator_Activator::activate();
}

function deactivate_doppler_locator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-doppler-locator-deactivator.php';
	Doppler_Locator_Deactivator::deactivate();
}

function uninstall_doppler_locator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-doppler-locator-uninstaller.php';
	Doppler_Locator_Uninstaller::uninstall();
}

// Use core activation/deactivation hooks
register_activation_hook( __FILE__, 'activate_doppler_locator' );
register_deactivation_hook( __FILE__, 'deactivate_doppler_locator' );
register_uninstall_hook(__FILE__, 'uninstall_doppler_locator');

// Evaluate the main file and include classes
require plugin_dir_path( __FILE__ ) . 'includes/class-doppler-locator.php';

// Run the plugin
function run_doppler_locator() {
	$plugin = new Doppler_Locator();
	$plugin->run();
}

// Call the plugin
run_doppler_locator();