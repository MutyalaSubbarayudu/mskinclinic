<?php
/**
 * Progress Bar Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Elementor Progress Bar widget.
 *
 * Elementor widget that displays progress bar.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Progressbar extends Widget_Base {

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
		return 'radiant-progressbar';
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
		return esc_html__( 'Progress Bar', 'radiantthemes-addons' );
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
		return 'eicon-skill-bar';
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
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return array(
			'radiantthemes-all',
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
			'elementor-waypoints',
			'radiantthemes-progressbar',
		);
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

		/* Start Progress Content Section */
		$this->start_controls_section(
			'premium_progressbar_labels',
			array(
				'label' => esc_html__( 'Progress Bar Settings', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'premium_progressbar_left_label',
			array(
				'label'       => esc_html__( 'Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'My Skill', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'premium_progressbar_right_label',
			array(
				'label'       => esc_html__( 'Percentage', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( '50%', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'premium_progressbar_progress_percentage',
			array(
				'label'   => esc_html__( 'Value', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 50,
			)
		);

		$this->add_control(
			'premium_progressbar_progress_style',
			array(
				'label'   => esc_html__( 'Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => array(
					'solid'    => esc_html__( 'Solid', 'radiantthemes-addons' ),
					'stripped' => esc_html__( 'Striped', 'radiantthemes-addons' ),
					'gradient' => esc_html__( 'Animated Gradient', 'radiantthemes-addons' ),
				),
			)
		);

		$this->add_control(
			'premium_progressbar_speed',
			array(
				'label' => esc_html__( 'Speed (milliseconds)', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::NUMBER,
			)
		);

		$this->add_control(
			'premium_progressbar_progress_animation',
			array(
				'label'     => esc_html__( 'Animated', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'condition' => array(
					'premium_progressbar_progress_style' => 'stripped',
				),
			)
		);

		$this->add_control(
			'gradient_colors',
			array(
				'label'       => esc_html__( 'Gradient Colors', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter Colors separated with \' , \'.', 'radiantthemes-addons' ),
				'default'     => '#6EC1E4,#54595F',
				'label_block' => true,
				'condition'   => array(
					'premium_progressbar_progress_style' => 'gradient',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_progressbar_progress_bar_settings',
			array(
				'label' => esc_html__( 'Progress Bar', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'premium_progressbar_progress_bar_height',
			array(
				'label'       => esc_html__( 'Height', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => array(
					'size' => 25,
				),
				'label_block' => true,
				'selectors'   => array(
					'{{WRAPPER}} .premium-progressbar-bar-wrap, {{WRAPPER}} .premium-progressbar-bar' => 'height: {{SIZE}}px;',
				),
			)
		);

		$this->add_control(
			'premium_progressbar_progress_bar_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min' => 0,
						'max' => 60,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .premium-progressbar-bar-wrap, {{WRAPPER}} .premium-progressbar-bar' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'fill_colors_title',
			array(
				'label' => esc_html__( 'Fill', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'premium_progressbar_progress_color',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .premium-progressbar-bar',
			)
		);

		$this->add_control(
			'base_colors_title',
			array(
				'label' => esc_html__( 'Base', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'premium_progressbar_background',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .premium-progressbar-bar-wrap',
			)
		);

		$this->add_responsive_control(
			'premium_progressbar_container_margin',
			array(
				'label'      => esc_html__( 'Margin', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .premium-progressbar-bar-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_progressbar_labels_section',
			array(
				'label' => esc_html__( 'Labels', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'premium_progressbar_left_label_hint',
			array(
				'label' => esc_html__( 'Title', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_control(
			'premium_progressbar_left_label_color',
			array(
				'label'     => esc_html__( 'Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .premium-progressbar-left-label' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'left_label_typography',
				'selector' => '{{WRAPPER}} .premium-progressbar-left-label',
			)
		);

		$this->add_responsive_control(
			'premium_progressbar_left_label_margin',
			array(
				'label'      => esc_html__( 'Margin', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .premium-progressbar-left-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'premium_progressbar_right_label_hint',
			array(
				'label'     => esc_html__( 'Percentage', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'premium_progressbar_right_label_color',
			array(
				'label'     => esc_html__( 'Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .premium-progressbar-right-label' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'right_label_typography',
				'selector' => '{{WRAPPER}} .premium-progressbar-right-label',
			)
		);

		$this->add_responsive_control(
			'premium_progressbar_right_label_margin',
			array(
				'label'      => esc_html__( 'Margin', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .premium-progressbar-right-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$this->add_inline_editing_attributes( 'premium_progressbar_left_label' );
		$this->add_inline_editing_attributes( 'premium_progressbar_right_label' );

		$length = isset( $settings['premium_progressbar_progress_percentage']['size'] ) ? $settings['premium_progressbar_progress_percentage']['size'] : $settings['premium_progressbar_progress_percentage'];

		$style = $settings['premium_progressbar_progress_style'];

		$progressbar_settings = array(
			'progress_length' => $length,
			'speed'           => ! empty( $settings['premium_progressbar_speed'] ) ? $settings['premium_progressbar_speed'] : 1000,
		);

		$this->add_render_attribute( 'progressbar', 'class', 'premium-progressbar-container' );

		if ( 'stripped' === $style ) {
			$this->add_render_attribute( 'progressbar', 'class', 'premium-progressbar-striped' );
		} elseif ( 'gradient' === $style ) {
			$this->add_render_attribute( 'progressbar', 'class', 'premium-progressbar-gradient' );
			$progressbar_settings['gradient'] = $settings['gradient_colors'];
		}

		if ( 'yes' === $settings['premium_progressbar_progress_animation'] ) {
			$this->add_render_attribute( 'progressbar', 'class', 'premium-progressbar-active' );
		}

		$this->add_render_attribute( 'progressbar', 'data-settings', wp_json_encode( $progressbar_settings ) );

		$this->add_render_attribute( 'wrap', 'class', 'premium-progressbar-bar-wrap' );

		?>

		<div <?php echo $this->get_render_attribute_string( 'progressbar' ); ?>>
			<p class="premium-progressbar-left-label"><span <?php echo $this->get_render_attribute_string( 'premium_progressbar_left_label' ); ?>><?php echo $settings['premium_progressbar_left_label']; ?></span></p>
			<p class="premium-progressbar-right-label"><span <?php echo $this->get_render_attribute_string( 'premium_progressbar_right_label' ); ?>><?php echo $settings['premium_progressbar_right_label']; ?></span></p>
			<div class="clearfix"></div>
			<div <?php echo $this->get_render_attribute_string( 'wrap' ); ?>>
				<div class="premium-progressbar-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>

		<?php
	}
}
