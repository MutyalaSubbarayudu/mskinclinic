<?php
namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Pricing Table widget.
 *
 * Elementor widget that displays Pricing Tables in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Pricing_Table extends Widget_Base {

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
		return 'radiant-pricing-table';
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
		return esc_html__( 'Pricing Table', 'radiantthemes-addons' );
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
		return 'eicon-price-table';
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
			'radiantthemes-testimonial',
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
			'general_section',
			array(
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'pricing_table_style_variation',
			array(
				'label'   => __( 'Pricing Table Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one'   => __( 'Style One (Classic)', 'radiantthemes-addons' ),
					'two'   => __( 'Style Two (Minimal)', 'radiantthemes-addons' ),
					'three' => __( 'Style Three (Creative With Image)', 'radiantthemes-addons' ),
					'four'  => __( 'Style Four (Flat)', 'radiantthemes-addons' ),
					'five'  => __( 'Style Five ', 'radiantthemes-addons' ),
					'six'   => __( 'Style Six ', 'radiantthemes-addons' ),
					'seven' => __( 'Style Seven ', 'radiantthemes-addons' ),
					'eight' => __( 'Style Eight', 'radiantthemes-addons' ),
					'nine'  => __( 'Style Nine', 'radiantthemes-addons' ),
					'ten'   => __( 'Style Ten', 'radiantthemes-addons' ),
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'info_section',
			array(
				'label' => __( 'Info', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'pricing_table_image',
			array(
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => array(
					'pricing_table_style_variation' => 'three',
				),

			)
		);
		$this->add_control(
			'pricing_table_image_five',
			array(
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' =>
				array(
					'pricing_table_style_variation' => 'five',
				),
			)
		);
		$this->add_control(
			'pricing_table_image_six',
			array(
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,

				'condition' =>
				array(
					'pricing_table_style_variation' => 'six',
				),
			)
		);
		$this->add_control(
			'pricing_table_image_seven',
			array(
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,

				'condition' =>
				array(
					'pricing_table_style_variation' => 'seven',
				),
			)
		);
		$this->add_control(
			'pricing_table_spotlight_text',
			array(
				'label'   => __( 'Spotlight Text', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Popular Choice', 'radiantthemes-addons' ),

			)
		);

		$this->add_control(
			'pricing_table_title',
			array(
				'label'       => __( 'Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Basic Pack', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'pricing_table_subtitle',
			array(
				'label'       => __( 'Subtitle', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			)
		);

		$this->add_control(
			'pricing_table_currency_symbol',
			array(
				'label'       => __( 'Currency Symbol', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '$', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'pricing_table_price',
			array(
				'label'       => __( 'Price (Without Currency Symbol)', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '199', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);
			$this->add_control(
			'pricing_table_period1',
			[
				'label'       => __( 'Per User', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Per User', 'radiantthemes-addons' ),
				'label_block' => true,
				'condition' =>
				array(
					'pricing_table_style_variation' => 'nine',
				),
			]
		);

		$this->add_control(
			'pricing_table_period',
			array(
				'label'       => __( 'Period', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Per Month', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'pricing_table_tagline',
			array(
				'label'       => __( 'Tagline', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			)
		);

		$this->add_control(
			'content',
			array(
				'label'      => __( 'Content', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::WYSIWYG,
				'default'    => __( 'Content', 'radiantthemes-addons' ),
				'show_label' => false,
			)
		);

		$this->add_control(
			'pricing_table_button',
			array(
				'label'       => __( 'Button | Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Sign Up Now!', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'pricing_table_button_link',
			array(
				'label'       => __( 'Button | Link', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'input_type'  => 'url',
				'placeholder' => __( 'https://your-link.com', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'pricing_table_highlight',
			array(
				'label'        => __( 'Highlight ( If checked, item will be highlight By priority)', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'radiantthemes-addons' ),
				'label_off'    => __( 'Hide', 'radiantthemes-addons' ),
				'return_value' => 'spotlight',
				'default'      => 'spotlight',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			array(
				'label'     => __( 'Style', 'radiantthemes-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' =>
				array(
					'pricing_table_style_variation!' => 'eight',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Typography', 'radiantthemes-addons' ),
				'selector' =>
					'{{WRAPPER}} .rt-pricing-table > .holder > .heading .title , .rt-pricing-table.element-nine .rt-pricing-title ,.rt-pricing-table.element-seven > .holder > .heading .title , .rt-pricing-table.element-seven.spotlight > .holder > .heading .title {{WRAPPER}} .subtitle, .rt-pricing-table.element-ten .rt-pricing-title',

			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .heading .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-nine .rt-pricing-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight > .holder > .heading .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .heading .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .subtitle' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-ten .rt-pricing-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-one > .holder > .pricing .price,
					{{WRAPPER}} .rt-pricing-table.element-one > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-one > .holder > .pricing .price sup,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .pricing .price,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .pricing .price sub,

					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .pricing .price,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .pricing .price sup,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .pricing .price sub,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .more .btn' => 'color: {{VALUE}}',

					'{{WRAPPER}} .rt-pricing-table.element-one.spotlight > .holder > .pricing .pricing-tag,
					{{WRAPPER}} .rt-pricing-table.element-one > .holder > .more .btn:hover,
					{{WRAPPER}} .rt-pricing-table.element-one.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-two.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .hightlight-tag,
					{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .spotlight-tag > .spotlight-tag-text,
					{{WRAPPER}} .rt-pricing-table.element-four.spotlight > .holder > .more .btn',

					'{{WRAPPER}} .rt-pricing-table.element-one > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .more .btn' => 'border-color: {{VALUE}}',

					'{{WRAPPER}} .rt-pricing-table.element-two.spotlight > .holder' => 'border-top-color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-six.spotlight> .holder::before ' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'spotlight_holder_back_color',
			array(
				'label'     => esc_html__( 'Spotlight Holder Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight' => 'background: {{VALUE}};',
					
				),
				'condition' => array(
					'pricing_table_style_variation' => array( 'seven', 'three','nine' ),
					'pricing_table_highlight'       => 'spotlight',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Spotlight Typography', 'radiantthemes-addons' ),
				'name'     => 'spotlight_typography',
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-nine.spotlight > .spotlight-tag > .spotlight-tag-text , .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text , .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text',
			)
		);
		$this->add_control(
			'spotlight_back_color',
			array(
				'label'     => esc_html__( 'Spotlight Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight > .spotlight-tag > .spotlight-tag-text' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight > .spotlight-tag > .spotlight-tag-text::after' => 'border-color: {{VALUE}} transparent;',

					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text::after' => 'border-color: {{VALUE}} transparent;',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text::after' => 'border-color: {{VALUE}} transparent;',

				),
			)
		);
		$this->add_control(
			'spotlight_text_color',
			array(
				'label'     => esc_html__( 'Spotlight Text Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight > .spotlight-tag > .spotlight-tag-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text' => 'color: {{VALUE}};',

				),
			)
		);
		$this->add_control(
			'pricing_color',
			array(
				'label'     => esc_html__( 'Pricing Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-nine .rt-price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight > .holder > .pricing > .price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .pricing > .price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .pricing .price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-ten .rt-price' => 'color: {{VALUE}};',

				),
			)
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'    => esc_html__( 'Pricing Typography', 'radiantthemes-addons' ),
					'name'     => 'pricing_typography',
					'selector' => '{{WRAPPER}} .rt-pricing-table.element-nine .rt-price , .rt-pricing-table.element-three > .holder > .pricing .price ,  .rt-pricing-table.element-seven > .holder > .pricing > .price , .rt-pricing-table.element-seven.spotlight > .holder > .pricing > .price , .rt-pricing-table.element-ten .rt-price',
				)
			);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Button Typography', 'radiantthemes-addons' ),
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-nine .rt-table-buy .rt-pricing-action , .rt-pricing-table.element-nine.spotlight .rt-table-buy .rt-pricing-action , .rt-pricing-table.element-three > .holder > .more .btn , .rt-pricing-table.element-seven > .holder > .started .btn , .rt-pricing-table.element-ten .rt-table-buy .rt-pricing-action',

			)
		);
		$this->add_control(
			'button_color',
			array(
				'label'     => esc_html__( 'Button Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-nine .rt-table-buy .rt-pricing-action' => 'color: {{VALUE}};border: 1px solid {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more .btn' => 'color: {{VALUE}};border: 1px solid {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-ten .rt-table-buy .rt-pricing-action:hover' => 'background: {{VALUE}}; color:#fff;',
					'{{WRAPPER}} .rt-pricing-table.element-ten .rt-table-buy .rt-pricing-action' => 'color: {{VALUE}};border: 1px solid {{VALUE}};',

				),
			)
		);
		$this->add_control(
			'button_back_color',
			array(
				'label'     => esc_html__( 'Button Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(

					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn' => 'background: {{VALUE}};',

				),
				'condition' => array(
					'pricing_table_style_variation' => 'seven',
				),
			)
		);
		$this->add_control(
			'button_back_hover_color',
			array(
				'label'     => esc_html__( 'Button Background Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(

					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn:hover' => 'background: {{VALUE}};',

				),
				'condition' => array(
					'pricing_table_style_variation' => 'seven',
				),
			)
		);
		$this->add_control(
			'spotlight_button_color',
			array(
				'label'     => esc_html__( 'Spotlight Button Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight .rt-table-buy .rt-pricing-action' => 'background: {{VALUE}};border: none ;',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .more .btn' => 'background: {{VALUE}};border: none ;',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight > .holder > .started .btn' => 'background: {{VALUE}};border: none ;',

				),
				'condition' =>
				array(
					'pricing_table_highlight' => 'spotlight',
					'pricing_table_style_variation' != 'nine',
				),
			)
		);
		$this->add_control(
			'spotlight_holder_background_color',
			array(
				'label'     => esc_html__( 'Spotlight Holder Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder' => 'background: {{VALUE}};',
				),
				'condition' =>
				array(
					'pricing_table_highlight' => 'spotlight',
					'pricing_table_style_variation' != 'nine',
				),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_type',
			array(
				'label'       => esc_html__( 'Gradient Background Type', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'to bottom'       => esc_html__( 'To Bottom', 'radiantthemes-addons' ),
					'to top'          => esc_html__( 'To Top', 'radiantthemes-addons' ),
					'to right'        => esc_html__( 'To Right', 'radiantthemes-addons' ),
					'to left'         => esc_html__( 'To Left', 'radiantthemes-addons' ),
					'to top left'     => esc_html__( 'To Top Left', 'radiantthemes-addons' ),
					'to bottom left'  => esc_html__( 'To Bottom Left', 'radiantthemes-addons' ),
					'to top right'    => esc_html__( 'To Top Right', 'radiantthemes-addons' ),
					'to bottom right' => esc_html__( 'To Bottom Right', 'radiantthemes-addons' ),
				),
				'condition'   => array(
					'pricing_table_style_variation' => 'nine',
					'pricing_table_highlight'       => 'spotlight',
				),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_one',
			array(
				'label'     => esc_html__( 'Button Background Gradient Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'pricing_table_style_variation' => 'nine',
					'pricing_table_highlight'       => 'spotlight',

				),
			)
		);

		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Button Background Gradient Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight .rt-table-buy .rt-pricing-action' => 'background: linear-gradient({{radiant_custom_btn_gradient_bg_type.VALUE}}, {{radiant_custom_btn_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				),
				'condition' => array(
					'pricing_table_style_variation' => 'nine',
					'pricing_table_highlight'       => 'spotlight',
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

		echo '<div class="rt-pricing-table element-' . esc_html( $settings['pricing_table_style_variation'] ) . ' ' . $settings['pricing_table_highlight'] . '">';

		require __DIR__ . '/template/template-pricing-item-' . $settings['pricing_table_style_variation'] . '.php';

		echo '</div>';

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
