<?php
/**
 * Radiantthemes Timeline Addon
 *
 * @package RadiantThemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Timeline widget.
 *
 * Elementor widget that displays content in timeline style.
 *
 * @since 1.0.0
 */
class RadiantThemes_Style_Timeline extends Widget_Base {

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
		return 'radiant-timeline';
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
		return esc_html__( 'Timeline', 'radiantthemes-addons' );
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
		return 'eicon-time-line';
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
			'radiantthemes-timeline',
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
				'label' => esc_html__( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'radiant_timeline_style',
			[
				'label'   => esc_html__( 'Timeline Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three', 'radiantthemes-addons' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'radiant_timeline_image',
			[
				'label' => esc_html__( 'Choose Image', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'radiant_timeline_title',
			[
				'label'       => esc_html__( 'Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Timeline Item Title', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'timeline_item_date',
			[
				'label'          => esc_html__( 'Timeline Date', 'plugin-domain' ),
				'type'           => Controls_Manager::DATE_TIME,
				'picker_options' => [
					'enableTime' => false,
					'altInput'   => true,
					'altFormat'  => 'F j, Y',
					'dateFormat' => 'F-j-Y',
				],
			]
		);

		$repeater->add_control(
			'timeline_content',
			[
				'label'      => esc_html__( 'Content', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::WYSIWYG,
				'default'    => esc_html__( 'Content', 'radiantthemes-addons' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'timeline_items',
			[
				'label'       => esc_html__( 'Timeline Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'timeline_item_title'   => esc_html__( 'Timeline Title #1', 'radiantthemes-addons' ),
						'timeline_item_content' => esc_html__( 'Content', 'radiantthemes-addons' ),
					],
					[
						'timeline_item_title'   => esc_html__( 'Timeline Title #2', 'radiantthemes-addons' ),
						'timeline_item_content' => esc_html__( 'Content', 'radiantthemes-addons' ),
					],
				],
				'title_field' => '{{{ radiant_timeline_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'timeline_color_scheme',
			[
				'label'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-timeline > .radiantthemes-timeline-item > .radiantthemes-timeline-item-dot' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Title Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-timeline > .radiantthemes-timeline-item .radiantthemes-timeline-item-data .title, {{WRAPPER}} .radiantthemes-timeline.element-three > .radiantthemes-timeline-slider .radiantthemes-timeline-item .radiantthemes-timeline-item-data .title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'timeline_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-timeline > .radiantthemes-timeline-item .radiantthemes-timeline-item-data .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .radiantthemes-timeline.element-three > .radiantthemes-timeline-slider .radiantthemes-timeline-item .radiantthemes-timeline-item-data .title' => 'color: {{VALUE}}',
				],
				'default'   => '#242222',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => esc_html__( 'Content Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-timeline > .radiantthemes-timeline-item .radiantthemes-timeline-item-data > *:last-child, {{WRAPPER}} .radiantthemes-timeline.element-three > .radiantthemes-timeline-slider .radiantthemes-timeline-item .radiantthemes-timeline-item-data > .table .table-cell > *:last-child',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'timeline_content_color',
			[
				'label'     => esc_html__( 'Content Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-timeline > .radiantthemes-timeline-item .radiantthemes-timeline-item-data > *:last-child' => 'color: {{VALUE}}',
					'{{WRAPPER}} .radiantthemes-timeline.element-three > .radiantthemes-timeline-slider .radiantthemes-timeline-item .radiantthemes-timeline-item-data > .table .table-cell > *:last-child' => 'color: {{VALUE}}',
				],
				'default'   => '#828282',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'date_typography',
				'label'    => esc_html__( 'Date Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-timeline.element-three > .radiantthemes-timeline-slider > .owl-thumbs > .owl-thumb-item, {{WRAPPER}} .radiantthemes-timeline.element-three > .radiantthemes-timeline-slider .radiantthemes-timeline-item .radiantthemes-timeline-item-data .date, {{WRAPPER}} .radiantthemes-timeline > .radiantthemes-timeline-item .radiantthemes-timeline-item-data .date-stamp',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'timeline_date_color',
			[
				'label'     => esc_html__( 'Date Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-timeline > .radiantthemes-timeline-item .radiantthemes-timeline-item-data .date-stamp' => 'color: {{VALUE}}',
					'{{WRAPPER}} .radiantthemes-timeline.element-three > .radiantthemes-timeline-slider > .owl-thumbs > .owl-thumb-item' => 'color: {{VALUE}}',
					'{{WRAPPER}} .radiantthemes-timeline.element-three > .radiantthemes-timeline-slider .radiantthemes-timeline-item .radiantthemes-timeline-item-data .date' => 'color: {{VALUE}}',
				],
				'default'   => '#828282',
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

		$output .= '<div class="radiantthemes-timeline element-' . esc_attr( $settings['radiant_timeline_style'] ) . '">';

		require 'template/template-timeline-style-' . $settings['radiant_timeline_style'] . '.php';

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
