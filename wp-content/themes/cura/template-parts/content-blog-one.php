<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cura
 */

?>
<article id="post-<?php the_ID(); ?>" class="blog-item style-one post">
	<div class="holder">
		<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="pic">
			<a class="pic-main" href="<?php the_permalink(); ?>" style="background-image:url(<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>);"></a>
		</div>
	<?php endif; ?>
	<div class="data">
		<h4 class="title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h4>
		<div class="post-meta">
			<span class="comments"><i class="fa fa-user"></i><?php the_author(); ?> </span>
			<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_time( 'F d, Y' ); ?></span>
		</div>
	</div>
</div>
</article>
