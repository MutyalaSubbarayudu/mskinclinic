<?php
/**
 * Case Studies Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Blog widget.
 *
 * Elementor widget that displays posts in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_style_Custom_Cart extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'radiant-custom-cart';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Custom Cart', 'radiantthemes-addons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-cart-solid';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return array(
			'radiantthemes-addons-custom',
		);
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'radiant-widgets-category' );
	}

	/**
	 * Get all case Custom Post Type Categories.
	 *
	 * @return array case categories.
	 */



	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => esc_html__( 'Custom Cart', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'cart_icon_color',
			array(
				'label'       => esc_html__( 'Choose Cart Icon Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .header-cart-bar .header-cart-bar-icon' => 'color: {{VALUE}}',
				),

			)
		);
		$this->add_control(
			'cart_counter_color',
			array(
				'label'       => esc_html__( 'Choose Cart Counter Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,

				'selectors'   => array(
					'{{WRAPPER}} .header-cart-bar .cart-count' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'show_sticky_menu',
			array(
				'label'     => esc_html__( 'Display Cart Sticky ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),

				'default'   => 'yes',

			)
		);

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */


	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( 'yes' === $settings['show_sticky_menu'] ) {

				$cart_class = '';

		} else {
			$cart_class = 'hidden-md';

		}
		if ( ( class_exists( 'WooCommerce' ) ) ) {
			echo '<div class="rt-cart-box ' . $cart_class . '">
                <div class="header-cart-bar">
								<a class="header-cart-bar-icon" href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '">
								<span class="ti-shopping-cart"></span>
									<span class="cart-count"></span></a>
							</div>
                <div id="cart-overlay" class="cart-block">';
					do_action( 'radiantthemes_before_nav_menu' );
				echo '</div>
            </div>';

		}
	}

	protected function _content_template() {

	}
}
