<?php
/**
 * Custom Logo
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
 * Elementor Blog widget.
 *
 * Elementor widget that displays posts in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_style_Custom_Logo extends Widget_Base {

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
		return 'radiant-custom-logo';
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
		return esc_html__( 'Custom Logo', 'radiantthemes-addons' );
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
		return 'eicon-site-logo';
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
			'section_content',
			array(
				'label' => esc_html__( 'Custom Logo', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'logo_image',
			array(
				'label'       => esc_html__( 'Default Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,

			)
		);
		$this->add_control(
			'logo_image_retina',
			array(
				'label'       => esc_html__( 'Default Retina Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'For retina logo to work the name of the retina logo must be the normal logo name@2x.For eg. if the normal logo is my_image.png then the retina logo name should be my_image@2x.png. Also both images must be in the same location.', 'radiantthemes-addons' ),

			)
		);
		$this->add_control(
			'logo_image_floating',
			array(
				'label'       => esc_html__( 'Floating Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,

			)
		);
		$this->add_control(
			'logo_image_floating_retina',
			array(
				'label'       => esc_html__( 'Floating Retina Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'For retina logo to work the name of the retina logo must be the normal logo name@2x.For eg. if the normal logo is my_image.png then the retina logo name should be my_image@2x.png. Also both images must be in the same location.', 'radiantthemes-addons' ),

			)
		);
		$this->add_control(
			'logo_dimension',
			array(
				'label'       => esc_html__( 'Image Dimension', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'radiantthemes-addons' ),
				'default'     => array(
					'width'  => '200',
					'height' => '200',
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
		echo '<div id="logo">';
		echo '<a href="' . esc_url( home_url() ) . '">';
		if ( $settings['logo_image_floating']['url'] != '' ) {
			echo '<span class="logo-default">';
			if ( $settings['logo_dimension']['width'] != '' && $settings['logo_dimension']['height'] != '' ) {
				if ( $settings['logo_image_floating_retina']['url'] ) {
					echo '<img src="' . $settings['logo_image_floating_retina']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '" height="' . $settings['logo_dimension']['height'] . '">';
				} else {
					echo '<img src="' . $settings['logo_image_floating']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '" height="' . $settings['logo_dimension']['height'] . '">';
				}
			} elseif ( $settings['logo_dimension']['width'] != '' ) {
				if ( $settings['logo_image_floating_retina']['url'] ) {
					echo '<img src="' . $settings['logo_image_floating_retina']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '">';
				} else {
					echo '<img src="' . $settings['logo_image_floating']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '">';
				}
			} elseif ( $settings['logo_dimension']['height'] != '' ) {
				if ( $settings['logo_image_floating_retina']['url'] ) {
					echo '<img src="' . $settings['logo_image_floating_retina']['url'] . '" alt="logo"  height="' . $settings['logo_dimension']['height'] . '">';
				} else {
					echo '<img src="' . $settings['logo_image_floating']['url'] . '" alt="logo"  height="' . $settings['logo_dimension']['height'] . '">';
				}
			} elseif ( $settings['logo_dimension']['width'] == '' && $settings['logo_dimension']['height'] == '' ) {
				echo '<img src="' . $settings['logo_image_floating']['url'] . '" alt="logo">';
			} else {
				echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
			}
			echo '</span>';
		} else {
			if ( $settings['logo_image']['url'] != '' ) {
				echo '<span class="logo-default">';
				if ( $settings['logo_dimension']['width'] != '' && $settings['logo_dimension']['height'] != '' ) {
					if ( $settings['logo_image_retina']['url'] != '' ) {
						echo '<img src="' . $settings['logo_image_retina']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '" height="' . $settings['logo_dimension']['height'] . '">';
					} else {
						echo '<img src="' . $settings['logo_image']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '" height="' . $settings['logo_dimension']['height'] . '">';
					}
				} elseif ( $settings['logo_dimension']['width'] != '' ) {
					if ( $settings['logo_image_retina']['url'] != '' ) {
						echo '<img src="' . $settings['logo_image_retina']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '">';
					} else {
						echo '<img src="' . $settings['logo_image']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '">';
					}
				} elseif ( $settings['logo_dimension']['height'] != '' ) {
					if ( $settings['logo_image_retina']['url'] != '' ) {
						echo '<img src="' . $settings['logo_image_retina']['url'] . '" alt="logo"  height="' . $settings['logo_dimension']['height'] . '">';
					} else {
						echo '<img src="' . $settings['logo_image']['url'] . '" alt="logo"  height="' . $settings['logo_dimension']['height'] . '">';
					}
				} elseif ( $settings['logo_dimension']['width'] == '' && $settings['logo_dimension']['height'] == '' ) {
					echo '<img src="' . $settings['logo_image']['url'] . '" alt="logo">';
				} else {
					echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
				}
				echo '</span>';
			}
		}
		if ( $settings['logo_image']['url'] != '' ) {
			echo '<span class="logo-rt-dark">';
			if ( $settings['logo_dimension']['width'] != '' && $settings['logo_dimension']['height'] != '' ) {
				if ( $settings['logo_image_retina']['url'] != '' ) {
					echo '<img src="' . $settings['logo_image_retina']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '" height="' . $settings['logo_dimension']['height'] . '">';
				} else {
					echo '<img src="' . $settings['logo_image']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '" height="' . $settings['logo_dimension']['height'] . '">';
				}
			} elseif ( $settings['logo_dimension']['width'] != '' ) {
				if ( $settings['logo_image_retina']['url'] != '' ) {
					echo '<img src="' . $settings['logo_image_retina']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '">';
				} else {
					echo '<img src="' . $settings['logo_image']['url'] . '" alt="logo" width="' . $settings['logo_dimension']['width'] . '">';
				}
			} elseif ( $settings['logo_dimension']['height'] != '' ) {
				if ( $settings['logo_image_retina']['url'] != '' ) {
					echo '<img src="' . $settings['logo_image_retina']['url'] . '" alt="logo"  height="' . $settings['logo_dimension']['height'] . '">';
				} else {
					echo '<img src="' . $settings['logo_image']['url'] . '" alt="logo"  height="' . $settings['logo_dimension']['height'] . '">';
				}
			} elseif ( $settings['logo_dimension']['width'] == '' && $settings['logo_dimension']['height'] == '' ) {
				echo '<img src="' . $settings['logo_image']['url'] . '" alt="logo">';
			} else {
				echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
			}
			echo '</span>';
		}
		echo '</a>';
		echo '</div>';
	}

	protected function _content_template() {

	}
}
