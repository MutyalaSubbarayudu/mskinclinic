<?php
// START OF LAYOUT FIVE.
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
$output             .= '<div class="holder">';
	$output         .= '<div class="testimonial-data">';
		$output     .= '<blockquote>';
			$output .= '<p>"' . esc_attr( get_the_content() ) . '"</p>';
		$output     .= '</blockquote>';
	$output         .= '</div>';
	$output         .= '<div class="testimonial-title">';
	  $output         .= '<div class="row">';

      $output         .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
		$output     .= '<h4 class="title">' . esc_attr( get_the_title() ) . '</h4>';
		
		$output         .= '</div>';
		$output         .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
		if (get_post_meta( get_the_ID(), 'star_rating', true )=='5Star')
		{
$output     .= '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
		}
		elseif (get_post_meta( get_the_ID(), 'star_rating', true )=='4Star')
		{
			$output     .= '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
		}
		elseif (get_post_meta( get_the_ID(), 'star_rating', true )=='3Star')
		{
		$output     .= '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';	
		}
		elseif (get_post_meta( get_the_ID(), 'star_rating', true )=='2Star')
		{
			$output     .= '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
		}
		elseif (get_post_meta( get_the_ID(), 'star_rating', true )=='1Star')
		{
			$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
		}
		$output         .= '</div>';
        $output         .= '</div>';
	$output         .= '</div>';
$output             .= '</div>';
$output .= '</div>';
