<?php
/*
 Template Name: Left Sidebar
 */
 ?>
  <?php get_header(); ?>
<?php
while ( have_posts() ) :
the_post();
?><?php the_content();

endwhile; // End of the loop.
?>

<?php
	get_footer();
