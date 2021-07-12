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
class Radiantthemes_Style_Animated_Link extends Widget_Base {

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
		return 'radiant-animated-link-style';
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
		return esc_html__( 'Animated Link', 'radiantthemes-addons' );
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
		return 'eicon-link';
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
			'general_section',
			[
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'animated_link_style',
			[
				'label'       => esc_html__( 'Animated Link Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One ', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two ', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three ', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four ', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five ', 'radiantthemes-addons' ),
					'six'  => esc_html__( 'Style Six ', 'radiantthemes-addons' ),
					'seven'  => esc_html__( 'Style Seven ', 'radiantthemes-addons' ),
					'eight'  => esc_html__( 'Style Eight ', 'radiantthemes-addons' ),
					'nine'  => esc_html__( 'Style Nine ', 'radiantthemes-addons' ),
					'ten'  => esc_html__( 'Style Ten ', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
			]
		);
		$this->add_control(
			'animated_link_color',
			[
				'label' => __( 'Animated Link Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'description' => esc_html__( 'Set your List Icon Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);
		$this->add_control(
			'animated_link_anchor',
			[
				'label' => __( 'Link', 'radiantthemes-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'radiantthemes-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					
				],
			]
		);
		$this->add_control(
			'link_text',
			[
				'label'       => esc_html__( 'Link Text', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				
			]
		);
		
		$this->add_control(
			'extra_id',
			[
				'label'       => esc_html__( 'Element ID', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				
			]
		);
		$this->add_control(
			'extra_class',
			[
				'label'       => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				
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

		$settings         = $this->get_settings_for_display();
		// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'css/radiantthemes-addons-custom.css', __FILE__ ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

		    $animated_link_anchor = $settings['animated_link_anchor'] ;
			
			$animated_url         = ( ! empty( $animated_link_anchor['url'] ) ) ? $animated_link_anchor['url'] : '#';
			$animated_title       = ( ! empty( $settings['link_text'] ) ) ? $settings['link_text'] : '';
			$animated_target      = ( ! empty( $animated_link_anchor['is_external'] ) ) ? $animated_link_anchor['is_external'] : '';
			$animated_rel         = ( ! empty( $animated_link_anchor['rel'] ) ) ? $animated_link_anchor['rel'] : '';

			// ADD ANIMATION ID.
			$animated_link_id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';
			
			// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();
			
			// ADD CUSTOM CSS.
			$custom_css = $settings['animated_link_color'] ? '.rt-animated-link.element-one.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-two.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-three.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-four.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-five.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-six.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-seven.'.$random_class.' > .holder > .main-link,
            .rt-animated-link.element-eight.'.$random_class.' > .holder > .main-link{
			    color: '.$settings['animated_link_color'].' ;
			}' : '';
			$custom_css .= $settings['animated_link_color'] ? '.rt-animated-link.element-three.'.$random_class.' > .holder > .main-link:before,
            .rt-animated-link.element-four.'.$random_class.' > .holder > .main-link:before,
            .rt-animated-link.element-five.'.$random_class.' > .holder > .main-link:before,
            .rt-animated-link.element-six.'.$random_class.' > .holder > .main-link > .dot-holder > .dots,
            .rt-animated-link.element-seven.'.$random_class.' > .holder > .main-link:before,
            .rt-animated-link.element-seven.'.$random_class.' > .holder > .main-link:after,
            .rt-animated-link.element-eight.'.$random_class.' > .holder > .main-link-fliper{
                background-color: '.$settings['animated_link_color'].' ;
			}' : '';
			$custom_css .= $settings['animated_link_color'] ? '.rt-animated-link.element-one.'.$random_class.' > .holder:before{
               border-color: '.$settings['animated_link_color'].' ;
			}' : '';
			wp_register_style( 'dummy-handle', false );
			wp_enqueue_style( 'dummy-handle' ); 
			wp_add_inline_style( 'dummy-handle', $custom_css );
			
			$output = '<div class="rt-animated-link element-'. esc_attr( $settings['animated_link_style'] ) . '' . esc_attr( $settings['extra_class'] ) . '  ' . esc_attr( $random_class ) . '" ' . $animated_link_id . '>';
			require 'template/template-animated-link-style-' . esc_attr( $settings['animated_link_style'] ) . '.php';
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
