<?php
	/**
	 * Shop Details Box Style Two Template
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
							</div>
							<!-- END OF PRODUCT IMAGE / GALLERY -->
							<!-- START OF PRODUCT SUMMARY -->
							<div class="summary entry-summary">
								<?php do_action( 'woocommerce_single_product_summary' ); ?>
								<?php
								$tabs = apply_filters( 'woocommerce_product_tabs', array() );
								if ( ! empty( $tabs ) ) :
									?>
								<!-- shop_single_accordion -->
								<div class="shop_single_accordion">
									<?php
									$i = 0;
									foreach ( $tabs as $key => $tab ) :
										$i++;
										?>
									<!-- shop_single_accordion_item -->
									<div class="shop_single_accordion_item">
										<button class="btn" type="button" data-toggle="collapse" data-target="#accordion-<?php echo esc_attr( $key ); ?>" aria-expanded="
																																	<?php
																																	if ( 1 == $i ) {
																																		echo esc_attr( 'true' );
																																	} else {
																																		echo esc_attr( 'false' ); }
																																	?>
										">
											<?php echo esc_html( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ); ?>
										</button>
										<div class="collapse
										<?php
										if ( 1 == $i ) {
											echo esc_attr( 'in' ); }
										?>
										" id="accordion-<?php echo esc_attr( $key ); ?>">
											<?php
											if ( isset( $tab['callback'] ) ) {
												call_user_func( $tab['callback'], $key, $tab );
											}
											?>
										</div>
									</div>
									<!-- shop_single_accordion_item -->
									<?php endforeach; ?>
								</div>
								<!-- shop_single_accordion -->
								<?php endif; ?>
							</div>
							<!-- END OF PRODUCT SUMMARY -->
						</div>
						<!-- shop_single -->
						<div class="clearfix"></div>
						<!-- shop_related -->
						<div class="shop_related">
							<?php woocommerce_output_related_products(); ?>
						</div>
						<!-- shop_related -->
					<?php endwhile; ?>
