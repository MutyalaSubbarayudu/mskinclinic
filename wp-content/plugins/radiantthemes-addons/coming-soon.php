<?php
/**
 * Template for Coming Soon Page
 *
 * @package zivi
 */

?>
<?php
if ( radiantthemes_global_var( 'social-icon-target', '', false ) ) {
	$social_target = 'target="_blank"';
} else {
	$social_target = '';
}
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<!-- wraper_comingsoon_main -->
		<div class="wraper_comingsoon_main style-one">
			<!-- START OF 404 STYLE ONE CONTENT -->
			<div class="table">
					<div class="table-cell">
						<!-- comingsoon_main -->
						<div class="comingsoon_main">
							<div class="holder">
								<?php
								if ( radiantthemes_global_var( 'coming_soon_one_content', '', false ) ) {
									echo wp_kses_post( radiantthemes_global_var( 'coming_soon_one_content', '', false ) );
								}
								?>
							</div>
							<!-- comingsoon-counter -->
							<div class="comingsoon-counter" data-launch-date="<?php echo esc_attr( radiantthemes_global_var( 'coming_soon_datetime', '', false ) ); ?>">
							</div>
							<?php echo do_shortcode( '[contact-form-7 id="44671" title="Coming Soon Subscribe"]' ); ?>
							<!-- comingsoon-counter -->
							<ul class="social">
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-googleplus', '', false ) ) ) : ?>
				<li class="google-plus"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-googleplus', '', false ) ); ?>" rel="publisher" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-google-plus"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-facebook', '', false ) ) ) : ?>
				<li class="facebook"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-facebook', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-facebook"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-twitter', '', false ) ) ) : ?>
				<li class="twitter"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-twitter', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-twitter"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-vimeo', '', false ) ) ) : ?>
				<li class="vimeo"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-vimeo', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-vimeo"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-youtube', '', false ) ) ) : ?>
				<li class="youtube"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-youtube', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-youtube-play"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-flickr', '', false ) ) ) : ?>
				<li class="flickr"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-flickr', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-flickr"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-linkedin', '', false ) ) ) : ?>
				<li class="linkedin"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-linkedin', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-linkedin"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-pinterest', '', false ) ) ) : ?>
				<li class="pinterest"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-pinterest', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-pinterest-p"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-xing', '', false ) ) ) : ?>
				<li class="xing"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-xing', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-xing"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-viadeo', '', false ) ) ) : ?>
				<li class="viadeo"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-viadeo', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-viadeo"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-vkontakte', '', false ) ) ) : ?>
				<li class="vkontakte"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-vkontakte', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-vk"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-tripadvisor', '', false ) ) ) : ?>
				<li class="tripadvisor"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-tripadvisor', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-tripadvisor"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-tumblr', '', false ) ) ) : ?>
				<li class="tumblr"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-tumblr', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-tumblr"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-behance', '', false ) ) ) : ?>
				<li class="behance"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-behance', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-behance"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-instagram', '', false ) ) ) : ?>
				<li class="instagram"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-instagram', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-instagram"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-dribbble', '', false ) ) ) : ?>
				<li class="dribbble"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-dribbble', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-dribbble"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-skype', '', false ) ) ) : ?>
				<li class="skype"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-skype', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-skype"></i></a></li>
			<?php endif; ?>
		</ul>
						</div>
						<!-- comingsoon_main -->
					</div>
				</div>
				<!-- END OF 404 STYLE ONE CONTENT -->
		</div>
		<!-- wraper_comingsoon_main -->
	</main><!-- #main -->
</div><!-- #primary -->
<?php wp_footer(); ?>
</body>
</html>
