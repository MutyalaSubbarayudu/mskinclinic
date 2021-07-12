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
class Radiantthemes_Style_List extends Widget_Base {

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
		return 'radiant-list';
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
		return esc_html__( 'List', 'radiantthemes-addons' );
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
		return 'eicon-editor-list-ul';
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
			'list_style',
			[
				'label'       => esc_html__( 'Heading Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One (Right Arrow Circle)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Right Double Angle)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (Right Arrow Circle Solid)', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four (Right Carret)', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five (Check Circle)', 'radiantthemes-addons' ),
					'six'  => esc_html__( 'Style Six (Check Circle Solid)', 'radiantthemes-addons' ),
					'seven'  => esc_html__( 'Style Seven (Without icon)', 'radiantthemes-addons' ),
					'eight'  => esc_html__( 'Style Eight (Square)', 'radiantthemes-addons' ),
					'nine'  => esc_html__( 'Style Nine (Star)', 'radiantthemes-addons' ),
					'ten'  => esc_html__( 'Style Ten (Right Arrow)', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
			]
		);
		$this->add_control(
			'content',
			[
				'label' => __( 'Content', 'radiantthemes-addons' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => wp_kses_post(
								'<ul>
                                    <li>List Item Text One</li>
                                    <li>List Item Text Two</li>
                                    <li>List Item Text Three</li>
                                </ul>', 'radiantthemes-addons'
							),
			]
		);

		$this->add_control(
			'list_color',
			[
				'label' => __( 'List Icon Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'description' => esc_html__( 'Set your List Icon Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		
		
		$this->add_control(
			'list_extra_id',
			[
				'label'       => esc_html__( 'Element ID', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				
			]
		);
		$this->add_control(
			'list_extra_class',
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
		
		// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();

			if ( ! empty( $settings['list_color'] ) ) {
				// ADD CUSTOM CSS.
				$custom_css = ".radiantthemes-list.{$random_class} ul li:before{
					color: {$settings['list_color']};
				}";
			
			}
			// GET ID.
			$list_id = $settings['list_extra_id'] ? 'id="' . esc_attr( $settings['list_extra_id'] ) . '"' : '';
			
			// MAIL LAYOUT.
			$output  = "\r" . '<!-- list -->' . "\r";
			$output .= '<div class="radiantthemes-list ' . esc_attr( $random_class ) . ' element-' . esc_attr( $settings['list_style'] );
			$output .= ' ' . $settings['list_extra_class'] . ' " ' . $list_id . '>';
			$content = preg_replace('~</?p[^>]*>~', '', $settings['content']);
			$output .= $content;
			$output .= '</div>' . "\r";
			$output .= '<!-- list -->' . "\r";
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