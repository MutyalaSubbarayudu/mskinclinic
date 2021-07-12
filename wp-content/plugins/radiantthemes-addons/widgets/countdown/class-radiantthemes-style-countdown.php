<?php
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
 * @since 1.1.0
 */
class Radiantthemes_Style_Countdown extends Widget_Base {

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
		return 'radiant-countdown';
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
		return esc_html__( 'Countdown', 'radiantthemes-addons' );
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
		return 'eicon-countdown';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return [
			'radiantthemes-addons-custom',
			'radiantthemes-datetimepicker',
		];
	}
	

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return [
			'radiantthemes-countdown',
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
			'general_section',
			[
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'countdown_style',
			[
				'label'   => __( 'Countdown Timer Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'one'   => __( 'Style One', 'radiantthemes-addons' ),
					
				],
				'label_block' => true,
				'default'     => 'one',
			]
		);
		
		$this->add_control(
			'countdown_datetime',
			[
				'label'       => __( 'Target Time For Countdown', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::DATE_TIME,
				'description' => esc_html__( "Date and time format (yyyy/mm/dd hh:mm:ss).", 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);
		

		
		$this->add_control(
			'extra_class',
			[
				'label'       => __( 'Extra class name for the container', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'extra_id',
			[
				'label'       => __( 'Element ID', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to w3c specification)', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);
		
		

		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_countdown',
			[
				'label' => __( 'Color', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'countdown_color',
			[
				'label'     => __( 'Countdown Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .rt-countdown.element-one' => 'color: {{VALUE}}',

					
				],
			]
		);

		$this->end_controls_section();

		

	}
     public function radiantthemes_countdown_style_func( $atts, $content = null, $tag ) {
			$settings = settings_atts(
				array(
					'countdown_style'    => 'one',
					'countdown_datetime' => '',
					'extra_class'        => '',
					'extra_id'           => '',
				), $atts
			);
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

		$settings         = $this->get_settings_for_display();
		
		$id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';

		$output = '<div class="rt-countdown element-' . esc_attr( $settings['countdown_style'] ) . ' ' . esc_attr( $settings['extra_class'] ) . '" ' . $id  . ' data-countdown="' . esc_attr( $settings['countdown_datetime'] ) . '"></div>';
			echo $output;

		// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'css/radiantthemes-addons-custom.css', __FILE__ ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );
			
			wp_register_style(
				'radiantthemes-datetimepicker',
				plugins_url( '/admin/css/bootstrap-datetimepicker-admin.css', __FILE__ ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

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
