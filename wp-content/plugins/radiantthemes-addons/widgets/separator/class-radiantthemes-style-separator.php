<?php
/**
 * Separator Style Addon
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
 * Elementor Separator widget.
 *
 * Elementor widget that displays a separator in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Separator extends Widget_Base {

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
		return 'radiant-separator';
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
		return esc_html__( 'Separator', 'radiantthemes-addons' );
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
		return 'eicon-form-vertical';
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
			'section_settings',
			[
				'label' => esc_html__( 'Settings', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'radiant_separator_style',
			[
				'label'       => esc_html__( 'Separator Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One (Normal Line Style)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Left Skew Line Style)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (Right Skew Line Style)', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
			]
		);

		$this->add_control(
			'radiant_separator_width',
			[
				'label'       => esc_html__( 'Separator Width', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 50,
				'label_block' => true,
			]
		);

		$this->add_control(
			'radiant_separator_height',
			[
				'label'       => esc_html__( 'Separator Height', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 5,
				'label_block' => true,
			]
		);

		$this->add_control(
			'radiant_separator_color',
			[
				'label'     => esc_html__( 'Separator Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-separator > .radiantthemes-separator-block' => 'background-color: {{VALUE}}',
				],
				'default'   => '#000000',

			]
		);

		$this->add_control(
			'radiant_separator_gap_color',
			[
				'label'     => esc_html__( 'Separator Gap Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-separator > .radiantthemes-separator-block > .radiantthemes-separator-block-gap' => 'background-color: {{VALUE}}',
				],
				'default'   => '#ffffff',

			]
		);

		$this->add_control(
			'radiant_separator_direction',
			[
				'label'       => esc_html__( 'Separator Direction', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'left'   => esc_html__( 'Left', 'radiantthemes-addons' ),
					'center' => esc_html__( 'Center', 'radiantthemes-addons' ),
					'right'  => esc_html__( 'Right', 'radiantthemes-addons' ),
				],
				'default'     => 'center',
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

		$output = '';

		$output .= '<div class="radiantthemes-separator element-' . esc_attr( $settings['radiant_separator_style'] ) . ' text-' . esc_attr( $settings['radiant_separator_direction'] ) . '">';
		$output .= '<div class="radiantthemes-separator-block" style="width: ' . esc_attr( $settings['radiant_separator_width'] ) . 'px; height: ' . esc_attr( $settings['radiant_separator_height'] ) . 'px;">';
		$output .= '<div class="radiantthemes-separator-block-gap"></div>';
		$output .= '</div>';
		$output .= '</div>';

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
