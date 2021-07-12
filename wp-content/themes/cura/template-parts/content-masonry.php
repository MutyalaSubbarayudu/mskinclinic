<div class="rt-grid">
	<div class="rt-image-box">
		<img src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>">
	</div>
	<div class="radiant_lifestyle_section_two-col">
		<p><?php esc_html_e( 'By', 'cura' ) . ' '; ?><?php the_author(); ?>  |  <?php the_time( ' F jS, Y' ); ?></p>
		<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a></h3>
		<div class="radiant-masonory-date"></div>
	</div><!--radiant_lifestyle_section_two-col-->
</div>
