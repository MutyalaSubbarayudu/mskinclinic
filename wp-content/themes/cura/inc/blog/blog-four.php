<?php
/**
 * Template for Blog Four
 *
 * @package cura
 */

?>
<!-- wraper_blog_main -->
<div class="wraper_blog_main style-four">
	<div class="container">
		<!-- row -->
		<div class="row">
			<?php if ( 'nosidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php } else { ?>
				<?php if ( 'leftsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
				<?php } elseif ( 'rightsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-left">
				<?php } else { ?>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<?php } ?>
			<?php } ?>
					<!-- blog_main -->
					<div class="blog_main blog-posts">
						<?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => 1,
    );
    $blog_posts = new WP_Query( $args );

							if ( $blog_posts->have_posts() ) :
								/* Start the Loop */
								while ( $blog_posts->have_posts() ) : $blog_posts->the_post();
									the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content-four', get_post_format() );
							endwhile;
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>

					</div>
					<!-- blog_main -->
					<?php if("pagination"==radiantthemes_global_var( 'blog-showing', '', false ) ) {
						 radiantthemes_pagination();
					} elseif ("loadmore"==radiantthemes_global_var( 'blog-showing', '', false )) { ?>
					    <div class="blog-posts1"></div>
						<div class="loadmore"><div class="rtloadmore"><?php echo esc_html__( 'Load More', 'cura' ); ?>...</div></div>
					<?php }else {?>
                        <div class="loadmore"><div class="rtlazyload"><?php echo esc_html__( 'Load More', 'cura' ); ?> ..<img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/loder.gif"></div></div>
					<?php } ?>
				<div class="rt-no-more-post"><?php echo esc_html__( 'No more post to display.', 'cura' ); ?></div>
				</div>
				<?php if ( 'nosidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
				<?php } else { ?>
					<?php if ( 'leftsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
					<?php } elseif ( 'rightsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
					<?php } else { ?>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<?php } ?>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
			<!-- row -->
		</div>
	</div>
	<!-- wraper_blog_main -->
