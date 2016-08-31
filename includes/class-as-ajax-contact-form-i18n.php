<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://anuragsingh.me/
 * @since      1.0.0
 *
 * @package    As_Ajax_Contact_Form
 * @subpackage As_Ajax_Contact_Form/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    As_Ajax_Contact_Form
 * @subpackage As_Ajax_Contact_Form/includes
 * @author     Anurag Singh <contact@anuragsingh.me>
 */
class As_Ajax_Contact_Form_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'as-ajax-contact-form',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
