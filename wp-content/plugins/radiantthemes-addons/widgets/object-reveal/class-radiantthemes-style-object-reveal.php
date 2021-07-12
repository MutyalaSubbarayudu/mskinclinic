<?php
/**
 * Object Reveal Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Object Reveal widget.
 *
 * Elementor widget that displays text or image in different styles of reveal animation.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Object_Reveal extends Widget_Base {

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
		return 'radiant-object-reveal';
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
		return esc_html__( 'Object Reveal', 'radiantthemes-addons' );
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
			'radiantthemes-object-reveal',
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
			'section_general',
			[
				'label' => esc_html__( 'Object Reveal', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'rt_object_reveal_style',
			[
				'label'       => esc_html__( 'Choose Object', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'rt-text'  => esc_html__( 'Text', 'radiantthemes-addons' ),
					'rt-image' => esc_html__( 'Image', 'radiantthemes-addons' ),
				],
				'default'     => 'rt-text',
			]
		);

		$this->add_control(
			'rt_obj_rev_text',
			[
				'label'       => esc_html__( 'Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Default title', 'radiantthemes-addons' ),
				'placeholder' => esc_html__( 'Type your title here', 'radiantthemes-addons' ),
				'condition'   => [
					'rt_object_reveal_style' => 'rt-text',
				],
			]
		);

		$this->add_control(
			'rt_obj_rev_header_size',
			[
				'label'     => esc_html__( 'HTML Tag', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'default'   => 'h2',
				'condition' => [
					'rt_object_reveal_style' => 'rt-text',
				],
			]
		);

		$this->add_responsive_control(
			'rt_obj_rev_text_align',
			[
				'label'     => esc_html__( 'Alignment', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'    => [
						'title' => esc_html__( 'Left', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'  => [
						'title' => esc_html__( 'Center', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'   => [
						'title' => esc_html__( 'Right', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rt-text-reveal' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'rt_object_reveal_style' => 'rt-text',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'rt_obj_rev_text_typography',
				'label'     => esc_html__( 'Typography', 'radiantthemes-addons' ),
				'selector'  => '{{WRAPPER}} .rt-text-reveal .holder > h1, {{WRAPPER}} .rt-text-reveal .holder > h2, {{WRAPPER}} .rt-text-reveal .holder > h3, {{WRAPPER}} .rt-text-reveal .holder > h4, {{WRAPPER}} .rt-text-reveal .holder > h5, {{WRAPPER}} .rt-text-reveal .holder > h6, {{WRAPPER}} .rt-text-reveal .holder > div, {{WRAPPER}} .rt-text-reveal .holder > span, {{WRAPPER}} .rt-text-reveal .holder > p',
				'condition' => [
					'rt_object_reveal_style' => 'rt-text',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-text-reveal .holder > h1'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-text-reveal .holder > h2'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-text-reveal .holder > h3'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-text-reveal .holder > h4'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-text-reveal .holder > h5'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-text-reveal .holder > h6'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-text-reveal .holder > div'  => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-text-reveal .holder > span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-text-reveal .holder > p'    => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rt_obj_rev_attach_image',
			[
				'label'     => esc_html__( 'Choose Image', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => [
					'rt_object_reveal_style' => 'rt-image',
				],
			]
		);

		$this->add_control(
			'rt_obj_rev_animation',
			[
				'label'   => esc_html__( 'Reveal Animation Position', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'left'   => 'Left',
					'top'    => 'Top',
					'right'  => 'Right',
					'bottom' => 'Bottom',
				],
				'default' => 'left',
			]
		);
		
		$this->add_control(
			'rt_obj_rev_animation_duration',
			[
				'label'   => esc_html__( 'Reveal Animation Duration', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '0.8s',
				'selectors' => [
					'{{WRAPPER}} [data-aos="reveal-left"] '   => 'transition-duration: {{VALUE}}',
					
				],
			]
		);
		
		$this->add_control(
			'rt_obj_rev_animation_delay',
			[
				'label'   => esc_html__( 'Reveal Animation Delay', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '0.3s',
				'selectors' => [
					'{{WRAPPER}} [data-aos="reveal-left"] '   => 'transition-delay: {{VALUE}}',
					
				],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_reveal_title',
			[
				'label' => esc_html__( 'Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		
			$this->add_control(
			'reveal_background_color',
			[
				'label'     => esc_html__( 'Reveal Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
				    '{{WRAPPER}}  .rt-image-reveal .holder .animate::before ' => 'background-color: {{VALUE}}',
					'{{WRAPPER}}  .rt-text-reveal .holder .animate::before ' => 'background-color: {{VALUE}}',
					
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

		$this->add_inline_editing_attributes( 'rt_obj_rev_text' );

		$this->add_render_attribute(
			'data_class',
			[
				'class'         => [ 'animate', $settings['rt_obj_rev_animation'] ],
				'data-aos'      => 'reveal-' . $settings['rt_obj_rev_animation'],
				'data-aos-once' => "true"
			]
		);

		$output = '';

		if ( 'rt-text' === $settings['rt_object_reveal_style'] ) {
			$output .= '<div class="rt-text-reveal">';
			$output .= '<div class="holder" data-aos="reveal-item">';
			$output .= '<div ' . $this->get_render_attribute_string( 'data_class' ) . '></div>';
			$output .= sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['rt_obj_rev_header_size'], $this->get_render_attribute_string( 'rt_obj_rev_text' ), $settings['rt_obj_rev_text'] );
			$output .= '</div>';
			$output .= '</div>';
		} elseif ( 'rt-image' === $settings['rt_object_reveal_style'] ) {
			$output .= '<div class="rt-image-reveal">';
			$output .= '<div class="holder" data-aos="reveal-item">';
			$output .= '<div ' . $this->get_render_attribute_string( 'data_class' ) . '></div>';
			$output .= wp_get_attachment_image( $settings['rt_obj_rev_attach_image']['id'], 'full' );
			$output .= '</div>';
			$output .= '</div>';
		} else {
			$output .= '';
		}

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
