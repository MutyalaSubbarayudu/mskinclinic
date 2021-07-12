<?php
/**
 * Timeline Template Style One
 *
 * @package Radiantthemes
 */

$tem = 1;
if ( $settings['timeline_items'] ) {

	foreach ( $settings['timeline_items'] as $timeline_items ) {
		$timeline_date = explode( '-', $timeline_items['timeline_item_date'] );
		if ( $tem % 2 ) {

			// FIRST ITEM.
			$output         .= '<!-- radiantthemes-timeline-item -->';
			$output         .= '<div class="radiantthemes-timeline-item">';
				$output     .= '<div class="radiantthemes-timeline-item-line"></div>';
				$output     .= '<div class="radiantthemes-timeline-item-dot"></div>';
				$output     .= '<div class="row">';
					$output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
			if ( wp_get_attachment_image( $timeline_items['radiant_timeline_image']['id'], 'full' ) ) {
				$output     .= '<div class="radiantthemes-timeline-item-pic wow fadeInLeft">';
					$output .= wp_get_attachment_image( $timeline_items['radiant_timeline_image']['id'], 'full' );
				$output     .= '</div>';
			}
					$output         .= '</div>';
					$output         .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
						$output     .= '<div class="radiantthemes-timeline-item-data wow fadeInRight">';
							$output .= '<h4 class="title">' . esc_html( $timeline_items['radiant_timeline_title'] ) . '</h4>';

			if ( $timeline_date[0] && $timeline_date[1] ) {
				$output .= '<div class="date-stamp">' . esc_html( $timeline_date[0] ) . ' ' . esc_html( $timeline_date[1] ) . '</div>';
			}
							$output .= '<div>' . $timeline_items['timeline_content'] . '</div>';
						$output     .= '</div>';
					$output         .= '</div>';
				$output             .= '</div>';
			$output                 .= '</div>';
			$output                 .= '<!-- radiantthemes-timeline-item -->';
		} else {

			// SECOND ITEM.
			$output                 .= '<!-- radiantthemes-timeline-item -->';
			$output                 .= '<div class="radiantthemes-timeline-item">';
				$output             .= '<div class="radiantthemes-timeline-item-line"></div>';
				$output             .= '<div class="radiantthemes-timeline-item-dot"></div>';
				$output             .= '<div class="row">';
					$output         .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
						$output     .= '<div class="radiantthemes-timeline-item-data wow fadeInLeft">';
							$output .= '<h4 class="title">' . esc_html( $timeline_items['radiant_timeline_title'] ) . '</h4>';
			if ( $timeline_date[0] && $timeline_date[1] ) {
				$output .= '<div class="date-stamp">' . esc_html( $timeline_date[0] ) . ' ' . esc_html( $timeline_date[1] ) . '</div>';
			}
							$output .= '<div>' . $timeline_items['timeline_content'] . '</div>';
						$output     .= '</div>';
					$output         .= '</div>';
					$output         .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
			if ( wp_get_attachment_image( $timeline_items['radiant_timeline_image']['id'], 'full' ) ) {
				$output     .= '<div class="radiantthemes-timeline-item-pic wow fadeInRight">';
					$output .= wp_get_attachment_image( $timeline_items['radiant_timeline_image']['id'], 'full' );
				$output     .= '</div>';
			}
					$output .= '</div>';
				$output     .= '</div>';
			$output         .= '</div>';
			$output         .= '<!-- radiantthemes-timeline-item -->';
		}

		$tem++;
	}
}
