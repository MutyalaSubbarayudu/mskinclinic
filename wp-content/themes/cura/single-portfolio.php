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

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
			?>
			<div class="row case-studies-single-pagination">
				<div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">
					<div class="case-studies-single-previous-post">
						<?php
						$prev_post = get_previous_post();
						if ( $prev_post ) {
							$prev_title = wp_strip_all_tags( str_replace( '"', '', $prev_post->post_title ) );
							?>
							<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
								<span class="case-studies-single-previous-post-title"><?php echo esc_html__( 'Previous Post', 'cura' ); ?> </span>
								<span class="case-studies-single-previous-post-name"><?php echo esc_html( $prev_title ); ?></span>
							</a>
						<?php } ?>
					</div>
				</div>
				<div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">
					<div class="case-studies-single-post-back-btn"></div>
				</div>
				<div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">
					<div class="case-studies-single-next-post">
						<?php
						$next_post = get_next_post();
						if ( $next_post ) {
							$next_title = wp_strip_all_tags( str_replace( '"', '', $next_post->post_title ) );
							?>
							<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
								<span class="case-studies-single-previous-post-title"><?php echo esc_html__( 'Next Post', 'cura' ); ?></span>
								<span class="case-studies-single-previous-post-name"><?php echo esc_html( $next_title ); ?></span>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php
		endwhile; // End of the loop.
		?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
