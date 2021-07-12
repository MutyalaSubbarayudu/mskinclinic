<?php
	/**
	 * Shop Details Box Style One Template
	 *
	 * @package cura
	 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} ?>


					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<!-- shop_single -->
						<div id="product-<?php the_ID(); ?>" <?php post_class( 'shop_single' ); ?>>

							<?php
							do_action( 'woocommerce_before_single_product' );
							?>
							<div class="rt-product-gallery">
							<!-- START OF PRODUCT IMAGE / GALLERY -->
							<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
							<!-- END OF PRODUCT IMAGE / GALLERY -->
							</div>
							<!-- START OF PRODUCT SUMMARY -->
							<div class="summary entry-summary">
								<?php do_action( 'woocommerce_single_product_summary' ); ?>
								<div class="post-share">
							<ul class="post-share-buttons">
								<h5 class="rt-social-share"><?php esc_html_e( 'Share :', 'cura' ); ?></h5>
								<li><a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' ); ?><?php the_permalink(); ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php esc_attr_e( 'Share on Facebook', 'cura' ); ?>"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo esc_url( 'http://twitter.com/share?text=' ); ?><?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php esc_attr_e( 'Share on Twitter', 'cura' ); ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo esc_url( 'https://www.linkedin.com/shareArticle?mini=true&amp;url=' ); ?><?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=&amp;source=" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php esc_attr_e( 'Share on LinkedIn', 'cura' ); ?>"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div><!-- .post-share -->
							</div>
							<!-- END OF PRODUCT SUMMARY -->
							<div class="clearfix"></div>
							<?php
							$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

							if ( ! empty( $product_tabs ) ) :
								?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="tabs wc-tabs" role="tablist">
										<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
											<?php echo wp_kses( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ), 'rt-content' ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
									<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
										<?php
										if ( isset( $product_tab['callback'] ) ) {
											call_user_func( $product_tab['callback'], $key, $product_tab );
										}
										?>
			</div>
		<?php endforeach; ?>

									<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

							<?php endif; ?>
						</div>
						<!-- shop_single -->
						<!-- shop_related -->
						<div class="shop_related">
							<?php woocommerce_output_related_products(); ?>
						</div>
						<!-- shop_related -->
					<?php endwhile; ?>
