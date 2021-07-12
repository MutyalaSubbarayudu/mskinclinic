<?php
/**
 * Fancy Text Box Template Style Seven
 *
 * @package RadiantThemes
 */
$fancy_textbox_link=$settings['fancy_textbox_link'];
$output     .= '<div class="holder">';
	$output .= '<div class="main-placeholder">';
		$output     .= '<div class="icon">';
			if ( $settings['fancy_textbox_icontype'] == 'yes') {
				$output .= wp_get_attachment_image( $settings['fancy_textbox_image']['id'], 'full' );
			}else{
				$output .= '<i class="' . $settings['fancy_textbox_icon'] . '"></i> ';
			}
		$output     .= '</div>';
		$output .= '<div class="data">';
			if ( $settings['fancy_textbox_title'] !== '' ) {
				if ( ( $fancy_textbox_link ) !== '' ) {
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
			if ( ( $fancy_textbox_link ) !== '' ) {
				$output         .= '<div class="more">';
					$output .= '<a class="btn" href="' . ( $fancy_textbox_link ) . '">' . $settings['fancy_textbox_link_title'] . '<i class="fa fa-arrow-right"></i></a>';
					$output         .= '</div>';
			}
		$output .= '</div>';
	$output     .= '</div>';
$output         .= '</div>';
