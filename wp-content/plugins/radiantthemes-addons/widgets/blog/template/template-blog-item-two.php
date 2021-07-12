<?php
/**
 * Template for Blog Item Two.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output                 .= '<!-- blog-item -->';
	if ( 'yes' === $settings['blog_allow_carousel'] ) {
$output .= '<article class="blog-item swiper-slide">';
} else {
$output                 .= '<article class="blog-item">';
}
	$output             .= '<div class="holder matchHeight">';


		$output   .= '<!--Post-thumbnail -->';
		
              $output   .= '<div class="pic">';
                        $output .='<img src="' . plugins_url( 'radiantthemes-addons/assets/images/No-Image-Found-400x264.png' ) . '" alt="Blank Image" width="400" height="240" data-no-retina="">';
                        $output .= ' <div class="placeholder"  style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) . ');"></div>'; 
                     $output .='</div>';
                  $output .='<!-- Post-thumbnail -->';

                  $output .='<!--Post-Button -->';
                  $output .= '<div class="post-btn">';
                 if($settings['blog_allow_categories']) {   
                   $output .= '<div class="category-list">';
                   $category_link = get_category_link( get_the_category( $query->ID )[0]->cat_ID );
                   $output .= '<a href="' . $category_link .'">' . get_the_category( $query->ID )[0]->name .'</a>';
                   $output .='</div>';
                 }
                  if($settings['readmore_text']) {
                    $output .='<a href="' . get_the_permalink() . '" class="post-button">';
                    $output .=$settings['readmore_text'];
                    $output .='</a>';
                  }      
                   $output .='</div>';
                  $output .='<!--post-Button -->';

                   $output .='<!--post-Data -->';
                     $output .='<div class="data">';
                     if($settings['blog_allow_date']) {
                        $output .='<span class="date">'.get_the_time('F d, Y').'</span>';
                      }  
                        $output .= '<h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
$output .= '</h3>';
                       if($settings['blog_allow_author'] || $settings['blog_allow_Comments'])

                      { $output .='<div class="post-meta">';
                           if($settings['blog_allow_author']) { 
                            $output .='<span class="author">'.esc_html__( ' By ', 'radiantthemes-addon' ). get_the_author() .'</span>';
                           }
                           if($settings['blog_allow_Comments']) {  
                              $output .= '<span class="comments"><i class="fa fa-comments-o"></i><a href="' . get_comments_link() . '">' . esc_html__( 'Comments (', 'radiantthemes-addons' ) . get_comments_number() . ')</a></span>';
                          }
                       $output .='</div>';
                     }

                     $output .='</div>';
                $output .='<!--post-Data -->';


	$output             .= '</div>';
$output                 .= '</article>';
$output                 .= '<!-- blog-item -->';


              
       

