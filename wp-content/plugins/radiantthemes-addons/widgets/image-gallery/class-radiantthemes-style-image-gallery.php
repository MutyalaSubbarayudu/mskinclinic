<?php
/**
 * Image Gallery Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;
use Elementor\Repeater;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Image Gallery widget.
 *
 * Elementor widget that displays Image Gallery.
 *
 * @since 1.0.0
 */
class RadiantThemes_Style_Image_Gallery extends Widget_Base {

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
		return 'radiant-image-gallery';
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
		return esc_html__( 'Image Gallery', 'radiantthemes-addons' );
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
		return 'eicon-gallery-group';
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
		    
			'radiant-image-gallery',
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
				'label' => esc_html__( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image_gallery_style_variation',
			[
				'label'   => esc_html__( 'Image Gallery Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'one'   => esc_html__( 'Style One (Large Image With Thumbnail)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Image Grid - Large)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (Image Grid - Small)', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four (Masonry)', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'  => esc_html__( 'Style Six', 'radiantthemes-addons' ),
					'seven'  => esc_html__( 'Style Seven', 'radiantthemes-addons' ),
				],
				'default' => 'one',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'info_section',
			[
				'label' => esc_html__( 'Info', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image_gallery_url',
			[
				'label'   => esc_html__( 'Add Images', 'plugin-domain' ),
				'type'    => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->add_control(
			'item_small_gallery',
			[
				'label'       => esc_html__( 'Number of Items in small gallery', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 4,
				'label_block' => true,
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

		$output = '';

		if ( 'five' !== $settings['image_gallery_style_variation']  && 'six' !== $settings['image_gallery_style_variation'] && 'seven' !== $settings['image_gallery_style_variation']) {
			$output .= '<div class="rt-image-gallery element-' . $settings['image_gallery_style_variation'] . '" data-thumbnail-items="' . $settings['item_small_gallery'] . '">';

			if ( 'one' === $settings['image_gallery_style_variation'] ) {
				// START OF LAYOUT ONE.
				$output .= '<ul class="rt-image-gallery-holder owl-carousel">';
				foreach ( $settings['image_gallery_url'] as $image ) {
					$output .= '<li><img src="' . $image['url'] . '" alt="image-gallery"></li>';
				}
				$output .= '</ul>';
			} elseif ( 'two' === $settings['image_gallery_style_variation'] ) {
				// START OF LAYOUT TWO.
				$output .= '<ul class="rt-image-gallery-holder row">';
				foreach ( $settings['image_gallery_url'] as $image ) {
					$images_thumbnail = wp_get_attachment_image_src( $image, 'thumbnail' );
					$images_medium    = wp_get_attachment_image_src( $image, 'medium' );
					$images_large     = wp_get_attachment_image_src( $image, 'large' );
					$images_full      = wp_get_attachment_image_src( $image, 'full' );
					$output          .= '<li class="rt-image-gallery-item col-lg-4 col-md-4 col-sm-4 col-xs-4">';
						$output      .= '<div class="holder">';
							$output  .= '<a class="pic" data-fancybox="image-gallery" href="' . $image['url'] . '" style="background-image:url(' . $image['url'] . ');"></a>';
						$output      .= '</div>';
					$output          .= '</li>';
				}
				$output .= '</ul>';
			} elseif ( 'three' === $settings['image_gallery_style_variation'] ) {
				// START OF LAYOUT THREE.
				$output .= '<ul class="rt-image-gallery-holder row">';
				foreach ( $settings['image_gallery_url'] as $image ) {
					$images_thumbnail = wp_get_attachment_image_src( $image['id'], 'thumbnail' );
					$images_medium    = wp_get_attachment_image_src( $image['id'], 'medium' );
					$images_large     = wp_get_attachment_image_src( $image['id'], 'large' );
					$images_full      = wp_get_attachment_image_src( $image['id'], 'full' );
					$output          .= '<li class="rt-image-gallery-item col-lg-4 col-md-4 col-sm-4 col-xs-4">';
						$output      .= '<div class="holder">';
							$output  .= '<a class="pic" data-fancybox="image-gallery" href="' . $images_full[0] . '" style="background-image:url(' . $images_thumbnail[0] . ');"></a>';
						$output      .= '</div>';
					$output          .= '</li>';
				}
				$output .= '</ul>';
			} elseif ( 'four' === $settings['image_gallery_style_variation'] ) {
				// START OF LAYOUT FOUR.
				$output .= '<ul class="rt-image-gallery-holder row isotope">';
				$j       = 1;
				$k       = 1;

				foreach ( $settings['image_gallery_url'] as $image ) {
					if ( 2 === $j ) {
						$k = 0;

							$images_thumbnail = wp_get_attachment_image_src( $image, 'thumbnail' );
							$images_medium    = wp_get_attachment_image_src( $image, 'medium' );
							$images_large     = wp_get_attachment_image_src( $image, 'large' );
							$images_full      = wp_get_attachment_image_src( $image, 'full' );

							// SECOND LAYOUT.
							$output                 .= '<li class="rt-image-gallery-item col-lg-6 col-md-6 col-sm-6 col-xs-12">';
								$output             .= '<div class="holder">';
									$output         .= '<div class="pic">';
										$output     .= '<img src="' . $image['url'] . '">';
									$output         .= '</div>';
									$output         .= '<div class="overlay"></div>';
									$output         .= '<div class="data">';
										$output     .= '<div class="table">';
											$output .= '<div class="table-cell">';
						if ( '' !== get_the_title( $image ) ) {
							$output .= '<h4 class="title">' . get_the_title( $image ) . '</h4>';
						}
						if ( '' !== wp_get_attachment_caption( $image ) ) {
							$output .= '<h5 class="description">' . wp_get_attachment_caption( $image ) . '</h5>';
						}
											$output .= '</div>';
										$output     .= '</div>';
									$output         .= '</div>';
									$output         .= '</div>';
									$output         .= '</li>';

					} elseif ( ! ( $k % 5 ) ) {

							$images_thumbnail = wp_get_attachment_image_src( $image, 'thumbnail' );
							$images_medium    = wp_get_attachment_image_src( $image, 'medium' );
							$images_large     = wp_get_attachment_image_src( $image, 'large' );
							$images_full      = wp_get_attachment_image_src( $image, 'full' );

							// SECOND LAYOUT.
							$output                 .= '<li class="rt-image-gallery-item col-lg-6 col-md-6 col-sm-6 col-xs-12">';
								$output             .= '<div class="holder">';
									$output         .= '<div class="pic">';
										$output     .= '<img src="' . $image['url'] . '">';
									$output         .= '</div>';
									$output         .= '<div class="overlay"></div>';
									$output         .= '<div class="data">';
										$output     .= '<div class="table">';
											$output .= '<div class="table-cell">';
						if ( '' !== get_the_title( $image ) ) {
							$output .= '<h4 class="title">' . get_the_title( $image ) . '</h4>';
						}
						if ( '' !== wp_get_attachment_caption( $image ) ) {
							$output .= '<h5 class="description">' . wp_get_attachment_caption( $image ) . '</h5>';
						}
											$output .= '</div>';
										$output     .= '</div>';
									$output         .= '</div>';
									$output         .= '</div>';
									$output         .= '</li>';

					} else {

							$images_thumbnail = wp_get_attachment_image_src( $image, 'thumbnail' );
							$images_medium    = wp_get_attachment_image_src( $image, 'medium' );
							$images_large     = wp_get_attachment_image_src( $image, 'large' );
							$images_full      = wp_get_attachment_image_src( $image, 'full' );

							// FIRST LAYOUT.
							$output                 .= '<li class="rt-image-gallery-item col-lg-3 col-md-3 col-sm-3 col-xs-12">';
								$output             .= '<div class="holder">';
									$output         .= '<div class="pic">';
										$output     .= '<img src="' . $image['url'] . '">';
									$output         .= '</div>';
									$output         .= '<div class="overlay"></div>';
									$output         .= '<div class="data">';
										$output     .= '<div class="table">';
											$output .= '<div class="table-cell">';
						if ( '' !== get_the_title( $image ) ) {
							$output .= '<h4 class="title">' . get_the_title( $image ) . '</h4>';
						}
						if ( '' !== wp_get_attachment_caption( $image ) ) {
							$output .= '<h5 class="description">' . wp_get_attachment_caption( $image ) . '</h5>';
						}
											$output .= '</div>';
										$output     .= '</div>';
									$output         .= '</div>';
									$output         .= '</div>';
									$output         .= '</li>';

					}
					$k++;
					$j++;
				}

				$output .= '</ul>';
			}

			$output .= '</div>';
		} elseif ('five' === $settings['image_gallery_style_variation']) {
			$output .= '<div class="container gallery-container">';
			$output .= '<div class="tz-gallery">';
			$output .= '<div class="row">';
			$counter = 0;
			foreach ( $settings['image_gallery_url'] as $image ) {
				$counter++;

				if ( ( 1 === $counter ) || ( $counter > 3 && ( $counter % 3 ) === 1 ) ) {
					$class_one = 'col-sm-12';
				} else {
					$class_one = 'col-sm-6';
				}

				if ( ( 4 === $counter ) || ( $counter > 6 && ( $counter % 6 ) === 4 ) ) {
					$class_two = 'col-md-8';
				} else {
					$class_two = 'col-md-4';
				}

				$output .= '<div class="' . $class_one . ' ' . $class_two . '">';
				$output .= '<a class="lightbox" href="' . $image['url'] . '">';
				$output .= '<img src="' . $image['url'] . '" alt="image-gallery">';
				$output .= '</a>';
				$output .= '</div>';
			}
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';

		}
		if ('six' === $settings['image_gallery_style_variation'])
		{
			$output .='<div class="radiantthemes element-six">';
            $output .='<div class="rt_imggrid">';
			
			foreach ( $settings['image_gallery_url'] as $image ) {
			$output .='<div class="col-md-4">';
                    $output .='<a href="' . $image['url'] . '" data-fancybox="images">';
                        $output .='<img src="' . $image['url'] . '" />';
                        $output .='<div class="rt_lightpop_overlay">';
                            $output .='<div class="rt_gal_pop_overlay"><i class="fa fa-search" aria-hidden="true"></i></div>';
                        $output .='</div>';
                    $output .='</a>';
                $output .='</div>';
			}
			
			$output .='</div>';
			$output .='</div>';
			
		}
		if ('seven' === $settings['image_gallery_style_variation'])
		{
			
		$output .='<div class="rt-image-gallery element-seven swiper-container" data-mobile-items="'.$settings['posts_in_mobile'] . '" data-tab-items="'.$settings['posts_in_tab'] . '" data-desktop-items="'.$settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
		//$output .='<div class="typo swiper-wrapper">';
		
        
        $output .='<ul class="swiper-wrapper">';
		//$output .=' <div class=" image-gallery-bx">';
		foreach ( $settings['image_gallery_url'] as $image ) {
		$output .='<li class="swiper-slide">';
		$output .='<div class="holder">';
		$output .=' <a ><img src="' . $image['url'] . '" class="img_fluid" alt="Image Gallery"></a>';

		$output .='</div>';
		$output .='</li>';
		}


		//$output .='</div>';
		
		$output .='</ul>';
		$output .='</div>';	
		
			
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
