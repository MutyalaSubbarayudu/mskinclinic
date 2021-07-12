<?php
/**
 * Testimonial Template Style Eleven
 *
 * @package Radiantthemes
 */

if ( 'true' === $settings['testimonial_allow_carousel'] ) {
	$output .= '<div class="testimonial-item swiper-slide">';
} else {
	$output .= '<div class="testimonial-item ">';
}
$output .= '<div class="rt-testimonial-imgbackground  col-md-3 col-sm-3 col-xs-12">';
$output .= '<div class="rt_testimonial-image-grid">';
$output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID() ) . '" alt="image">';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="col-md-9 col-sm-9 col-xs-12 rt-content-area">';
$output .= '<div class="testimonial-content  ">' . esc_attr( get_the_content() ) . '</div>';
$output .= '<div class="row testimonial-author-detail">';
$output .= '<div class="col-md-6 col-sm-12 col-xs-12">';
$output .= '<div class="testimonial-name">' . esc_attr( get_the_title() ) . '</div>';
$output .= '<div class="testimonial-job">' . esc_attr( get_post_meta( get_the_ID(), '_testimonial_designation', true ) ) . '</div>';
$output .= '</div>';
$output .= '<div class="col-md-6 col-sm-12 col-xs-12 star-rating">';
if ( get_post_meta( get_the_ID(), 'star_rating', true ) === '5Star' ) {
	$output .= '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
} elseif ( get_post_meta( get_the_ID(), 'star_rating', true ) === '4Star' ) {
	$output .= '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
} elseif ( get_post_meta( get_the_ID(), 'star_rating', true ) === '3Star' ) {
	$output .= '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
} elseif ( get_post_meta( get_the_ID(), 'star_rating', true ) === '2Star' ) {
	$output .= '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
} elseif ( get_post_meta( get_the_ID(), 'star_rating', true ) === '1Star' ) {
	$output .= '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
}
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
