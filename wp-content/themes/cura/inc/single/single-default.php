<?php
/**
 * Template for Single Default
 *
 * @package cura
 */

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- wraper_blog_main -->
		<section class="wraper_blog_main">
			<div class="container">
				<!-- row -->
				<div class="row">
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
							<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
						<?php } else { ?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php } ?>
						<!-- blog_single -->
						<div class="blog_single">
							<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content-single', get_post_format() );
								endwhile; // End of the loop.
							?>
							<?php
							$tags = get_the_tags( $post->ID );
							if ( ! empty( $tags ) ) {
								?>
							<!-- post-tags -->
							<div class="post-tags">
								<?php
								/* translators: used between list items, there is a space after the comma */
								$tags_list = get_the_tag_list( '', ' ' );
								if ( $tags_list ) {
									printf(
										wp_kses( '<strong class="tags-title">Tags:</strong> ', 'rt-content' ) .
										/* translators: used between list items, there is a space after the comma */
										esc_html( '%1$s' ) .
										'',
										wp_kses( $tags_list, 'rt-content' )
									);
								}
								?>
							</div>
							<!-- post-tags -->
							<?php } ?>
								<?php if ( get_the_author_meta( 'description' ) ) : ?>
									<!-- author-bio -->
									<div class="author-bio">
										<div class="holder">
											<div class="pic">
												<?php echo get_avatar( get_the_author_meta( 'email' ), '150' ); ?>
											</div><!-- .pic -->
											<div class="data">
												<p class="title"><?php the_author_link(); ?> <span><?php echo esc_html__( ' / About Author', 'cura' ); ?></span></p>
												<p><?php the_author_meta( 'description' ); ?></p>
											</div><!-- .data -->
										</div>
									</div>
									<!-- author-bio -->
								<?php endif; ?>
								<!-- post-navigation -->
							<div class="navigation post-navigation">
								<div class="nav-links">
									<?php
									$prev_post = get_previous_post();
									if ( is_a( $prev_post, 'WP_Post' ) ) {
										?>
										<div class="nav-previous">
											<a rel="prev" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $prev_post->ID ) ); ?>"><span class="ti-angle-left"></span><strong><?php echo esc_html__( 'Prev Post', 'cura' ); ?></strong></a>
										</div>
									<?php } ?>
									<?php
									$next_post = get_next_post();
									if ( is_a( $next_post, 'WP_Post' ) ) {
										?>
										<div class="nav-next">
											<a rel="next" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $next_post->ID ) ); ?>"><span class="ti-angle-right"></span><strong><?php echo esc_html__( 'Next Post', 'cura' ); ?></strong></a>
										</div>
									<?php } ?>
								</div>
							</div>
							<!-- post-navigation -->

							<!-- comments-area -->
							<?php if ( radiantthemes_global_var( 'blog-layout', '', false ) ) : ?>
								<?php if ( radiantthemes_global_var( 'blog_comment_display', '', false ) ) : ?>
									<?php if ( comments_open() || get_comments_number() ) : ?>
										<?php comments_template(); ?>
								<?php endif; ?>
							<?php endif; ?>
							<?php else : ?>
								<?php if ( comments_open() || get_comments_number() ) : ?>
									<?php comments_template(); ?>
								<?php endif; ?>
							<?php endif; ?>
							<!-- comments-area -->
						</div>
						<!-- blog_single -->
					</div>

					<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<?php } else { ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php } ?>
					<?php get_sidebar(); ?>
					</div>
				</div>
				<!-- row -->
			</div>
		</section>
		<!-- wraper_blog_main -->
	</main><!-- #main -->
</div><!-- #primary -->