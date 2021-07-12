<?php
/**
 * START OF LAYOUT SIX.
 *
 * @package Radiantthemes
 */
 
 if ( 'true' === $settings['testimonial_allow_carousel'] ) {
if ( ! has_post_thumbnail() ) {
						$output .= '<div data-thumb="<img src=\'' . plugins_url( 'radiantthemes-addons/assets/images/No-Thumbnail.jpg' ) . '\' alt=\'Thumbnail Image\'>" class="testimonial-item no-image swiper-slide">';
					} else {
						$output .= '<div data-thumb="<img src=\'' . esc_attr( get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ) . '\' alt=\'Thumbnail Image\'>" class="testimonial-item swiper-slide">';
					}
}
else{
 
if ( ! has_post_thumbnail() ) {
						$output .= '<div data-thumb="<img src=\'' . plugins_url( 'radiantthemes-addons/assets/images/No-Thumbnail.jpg' ) . '\' alt=\'Thumbnail Image\'>" class="testimonial-item no-image">';
					} else {
						$output .= '<div data-thumb="<img src=\'' . esc_attr( get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ) . '\' alt=\'Thumbnail Image\'>" class="testimonial-item">';
					}
}
$output .= '<div class="holder" style="background-color:' . esc_attr( get_post_meta( get_the_ID(), 'background_color', true ) ) . '">';
$output .= '<h4>' . esc_attr( get_the_title() ) . '</h4>';
$output .= '<div class="testimonial-data">';
$output .= '<blockquote>';
$output .= '<p>"' . esc_attr( get_the_content() ) . '"</p>';
$output .= '</blockquote>';
$output .= '</div>';
$output .= '<div class="testimonial-title">';
$output .= '<div class="testimonial-title-pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID() ) . ');"></div>';
$output .= '<div class="testimonial-title-data">';
$output .= '<h5 class="title">' . esc_attr( get_post_meta( get_the_ID(), 'client_name', true ) ) . '</h5>';
$output .= '<p class="designation">' . esc_attr( get_post_meta( get_the_ID(), '_testimonial_designation', true ) ) . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';