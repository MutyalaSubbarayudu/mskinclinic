<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cura
 */

get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( get_post() ) : ?>
			<div class="wraper_blog_main default-page">
		<?php endif; ?>
			<div class="container page-container">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'page' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				wp_reset_postdata();
				?>
			</div>
		<?php if ( get_post() ) : ?>
			</div>
		<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
