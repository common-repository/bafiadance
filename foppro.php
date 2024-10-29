<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://foppro.com
 * @since             1.0.2
 * @package           Wp_Bafiadance
 *
 * @wordpress-plugin
 * Plugin Name:       FOP Pro
 * Description:       Artificial Intelligence Website Interactive System. Give Your Customers The Experience Of A Lifetime… And Watch FRESH Leads And Sales Flood In.
 * Version:           2.0.0
 * Author:            ITkamer
 * Author URI:        http://itkamer.space/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bafiadance
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bafiadance-activator.php
 */
function activate_bafiadance() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bafiadance-activator.php';
	Bafiadance_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bafiadance-deactivator.php
 */
function deactivate_bafiadance() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bafiadance-deactivator.php';
	Bafiadance_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bafiadance' );
register_deactivation_hook( __FILE__, 'deactivate_bafiadance' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bafiadance.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bafiadance() {

	$plugin = new Bafiadance();
	$plugin->run();

}
run_bafiadance();
