<?php
/**
 * Template Style Ten Pricing Table
 *
 * @package RadiantThemes
 */
	if ( ! empty( $settings['pricing_table_title'] ) ) {
	echo'<h3 class="rt-pricing-title">' . $settings['pricing_table_title'] . '</h3>';
	}    
	if ( ! empty( $settings['pricing_table_price'] ) ) {   
	echo '<div class="rt-price">' . $settings['pricing_table_currency_symbol'] . ' ' . $settings['pricing_table_price'] . '<sub>/ ' . $settings['pricing_table_period'] . '</sub></div>';
	}
	echo'<div class="rt-list">' .$settings['content'].'</div>';

	echo'<div class="rt-table-buy">';
	echo'<a href="' . $settings['pricing_table_button_link'] . '" class="rt-pricing-action">' . $settings['pricing_table_button'] . '<i class="fa fa-angle-right"></i></a>';
	echo'</div>';