<?php
/**
 * Popup Video Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Tab widget.
 *
 * Elementor widget that displays tab content in various styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Tabs extends Widget_Base {

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
		return 'radiant-tabs';
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
		return esc_html__( 'Tabs', 'radiantthemes-addons' );
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
		return 'eicon-tabs';
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
			'radiantthemes-tabs',
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
			'section_tabs_general',
			array(
				'label' => esc_html__( 'Tab', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_tabsstyle',
			array(
				'label'       => esc_html__( 'Select Tabs Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'    => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'    => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three'  => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'   => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'   => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'    => esc_html__( 'Style Six', 'radiantthemes-addons' ),
					'seven'  => esc_html__( 'Style Seven', 'radiantthemes-addons' ),
					'eight'  => esc_html__( 'Style Eight', 'radiantthemes-addons' ),
					'nine'   => esc_html__( 'Style Nine', 'radiantthemes-addons' ),
					'ten'    => esc_html__( 'Style Ten', 'radiantthemes-addons' ),
					'eleven' => esc_html__( 'Style Eleven', 'radiantthemes-addons' ),
					'twelve' => esc_html__( 'Style Twelve', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tabs_title',
			array(
				'label'       => esc_html__( 'Tab Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Tab Title', 'radiantthemes-addons' ),
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'tabs_content',
			array(
				'label'      => esc_html__( 'Tab Content', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::WYSIWYG,
				'default'    => esc_html__( 'Tab Content', 'radiantthemes-addons' ),
				'show_label' => false,
			)
		);

		$repeater->add_control(
			'tabs_id_random',
			array(
				'label'   => esc_html__( 'Tab Id', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::HIDDEN,
				'default' => '#' . substr( str_shuffle( '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ), 0, 16 ),
			)
		);

		$this->add_control(
			'rt-tabs',
			array(
				'label'       => esc_html__( 'Tab Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'tabs_title'   => esc_html__( 'Tab #1', 'radiantthemes-addons' ),
						'tabs_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'radiantthemes-addons' ),
					),
					array(
						'tabs_title'   => esc_html__( 'Tab #2', 'radiantthemes-addons' ),
						'tabs_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'radiantthemes-addons' ),
					),
				),
				'title_field' => '{{{ tabs_title }}}',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_tabs_style',
			array(
				'label' => esc_html__( 'Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'radiant_tab_color',
			array(
				'label'     => esc_html__( 'Color ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-tab.element-one > ul.nav-tabs > li.active > a,
					.rt-tab.element-three > ul.nav-tabs > li.active > a,
					.rt-tab.element-three > ul.nav-tabs > li.active > a i,
					.rt-tab.element-six > ul.nav-tabs > li.active > a,
					.rt-tab.element-eight > ul.nav-tabs > li.active > a,
					.rt-tab.element-five > ul.nav-tabs > li.active > a > span,
					.rt-tab.element-ten > ul.nav-tabs > li.active > a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-tab.element-five > ul.nav-tabs > li > a::before' => 'border-bottom:2px solid {{VALUE}}',

					'{{WRAPPER}} .rt-tab.element-three > ul.nav-tabs > li > a:before,
					.rt-tab.element-four > ul.nav-tabs > li > a:before,
					.rt-tab.element-seven > ul.nav-tabs > li.active > a:before,
					.rt-tab.element-eight > ul.nav-tabs > li > a:before,
					.rt-tab.element-nine > ul.nav-tabs > li > a:before,
					.rt-tab.element-ten > ul.nav-tabs > li > a:before,
					.rt-tab.element-eleven > ul.nav-tabs > li > a:before ,
					.rt-tab.element-two > ul.nav-tabs > li.active > a ' => 'background-color: {{VALUE}}',

					'{{WRAPPER}} .rt-tab.element-six > ul.nav-tabs > li > a:before' => 'border-color: {{VALUE}}',
				),

			)
		);
		$this->add_control(
			'radiant_tab_active_color',
			array(
				'label'     => esc_html__( 'Active Tab Color ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-tab > ul.nav-tabs > li.active > a' => 'color: {{VALUE}}',
				),

			)
		);
		$this->add_control(
			'radiant_tab_background_color_not_two',
			array(
				'label'     => esc_html__( 'Tab Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-tab > ul.nav-tabs > li > a' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'radiant_tabsstyle!' => 'two',
				),

			)
		);
		$this->add_control(
			'radiant_tab_background_color',
			array(
				'label'     => esc_html__( 'Tab Background Color ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-tab.element-two > ul.nav-tabs > li' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'radiant_tabsstyle' => 'two',
				),

			)
		);
		$this->add_control(
			'radiant_tab_active_background_color',
			array(
				'label'     => esc_html__( 'Active Tab Background Color ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-tab > ul.nav-tabs > li.active > a' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'tab_title_typography',
				'label'    => esc_html__( 'Title Typography ', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-tab > ul.nav-tabs > li > a > span',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'tab_content_typography',
				'label'    => esc_html__( 'Content Typography ', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-tab > .tab-content >.tab-pane',
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

		$output  = '';
		$output .= '<div class="rt-tab element-' . esc_attr( $settings['radiant_tabsstyle'] ) . '">';
		$output .= '<ul class="nav-tabs">';

		foreach ( $settings['rt-tabs'] as $index => $item ) :
			$tab_title = preg_replace( '/\s*/', '', $item['tabs_title'] );
			$tab_title = preg_replace( '/[^A-Za-z0-9\-]/', '', $item['tabs_title'] );
			$tab_title = strtolower( $tab_title );

			$output .= '<li class="matchHeight">';
			$output .= '<a data-toggle="tab" href="#' . esc_attr( $tab_title ) . '"><span>';
			$output .= esc_attr( $item['tabs_title'] );
			$output .= '</span></a>';
			$output .= '</li>';
		endforeach;
		$output .= '</ul>';
		$output .= '<div class="tab-content">';
		foreach ( $settings['rt-tabs'] as $index => $item ) :
			$tab_title = preg_replace( '/\s*/', '', $item['tabs_title'] );
			$tab_title = preg_replace( '/[^A-Za-z0-9\-]/', '', $item['tabs_title'] );
			$tab_title = strtolower( $tab_title );

			$output .= '<div id="' . esc_attr( $tab_title ) . '" class="tab-pane">';

			$output .= $item['tabs_content'];

			$output .= '</div>';
		endforeach;
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
