<?php
/**
 * Template for Catgory Style three
 *
 * @package cura
 */

?>
<div class="rt-category-layout-3-news-section">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="rt-category-layout-3-news-block">
				<div class="holder">
					<div class="pic">
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<img src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="rt-category-layout-3-detail">
				<div class="rt-title">
					<a href="#"><?php single_cat_title(); ?></a>
				</div>
				<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
				<ul>
					<li><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time( 'n M Y' ); ?></a></li>
					<li><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-commenting-o" aria-hidden="true"></i><?php echo get_comments_number(); ?></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
