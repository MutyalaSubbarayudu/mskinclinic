<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cura
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function radiantthemes_body_classes( $classes ) {
	$classes[] = 'radiantthemes';
	$classes[] = 'radiantthemes-' . get_template();

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! is_user_logged_in() && ! empty( radiantthemes_global_var( 'coming_soon_switch', '', false ) ) ) {
		$classes[] = 'rt-coming-soon';
		if ( ! empty( radiantthemes_global_var( 'coming_soon_custom_background_style', '', false ) ) ) {
			$classes[] = 'coming-soon-' . radiantthemes_global_var( 'coming_soon_custom_background_style', '', false );
		}
	} elseif ( ! is_user_logged_in() && ! empty( radiantthemes_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		$classes[] = 'rt-maintenance-mode';
	} elseif ( ! is_user_logged_in() && ! empty( radiantthemes_global_var( 'coming_soon_switch', '', false ) ) && ! empty( radiantthemes_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		$classes[] = 'rt-coming-soon';
	}

	if ( is_404() && ! empty( radiantthemes_global_var( 'error_custom_background_style', '', false ) ) ) {
		$classes[] = 'error-404-' . radiantthemes_global_var( 'error_custom_background_style', '', false );
	}

	if ( ! empty( radiantthemes_global_var( 'scrollbar_switch', '', false ) ) ) {
		$classes[] = 'infinity-scroll';
	}

	return $classes;
}
add_filter( 'body_class', 'radiantthemes_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function radiantthemes_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'radiantthemes_pingback_header' );

/**
 * Customize the title for the 404 page.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function radiantthemes_change_404_title($title) {
    if (is_404()) {
        $title = esc_html__( 'Page Not Found', 'cura' );
    }
    return $title;
}
add_filter( 'pre_get_document_title', 'radiantthemes_change_404_title', 50 );
