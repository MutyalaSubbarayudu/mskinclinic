<?php
/*
* This file belongs to the YIT Framework.
*
* This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://www.gnu.org/licenses/gpl-3.0.txt
*/

while ( have_posts() ) :
	the_post();
	?>
	<!-- shop_single -->
	<div id="product-<?php the_ID(); ?>" <?php post_class( 'shop_single' ); ?>>
		<?php
		do_action( 'woocommerce_before_single_product' );
		?>
		<!-- START OF PRODUCT IMAGE / GALLERY -->
		<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
		<!-- END OF PRODUCT IMAGE / GALLERY -->
		<!-- START OF PRODUCT SUMMARY -->
		<div class="summary entry-summary">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
		</div>
	</div>
		<!-- END OF PRODUCT SUMMARY -->
	<!-- shop_single -->
	<div class="clearfix"></div>
<?php endwhile; ?>
