<?php
/**
 * Template Style Four for Team
 *
 * @package RadiantThemes

 */
  if ( 'true' === $settings['team_allow_carousel'] ) {
  $output .= '<div class="rt-professionals-team swiper-slide ">';
 }else {
  $output .= '<div class="rt-professionals-team">';
 }
  $output .= '<div class="rt-professionals">';
                    $output .= '<img src="'. get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '" alt="' . get_the_title() . '">';
                   $output .= ' <div class="box-content">';
                       $output .= ' <p>' . esc_attr( get_the_excerpt() ) . '</p>';
						if ( 'true' === $settings['team_enable_link'] ) {
                       $output .= ' <a href="' . get_the_permalink() . '" class="view_btn view_btn-simple">'.$settings['team_button_text'].'</a>';
						}
                   $output .= ' </div>';

                
               
 $output .= '</div>';
 $output .= ' <h4>' . get_the_title() . '</h4>';
				$terms   = get_the_terms( get_the_ID(), 'profession' );
				if ( ! empty( $terms ) ) {
				         foreach ( $terms as $term ) {
                $output .= '<h6>' . $term->name . '</h6>';
						 }
				}
 $output .= '</div>';
 
 
 