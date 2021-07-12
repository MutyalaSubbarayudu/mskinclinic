<?php
/**
 * Shop Box Style Four Template
 *
 * @package cura
 */

?>

<!-- radiantthemes-shop-box style-four -->
<div <?php post_class( 'radiantthemes-shop-box matchHeight style-four' ); ?>>
	<div class="holder">
		<?php if ( $product->is_on_sale() ) { ?>
			<?php echo wp_kses( apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'cura' ) . '</span>', $post, $product ), 'rt-content' ); ?>
		<?php } ?>
		<div class="pic">
			<div class="product-image" style="background-image:url(<?php esc_url( the_post_thumbnail_url( 'large' ) ); ?>)"></div>
			<div class="primary-info">
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
				?>
				</a>
				<ul class="product-category">
					<?php
					$terms = get_the_terms( get_the_id(), 'product_cat' );
					foreach ( $terms as $term ) {
						$product_cat_name = $term->name;
						$term_link        = get_term_link( $term, 'product_cat' );
						?>
					<li><a href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $product_cat_name ); ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="action-buttons">
				<?php
				/**
				 * Woocommerce After Shop Loop Item hook.
				 * woocommerce_after_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );
				?>
			</div>
			<div class="secondary-info">
				<?php
				/**
				 * Woocommerce After Shop Loop Item Title hook.
				 * woocommerce_after_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
			</div>
		</div>
	</div>
</div>
<!-- radiantthemes-shop-box style-four -->
