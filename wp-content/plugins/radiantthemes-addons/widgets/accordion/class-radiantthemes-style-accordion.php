<?php
/**
 * Accordion Style Addon
 *
 * @package Radiantthemes
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
 * Elementor accordion widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * accordion style, showing only one item at a time.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Accordion extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve accordion widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'radiant-accordion';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve accordion widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Accordion', 'radiantthemes-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve accordion widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-accordion';
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
			'radiant-accordion',
		];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'accordion', 'tabs', 'toggle' ];
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
	 * Register accordion widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Accordion', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'radiant_accordion_style',
			[
				'label'       => esc_html__( 'Select Accordion Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label'       => esc_html__( 'Title & Description', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Accordion Title', 'radiantthemes-addons' ),
				'dynamic'     => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label'      => esc_html__( 'Content', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::WYSIWYG,
				'default'    => esc_html__( 'Accordion Content', 'radiantthemes-addons' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label'       => esc_html__( 'Accordion Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'tab_title'   => esc_html__( 'Accordion #1', 'radiantthemes-addons' ),
						'tab_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'radiantthemes-addons' ),
					],
					[
						'tab_title'   => esc_html__( 'Accordion #2', 'radiantthemes-addons' ),
						'tab_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'radiantthemes-addons' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->add_control(
			'view',
			[
				'label'   => esc_html__( 'View', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->add_control(
			'title_html_tag',
			[
				'label'     => esc_html__( 'Title HTML Tag', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1'  => 'H1',
					'h2'  => 'H2',
					'h3'  => 'H3',
					'h4'  => 'H4',
					'h5'  => 'H5',
					'h6'  => 'H6',
					'div' => 'div',
				],
				'default'   => 'div',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Accordion', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'radiant_accordion_extra_class',
			[
				'label'       => __( 'Extra class name', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),

			]
		);
		$this->add_control(
			'radiant_accordion_extra_id',
			[
				'label'       => __( 'Element ID', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_title',
			[
				'label' => esc_html__( 'Title', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_background',
			[
				'label'     => esc_html__( 'Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion .radiantthemes-accordion-item > .radiantthemes-accordion-item-title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .panel-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .radiantthemes-accordion.element-five .text' => 'color: {{VALUE}};',
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control(
			'tab_active_color',
			[
				'label'     => esc_html__( 'Active Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion .radiantthemes-accordion-item.radiantthemes-active > .radiantthemes-accordion-item-title > .panel-title' => 'color: {{VALUE}};',
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => 
				    '{{WRAPPER}} .radiantthemes-accordion .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .panel-title,
				     .radiantthemes-accordion .accord_bdy .accord_bx_sec .ques_bx li .text',
				    
				
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .radiantthemes-accordion .radiantthemes-accordion-item > .radiantthemes-accordion-item-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_content',
			[
				'label' => esc_html__( 'Content', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_background_color',
			[
				'label'     => esc_html__( 'Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion .radiantthemes-accordion-item > .radiantthemes-accordion-item-body' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label'     => esc_html__( 'Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion .radiantthemes-accordion-item > .radiantthemes-accordion-item-body' => 'color: {{VALUE}};',
					'{{WRAPPER}} .radiantthemes-accordion.element-five .ques_bx li p' => 'color: {{VALUE}};',
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'selector' => 
				'{{WRAPPER}} .radiantthemes-accordion .radiantthemes-accordion-item > .radiantthemes-accordion-item-body,
				.radiantthemes-accordion.element-five .ques_bx li p',
				
				
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			]
		);
		


		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => esc_html__( 'Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .radiantthemes-accordion .radiantthemes-accordion-item > .radiantthemes-accordion-item-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render accordion widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		?>
		
		<div class="radiantthemes-accordion element-<?php echo esc_attr( $settings['radiant_accordion_style'] ); ?>">
		    <?php if ( 'five' === $settings['radiant_accordion_style'] ) {
		     $rtrand=rand();
		    ?>
		    
		         <div class="accord_bdy">
                <div class="accord_bx_sec">
                    <ul class="ques_bx clearfix">
            <?php } ?>            
			<?php
			foreach ( $settings['tabs'] as $index => $item ) :
				require 'template/template-accordion-element-' . $settings['radiant_accordion_style'] . '.php';
			endforeach;
			echo $output;
			?>
			<?php if ( 'five' === $settings['radiant_accordion_style'] ) { ?>
			</ul>
			</div>
			</div>
			<?php } ?>  
			
		</div>
		<?php
	}

	/**
	 * Render accordion widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {

	}
}
