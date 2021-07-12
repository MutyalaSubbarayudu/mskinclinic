<?php
/**
 * Template for Maintenance Page
 *
 * @package zivi
 */

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- wraper_maintenance_main -->
		<div class="wraper_maintenance_main style-one">
			<div class="table">
				<div class="table-cell">
					<div class="container">
						<!-- row -->
						<div class="row maintenance_main">
							<!-- START OF MAINTENANCE MODE STYLE ONE CONTENT -->
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
								<!-- maintenance_main_item -->
								<div class="maintenance_main_item">
									<?php
									if ( radiantthemes_global_var( 'maintenance_mode_one_content', '', false ) ) {
										echo wp_kses_post( radiantthemes_global_var( 'maintenance_mode_one_content', '', false ) );
									}
									?>
								</div>
								<!-- maintenance_main_item -->
							</div>
							<!-- END OF MAINTENANCE MODE STYLE ONE CONTENT -->
						</div>
						<!-- row -->
					</div>
				</div>
			</div>
		</div>
		<!-- wraper_maintenance_main -->
	</main><!-- #main -->
</div><!-- #primary -->
