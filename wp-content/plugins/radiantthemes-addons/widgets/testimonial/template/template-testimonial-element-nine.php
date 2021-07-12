<?php
/**
 * Testimonial Template Style Nine
 *
 * @package Radiantthemes
 */

// START OF LAYOUT Nine.

if ( 'true' === $settings['testimonial_allow_carousel'] ) {
 $output .= '<div class="testi-nine swiper-slide">';
 } else{
$output .= '<div class="testi-nine">';
}
            $output .='<div class="item">';
                $output .='<div class="shadow-effect">';
                    $output .='<div class="quote_slide"><i class="fa fa-quote-left" aria-hidden="true"></i></div>';
                    $output .='<p>'. esc_attr( get_the_content() ) .'</p>';
                    $output .='<div class="testimonial-img">';
                   
                    $output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID() ) . '" alt="img" />';
                    $output .='</div>';
                $output .='</div>';
            $output .='</div>';
            $output .='<div class="testimonial-name">';
  $output .= esc_attr( get_the_title() ) . '</div>';
        $output .='</div>';       
        
