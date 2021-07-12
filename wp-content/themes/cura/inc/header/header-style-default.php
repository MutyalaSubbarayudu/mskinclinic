<?php
/**
 * Template for Default Header
 *
 * @package cura
 */

?>

<!-- wraper_header -->
<header class="wraper_header style-default t">
	<!-- wraper_header_main -->
	<div class="wraper_header_main">
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<!-- brand-logo -->
				<div class="brand-logo">
					<div class="table">
						<div class="table-cell">
							<?php if ( has_custom_logo() ) { ?>
								<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );
								$image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', TRUE);
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" data-no-retina="" width="81" height="49">
								</a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><p class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p></a>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- brand-logo -->
				<!-- header-responsive-nav -->
				<div id="rt-mainMenu-trigger"><a class="rt-lines-button x"><span class="lines"></span></a></div>
				<!-- header-responsive-nav -->
				<!-- nav -->
				<div id="rt-mainMenu" style="min-height: 0px;">
					<nav>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'top',
								'fallback_cb'    => false,
								'container'      => false,
								'depth'          => 0,
								'walker'         => new Radiantthemes_Default_Menu_Walker(),
							)
						);

						class Radiantthemes_Default_Menu_Walker extends Walker_Nav_Menu {
							public function start_lvl( &$output, $depth = 0, $args = array() ) {
								// depth dependent classes.
								$indent        = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent.
								$display_depth = ( $depth + 1 ); // because it counts the first submenu as 0.
								$classes       = array(
									'sub-menu rt-dropdown-menu',
									( $display_depth % 2 ? 'menu-odd' : 'menu-even' ),
									( $display_depth >= 2 ? 'sub-sub-menu' : '' ),
									'menu-depth-' . $display_depth,
								);

								$class_names = implode( ' ', $classes );

								// build html.
								$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
							}
							/**
							 * Walker Nav Menu
							 *
							 * @param string       $output Passed by reference. Used to append additional content.
							 * @param WP_Post      $item Menu item data object.
							 * @param integer      $depth Depth of menu item. Used for padding.
							 * @param array|object $args An array|object of wp_nav_menu() arguments.
							 * @param integer      $current_object_id Current Object ID.
							 */
							public function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {

								$this->curItem = $item;
								$indent        = ( $depth ) ? str_repeat( "\t", $depth ) : '';
								$class_names   = '';
								$value         = '';
								$mega_class    = '';

								$is_mega = ( 'mega_menu' === $item->object ) ? true : false;

								if ( $is_mega ) {
									$mega_class = ' menu-item-has-children mega-parent-menu';
								}

								if ( $args->walker->has_children && $depth === 0 ) {
									$extra_names = ' rt-dropdown';
								} elseif ( $args->walker->has_children && $depth !== 0 ) {
									$extra_names = ' rt-dropdown-submenu';
								} else {
									$extra_names = '';
								}

								$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
								$classes[]   = 'menu-item-' . $item->ID;
								$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
								$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . $mega_class . $extra_names . '"' : '';
								$id          = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
								$id          = $id ? ' id="' . esc_attr( $id ) . '"' : '';

								$output        .= $indent . '<li' . $id . $value . $class_names . '>';
								$atts           = array();
								$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
								$atts['target'] = ! empty( $item->target ) ? $item->target : '';
								$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
								$atts['href']   = ! empty( $item->url ) ? $item->url : '';
								$atts           = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
								$attributes     = '';
								$item_output    = '';

								foreach ( $atts as $attr => $value ) {
									if ( ! empty( $value ) ) {
										$value       = ( 'href' === $attr && ! empty( $item->url ) && ! $is_mega ) ? esc_url( $value ) : '#';
										$attributes .= ' ' . $attr . '="' . $value . '"';
									}
								}

								if ( 'page' === $item->object ) {
									$item_output .= $args->before;
									$item_output .= '<a ' . $attributes . ' data-description="' . $item->description . '">';
									$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
									$item_output .= '</a>';
									$item_output .= $args->after;
									// mega menu.
								} else {
									$item_output .= $args->before;
									$item_output .= '<a ' . $attributes . ' data-description="' . $item->description . '">';
									$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
									$item_output .= '</a>';
									$item_output .= $args->after;
								}

								if ( $is_mega ) {
									$post_obj = get_post( $item->object_id, 'OBJECT' );
									if ( did_action( 'elementor/loaded' ) ) {
										$item_output .= '<div class="main-megamenu-holder"><ul class="mega-child-menu"><li>' . \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_obj->ID ) . '</li></ul></div>';
									} else {
										$item_output .= '<div class="main-megamenu-holder"><ul class="mega-child-menu"><li>' . do_shortcode( $post_obj->post_content ) . '</li></ul></div>';
									}
								}

								$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
							}
						}
						?>
					</nav>
				</div>
				<!-- nav -->
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
</header>
<!-- wraper_header -->
