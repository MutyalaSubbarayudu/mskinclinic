<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cura
 */
?>
<?php 
if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
?>
<?php
    $shopfooterBuilder_id = radiantthemes_global_var('shop_footer_text', '', false);
    ?>
    <!-- wraper_footer -->
    <?php if ( true == radiantthemes_global_var( 'footer_custom_stucking', '', false ) && ! wp_is_mobile() ) { ?>
        <div class="footer-custom-stucking-container"></div>
        <footer class="wraper_footer custom-footer footer-custom-stucking-mode">
    <?php } else { ?>
        <footer class="wraper_footer custom-footer">
    <?php } ?>
        <div class="container">
            <?php echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $shopfooterBuilder_id ); ?>
        </div>
    </footer>
    <!-- wraper_footer -->
<?php }	elseif ( is_singular( 'product' ) ) {?>	
<?php
    $shopDetailsfooterBuilder_id = radiantthemes_global_var('shop_details_footer_text', '', false);
    ?>
    <!-- wraper_footer -->
    <?php if ( true == radiantthemes_global_var( 'footer_custom_stucking', '', false ) && ! wp_is_mobile() ) { ?>
        <div class="footer-custom-stucking-container"></div>
        <footer class="wraper_footer custom-footer footer-custom-stucking-mode">
    <?php } else { ?>
        <footer class="wraper_footer custom-footer">
    <?php } ?>
        <div class="container">
            <?php echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $shopDetailsfooterBuilder_id ); ?>
        </div>
    </footer>
    <!-- wraper_footer -->	
<?php }	elseif ( is_singular( 'doctor' ) ) {?>	
<?php
    $doctorDetailsfooterBuilder_id = radiantthemes_global_var('doctor_details_footer_text', '', false);
    ?>
    <!-- wraper_footer -->
    <?php if ( true == radiantthemes_global_var( 'footer_custom_stucking', '', false ) && ! wp_is_mobile() ) { ?>
        <div class="footer-custom-stucking-container"></div>
        <footer class="wraper_footer custom-footer footer-custom-stucking-mode">
    <?php } else { ?>
        <footer class="wraper_footer custom-footer">
    <?php } ?>
        <div class="container">
            <?php echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $doctorDetailsfooterBuilder_id ); ?>
        </div>
    </footer>
    <!-- wraper_footer -->	
<?php } else {?>
	<?php
    $footerBuilder_id = radiantthemes_global_var('footer_list_text', '', false);
    ?>
    <!-- wraper_footer -->
    <?php if ( true == radiantthemes_global_var( 'footer_custom_stucking', '', false ) && ! wp_is_mobile() ) { ?>
        <div class="footer-custom-stucking-container"></div>
        <footer class="wraper_footer custom-footer footer-custom-stucking-mode">
    <?php } else { ?>
        <footer class="wraper_footer custom-footer">
    <?php } ?>
        <div class="container">
            <?php echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footerBuilder_id ); ?>
        </div>
    </footer>
    <!-- wraper_footer -->
<?php }?>
