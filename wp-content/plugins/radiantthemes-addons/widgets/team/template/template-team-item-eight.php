<?php
/**
 * Template Style eight for Team
 *
 * @package RadiantThemes

 */
 if ( 'true' === $settings['team_allow_carousel'] ) {
  $output .= '<article class="team-item swiper-slide ">';
 }else {
 
 $output .= '<article class="team-item ">';
 }
                  $output .= '<div class="holder">';
                    $output .= ' <div class="pic">';
                        $output .= '<img src="'. get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '" alt="' . get_the_title() . '">';
                    $output .= ' </div>';
                     $output .= '<div class="team-content">';
                       $output .= ' <div class="team-content-inner">';
						$terms   = get_the_terms( get_the_ID(), 'profession' );
			             if ( ! empty( $terms ) ) {
				         foreach ( $terms as $term ) {
					     $output .= '<p class="team-role">' . $term->name . '</p>';
				         }
			             }	
                           
                          $output .= ' <h3  class="team-title entry-title">' . get_the_title() . '</h3>'; 
                          $output .= ' <div class="team-member-social-icon-group">';
						  if ( ! empty( get_post_meta( get_the_ID(), '_team_facebook', true ) ) ) {
                              $output .= '<div class="team-member-social-icon">';							  
                                $output .= '<a href="' . get_post_meta( get_the_ID(), '_team_facebook', true ) . '" target="_blank">';
                                   $output .= ' <span class="ti-facebook"></span>';
                                 $output .= '</a>';
                              $output .= '</div>';
						  }
						  if ( ! empty( get_post_meta( get_the_ID(), '_team_twitter', true ) ) ) {
                              $output .= '<div class="team-member-social-icon">';
                                $output .= ' <a href="' . get_post_meta( get_the_ID(), '_team_twitter', true ) . '" target="_blank">';
                                    $output .= '<span class="ti-twitter-alt"></span>';
                                $output .= ' </a>';
                              $output .= '</div>';
						  }
						  if ( ! empty( get_post_meta( get_the_ID(), '_team_pinterest', true ) ) ) {
                             $output .= ' <div class="team-member-social-icon">';
                                $output .= ' <a href="' . get_post_meta( get_the_ID(), '_team_pinterest', true ) . '" target="_blank">';
                                    $output .= '<span class="ti-pinterest-alt"></span>';
                                 $output .= '</a>';
                              $output .= '</div>';
						  }
                              
                           $output .= '</div>';
                        $output .= '</div>';
                     $output .= '</div>';
                     
                  $output .= '</div>';
               $output .= '</article>';
 
 
 
 
 
