<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/Cardos0/
 * @since      1.0.0
 *
 * @package    Vvbc_In_Store_Product_Categories
 * @subpackage Vvbc_In_Store_Product_Categories/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Vvbc_In_Store_Product_Categories
 * @subpackage Vvbc_In_Store_Product_Categories/includes
 * @author     VVBC <vinicius518vi@gmail.com>
 */
class Vvbc_In_Store_Product_Categories_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'vvbc-in-store-product-categories',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
