<?php
/**
 * Template for Catgory Style three
 *
 * @package cura
 */

?>
<div class="rt-category-layout-4-class-block-box">
	<div class="rt-category-layout-4-image">
		<a href="<?php the_permalink( $post->ID ); ?>"><img src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>"></a>
	</div>
	<div class="rt-category-layout-4-class-post">
		<a class="rt-category-layout-4-box-post-name" href="#"><?php single_cat_title(); ?></a>
		<span class="rt-category-layout-4-box-date-post-devider"> / </span>
		<span class="rt-category-layout-4-box-post-date"><?php the_time( 'n M Y' ); ?></span>
	</div>
	<h3><a href="<?php the_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h3>
	<?php
	the_excerpt();
	$style4data++;
	?>
</div>
