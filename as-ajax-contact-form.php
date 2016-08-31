<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://anuragsingh.me/
 * @since             1.0.0
 * @package           As_Ajax_Contact_Form
 *
 * @wordpress-plugin
 * Plugin Name:       AS Ajax Contact Form
 * Plugin URI:        https://github.com/anurag-singh/AS-ajax-contact-form
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Anurag Singh
 * Author URI:        http://anuragsingh.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       as-ajax-contact-form
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-as-ajax-contact-form-activator.php
 */
function activate_as_ajax_contact_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-as-ajax-contact-form-activator.php';
	As_Ajax_Contact_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-as-ajax-contact-form-deactivator.php
 */
function deactivate_as_ajax_contact_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-as-ajax-contact-form-deactivator.php';
	As_Ajax_Contact_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_as_ajax_contact_form' );
register_deactivation_hook( __FILE__, 'deactivate_as_ajax_contact_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-as-ajax-contact-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_as_ajax_contact_form() {

	$plugin = new As_Ajax_Contact_Form();
	$plugin->run();

}
run_as_ajax_contact_form();
