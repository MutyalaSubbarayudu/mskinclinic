<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cura
 */

get_header();
?>

<?php if ( ! empty( radiantthemes_global_var( 'blog_single_layout_style', '', false ) ) ) : ?>
	<?php include get_parent_theme_file_path( '/inc/single/single-' . radiantthemes_global_var( 'blog_single_layout_style', '', false ) . '.php' ); ?>
<?php else : ?>
	<?php include get_parent_theme_file_path( '/inc/single/single-default.php' ); ?>
<?php endif; ?>

<?php
get_footer();
