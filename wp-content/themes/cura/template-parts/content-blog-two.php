<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cura
 */

?>
<div class="rt-grid">
	<div class="rt-image-box">
		<a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>"></a>
	</div>
	<div class="radiant_lifestyle_section_two-col">
		<p><?php echo esc_html__( 'By', 'cura' ) . ' '; ?><?php the_author(); ?>  |  <?php the_time( ' F jS, Y' ); ?></p>
		<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a></h3>
	</div><!--radiant_lifestyle_section_two-col-->
</div>
