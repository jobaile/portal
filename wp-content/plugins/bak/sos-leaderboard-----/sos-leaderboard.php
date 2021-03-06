<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              soscampus.com
 * @since             1.0.0
 * @package           Sos_Leaderboard
 *
 * @wordpress-plugin
 * Plugin Name:       SOS Leaderboard
 * Plugin URI:        soscampus.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            SOS Development Team
 * Author URI:        soscampus.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sos-leaderboard
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sos-leaderboard-activator.php
 */
function activate_sos_leaderboard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sos-leaderboard-activator.php';
	Sos_Leaderboard_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sos-leaderboard-deactivator.php
 */
function deactivate_sos_leaderboard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sos-leaderboard-deactivator.php';
	Sos_Leaderboard_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sos_leaderboard' );
register_deactivation_hook( __FILE__, 'deactivate_sos_leaderboard' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sos-leaderboard.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sos_leaderboard() {

	$plugin = new Sos_Leaderboard();
	$plugin->run();

}
run_sos_leaderboard();
