<?php
/**
 * Template for Blog Two
 *
 * @package cura
 */

?>

<?php while ( have_posts() ) : ?>

	<div id="primary post-<?php the_ID(); ?>" <?php post_class( 'content-area' ); ?>>
		<main id="main" class="site-main">
			<!-- wraper_blog_banner style-two -->
			<section class="wraper_blog_banner style-two">
				<?php if ( has_post_thumbnail() ) { ?>
					<!-- wraper_blog_banner_image -->
					<div class="wraper_blog_banner_image">
						<div class="container">
							<!-- row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<!-- blog_banner_image -->
									<div class="blog_banner_image" style="background-image:url( <?php the_post_thumbnail_url(); ?> )"></div>
									<!-- blog_banner_image -->
								</div>
							</div>
							<!-- row -->
						</div>
					</div>
					<!-- wraper_blog_banner_image -->
				<?php } ?>
				<!-- wraper_blog_banner_main -->
				<div class="wraper_blog_banner_main">
					<div class="container">
						<!-- blog_banner_main -->
						<div class="row blog_banner_main">
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
							<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 text-center">
								<!-- blog_banner_main_item -->
								<div class="blog_banner_main_item">
									<!-- entry-header -->
									<header class="entry-header">
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									</header>
									<!-- entry-header -->
								</div>
								<!-- blog_banner_main_item -->
							</div>
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
						</div>
						<!-- blog_banner_main -->
					</div>
				</div>
				<!-- wraper_blog_banner_main -->
				<!-- wraper_blog_banner_tags -->
				<div class="wraper_blog_banner_tags">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
							<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
								<!-- blog_banner_tags -->
								<div class="row blog_banner_tags">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
										<!-- blog_banner_tags_item -->
										<div class="blog_banner_tags_item">
											<?php $username = get_userdata( $post->post_author ); ?>
											<p class="site-meta"><?php echo esc_html__( 'Published By:', 'cura' ); ?> <strong><a href="<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>"><?php echo esc_html( $username->display_name ); ?></a></strong></p>
										</div>
										<!-- blog_banner_tags_item -->
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
										<!-- blog_banner_tags_item -->
										<div class="blog_banner_tags_item">
											<p class="site-meta"><?php echo esc_html__( 'Published On:', 'cura' ); ?> <strong><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></strong></p>
										</div>
										<!-- blog_banner_tags_item -->
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
										<!-- blog_banner_tags_item -->
										<div class="blog_banner_tags_item">
											<p class="site-meta"><?php echo esc_html__( 'Published In:', 'cura' ); ?>
												<strong>
												<?php
												$category_detail = get_the_category( get_the_id() );
												foreach ( $category_detail as $item ) {
													$category_link = get_category_link( $item->cat_ID );
													?>
												<a href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_html( $item->name ); ?></a>
												<?php } ?>
												</strong>
											</p>
										</div>
										<!-- blog_banner_tags_item -->
									</div>
								</div>
								<!-- blog_banner_tags -->
							</div>
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
						</div>
						<!-- row -->
					</div>
				</div>
				<!-- wraper_blog_banner_tags -->
			</section>
			<!-- wraper_blog_banner style-two -->
			<!-- wraper_blog_main -->
			<section class="wraper_blog_main style-one">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
							<!-- blog_single style-one -->
							<div class="blog_single style-one">
								<?php
								the_post();
								get_template_part( 'template-parts/content-single-one', get_post_format() );
								?>

							</div>
							<!-- blog_single style-one -->
						</div>
						<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
					</div>
					<!-- row -->
					<div class="row">
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
					<?php $tags = get_the_tags( $post->ID ); if ( ! empty( $tags ) ) { ?>
									<!-- post-tags -->
									<div class="post-tags">
										<?php
										/* translators: used between list items, there is a space after the comma */
										$tags_list = get_the_tag_list( '', ' ' );
										if ( $tags_list ) {
											printf(
												esc_html( '%1$s' ) .
												'',
												wp_kses( $tags_list, 'rt-content' )
											);
										}
										?>
									</div>
									<!-- post-tags -->
								<?php } ?>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
					</div>
					<div class="row">
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
					<?php if ( true == radiantthemes_global_var( 'display_navigation', '', false ) ) : ?>
				<!-- wraper_blog_navigation style-one -->
				<div class="wraper_blog_navigation style-one">

						<!-- row -->


							<div class="col-lg-12 col-md-12 col-sm-10 col-xs-12">
								<!-- blog_navigation -->
								<div class="blog_navigation">
									<!-- row -->
									<div class="row">
										<?php
										$prev_post = get_previous_post();
										if ( is_a( $prev_post, 'WP_Post' ) ) {
											?>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
												<!-- navigation-link -->
												<div class="navigation-link nav-previous">
													<div class="icon">
														<span class="icon-arrow"><i class="fa fa-angle-left"></i></span>
													</div>
													<a class="link" rel="prev" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $prev_post->ID ) ); ?>">
														<?php echo esc_html__( 'Older Post', 'cura' ); ?>
														<strong><?php echo get_the_title( $prev_post->ID ); ?></strong>
													</a>
												</div>
												<!-- navigation-link -->
											</div>
										<?php } ?>
										<?php
										$next_post = get_next_post();
										if ( is_a( $next_post, 'WP_Post' ) ) {
											?>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
												<!-- navigation-link -->
												<div class="navigation-link nav-next">
													<div class="icon">
														<span class="icon-arrow"><i class="fa fa-angle-right"></i></span>
													</div>
													<a class="link" rel="next" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $next_post->ID ) ); ?>">
														<?php echo esc_html__( 'Newer Post', 'cura' ); ?>
														<strong><?php echo get_the_title( $next_post->ID ); ?></strong>
													</a>
												</div>
												<!-- navigation-link -->
											</div>
										<?php } ?>
									</div>
									<!-- row -->
								</div>
								<!-- blog_navigation -->
							</div>


						<!-- row -->

				</div>
				<!-- wraper_blog_navigation style-one -->
			<?php endif; ?>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
					</div>
				</div>
			</section>
			<!-- wraper_blog_main -->
			<?php if ( true == radiantthemes_global_var( 'display_author_information', '', false ) && get_the_author_meta( 'description' ) ) : ?>
				<!-- wraper_blog_author style-one -->
				<div class="wraper_blog_author style-one">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
							<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
								<!-- author-bio -->
								<div class="author-bio">
									<div class="holder">
										<div class="pic">
											<?php echo get_avatar( get_the_author_meta( 'email' ), '150' ); ?>
										</div><!-- .pic -->
										<div class="data">
											<p class="title"><?php the_author_link(); ?></p>
											<p class="designation"><?php echo radiantthemes_get_author_role(); ?></p>
											<?php the_author_meta( 'description' ); ?>
										</div><!-- .data -->
									</div>
								</div>
								<!-- author-bio -->
							</div>
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
						</div>
						<!-- row -->
					</div>
				</div>
				<!-- wraper_blog_author style-one -->
			<?php endif; ?>

			<?php if ( true == radiantthemes_global_var( 'display_related_article', '', false ) ) : ?>
				<!-- wraper_blog_related style-one -->
				<div class="wraper_blog_related style-one">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
							<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
								<!-- blog_related_title -->
								<div class="blog_related_title">
									<h5 class="title"><?php echo esc_html__( 'Related Articles', 'cura' ); ?></h5>
								</div>
								<!-- blog_related_title -->
								<!-- blog_related_box -->
								<div class="row blog_related_box">
									<?php
									$related = get_posts(
										array(
											'category__in' => wp_get_post_categories( $post->ID ),
											'numberposts'  => 2,
											'post__not_in' => array( $post->ID ),
										)
									);
									if ( $related ) {
										foreach ( $related as $post ) {
											setup_postdata( $post );
											?>
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<!-- blog_related_box_item -->
													<div class="blog_related_box_item">
														<div class="holder matchHeight">
															<div class="pic">
																<?php if ( '' !== get_the_post_thumbnail() ) { ?>
																	<a class="placeholder" href="<?php the_permalink(); ?>" style="background-image:url('<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>')"></a>
																<?php } else { ?>
																	<a class="placeholder" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/no-image/No-Image-Found.png' ) ); ?>')"></a>
																<?php } ?>
															</div><!-- .pic -->
															<div class="data">
																<p class="date"><i class="fa fa-calendar-o"></i> <?php echo esc_attr( get_the_date() ); ?></p>
																<h6 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h6>
															</div><!-- .data -->
														</div>
													</div>
													<!-- blog_related_box_item -->
												</div>
											<?php
										}
									}
									wp_reset_postdata();
									?>
								</div>
								<!-- blog_related_box -->
							</div>
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
						</div>
						<!-- row -->
					</div>
				</div>
				<!-- wraper_blog_related style-one -->
			<?php endif; ?>
			<?php if ( ( true == radiantthemes_global_var( 'blog_comment_display', '', false ) ) && ( comments_open() || get_comments_number() ) ) : ?>
				<!-- wraper_blog_comments style-one -->
				<div class="wraper_blog_comments style-one">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
							<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 text-center">
								<!-- blog_comments -->
								<div class="blog_comments">
									<?php comments_template(); ?>
								</div>
								<!-- blog_comments -->
							</div>
							<div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
						</div>
						<!-- row -->
					</div>
				</div>
				<!-- wraper_blog_comments style-one -->
			<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php endwhile; // End of the loop. ?>
