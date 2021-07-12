<?php
/**
 * Template Style Eight Pricing Table
 *
 * @package RadiantThemes
 */
if ( ! empty( $settings['pricing_table_title'] ) ) {
	echo '<h4>' . $settings['pricing_table_title'] . '</h4>';
}
if ( ! empty( $settings['pricing_table_price'] ) ) {
	echo '<h5><sup>' . $settings['pricing_table_currency_symbol'] . '</sup>' . $settings['pricing_table_price'] . '<sub>' . $settings['pricing_table_period'] . '</sub></h5>';
}
echo $settings['content'];
echo '<div class="butn_area">';
echo '<a class="gen_btn" href="' . $settings['pricing_table_button_link'] . '">' . $settings['pricing_table_button'] . '</a>';    
echo '</div>';
