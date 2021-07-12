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
class Radiantthemes_Style_Custom_Heading extends Widget_Base {

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
		return 'radiant-custom-heading';
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
		return esc_html__( 'Custom Heading', 'radiantthemes-addons' );
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
		return 'eicon-heading';
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
    public function get_script_depends() {
		return [
		    'radiantthemes-text-anim',
			'radiantthemes-text-animation',
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
			'style_variation',
			[
				'label'       => esc_html__( 'Heading Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One (Default)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two ', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three ', 'radiantthemes-addons' ),
					
				],
				'default'     => 'one',
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'radiantthemes-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'radiantthemes-addons' ),
				'default' => __( 'Add Your Heading Text Here', 'radiantthemes-addons' ),
			]
		);

		

		
		

		$this->add_control(
			'header_size',
			[
				'label' => __( 'HTML Tag', 'radiantthemes-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);
		$this->add_responsive_control(
			'align_nav',
			array(
				'label'     => esc_html__( 'Heading Alignment', 'radiantthemes-addons' ),
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
					'{{WRAPPER}} .rt-text-animation-style-one' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .rt-text-animation-style-two' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .rt-text-animation-style-three' => 'text-align: {{VALUE}};',
				),
			)
		);

		

		
		
		

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'radiantthemes-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .rt-text-animation-style-one .rt-text-1' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-text-animation-style-two .rt-text-2' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-text-animation-style-three .rt-text-3' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography1',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rt-text-animation-style-one .rt-text-1 ',
				'condition' => array(
					'style_variation' => 'one',
					
					
				),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography2',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}}  .rt-text-animation-style-two .rt-text-2 ',
				'condition' => array(
					'style_variation' => 'two',
					
					
				),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography3',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}}  .rt-text-animation-style-three .rt-text-3',
				'condition' => array(
					'style_variation' => 'three',
					
					
				),
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

	//	$id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';
		$header_tag_size = $settings['header_size'];
	//	$link = $settings['link'];
		
		$output ="";
		
		if('one' === $settings['style_variation'])
		{
			$output .='<div class="rt-text-animation-style-one">';
			$output .='<'.$header_tag_size.' class="rt-text-1">'.$settings['title'].'</'.$header_tag_size.'>';
		   $output .='</div>';
			
			
		}
		elseif ('two' === $settings['style_variation'])
		{
			$output .='<div class="rt-text-animation-style-two">';
			$output .='<'.$header_tag_size.' class="rt-text-2">';
  				$output .='<span class="text-wrapper">';
    				$output .='<span class="letters">'.$settings['title'].'</span>';
  				$output .='</span>';
			$output .='</'.$header_tag_size.'>';
		$output .='</div>';
			
			
		}
		elseif ('three' === $settings['style_variation'])
		{
			$output .='<div class="rt-text-animation-style-three">';
			$output .='<'.$header_tag_size.' class="rt-text-3">'.$settings['title'].'</'.$header_tag_size.'>';
		    $output .='</div>';
			

		
		}
		echo $output;

		

		// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'css/radiantthemes-addons-custom.css', __FILE__ ),
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
