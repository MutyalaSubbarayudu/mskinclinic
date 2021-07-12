<?php
/**
 * Template for Blog Seven
 *
 * @package cura
 */

?>

<div class="container">
<div class="rt-masonry style-seven">
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
get_template_part( 'template-parts/content-blog-seven', get_post_format() );
?>


<?php endwhile; endif ;?>


</div>
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






