<?php
/**
 * Template for Catgory Style One
 *
 * @package cura
 */

?>

<!--Repeat box start-->
<div class="business-box">
	<div class="holder">
		<div class="pic" style="background-image:url(<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>)"></div>
		<div class="business-box-bottom">
			<div class="business-class-post">
				<a class="business-box-post-name" href="#"><?php single_cat_title(); ?></a>
				<span class="business-box-date-post-devider"> / </span>
				<span class="business-box-post-date"><?php the_time( 'n M Y' ); ?></span>
			</div>
			<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
		</div>
	</div>
</div>
