<?php
/**
 * Contact Box Style Addon
 *
 * @package RadiantThemes
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
 * Elementor Contact Box widget.
 *
 * Elementor widget that displays a Contact box in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Contact_Box extends Widget_Base {

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
		return 'radiant-contact_box';
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
		return esc_html__( 'Contact Box', 'radiantthemes-addons' );
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
		return 'fa fa-address-book';
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
			'section_content',
			[
				'label' => esc_html__( 'Contact Box', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'contact_box_style',
			[
				'label'       => esc_html__( 'Contact Box Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one' => esc_html__( 'Style One (With Title)' ),
					'two' => esc_html__( 'Style Two (Without Title)' ),

				],
				'default'     => 'one',
			]
		);
		$this->add_control(
			'contact_box_color',
			[
				'label'     => esc_html__( 'Contact Box Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-contact-box ul.contact li i' => 'color: {{VALUE}}',
				],

			]
		);

		$this->add_control(
			'contact_box_address',
			[
				'label'       => esc_html__( 'Enter Address', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Put address to be displayed on contact box.', 'radiantthemes-addons' ),

			]
		);
		$this->add_control(
			'contact_box_email',
			[
				'label'       => esc_html__( 'Enter Email', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'input_type'  => 'email',
				'description' => esc_html__( 'Put email to be displayed on contact box.', 'radiantthemes-addons' ),

			]
		);
		$this->add_control(
			'contact_box_phone',
			[
				'label'       => esc_html__( 'Enter Phone', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Put phone to be displayed on contact box.', 'radiantthemes-addons' ),

			]
		);
		$this->add_control(
			'contact_box_fax',
			[
				'label'       => esc_html__( 'Enter Fax', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Put fax to be displayed on contact box.', 'radiantthemes-addons' ),

			]
		);
		$this->add_control(
			'contact_box_whatsapp',
			[
				'label'       => esc_html__( 'Enter WhatsApp', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Put whatsapp to be displayed on contact box.', 'radiantthemes-addons' ),

			]
		);
		$this->add_control(
			'contact_box_animation',
			[
				'label'        => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
				'label_block'  => true,
				'type'         => Controls_Manager::ANIMATION,
				'description'  => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'prefix_class' => 'animated ',
			]
		);

		$this->end_controls_section();
			$this->start_controls_section(
			'contact_style',
			[
				'label' => esc_html__( 'Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title_background',
			[
				'label'     => esc_html__( 'Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-contact-box.element-one ul li' => 'color: {{VALUE}};',
					'{{WRAPPER}} .radiantthemes-contact-box.element-two ul li'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .radiantthemes-contact-box.element-one ul li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .radiantthemes-contact-box.element-two ul li a'  => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .radiantthemes-contact-box.element-one ul li, {{WRAPPER}} .radiantthemes-contact-box.element-two ul li',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
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

		// MAIL LAYOUT.
		$output  = '';
		$output .= '<div class="radiantthemes-contact-box element-' . esc_attr( $settings['contact_box_style'] ) . ' ' . $settings['contact_box_animation'] . '" >';

		require 'template/template-contact-box-item-' . $settings['contact_box_style'] . '.php';

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
