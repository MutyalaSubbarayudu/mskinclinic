<?php
/**
 * Template for Portfolio Style Fourteen
 *
 * @package RadiantThemes
 */
if($settings['radiant_portfolio_filter']){


$output  = '<div class="rt-portfolio-box-filter element-fourteen  filter-style-' . esc_attr( $settings['radiant_portfolio_filter_style'] ) . ' text-' . esc_attr( $settings['radiant_portfolio_filter_alignment'] ) . ' ' . esc_attr( $hidden_filter ) . '">';
$output .= '<button class="matchHeight current-menu-item" data-filter="*"><span>All Groups</span></button>';

$taxonomy     = 'portfolio-category';
$orderby      = 'name';
$show_count   = 0;     // 1 for yes, 0 for no
$pad_counts   = 0;     // 1 for yes, 0 for no
$hierarchical = 1;     // 1 for yes, 0 for no
$title        = '';
$empty        = 1;
$depth        = 1;

$args = array(
	'taxonomy'     => $taxonomy,
	'orderby'      => $orderby,
	'show_count'   => $show_count,
	'pad_counts'   => $pad_counts,
	'hierarchical' => $hierarchical,
	'title_li'     => $title,
	'hide_empty'   => $empty,
	'depth'        => $depth,
);
$cats = get_categories( $args );

foreach ( $cats as $cat ) {
	$term_id    = $cat->term_id;
	$ptype_name = $cat->name;
	$ptype_des  = $cat->description;
	$ptype_slug = $cat->slug;
	$term_link  = get_term_link( $cat );

	$output .= '<button class="matchHeight" data-filter=".';
	$output .= $ptype_slug;
	$output .= '"><span>';
	$output .= $ptype_name;
	$output .= '</span></button>';
}

$output .= '</div>';
$output  .= '<!-- rt-portfolio-box -->';
$output .= '<div class="rt-portfolio-box element-fourteen row isotope">';
// WP_Query arguments.

// WP_Query arguments.
global $wp_query;

$radiant_portfolio_max_posts = ( $settings['radiant_portfolio_max_posts'] ? $settings['radiant_portfolio_max_posts'] : -1 );

$args     = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => esc_attr( $radiant_portfolio_max_posts ),
	'orderby'        => esc_attr( $settings['radiant_portfolio_looping_order'] ),
	'order'          => esc_attr( $settings['radiant_portfolio_looping_sort'] ),
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio-category' );

		$output .= '<!-- rt-portfolio-box-item -->';
		if ( 'two' == $settings['radiant_portfolio_row_posts'] ) {
			$output .= '<div class="rt-portfolio-box-item col-lg-6 col-md-6 col-sm-6 col-xs-12 ';
		} elseif ( 'three' == $settings['radiant_portfolio_row_posts'] ) {
			$output .= '<div class="rt-portfolio-box-item col-lg-4 col-md-4 col-sm-6 col-xs-12 ';
		} elseif ( 'four' == $settings['radiant_portfolio_row_posts'] ) {
			$output .= '<div class="rt-portfolio-box-item col-lg-3 col-md-3 col-sm-6 col-xs-12 ';
		}
		if ( $terms ) {
			foreach ( $terms as $term ) {
				$output .= $term->slug . ' ';
			}
		}
		$output                 .= '">';

				$output             .= '<div class="holder">';
				$output         .= '<div class="pic">';
				          $output .= '<a href="' . get_the_permalink() . '">';
				           $output .= get_the_post_thumbnail( get_the_ID(), 'full' );
				           $output .= '</a>';
				        $output .= '</div>';
					$output         .= '<div class="data">';
							$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
						    $output .= '<h5 class="categories">';
						$cats    = get_the_terms( get_the_ID(), 'portfolio-category' );
		foreach ( $cats as $cat ) {
			$term_id    = $cat->term_id;
			$ptype_name = $cat->name;
			$ptype_des  = $cat->description;
			$ptype_slug = $cat->slug;
			$term_link  = get_term_link( $cat );
			$output    .= '<span>';
			$output    .= $ptype_name;
			$output    .= '</span>';
		}
						$output .= '</h5>';
					$output     .= '</div>';
				$output         .= '</div>';
				$output         .= '</div>';
		$output         .= '<!-- rt-portfolio-box-item -->';


	endwhile;
}
$output .= '</div>';

}else {






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
$output  = '<!-- rt-portfolio-box -->';
$output .= '<div class="rt-portfolio-box element-fourteen row isotope">';
// WP_Query arguments.
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
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio-category' );



		$output .= '<!-- rt-portfolio-box-item -->';
		if ( 'two' == $settings['radiant_portfolio_row_posts'] ) {
			$output .= '<div class="rt-portfolio-box-item col-lg-6 col-md-6 col-sm-6 col-xs-12">';
		} elseif ( 'three' == $settings['radiant_portfolio_row_posts'] ) {
			$output .= '<div class="rt-portfolio-box-item col-lg-4 col-md-4 col-sm-6 col-xs-12">';
		} elseif ( 'four' == $settings['radiant_portfolio_row_posts'] ) {
			$output .= '<div class="rt-portfolio-box-item col-lg-3 col-md-3 col-sm-6 col-xs-12">';
		}
				$output             .= '<div class="holder">';
				$output         .= '<div class="pic">';
				          $output .= '<a href="' . get_the_permalink() . '">';
				           $output     .= '<img src="' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '" alt="' . get_the_title() . '" >';
				           $output .= '</a>';
				        $output .= '</div>';
					$output         .= '<div class="data">';
							$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
						    $output .= '<h5 class="categories">';
						$cats    = get_the_terms( get_the_ID(), 'portfolio-category' );
		foreach ( $cats as $cat ) {
			$term_id    = $cat->term_id;
			$ptype_name = $cat->name;
			$ptype_des  = $cat->description;
			$ptype_slug = $cat->slug;
			$term_link  = get_term_link( $cat );
			$output    .= '<span>';
			$output    .= $ptype_name;
			$output    .= '</span>';
		}
						$output .= '</h5>';
					$output     .= '</div>';
				$output         .= '</div>';
				$output         .= '</div>';
		$output         .= '<!-- rt-portfolio-box-item -->';
	endwhile;
}
$output .= '</div><!-- rt-portfolio-box -->';
}