<?php
/**
 * Template for Object Reveal  One.
 *
 * @package RadiantThemes
 */

$output .= '<div class="holder" data-aos="reveal-item">';
$output .= '<div ' . $this->get_render_attribute_string( 'data_class' ) . '></div>';
$output .= wp_get_attachment_image( $settings['rt_obj_rev_attach_image']['id'], 'full' );
$output .= '</div>';