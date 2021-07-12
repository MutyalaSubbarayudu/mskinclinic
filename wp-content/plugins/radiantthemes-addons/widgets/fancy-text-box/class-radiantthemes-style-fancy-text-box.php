<?php
/**
 * Fancy Text Box Style Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;


// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Fancy Text Box widget.
 *
 * Elementor widget that displays fancy text box.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Fancy_Text_Box extends \Elementor\Widget_Base {

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
		return 'radiant-fanc-text-box';
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
		return esc_html__( 'Fancy Text Box', 'radiantthemes-addons' );
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
		return 'eicon-info-box';
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
			'radiantthemes-image-gallery',
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
	 * Get all Testimonial Custom Post Type Categories.
	 *
	 * @return array Testimonial categories.
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
			'general_section',
			[
				'label' => esc_html__( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style_variation',
			[
				'label'   => esc_html__( 'Fancy Text Box Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one'   => esc_html__( 'Style One (On Hover Shadow)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (On Hover Dark Shade)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (On Hover 3D Shadow)', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four (Left Icon On Hover Shadow)', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five (Image With On Hover Slide Button)', 'radiantthemes-addons' ),
					'six'   => esc_html__( 'Style Six (Image With Overlay Data)', 'radiantthemes-addons' ),
					'seven' => esc_html__( 'Style Seven (On Hover Colored Box)', 'radiantthemes-addons' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'info_section',
			[
				'label' => esc_html__( 'Info', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'fancy_textbox_title',
			[
				'label'       => esc_html__( 'Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Title ', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'fancy_textbox_subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Subtitle ', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'fancy_textbox_content',
			[
				'label'      => esc_html__( 'Content', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::WYSIWYG,
				'default'    => esc_html__( 'Content', 'radiantthemes-addons' ),
				'show_label' => false,
			]
		);
		$this->add_control(
			'fancy_textbox_icontype',
			[
				'label'        => esc_html__( 'Select Type', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Icon', 'your-plugin' ),
				'label_off'    => esc_html__( 'Image', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);
		$this->add_control(
			'fancy_textbox_image',
			[
				'label'     => esc_html__( 'Add Image', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [],
				'condition' => [
					'fancy_textbox_icontype' => 'yes',
				],

			]
		);

		$this->add_control(
			'fancy_textbox_icon',
			[
				'label'     => esc_html__( 'Add Icon', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::ICON,
				'default'   => [],
				'condition' => [
					'fancy_textbox_icontype!' => 'yes',
				],

			]
		);

		$this->add_control(
			'fancy_textbox_link',
			[
				'label'       => esc_html__( 'Button | Link', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'input_type'  => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'fancy_textbox_link_title',
			[
				'label'       => esc_html__( 'Link Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Read More', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_fancytextbox',
			[
				'label' => esc_html__( 'Fancy Text Box', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'radiant_fancy_icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-fancy-text-box > .holder > .main-placeholder .icon i' => 'color: {{VALUE}}',
				],
				'condition' => [
					'fancy_textbox_icontype!' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Title Typography', 'radiantthemes-addons' ),
				'name'     => 'radiant_fancy_title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rt-fancy-text-box > .holder > .main-placeholder .data .title',
			]
		);

		$this->add_control(
			'radiant_fancy_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-fancy-text-box > .holder > .main-placeholder .data .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Subtitle Typography', 'radiantthemes-addons' ),
				'name'     => 'radiant_fancy_subtitle_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rt-fancy-text-box > .holder > .main-placeholder .data .subtitle',
			]
		);

		$this->add_control(
			'radiant_fancy_subtitle_color',
			[
				'label'     => esc_html__( 'Subtitle Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-fancy-text-box > .holder > .main-placeholder .data .subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Content Typography', 'radiantthemes-addons' ),
				'name'     => 'radiant_fancy_content_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rt-fancy-text-box > .holder > .main-placeholder .content',
			]
		);

		$this->add_control(
			'radiant_fancy_content_color',
			[
				'label'     => esc_html__( 'Content Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-fancy-text-box > .holder > .main-placeholder .content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Button Link Typography', 'radiantthemes-addons' ),
				'name'     => 'radiant_fancy_link_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rt-fancy-text-box > .holder > .main-placeholder .more .btn',
			]
		);

		$this->add_control(
			'radiant_fancy_link_color',
			[
				'label'     => esc_html__( 'Button Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-fancy-text-box > .holder > .main-placeholder .more .btn' => 'color: {{VALUE}}',
				],
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

		// MAIN LAYOUT.
			$output  = "\r" . '<!-- fancy-text-box -->' . "\r";
			$output .= '<div class="rt-fancy-text-box element-' . $settings['style_variation'] . '">';
				require 'template/template-fancy-text-box-' . $settings['style_variation'] . '.php';
			$output .= '</div>' . "\r";
			$output .= '<!-- fancy-text-box -->' . "\r";
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
