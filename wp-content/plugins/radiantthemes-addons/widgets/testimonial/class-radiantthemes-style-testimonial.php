<?php
/**
 * Testimonial Style Addon
 *
 * @package Radiantthemes
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
 * Elementor Testimonial widget.
 *
 * Elementor widget that displays Testimonials in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Testimonial extends Widget_Base {

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
		return 'radiant-testimonial';
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
		return esc_html__( 'Testimonial', 'radiantthemes-addons' );
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
		return 'eicon-testimonial';
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
	 * Get all Testimonial Custom Post Type Categories.
	 *
	 * @return array Testimonial categories.
	 */
	public function get_testimonial_categories() {
		$testimonial_terms = get_terms(
			array(
				'taxonomy'   => 'testimonial-category',
				'hide_empty' => false,
			)
		);

		$testimonial_category_array = array();
		$testimonial_category_array = array( 'all' => 'Show all categories' );
		if ( ! empty( $testimonial_terms ) ) {
			foreach ( $testimonial_terms as $testimonial_term ) {
				$testimonial_category_array[ $testimonial_term->slug ] = $testimonial_term->name;
			}
		}

		return $testimonial_category_array;
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
			array(
				'label' => esc_html__( 'Content', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'testimonial_style',
			array(
				'label'       => esc_html__( 'Testimonial Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'one'    => esc_html__( 'Style One', 'radiantthemes-addons' ),

					'three'  => esc_html__( 'Style Two', 'radiantthemes-addons' ),

					'five'   => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'six'    => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'seven'  => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'eight'  => esc_html__( 'Style Six', 'radiantthemes-addons' ),
					'nine'   => esc_html__( 'Style Seven', 'radiantthemes-addons' ),

					'eleven' => esc_html__( 'Style Eight', 'radiantthemes-addons' ),
					'twelve' => esc_html__( 'Style Nine', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);

		$this->add_control(
			'testimonial_category',
			array(
				'label'       => esc_html__( 'Select Testimonial Category', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_testimonial_categories(),
				'default'     => 'all',
			)
		);

		$this->add_control(
			'testimonial_allow_carousel',
			array(
				'label'   => esc_html__( 'Carousel', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default' => 'true',
			)
		);

		// $this->add_control(
		// 'allow_nav',
		// array(
		// 'label'     => esc_html__( 'Allow Navigation?', 'radiantthemes-addons' ),
		// 'type'      => Controls_Manager::SELECT,
		// 'options'   => array(
		// 'false' => esc_html__( 'No', 'radiantthemes-addons' ),
		// 'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
		// ),
		// 'default'   => 'true',
		// 'condition' => array(
		// 'testimonial_allow_carousel' => 'true',
		// ),
		// )
		// );

		$this->add_control(
			'allow_dots',
			array(
				'label'       => esc_html__( 'Allow Dots for Navigation?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default'     => 'true',
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
			)
		);

		// $this->add_control(
		// 'allow_loop',
		// array(
		// 'label'       => esc_html__( 'Allow Loop?', 'radiantthemes-addons' ),
		// 'label_block' => true,
		// 'type'        => Controls_Manager::SELECT,
		// 'options'     => array(
		// 'false' => esc_html__( 'No', 'radiantthemes-addons' ),
		// 'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
		// ),
		// 'default'     => 'true',
		// 'condition'   => array(
		// 'testimonial_allow_carousel' => 'true',
		// ),
		// )
		// );

		// $this->add_control(
		// 'allow_autoplay',
		// array(
		// 'label'       => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
		// 'label_block' => true,
		// 'type'        => Controls_Manager::SELECT,
		// 'options'     => array(
		// 'false' => esc_html__( 'No', 'radiantthemes-addons' ),
		// 'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
		// ),
		// 'default'     => 'true',
		// 'condition'   => array(
		// 'testimonial_allow_carousel' => 'true',
		// ),
		// )
		// );

		// $this->add_control(
		// 'autoplay_timeout',
		// array(
		// 'label'       => esc_html__( 'Autoplay Timeout (in milliseconds)', 'radiantthemes-addons' ),
		// 'label_block' => true,
		// 'type'        => Controls_Manager::NUMBER,
		// 'min'         => 500,
		// 'default'     => 6000,
		// 'step'        => 500,
		// 'condition'   => array(
		// 'testimonial_allow_carousel' => 'true',
		// ),
		// )
		// );

		$this->add_control(
			'order',
			array(
				'label'       => esc_html__( 'Order', 'radiantthemes-addons' ),
				'label_block' => false,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				),
				'default'     => 'DESC',
			)
		);

		$this->add_control(
			'order_by',
			array(
				'label'       => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'date'     => esc_html__( 'Date', 'radiantthemes-addons' ),
					'title'    => esc_html__( 'Title', 'radiantthemes-addons' ),
					'ID'       => esc_html__( 'ID', 'radiantthemes-addons' ),
					'rand'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'modified' => esc_html__( 'Last Modified', 'radiantthemes-addons' ),
				),
				'default'     => 'date',
			)
		);

		$this->add_control(
			'max_posts',
			array(
				'label'       => esc_html__( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => -1,
				'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
				'default'     => 4,
			)
		);

		$this->add_control(
			'posts_in_desktop',
			array(
				'label'       => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Desktop', 'radiantthemes-addons' ),
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
				'default'     => 2,
			)
		);

		$this->add_control(
			'posts_in_tab',
			array(
				'label'       => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Tab', 'radiantthemes-addons' ),
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
				'default'     => 2,
			)
		);

		$this->add_control(
			'posts_in_mobile',
			array(
				'label'       => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Mobile', 'radiantthemes-addons' ),
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
				'default'     => 1,
			)
		);
		$this->add_control(
			'space_between_posts',
			array(
				'label'       => esc_html__( 'Space beteen posts', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Space between Two Posts', 'radiantthemes-addons' ),
				'condition'   => array(
					'testimonial_allow_carousel' => 'true',
				),
				'default'     => 30,
			)
		);

		$this->add_control(
			'testimonial_no_row_items',
			array(
				'label'       => esc_html__( 'Number of Row Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
				'condition'   => array(
					'testimonial_allow_carousel' => 'false',
				),
				'default'     => 2,
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_general',
			array(
				'label' => esc_html__( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'testimonial_color',
			array(
				'label'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .testimonial.element-one .testimonial-item > .holder > .testimonial-pic > .testimonial-pic-holder > .testimonial-pic-icon,
					.testimonial[class*="element-"].owl-nav-style-two .owl-nav > .owl-prev,
					.testimonial[class*="element-"].owl-nav-style-two .owl-nav > .owl-next,
					.testimonial[class*="element-"].owl-dot-style-one .owl-dots > .owl-dot.active > span,
					.testimonial[class*="element-"].owl-dot-style-two .owl-dots > .owl-dot > span' => 'background-color: {{VALUE}}',

					'{{WRAPPER}} .testimonial.element-seven .testimonial-item > .holder > .testimonial-main > .testimonial-title .title' => 'color: {{VALUE}}',

					'{{WRAPPER}} .testimonial.element-seven .testimonial-item > .holder:hover' => 'border-top-color: {{VALUE}}',

					'{{WRAPPER}} .testimonial-style6 .author p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-ten .quote_area .midd' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-five .testimonial-title .fa-star' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-eleven .fa-star' => 'color: {{VALUE}}',
					'{{WRAPPER}} .testimonial[class*="element-twelve"].owl-dot-style-two .owl-dots > .owl-dot.active' => 'border: 1px solid  {{VALUE}} !important',
					'{{WRAPPER}} .testimonial[class*="element-twelve"].owl-dot-style-two .owl-dots > .owl-dot.active span' => 'background:  {{VALUE}} !important',
					'{{WRAPPER}} .testimonial[class*="element-twelve"].owl-dot-style-two .owl-dots > .owl-dot > span' => 'background-color:  {{VALUE}} !important',

				),
				'default'   => '#000000',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_content',
			array(
				'label' => esc_html__( 'Content', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Content Typography', 'radiantthemes-addons' ),
				'name'     => 'content_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' =>
				'{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-data blockquote p,  .testimonial-style6 .description,
				 .element-ten .testimonial-content, .testimonial.element-eight .description , .element-eleven .testimonial-content , .element-twelve .testimonial-item p',

			)
		);

		$this->add_control(
			'testimonial_content_color',
			array(
				'label'     => esc_html__( 'Content Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-data blockquote p' => 'color: {{VALUE}}',

					'{{WRAPPER}} .testimonial-style6 .description' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-ten .testimonial-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .testimonial.element-eight .description' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-eleven .testimonial-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-twelve .testimonial-item p' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_title',
			array(
				'label' => esc_html__( 'Name', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Name Typography', 'radiantthemes-addons' ),
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' =>
				'{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-title .title,  .testimonial-style6 .author h5,
				 .element-ten .testimonial-name, .testimonial.element-eight .author h5 , .element-eleven .testimonial-name , .element-twelve .testimonial-name',

			)
		);

		$this->add_control(
			'testimonial_title_color',
			array(
				'label'     => esc_html__( 'Name Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-title .title' => 'color: {{VALUE}}',

					'{{WRAPPER}} .testimonial-style6 .author h5' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-ten .testimonial-name' => 'color: {{VALUE}}',
					'{{WRAPPER}} .testimonial.element-eight .author h5' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-eleven .testimonial-name' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-twelve .testimonial-name' => 'color: {{VALUE}}',

				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_title1',
			array(
				'label' => esc_html__( 'Heading', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Heading Typography', 'radiantthemes-addons' ),
				'name'     => 'heading_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' =>
				'{{WRAPPER}} .testimonial.element-eight h4 , .testimonial.element-six h4 , .element-twelve .testimonial-item h2',

			)
		);

		$this->add_control(
			'testimonial_heading_color',
			array(
				'label'     => esc_html__( 'Heading Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial.element-eight h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .testimonial.element-six h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-twelve .testimonial-item h2' => 'color: {{VALUE}}',

				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_designation',
			array(
				'label' => esc_html__( 'Designation', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Designation Typography', 'radiantthemes-addons' ),
				'name'     => 'designation_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' =>
				'{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-title .designation,  .testimonial-style6 .author p,
				 .element-ten .testimonial-job, .testimonial.element-eight .author p , .element-eleven .testimonial-job , .element-twelve .testimonial-job',

			)
		);

		$this->add_control(
			'testimonial_desig_color',
			array(
				'label'     => esc_html__( 'Designation Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial .testimonial-item > .holder > .testimonial-title .designation' => 'color: {{VALUE}}',

					'{{WRAPPER}} .testimonial-style6 .author p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-ten .testimonial-job' => 'color: {{VALUE}}',
					'{{WRAPPER}} .testimonial.element-eight .author p' => 'color: {{VALUE}}',
					'{{WRAPPER}}  .element-eleven .testimonial-job' => 'color: {{VALUE}}',
					'{{WRAPPER}}  .element-twelve .testimonial-job' => 'color: {{VALUE}}',

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

		$dot_style = $settings['allow_dots'] ? 'owl-dot-style-' . esc_attr( $settings['navigation_dot_style'] ) : '';

		$testimonial_id   = ( 'eight' === $settings['testimonial_style'] ) ? ' id="testimonial-slider-eight"' : '';
		$testimonial_nine = ( 'nine' === $settings['testimonial_style'] ) ? 'testimonial rt-testimonial' : ' testimonial';

		if ( 'false' === $settings['testimonial_allow_carousel'] ) {

			$output = '<div class="element-' . esc_attr( $settings['testimonial_style'] ) . ' ' . $testimonial_nine . '"  data-row-items="' . esc_attr( $settings['testimonial_no_row_items'] ) . '">';

		} elseif ( 'true' === $settings['testimonial_allow_carousel'] ) {
			// $testimonial_nine = ( 'nine' === $settings['testimonial_style'] ) ? ' testimonial rt-testimonial owl-carousel' : ' testimonial owl-carousel';
			// $center = ( 'nine' === $settings['testimonial_style'] ) ? ' data-owl-center="true"' : ' data-owl-center="false"';

			$output  = '';
			$output .= '<div class="testimonial rt-testimonial element-' . $settings['testimonial_style'] . ' swiper-container "';

			$output .= ' data-mobile-items="';
			$output .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output .= $settings['posts_in_desktop'] . '" data-spacer="';
			$output .= $settings['space_between_posts'] . '">';
			$output .= '<div class="swiper-wrapper">';

		} else {
			$output = '';
		}

		if ( 'all' === $settings['testimonial_category'] ) {
			$testimonial_category = '';
		} else {
			$testimonial_category = array(
				array(
					'taxonomy' => 'testimonial-category',
					'field'    => 'slug',
					'terms'    => esc_attr( $settings['testimonial_category'] ),
				),
			);
		}

		if ( empty( $settings['max_posts'] ) ) {
			$settings['max_posts'] = -1;
		}

		$query = new \WP_Query(
			array(
				'post_type'      => 'testimonial',
				'posts_per_page' => $settings['max_posts'],
				'order'          => $settings['order'],
				'orderby'        => $settings['order_by'],
				'tax_query'      => $testimonial_category,
			)
		);

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				require 'template/template-testimonial-element-' . $settings['testimonial_style'] . '.php';

			}
			wp_reset_postdata();
		} else {
			echo '<p>No items found</p>';
		}
		$output .= '</div>';
		if ( 'true' === $settings['allow_dots'] ) {
			$output .= '<div class="swiper-pagination"></div>';
		}

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
