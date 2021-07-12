<?php
/**
 * Template for Catgory Style five
 *
 * @package cura
 */

?>
<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="rt-category-layout-5-news-style">
		<div class="rt-category-layout-5-rt-news-image-block">
			<div class="holder">
				<a href="<?php esc_url( the_permalink() ); ?>">
					<div class="pic"> <img src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>"></div>
				</a>
			</div>
		</div>
		<div class="rt-category-layout-5-rt-title">
			<a href="#"><?php single_cat_title(); ?></a>
		</div>
		<div class="rt-category-layout-5-rt-style-bottom">
			<div class="rt-category-layout-5-rt-style-card-title">
				<h3><a href="<?php the_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
</div>
