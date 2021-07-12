<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li>
	<div class="rt-edu-product-item">
		<div class="rt-thumbnail">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
			<?php
			echo wp_kses(
				$product->get_image(),
				array(
					'img' => array(
						'id'     => array(),
						'class'  => array(),
						'style'  => array(),
						'src'    => array(),
						'width'  => array(),
						'height' => array(),
						'alt'    => array(),
						'srcset' => array(),
						'sizes'  => array(),
					),
				)
			);
			?>
		</a>
		</div>
		<div class="product-info">
			<h5 class="rt-product-name">
					<a href="<?php echo esc_url( $product->get_permalink() ); ?>">

		<span class="product-title"><?php echo wp_kses( $product->get_name(), 'rt-content' ); ?></span>
	</a>
			</h5>

							<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
			<span class="price">
				<?php echo wp_kses( $product->get_price_html(), 'rt-content' ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>			</span>
		</div>
	</div>







</li>
