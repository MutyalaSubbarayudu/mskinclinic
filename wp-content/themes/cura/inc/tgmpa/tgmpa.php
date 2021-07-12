<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.1
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    //opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       //github.com/thomasgriffin/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

/**
 * Undocumented function
 */
function radiantthemes_register_required_plugins() {
	$plugins = array(
		// Redux Framework.
		array(
			'name'     => esc_html__( 'Redux Framework', 'cura' ),
			'slug'     => 'redux-framework',
			'required' => true,
		),
		// Elementor.
		array(
			'name'     => esc_html__( 'Elementor', 'cura' ),
			'slug'     => 'elementor',
			'required' => true,
		),
		// Contact Form 7.
		array(
			'name'     => esc_html__( 'Contact Form 7', 'cura' ),
			'slug'     => 'contact-form-7',
			'required' => true,
		),
		// Contact Form7 Widget For Elementor Page Builder.
		array(
			'name'     => esc_html__( 'CF7 Widget Elementor', 'cura' ),
			'slug'     => 'cf7-widget-elementor',
			'required' => true,
		),
		// RT Custom Post Type.
		array(
			'name'     => esc_html__( 'RadiantThemes Custom Post Type', 'cura' ),
			'slug'     => 'radiantthemes-custom-post-type',
			'source'   => 'https://cura.radiantthemes.com/plugins/radiantthemes-custom-post-type.zip',
			'required' => true,
			'version'  => '1.0.0',
		),
		// RadiantThemes Addons.
		array(
			'name'     => esc_html__( 'RadiantThemes Addons', 'cura' ),
			'slug'     => 'radiantthemes-addons',
			'source'   => 'https://cura.radiantthemes.com/plugins/radiantthemes-addons.zip',
			'required' => true,
			'version'  => '1.0.0',
		),
		// Unyson.
		array(
			'name'     => esc_html__( 'Unyson', 'cura' ),
			'slug'     => 'unyson',
			'required' => true,
		),
		// WooCommerce.
		array(
			'name'     => esc_html__( 'WooCommerce', 'cura' ),
			'slug'     => 'woocommerce',
			'required' => true,
		),
		// Advanced Custom Fields.
		array(
			'name'     => esc_html__( 'Advanced Custom Fields', 'cura' ),
			'slug'     => 'advanced-custom-fields',
			'required' => true,
		),
		// Advanced Custom Fields Typography.
		array(
			'name'     => esc_html__( 'Advanced Custom Fields: Typography Field', 'cura' ),
			'slug'     => 'acf-typography-field',
			'source'   => 'https://cura.radiantthemes.com/plugins/acf-typography-field.zip',
			'required' => true,
		),
		// Date Time Picker Field.
		array(
			'name'     => esc_html__( 'Date Time Picker Field', 'cura' ),
			'slug'     => 'date-time-picker-field',
			'required' => true,
		),
		// Easy Appointments.
		array(
			'name'     => esc_html__( 'Easy Appointments', 'cura' ),
			'slug'     => 'easy-appointments',
			'required' => true,
		),
		//Timetable
		array(
			'name'     => esc_html__( 'Timetable', 'cura' ),
			'slug'     => 'mp-timetable',
			'required' => true,
		),
		
		// Smash Balloon Instagram Feed.
		array(
			'name'     => esc_html__( 'Smash Balloon Instagram Feed', 'cura' ),
			'slug'     => 'instagram-feed',
			'required' => true,
		),
		// Slider Revolution.
		array(
			'name'     => esc_html__( 'Slider Revolution', 'cura' ),
			'slug'     => 'revslider',
			'source'   => 'https://api.radiantthemes.com/plugins/@3d!S58hndj-5d5&-fg8/revslider--4cLsaCdwDzB4jxfMDiKyn8w6aaGoxSAuARhrNfm6.zip',
			'required' => true,
		),
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'radiantthemes_register_required_plugins' );
