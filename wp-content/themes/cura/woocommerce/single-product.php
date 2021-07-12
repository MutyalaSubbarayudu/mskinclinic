<?php
	/**
	 * Template Single Product
	 *
	 * @see     https://docs.woocommerce.com/document/template-structure/
	 * @package WooCommerce/Templates
	 * @version 3.4.0
	 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

	get_header( 'shop' ); ?>

	<?php if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
		<!-- wraper_shop_single -->
		<div class="wraper_shop_single style-two">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
						<!-- START SHOP SINGLE CONTENT -->
						<?php include get_parent_theme_file_path( 'woocommerce/shop-details-box/shop-details-box-style-one.php' ); ?>
						<!-- END SHOP SINGLE CONTENT -->
					</div>
				</div>
				<!-- row -->
			</div>
		</div>
		<!-- wraper_shop_single -->
	<?php } else { ?>
		<!-- wraper_shop_single -->
		<div class="wraper_shop_single <?php echo esc_html( radiantthemes_global_var( 'shop-details-style', '', false ) ); ?>">
			<div class="container">
				<!-- row -->
				<div class="row">
					<?php if ( 'shop-details-nosidebar' === radiantthemes_global_var( 'shop-details-sidebar', '', false ) ) { ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
					<?php } else { ?>
						<?php if ( 'shop-details-leftsidebar' === radiantthemes_global_var( 'shop-details-sidebar', '', false ) ) { ?>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right">
						<?php } elseif ( 'shop-details-rightsidebar' === radiantthemes_global_var( 'shop-details-sidebar', '', false ) ) { ?>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-left">
						<?php } else { ?>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<?php } ?>
					<?php } ?>

						<!-- START SHOP SINGLE CONTENT -->
						<?php
						if ( ! empty( radiantthemes_global_var( 'shop-details-style', '', false ) ) ) {
							include get_parent_theme_file_path( 'woocommerce/shop-details-box/shop-details-box-' . radiantthemes_global_var( 'shop-details-style', '', false ) . '.php' );
						} else {
							include get_parent_theme_file_path( 'woocommerce/shop-details-box/shop-details-box-style-one.php' );
						}
						?>
						<!-- END SHOP SINGLE CONTENT -->

						</div>
					<?php if ( 'shop-details-nosidebar' === radiantthemes_global_var( 'shop-details-sidebar', '', false ) ) { ?>
					<?php } else { ?>
						<?php if ( 'shop-details-leftsidebar' === radiantthemes_global_var( 'shop-details-sidebar', '', false ) ) { ?>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-left">
						<?php } elseif ( 'shop-details-rightsidebar' === radiantthemes_global_var( 'shop-details-sidebar', '', false ) ) { ?>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
						<?php } else { ?>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<?php } ?>
							<aside id="secondary" class="widget-area">
							<?php
								/**
								 * Sidebar
								 */
								dynamic_sidebar( 'radiantthemes-product-sidebar' );
							?>
							</aside>
						</div>
					<?php } ?>
				</div>
				<!-- row -->
			</div>
		</div>
		<!-- wraper_shop_single -->
	<?php } ?>

<?php
get_footer( 'shop' );
