<?php
namespace RadiantthemesAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * @since 1.1.0
 */
class Radiantthemes_Style_Client extends Widget_Base {

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
		return 'radiant-client';
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
		return __( 'Client', 'radiantthemes-addons' );
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
		return 'eicon-flow';
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
			'radiantthemes-client',
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
	function rt_get_categories( $category ) {
		$categories = get_categories(
			array(
				'taxonomy' => $category,
			)
		);

		$array = array(
			'' => esc_html__( 'All', 'radiantthemes-addons' ),
		);

		foreach ( $categories as $cat ) {
			if ( is_object( $cat ) ) {
				$array[ $cat->slug ] = $cat->name;
			}
		}

		return $array;
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'clients_style',
			array(
				'label'       => esc_html__( 'Clients Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One (Simple)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Boxed Colored)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (Boxed Alternative Colored)', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four (Boxed Bordered)', 'radiantthemes-addons' ),

				),
				'default'     => 'one',
			)
		);
		$this->add_control(
			'clients_category',
			array(
				'label'       => __( 'Clients Category', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Display posts from a specific category (enter clients category slug name). Use "all" to dislay all posts. ', 'radiantthemes-addons' ),
				'default'     => 'all',

			)
		);

		$this->add_control(
			'clients_allow_carousel',
			array(
				'label'       => esc_html__( 'Carousel', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),

				),
				'default'     => 'false',
			)
		);

		$this->add_control(
			'allow_nav',
			array(
				'label'     => esc_html__( 'Allow Navigation?', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default'   => 'true',
				'condition' => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'navigation_style',
			array(
				'label'       => esc_html__( 'Navigation Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Style Two', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
				'condition'   => array(
					'allow_nav' => 'true',
				),
			)
		);

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
					'clients_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'navigation_dot_style',
			array(
				'label'       => esc_html__( 'Navigation Dot Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Style Two', 'radiantthemes-addons' ),
				),
				'default'     => 'two',
				'condition'   => array(
					'allow_dots' => 'true',
				),
			)
		);

		$this->add_control(
			'allow_loop',
			array(
				'label'       => esc_html__( 'Allow Loop?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
				),
				'default'     => 'two',
				'condition'   => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'allow_autoplay',
			array(
				'label'     => __( 'Allow Autoplay?', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
				),
				'default'   => 'true',
				'condition' => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'autoplay_timeout',
			array(
				'label'     => __( 'Autoplay Timeout (in millisecond)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::TEXT,

				'default'   => '6000',
				'condition' => array(
					'allow_autoplay' => 'true',
				),
			)
		);
		$this->add_control(
			'order',
			array(
				'label'   => __( 'Order', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				),
				'default' => 'DESC',

			)
		);
		$this->add_control(
			'order_by',
			array(
				'label'   => __( 'Order By', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'date'     => esc_html__( 'Date', 'radiantthemes-addons' ),
					'title'    => esc_html__( 'Title', 'radiantthemes-addons' ),
					'id'       => esc_html__( 'ID', 'radiantthemes-addons' ),
					'rand'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'modified' => esc_html__( 'Last Modified', 'radiantthemes-addons' ),

				),
				'default' => 'date',

			)
		);
		$this->add_control(
			'max_posts',
			array(
				'label'       => __( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
				'default'     => '-1',
				'condition'   => array(
					'allow_autoplay' => 'true',
				),
			)
		);
		$this->add_control(
			'posts_in_desktop',
			array(
				'label'       => __( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Posts on Desktop (in single row)', 'radiantthemes-addons' ),
				'default'     => '5',
				'condition'   => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'posts_in_tab',
			array(
				'label'       => __( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Posts on Tab (in single row)', 'radiantthemes-addons' ),
				'default'     => '5',
				'condition'   => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'posts_in_mobile',
			array(
				'label'       => __( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Posts on Mobile (in single row)', 'radiantthemes-addons' ),
				'default'     => '1',
				'condition'   => array(
					'clients_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'space_between_posts',
			array(
				'label'       => esc_html__( 'Space beteen posts', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Space between Two Posts', 'radiantthemes-addons' ),
				'condition'   => array(
					'clients_allow_carousel' => 'true',
				),
				'default'     => 30,
			)
		);
		$this->add_control(
			'clients_no_row_items',
			array(
				'label'       => __( 'Number of Row Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
				'default'     => '2',
				'condition'   => array(
					'clients_allow_carousel' => 'false',
				),
			)
		);

		$this->add_control(
			'clients_allow_keep_link',
			array(
				'label'   => __( 'Keep Link', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),

				),
				'default' => 'true',

			)
		);
		$this->add_control(
			'extra_class',
			array(
				'label'       => __( 'Extra class name for the container', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),

			)
		);
		$this->add_control(
			'extra_id',
			array(
				'label'       => __( 'Element ID', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ),

			)
		);
		$this->add_control(
			'client_hover_color',
			array(
				'label'     => esc_html__( 'Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .clients.element-five .client-item .client-hover-logo .client-hover-bg-overlay' => 'background: {{VALUE}}',

				),
				'condition' => array(
					'clients_style' => 'five',
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

		$this->add_inline_editing_attributes( 'title', 'none' );

		$custom_css = '';

			$navigation_style = $settings['allow_nav'] ? 'owl-nav-style-' . esc_attr( $settings['navigation_style'] ) : '';
			$dot_style        = $settings['allow_dots'] ? 'owl-dot-style-' . esc_attr( $settings['navigation_dot_style'] ) : '';

			$clients_id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';

		if ( 'false' === $settings['clients_allow_carousel'] ) {

			$output = '<div class="clients element-' . esc_attr( $settings['clients_style'] ) . ' ' . esc_attr( $settings['extra_class'] ) . '" ' . $clients_id . ' data-row-items="' . esc_attr( $settings['clients_no_row_items'] ) . '">';

		} elseif ( 'true' === $settings['clients_allow_carousel'] ) {

			$output   = '<div class="clients swiper-container element-' . esc_attr( $settings['clients_style'] ) . '"';
			 $output .= ' data-mobile-items="';
			$output  .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output  .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output  .= $settings['posts_in_desktop'] . '" data-spacer="' . $settings['space_between_posts'] . '">';
			$output  .= '<div class="swiper-wrapper">';
		} else {
			$output = '';
		}

		if ( empty( $settings['max_posts'] ) ) {
			$settings['max_posts'] = -1;
		}

		if ( 'all' == $settings['clients_category'] || '' == $settings['clients_category'] ) {
			$clients_category = '';
		} else {
			$clients_category = array(
				array(
					'taxonomy' => 'client-category',
					'field'    => 'slug',
					'terms'    => esc_attr( $settings['clients_category'] ),
				),
			);
		}

		$query = new \WP_Query(
			array(
				'post_type'      => 'client',
				'posts_per_page' => $settings['max_posts'],
				'order'          => $settings['order'],
				'orderby'        => $settings['order_by'],
				'tax_query'      => $clients_category,

			)
		);
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				if ( ! has_post_thumbnail() ) {
					$output .= '<div class="clients-item no-image swiper-slide">';
				} else {
					if ( 'five' === $settings['clients_style'] ) {

						$output      .= '<div class="client-item swiper-slide" >';
						$output      .= '<div class="client-image">';
						$output      .= '<div class="client-logo">';
						$output      .= get_the_post_thumbnail( get_the_ID(), array( 260, 55 ), array( 'class' => 'client-cover-img' ) );
						$output      .= '</div>';
						$output      .= '<div class="client-hover-logo">';
						$output      .= '<div class="client-hover-bg-overlay client-bg-overlay-up"></div>';
						$alt_image_id = get_post_meta( get_the_ID(), 'client_alt_img_link', true );
						$output      .= wp_get_attachment_image( $alt_image_id, array( 260, 55 ), '', array( 'class' => 'client-alt-img' ) );
						$output      .= '<div class="client-hover-bg-overlay client-bg-overlay-down"></div>';
						$output      .= '</div>';
						$output      .= '</div>';
						$output      .= '</div>';
						// $output .= '</div>';
					} else {
						$output .= '<div class="clients-item swiper-slide">';
						$output .= '<div class="holder">';
						$output .= '<div class="table">';
						$output .= '<div class="table-cell">';
						$output .= '<div class="pic radiantthemes-retina">';
						if ( 'true' === $settings['clients_allow_keep_link'] && get_post_meta( get_the_ID(), 'clientlink', true ) ) {
							$output .= '<a href="' . get_post_meta( get_the_ID(), 'clientlink', true ) . '">';
						}
						$output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '" class="client-cover-img wp-post-image" alt="client-logo" loading="lazy">';
						if ( 'true' === $settings['clients_allow_keep_link'] && get_post_meta( get_the_ID(), 'clientlink', true ) ) {
							$output .= '</a>';
						}
						if ( 'three' === $settings['clients_style'] ) {
							$alt_image_id = get_post_meta( get_the_ID(), 'client_alt_img_link', true );
							if ( $alt_image_id ) {
								$output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '" class="client-alt-img wp-post-image" alt="client-logo" loading="lazy">';
							}
						}
						$output .= '</div>';
						$output .= '</div>';
						$output .= '</div>';
						$output .= '</div>';
					}
				}

					// START OF LAYOUT ONE.

				if ( 'five' != $settings['clients_style'] ) {
					$output .= '</div>';
				} else {

				}
			}
			wp_reset_postdata();
		} else {
			echo '<p>No items found</p>';
		}
		if ( 'false' == $settings['clients_allow_carousel'] ) {
				$output .= '</div>';
		} elseif ( 'true' == $settings['clients_allow_carousel'] ) {
			$output .= '</div>';
			$output .= '<div class="swiper-pagination3"></div>';
			$output .= '</div>';
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
