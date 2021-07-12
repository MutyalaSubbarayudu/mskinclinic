<?php
/**
 * Slider Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Slider widget.
 *
 * Elementor widget that displays a slider.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Slider extends Widget_Base {

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
		return 'radiant-slider';
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
		return esc_html__( 'Slider', 'radiantthemes-addons' );
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
		return 'eicon-slider-album';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return [
			'radiantthemes-addons-custom',
		];
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return [
			'radiantthemes-slider',
		];
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
		return [ 'radiant-widgets-category' ];
	}

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
			'section_slider_general',
			[
				'label' => esc_html__( 'Slider', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'rt_slider_links',
			[
				'label'   => esc_html__( 'Add Images', 'plugin-domain' ),
				'type'    => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_settings',
			[
				'label' => esc_html__( 'Settings', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'rt_slider_allow_nav',
			[
				'label'        => esc_html__( 'Navigation Style', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_control(
			'rt_slider_allow_dots',
			[
				'label'        => esc_html__( 'Allow Dot Navigation?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'rt_slider_allow_loop',
			[
				'label'        => esc_html__( 'Allow Loop?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'rt_slider_allow_autoplay',
			[
				'label'        => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'rt_slider_autoplay_timeout',
			[
				'label'       => esc_html__( 'Autoplay Timeout (in ms)', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => 500,
				'default'     => 3000,
				'step'        => 500,
				'condition'   => [
					'rt_slider_allow_autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'rt_slider_in_desktop',
			[
				'label'       => esc_html__( 'Number of Items on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 5,
			]
		);

		$this->add_control(
			'rt_slider_in_tab',
			[
				'label'       => esc_html__( 'Number of Items on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 3,
			]
		);

		$this->add_control(
			'rt_slider_in_mobile',
			[
				'label'       => esc_html__( 'Number of Items on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 1,
			]
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

		if ( 'yes' === $settings['rt_slider_allow_autoplay'] ) {
			$rt_slider_allow_autoplay = 'true';
		} else {
			$rt_slider_allow_autoplay = 'false';
		}

		if ( 'yes' === $settings['rt_slider_allow_nav'] ) {
			$rt_slider_allow_nav = 'true';
		} else {
			$rt_slider_allow_nav = 'false';
		}

		if ( 'yes' === $settings['rt_slider_allow_dots'] ) {
			$rt_slider_allow_dots = 'true';
		} else {
			$rt_slider_allow_dots = 'false';
		}

		if ( 'yes' === $settings['rt_slider_allow_loop'] ) {
			$rt_slider_allow_loop = 'true';
		} else {
			$rt_slider_allow_loop = 'false';
		}

		$output = '';

		require 'template/template-slider-style-one.php';

		echo $output;
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _content_template() {

	}
}
