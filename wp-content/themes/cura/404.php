<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cura
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( radiantthemes_global_var( '404_error_style', '', false ) ) { ?>

			<!-- wraper_error_main -->
			<div class="wraper_error_main style-one">
				<!-- START OF 404 STYLE ONE CONTENT -->
				<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- error_main -->
								<div class="error_main">
									<!-- radiantthemes-counterup -->
									<div class="radiantthemes-counterup odometer" data-counterup-value="<?php echo esc_attr__( '404', 'cura' ); ?>"></div>
									<!-- radiantthemes-counterup -->
									<?php echo wp_kses( radiantthemes_global_var( '404_error_one_content', '', false ), 'rt-content' ); ?>
									<?php if ( radiantthemes_global_var( '404_error_one_button_link', '', false ) != '' ) { ?>
										<a class="btn" href="<?php echo esc_url( radiantthemes_global_var( '404_error_one_button_link', '', false ) ); ?>"><span class="ti-arrow-left"></span> <?php echo esc_html( radiantthemes_global_var( '404_error_one_button_text', '', false ) ); ?></a>
									<?php } ?>
								</div>
								<!-- error_main -->
							</div>
						</div>
						<!-- row -->
					</div>
					<!-- END OF 404 STYLE ONE CONTENT -->
			</div>
			<!-- wraper_error_main -->

		<?php } else { ?>

			<!-- wraper_error_main -->
			<div class="wraper_error_main style-one">
				<!-- START OF 404 STYLE ONE CONTENT -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- error_main -->
							<div class="error_main">
								<!-- radiantthemes-counterup -->
								<div class="radiantthemes-counterup odometer" data-counterup-value="<?php echo esc_attr__( '404', 'cura' ); ?>"></div>
								<!-- radiantthemes-counterup -->
								<h1><?php echo esc_html__( 'Oops! Page is not available', 'cura' ); ?></h1>
								<h2><?php echo esc_html__( 'We\'re not being able to find the page you\'re looking for', 'cura' ); ?></h2>
								<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="ti-arrow-left"></span> <?php echo esc_html__( 'Back To Home', 'cura' ); ?></a>
							</div>
							<!-- error_main -->
						</div>
					</div>
					<!-- row -->
				</div>
				<!-- END OF 404 STYLE ONE CONTENT -->
			</div>
			<!-- wraper_error_main -->

		<?php } ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
	get_footer();
