<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/Cardos0/
 * @since      1.0.0
 *
 * @package    Vvbc_In_Store_Product_Categories
 * @subpackage Vvbc_In_Store_Product_Categories/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Vvbc_In_Store_Product_Categories
 * @subpackage Vvbc_In_Store_Product_Categories/public
 * @author     VVBC <vinicius518vi@gmail.com>
 */
class Vvbc_In_Store_Product_Categories_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vvbc-in-store-product-categories-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vvbc-in-store-product-categories-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Display Categories
	 *
	 * @since    1.0.0
	 */
	public function display_categories() {
		$options = get_option($this->plugin_name);
		$display_child_categories = $options['display-child-categories'];

		$categories = get_the_terms( get_the_ID(), 'product_cat');
		// wrapper to hide any errors from top level categories or products	without category
		if ($categories) :
			echo '<div class="categories-in-archive">';
			$item = 0;

			// No Childs
			if ($display_child_categories == 0) :
				foreach($categories as $category) :
					if ($category->parent == 0) {
						if ($item > 0){
							echo " | ";
						}
						echo $category->name;
						$item++;
					}
				endforeach;
			// With Childs Display
			elseif ($display_child_categories == 1):
				foreach($categories as $category) :
					if ($item > 0){
						echo " | ";
					}
					echo $category->name;
					$item++;
				endforeach;
			// Hide Childs
			elseif ($display_child_categories == 2):
				foreach($categories as $category) :
		          	// get the children (if any) of the current cat
		          	$children = get_categories( array ('taxonomy' => 'product_cat', 'parent' => $category->term_id ));
		        	if ( count($children) == 0 ) {
		            if ($item > 0){
		                echo " | ";
		            }
		            $item++;
		            echo $category->name;
		        }
		        endforeach;
			endif;
			echo '</div>';
		endif;
	}
}
