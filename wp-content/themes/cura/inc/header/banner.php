<?php
/**
 * Template for Header Banner
 *
 * @package cura
 */

if ( is_front_page() && is_home() ) { ?>
	<!-- wraper_header_bannerinner -->
	<div class="wraper_inner_banner">
		<!-- wraper_inner_banner_main -->
		<div class="wraper_inner_banner_main">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- inner_banner_main -->
						<div class="inner_banner_main">
							<p class="title">
								<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
							</p>
							<p class="subtitle">
								<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
							</p>
						</div>
						<!-- inner_banner_main -->
					</div>
				</div>
				<!-- row -->
			</div>
		</div>
		<!-- wraper_inner_banner_main -->
		<?php if ( ! ( is_front_page() && is_home() ) && ! is_page() ) : ?>
			<?php if ( function_exists( 'radiantthemes_breadcrumbs' ) ) : ?>
				<!-- wraper_inner_banner_breadcrumb -->
				<div class="wraper_inner_banner_breadcrumb">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- inner_banner_breadcrumb -->
								<div class="inner_banner_breadcrumb">
									<?php radiantthemes_breadcrumbs(); ?>
								</div>
								<!-- inner_banner_breadcrumb -->
							</div>
						</div>
						<!-- row -->
					</div>
				</div>
				<!-- wraper_inner_banner_breadcrumb -->
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<!-- wraper_header_bannerinner -->
<?php } elseif ( is_front_page() ) { ?>
	<!-- wraper_header_bannerinner -->
	<?php
	$frontpage_id            = get_option( 'page_on_front' );
	$page_featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( $frontpage_id ) );
	?>
	<?php
	if ( ! empty( $page_featured_image_url ) ) {
		?>
		<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $page_featured_image_url ); ?>')">
	<?php } else { ?>
		<div class="wraper_inner_banner">
	<?php } ?>
		<?php
		if (
			( 'bannerbreadcumbs' === get_post_meta( $post->ID, 'bannercheck', true ) ) ||
			( 'banneronly' === get_post_meta( $post->ID, 'bannercheck', true ) )
		) {
			?>
		<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php
								if ( empty( get_post_meta( $frontpage_id, 'banner_title', true ) ) &&
									empty( get_post_meta( $frontpage_id, 'banner_subtitle', true ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $frontpage_id, 'banner_title', true ) ) { ?>
									<p class="title">
										<?php echo esc_html( get_post_meta( $frontpage_id, 'banner_title', true ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html( get_the_title( $frontpage_id ) ); ?>
									</p>
									<?php } ?>
									<?php if ( get_post_meta( $frontpage_id, 'banner_subtitle', true ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( get_post_meta( $frontpage_id, 'banner_subtitle', true ) ); ?>
									</p>
									<?php } ?>
									<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $post->ID, 'bannercheck', true ) ) ||
				( 'breadcumbsonly' === get_post_meta( $post->ID, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( is_home() ) { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		$blog_id                 = get_option( 'page_for_posts' );
		$blog_featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( $blog_id ) );
		?>
		<?php
		if ( ! empty( $blog_featured_image_url ) ) {
			?>
			<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $blog_featured_image_url ); ?>')">
		<?php } else { ?>
			<div class="wraper_inner_banner">
		<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $blog_id, 'bannercheck', true ) ) ||
				( 'banneronly' === get_post_meta( $blog_id, 'bannercheck', true ) )
			) {
				?>
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php
								if ( empty( get_post_meta( $blog_id, 'banner_title', true ) ) &&
									empty( get_post_meta( $blog_id, 'banner_subtitle', true ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $blog_id, 'banner_title', true ) ) { ?>
									<p class="title">
										<?php echo esc_html( get_post_meta( $blog_id, 'banner_title', true ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html( get_the_title( $blog_id ) ); ?>
									</p>
									<?php } ?>
									<?php if ( get_post_meta( $blog_id, 'banner_subtitle', true ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( get_post_meta( $blog_id, 'banner_subtitle', true ) ); ?>
									</p>
									<?php } ?>
									<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $blog_id, 'bannercheck', true ) ) ||
				( 'breadcumbsonly' === get_post_meta( $blog_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( is_singular( 'doctor' ) || is_tax( 'profession' ) ) { ?>
		<!-- wraper_header_bannerinner -->
			<?php
			$team_page_info        = get_page_by_path( 'doctor', OBJECT, 'page' );
			$team_page_id          = $team_page_info->ID;
			$team_featured_img_url = wp_get_attachment_url( get_post_thumbnail_id( $team_page_id ) );
			?>
			<?php
			if ( ! empty( $team_featured_img_url ) ) {
				?>
				<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $team_featured_img_url ); ?>')">
			<?php } else { ?>
				<div class="wraper_inner_banner">
			<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $team_page_id, 'bannercheck', true ) ) ||
				( 'banneronly' === get_post_meta( $team_page_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php
								if ( empty( get_post_meta( $team_page_id, 'banner_title', true ) ) &&
									empty( get_post_meta( $team_page_id, 'banner_subtitle', true ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $team_page_id, 'banner_title', true ) ) { ?>
									<p class="title">
										<?php echo esc_html( get_post_meta( $team_page_id, 'banner_title', true ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html( get_the_title( $team_page_id ) ); ?>
									</p>
									<?php } ?>
									<?php if ( get_post_meta( $team_page_id, 'banner_subtitle', true ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( get_post_meta( $team_page_id, 'banner_subtitle', true ) ); ?>
									</p>
									<?php } ?>
									<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $team_page_id, 'bannercheck', true ) ) ||
				( 'breadcumbsonly' === get_post_meta( $team_page_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( is_singular( 'portfolio' ) || is_tax( 'portfolio-category' ) ) { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		$portfolio_page_info        = get_page_by_path( 'portfolio', OBJECT, 'page' );
		$portfolio_page_id          = $portfolio_page_info->ID;
		$portfolio_featured_img_url = wp_get_attachment_url( get_post_thumbnail_id( $portfolio_page_id ) );
		?>
		<?php
		if ( ! empty( $portfolio_featured_img_url ) ) {
			?>
			<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $portfolio_featured_img_url ); ?>')">
		<?php } else { ?>
			<div class="wraper_inner_banner">
		<?php } ?>
		<?php
		if (
			( 'bannerbreadcumbs' === get_post_meta( $portfolio_page_id, 'bannercheck', true ) ) ||
			( 'banneronly' === get_post_meta( $portfolio_page_id, 'bannercheck', true ) )
		) {
			?>
		<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php
								if ( empty( get_post_meta( $portfolio_page_id, 'banner_title', true ) ) &&
									empty( get_post_meta( $portfolio_page_id, 'banner_subtitle', true ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $portfolio_page_id, 'banner_title', true ) ) { ?>
									<p class="title">
										<?php echo esc_html( get_post_meta( $portfolio_page_id, 'banner_title', true ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html( get_the_title( $portfolio_page_id ) ); ?>
									</p>
									<?php } ?>
									<?php if ( get_post_meta( $portfolio_page_id, 'banner_subtitle', true ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( get_post_meta( $portfolio_page_id, 'banner_subtitle', true ) ); ?>
									</p>
									<?php } ?>
									<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $portfolio_page_id, 'bannercheck', true ) ) ||
				( 'breadcumbsonly' === get_post_meta( $portfolio_page_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( is_singular( 'case-studies' ) || is_tax( 'case-study-category' ) ) { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		$case_studies_page_info        = get_page_by_path( 'case-studies', OBJECT, 'page' );
		$case_studies_page_id          = $case_studies_page_info->ID;
		$case_studies_featured_img_url = wp_get_attachment_url( get_post_thumbnail_id( $case_studies_page_id ) );
		?>
		<?php
		if ( ! empty( $case_studies_featured_img_url ) ) {
			?>
			<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $case_studies_featured_img_url ); ?>')">
		<?php } else { ?>
			<div class="wraper_inner_banner">
		<?php } ?>
		<?php
		if (
			( 'bannerbreadcumbs' === get_post_meta( $case_studies_page_id, 'bannercheck', true ) ) ||
			( 'banneronly' === get_post_meta( $case_studies_page_id, 'bannercheck', true ) )
		) {
			?>
		<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php
								if ( empty( get_post_meta( $case_studies_page_id, 'banner_title', true ) ) &&
									empty( get_post_meta( $case_studies_page_id, 'banner_subtitle', true ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $case_studies_page_id, 'banner_title', true ) ) { ?>
									<p class="title">
										<?php echo esc_html( get_post_meta( $case_studies_page_id, 'banner_title', true ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html( get_the_title( $case_studies_page_id ) ); ?>
									</p>
									<?php } ?>
									<?php if ( get_post_meta( $case_studies_page_id, 'banner_subtitle', true ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( get_post_meta( $case_studies_page_id, 'banner_subtitle', true ) ); ?>
									</p>
									<?php } ?>
									<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $case_studies_page_id, 'bannercheck', true ) ) ||
				( 'breadcumbsonly' === get_post_meta( $case_studies_page_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( is_singular( 'download' ) || is_tax( 'download_category' ) || is_tax( 'download_tag' ) ) { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		$download_page_info        = get_page_by_path( 'products-download', OBJECT, 'page' );
		$download_page_id          = $download_page_info->ID;
		$download_featured_img_url = wp_get_attachment_url( get_post_thumbnail_id( $download_page_id ) );
		?>
		<?php
		if ( ! empty( $download_featured_img_url ) ) {
			?>
			<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $download_featured_img_url ); ?>')">
		<?php } else { ?>
			<div class="wraper_inner_banner">
		<?php } ?>
		<?php
		if (
			( 'bannerbreadcumbs' === get_post_meta( $download_page_id, 'bannercheck', true ) ) ||
			( 'banneronly' === get_post_meta( $download_page_id, 'bannercheck', true ) )
		) {
			?>
		<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php
								if ( empty( get_post_meta( $download_page_id, 'banner_title', true ) ) &&
									empty( get_post_meta( $download_page_id, 'banner_subtitle', true ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $download_page_id, 'banner_title', true ) ) { ?>
									<p class="title">
										<?php echo esc_html( get_post_meta( $download_page_id, 'banner_title', true ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html( get_the_title( $download_page_id ) ); ?>
									</p>
									<?php } ?>
									<?php if ( get_post_meta( $download_page_id, 'banner_subtitle', true ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( get_post_meta( $download_page_id, 'banner_subtitle', true ) ); ?>
									</p>
									<?php } ?>
									<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $download_page_id, 'bannercheck', true ) ) ||
				( 'breadcumbsonly' === get_post_meta( $download_page_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( class_exists( 'Tribe__Events__Main' ) && ( is_singular( 'tribe_events' ) || ( tribe_is_past() || tribe_is_upcoming() && ! is_tax() ) || ( tribe_is_month() && ! is_tax() ) || ( tribe_is_day() && ! is_tax() ) ) ) { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		if ( radiantthemes_global_var( 'event_banner_image', 'url', true ) ) {
			$event_banner_image_link = esc_url( radiantthemes_global_var( 'event_banner_image', 'url', true ) );
			?>
		<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $event_banner_image_link ); ?>')">
		<?php } else { ?>
			<div class="wraper_inner_banner">
		<?php } ?>
			<?php
			if (
			( 'banner-breadcumbs' === radiantthemes_global_var( 'events_banner_details', '', false ) ) ||
			( 'banner-only' === radiantthemes_global_var( 'events_banner_details', '', false ) )
			) {
				?>
			<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php
								if ( empty( radiantthemes_global_var( 'event_banner_title', '', false ) ) &&
									empty( radiantthemes_global_var( 'event_banner_subtitle', '', false ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( radiantthemes_global_var( 'event_banner_title', '', false ) ) { ?>
									<p class="title">
										<?php echo esc_html( radiantthemes_global_var( 'event_banner_title', '', false ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html__( 'Events', 'cura' ); ?>
									</p>
									<?php } ?>
									<?php if ( radiantthemes_global_var( 'event_banner_subtitle', '', false ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( radiantthemes_global_var( 'event_banner_subtitle', '', false ) ); ?>
									</p>
									<?php } ?>
								<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
			( 'banner-breadcumbs' === radiantthemes_global_var( 'events_banner_details', '', false ) ) ||
			( 'breadcumbs-only' === radiantthemes_global_var( 'events_banner_details', '', false ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( class_exists( 'woocommerce' ) && ( is_shop() || is_singular( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) ) { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		$shop_page_info        = get_page_by_path( 'shop', OBJECT, 'page' );
		$shop_page_id          = $shop_page_info->ID;
		$shop_featured_img_url = wp_get_attachment_url( get_post_thumbnail_id( $shop_page_id ) );
		?>
			<?php
			if ( ! empty( $shop_featured_img_url ) ) {
				?>
			<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $shop_featured_img_url ); ?>')">
			<?php } else { ?>
			<div class="wraper_inner_banner">
			<?php } ?>
				<?php
				if (
				( 'bannerbreadcumbs' === get_post_meta( $shop_page_id, 'bannercheck', true ) ) ||
				( 'banneronly' === get_post_meta( $shop_page_id, 'bannercheck', true ) )
				) {
					?>
				<!-- wraper_inner_banner_main -->
				<div class="wraper_inner_banner_main">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- inner_banner_main -->
								<div class="inner_banner_main">
								<?php
								if ( empty( get_post_meta( $shop_page_id, 'banner_title', true ) ) &&
									empty( get_post_meta( $shop_page_id, 'banner_subtitle', true ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $shop_page_id, 'banner_title', true ) ) { ?>
									<p class="title">
										<?php echo esc_html( get_post_meta( $shop_page_id, 'banner_title', true ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html( get_the_title( $shop_page_id ) ); ?>
									</p>
									<?php } ?>
									<?php if ( get_post_meta( $shop_page_id, 'banner_subtitle', true ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( get_post_meta( $shop_page_id, 'banner_subtitle', true ) ); ?>
									</p>
									<?php } ?>
									<?php endif; ?>
								</div>
								<!-- inner_banner_main -->
							</div>
						</div>
						<!-- row -->
					</div>
				</div>
				<!-- wraper_inner_banner_main -->
				<?php } ?>
				<?php
				if (
				( 'bannerbreadcumbs' === get_post_meta( $shop_page_id, 'bannercheck', true ) ) ||
				( 'breadcumbsonly' === get_post_meta( $shop_page_id, 'bannercheck', true ) )
				) {
					?>
				<!-- wraper_inner_banner_breadcrumb -->
				<div class="wraper_inner_banner_breadcrumb">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- inner_banner_breadcrumb -->
								<div class="inner_banner_breadcrumb">
									<?php
									if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
										radiantthemes_breadcrumbs();
									}
									?>
								</div>
								<!-- inner_banner_breadcrumb -->
							</div>
						</div>
						<!-- row -->
					</div>
				</div>
				<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
			</div>
			<!-- wraper_header_bannerinner -->
<?php } elseif ( is_category() || is_archive() || is_tag() || is_author() || is_attachment() ) { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		$posts_page_id          = get_option( 'page_for_posts' );
		$def_featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( $posts_page_id ) );
		?>
		<?php if ( ! empty( $def_featured_image_url ) ) { ?>
			<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $def_featured_image_url ); ?>')">
		<?php } else { ?>
			<div class="wraper_inner_banner">
		<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $posts_page_id, 'bannercheck', true ) ) ||
				( 'banneronly' === get_post_meta( $posts_page_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php if ( is_category() ) : ?>
									<p class="title">
										<?php
										printf(
											// translators: category name.
											esc_html__( 'Category Archives: %s', 'cura' ),
											single_cat_title( '', false )
										);
										?>
									</p>
									<?php
									// Show an optional category description.
									if ( category_description() ) :
										?>
										<div class="subtitle">
											<?php echo esc_html( category_description() ); ?>
										</div>
									<?php endif; ?>
								<?php elseif ( is_author() ) : ?>
									<p class="title">
										<?php
										printf(
											// translators: Author Name.
											esc_html__( 'All posts by %s', 'cura' ),
											'<span class="vcard"><a class="url fn n" href="' .
											esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .
											'" title="' .
											esc_attr( get_the_author() ) .
											'" rel="me">' .
											get_the_author() .
											'</a></span>'
										);
										?>
									</p>
								<?php elseif ( is_tag() ) : ?>
									<p class="title">
										<?php
										printf(
											// translators: Tag Name.
											esc_html__( 'Tag Archives: %s', 'cura' ),
											single_tag_title( '', false )
										);
										?>
									</p>
									<?php
									// Show an optional tag description.
									if ( tag_description() ) :
										?>
										<div class="subtitle">
											<?php echo esc_html( tag_description() ); ?>
										</div>
									<?php endif; ?>
								<?php elseif ( is_archive() ) : ?>
									<p class="title">
										<?php
										if ( is_day() ) :
											printf(
												// translators: Date.
												esc_html__( 'Daily Archives: %s', 'cura' ),
												get_the_date()
											);
										elseif ( is_month() ) :
											printf(
												// translators: Month and Date.
												esc_html__( 'Monthly Archives: %s', 'cura' ),
												get_the_date( _x( 'F Y', 'monthly archives date format', 'cura' ) )
											);
										elseif ( is_year() ) :
											printf(
												// translators: Month Date, Year.
												esc_html__( 'Yearly Archives: %s', 'cura' ),
												get_the_date( _x( 'Y', 'yearly archives date format', 'cura' ) )
											);
										else :
											esc_html__( 'Archives', 'cura' );
										endif;
										?>
									</p>
								<?php else : ?>
									<?php
									if ( empty( get_post_meta( $posts_page_id, 'banner_title', true ) ) &&
									empty( get_post_meta( $posts_page_id, 'banner_subtitle', true ) ) ) :
										?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $posts_page_id, 'banner_title', true ) ) { ?>
									<p class="title">
										<?php echo esc_html( get_post_meta( $posts_page_id, 'banner_title', true ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html( get_the_title( $posts_page_id ) ); ?>
									</p>
									<?php } ?>
									<?php if ( get_post_meta( $posts_page_id, 'banner_subtitle', true ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( get_post_meta( $posts_page_id, 'banner_subtitle', true ) ); ?>
									</p>
									<?php } ?>
								<?php endif; ?>
								<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
				( 'bannerbreadcumbs' === get_post_meta( $posts_page_id, 'bannercheck', true ) ) ||
				( 'breadcumbsonly' === get_post_meta( $posts_page_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->

<?php } elseif ( is_404() ) { ?>
<?php } elseif ( is_search() ) { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		$posts_page_id = get_option( 'page_for_posts' );
		?>
		<?php
		if ( radiantthemes_global_var( 'search_page_banner_image', 'url', true ) ) {
			$search_page_banner_image_link = esc_url( radiantthemes_global_var( 'search_page_banner_image', 'url', true ) );
			?>
		<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $search_page_banner_image_link ); ?>')">
		<?php } else { ?>
			<div class="wraper_inner_banner">
		<?php } ?>
			<?php
			if (
			( 'bannerbreadcumbs' === get_post_meta( $posts_page_id, 'bannercheck', true ) ) ||
			( 'banneronly' === get_post_meta( $posts_page_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php
								if ( empty( radiantthemes_global_var( 'search_page_banner_title', '', false ) ) &&
									empty( radiantthemes_global_var( 'search_page_banner_subtitle', '', false ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( radiantthemes_global_var( 'search_page_banner_title', '', false ) ) { ?>
									<p class="title">
										<?php echo esc_html( radiantthemes_global_var( 'search_page_banner_title', '', false ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php echo esc_html__( 'Search', 'cura' ); ?>
									</p>
									<?php } ?>
									<?php if ( radiantthemes_global_var( 'search_page_banner_subtitle', '', false ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( radiantthemes_global_var( 'search_page_banner_subtitle', '', false ) ); ?>
									</p>
									<?php } ?>
								<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
			( 'bannerbreadcumbs' === get_post_meta( $posts_page_id, 'bannercheck', true ) ) ||
			( 'breadcumbsonly' === get_post_meta( $posts_page_id, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
<?php } else { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		$common_banner_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );
		?>
		<?php
		if ( ! empty( $common_banner_image ) ) {
			?>
			<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $common_banner_image ); ?>')">
		<?php } else { ?>
			<div class="wraper_inner_banner">
		<?php } ?>
			<?php
			if (
			( 'bannerbreadcumbs' === get_post_meta( $post->ID, 'bannercheck', true ) ) ||
			( 'banneronly' === get_post_meta( $post->ID, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<?php
								if ( empty( get_post_meta( $post->ID, 'banner_title', true ) ) &&
									empty( get_post_meta( $post->ID, 'banner_subtitle', true ) ) ) :
									?>
									<p class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</p>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $post->ID, 'banner_title', true ) ) { ?>
									<p class="title">
										<?php echo esc_html( get_post_meta( $post->ID, 'banner_title', true ) ); ?>
									</p>
									<?php } else { ?>
									<p class="title">
										<?php the_title(); ?>
									</p>
									<?php } ?>
									<?php if ( get_post_meta( $post->ID, 'banner_subtitle', true ) ) { ?>
									<p class="subtitle">
										<?php echo esc_html( get_post_meta( $post->ID, 'banner_subtitle', true ) ); ?>
									</p>
									<?php } ?>
								<?php endif; ?>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
			<?php } ?>
			<?php
			if (
			( 'bannerbreadcumbs' === get_post_meta( $post->ID, 'bannercheck', true ) ) ||
			( 'breadcumbsonly' === get_post_meta( $post->ID, 'bannercheck', true ) )
			) {
				?>
			<!-- wraper_inner_banner_breadcrumb -->
			<div class="wraper_inner_banner_breadcrumb">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_breadcrumb -->
							<div class="inner_banner_breadcrumb">
								<?php
								if ( function_exists( 'radiantthemes_breadcrumbs' ) ) {
									radiantthemes_breadcrumbs();
								}
								?>
							</div>
							<!-- inner_banner_breadcrumb -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_breadcrumb -->
			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
<?php } ?>
<!-- wraper_header_bannerinner -->
