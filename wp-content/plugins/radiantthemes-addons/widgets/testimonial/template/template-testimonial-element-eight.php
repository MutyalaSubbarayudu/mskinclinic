<?php
/**
 * Testimonial Template Style Eight
 *
 * @package Radiantthemes
 */

// START OF LAYOUT EIGHT.
if ( 'true' === $settings['testimonial_allow_carousel'] ) {
$output .= '<div class="testimonial element-eight swiper-slide">';
} else {
$output .= '<div class="testimonial element-eight">';
}
$output .= '<h4>' . esc_attr( get_the_title() ) . '</h4>';
$output .= '<div class="quote"><i class="fa-quote-right" aria-hidden="true" style="color:' . esc_attr( get_post_meta( get_the_ID(), 'quote_color', true ) ) . '"></i>
</div>';
$output .= '<div class="description">' . esc_attr( get_the_content() ) . '<div class="arrow"></div></div>';
$output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID() ) . '" alt="" />';
$output .= '<div class="author">';
$output .= '<h5>' . esc_attr( get_post_meta( get_the_ID(), 'client_name', true ) ) . '</h5>';
$output .= '<p>' . esc_attr( get_post_meta( get_the_ID(), '_testimonial_designation', true ) ) . '</p>';

$output .= '</div>';

$output .= '</div>';
