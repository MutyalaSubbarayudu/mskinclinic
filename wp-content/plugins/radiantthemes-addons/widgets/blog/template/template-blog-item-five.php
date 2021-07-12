<?php
/**
 * Template for Blog Item Five.
 *
 * @package RadiantThemes
 */
	$category_detail = get_the_category( get_the_id() );
	$result          = '';
	foreach ( $category_detail as $item ) :
	$category_link = get_category_link( $item->cat_ID );
	$result       .=  $item->name ;
	endforeach;
	if ( 'yes' === $settings['blog_allow_carousel'] ) {
$output .= '<article class="blog-item swiper-slide">';
} else {
$output .= '<article class="blog-item ">';
}
               $output .= '<div class="holder">';                 
                     $output .= '<div class="pic">';
                        $output .= '<div class="bg-overlay"></div>';
                        $output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID(), 'medium').'" alt="Image" data-no-retina="" width="400" height="250">';
                    $output .= ' </div>';                 
                     $output .= '<div class="post-btn">';                        
                        $output .= '<a href="' . get_the_permalink() . '" class="post-button">'; 
                           $output .= '<i class="ti-arrow-right"></i>';
                        $output .= '</a>';
                    $output .= ' </div>';                  
                     $output .= '<div class="data matchHeight">';
                        $output .= '<span class="date">'.get_the_date( 'F j, Y' ).'</span>';
                        $output .= '<span class="category">'.$result.'</span>';
                        $output .= '<h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';                       
                     $output .= '</div>';                
               $output .= '</div>';
           $output .= ' </article>';



