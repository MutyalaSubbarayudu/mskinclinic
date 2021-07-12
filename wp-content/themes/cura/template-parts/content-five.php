<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cura
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'style-five' ); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
		</div><!-- .post-thumbnail -->
	<?php } ?>
	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-main">
		<div class="entry-content">
			<?php echo wp_kses( substr( wp_strip_all_tags( get_the_excerpt() ), 0, 300 ), 'rt-content' ) . '...'; ?>
			<div class="post-meta">
				<div class="pull-left">
					<span class="comments"><i class="fa fa-user"></i><?php the_author(); ?> </span>
					<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_time( 'F d, Y' ); ?></span>
				</div>
				<div class="pull-right">
					<div class="entry-extra-item">
						<?php if ( true == radiantthemes_global_var( 'display_social_sharing', '', false ) ) : ?>
							<div class="post-share">
								<ul class="post-share-buttons">
									<li class="rt-social-share"><?php esc_html_e( 'Share :', 'cura' ); ?></li>
									<li><a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' ); ?><?php the_permalink(); ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php esc_attr_e( 'Share on Facebook', 'cura' ); ?>"><i class="fa fa-facebook"></i></a></li>
									<li><a href="<?php echo esc_url( 'https://plus.google.com/share?url=' ); ?><?php the_permalink(); ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php esc_attr_e( 'Share on Google+', 'cura' ); ?>"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="<?php echo esc_url( 'http://twitter.com/share?text=' ); ?><?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php esc_attr_e( 'Share on Twitter', 'cura' ); ?>"><i class="fa fa-twitter"></i></a></li>
									<li><a href="<?php echo esc_url( 'https://www.linkedin.com/shareArticle?mini=true&amp;url=' ); ?><?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=&amp;source=" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php esc_attr_e( 'Share on LinkedIn', 'cura' ); ?>"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div><!-- .post-share -->
							<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-main -->
</article><!-- #post-## -->
