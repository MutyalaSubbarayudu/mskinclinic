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
	<main id="main" class="site-main">
		<?php if ( 'default' === radiantthemes_global_var( 'team_details_style', '', false ) ) { ?>
			<?php
			include get_parent_theme_file_path( 'template-parts/team-single-blank.php', get_post_format() );
			?>
		<?php } else { ?>
			<!-- wraper_team_single -->
			<section class="wraper_team_single">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<?php
							include get_parent_theme_file_path( 'template-parts/team-single-' . radiantthemes_global_var( 'team_details_style', '', false ) . '.php', get_post_format() );
							?>
						</div>
					</div>
					<!-- row -->
				</div>
			</section>
			<!-- wraper_team_single -->
		<?php } ?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
