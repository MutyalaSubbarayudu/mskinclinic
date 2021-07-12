<?php
/*
 Template Name: Common Page without Title
 */
 ?>
  <?php get_header(); ?>
 <div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if ( get_post() && ! preg_match( '/vc_row/', get_post()->post_content ) ) : ?>
				<div class="wraper_blog_main default-page">
			<?php endif; ?>
				<div class="container page-container">
					<?php
					while ( have_posts() ) :
					the_post();
                    ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php
								the_content();
								wp_link_pages(
									array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cura' ),
										'after'  => '</div>',
									)
								);
								?>
						</div><!-- .entry-content -->
					</article><!-- #post-<?php the_ID(); ?> -->
					<?php
					if ( comments_open() || get_comments_number() ) :
					comments_template();
					endif;
					endwhile; // End of the loop.
					wp_reset_postdata();
					?>
				</div>
			<?php if ( get_post() && ! preg_match( '/vc_row/', get_post()->post_content ) ) : ?>
				</div>
			<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
	get_footer();
