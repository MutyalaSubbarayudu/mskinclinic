<?php
/**
 * Template Style Two Pricing Table
 *
 * @package RadiantThemes
 */

echo '<div class="holder">';
	echo '<div class="heading">';
if ( ! empty( $settings['pricing_table_title'] ) ) {
	echo '<h4 class="title">' . $settings['pricing_table_title'] . '</h4>';
}
if ( ! empty( $settings['pricing_table_subtitle'] ) ) {
	echo '<p class="subtitle">' . $settings['pricing_table_subtitle'] . '</p>';
}
	echo '</div>';
	echo '<div class="pricing">';
if ( ! empty( $settings['pricing_table_price'] ) ) {
	echo '<p  class="price"><sup>' . $settings['pricing_table_currency_symbol'] . '</sup>' . $settings['pricing_table_price'] . '<sub>' . $settings['pricing_table_period'] . '</sub></p>';
}
if ( ! empty( $settings['pricing_table_tagline'] ) ) {
	echo '<p  class="tagline">' . $settings['pricing_table_tagline'] . '</p>';
}
	echo '</div>';
	echo '<div class="list">';
		//$content = preg_replace( '~</?p[^>]*>~', '', $content );
		echo $settings['content'];
	echo '</div>';
	echo '<div class="more">';
		echo '<a class="btn" href="' . $settings['pricing_table_button_link'] . '">' . $settings['pricing_table_button'] . '</a>';
	echo '</div>';
echo '</div>';
