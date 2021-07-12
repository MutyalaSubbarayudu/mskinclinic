<?php
/**
 * Accordion Template Style Five
 *
 * @package Radiantthemes
 */


$output .= '<li class="question'.$rtrand.'">';
$output .= '<div class="plus"></div>';
$output .= '<div class="text">'. esc_html( $item['tab_title'] ) .'</div>';
$output .='</li>';
$output .='<li class="a">';
$output .= $this->parse_text_editor( $item['tab_content'] );
$output .='</li>';
