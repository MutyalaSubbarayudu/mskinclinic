<?php
	/**
	 * Template Content Product
	 *
	 * @see     https://docs.woocommerce.com/document/template-structure/
	 * @package WooCommerce/Templates
	 * @version 3.6.0
	 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

	global $product;

	// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<?php
if ( ! empty( radiantthemes_global_var( 'shop_box_style', '', false ) ) ) {
	include get_parent_theme_file_path( 'woocommerce/shop-box/shop-box-' . radiantthemes_global_var( 'shop_box_style', '', false ) . '.php' );
} else {
	include get_parent_theme_file_path( 'woocommerce/shop-box/shop-box-style-seven.php' );
}
