<?php
/**
 * Template Style Two for Call to Action
 *
 * @package Radiantthemes
 */

$output  = '<div class="rt-call-to-action-wraper element-' . esc_attr( $settings['calltoaction_style'] ) . ' '. $rt_animation . ' ' . esc_attr( $settings['extra_class'] ) . '" ' . $cta_id . ' ' . $time . ' style="background-color:' . esc_attr( $settings['calltoaction_background_color'] ) . ';">';
$output .= '<div class="rt-call-to-action-wraper-overlay" style="background-color:' . esc_attr( $settings['calltoaction_overlay_color'] ) . ';"></div>';
$output .= '<div class="row rt-call-to-action">';
$output .= '<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">';
$output .= '<div class="rt-call-to-action-item matchHeight text-' . esc_attr( $settings['calltoaction_title_align'] ) . '">';
$output .= '<div class="table">';
$output .= '<div class="table-cell">';
if ( ! empty( $settings['calltoaction_title'] ) ) {
	$output .= '<h3' . $title_style . '>' . esc_attr( $settings['calltoaction_title'] ) . '</h3>';
}
if ( ! empty( $settings['calltoaction_content'] ) ) {
	$output .= '<p' . $content_style . '>' . wp_kses_post( $settings['calltoaction_content'] ) . '</p>';
}
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">';
$output .= '<div class="rt-call-to-action-item matchHeight text-' . esc_attr( $settings['calltoaction_subtitle_align'] ) . '" style="background-color:' . esc_attr( $settings['calltoaction_overlay_color'] ) . ';">';
$output .= '<div class="table">';
$output .= '<div class="table-cell">';
if ( ! empty( $settings['calltoaction_subtitle'] ) ) {
	$output .= '<h4' . $subtitle_style . '>' . wp_kses_post( $settings['calltoaction_subtitle'] ) . '</h4>';
}
if ( ! empty( $settings['calltoaction_button_title'] ) ) {
	$button_url = ( ! empty( $cta_button_link['url'] ) ) ? $cta_button_link['url'] : '#';

	$output .= '<a class="btn ' . esc_attr( $call_to_action_button_design ) . '" href="' . esc_url( $button_url ) . '" title="' . esc_attr( $cta_button_link['title'] ) . '" rel="' . esc_attr( $cta_button_link['rel'] ) . '">';
	$output .= esc_html( $settings['calltoaction_button_title'] );
	$output .= '</a>';
}
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
