<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Cardos0/
 * @since      1.0.0
 *
 * @package    Vvbc_In_Store_Product_Categories
 * @subpackage Vvbc_In_Store_Product_Categories/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vvbc_In_Store_Product_Categories
 * @subpackage Vvbc_In_Store_Product_Categories/admin
 * @author     VVBC <vinicius518vi@gmail.com>
 */
class Vvbc_In_Store_Product_Categories_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vvbc_In_Store_Product_Categories_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vvbc_In_Store_Product_Categories_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vvbc-in-store-product-categories-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vvbc_In_Store_Product_Categories_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vvbc_In_Store_Product_Categories_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vvbc-in-store-product-categories-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register the JavaScript and CSS for the In-Store Product categories page of plugin
	 *
	 * @since    1.0.0
	*/
	public function enqueue_scripts_in_store_product_categories(){
		wp_enqueue_script( $this->plugin_name . '-bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), '4.0.0-alpha.6', false );
		wp_enqueue_style( $this->plugin_name . '-bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), 'v4.0.0-alpha.6', 'all' );
		wp_enqueue_style( $this->plugin_name . '-vvbc-in-store-product-categories', plugin_dir_url( __FILE__ ) . 'css/in-store-product-categories.css', array(), $this->version, 'all' );
	}
	/**
	 * Page In-Store Product categoriees
	 *
	 * @since    1.0.0
	 */
	public function in_store_product_categories() {
		$this->enqueue_scripts_in_store_product_categories();
		include_once('partials/in-store-product-categories.php');
	}

	/**
	 * Add Page link in plugins page
	 *
	 * @since    1.0.0
	 */
	public function add_action_links($links)
    {
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */
        $settings_link = array(
        '<a href="' . admin_url('admin.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
       );
        return array_merge($settings_link, $links);
    }

	/**
	 * Add Page in panel
	 *
	 * @since    1.0.0
	 */
	public function admin_page_vvbc() {
		add_menu_page(__('In-Store Product categories', $this->plugin_name), __('In-Store Product categories', $this->plugin_name), 'administrator', 'vvbc-in-store-product-categories', array($this, 'in_store_product_categories'), 'dashicons-admin-generic');
		// Check whether the button has been pressed AND also check the nonce
	    if (isset($_POST['reset-settings']) && check_admin_referer('reset-settings_button_clicked')) {
	      // the button has been pressed AND we've passed the security check
	      $this->delete_register_mysettings();
	    }
	}

	/**
     * Validate Settings
     *
     * @since    1.0.0
    */
    public function validate($input)
    {
        // All checkboxes inputs
        $valid = array();

        //Campos
		$valid['display-categories'] = (isset($input['display-categories']) && !empty($input['display-categories'])) ? 1 : 0;
		$valid['display-child-categories'] = (isset($input['display-child-categories']) && !empty($input['display-child-categories'])) ? $input['display-child-categories'] : 0;
        return $valid;
    }

	/**
     * Register Settings
     *
     * @since    1.0.0
    */
	public function register_mysettings() { // whitelist options
		register_setting( $this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

	/**
	 * Remove Settings
	 *
	 * @since    1.0.0
	*/
	public function delete_register_mysettings() { // whitelist options
		delete_option( $this->plugin_name);
	}
}
