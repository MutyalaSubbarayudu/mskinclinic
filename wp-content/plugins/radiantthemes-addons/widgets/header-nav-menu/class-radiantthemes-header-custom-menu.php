<?php
/**
 * Header Nav Menu
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Radiantthemes_Menu_Walker;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Blog widget.
 *
 * Elementor widget that displays posts in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Header_Custom_Menu extends Widget_Base {

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
		return 'radiant-header_custom_menu';
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
		return esc_html__( 'Header Custom Menu', 'radiantthemes-addons' );
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
		return 'eicon-nav-menu';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	// public function get_style_depends() {
	// 	return array(
	// 		'radiantthemes-addons-custom',
	// 	);
	// }

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array(
			'radiantthemes-addons-custom',
			// 'rt-velocity',
			// 'rt-velocity-ui',
			// 'rt-vertical-menu',
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
	 * Get all case Custom Post Type Categories.
	 *
	 * @return array case categories.
	 */
	public function radiantthemes_navmenu_navbar_menu_choices() {
		$menus = wp_get_nav_menus();
		$items = array();
		$i     = 0;
		foreach ( $menus as $menu ) {
			if ( 0 == $i ) {
				$default = $menu->term_id;
				$i++;
			}
			$items[ $menu->term_id ] = $menu->name;
		}

		return $items;
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
			array(
				'label' => esc_html__( 'Navigation', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'header_cus_nav_style',
			array(
				'label'       => esc_html__( 'Select Header Navigation Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'  => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'four' => esc_html__( 'Style Four', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'header_cus_nav_menu',
			array(
				'label'       => esc_html__( 'Select Menu', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     =>
				radiantthemes_navmenu_navbar_menu_choices(),
				'default'     => '',
			)
		);

		$this->add_control(
			'header_cus_menu_location',
			array(
				'label'       => esc_html__( 'Menu Location', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Select a location for your menu. This option facilitate the ability to create up to 2 mobile enabled menu locations', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'primary'   => esc_html__( 'Primary', 'radiantthemes-addons' ),
					'secondary' => esc_html__( 'Secondary', 'radiantthemes-addons' ),
				),
				'default'     => 'primary',
				'condition'   => array(
					'header_cus_nav_style!' => 'three',
				),
			)
		);

		$this->add_control(
			'header_cus_menu_background_image',
			array(
				'label'       => esc_html__( 'Upload Background Image', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
				'condition'   => array(
					'header_cus_nav_style' => 'two',
				),
			)
		);

		$this->add_control(
			'header_cus_menu_toggle_icon_color',
			array(
				'label'     => esc_html__( 'Toggle Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#FFFFFF',
				'selectors' => array(
					'{{WRAPPER}} .rt-main-toggle-menu-trigger span:before, .rt-main-toggle-menu-trigger span:after, .rt-main-toggle-menu-trigger span, .rt-main-toggle-menu-open .rt-main-toggle-menu-trigger span:after' => 'background: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style!' => 'one',
				),
			)
		);

		$this->add_control(
			'header_cus_menu_toggle_sticky_icon_color',
			array(
				'label'     => esc_html__( 'Toggle Icon Color on Sticky', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} .rt-main-toggle-menu-trigger span.sticky-toggle-menu:before, .rt-main-toggle-menu-trigger span.sticky-toggle-menu:after, .rt-main-toggle-menu-trigger span.sticky-toggle-menu, .rt-main-toggle-menu-open .rt-main-toggle-menu-trigger span.sticky-toggle-menu:after' => 'background: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style!' => 'one',
				),
			)
		);
		$this->add_control(
			'header_cus_menu_toggle_close_icon_color',
			array(
				'label'     => esc_html__( 'Close Icon Color ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} .rt-main-toggle-menu-open .rt-main-toggle-menu-trigger span::before' => 'background: {{VALUE}} !important;',
					'{{WRAPPER}} .rt-main-toggle-menu-open .rt-main-toggle-menu-trigger span::after' => 'background: {{VALUE}} !important;',
				),
				'condition' => array(
					'header_cus_nav_style' => 'three',
				),
			)
		);
		$this->add_responsive_control(
			'align_nav',
			array(
				'label'     => esc_html__( 'Menu Alignment', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center'  => array(
						'title' => esc_html__( 'Center', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'   => array(
						'title' => esc_html__( 'Right', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => esc_html__( 'Justified', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-justify',
					),
				),
				'selectors' => array(
					'{{WRAPPER}} #rt-mainMenu nav > ul' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'align_nav_sticky',
			array(
				'label'     => esc_html__( 'Sticky Menu Alignment', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center'  => array(
						'title' => esc_html__( 'Center', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'   => array(
						'title' => esc_html__( 'Right', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => esc_html__( 'Justified', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-justify',
					),
				),
				'default'   => 'right',
				'selectors' => array(
					'.header-sticky.sticky-active #rt-mainMenu nav > ul' => 'text-align: {{VALUE}} !important;',
				),
			)
		);
		$this->add_responsive_control(
			'header_cus_parent_menu_color',
			array(
				'label'     => esc_html__( 'Parent Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.rt-tree a, {{WRAPPER}} #rt-mainMenu nav > ul > li > a' => 'color: {{VALUE}};',
				),
				'default'   => '#000000',
				'condition' => array(
					'header_cus_nav_style!' => 'three',
				),
			)
		);
		$this->add_responsive_control(
			'header_cus_parent_sticky_menu_color',
			array(
				'label'     => esc_html__( 'Parent Sticky Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'.header-sticky.sticky-active #rt-mainMenu nav > ul > li > a' => 'color: {{VALUE}} !important;',
				),
				'default'   => '#f00000',
				'condition' => array(
					'header_cus_nav_style!' => 'three',
				),
			)
		);
		$this->add_responsive_control(
			'header_cus_second_child_menu_color',
			array(
				'label'     => esc_html__( 'Second Level Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-mobile-menu ul.rt-tree ul li a, {{WRAPPER}} #rt-mainMenu nav > ul > li .rt-dropdown-menu > li > a, {{WRAPPER}} #rt-mainMenu nav > ul > li.mega-menu-item .mega-menu-content ul.menu li a' => 'color: {{VALUE}};',
				),
				'default'   => '#000000',
				'condition' => array(
					'header_cus_nav_style!' => 'three',
				),
			)
		);
		$this->add_responsive_control(
			'header_cus_second_child_sticky_menu_color',
			array(
				'label'     => esc_html__( 'Second Level Sticky Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-mobile-menu ul.rt-tree ul li a, .header-sticky.sticky-active #rt-mainMenu nav > ul > li .rt-dropdown-menu > li > a' => 'color: {{VALUE}} !important;',
				),
				'default'   => '#ff0000',
				'condition' => array(
					'header_cus_nav_style!' => 'three',
				),
			)
		);
		$this->add_responsive_control(
			'header_cus_third_child_menu_color',
			array(
				'label'     => esc_html__( 'Third Level Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-mobile-menu ul.rt-tree ul li ul li a, {{WRAPPER}} #rt-mainMenu nav > ul > li .rt-dropdown-submenu > ul.rt-dropdown-menu > li a' => 'color: {{VALUE}};',
				),
				'default'   => '#FFFFFF',
				'condition' => array(
					'header_cus_nav_style!' => 'three',
				),
			)
		);
		$this->add_responsive_control(
			'header_cus_third_child_sticky_menu_color',
			array(
				'label'     => esc_html__( 'Third Level Sticky Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-mobile-menu ul.rt-tree ul li ul li a, .header-sticky.sticky-active #rt-mainMenu nav > ul > li .rt-dropdown-submenu > ul.rt-dropdown-menu > li a' => 'color: {{VALUE}} !important;',
				),
				'default'   => '#231cf9',
				'condition' => array(
					'header_cus_nav_style!' => 'three',
				),
			)
		);
		$this->add_responsive_control(
			'header_cus_hover_dropdown_bg_color',
			array(
				'label'     => esc_html__( 'Hover Dropdown background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} #rt-mainMenu nav > ul > li .rt-dropdown-menu' => 'background-color: {{VALUE}} !important;',
				),
				'default'   => '#000000',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'megamenu_title_typography',
				'label'    => esc_html__( 'Mega Menu Title Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} #rt-mainMenu nav > ul > li.mega-menu-item .mega-menu-content h5',
			)
		);
		$this->add_responsive_control(
			'megamenu_title_color',
			array(
				'label'     => esc_html__( 'Mega Menu Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} #rt-mainMenu nav > ul > li.mega-menu-item .mega-menu-content h5' => 'color: {{VALUE}};',
				),
				'default'   => '#ffffff',
			)
		);
		$this->add_responsive_control(
			'align',
			array(
				'label'        => esc_html__( 'Navbar/Toggle Alignment', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => array(
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
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
				'condition'    => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_responsive_control(
			'item_align',
			array(
				'label'     => esc_html__( 'Mobile Item Alignment', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
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
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .elementor-navigation ul li, .elementor-navigation ul ul li' => 'text-align: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'text_padding',
			array(
				'label'      => esc_html__( 'Text Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} #rt-mainMenu nav a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'header_cus_menu_logo1',
			array(
				'label'       => esc_html__( 'Upload Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
				'condition'   => array(
					'header_cus_nav_style' => 'four',

				),
			)
		);
		$this->add_control(
			'logo_dimension1',
			array(
				'label'       => esc_html__( 'Image Dimension', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'radiantthemes-addons' ),
				'default'     => array(
					'width'  => '106',
					'height' => '45',
				),
				'condition'   => array(
					'header_cus_nav_style' => 'four',

				),
			)
		);
		$this->add_control(
			'header_cus_menu_title1',
			array(
				'label'       => esc_html__( 'Text', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::WYSIWYG,
				'condition'   => array(
					'header_cus_nav_style' => 'four',

				),
				'default'     => esc_html__( 'Responsive Multi-Purpose Theme', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'show_normal_menu',
			array(
				'label'        => esc_html__( 'Display Desktop Menu', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);
		

		$this->end_controls_section();

		$this->start_controls_section(
			'submenu_content',
			array(
				'label'     => esc_html__( 'Submenu', 'radiantthemes-addons' ),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_responsive_control(
			'submenu_align',
			array(
				'label'     => esc_html__( 'Item Alignment', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
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
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .elementor-navigation .sub-menu .menu-item a' => 'text-align: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'sub_padding',
			array(
				'label'      => esc_html__( 'Item Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} #rt-mainMenu nav .sub-menu .menu-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_menu_style',
			array(
				'label'     => esc_html__( 'Navbar', 'radiantthemes-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'normal_header_title',
			array(
				'label'     => __( 'Normal Header Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'normal_header_background',
				'label'    => esc_html__( 'Normal Header Background', 'radiantthemes-addons' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => 'header.rt-dark.rt-submenu-light',
			)
		);

		$this->add_control(
			'sticky_header_title',
			array(
				'label'     => __( 'Sticky Header Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'sticky_header_background',
				'label'    => esc_html__( 'Sticky Header Background', 'radiantthemes-addons' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => 'header.rt-submenu-light.header-sticky.sticky-active .rt-header-inner',
			)
		);

		$this->add_responsive_control(
			'menu_link_color',
			array(
				'label'     => esc_html__( 'Main Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .elementor-nav-menu .menu-item a' => 'color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_responsive_control(
			'menu_link_bg',
			array(
				'label'     => esc_html__( 'Main Menu Link Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#00215e',
				'selectors' => array(
					'{{WRAPPER}} .elementor-nav-menu .menu-item a' => 'background-color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_responsive_control(
			'menu_link_hover_color',
			array(
				'label'     => esc_html__( 'Main Menu Link Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} #rt-mainMenu nav > ul > li > a:hover' => 'color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_responsive_control(
			'link_hover_bg_color',
			array(
				'label'     => esc_html__( 'Main Menu Link Background Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .elementor-nav-menu .menu-item a:hover' => 'background-color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'      => 'menu_border',
				'label'     => esc_html__( 'Border', 'radiantthemes-addons' ),
				'default'   => '1px',
				'selector'  => '{{WRAPPER}} #rt-mainMenu nav .elementor-nav-menu .menu-item a',
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_responsive_control(
			'menu_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .elementor-nav-menu .menu-item a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'active_color',
			array(
				'label'     => esc_html__( 'Current/Active', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SECTION,
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'menu_link_active_color',
			array(
				'label'     => esc_html__( 'Active Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .elementor-nav-menu .current-menu-item > a, .elementor-nav-menu .current_page_item > a' => 'color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'link_active_bg_color',
			array(
				'label'     => esc_html__( 'Active Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .elementor-nav-menu .current-menu-item > a, .elementor-nav-menu .current_page_item > a' => 'background-color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'active_hover_color',
			array(
				'label'     => esc_html__( 'Active Link', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .elementor-nav-menu .current-menu-item > a:hover, .elementor-nav-menu .current_page_item > a:hover' => 'color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'active_hover_bg_color',
			array(
				'label'     => esc_html__( 'Active Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .elementor-nav-menu .current-menu-item > a:hover, .elementor-nav-menu .current_page_item > a:hover' => 'background-color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'      => 'active_border',
				'label'     => esc_html__( 'Border', 'radiantthemes-addons' ),
				'default'   => '1px',
				'selector'  => '{{WRAPPER}} .elementor-nav-menu .current-menu-item > a, .elementor-nav-menu .current_page_item > a',
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'active_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .elementor-nav-menu .current-menu-item > a, .elementor-nav-menu .current_page_item > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'submenu_color',
			array(
				'label'     => esc_html__( 'Submenu', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SECTION,
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'submenu_link_color',
			array(
				'label'     => esc_html__( 'Submenu Links', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .elementor-nav-menu .sub-menu .menu-item a' => 'color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'submenu_link_bg',
			array(
				'label'     => esc_html__( 'Submenu Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#00215e',
				'selectors' => array(
					'{{WRAPPER}} #rt-mainMenu nav > ul > li .rt-dropdown-menu > li > a' => 'background-color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'submenu_link_hover',
			array(
				'label'     => esc_html__( 'Submenu Link Hover', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} #rt-mainMenu nav > ul > li .rt-dropdown-menu > li > a:hover,
					#rt-mainMenu nav > ul > li .rt-dropdown-submenu > ul.rt-dropdown-menu > li a:hover' => 'color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'submenu_hover_bg_color',
			array(
				'label'     => esc_html__( 'Submenu Hover BG', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .elementor-nav-menu .sub-menu .menu-item a:hover' => 'background-color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'      => 'submenu_border',
				'label'     => esc_html__( 'Border', 'radiantthemes-addons' ),
				'default'   => '1px',
				'selector'  => '{{WRAPPER}} .elementor-nav-menu .sub-menu .menu-item a',
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'submenu_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .elementor-nav-menu .sub-menu .menu-item a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'menu_toggle',
			array(
				'label'     => esc_html__( 'Mobile Toggle', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SECTION,
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'toggle_back_color',
			array(
				'label'     => esc_html__( 'background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000',
				'selectors' => array(
					'{{WRAPPER}} #rt-mainMenu-trigger' => 'background: {{VALUE}};',

				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->add_control(
			'toggle_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#333333',
				'selectors' => array(
					'{{WRAPPER}} .elementor-menu-toggle' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .rt-dark #header .rt-header-inner .lines, .rt-dark #header .rt-header-inner .lines:before, .rt-dark #header .rt-header-inner .lines:after, .rt-dark #header #header-wrap .lines, .rt-dark #header #header-wrap .lines:before, .rt-dark #header #header-wrap .lines:after, #header.rt-dark .rt-header-inner .lines, #header.rt-dark .rt-header-inner .lines:before, #header.rt-dark .rt-header-inner .lines:after, #header.rt-dark #header-wrap .lines, #header.rt-dark #header-wrap .lines:before, #header.rt-dark #header-wrap .lines:after' => 'background-color: {{VALUE}};',
				),
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'menu_typography',
			array(
				'label'     => esc_html__( 'Typography', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SECTION,
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'header_cus_nav_style!' => 'two',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'menu_typography',
				'label'     => esc_html__( 'Typography', 'radiantthemes-addons' ),
				'selector'  => '{{WRAPPER}} #rt-mainMenu nav > ul > li > a',
				'condition' => array(
					'header_cus_nav_style' => 'one',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'sub_menu_typography',
				'label'     => esc_html__( 'Submenu Typography', 'radiantthemes-addons' ),
				'selector'  => '{{WRAPPER}} #rt-mainMenu nav > ul > li > ul > li > a,
				#rt-mainMenu nav > ul > li > ul > li > ul > li > a,
				#rt-mainMenu nav > ul > li > ul > li > ul > li > ul > li > a,
				#rt-mainMenu nav > ul > li > ul > li > ul > li > ul > li ul li a,
				#rt-mainMenu nav > ul > li > ul > li > ul > li > ul > li ul li > ul > li > a ,#rt-mainMenu nav > ul > li .rt-dropdown-submenu > ul.rt-dropdown-menu > li a',
				'condition' => array(
					'header_cus_nav_style' => 'one',
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
		$settings      = $this->get_settings_for_display();
		$menu_location = $settings['header_cus_menu_location'];
		// Get menu.
		$nav_menu = ! empty( $settings['header_cus_nav_menu'] ) ? wp_get_nav_menu_object( $settings['header_cus_nav_menu'] ) : false;

		if ( ! $nav_menu ) {
			return;
		}

		$nav_menu_args = array(
			'fallback_cb'    => false,
			'container'      => false,
			'menu_class'     => 'elementor-nav-menu',
			'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
			'menu'           => $nav_menu,
			'echo'           => true,
			'depth'          => 0,
			'walker'         => new Radiantthemes_Menu_Walker(),

		);

		if ( 'one' === $settings['header_cus_nav_style'] ) {
			if ( 'yes' === $settings['show_normal_menu'] ) {
				$hid_class = '';
			} else {
				$hid_class = 'elementor-hidden-desktop';
			}
			
			?>
			
			<div id="rt-mainMenu-trigger"> <a class="rt-lines-button x"><span class="lines"></span></a> </div>
			<div id="rt-mainMenu" class="<?php echo esc_attr( $hid_class ); ?> " style="min-height: 0px;">
				<nav>
						<?php
						wp_nav_menu(
							apply_filters(
								'widget_nav_menu_args',
								$nav_menu_args,
								$nav_menu,
								$settings
							)
						);
						?>
				</nav>
			</div>
			<?php
		} elseif ( 'four' === $settings['header_cus_nav_style'] ) {
			?>
			<div class="rt-nav-sidebar-menu">
				<?php if ( $settings['header_cus_menu_logo1']['id'] ) : ?>
					<div class="brand-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( wp_get_attachment_image_url( $settings['header_cus_menu_logo1']['id'], 'full' ) ); ?>" width="<?php echo esc_attr( $settings['logo_dimension1']['width'] ); ?>" alt="logo" height="<?php echo esc_attr( $settings['logo_dimension1']['height'] ); ?>"></a>
					</div>
				<?php endif; ?>
				<div id="rt-side-menu" class="rt-side-menu collapse out testing">
					<?php
					$nav_menu_args_two = array(
						'fallback_cb'    => false,
						'container'      => false,
						'menu_class'     => 'rt-tree',
						'menu_id'        => 'main-menu',
						'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
						'menu'           => $nav_menu,
						'echo'           => true,
						'depth'          => 0,
					);
					wp_nav_menu(
						apply_filters(
							'widget_nav_menu_args',
							$nav_menu_args_two,
							$nav_menu,
							$settings
						)
					);
					?>
				</div>
				<?php if ( $settings['header_cus_menu_title1'] ) : ?>
					<div class="rt-hamburger-about-text">
						<?php echo wp_kses_post( $settings['header_cus_menu_title1'] ); ?>
					</div>
				<?php endif; ?>
				<div class="rt-hamburger-social-link">
					<h4><?php echo esc_html( $settings['header_cus_menu_social_heading'] ); ?></h4>
						<ul>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-googleplus', '', false ) ) ) : ?>
								<li><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-googleplus', '', false ) ); ?>" ><i class="fa fa-google-plus"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-facebook', '', false ) ) ) : ?>
								<li><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-facebook', '', false ) ); ?>"><i class="fa fa-facebook"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-twitter', '', false ) ) ) : ?>
								<li class="twitter"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-twitter', '', false ) ); ?>"><i class="fa fa-twitter"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-vimeo', '', false ) ) ) : ?>
								<li class="vimeo"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-vimeo', '', false ) ); ?>"><i class="fa fa-vimeo"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-youtube', '', false ) ) ) : ?>
								<li class="youtube"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-youtube', '', false ) ); ?>"><i class="fa fa-youtube-play"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-flickr', '', false ) ) ) : ?>
								<li class="flickr"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-flickr', '', false ) ); ?>"><i class="fa fa-flickr"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-linkedin', '', false ) ) ) : ?>
								<li class="linkedin"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-linkedin', '', false ) ); ?>"><i class="fa fa-linkedin"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-pinterest', '', false ) ) ) : ?>
								<li class="pinterest"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-pinterest', '', false ) ); ?>"><i class="fa fa-pinterest-p"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-xing', '', false ) ) ) : ?>
								<li class="xing"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-xing', '', false ) ); ?>"><i class="fa fa-xing"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-viadeo', '', false ) ) ) : ?>
								<li class="viadeo"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-viadeo', '', false ) ); ?>"><i class="fa fa-viadeo"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-vkontakte', '', false ) ) ) : ?>
								<li class="vkontakte"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-vkontakte', '', false ) ); ?>"><i class="fa fa-vk"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-tripadvisor', '', false ) ) ) : ?>
								<li class="tripadvisor"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-tripadvisor', '', false ) ); ?>"><i class="fa fa-tripadvisor"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-tumblr', '', false ) ) ) : ?>
								<li class="tumblr"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-tumblr', '', false ) ); ?>"><i class="fa fa-tumblr"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-behance', '', false ) ) ) : ?>
								<li class="behance"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-behance', '', false ) ); ?>"><i class="fa fa-behance"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-instagram', '', false ) ) ) : ?>
								<li class="instagram"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-instagram', '', false ) ); ?>"><i class="fa fa-instagram"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-dribbble', '', false ) ) ) : ?>
								<li class="dribbble"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-dribbble', '', false ) ); ?>"><i class="fa fa-dribbble"></i></a></li>
							<?php endif; ?>
							<?php if ( ! empty( radiantthemes_global_var( 'social-icon-skype', '', false ) ) ) : ?>
								<li class="skype"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-skype', '', false ) ); ?>"><i class="fa fa-skype"></i></a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			<?php
		}
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