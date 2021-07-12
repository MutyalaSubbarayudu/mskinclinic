<?php
/**
 * Template Style One Pricing Table
 *
 * @package RadiantThemes
 */

$output     = '<div class="holder">';
	$output .= '<div class="heading">';
if ( ! empty( $settings['pricing_table_title'] ) ) {
	$output .= '<h4 class="title">' . $settings['pricing_table_title'] . '</h4>';
}
if ( ! empty( $settings['pricing_table_subtitle'] ) ) {
	$output .= '<p class="subtitle">' . $settings['pricing_table_subtitle'] . '</p>';
}
	$output .= '</div>';
	$output .= '<div class="pricing">';
if ( ! empty( $settings['pricing_table_price'] ) ) {
	$output .= '<p class="price"><sup>' . $settings['pricing_table_currency_symbol'] . '</sup>' . $settings['pricing_table_price'] . '</p>';
}
		$output .= '<span class="pricing-tag">' . $settings['pricing_table_period'] . '</span>';
		$output .= '<div class="clearfix"></div>';
if ( ! empty( $settings['pricing_table_tagline'] ) ) {
	$output .= '<p class="tagline">' . $settings['pricing_table_tagline'] .'</p>';
}
	$output     .= '</div>';
	$output     .= '<div class="list">';
	$output     .= $settings['content'];
	$output     .= '</div>';
	$output     .= '<div class="more">';
		$output .= '<a class="btn" href="' . $settings['pricing_table_button_link'] . '">' . $settings['pricing_table_button'] . '</a>';
	$output     .= '</div>';
$output         .= '</div>';
echo $output;
