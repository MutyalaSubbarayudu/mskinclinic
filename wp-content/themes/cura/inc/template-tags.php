<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cura
 */

if ( ! function_exists( 'radiantthemes_global_var' ) ) {
	/**
	 * [radiantthemes_global_var description]
	 *
	 * @param  [type] $cura_opt_one   description.
	 * @param  [type] $cura_opt_two   description.
	 * @param  [type] $cura_opt_check description.
	 * @return [type]                          description
	 */
	function radiantthemes_global_var(
		$cura_opt_one,
		$cura_opt_two,
		$cura_opt_check
	) {
		global $cura_theme_option;
		if ( $cura_opt_check ) {
			if ( isset( $cura_theme_option[ $cura_opt_one ][ $cura_opt_two ] ) ) {
				return $cura_theme_option[ $cura_opt_one ][ $cura_opt_two ];
			}
		} else {
			if ( isset( $cura_theme_option[ $cura_opt_one ] ) ) {
				return $cura_theme_option[ $cura_opt_one ];
			}
		}
	}
}

/**
 * WP kses allowed tags
 *
 * @param array  $tags description.
 * @param string $context description.
 * @return array
 */
function radiantthemes_kses_allowed_html( $tags, $context ) {
	switch ( $context ) {
		case 'rt-content':
			$tags = array(
				'a'          => array(
					'class'    => true,
					'href'     => true,
					'rel'      => true,
					'rev'      => true,
					'name'     => true,
					'target'   => true,
					'download' => array(
						'valueless' => 'y',
					),
					'span'     => true,
				),
				'b'          => array(),
				'blockquote' => array(
					'class'    => true,
					'cite'     => true,
					'lang'     => true,
					'xml:lang' => true,
				),
				'br'         => array(),
				'button'     => array(
					'class'    => true,
					'disabled' => true,
					'name'     => true,
					'type'     => true,
					'value'    => true,
				),
				'caption'    => array(
					'align' => true,
					'class' => true,
				),
				'div'        => array(
					'class'    => true,
					'align'    => true,
					'dir'      => true,
					'lang'     => true,
					'xml:lang' => true,
				),
				'dl'         => array(),
				'dt'         => array(),
				'em'         => array(),
				'fieldset'   => array(),
				'figure'     => array(
					'class'    => true,
					'align'    => true,
					'dir'      => true,
					'lang'     => true,
					'xml:lang' => true,
				),
				'figcaption' => array(
					'align'    => true,
					'dir'      => true,
					'lang'     => true,
					'xml:lang' => true,
				),
				'h1'         => array(
					'class' => true,
					'align' => true,
				),
				'h2'         => array(
					'class' => true,
					'align' => true,
				),
				'h3'         => array(
					'class' => true,
					'align' => true,
				),
				'h4'         => array(
					'class' => true,
					'align' => true,
				),
				'h5'         => array(
					'class' => true,
					'align' => true,
				),
				'h6'         => array(
					'class' => true,
					'align' => true,
				),
				'hr'         => array(
					'align'   => true,
					'noshade' => true,
					'size'    => true,
					'width'   => true,
				),
				'i'          => array(
					'class' => true,
				),
				'img'        => array(
					'class'    => true,
					'alt'      => true,
					'align'    => true,
					'border'   => true,
					'height'   => true,
					'hspace'   => true,
					'loading'  => true,
					'longdesc' => true,
					'vspace'   => true,
					'src'      => true,
					'usemap'   => true,
					'width'    => true,
				),
				'li'         => array(
					'class' => true,
					'align' => true,
					'value' => true,
				),
				'p'          => array(
					'class'    => true,
					'align'    => true,
					'dir'      => true,
					'lang'     => true,
					'xml:lang' => true,
				),
				'span'       => array(
					'class'    => true,
					'i'        => true,
					'dir'      => true,
					'align'    => true,
					'lang'     => true,
					'xml:lang' => true,
				),
				'section'    => array(
					'class'    => true,
					'id'       => true,
					'align'    => true,
					'dir'      => true,
					'lang'     => true,
					'xml:lang' => true,
				),
				'small'      => array(),
				'strong'     => array(),
				'table'      => array(
					'class'       => true,
					'align'       => true,
					'bgcolor'     => true,
					'border'      => true,
					'cellpadding' => true,
					'cellspacing' => true,
					'dir'         => true,
					'rules'       => true,
					'summary'     => true,
					'width'       => true,
				),
				'tbody'      => array(
					'class'   => true,
					'align'   => true,
					'char'    => true,
					'charoff' => true,
					'valign'  => true,
				),
				'td'         => array(
					'class'   => true,
					'abbr'    => true,
					'align'   => true,
					'axis'    => true,
					'bgcolor' => true,
					'char'    => true,
					'charoff' => true,
					'colspan' => true,
					'dir'     => true,
					'headers' => true,
					'height'  => true,
					'nowrap'  => true,
					'rowspan' => true,
					'scope'   => true,
					'valign'  => true,
					'width'   => true,
				),
				'textarea'   => array(
					'cols'     => true,
					'rows'     => true,
					'disabled' => true,
					'name'     => true,
					'readonly' => true,
				),
				'tfoot'      => array(
					'align'   => true,
					'char'    => true,
					'charoff' => true,
					'valign'  => true,
				),
				'th'         => array(
					'abbr'    => true,
					'align'   => true,
					'axis'    => true,
					'bgcolor' => true,
					'char'    => true,
					'charoff' => true,
					'colspan' => true,
					'headers' => true,
					'height'  => true,
					'nowrap'  => true,
					'rowspan' => true,
					'scope'   => true,
					'valign'  => true,
					'width'   => true,
				),
				'thead'      => array(
					'align'   => true,
					'char'    => true,
					'charoff' => true,
					'valign'  => true,
				),
				'title'      => array(),
				'tr'         => array(
					'align'   => true,
					'bgcolor' => true,
					'char'    => true,
					'charoff' => true,
					'valign'  => true,
				),
				'ul'         => array(
					'class' => true,
					'type'  => true,
				),
				'ol'         => array(
					'class'    => true,
					'start'    => true,
					'type'     => true,
					'reversed' => true,
				),
			);
			return $tags;
		default:
			return $tags;
	}
}
add_filter( 'wp_kses_allowed_html', 'radiantthemes_kses_allowed_html', 10, 2 );

if ( ! function_exists( 'radiantthemes_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function radiantthemes_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string  = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$author_image = sprintf(
			get_avatar( get_the_author_meta( 'email' ), '150' )
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'cura' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><span data-hover="' . esc_attr( get_the_author() ) . '">' . esc_html( get_the_author() ) . '</span></a>'
		);

		$published_on = sprintf(
			/*
			 translators: %s: post date. */
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span data-hover="' . esc_html( get_the_date() ) . '">' . esc_html( get_the_date() ) . '</span></a>'
		);

				printf(
					wp_kses(
						'<div class="holder">
                            <div class="author-image hidden">' . $author_image . '</div>
                                <div class="data">
                                    <div class="meta">', 'rt-content'
					)
				);

					printf(
						wp_kses(
							'<span class="published-on"> ' . $published_on . '</span>
    						<span class="byline"> ' . esc_html__( 'By', 'cura' ) . ' ' . $byline . '</span>', 'rt-content'
						)
					);

					// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {
				if ( is_single() ) {
					/* translators: used between list items, there is a space after the comma */
					if ( true == radiantthemes_global_var( 'display_categries', '', false ) ) :
						$categories_list = get_the_category_list( __( ', ', 'cura' ) );
						if ( $categories_list && radiantthemes_categorized_blog() ) {
									printf(
										wp_kses( '<span class="category"><span class="ti-direction-alt"></span> ' . esc_html__( 'In', 'cura' ) . '', 'rt-content' ) .
										/* translators: used between list items, there is a space after the comma */
										esc_html( ' %1$s' ) .
										wp_kses( '</span>', 'rt-content' ),
										wp_kses( $categories_list, 'rt-content' )
									);
						}
								endif;
				}
			}

				echo ' </div>
			</div>
		</div>';

	}
endif;
function radiantthemes_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'cura_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'cura_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so radiantthemes_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so radiantthemes_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in radiantthemes_categorized_blog.
 */
function radiantthemes_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'cura_categories' );
}
add_action( 'edit_category', 'radiantthemes_category_transient_flusher' );
add_action( 'save_post', 'radiantthemes_category_transient_flusher' );
function radiantthemes_search_form_widget( $form ) {
    $form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
    <label>
        <input type="text" class="search-field" placeholder="' . esc_attr__( 'Search Site', 'cura' ) . '" value="' . get_search_query() . '" name="s">
    </label>
    <button type="submit" value="' . esc_attr__( 'Search', 'cura' ) . '">Search</button>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'radiantthemes_search_form_widget', 100 );

function radiantthemes_wc_add_to_cart_message( $message, $products ) {
	$titles = array();
	$count  = 0;

	$show_qty = true;

	if ( ! is_array( $products ) ) {
		$products = array( $products => 1 );
		$show_qty = false;
	}

	if ( ! $show_qty ) {
		$products = array_fill_keys( array_keys( $products ), 1 );
	}

	foreach ( $products as $product_id => $qty ) {
		$titles[] = ( $qty > 1 ? absint( $qty ) . ' &times; ' : '' ) . sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'cura' ), wp_strip_all_tags( get_the_title( $product_id ) ) );
		$count   += $qty;
	}

	$titles = array_filter( $titles );

	$added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', $count, 'cura' ), wc_format_list_of_items( $titles ) );

	// Output success messages.
	if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
		$return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );

		$message = sprintf( '<div class="cart-added"><div class="cart-added-text">%s</div><div class="cart-added-button"><a href="%s" class="rt-button-added-cart button wc-forward">%s</a></div></div>', $added_text, esc_url( $return_to ), esc_html__( 'Continue Shopping', 'cura' ) );
	} else {
		$message = sprintf( '<div class="cart-added"><div class="cart-added-text">%s</div><div class="cart-added-button"><a href="%s" class="rt-button-added-cart button wc-forward">%s</a></div></div>', $added_text, esc_url( wc_get_page_permalink( 'cart' ) ), esc_html__( 'View Cart', 'cura' ) );
	}

	return $message;
}
add_filter( 'wc_add_to_cart_message_html', 'radiantthemes_wc_add_to_cart_message', 10, 2 );
