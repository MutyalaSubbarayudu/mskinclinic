<?php
/**
 * Template for Catgory Style six
 *
 * @package cura
 */

?>
<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="rt-category-layout-6-author-box">
		<div class="holder">
			<a href="<?php esc_url( the_permalink() ); ?>">
				<div class="pic"> <img src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>"></div>
			</a>
		</div>
		<div class="rt-title">
			<a class="rt-category-text" href="#"><?php single_cat_title(); ?></a>
		</div>
		<div class="rt-category-layout-6-class-post">
			<h3><a href="<?php esc_url( the_permalink( $post->ID ) ); ?>"><?php the_title(); ?></a></h3>
		</div>
	</div>
</div>
