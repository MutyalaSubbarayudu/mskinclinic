<?php
/**
 * Template for Portfolio Style Seventeen
 *
 * @package RadiantThemes
 */

if ( empty( $settings['radiant_portfolio_category'] ) ) {
	$portfolio_category = '';
} else {
	$portfolio_category = array(
		array(
			'taxonomy' => 'portfolio-category',
			'terms'    => $settings['radiant_portfolio_category'],
		),
	);
	$hidden_filter      = 'hidden';
}



 $output = '<div class="rt-portfolio-box element-seventeen">';
          

global $wp_query;
$args     = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => esc_attr( $settings['radiant_portfolio_max_posts'] ),
	'orderby'        => esc_attr( $settings['radiant_portfolio_looping_order'] ),
	'order'          => esc_attr( $settings['radiant_portfolio_looping_sort'] ),
	'tax_query'      => $portfolio_category,
);
$my_query = null;
$my_query = new WP_Query( $args );
$counter = 0;
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio-category' );

		// include file with color sanitization functions.
		if ( ! function_exists( 'sanitize_hex_color' ) ) {
			include_once ABSPATH . 'wp-includes/class-wp-customize-manager.php';
		}

		// fetch and sanitize the colors.
		$background_color = sanitize_hex_color( get_post_meta( get_the_id(), 'radiant_pc_primary_color', true ) );
		$counter++;
        if (  1 === $counter )  {
					$class_one = 'box-wide';
					//$class_two = 'style="left:0 px;"';
				} else if (  2 === $counter ){
					$class_one = 'box-tall';
				//	$class_two = 'style="left:674.202px;"';
				}
				else if (  3 === $counter ){
					$class_one = '';
				//	$class_two = 'style="left:1011.3px;"';
				}
				else if (  4 === $counter ){
					$class_one = '';
					//$class_two = 'style="left:0 px;"';
				}
				else if (  5 === $counter ){
					$class_one = '';
				//	$class_two = 'style="left:337.101px;"';
				}
				else if (  6 === $counter ){
					$class_one = '';
				//	$class_two = 'style="left:1011.3px;"';
				}
				else{
					$class_one = '';
					$class_two = '';
				}
      
	  
$output .= '<div class="rt-portfolio-box-item ' . $class_one . '" >';



$output .= get_the_post_thumbnail( get_the_ID(), 'full' );
        $output .= '<div class="text-holder">';
            $output .= '<div class="text-wrapper">';
             $output .= ' <div class="content-text">';
                $output .= '<h2 itemprop="name" class="content-entry-title">';
                  $output .= '<span>' . get_the_title() . '</span>';
                $output .= '</h2>';
                $output .= '<div class="content-category-holder">';
                  $cats    = get_the_terms( get_the_ID(), 'portfolio-category' );
					foreach ( $cats as $cat ) {
					$term_id    = $cat->term_id;
					$ptype_name = $cat->name;
					$ptype_des  = $cat->description;
					$ptype_slug = $cat->slug;
					$term_link  = get_term_link( $cat );
					
                     $output .= ' <a class="content-category" href="'.$term_link.'">'.$ptype_name.'</a>';
					  
					  }
                $output .= '</div>';
              $output .= '</div>';
            $output .= '</div>';
          $output .= '</div>';
          $output .= '<a class="portfolio-link" href="' . get_the_permalink() . '"></a>';
          $output .= '</div>';
       
	endwhile;
}
$output .= '</div>';



