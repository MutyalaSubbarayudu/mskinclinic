<?php
/**
 * Template for Contact Box Element One.
 *
 * @package RadiantThemes
 */

$output .= '<ul class="contact">';
if ( $settings['contact_box_address'] ) {
	$output .= '<li class="address"><i class="fa fa-map-marker"></i><strong>' . esc_html__( 'Address', 'radiantthemes-addons' ) . '</strong> ' . $settings['contact_box_address'] . '</li>';
}
if ( $settings['contact_box_email'] ) {
	$output .= '<li class="email"><i class="fa fa-envelope"></i><strong><a href="mailto:' . $settings['contact_box_email'] . '">' . esc_html__( 'Email', 'radiantthemes-addons' ) . '</strong> ' . $settings['contact_box_email'] . '</a></li>';
}
if ( $settings['contact_box_phone'] ) {
	$output .= '<li class="phone"><i class="fa fa-phone"></i><strong><a href="tel:' . $settings['contact_box_phone'] . '">' . esc_html__( 'Phone', 'radiantthemes-addons' ) . '</strong> ' . $settings['contact_box_phone'] . '</a></li>';
}
if ( $settings['contact_box_fax'] ) {
	$output .= '<li class="fax"><i class="fa fa-fax"></i><strong>' . esc_html__( 'Fax', 'radiantthemes-addons' ) . '</strong> ' . $settings['contact_box_fax'] . '</li>';
}
if ( $settings['contact_box_whatsapp'] ) {
	$output .= '<li class="whatsapp"><i class="fa fa-whatsapp"></i><strong>' . esc_html__( 'WhatsApp', 'radiantthemes-addons' ) . '</strong> ' . $settings['contact_box_whatsapp'] . '</li>';
}
$output .= '</ul>';

