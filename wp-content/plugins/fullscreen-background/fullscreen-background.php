<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.enweby.com/
 * @since             1.0.0
 * @package           Fullscreen_Background
 *
 * @wordpress-plugin
 * Plugin Name:       Fullscreen Background
 * Plugin URI:        https://www.enweby.com/shop/wordpress-plugins/full-screen-background/
 * Description:       Lightweight plugin to add Fullscreen Background image or video on your WordPress site by Enweby.
 * Version:           1.0.4
 * Author:            Enweby
 * Author URI:        https://www.enweby.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fullscreen-background
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
define( 'FULLSCREEN_BACKGROUND_VERSION', '1.0.4' );

/**
 * Plugin base name.
 * used to locate plugin resources primarily code files
 * Start at version 1.0.0
 */
define( 'FULLSCREEN_BACKGROUND_BASE_NAME', plugin_basename( __FILE__ ) );

/**
 * Plugin base dir path.
 * used to locate plugin resources primarily code files
 * Start at version 1.0.0
 */
defined( 'FULLSCREEN_BACKGROUND_DIR' ) || define( 'FULLSCREEN_BACKGROUND_DIR', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fullscreen-background-activator.php
 */
function activate_fullscreen_background() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fullscreen-background-activator.php';
	Fullscreen_Background_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fullscreen-background-deactivator.php
 */
function deactivate_fullscreen_background() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fullscreen-background-deactivator.php';
	Fullscreen_Background_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_fullscreen_background' );
register_deactivation_hook( __FILE__, 'deactivate_fullscreen_background' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fullscreen-background.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fullscreen_background() {

	$plugin = new Fullscreen_Background();
	$plugin->run();

}
run_fullscreen_background();
