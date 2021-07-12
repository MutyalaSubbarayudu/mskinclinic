<?php
/**
 * Service Box Style Addon
 *
 * @package RadiantThemes
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
 * Elementor Service Box widget.
 *
 * Elementor widget that displays a Service box in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Servicebox_Slider extends Widget_Base {

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
		return 'radiant-servicebox-slider';
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
		return esc_html__( 'Service Box Slider', 'radiantthemes-addons' );
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
		return 'eicon-post-slider';
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
			'radiantthemes-servicebox',
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
			'section_content',
			[
				'label' => esc_html__( 'Service Box Slider', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'service_box_style',
			[
				'label'       => esc_html__( 'Service Box Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one' => esc_html__( 'Style One' ),
					

				],
				'default'     => 'one',
			]
		);
		

		$this->add_control(
			'servicebox_button_text',
			[
				'label'       => esc_html__( 'Button Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Put Button Text.', 'radiantthemes-addons' ),

			]
		);
		$this->add_control(
			'servicebox_button_link',
			[
				'label'       => esc_html__( 'Button Link', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Put Button Link.', 'radiantthemes-addons' ),

			]
		);
		$this->add_control(
			'posts_in_desktop',
			[
				'label'       => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Desktop', 'radiantthemes-addons' ),
				
				'default'     => 3,
			]
		);

		$this->add_control(
			'posts_in_tab',
			[
				'label'       => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Tab', 'radiantthemes-addons' ),
				
				'default'     => 2,
			]
		);

		$this->add_control(
			'posts_in_mobile',
			[
				'label'       => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Mobile', 'radiantthemes-addons' ),
				
				'default'     => 1,
			]
		);
		$this->add_control(
			'space_between_posts',
			[
				'label'       => esc_html__( 'Space beteen posts', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Space between Two Posts', 'radiantthemes-addons' ),
				
				'default'     => 30,
			]
		);
		

		$this->end_controls_section();
			$this->start_controls_section(
			'servicebox_style',
			[
				'label' => esc_html__( 'Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'servicebox_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-servicebox.element-one .swiper-container .swiper-wrapper .swiper-slide > .data-box h2' => 'color: {{VALUE}};',
					
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .rt-servicebox.element-one .swiper-container .swiper-wrapper .swiper-slide > .data-box h2',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
			]
		);
		$this->add_control(
			'servicebox_title_hover_color',
			[
				'label'     => esc_html__( 'Title Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-servicebox.element-one .swiper-container .swiper-wrapper .swiper-slide > .data-box .rt-course-hover h2' => 'color: {{VALUE}};',
					
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_hover_typography',
				'selector' => '{{WRAPPER}} .rt-servicebox.element-one .swiper-container .swiper-wrapper .swiper-slide > .data-box .rt-course-hover h2',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
			]
		);
		$this->add_control(
			'servicebox_button_color',
			[
				'label'     => esc_html__( 'Button Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-servicebox.element-one .swiper-container .swiper-wrapper .swiper-slide > .data-box .rt-course-hover p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-servicebox.element-one .swiper-container .swiper-wrapper .swiper-slide > .data-box .rt-course-hover p a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .rt-servicebox.element-one .swiper-container .swiper-wrapper .swiper-slide > .data-box .rt-course-hover p',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
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
			
		$query = new \WP_Query(
			array(
				'post_type'      => 'service',
				'posts_per_page' => -1,
				'order'          => 'DESC',
				'orderby'        => 'date',
				
			)
		);

		// MAIL LAYOUT.
		$output  = '';
		$output .= '<div class="row rt-servicebox element-' . esc_attr( $settings['service_box_style'] ) . '">';
            $output .= '<div class="swiper-container" data-mobile-items="'.$settings['posts_in_mobile'] . '" data-tab-items="'.$settings['posts_in_tab'] . '" data-desktop-items="'.$settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
               $output .= ' <div class="swiper-wrapper">';
		
			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				
              $output .= ' <div class="swiper-slide">';
                       $output .= ' <div class="card-image">';
                           $output .= ' <img src="' . get_the_post_thumbnail_url( get_the_ID() ) . '" alt="Image Slider">';
                        $output .= '</div>';
                       $output .= ' <div class="data-box">';
                           $output .= ' <h2>' . esc_attr( get_the_title() ) . '</h2>';
                           $output .= ' <div class="rt-course-hover">';
                               $output .= ' <h2>' . esc_attr( get_the_content() ) . '</h2>';
                              $output .= '  <p><a href="' . $settings['servicebox_button_link'] . '" class="view_btn view_btn-simple">' . $settings['servicebox_button_text'] . '</a></p>';

                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
				
			}
			wp_reset_postdata();
		} else {
			echo '<p>No items found</p>';
		}
		    
                    
                $output .= '</div>';
                
              // $output .= ' <div class="swiper-pagination"></div>';
                
                $output .= '<div class="swiper-button-next">';
                   $output .= '<span class="ti-angle-right"></span>';
                $output .= '</div>';
                $output .= '<div class="swiper-button-prev">';
                    $output .= '<span class="ti-angle-left"></span>';
                $output .= '</div>';
            $output .= '</div>';
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
