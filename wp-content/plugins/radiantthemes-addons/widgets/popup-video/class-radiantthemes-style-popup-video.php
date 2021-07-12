<?php
/**
 * Popup Video Addon
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
 * Elementor Popup Video widget.
 *
 * Elementor widget that displays a video in a popup window.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Popup_Video extends Widget_Base {

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
		return 'radiant-popup-video';
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
		return esc_html__( 'Popup Video', 'radiantthemes-addons' );
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
		return 'eicon-slider-video';
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
			'radiantthemes-popup-video',
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
				'label' => esc_html__( 'Content', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'radiant_popup_video_style',
			[
				'label'       => esc_html__( 'Popup Video Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
			]
		);

		$this->add_control(
			'radiant_popup_video_alignment',
			[
				'label'       => esc_html__( 'Popup Video Alignment', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::CHOOSE,
				'options'     => [
					'left'   => [
						'title' => esc_html__( 'Left', 'radiantthemes-addons' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'radiantthemes-addons' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'radiantthemes-addons' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'     => 'center',
				'toggle'      => true,
			]
		);

		$this->add_control(
			'radiant_attach_image',
			[
				'label' => esc_html__( 'Choose Image', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'radiant_popup_video_link',
			[
				'label'         => esc_html__( 'Enter Youtube/Vimeo Video Link', 'radiantthemes-addons' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://vimeo.com/24850539', 'radiantthemes-addons' ),
				'show_external' => false,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
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



		$target   = $settings['radiant_popup_video_link']['is_external'] ? 'target = "_blank"' : '';
		$nofollow = $settings['radiant_popup_video_link']['nofollow'] ? 'rel = "nofollow"' : '';

		$output = '';

		require 'template/template-popup-video-style-' . $settings['radiant_popup_video_style'] . '.php';

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
