<?php
/**
 * Case Studies Addon
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
 * Elementor Blog widget.
 *
 * Elementor widget that displays posts in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_style_Custom_Search extends Widget_Base {

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
		return 'radiant-custom-search';
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
		return esc_html__( 'Custom Search', 'radiantthemes-addons' );
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
		return 'eicon-site-search';
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
			// 'modernizr-custom',
// 			'rt-search',
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
				'label' => esc_html__( 'Custom Search', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'search_style',
			array(
				'label'       => esc_html__( 'Select Search Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style four', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);
		$this->add_control(
			'search_icon_color',
			array(
				'label'     => esc_html__( 'Choose Search Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-icon-search'  => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-search-input' => 'border-bottom: 1px solid {{VALUE}}',
				),

			)
		);
		$this->add_control(
			'sticky_search_icon_color',
			array(
				'label'     => esc_html__( 'Search Icon Color in Sticky', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'.header-sticky.sticky-active .rt-icon-search' => 'color: {{VALUE}} !important;',
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

		if ( 'one' === $settings['search_style'] ) {

			$output  = '<div class="header-slideout-searchbar">';
			$output .= '<div class="header-slideout-searchbar-holder">';
			$output .= '<div class="header-slideout-searchbar-icon"><span class="ti-search"></span></div>';
			$output .= '<form class="header-slideout-searchbar-box" role="search" method="get" action="' . esc_url( home_url( '/' ) ) . ' ">';
			$output .= '<div class="form-row">';
			$output .= '<input type="search" placeholder="' . esc_attr__( 'Search Site', 'radiantthemes-addons' ) . '" value="" name="s" required>';
			$output .= '<button type="submit"><span class="ti-search"></span></button>';
			$output .= '</div>';
			$output .= '</form>';
			$output .= '</div>';
			$output .= '</div>';

			echo $output;

		} elseif ( 'two' === $settings['search_style'] ) {
			?>
				<div id="rtOverlay" class="rt-main-bg-overlay">
					<div class="rt-bg-overlay">
						<span class="closebtn" onclick="rtcloseSearch()" title="Close Overlay"><i class="ti ti-close"></i></span>
						<div class="rt-overlay-content">
							<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<input type="search" placeholder="<?php echo esc_attr__( 'Search Site', 'radiantthemes-addons' ); ?>" name="s" value="" required>
								<label><?php echo esc_attr__( 'Enter to Search', 'radiantthemes-addons' ); ?></label>
								<button type="submit"><i class="ti ti-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			<?php
			$output  = '<div class="header-slideout-searchbar">';
			$output .= '<div class="header-slideout-searchbar-holder">';
			$output  = '<span class="rt-search-icon" onclick="rtopenSearch()"><i class="ti ti-search"></i></span>';
			$output .= '</div>';
			$output .= '</div>';

			echo $output;
		} elseif ( 'four' === $settings['search_style'] ) {
			?>
			<div class="rt-search-box">
            	<div class="container">
            		<i class="search-btn ti-search"></i>
            		<div id="search-overlay" class="block" style="display: none;">
            			<div class="search-area-grid container">
            				<div id="search-box" class="col-md-11">
            					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="search-form" method="get" target="_top" >
            						<input id="search-text" name="s" placeholder="Search" type="text" autofocus="">
            						<button id="search-button" type="submit">
            							<i class="rt-search-btn ti-search"></i>
            						</button>
            					</form>
            				</div>
            				<div class="col-md-1" id="close-btn-search"><i class="ti-close"></i></div>
            			</div>
            		</div>
            	</div>
            </div>

			<?php
		} else {
			?>
			<div class="search-container">
				<div class="main-search clearfix">
					<div class="search-grid">
						<div id="rt-search" class="rt-search">
							<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<input class="rt-search-input" placeholder="Search Site" type="text" value="" name="s" id="search">
								<input class="rt-search-submit" type="submit" value="">
								<span class="rt-icon-search"></span>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

	}

	protected function _content_template() {

	}
}
