<?php
/**
 * Testimonial Template Style Twelve
 *
 * @package Radiantthemes
 */
if ( 'true' === $settings['testimonial_allow_carousel'] ) {
	$output .= '<div class="testimonial-item swiper-slide">';
} else {
$output .= '<div class="testimonial-item">';
}
               $output .= ' <h2>'.esc_attr( get_the_title() ).'</h2>';
                $output .= '<p>' . esc_attr( get_the_content() ) . '</p>';
                $output .= '<div class="row testimonial-author-detail">';
                    $output .= '<div class="col-md-6 col-sm-12 col-xs-12">';
                       $output .= ' <div class="testimonial-name">' . esc_attr( get_post_meta( get_the_ID(), 'client_name', true ) ) . '</div>';
                        $output .= '<div class="testimonial-job">' . esc_attr( get_post_meta( get_the_ID(), '_testimonial_designation', true ) ) . '</div>';
                    $output .= '</div>';
                    $output .= '<div class="col-md-6 col-sm-12 col-xs-12">';
                        $output .= '<div class="quote-img"><img alt="qoute" src="'. plugins_url( 'radiantthemes-addons/assets/images/qoute.png' ) .'"></div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';


