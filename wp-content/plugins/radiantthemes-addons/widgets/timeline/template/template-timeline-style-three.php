<?php
/**
 * Timeline Template Style Three
 *
 * @package RadiantThemes
 */

if ( $settings['timeline_items'] ) {

	$output .= '<div class="radiantthemes-timeline-slider owl-carousel">';

	foreach ( $settings['timeline_items'] as $timeline_items ) {
		$timeline_date = explode( '-', $timeline_items['timeline_item_date'] );

		$output .= '<div class="radiantthemes-timeline-item" data-thumb="' . esc_html( $timeline_date[2] ) . '">';
		$output .= '<div class="row">';
		$output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
		$output .= '<div class="radiantthemes-timeline-item-pic matchHeight">';
		$output .= '<div class="table">';
		$output .= '<div class="table-cell">';
		$output .= '<div class="radiantthemes-timeline-item-pic-holder">';
		$output .= '<div class="radiantthemes-timeline-item-pic-main" style="background-image:url(' . wp_get_attachment_url( $timeline_items['radiant_timeline_image']['id'], 'full' ) . ');"></div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
		$output .= '<div class="radiantthemes-timeline-item-data matchHeight">';
		$output .= '<div class="table">';
		$output .= '<div class="table-cell">';
		$output .= '<p class="date">' . esc_html( $timeline_date[0] ) . ', ' . esc_html( $timeline_date[2] ) . '</p>';
		$output .= '<h4 class="title">' . esc_html( $timeline_items['radiant_timeline_title'] ) . '</h4>';
		$output .= $timeline_items['timeline_content'];
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	}

	$output .= '</div>';
}
