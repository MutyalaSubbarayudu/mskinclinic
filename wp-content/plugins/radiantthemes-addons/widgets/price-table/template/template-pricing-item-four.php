<?php
/**
 * Template Style Four Pricing Table
 *
 * @package RadiantThemes
 */

$output = '<div class="holder">';
$output .= '<div class="spotlight-tag">';
$output .= '<p class="spotlight-tag-text">' . esc_html__( 'Popular Choice', 'radiantthemes-addon' ) . '</p>';
$output .= '</div>';
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
	$output .= '<p class="price"><sup>' . $settings['pricing_table_currency_symbol'] . '</sup>' . $settings['pricing_table_price'] . '<sub>' . $settings['pricing_table_period'] . '</sub></p>';
}
if ( ! empty( $settings['pricing_table_tagline'] ) ) {
	$output .= '<p class="tagline">' . $settings['pricing_table_tagline'] . '</p>';
}
$output .= '</div>';
//$content = preg_replace( '~</?p[^>]*>~', '', $content );
$output .= '<div class="list matchHeight">' .  $settings['content'] . '</div>';
$output .= '<div class="more">';
$output .= '<a class="btn" href="' . $settings['pricing_table_button_link'] . '">' . $settings['pricing_table_button'] . '</a>';
$output .= '</div>';
$output .= '</div>';
echo $output;
