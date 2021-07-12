<?php
/**
 * Radiant cf7 Addon
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
 * Elementor Contact Form 7 widget.
 *
 * Contact form 7 displaying in custom styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Cf7 extends Widget_Base {

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
		return 'radiant-cf7';
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
		return esc_html__( 'Contact Form 7', 'radiantthemes-addons' );
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
		return 'eicon-envelope';
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
			'section_contact_form',
			[
				'label' => esc_html__( 'Contact Form', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'radiant_cf7_style',
			[
				'label'       => esc_html__( 'Select Contact Form 7 Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one' => esc_html__( 'Style One (Simple)', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_cf7_btn_design',
			[
				'label' => esc_html__( 'Submit Button Design', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'radiant_submit_width',
			[
				'label'       => esc_html__( 'Width of Submit Button', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'auto' => esc_html__( 'Auto', 'radiantthemes-addons' ),
					'100%' => esc_html__( 'Full Width', 'radiantthemes-addons' ),
				],
				'default'     => 'auto',
			]
		);

		$this->add_control(
			'radiant_submit_margin',
			[
				'label'      => esc_html__( 'Margin', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .your-class' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'radiant_submit_padding',
			[
				'label'      => esc_html__( 'Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .your-class' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'radiant_submit_bg_color',
			[
				'label'       => esc_html__( 'Submit Button Background Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'description' => esc_html__( 'From here you can change the submit button color.', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'radiant_submit_hover_color',
			[
				'label'       => esc_html__( 'Submit Button Hover Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'description' => esc_html__( 'From here you can change the submit button hover color.', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'radiant_submit_txt_color',
			[
				'label'       => esc_html__( 'Submit Button Text Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'description' => esc_html__( 'From here you can change the submit button text color.', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'radiant_submit_txt_hover_color',
			[
				'label'       => esc_html__( 'Submit Button Text Hover Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'description' => esc_html__( 'From here you can change the submit button text hover color.', 'radiantthemes-addons' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'radiant_submit_border',
				'label'    => esc_html__( 'Border', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .wrapper',
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

		// $output = '';

		// echo $output;
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
