<?php
/**
 * Template for Object Reveal  Two.
 *
 * @package RadiantThemes
 */
 
 $output .= '<div class="rt-image-holder">';
			$output .= '<div class="rt-image">';
				$output .= wp_get_attachment_image( $settings['rt_obj_rev_attach_image']['id'], 'full' );
			$output .= '</div>';
		$output .= '</div>';

