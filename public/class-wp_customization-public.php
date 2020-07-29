<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Wp_customization
 * @subpackage Wp_customization/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_customization
 * @subpackage Wp_customization/public
 * @author     Saqib N. <saqib.naeem@nxb.com.pk>
 */
class Wp_customization_Public {

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

		$this->load_dependencies();

		$this->advertisement_header();
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
		 * defined in Wp_customization_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_customization_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp_customization-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name."custom-stylesheet", plugin_dir_url( __FILE__ )."css/custom.css", array(), $this->version, "all" );

	}

	private function load_dependencies(){
		require_once plugin_dir_path( dirname(__FILE__) ). "public/actions/class-advertisement-header.php";
	}

	/**
	 * Add advertisement code/image in header
	 */
	public function advertisement_header(){
		new Advertisement_Header();
	}

	public function filter_primary_menu($items, $args){
		if($args->theme_location == "primary"){
            $items .= "<li><a href=''>New Item</a></li>";

        }

        return $items;
	}

	public function filter_blog_posts($the_content){
		if(is_singular( "post" )){
			$txt = "<img src='http://localhost/web/wordpress/wp-content/uploads/2020/07/brown-concrete-building-2283352.jpg' width='100%'  />";
			return $txt.$the_content.$txt;
			}
		return $the_content;
	}
    public function newsticker($atts){
        $output = "<p><marquee>Hello World</Marquee></p>";
        return $output;
	}
	public function shortcode_newsticker(){
		add_shortcode( "newsticker", array($this, "newsticker") );
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
		 * defined in Wp_customization_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_customization_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp_customization-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script($this->plugin_name."custom-js", plugin_dir_url( __FILE__ )."js/custom.js", array(), $this->version, true);

	}

}
