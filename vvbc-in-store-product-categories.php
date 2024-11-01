<?php

/**
 * @link              https://github.com/Cardos0/
 * @since             1.0.0
 * @package           Vvbc_In_Store_Product_Categories
 *
 * @wordpress-plugin
 * Plugin Name:       VVBC In-Store Product categories
 * Plugin URI:
 * Description:       Show product categories on shop page
 * Version:           1.0.0
 * Author:            VVBC
 * Author URI:        https://github.com/Cardos0/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vvbc-in-store-product-categories
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'VVBC_IN_STORE_PRODUCT_CATEGORIES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vvbc-in-store-product-categories-activator.php
 */
function activate_vvbc_in_store_product_categories() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vvbc-in-store-product-categories-activator.php';
	Vvbc_In_Store_Product_Categories_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vvbc-in-store-product-categories-deactivator.php
 */
function deactivate_vvbc_in_store_product_categories() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vvbc-in-store-product-categories-deactivator.php';
	Vvbc_In_Store_Product_Categories_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vvbc_in_store_product_categories' );
register_deactivation_hook( __FILE__, 'deactivate_vvbc_in_store_product_categories' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vvbc-in-store-product-categories.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vvbc_in_store_product_categories() {

	$plugin = new Vvbc_In_Store_Product_Categories();
	$plugin->run();

}
run_vvbc_in_store_product_categories();
