<?php
/**
 * Slider Template Style One
 *
 * @package Radiantthemes
 */

$output .= '<div class="container">';
$output .= '<div class="row">';
$output .= '<div id="app-slider" class="rt-slider element-one owl-carousel owl-theme" data-owl-autoplay="' . esc_attr( $rt_slider_allow_autoplay ) . '" data-owl-autoplay-timeout="' . esc_attr( $settings['rt_slider_autoplay_timeout'] ) . '" data-owl-nav="' . esc_attr( $rt_slider_allow_nav ) . '" data-owl-dots="' . esc_attr( $rt_slider_allow_dots ) . '" data-owl-loop="' . esc_attr( $rt_slider_allow_loop ) . '" data-owl-mobile-items="' . esc_attr( $settings['rt_slider_in_mobile'] ) . '" data-owl-tab-items="' . esc_attr( $settings['rt_slider_in_tab'] ) . '" data-owl-desktop-items="' . esc_attr( $settings['rt_slider_in_desktop'] ) . '">';
foreach ( $settings['rt_slider_links'] as $image ) {
	$output .= '<div class="app-slider-item">';
	$output .= '<div class="pic">';
	$output .= '<img src="' . $image['url'] . '" alt="image-gallery">';
	$output .= '</div>';
	$output .= '</div>';
}
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
