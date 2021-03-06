<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://anuragsingh.me/
 * @since      1.0.0
 *
 * @package    As_Ajax_Contact_Form
 * @subpackage As_Ajax_Contact_Form/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    As_Ajax_Contact_Form
 * @subpackage As_Ajax_Contact_Form/admin
 * @author     Anurag Singh <contact@anuragsingh.me>
 */
class As_Ajax_Contact_Form_Admin {

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
		 * defined in As_Ajax_Contact_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The As_Ajax_Contact_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/as-ajax-contact-form-admin.css', array(), $this->version, 'all' );

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
		 * defined in As_Ajax_Contact_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The As_Ajax_Contact_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/as-ajax-contact-form-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
     * Add new custom post type
     *
     * @since    1.0.0
     */
    public function create_new_cpt()
    {
    	$cpts = ['Contact']; 

    	foreach ($cpts as $cpt) 
    	{
    		$sanitizedCptName = str_replace(' ', '_', strtolower($cpt));
	        $last_character = substr($cpt, -1);
	        if ($last_character === 'y') {
	            $plural = substr_replace($cpt, 'ies', -1);
	        }
	        else {
	            $plural = $cpt.'s'; // add 's' to convert singular name to plural
	        }

	        /* Capitalize first letter of each word */
	        $plural = ucwords($plural);


	        $textdomain = strtolower($cpt);
	        $cap_type = 'post';

			/* Capitalize first letter of each word */
	        $single = ucwords($cpt);

	            $opts['can_export'] = TRUE;
	            // add user role's capabilities
	            //$opts['capability_type'] = array('marketing','marketings');
	            $opts['map_meta_cap'] = TRUE;
	            // add user role's capabilities
	            $opts['description'] = '';
	            $opts['exclude_from_search'] = FALSE;
	            $opts['has_archive'] = TRUE;        // Enable 'Post type' archive page
	            $opts['hierarchical'] = FALSE;
	            $opts['menu_icon'] = 'dashicons-chart-line';
	            $opts['menu_position'] = 20;
	            $opts['public'] = TRUE;
	            $opts['publicly_querable'] = TRUE;
	            $opts['query_var'] = TRUE;
	            $opts['register_meta_box_cb'] = '';
	            $opts['rewrite'] = FALSE;
	            $opts['show_in_admin_bar'] = TRUE;  // 'Top Menu' bar
	            $opts['show_in_menu'] = TRUE;
	            $opts['show_in_nav_menu'] = FALSE;
	            $opts['show_ui'] = TRUE;
	            $opts['supports'] = FALSE;
	            $opts['taxonomies'] = array();
	            $opts['capabilities']['delete_others_posts'] = "delete_others_{$cap_type}s";
	            $opts['labels']['add_new'] = __( "Add New {$single}", $textdomain );
	            $opts['labels']['add_new_item'] = __( "Add New {$single}", $textdomain );
	            $opts['labels']['all_items'] = __( 'All ' .$plural, $textdomain );
	            $opts['labels']['edit_item'] = __( "Edit {$single}" , $textdomain);
	            $opts['labels']['menu_name'] = __( $plural, $textdomain );
	            $opts['labels']['name'] = __( $plural, $textdomain );
	            $opts['labels']['name_admin_bar'] = __( $single, $textdomain );
	            $opts['labels']['new_item'] = __( "New {$single}", $textdomain );
	            $opts['labels']['not_found'] = __( "No {$plural} Found", $textdomain );
	            $opts['labels']['not_found_in_trash'] = __( "No {$plural} Found in Trash", $textdomain );
	            $opts['labels']['parent_item_colon'] = __( "Parent {$plural} :", $textdomain );
	            $opts['labels']['search_items'] = __( "Search {$plural}", $textdomain );
	            $opts['labels']['singular_name'] = __( $single, $textdomain );
	            $opts['labels']['view_item'] = __( "View {$single}", $textdomain );
	            $opts['rewrite']['ep_mask'] = EP_PERMALINK;
	            $opts['rewrite']['feeds'] = FALSE;
	            $opts['rewrite']['pages'] = TRUE;
	            $opts['rewrite']['slug'] = __( strtolower( $single ), $textdomain );
	            $opts['rewrite']['with_front'] = FALSE;
	        register_post_type( $sanitizedCptName, $opts );
    	}
    }



	/**
	 * Add setting page in wp admin area
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name    The name of this plugin.
	 * ref - https://developer.wordpress.org/plugins/settings/custom-settings-page/
	 */
	function create_new_setting_page_for_plugin() {
	    add_submenu_page(
	    	'edit.php?post_type=contact', 
	    	ucfirst(str_replace('-', ' ', $this->plugin_name)).' Admin', 
	    	'Settings', // Menu Title
	    	'edit_posts', basename(__FILE__), 
	    	array($this, 'as_ajax_contact_form_options_page') // Callback function
	    );
	}

	// If want to display custom setting page with in setting tab, than uncomment this function
	/*function create_new_setting_page_for_plugin() {
	    add_options_page(
	        'My Plugin Title',
	        ucfirst(str_replace('-', ' ', $this->plugin_name)). ' Settings', // Menu Title
	        'publish_posts',
	        $this->plugin_name.'-setting',									// menu slug
	        array($this, 'as_ajax_contact_form_options_page') // Callback function
	    );
	}*/

	function as_ajax_contact_form_options_page() {
	    ?>
	    <div class="wrap">
	        <h2><?php echo ucfirst(str_replace('-', ' ', $this->plugin_name)) ?> Options</h2>
	        your form goes here
	    </div>
	    <?php
	}

}
