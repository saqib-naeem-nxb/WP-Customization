<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Wp_customization
 * @subpackage Wp_customization/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_customization
 * @subpackage Wp_customization/admin
 * @author     Saqib N. <saqib.naeem@nxb.com.pk>
 */
class Wp_customization_Admin {

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

		$this->load_dependencies();
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
		 * defined in Wp_customization_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_customization_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp_customization-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wp_customization_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_customization_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp_customization-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function load_dependencies(){
		require_once plugin_dir_path( dirname(__FILE__) ). "admin/class-title-widget.php";
	}

	public function title_widget(){
		register_widget( "WPCU_Title_Widget" );
	}
	public function post_type_movies(){
		register_post_type( "movies", array(
			'labels' 			=> array(
				'name'	=> 'Movies',
				'featured_image' => 'Movie Cover Image',
				'singular_name' => 'Movie',
				'add_new' => 'Add New Movie',
				'add_new_item' => 'Add New Movie',
				'not_found' => 'No Movie Found',
				'not_found_in_trash' => 'No Movies found in the trash',
			),
			'show_ui' 			=> true,
			'show_in_menu' 		=> true,
			'show_in_nav_menus' => true,
			'menu_position' 	=> 99,
			'capabilities' 		=> array(),
			'supports' 			=> array(
				'title',
				'thumbnail',
				"editor"
			),
			'reqrite' 			=> array(),
            'can_export' 		=> false
		) );
	}

	public function taxonomy_genres(){
		register_taxonomy( "genre", "movies", array(
			"labels" => array(
					'name' => "Genres",
				'singular_name' => "Genre",
				'menu_name'	=> "Genre",
				'add_new_item' => "Add new genre",
				"new_item_name" => "Genre",
				'not_found'	=> "no genre found"
			),
			"description" => "Genre type description show here yo",
			"hierarchical" => false
		)); 
	}

}
