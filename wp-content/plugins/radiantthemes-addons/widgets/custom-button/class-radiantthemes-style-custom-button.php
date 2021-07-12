<?php
/**
 * Custom Button Style Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Custom Button widget.
 *
 * Elementor widget that displays a custom button.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Custom_Button extends Widget_Base {

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
		return 'radiant-custom-button';
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
		return esc_html__( 'Custom Button', 'radiantthemes-addons' );
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
		return 'eicon-button';
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
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array(
			'',
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
			'section_custom_button',
			array(
				'label' => esc_html__( 'Custom Button', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_style',
			array(
				'label'       => esc_html__( 'Button Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one'   => esc_html__( 'Normal', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Left Skew', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Right Skew', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'radiant_custom_btn_title',
			array(
				'label'       => esc_html__( 'Title', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Text on the button', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_link',
			array(
				'label'         => esc_html__( 'URL (Link)', 'radiantthemes-addons' ),
				'type'          => Controls_Manager::URL,
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
				'description'   => esc_html__( 'Add link to button.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_alignment',
			array(
				'label'       => esc_html__( 'Alignment', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::CHOOSE,
				'options'     => array(
					'inline' => array(
						'title' => esc_html__( 'Inline', 'radiantthemes-addons' ),
						'icon'  => 'fa fa-align-justify',
					),
					'left'   => array(
						'title' => esc_html__( 'Left', 'radiantthemes-addons' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'radiantthemes-addons' ),
						'icon'  => 'fa fa-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'radiantthemes-addons' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'toggle'      => true,
				'description' => esc_html__( 'Select button alignment.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_block',
			array(
				'label'        => esc_html__( 'Set full width button?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'radiant_custom_btn_alignment' => 'inline',
				),
			)
		);

		$this->add_control(
			'radiant_custom_btn_add_icon',
			array(
				'label'        => esc_html__( 'Add icon?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'radiant_custom_btn_icon_alignment',
			array(
				'label'       => esc_html__( 'Icon Alignment', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'left'  => esc_html__( 'Left', 'radiantthemes-addons' ),
					'right' => esc_html__( 'Right', 'radiantthemes-addons' ),
				),
				'condition'   => array(
					'radiant_custom_btn_add_icon' => 'yes',
				),
				'description' => esc_html__( 'Select icon alignment.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_icon',
			array(
				'label'     => esc_html__( 'Icons', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::ICONS,
				'condition' => array(
					'radiant_custom_btn_add_icon' => 'yes',
				),
			)
		);
		
		$this->add_control(
			'radiant_custom_btn_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main i' => 'color: {{VALUE}}',
				),
			)
		);
		
		$this->add_responsive_control(
			'radiant_custom_btn_icon_size',
			array(
				'label'      => esc_html__( 'Icon Size', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem', '%' ),
				'range'      => array(
					'px' => array(
						'min' => 0,
						'max' => 1000,
					),
					'%' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default' => array(
					'unit' => 'px',
					'size' => 17,
				),
				'selectors'  => array(
					'{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main i' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_custom_button_general',
			array(
				'label' => esc_html__( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => esc_html__( 'Typography', 'radiantthemes-addons' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main > .placeholder',
			)
		);

		$this->add_control(
			'radiant_custom_btn_color',
			array(
				'label'       => esc_html__( 'Button Title Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main > .placeholder' => 'color: {{VALUE}}',
				),
				'description' => esc_html__( 'Select Button Text color.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_entrance_animation',
			array(
				'label'        => esc_html__( 'Entrance Animation', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::ANIMATION,
				'prefix_class' => 'animated ',
			)
		);

		$this->add_control(
			'radiant_custom_btn_hover_animation',
			array(
				'label'        => esc_html__( 'Hover Animation', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::HOVER_ANIMATION,
				'prefix_class' => 'elementor-animation-',
			)
		);

		$this->add_control(
			'radiant_custom_btn_gradient_bg_add',
			array(
				'label'        => esc_html__( 'Add Gradient Background?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'Please Note: If selected, please do not use any background image or direct backgrund color.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_gradient_bg_type',
			array(
				'label'       => esc_html__( 'Gradient Background Type', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'to bottom'       => esc_html__( 'To Bottom', 'radiantthemes-addons' ),
					'to top'          => esc_html__( 'To Top', 'radiantthemes-addons' ),
					'to right'        => esc_html__( 'To Right', 'radiantthemes-addons' ),
					'to left'         => esc_html__( 'To Left', 'radiantthemes-addons' ),
					'to top left'     => esc_html__( 'To Top Left', 'radiantthemes-addons' ),
					'to bottom left'  => esc_html__( 'To Bottom Left', 'radiantthemes-addons' ),
					'to top right'    => esc_html__( 'To Top Right', 'radiantthemes-addons' ),
					'to bottom right' => esc_html__( 'To Bottom Right', 'radiantthemes-addons' ),
				),
				'condition'   => array(
					'radiant_custom_btn_gradient_bg_add' => 'yes',
				),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_one',
			array(
				'label'     => esc_html__( 'Background Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'radiant_custom_btn_gradient_bg_add' => 'yes',
				),
			)
		);

		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Background Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main' => 'background: linear-gradient({{radiant_custom_btn_gradient_bg_type.VALUE}}, {{radiant_custom_btn_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				),
				'condition' => array(
					'radiant_custom_btn_gradient_bg_add' => 'yes',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'border',
				'label'    => esc_html__( 'Border', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main',
			)
		);

		$this->add_control(
			'radiant_custom_btn_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px' => array(
						'min' => 0,
						'max' => 35,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'radiant_custom_btn_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'radiant_custom_btn_gradient_bg_add!' => 'yes',
				),
			)
		);

		$this->add_control(
			'radiant_custom_btn_margin',
			array(
				'label'      => esc_html__( 'Margin', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'radiant_custom_btn_padding',
			array(
				'label'      => esc_html__( 'Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main > .placeholder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_custom_button_hover',
			array(
				'label' => esc_html__( 'Hover Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'radiant_custom_btn_hover_style',
			array(
				'label'       => esc_html__( 'Hover Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'   => esc_html__( 'Style Six', 'radiantthemes-addons' ),
					'seven' => esc_html__( 'Style Seven', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
				'description' => esc_html__( 'Select hover style.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_bg_hover_color',
			array(
				'label'     => esc_html__( 'Background Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-custom-button-main:hover' => 'background: {{VALUE}}',
					
				),
			)
		);
		

		$this->add_control(
			'radiant_custom_btn_border_hover_color',
			array(
				'label'     => esc_html__( 'Border Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-custom-button-main:hover' => 'border:solid {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'radiant_custom_btn_font_hover_color',
			array(
				'label'     => esc_html__( 'Font Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-custom-button .radiantthemes-custom-button-main > .placeholder:hover' => 'color: {{VALUE}}',
					
				),
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

		$target   = $settings['radiant_custom_btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['radiant_custom_btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		if ( ! empty( $settings['radiant_custom_btn_bg_hover_color'] ) || ! empty( $settings['radiant_custom_btn_border_hover_color'] ) || ! empty( $settings['radiant_custom_btn_font_hover_color'] ) ) {

			// HOVER STYLE ONE.
			if ( 'one' === $settings['radiant_custom_btn_hover_style'] ) {

				$style  = '.radiantthemes-custom-button .radiantthemes-custom-button-main:hover {';
				$style .= ( ! empty( $settings['radiant_custom_btn_bg_hover_color'] ) ) ? ' background-color:' . $settings['radiant_custom_btn_bg_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_border_hover_color'] ) ) ? ' border-top-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-right-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-bottom-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-left-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_font_hover_color'] ) ) ? ' color:' . $settings['radiant_custom_btn_font_hover_color'] . ' !important;' : '';
				$style .= '}';
				wp_add_inline_style( 'radiantthemes-addons-custom', $style );

			} elseif ( 'two' === $settings['radiant_custom_btn_hover_style'] ) { // HOVER STYLE TWO.

				$style  = '.radiantthemes-custom-button .radiantthemes-custom-button-main:hover {';
				$style .= ( ! empty( $settings['radiant_custom_btn_border_hover_color'] ) ) ? ' border-top-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;border-bottom-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-left-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-right-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_font_hover_color'] ) ) ? ' color:' . $settings['radiant_custom_btn_font_hover_color'] . ' !important;' : '';
				$style .= '}';
				$style .= '.radiantthemes-custom-button.hover-style-two .radiantthemes-custom-button-main > .overlay {';
				$style .= ( ! empty( $settings['radiant_custom_btn_bg_hover_color'] ) ) ? ' background-color:' . $settings['radiant_custom_btn_bg_hover_color'] . ';' : '';
				$style .= '}';
				wp_add_inline_style( 'radiantthemes-addons-custom', $style );

			} elseif ( 'three' === $settings['radiant_custom_btn_hover_style'] ) { // HOVER STYLE THREE.

				$style  = '.radiantthemes-custom-button .radiantthemes-custom-button-main:hover {';
				$style .= ( ! empty( $settings['radiant_custom_btn_border_hover_color'] ) ) ? ' border-top-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;border-bottom-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-left-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-right-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_font_hover_color'] ) ) ? ' color:' . $settings['radiant_custom_btn_font_hover_color'] . ' !important;' : '';
				$style .= '}';
				$style .= '.radiantthemes-custom-button.hover-style-three .radiantthemes-custom-button-main > .overlay {';
				$style .= ( ! empty( $settings['radiant_custom_btn_bg_hover_color'] ) ) ? ' background-color:' . $settings['radiant_custom_btn_bg_hover_color'] . ';' : '';
				$style .= '}';
				wp_add_inline_style( 'radiantthemes-addons-custom', $style );

			} elseif ( 'four' === $settings['radiant_custom_btn_hover_style'] ) { // HOVER STYLE FOUR.

				$style  = '.radiantthemes-custom-button .radiantthemes-custom-button-main:hover{';
				$style .= ( ! empty( $settings['radiant_custom_btn_bg_hover_color'] ) ) ? ' background-color:' . $settings['radiant_custom_btn_bg_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_border_hover_color'] ) ) ? ' border-top-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;border-bottom-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-left-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-right-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_font_hover_color'] ) ) ? ' color:' . $settings['radiant_custom_btn_font_hover_color'] . ' !important;' : '';
				$style .= '}';
				wp_add_inline_style( 'radiantthemes-addons-custom', $style );

			} elseif ( 'five' === $settings['radiant_custom_btn_hover_style'] ) { // HOVER STYLE FIVE.

				$style  = '.radiantthemes-custom-button .radiantthemes-custom-button-main:hover {';
				$style .= ( ! empty( $settings['radiant_custom_btn_bg_hover_color'] ) ) ? ' background-color:' . $settings['radiant_custom_btn_bg_hover_color'] . ' !important; ' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_border_hover_color'] ) ) ? ' border-top-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-right-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-bottom-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-left-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_font_hover_color'] ) ) ? ' color:' . $settings['radiant_custom_btn_font_hover_color'] . ' !important;' : '';
				$style .= '}';
				wp_add_inline_style( 'radiantthemes-addons-custom', $style );

			} elseif ( 'six' === $settings['radiant_custom_btn_hover_style'] ) { // HOVER STYLE SIX.

				$style  = '.radiantthemes-custom-button .radiantthemes-custom-button-main:hover {';
				$style .= ( ! empty( $settings['radiant_custom_btn_bg_hover_color'] ) ) ? ' background-color:' . $settings['radiant_custom_btn_bg_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_border_hover_color'] ) ) ? ' border-top-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-right-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-bottom-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-left-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_font_hover_color'] ) ) ? ' color:' . $settings['radiant_custom_btn_font_hover_color'] . ' !important;' : '';
				$style .= '}';
				wp_add_inline_style( 'radiantthemes-addons-custom', $style );

			} elseif ( 'seven' === $settings['radiant_custom_btn_hover_style'] ) { // HOVER STYLE SEVEN.

				$style  = '.radiantthemes-custom-button .radiantthemes-custom-button-main:hover {';
				$style .= ( ! empty( $settings['radiant_custom_btn_bg_hover_color'] ) ) ? ' background-color:' . $settings['radiant_custom_btn_bg_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_border_hover_color'] ) ) ? ' border-top-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-right-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-bottom-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important; border-left-color:' . $settings['radiant_custom_btn_border_hover_color'] . ' !important;' : '';
				$style .= ( ! empty( $settings['radiant_custom_btn_font_hover_color'] ) ) ? ' color:' . $settings['radiant_custom_btn_font_hover_color'] . ' !important;' : '';
				$style .= '}';
				wp_add_inline_style( 'radiantthemes-addons-custom', $style );

			}
		}

		$output  = '<div class="radiantthemes-custom-button element-' . esc_attr( $settings['radiant_custom_btn_style'] ) . ' hover-style-' . esc_attr( $settings['radiant_custom_btn_hover_style'] ) . ' ' . $settings['radiant_custom_btn_entrance_animation'] . ' ' . $settings['radiant_custom_btn_hover_animation'] . '" data-button-direction="' . $settings['radiant_custom_btn_alignment'] . '"';
		$output .= ' data-button-fullwidth=';

		$output .= ( $settings['radiant_custom_btn_block'] ) ? '"true" ' : '"false" ';
		if ( $settings['radiant_custom_btn_add_icon'] ) {
			$output .= ' data-button-icon-position="' . $settings['radiant_custom_btn_icon_alignment'] . '"';
		}
		$output .= '>';

		if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
			$output .= '<a class="radiantthemes-custom-button-main" href="' . esc_url( $settings['radiant_custom_btn_link']['url'] ) . '" ' . $target . $nofollow . ' >';
			// HOVER STYLE ONE.
			if ( 'one' === $settings['radiant_custom_btn_hover_style'] ) { // NO OVERLAY.
				$output .= '';
			} elseif ( 'two' === $settings['radiant_custom_btn_hover_style'] ) { // HOVER STYLE TWO.
				$output .= '<div class="overlay"></div>';
			} elseif ( 'three' === $settings['radiant_custom_btn_hover_style'] ) { // HOVER STYLE THREE.
				$output .= '<div class="overlay"></div>';
			} elseif ( 'four' === $settings['radiant_custom_btn_hover_style'] ) { // HOVER STYLE FOUR.
				$output .= '';
			}
			$output .= '<div class="placeholder">';
		}

		if ( ! empty( $settings['radiant_custom_btn_add_icon'] ) && 'left' === $settings['radiant_custom_btn_icon_alignment'] ) {
			$output .= '<i class="' . $settings['radiant_custom_btn_icon']['value'] . '"></i>';
		}
		$output .= $settings['radiant_custom_btn_title'];
		if ( ! empty( $settings['radiant_custom_btn_add_icon'] ) && 'right' === $settings['radiant_custom_btn_icon_alignment'] ) {
			$output .= '<i class="' . $settings['radiant_custom_btn_icon']['value'] . '"></i>';
		}

		if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
			$output .= '</div>';
			$output .= '</a>';
		}

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
