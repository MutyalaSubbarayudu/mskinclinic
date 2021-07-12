<?php
/**
 * Fancy Text Box Template Style Six
 *
 * @package RadiantThemes
 */
$fancy_textbox_link=$settings['fancy_textbox_link'];
$output     .= '<div class="holder" style="background-image:url(' .$settings['fancy_textbox_image']['url'].');">';
	$output .= '<div class="main-placeholder">';

if ( $settings['fancy_textbox_icontype'] != 'yes' && $settings['fancy_textbox_icon_icofont'] !== '' ) {
	$output     .= '<div class="icon">';
		$output .= '<i class="' . $settings['fancy_textbox_icon'] . '"></i> ';
	$output     .= '</div>';
}
		$output .= '<div class="data">';
if ( $settings['fancy_textbox_title'] !== '' ) {
	if ( $fancy_textbox_link  !== '' ) {
		$output .= '<h4 class="title"><a href="' . ( $fancy_textbox_link ) . '">' . esc_attr( $settings['fancy_textbox_title'] ) . '</a></h4>';
	} else {
		$output .= '<h4 class="title">' . esc_attr( $settings['fancy_textbox_title'] ) . '</h4>';
	}
}
if ( $settings['fancy_textbox_subtitle'] !== '' ) {
	$output .= '<p class="subtitle">' . esc_attr( $settings['fancy_textbox_subtitle'] ) . '</p>';
}
if ( $settings['fancy_textbox_content'] !== '' ) {
	$output     .= '<div class="content">';
		$output .= '<p>' . wp_kses_post( $settings['fancy_textbox_content'] ) . '</p>';
	$output     .= '</div>';
}
if ( $fancy_textbox_link  !== '' ) {
	$output         .= '<div class="more">';
		$output     .= '<a class="btn" href="' . ( $fancy_textbox_link ) . '">';
			$output .= '<span class="btn-icon-first ti-angle-right"></span>';
			$output .= '<span class="btn-icon-second ti-arrow-right"></span>';
		$output     .= '</a>';
	$output         .= '</div>';
}
		$output .= '</div>';
	$output     .= '</div>';
$output         .= '</div>';
