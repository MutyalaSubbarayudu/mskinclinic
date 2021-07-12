<?php
/**
 * Popup Video Template Style One
 *
 * @package Radiantthemes
 */

$output .= '<div class="rt-popup-video element-' . esc_html( $settings['radiant_popup_video_style'] ) . '" data-popup-video-align="' . esc_attr( $settings['radiant_popup_video_alignment'] ) . '">';
$output .= '<div class="holder">';
$output .= '<div class="icon">';
$output .= '<a class="video-link" href="' . esc_url( $settings['radiant_popup_video_link']['url'] ) . '" ' . $target . $nofollow . '>' . wp_get_attachment_image( $settings['radiant_attach_image']['id'], 'full' ) . '</a>';
$output .= '</div></div></div>';
