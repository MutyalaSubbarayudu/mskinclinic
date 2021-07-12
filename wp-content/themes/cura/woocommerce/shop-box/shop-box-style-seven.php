<?php
/**
 * Shop Box Style Seven Template
 *
 * @package cura
 */

?>

<!-- radiantthemes-shop-box style-seven -->
<div <?php post_class( 'radiantthemes-shop-box  style-seven' ); ?>>
	<div class="holder">
		<div class="pic"><div class="rt-wishlist"></div>
		<?php if ( $product->is_on_sale() ) { ?>
			<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale', 'cura' ) . '</span>', $post, $product ); ?>
		<?php } ?>
		<?php if ( $product->is_featured() ) { ?>
			<?php echo '<span class="best">' . esc_html__( 'Best', 'cura' ) . '</span>'; ?>
		<?php } ?>
			<div class="product-image" style="background-image:url(<?php the_post_thumbnail_url( 'large' ); ?>)"></div>
			<a class="overlay" href="<?php the_permalink(); ?>"></a>
			<div class="stock-buttons">
			<?php
			if ( $product->is_in_stock() ) {
				echo wc_get_stock_html( $product ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
			</div>

		<div class="box-holder">
				<?php
				do_action( 'woocommerce_after_shop_loop_item' );
				?>
			</div>
		</div>
		<div class="data">
			<?php
			/**
			 * Woocommerce Before Shop Loop Item hook.
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );
			?>
			<?php
			/**
			 * Woocommerce Shop Loop Item Title hook.
			 * woocommerce_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
			do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			</a>
			</div>




	</div>
</div>
<!-- radiantthemes-shop-box style-seven -->
