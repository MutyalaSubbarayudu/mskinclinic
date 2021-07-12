<?php
/**
 * Template Style Six Pricing Table
 *
 * @package RadiantThemes
 */
	echo'<div class="holder">';
	if ( $settings['pricing_table_image_six'] ) {
	echo'<div class="icon">';
	echo wp_get_attachment_image( $settings['pricing_table_image_six']['id'], 'full' );
	echo'</div>';
	}
	if ( ! empty( $settings['pricing_table_title'] ) ) {
	echo'<div class="plan-name">';
	echo'<h3>' . $settings['pricing_table_title'] . '</h3>';
	echo'</div>';
	}
	echo'<div class="list matchHeight">';
	echo $settings['content'];
	echo'</div>';
	echo'<div class="pricing">';
	if ( ! empty( $settings['pricing_table_price'] ) ) {
	echo'<p class="price"><sup>' . $settings['pricing_table_currency_symbol'] . '</sup>' . $settings['pricing_table_price'] . '<sub>/' . $settings['pricing_table_period'] . '</sub></p>';
	}
	if ( ! empty( $settings['pricing_table_tagline'] ) ) {
	echo'<p class="tagline">' . $settings['pricing_table_tagline'] . '</p>';
	}
	echo'</div>';
	echo'<div class="select-btn">';
	echo'<a class="btn" href="' . $settings['pricing_table_button_link'] . '">' . $settings['pricing_table_button'] . '</a>';
	echo'</div>';
	echo'</div>';
