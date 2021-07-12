<?php
/**
 * Template for Header Banner
 *
 * @package cura
 */

if ( is_front_page() && is_home() ) { ?>
	<!-- wraper_header_bannerinner -->
	<div class="wraper_inner_banner">
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
									<h2 class="title">
										<?php echo esc_html__( 'Front Page', 'cura' ); ?>
									</h2>
								<?php else : ?>
									<?php if ( get_post_meta( $frontpage_id, 'banner_title', true ) ) { ?>
									<h2 class="title">
										<?php echo esc_html( get_post_meta( $frontpage_id, 'banner_title', true ) ); ?>
									</h2>
									<?php } else { ?>
									<h2 class="title">
										<?php echo esc_html( get_the_title( $frontpage_id ) ); ?>
									</h2>
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
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( is_home() ) { ?>
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
							<?php
							if ( empty( get_post_meta( $post->ID, 'banner_title', true ) ) &&
								empty( get_post_meta( $post->ID, 'banner_subtitle', true ) ) ) :
								?>
								<h2 class="title">
									<?php echo esc_html__( 'Blog', 'cura' ); ?>
								</h2>
							<?php else : ?>
								<?php if ( get_post_meta( $post->ID, 'banner_title', true ) ) { ?>
									<h2 class="title">
										<?php echo esc_html( get_post_meta( $post->ID, 'banner_title', true ) ); ?>
									</h2>
								<?php } else { ?>
									<h2 class="title">
										<?php the_title(); ?>
									</h2>
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
			<?php
			if (
			( 'Banner-With-Breadcrumb' === radiantthemes_global_var( 'short-header', '', false ) ) ||
			( 'breadcrumb-only' === radiantthemes_global_var( 'short-header', '', false ) )
			) {
				?>

			<?php } ?>
		</div>
		<!-- wraper_header_bannerinner -->
	</iv>
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
									<h2 class="title">
										<?php echo esc_html( get_the_title( $shop_page_id ) ); ?>
									</h2>
								<?php else : ?>
									<?php if ( get_post_meta( $shop_page_id, 'banner_title', true ) ) { ?>
										<h2 class="title">
											<?php echo esc_html( get_post_meta( $shop_page_id, 'banner_title', true ) ); ?>
										</h2>
									<?php } else { ?>
										<h2 class="title">
											<?php echo esc_html( get_the_title( $shop_page_id ) ); ?>
										</h2>
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
			</div>
			<!-- wraper_header_bannerinner -->
<?php } elseif ( is_category() || is_archive() || is_tag() || is_author() || is_attachment() ) { ?>
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
								<?php if ( is_category() ) : ?>
									<h2 class="title">
										<?php
										printf(
											// translators: category name.
											esc_html__( 'Category Archives: %s', 'cura' ),
											single_cat_title( '', false )
										);
										?>
									</h2>
									<?php
									// Show an optional category description.
									if ( category_description() ) :
										?>
										<div class="subtitle">
											<?php echo category_description(); ?>
										</div>
									<?php endif; ?>
								<?php elseif ( is_author() ) : ?>
									<h2 class="title">
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
									</h2>
								<?php elseif ( is_tag() ) : ?>
									<h2 class="title">
										<?php
										printf(
											// translators: Tag Name.
											esc_html__( 'Tag Archives: %s', 'cura' ),
											single_tag_title( '', false )
										);
										?>
									</h2>
									<?php
									// Show an optional tag description.
									if ( tag_description() ) :
										?>
										<div class="subtitle">
											<?php echo tag_description(); ?>
										</div>
									<?php endif; ?>
								<?php elseif ( is_archive() ) : ?>
									<h2 class="title">
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
									</h2>
								<?php else : ?>
									<?php
									if ( empty( get_post_meta( $posts_page_id, 'banner_title', true ) ) &&
									empty( get_post_meta( $posts_page_id, 'banner_subtitle', true ) ) ) :
										?>
									<h2 class="title">
										<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
									</h2>
									<p class="subtitle">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</p>
								<?php else : ?>
									<?php if ( get_post_meta( $posts_page_id, 'banner_title', true ) ) { ?>
									<h2 class="title">
										<?php echo esc_html( get_post_meta( $posts_page_id, 'banner_title', true ) ); ?>
									</h2>
									<?php } else { ?>
									<h2 class="title">
										<?php echo esc_html( get_the_title( $posts_page_id ) ); ?>
									</h2>
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
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( is_search() ) { ?>
	<!-- wraper_header_bannerinner -->
	<?php
		$posts_page_id = get_option( 'page_for_posts' );
		?>
		<div class="wraper_inner_banner">
			<!-- wraper_inner_banner_main -->
			<div class="wraper_inner_banner_main">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- inner_banner_main -->
							<div class="inner_banner_main">
								<h2 class="title"><?php echo esc_html__( 'Search', 'cura' ); ?></h2>
							</div>
							<!-- inner_banner_main -->
						</div>
					</div>
					<!-- row -->
				</div>
			</div>
			<!-- wraper_inner_banner_main -->
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
		</div>
		<!-- wraper_header_bannerinner -->
<?php } elseif ( is_singular( 'post' ) ) { ?>
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
							<?php
							if ( empty( get_post_meta( $post->ID, 'banner_title', true ) ) &&
								empty( get_post_meta( $post->ID, 'banner_subtitle', true ) ) ) :
								?>
								<h2 class="title"><?php echo esc_html__( 'Blog', 'cura' ); ?></h2>
							<?php else : ?>
								<?php if ( get_post_meta( $post->ID, 'banner_title', true ) ) { ?>
									<h2 class="title">
										<?php echo esc_html( get_post_meta( $post->ID, 'banner_title', true ) ); ?>
									</h2>
								<?php } else { ?>
									<h2 class="title">
										<?php the_title(); ?>
									</h2>
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
	</div>
	<!-- wraper_header_bannerinner -->
<?php } else { ?>
		<!-- wraper_header_bannerinner -->
		<?php
		$common_banner_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );
		?>
		<?php if ( is_singular( 'post' ) ) { ?>
			<div class="wraper_inner_banner">
		<?php } elseif ( ! empty( $common_banner_image ) ) { ?>
			<div class="wraper_inner_banner" style="background-image:url('<?php echo esc_url( $common_banner_image ); ?>')">
		<?php } else { ?>
			<div class="wraper_inner_banner">
		<?php } ?>
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
									<h2 class="title">
										<?php the_title(); ?>
									</h2>
								<?php else : ?>
									<?php if ( get_post_meta( $post->ID, 'banner_title', true ) ) { ?>
										<h2 class="title">
											<?php echo esc_html( get_post_meta( $post->ID, 'banner_title', true ) ); ?>
										</h2>
									<?php } else { ?>
										<h2 class="title">
											<?php the_title(); ?>
										</h2>
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
		</div>
		<!-- wraper_header_bannerinner -->
<?php } ?>
<!-- wraper_header_bannerinner -->
