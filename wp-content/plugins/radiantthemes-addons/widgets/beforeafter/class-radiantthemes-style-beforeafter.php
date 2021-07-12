<?php
namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

/**
 * @since 1.1.0
 */
class Radiantthemes_Style_Beforeafter extends Widget_Base {

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
		return 'radiant-before-after';
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
		return __( 'Before After', 'radiantthemes-addons' );
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
		return 'eicon-image-before-after';
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
	 * Get all team Custom Post Type Categories.
	 *
	 * @return array team categories.
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
			[
				'label' => __( 'Content', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'beforeafter_style',
			[
				'label'       => esc_html__( 'Before After Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One(Default Style)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three'   => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					
				],
				'default'     => 'one',
			]
		);
		$this->add_control(
			'before_image',
			[
				'label'     => __( 'Before image', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,	
            ]				
		);
		$this->add_control(
			'after_image',
			[
				'label'     => __( 'After image', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,	
             ]				
		);
		$this->add_control(
			'extra_id',
			[
				'label'       => __( 'Element ID', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description'     => __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'extra_class',
			[
				'label'       => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
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
	 public function radiantthemes_beforeafter_style_func( $atts, $content = null, $tag ) {
			$settings = settings_atts(
				array(
					'beforeafter_style' => 'one',
					'before_image'      => '',
					'after_image'       => '',
					'animation'         => '',
					'extra_class'       => '',
					'extra_id'          => '',
				), $atts
			);
	 }
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$beforeafter_id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';

		$output  = '<div ' . $beforeafter_id . '  class="rt-beforeafter element-' . $settings['beforeafter_style'] . ' ' . esc_attr( $settings['extra_class'] ) . ' ">';
			$output .= wp_get_attachment_image( $settings['after_image']['id'], 'full' );

			$output .= '<div class="resize">';
			$output .= wp_get_attachment_image( $settings['before_image']['id'], 'full' );
			$output .= '</div>';
			$output .= '<span class="handle"></span>';
			$output .= '</div>';

			echo $output;
		?>
		<?php
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
