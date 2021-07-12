<?php
/**
 * Template for Catgory Style two
 *
 * @package cura
 */

?>
<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="fashion-author-box">
		<div class="holder">
			<div class="pic" style="background-image:url(<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>)"></div>
		</div>
		<div class="rt-title">
			<a class="rt-category-text" href="#"><?php single_cat_title(); ?></a>
		</div>
		<div class="fashion-author-area-rt-bottom">
			<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
			<div class="author-area-fashion-left">
				<div class="fashion-author-area-img">
					<?php echo get_avatar( get_the_author_meta( 'email' ), '150' ); ?>
				</div>
			</div>
			<div class="author-area-fashion-right">
				<div class="fashion-author-area-name"><?php the_author_link(); ?></div>
				<ul>
					<li><a href="<?php esc_url( get_permalink() ); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time( 'n M Y' ); ?></a></li>
					<li><a href="<?php esc_url( get_permalink() ); ?>"><i class="fa fa-commenting-o" aria-hidden="true"></i><?php echo get_comments_number(); ?></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
