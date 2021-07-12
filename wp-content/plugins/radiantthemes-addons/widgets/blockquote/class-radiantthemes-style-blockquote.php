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
class Radiantthemes_Style_Blockquote extends Widget_Base {

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
		return 'radiant-blockquote';
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
		return esc_html__( 'Blockquote', 'radiantthemes-addons' );
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
		return 'eicon-blockquote';
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
			'blockquote_style',
			[
				'label'       => esc_html__( 'Blockquote Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One (Centered Bordered With Icon)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Left Bordered Without Icon)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (Left With Icon)', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
			]
		);
		$this->add_control(
			'blockquote_author',
			[
				'label'       => esc_html__( 'Author', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				
			]
		);
		$this->add_control(
			'blockquote_content',
			[
				'label'       => esc_html__( 'Content', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				
			]
		);
		$this->add_control(
			'blockquote_extra_id',
			[
				'label'       => esc_html__( 'Element ID', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				
			]
		);
		$this->add_control(
			'blockquote_extra_class',
			[
				'label'       => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				
			]
		);
		

		$this->add_control(
			'blockquote_font_color',
			[
				'label' => __( 'Font Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);
		$this->add_control(
			'blockquote_icon_color',
			[
				'label' => __( 'Icon Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
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

		$settings         = $this->get_settings_for_display();
		// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'css/radiantthemes-addons-custom.css', __FILE__ ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

		// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();

			$blockquote_style  = esc_attr( $settings['blockquote_font_color'] );
			$icon_style        = esc_attr( $settings['blockquote_icon_color'] );
			
			// ADD CUSTOM ID.
			$blockquote_id = $settings['blockquote_extra_id'] ? 'id="' . esc_attr( $settings['blockquote_extra_id'] ) . '"' : '';
			$blockquote_style = $blockquote_style ? 'style="color:' . $blockquote_style . ';"' : '';
			$icon_style = $icon_style ? 'style="color:' . $icon_style . ';"' : '';


			// MAIN LAYOUT.
			$output  = '<div class="radiantthemes-blockquote element-' . esc_attr( $settings['blockquote_style'] ) . '  ' . $settings['blockquote_extra_id'] . ' " ' . $blockquote_id . '>';
			$output .= '<blockquote ' .  $blockquote_style . '><i class="fa fa-quote-left" '.  $icon_style . '></i>';
			$output .= esc_attr( $settings['blockquote_content'] );
			$output .= '<cite>' . esc_attr( $settings['blockquote_author'] ) . '</cite>';
			$output .= '</blockquote>';
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
