<?php
/**
 * Template Style Nine Pricing Table
 *
 * @package RadiantThemes
 */
 if ( $settings['pricing_table_highlight'] ) {
echo'<div class="spotlight-tag"><p class="spotlight-tag-text">' . $settings['pricing_table_spotlight_text'] . '</p></div>';
 }
 if ( ! empty( $settings['pricing_table_title'] ) ) {
echo'<h3 class="rt-pricing-title">' . $settings['pricing_table_title'] . '</h3>';
 }
echo'<div class="rt-list">' .$settings['content'].'</div>';
if ( ! empty( $settings['pricing_table_price'] ) ) {
echo'<div class="rt-price">' . $settings['pricing_table_currency_symbol'] . ' ' . $settings['pricing_table_price'] . '<span class="rt-supsub"><sup class="rt-superscript">' . $settings['pricing_table_period1'] . '</sup><sub class="rt-subscript">' . $settings['pricing_table_period'] . '</sub></span></div>';
}
echo'<div class="rt-table-buy"><a href="' . $settings['pricing_table_button_link'] . '" class="rt-pricing-action">' . $settings['pricing_table_button'] . '</a></div>';

