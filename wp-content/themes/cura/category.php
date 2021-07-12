<?php
/**
 * The template for displaying category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cura
 */

get_header(); ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( ! empty( radiantthemes_global_var( 'blog_cat_layout_style', '', false ) ) ) { ?>
			<?php
			include get_parent_theme_file_path( '/inc/category/blog-' . radiantthemes_global_var( 'blog_cat_layout_style', '', false ) . '.php' );
			?>

		<?php } else { ?>
			<?php include get_parent_theme_file_path( '/inc/blog/blog-default.php' ); ?>
		<?php } ?>
	</main><!-- #main -->
</div><!-- #primary -->


<?php
get_footer();
