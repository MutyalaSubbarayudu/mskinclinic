<?php
/**
 * Template for Blog Item One.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$category_detail = get_the_category( get_the_id() );
$result          = '';
foreach ( $category_detail as $item ) :
	$category_link = get_category_link( $item->cat_ID );
	$result       .= '<a href = "' . esc_url( $category_link ) . '">' . $item->name . '</a>';
endforeach;
if ( 'yes' === $settings['blog_allow_carousel'] ) {
	$output .= '<article class="blog-item swiper-slide">';
} else {
	$output .= '<article class="blog-item">';
}
$output .= '<div class="holder ">';
if ( $settings['blog_allow_categories'] ) {
	$output .= ' <div class="category-list">' . $result . ' <span class="background"></span></div>';
}
$output .= '<div class="pic">';
$output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID(), 'medium' ) . '" alt="Blank Image" width="400" height="240" data-no-retina="">';
$output .= '</div>';
$output .= '<div class="category-back">
<div class="icon-container">
<span class="icon-back"></span><span class="ti-plus"></span>
</div>';
$output .= '<div class="data">';
if ( $settings['blog_allow_author'] ) {
	$output .= '<span class="author">' . esc_html__( 'Post By ', 'radiantthemes-addon' ) . get_the_author() . '</span>';
}
$output .= '<h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
$output .= '</h3>';
if ( $settings['blog_allow_Comments'] ) {
	$output .= '<div class="post-meta">';
	if ( $settings['blog_allow_date'] ) {
		$output .= '<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> ' . get_the_time( 'F d, Y' ) . '</span>';
	}
	$output .= '<span class="comments"><i class="fa fa-eye"></i> ' . $this->radiantthemes_getPostViews( get_the_ID() ) . '</span>';
	$output .= '</div>';
	$output .= '</div>';
}
$output .= '</div></div>';
$output .= '</article> ';
