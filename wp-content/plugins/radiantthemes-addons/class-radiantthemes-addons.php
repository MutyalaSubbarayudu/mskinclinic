<?php
/**
 * Includes Radiant Theme Addons elements like Blog,Team and Testimonials.
 *
 * @package RadiantThemes
 *
 * Plugin Name: Radiantthemes Addons
 * Description: Addon elements for Elementor Page Builder.
 * Plugin URI:  https://radiantthemes.com/
 * Version:     1.0.1
 * Author:      RadiantThemes
 * Author URI:  https://elementor.com/
 * Text Domain: radiantthemes-addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Radiantthemes Addons Class
 *
 * The init class that runs the Hello World plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match your plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 *
 * @since 1.0.0
 */
final class Radiantthemes_Addons {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Radiantthemes_Addons The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Radiantthemes_Addons An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Load translation.
		add_action( 'init', [ $this, 'i18n' ] );

		// Init Plugin.
		add_action( 'plugins_loaded', [ $this, 'init' ] );

		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

		add_action( 'radiantthemes_before_nav_menu', [ $this, 'radiantthemes_before_nav_menu_callback' ] );
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function radiantthemes_before_nav_menu_callback() {
		$minicart_items = '';
		echo '<div class="hamburger-group">';
		ob_start();
		$minicart       = ob_get_clean();
		$minicart_items = '<div class="hamburger-minicart"><div class="minicart"><div class="widget_shopping_cart_content">' . $minicart . '</div></div></div>';
		echo wp_kses( $minicart_items, 'rt-content' );
		echo '</div>';
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'radiantthemes-addons' );
	}

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated.
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version.
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version.
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin.
		require_once 'class-plugin.php';
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'radiantthemes-addons' ),
			'<strong>' . esc_html__( 'Radiantthemes Addons', 'radiantthemes-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'radiantthemes-addons' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'radiantthemes-addons' ),
			'<strong>' . esc_html__( 'Radiantthemes Addons', 'radiantthemes-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'radiantthemes-addons' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'radiantthemes-addons' ),
			'<strong>' . esc_html__( 'Radiantthemes Addons', 'radiantthemes-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'radiantthemes-addons' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Add Custom Elementor Categories
	 *
	 * @param [type] $elements_manager Category Names Array.
	 * @since 1.0.0
	 * @access public
	 */
	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'radiant-widgets-category',
			[
				'title' => __( 'Radiant Addons', 'plugin-name' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

// Instantiate Radiantthemes_Addons.
Radiantthemes_Addons::instance();

if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
	/**
	 * Add button radiaus custom css to wp_head().
	 */
	function button_radius_head_styles() {
		$buttonradius  = '';
		$buttonradius  = esc_html( radiantthemes_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( radiantthemes_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( radiantthemes_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( radiantthemes_global_var( 'border-radius', 'margin-top', true ) );

		$buttonborderradius = '.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type="submit"], .woocommerce button.button[name="apply_coupon"], .woocommerce button.button[name="update_cart"], .woocommerce button.button[name="update_cart"]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .comments-area .comment-form > p button[type="submit"], .comments-area .comment-form > p button[type="reset"], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn, .btn {  border-radius:' . $buttonradius . ' !important ; }';

		echo '<style  type="text/css">' . $buttonborderradius . '</style>';
	}
	add_action( 'wp_head', 'button_radius_head_styles' );
}
