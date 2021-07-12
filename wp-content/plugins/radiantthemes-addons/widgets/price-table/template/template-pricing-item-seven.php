<?php
/**
 * Template Style Seven Pricing Table
 *
 * @package RadiantThemes
 */
 
	echo'<div class="holder">';
	if ( $settings['pricing_table_spotlight_text'] ) {
	echo'<div class="spotlight-tag">';
	echo'<p class="spotlight-tag-text">' . $settings['pricing_table_spotlight_text'] . '</p>';
	echo'</div>';
	}
	if ( $settings['pricing_table_image_seven'] ) {
	echo'<div class="icon">';
	echo wp_get_attachment_image( $settings['pricing_table_image_seven']['id'], 'full' );
	echo'</div>';
	}
	if ( ! empty( $settings['pricing_table_title'] ) ) {
	echo'<div class="heading">';
	echo'<h4 class="title">' . $settings['pricing_table_title'] . '</h4>';
	echo'</div>';
	}
	if ( ! empty( $settings['pricing_table_price'] ) ) {
	echo'<div class="pricing">';
	echo'<p class="price">';
	echo'<sup>' . $settings['pricing_table_currency_symbol'] . '</sup>' . $settings['pricing_table_price'] . '<sub>/ ' . $settings['pricing_table_period'] . '</sub>';
	echo'</p>';
	echo'</div>';
	}
	echo'<div class="content-list matchHeight">';
	echo $settings['content'];
	echo'</div>';
	echo'<div class="started">';
	echo'<a class="btn" href="' . $settings['pricing_table_button_link'] . '">' . $settings['pricing_table_button'] . '</a>';
	echo'</div>';
	echo'</div>';
 