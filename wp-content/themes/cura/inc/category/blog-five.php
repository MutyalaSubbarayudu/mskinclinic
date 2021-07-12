<?php
/**
 * Template for Blog Five
 *
 * @package cura
 */

?>
<!-- wraper_blog_main -->
<div class="wraper_blog_main style-five">
	<div class="container">
		<!-- row -->
		<div class="row">
			<?php if ( 'nosidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php } else { ?>
				<?php if ( 'leftsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-right">
				<?php } elseif ( 'rightsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
				<?php } else { ?>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
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
								get_template_part( 'template-parts/content-five', get_post_format() );
							endwhile;
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>

					</div>
					<!-- blog_main -->
					<?php if("pagination"==radiantthemes_global_var( 'category-showing', '', false ) ) {
              radiantthemes_pagination();
  } else {
          global $wp_query;
         if (  $wp_query->max_num_pages > 1 )
          ?>
            <div class="radiantthemes_loadmore"><?php echo esc_html__( 'Load More', 'cura' ); ?>..</div>

 <?php  } ?>
				</div>
				<?php if ( 'nosidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
				<?php } else { ?>
					<?php if ( 'leftsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left">
					<?php } elseif ( 'rightsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) { ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
					<?php } else { ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<?php } ?>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
			<!-- row -->
		</div>
	</div>
	<!-- wraper_blog_main -->
