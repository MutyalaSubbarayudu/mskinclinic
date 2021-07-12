<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * RadiantThemes functions and definitions
 *
 * @link //developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RadiantThemes
 */

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Fire the wp_body_open action.
	 *
	 * @return mixed
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Load TGMPA file.
 */
require get_parent_theme_file_path( '/inc/tgmpa/tgmpa.php' );

// Admin pages.
if ( is_admin() ) {
	include_once get_template_directory() . '/inc/radiantthemes-dashboard/rt-admin.php';
}

if ( ! function_exists( 'radiantthemes_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function radiantthemes_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cura, use a find and replace
		 * to change 'cura' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cura', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link //developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for woocommerce lightbox gallery.
		*/
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top' => esc_html__( 'Primary', 'cura' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		$cura_args = array(
			'default-color' => 'ffffff',
			'default-image' => '',
		);
		add_theme_support( 'custom-background', $cura_args );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add post formats support.
		add_theme_support(
			'post-formats',
			array(
				'image',
				'quote',
				'status',
				'video',
				'audio',
			)
		);
		add_post_type_support( 'post', 'post-formats' );

		// Registers an editor stylesheet for the theme.
		add_editor_style( 'assets/css/radiantthemes-editor-styles.css' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link //codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		// Start.
		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'editor-styles' );

		/**
		 * Register custom fonts.
		 * Based on the function from Twenty Seventeen.
		 */
		function radiantthemes_editor_fonts_url() {
			$fonts_url = '';

			/*
			* Translators: If there are characters in your language that are not
			* supported by Jost, translate this to 'off'. Do not translate
			* into your own language.
			*/
			$jost = esc_html_x( 'on', 'Jost font: on or off', 'cura' );

			if ( 'off' !== $jost ) {
				$font_families = array();
				if ( 'off' !== $jost ) {
					$font_families[] = 'Jost:400,500,600';
				}

				$query_args = array(
					'family' => rawurlencode( implode( '|', $font_families ) ),
					'subset' => rawurlencode( 'latin,latin-ext' ),
				);

				$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
			}
			return esc_url_raw( $fonts_url );
		}

		add_editor_style( radiantthemes_editor_fonts_url() );

		add_action( 'enqueue_block_editor_assets', 'radiantthemes_block_editor_style' );
		add_action( 'enqueue_block_assets', 'radiantthemes_block_style' );

		/**
		 * Undocumented function
		 *
		 * @return void
		 */
		function radiantthemes_block_style() {
			wp_register_style(
				'radiantthemes-block',
				get_parent_theme_file_uri( '/assets/css/radiantthemes-blocks.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'radiantthemes-block' );
		}

		/**
		 * Undocumented function
		 *
		 * @return void
		 */
		function radiantthemes_block_editor_style() {
			wp_register_style(
				'radiantthemes-editor',
				get_parent_theme_file_uri( '/assets/css/radiantthemes-editor.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'radiantthemes-editor' );
		}

		/**
		 * Typekit script
		 *
		 * @return void
		 */
		function radiantthemes_custom_typekit() {
			if ( ! empty( radiantthemes_global_var( 'typekit-id', '', false ) ) ) {
				wp_enqueue_script(
					'radiantthemes-typekit',
					'//use.typekit.net/' . esc_js( radiantthemes_global_var( 'typekit-id', '', false ) ) . '.js',
					array(),
					'1.0',
					true
				);
				wp_add_inline_script( 'radiantthemes-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'radiantthemes_custom_typekit' );

		// Require Redux Framework.
		require_once get_parent_theme_file_path( '/inc/redux-framework/options-init.php' );

		/**
		 * Redux custom css
		 */
		function radiantthemes_custom_redux_css() {
			/**
			 * [radiantthemes_custom_redux_css description]
			 */
			function radiantthemes_override_css_fonts_url() {
				$google_font_url = '';

				/*
				Translators          : If there are characters in your language that are not supported
				by chosen font(s), translate this to 'off'. Do not translate into your own language.
				*/
				if ( 'off' !== _x( 'on', 'Google font: on or off', 'cura' ) ) {
					$google_font_url = add_query_arg( 'family', rawurlencode( 'Jost:400,500,600' ), '//fonts.googleapis.com/css' );
				}
				return $google_font_url;
			}
			wp_enqueue_style(
				'radiantthemes-google-fonts',
				radiantthemes_override_css_fonts_url(),
				array(),
				'1.0.0'
			);
			wp_register_style(
				'simple-dtpicker',
				get_parent_theme_file_uri( '/inc/redux-framework/css/jquery.simple-dtpicker.min.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'simple-dtpicker' );

			wp_register_style(
				'radiantthemes-redux-custom',
				get_parent_theme_file_uri( '/inc/redux-framework/css/radiantthemes-redux-custom.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'radiantthemes-redux-custom' );
			wp_enqueue_script(
				'simple-dtpicker',
				get_parent_theme_file_uri( '/inc/redux-framework/js/jquery.simple-dtpicker.min.js' ),
				array( 'jquery' ),
				time(),
				true
			);
			wp_enqueue_script(
				'radiantthemes-redux-custom',
				get_parent_theme_file_uri( '/inc/redux-framework/js/radiantthemes-redux-custom.js' ),
				array( 'jquery' ),
				time(),
				true
			);

		}
		// This example assumes your opt_name is set to cura_theme_option, replace with your opt_name value.
		add_action( 'redux/page/cura_theme_option/enqueue', 'radiantthemes_custom_redux_css', 2 );

	}
endif;
add_action( 'after_setup_theme', 'radiantthemes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function radiantthemes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'radiantthemes_content_width', 2000 );
}
add_action( 'after_setup_theme', 'radiantthemes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link //developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function radiantthemes_widgets_init() {

	// ADD MAIN SIDEBAR.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cura' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cura' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	// ADD PRODUCT SIDEBAR.
	if ( class_exists( 'woocommerce' ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Product | Sidebar', 'cura' ),
				'id'            => 'radiantthemes-product-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'cura' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
	}

	// ADD FOOTER WIDGET AREA.
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		// cura Footer Areas.
		for ( $j = 1; $j <= 4; $j++ ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer | #', 'cura' ) . $j . '',
					'id'            => 'cura-footer-area-' . $j,
					'description'   => esc_html__( 'Add widgets here.', 'cura' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h5 class="widget-title">',
					'after_title'   => '</h5>',
				)
			);
		}
	}

	// ADD HAMBURGER WIDGET AREA.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Hamburger | Sidebar', 'cura' ),
			'id'            => 'radiantthemes-hamburger-sidebar',
			'description'   => esc_html__( 'Add widgets for "Hamburger" menu from here. To turn it on/off please navigate to "Theme Options > Header" and select "Hamburger" for respetive header styles.', 'cura' ),
			'before_widget' => '<div id="%1$s" class="widget matchHeight %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		)
	);

}
add_action( 'widgets_init', 'radiantthemes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function radiantthemes_scripts() {

	// DEREGISTER STYLESHEETS.
	wp_deregister_style( 'font-awesome' );
	wp_deregister_style( 'font-awesome-css' );
	wp_deregister_style( 'yith-wcwl-font-awesome' );
	wp_deregister_style( 'elementor-icons-shared-0' );
	wp_deregister_style( 'elementor-icons-fa-solid' );

	// ENQUEUE RADIANTTHEMES ALL STYLES.
	wp_enqueue_style(
		'radiantthemes-all',
		get_parent_theme_file_uri( '/assets/css/radiantthemes-all.min.css' ),
		array(),
		time()
	);
	wp_enqueue_style(
		'radiantthemes-swiper',
		get_parent_theme_file_uri( '/assets/css/swiper.min.css' ),
		array(),
		time()
	);

	// ENQUEUE RADIANTTHEMES CUSTOM CSS.
	if ( did_action( 'elementor/loaded' ) ) {
		wp_enqueue_style(
			'radiantthemes-custom',
			get_parent_theme_file_uri( '/assets/css/radiantthemes-custom.css' ),
			array( 'elementor-animations', 'elementor-frontend' ),
			time()
		);
	} else {
		wp_enqueue_style(
			'radiantthemes-custom',
			get_parent_theme_file_uri( '/assets/css/radiantthemes-custom.css' ),
			array(),
			time()
		);
	}

	// ENQUEUE ANIMATE CSS.
	wp_enqueue_style( 'animate-css' );

	// CALL RESET CSS IF REDUX NOT ACTIVE.
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
		wp_enqueue_style(
			'radiantthemes-reset',
			get_parent_theme_file_uri( '/assets/css/radiantthemes-reset.css' ),
			array(),
			time()
		);

		/**
		 * Load Jost and Josefin Sans Google Font when redux framework is not installed.
		 */
		function radiantthemes_default_google_fonts_url() {
			$google_font_url = '';

			/*
			Translators          : If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			*/
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'cura' ) ) {
				$google_font_url = add_query_arg( 'family', rawurlencode( 'Jost:400,500,600' ), '//fonts.googleapis.com/css' );
			}
			return $google_font_url;
		}
		wp_enqueue_style(
			'radiantthemes-default-google-fonts',
			radiantthemes_default_google_fonts_url(),
			array(),
			'1.0.0'
		);
	}

	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		/**
		 * Load Roboto and Josefin Sans Google Font when redux framework is not installed.
		 */
		function radiantthemes_typekit_google_fonts_url() {
			$google_font_url = '';

			/*
			Translators          : If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			*/
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'cura' ) ) {
				$google_font_url = add_query_arg( 'family', rawurlencode( 'Jost:400,500,600' ), '//fonts.googleapis.com/css' );
			}
			return $google_font_url;
		}
		wp_enqueue_style(
			'radiantthemes-typekit-google-fonts',
			radiantthemes_typekit_google_fonts_url(),
			array(),
			'1.0.0'
		);
	}

	// ENQUEUE STYLE.CSS.
	wp_enqueue_style(
		'radiantthemes-style',
		get_stylesheet_uri(),
		array(),
		time()
	);

	// ENQUEUE RAIDNATTHEMES USER CUSTOM - GERERATED FROM REDUX CUSTOM CSS.
	wp_enqueue_style(
		'radiantthemes-user-custom',
		get_parent_theme_file_uri( '/assets/css/radiantthemes-user-custom.css' ),
		array(),
		time()
	);

	// ENQUEUE RADIANTTHEMES DYNAMIC - GERERATED FROM REDUX FRAMEWORK.
	wp_enqueue_style(
		'radiantthemes-dynamic',
		get_parent_theme_file_uri( '/assets/css/radiantthemes-dynamic.css' ),
		array( 'radiantthemes-all' ),
		time()
	);

	//if ( in_array( array( 'advanced-custom-fields/acf.php', 'acf-typography-field/acf-typography.php' ), apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if(class_exists( 'ACF' ) )	{
		$acf_style = '';
	if ( is_page() ) {
		$target_id = '.page-id-';
	} elseif ( is_single() ) {
		$target_id = '.postid-';
	} else {
		$target_id = '';
	}
	
	if ( is_shop() || is_product() ) {
		$shop_page_id = get_option( 'woocommerce_shop_page_id' );
		
		if ( get_field( 'background_color', $shop_page_id ) && ! get_field( 'show_background_banner' ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner{background-color: ' . get_field( 'background_color', $shop_page_id ) . ';background-image: none !important;}';
		}
		if ( get_field( 'banner_padding_top', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner_main > .container{padding-top: ' . get_field( 'banner_padding_top', $shop_page_id ) . 'px;}';
		}
		if ( get_field( 'banner_padding_bottom', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner_main > .container{padding-bottom: ' . get_field( 'banner_padding_bottom', $shop_page_id ) . 'px;}';
		}
		if ( get_field( 'banner_alignment', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner_main .inner_banner_main,';
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title,';
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle';
			$acf_style .= '{text-align: ' . get_field( 'banner_alignment', $shop_page_id ) . ';}';
		}
		if ( get_typography_field( 'banner_title_typography', 'font_family', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-family: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_family', $shop_page_id );
			$acf_style .= ';';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_weight', $shop_page_id );
			$acf_style .= ';}';

		}
		if ( get_typography_field( 'banner_title_typography', 'text_color', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{color: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'text_color', $shop_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_title_typography', 'font_size', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-size: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_size', $shop_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'line_height', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{line-height: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'line_height', $shop_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'text_transform', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{text-transform: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'text_transform', $shop_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'font_family', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-family: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_family', $shop_page_id );
			$acf_style .= ';';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_weight', $shop_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'text_color', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{color: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_color', $shop_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'font_size', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-size: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_size', $shop_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'line_height', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{line-height: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'line_height', $shop_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'text_transform', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{text-transform: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_transform', $shop_page_id );
			$acf_style .= ';}';
		}
		if ( get_field( 'breadcrumb_padding_top', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner_breadcrumb > .container{padding-top: ' . get_field( 'breadcrumb_padding_top', $shop_page_id ) . 'px;}';
		}
		if ( get_field( 'breadcrumb_padding_bottom', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner_breadcrumb > .container{padding-bottom: ' . get_field( 'breadcrumb_padding_bottom', $shop_page_id ) . 'px;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'font_family', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .inner_banner_breadcrumb #crumbs{font-family: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_family', $shop_page_id );
			$acf_style .= ';';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_weight', $shop_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'text_color', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .inner_banner_breadcrumb #crumbs a,.woocommerce-page .inner_banner_breadcrumb #crumbs{color: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_color', $shop_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'font_size', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .inner_banner_breadcrumb #crumbs{font-size: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_size', $shop_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'line_height', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .inner_banner_breadcrumb #crumbs{line-height: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'line_height', $shop_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'text_transform', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .inner_banner_breadcrumb #crumbs{text-transform: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_transform', $shop_page_id );
			$acf_style .= ';}';
		}
		if ( get_field( 'breadcrumb_alignment', $shop_page_id ) ) {
			$acf_style .= '.woocommerce-page .wraper_inner_banner_breadcrumb .inner_banner_breadcrumb{text-align: ';
			$acf_style .= get_field( 'breadcrumb_alignment', $shop_page_id ) . ';}';
		}
	} elseif ( is_page() || is_single() ) {
	    if ( get_field( 'background_color' ) && ! get_field( 'show_background_banner' ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner{background-color: ' . get_field( 'background_color' ) . ';background-image: none !important;}';
		}
		if ( get_field( 'banner_padding_top' ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_main > .container{padding-top: ' . get_field( 'banner_padding_top' ) . 'px;}';
		}
		if ( get_field( 'banner_padding_bottom' ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_main > .container{padding-bottom: ' . get_field( 'banner_padding_bottom' ) . 'px;}';
		}
		if ( get_field( 'banner_alignment' ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_main .inner_banner_main,';
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title,';
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle';
			$acf_style .= '{text-align: ' . get_field( 'banner_alignment' ) . ';}';
		}
		if ( get_typography_field( 'banner_title_typography', 'font_family', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-family: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_family', get_the_ID() );
			$acf_style .= ';';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_weight', get_the_ID() );
			$acf_style .= ';}';

		}
		if ( get_typography_field( 'banner_title_typography', 'text_color', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{color: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'text_color', get_the_ID() );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_title_typography', 'font_size', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-size: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_size', get_the_ID() );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'line_height', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{line-height: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'line_height', get_the_ID() );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'text_transform', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{text-transform: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'text_transform', get_the_ID() );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'font_family', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-family: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_family', get_the_ID() );
			$acf_style .= ';';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_weight', get_the_ID() );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'text_color', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{color: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_color', get_the_ID() );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'font_size', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-size: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_size', get_the_ID() );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'line_height', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{line-height: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'line_height', get_the_ID() );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'text_transform', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{text-transform: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_transform', get_the_ID() );
			$acf_style .= ';}';
		}
		if ( get_field( 'breadcrumb_padding_top' ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_breadcrumb > .container{padding-top: ' . get_field( 'breadcrumb_padding_top' ) . 'px;}';
		}
		if ( get_field( 'breadcrumb_padding_bottom' ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_breadcrumb > .container{padding-bottom: ' . get_field( 'breadcrumb_padding_bottom' ) . 'px;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'font_family', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{font-family: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_family', get_the_ID() );
			$acf_style .= ';';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_weight', get_the_ID() );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'text_color', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{color: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_color', get_the_ID() );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'font_size', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{font-size: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_size', get_the_ID() );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'line_height', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{line-height: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'line_height', get_the_ID() );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'text_transform', get_the_ID() ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{text-transform: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_transform', get_the_ID() );
			$acf_style .= ';}';
		}
		if ( get_field( 'breadcrumb_alignment' ) ) {
			$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_breadcrumb .inner_banner_breadcrumb{text-align: ';
			$acf_style .= get_field( 'breadcrumb_alignment' ) . ';}';
		}
	} elseif ( is_home() ) {
		$blog_page_id = get_option( 'page_for_posts' );
		if ( get_field( 'background_color', $blog_page_id ) && ! get_field( 'show_background_banner' ) ) {
			$acf_style .= '.blog .wraper_inner_banner{background-color: ' . get_field( 'background_color', $blog_page_id ) . ';background-image: none !important;}';
		}
		if ( get_field( 'banner_padding_top', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner_main > .container{padding-top: ' . get_field( 'banner_padding_top', $blog_page_id ) . 'px;}';
		}
		if ( get_field( 'banner_padding_bottom', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner_main > .container{padding-bottom: ' . get_field( 'banner_padding_bottom', $blog_page_id ) . 'px;}';
		}
		if ( get_field( 'banner_alignment', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner_main .inner_banner_main,';
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title,';
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle';
			$acf_style .= '{text-align: ' . get_field( 'banner_alignment', $blog_page_id ) . ';}';
		}
		if ( get_typography_field( 'banner_title_typography', 'font_family', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-family: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_family', $blog_page_id );
			$acf_style .= ';';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_weight', $blog_page_id );
			$acf_style .= ';}';

		}
		if ( get_typography_field( 'banner_title_typography', 'text_color', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{color: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'text_color', $blog_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_title_typography', 'font_size', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-size: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_size', $blog_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'line_height', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{line-height: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'line_height', $blog_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'text_transform', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{text-transform: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'text_transform', $blog_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'font_family', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-family: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_family', $blog_page_id );
			$acf_style .= ';';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_weight', $blog_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'text_color', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{color: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_color', $blog_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'font_size', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-size: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_size', $blog_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'line_height', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{line-height: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'line_height', $blog_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'text_transform', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{text-transform: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_transform', $blog_page_id );
			$acf_style .= ';}';
		}
		if ( get_field( 'breadcrumb_padding_top', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner_breadcrumb > .container{padding-top: ' . get_field( 'breadcrumb_padding_top', $blog_page_id ) . 'px;}';
		}
		if ( get_field( 'breadcrumb_padding_bottom', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner_breadcrumb > .container{padding-bottom: ' . get_field( 'breadcrumb_padding_bottom', $blog_page_id ) . 'px;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'font_family', $blog_page_id ) ) {
			$acf_style .= '.blog .inner_banner_breadcrumb #crumbs{font-family: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_family', $blog_page_id );
			$acf_style .= ';';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_weight', $blog_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'text_color', $blog_page_id ) ) {
			$acf_style .= '.blog .inner_banner_breadcrumb #crumbs a,.blog .inner_banner_breadcrumb #crumbs{color: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_color', $blog_page_id );
			$acf_style .= ';}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'font_size', $blog_page_id ) ) {
			$acf_style .= '.blog .inner_banner_breadcrumb #crumbs{font-size: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_size', $blog_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'line_height', $blog_page_id ) ) {
			$acf_style .= '.blog .inner_banner_breadcrumb #crumbs{line-height: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'line_height', $blog_page_id );
			$acf_style .= 'px;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'text_transform', $blog_page_id ) ) {
			$acf_style .= '.blog .inner_banner_breadcrumb #crumbs{text-transform: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_transform', $blog_page_id );
			$acf_style .= ';}';
		}
		if ( get_field( 'breadcrumb_alignment', $blog_page_id ) ) {
			$acf_style .= '.blog .wraper_inner_banner_breadcrumb .inner_banner_breadcrumb{text-align: ';
			$acf_style .= get_field( 'breadcrumb_alignment', $blog_page_id ) . ';}';
		}
	} elseif ( is_category() || is_archive() || is_tag() || is_author() || is_attachment() || is_404() || is_search() ) {
		$blog_page_id = get_option( 'page_for_posts' );
		if ( get_field( 'background_color', $blog_page_id ) && ! get_field( 'show_background_banner' ) ) {
			$acf_style .= '.wraper_inner_banner{background-color: ' . get_field( 'background_color', $blog_page_id ) . ';background-image: none !important;}';
		}
		if ( get_field( 'banner_padding_top', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner_main > .container{padding-top: ' . get_field( 'banner_padding_top', $blog_page_id ) . 'px !important;}';
		}
		if ( get_field( 'banner_padding_bottom', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner_main > .container{padding-bottom: ' . get_field( 'banner_padding_bottom', $blog_page_id ) . 'px !important;}';
		}
		if ( get_field( 'banner_alignment', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner_main .inner_banner_main,';
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title,';
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle';
			$acf_style .= '{text-align: ' . get_field( 'banner_alignment', $blog_page_id ) . ' !important;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'font_family', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-family: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_family', $blog_page_id );
			$acf_style .= ' !important;';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_weight', $blog_page_id );
			$acf_style .= ' !important;}';

		}
		if ( get_typography_field( 'banner_title_typography', 'text_color', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{color: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'text_color', $blog_page_id );
			$acf_style .= ' !important;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'font_size', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-size: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'font_size', $blog_page_id );
			$acf_style .= 'px !important;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'line_height', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{line-height: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'line_height', $blog_page_id );
			$acf_style .= 'px !important;}';
		}
		if ( get_typography_field( 'banner_title_typography', 'text_transform', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{text-transform: ';
			$acf_style .= get_typography_field( 'banner_title_typography', 'text_transform', $blog_page_id );
			$acf_style .= ' !important;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'font_family', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-family: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_family', $blog_page_id );
			$acf_style .= ' !important; ';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_weight', $blog_page_id );
			$acf_style .= ' !important;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'text_color', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{color: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_color', $blog_page_id );
			$acf_style .= ' !important; }';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'font_size', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-size: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_size', $blog_page_id );
			$acf_style .= 'px !important;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'line_height', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{line-height: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'line_height', $blog_page_id );
			$acf_style .= 'px !important;}';
		}
		if ( get_typography_field( 'banner_subtitle_typography', 'text_transform', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{text-transform: ';
			$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_transform', $blog_page_id );
			$acf_style .= ' !important;}';
		}
		if ( get_field( 'breadcrumb_padding_top', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner_breadcrumb > .container{padding-top: ' . get_field( 'breadcrumb_padding_top', $blog_page_id ) . 'px !important;}';
		}
		if ( get_field( 'breadcrumb_padding_bottom', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner_breadcrumb > .container{padding-bottom: ' . get_field( 'breadcrumb_padding_bottom', $blog_page_id ) . 'px !important;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'font_family', $blog_page_id ) ) {
			$acf_style .= '.inner_banner_breadcrumb #crumbs{font-family: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_family', $blog_page_id );
			$acf_style .= ' !important;';
			$acf_style .= 'font-weight: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_weight', $blog_page_id );
			$acf_style .= ' !important;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'text_color', $blog_page_id ) ) {
			$acf_style .= '.inner_banner_breadcrumb #crumbs{color: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_color', $blog_page_id );
			$acf_style .= ' !important;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'font_size', $blog_page_id ) ) {
			$acf_style .= '.inner_banner_breadcrumb #crumbs{font-size: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_size', $blog_page_id );
			$acf_style .= 'px !important;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'line_height', $blog_page_id ) ) {
			$acf_style .= '.inner_banner_breadcrumb #crumbs{line-height: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'line_height', $blog_page_id );
			$acf_style .= 'px !important;}';
		}
		if ( get_typography_field( 'breadcrumb_typography', 'text_transform', $blog_page_id ) ) {
			$acf_style .= '.inner_banner_breadcrumb #crumbs{text-transform: ';
			$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_transform', $blog_page_id );
			$acf_style .= ' !important;}';
		}
		if ( get_field( 'breadcrumb_alignment', $blog_page_id ) ) {
			$acf_style .= '.wraper_inner_banner_breadcrumb .inner_banner_breadcrumb{text-align: ';
			$acf_style .= get_field( 'breadcrumb_alignment', $blog_page_id ) . ' !important;}';
		}
	} else {
		$acf_style = '';
	}
	wp_add_inline_style(
		'radiantthemes-dynamic',
		$acf_style
	);
}

	/**
	 * ENQUEUE SCRIPTS
	 */
	// ENQUEUE RADIANTTHEMES CUSTOM JQUERY.
	wp_enqueue_script(
		'radiantthemes-custom',
		get_parent_theme_file_uri( '/assets/js/radiantthemes-custom.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// Load Countdown JS and Coming Soon JS.
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		$radiantthemes_theme_option = get_option( 'cura_theme_option' );

		if ( isset( $radiantthemes_theme_option['coming_soon_switch'] ) ) {
			$radiantthemes_coming_soon = $radiantthemes_theme_option['coming_soon_switch'];
		}

		if ( ! is_user_logged_in() && $radiantthemes_coming_soon ) {
			wp_enqueue_script(
				'countdown',
				get_parent_theme_file_uri( '/assets/js/jquery.countdown.min.js' ),
				array( 'jquery' ),
				time(),
				true
			);
			wp_enqueue_script(
				'radiantthemes-comingsoon',
				get_parent_theme_file_uri( '/assets/js/radiantthemes-comingsoon.js' ),
				array( 'jquery' ),
				time(),
				true
			);
		}
	}

	// ENQUEUE SWIPER JQUERY.
	wp_enqueue_script(
		'swiper',
		get_parent_theme_file_uri( '/assets/js/swiper.min.js' ),
		array( '' ),
		time(),
		true
	);
	// ENQUEUE BOOTSTRAP JQUERY.
	wp_enqueue_script(
		'popper.min',
		get_parent_theme_file_uri( '/assets/js/popper.min.js' ),
		array(),
		time(),
		true
	);
	wp_enqueue_script(
		'bootstrap',
		get_parent_theme_file_uri( '/assets/js/bootstrap.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	wp_enqueue_script(
		'mega-menu',
		get_parent_theme_file_uri( '/assets/js/rt-mega.js' ),
		array( 'bootstrap' ),
		time(),
		true
	);

	wp_enqueue_script(
		'rt-velocity',
		get_parent_theme_file_uri( '/assets/js/velocity.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	wp_enqueue_script(
		'rt-velocity-ui',
		get_parent_theme_file_uri( '/assets/js/rt-velocity.ui.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	wp_enqueue_script(
		'rt-vertical-menu',
		get_parent_theme_file_uri( '/assets/js/rt-vertical-menu.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE SIDR JQUERY.
	wp_enqueue_script(
		'sidr',
		get_parent_theme_file_uri( '/assets/js/jquery.sidr.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE MATCHHEIGHT JQUERY.
	wp_enqueue_script(
		'matchheight',
		get_parent_theme_file_uri( '/assets/js/jquery.matchHeight-min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE WOW JQUERY.
	wp_enqueue_script(
		'wow',
		get_parent_theme_file_uri( '/assets/js/wow.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE STICKY JQUERY.
	wp_enqueue_script(
		'sticky',
		get_parent_theme_file_uri( '/assets/js/jquery.sticky.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE FANCYBOX JQUERY.
	wp_enqueue_script(
		'fancybox',
		get_parent_theme_file_uri( '/assets/js/fancy-box.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	// ENQUEUE ISOTOPE JQUERY.
	wp_enqueue_script(
		'isotope-pkgd',
		get_parent_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	if ( is_404() ) {
		// ENQUEUE ODOMETER JQUERY.
		wp_enqueue_script(
			'odometer',
			get_parent_theme_file_uri( '/assets/js/odometer.min.js' ),
			array( 'jquery' ),
			time(),
			true
		);
	}

	wp_enqueue_script(
		'radiantthemes-custom2',
		get_parent_theme_file_uri( '/assets/js/css3-animated.js' ),
		array( 'jquery' ),
		time(),
		true
	);

	if ( class_exists( 'ReduxFrameworkPlugin' ) && 'two' === radiantthemes_global_var( 'blog-style', '', false ) ) {
		wp_enqueue_script(
			'radiantthemes-animOnscroll',
			get_parent_theme_file_uri( '/assets/js/AnimOnScroll.js' ),
			array( 'jquery', 'masonry' ),
			time(),
			true
		);
		wp_enqueue_script(
			'radiantthemes-gridbx',
			get_parent_theme_file_uri( '/assets/js/grid.js' ),
			array( 'jquery' ),
			time(),
			true
		);
	}

	// Load comment-reply.js into footer.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		// enqueue the javascript that performs in-link comment reply fanciness.
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'radiantthemes_scripts' );

/**
 * RadiantThemes Dynamic CSS.
 */
global $wp_filesystem;

if ( defined( 'FS_CHMOD_FILE' ) ) {
	$chmod = FS_CHMOD_FILE;
} else {
	$chmod = 0644;
}

$radiantthemes_theme_options = get_option( 'cura_theme_option' );
ob_start();
require_once get_parent_theme_file_path( '/inc/dynamic-style/radiantthemes-dynamic-style.php' );
$css      = ob_get_clean();
$filename = get_parent_theme_file_path( '/assets/css/radiantthemes-dynamic.css' );

if ( empty( $wp_filesystem ) ) {
	require_once ABSPATH . '/wp-admin/includes/file.php';
	WP_Filesystem();
}

if ( $wp_filesystem ) {
	$wp_filesystem->put_contents(
		$filename,
		$css,
		$chmod // predefined mode settings for WP files.
	);
}

/**
 * Woocommerce Support
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * [radiantthemes_wrapper_start description]
 */
function radiantthemes_wrapper_start() {
	echo wp_kses( '<section id="main">', 'rt-content' );
}
add_action( 'woocommerce_before_main_content', 'radiantthemes_wrapper_start', 10 );

/**
 * [radiantthemes_wrapper_end description]
 */
function radiantthemes_wrapper_end() {
	echo wp_kses( '</section>', 'rt-content' );
}
add_action( 'woocommerce_after_main_content', 'radiantthemes_wrapper_end', 10 );

/**
 * [woocommerce_support description]
 */
function radiantthemes_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'radiantthemes_woocommerce_support' );

// Remove the product rating display on product loops.
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Ajax cart basket.
add_filter( 'woocommerce_add_to_cart_fragments', 'radiantthemes_iconic_cart_count_fragments', 10, 1 );

// Woocommerce product per page.
add_filter( 'loop_shop_per_page', 'radiantthemes_shop_per_page', 20 );

/**
 * Undocumented function
 *
 * @param [type] $cols Column.
 */
function radiantthemes_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = esc_html( radiantthemes_global_var( 'shop-products-per-page', '', false ) );
	return $cols;
}
/**
 * [radiantthemes_iconic_cart_count_fragments description]
 *
 * @param  [type] $fragments description.
 * @return [type]            [description]
 */
function radiantthemes_iconic_cart_count_fragments( $fragments ) {
	$fragments['span.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
	return $fragments;
}

// Woocommerce wishlist button immediately after the add to cart button.
add_action( 'woocommerce_after_add_to_cart_button', 'radiantthemes_custom_action', 5 );

/**
 * Wistlist Button Beside Add To Cart Function.
 */
function radiantthemes_custom_action() {
	if ( class_exists( 'YITH_WCWL_Init' ) ) {
		echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
	}
}

/**
 * Undocumented function
 *
 * @param mixed $add_to_cart_html Add to cart html.
 * @param mixed $product Product.
 * @param mixed $args Arguments.
 * @return string
 */
function radiantthemes_before_after_btn( $add_to_cart_html, $product, $args ) {
	$before = '<div class="radiantthemes-cart-border">'; // Some text or HTML here.
	$after  = '</div>'; // Add some text or HTML here as well.

	return $before . $add_to_cart_html . $after;
}

/**
 * Set Site Icon
 */
function radiantthemes_site_icon() {
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
		if ( radiantthemes_global_var( 'favicon', 'url', true ) ) :
			?>
			<link rel="icon" href="<?php echo esc_url( radiantthemes_global_var( 'favicon', 'url', true ) ); ?>" sizes="32x32" />
			<link rel="icon" href="<?php echo esc_url( radiantthemes_global_var( 'apple-icon', 'url', true ) ); ?>" sizes="192x192">
			<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( radiantthemes_global_var( 'apple-icon', 'url', true ) ); ?>" />
			<meta name="msapplication-TileImage" content="<?php echo esc_url( radiantthemes_global_var( 'apple-icon', 'url', true ) ); ?>" />
		<?php else : ?>
			<link rel="icon" href="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/Favicon-Default.png' ) ); ?>" sizes="32x32" />
			<link rel="icon" href="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/Favicon-192x192-Default.png' ) ); ?>" sizes="192x192">
			<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/Favicon-192x192-Default.png' ) ); ?>" />
			<meta name="msapplication-TileImage" content="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/Favicon-192x192-Default.png' ) ); ?>" />
		<?php endif; ?>
		<?php
	}
}
add_filter( 'wp_head', 'radiantthemes_site_icon' );

add_filter(
	'wp_prepare_attachment_for_js',
	function( $response, $attachment, $meta ) {
		if (
			'image/x-icon' === $response['mime'] &&
			isset( $response['url'] ) &&
			! isset( $response['sizes']['full'] )
		) {
			$response['sizes'] = array(
				'full' => array(
					'url' => $response['url'],
				),
			);
		}
		return $response;
	},
	10,
	3
);

if ( ! function_exists( 'radiantthemes_pagination' ) ) {

	/**
	 * Displays pagination on archive pages
	 */
	function radiantthemes_pagination() {

		global $wp_query;

		$big = 999999999; // need an unlikely integer.

		$paginate_links = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'next_text' => '<span class="lnr lnr-arrow-right"></span>',
				'prev_text' => '<span class="lnr lnr-arrow-left"> </span>',
				'end_size'  => 5,
				'mid_size'  => 5,
				'add_args'  => false,
			)
		);

		// Display the pagination if more than one page is found.
		if ( $paginate_links ) :
			?>

			<div class="pagination clearfix">
				<?php
				$kses_defaults = wp_kses_allowed_html( 'rt-content' );

				$svg_args = array(
					'svg'   => array(
						'class'           => true,
						'aria-hidden'     => true,
						'aria-labelledby' => true,
						'role'            => true,
						'xmlns'           => true,
						'width'           => true,
						'height'          => true,
						'viewbox'         => true, // <= Must be lower case!
					),
					'g'     => array( 'fill' => true ),
					'title' => array( 'title' => true ),
					'path'  => array(
						'd'    => true,
						'fill' => true,
					),
				);

				$allowed_tags = array_merge( $kses_defaults, $svg_args );
				echo wp_kses( $paginate_links, $allowed_tags );
				?>
			</div>

			<?php
		endif;
	}
}

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_load_more_scripts() {

	global $wp_query;

	// now the most interesting part.
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP.
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script().
	wp_localize_script(
		'radiantthemes_loadmore',
		'radiantthemes_loadmore_params',
		array(
			'ajaxurl'      => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX.
			'posts'        => wp_json_encode( $wp_query->query_vars ), // everything about your loop is here.
			'current_page' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
			'max_page'     => $wp_query->max_num_pages,
		)
	);

	wp_enqueue_script( 'radiantthemes_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'radiantthemes_load_more_scripts' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_loadmore_ajax_handler() {

	// prepare our arguments for the query.
	$args                = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged']       = $_POST['page'] + 1; // we need next page to be loaded.
	$args['post_status'] = 'publish';

	// it is always better to use WP_Query but not here.
	query_posts( $args );

	if ( have_posts() ) :
		// run the loop.
		while ( have_posts() ) :
			the_post();
			if ( ! empty( radiantthemes_global_var( 'blog_cat_layout_style', '', false ) ) ) :
				?>
				<?php
				if ( 'one' == radiantthemes_global_var( 'blog_cat_layout_style', '', false ) ) {
					if ( 'leftsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) {
						echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
					} elseif ( 'rightsidebar' === radiantthemes_global_var( 'blog-layout', '', false ) ) {
						echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
					} else {
						echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">';
					}
						get_template_part( 'template-parts/content-blog-one', get_post_format() );
						echo '</div>';

				} else {
					get_template_part( 'template-parts/content-blog-' . radiantthemes_global_var( 'blog_cat_layout_style', '', false ) . '', get_post_format() );
				}
				?>
			<?php else : ?>
				<?php include get_parent_theme_file_path( '/inc/blog/blog-default.php' ); ?>
				<?php
			endif;
		endwhile;
	endif;
	die; // here we exit the script.
}
add_action( 'wp_ajax_loadmore', 'radiantthemes_loadmore_ajax_handler' );
add_action( 'wp_ajax_nopriv_loadmore', 'radiantthemes_loadmore_ajax_handler' );

// index.

/**
 * GET AUTHOR ROLE.
 *
 * @return array
 */
function radiantthemes_get_author_role() {
	global $authordata;
	$author_roles = $authordata->roles;
	$author_role  = array_shift( $author_roles );
	return $author_role;
}

/**
 * Display the breadcrumbs.
 */
function radiantthemes_breadcrumbs() {

	$show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	if ( ! radiantthemes_global_var( 'breadcrumb_arrow_style', '', false ) ) {
		$delimiter = '<span class="gap"><i class="el el-chevron-right"></i></span>';
	} else {
		$delimiter = '<span class="gap"><i class="' . radiantthemes_global_var( 'breadcrumb_arrow_style', '', false ) . '"></i></span>';
	}

	$home         = esc_html__( 'Home', 'cura' ); // text for the 'Home' link.
	$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before       = '<span class="current">'; // tag before the current crumb.
	$after        = '</span>'; // tag after the current crumb.

	global $post;
	$home_link = get_home_url( 'url' );

	if ( is_home() && is_front_page() ) {

		if ( 1 === $show_on_home ) {
			echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'cura' ) . '</a></div>';
		}
	} elseif ( class_exists( 'woocommerce' ) && ( is_shop() || is_singular( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) ) {
		/**
		 * Undocumented function
		 *
		 * @return array
		 */
		function radiantthemes_woocommerce_breadcrumbs() {
			if ( ! radiantthemes_global_var( 'breadcrumb_arrow_style', '', false ) ) {
				$delimiter = '<span class="gap"><i class="el el-chevron-right"></i></span>';
			} else {
				$delimiter = '<span class="gap"><i class="' . radiantthemes_global_var( 'breadcrumb_arrow_style', '', false ) . '"></i></span>';
			}
			return array(
				'delimiter'   => $delimiter,
				'wrap_before' => '<div id="crumbs" itemprop="breadcrumb">',
				'wrap_after'  => '</div>',
				'before'      => '',
				'after'       => '',
				'home'        => _x( 'Home', 'breadcrumb', 'cura' ),
			);
		}
		add_filter( 'woocommerce_breadcrumb_defaults', 'radiantthemes_woocommerce_breadcrumbs' );
		woocommerce_breadcrumb();
	} else {

		echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'cura' ) . '</a> ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
		if ( is_home() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_title( get_option( 'page_for_posts', true ) ) ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_category() ) {
			$this_cat = get_category( get_query_var( 'cat' ), false );
			if ( 0 != $this_cat->parent ) {
				echo get_category_parents( $this_cat->parent, true, ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' );
			}
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Archive by category "', 'cura' ) . single_cat_title( '', false ) . '"' . wp_kses( $after, 'rt-content' );
		} elseif ( is_search() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Search results for "', 'cura' ) . get_search_query() . '"' . wp_kses( $after, 'rt-content' );
		} elseif ( is_day() ) {
			echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
			echo '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time( 'F' ) ) . '</a> ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
			echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_time( 'd' ) ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_month() ) {
			echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
			echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_time( 'F' ) ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_year() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_time( 'Y' ) ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_single() && ! is_attachment() ) {
			if ( 'post' != get_post_type() ) {
				$post_type = get_post_type_object( get_post_type() );
				$slug      = $post_type->rewrite;

				$cpost_label = $slug['slug'];
				$cpost_label = implode( '-', array_map( 'ucfirst', explode( '-', $cpost_label ) ) );
				$cpost_label = str_replace( '-', ' ', $cpost_label );

				if ( 'doctor' == get_post_type() || 'portfolio' == get_post_type() || 'case-studies' == get_post_type() ) {
				} else {
					echo '<a href="' . esc_url( $home_link ) . '/' . esc_attr( $slug['slug'] ) . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
				}

				if ( 1 == $show_current ) {
					echo ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' . wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
				}
			} else {
				$cat  = get_the_category();
				$cat  = $cat[0];
				$cats = get_category_parents( $cat, true, ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' );
				if ( 0 == $show_current ) {
					$cats = preg_replace( "#^(.+)\s$delimiter\s$#", '$1', $cats );
				}
				echo wp_kses( $cats, 'rt-content' );
				if ( 1 == $show_current ) {
					echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
				}
			}
		} elseif ( ! is_single() && ! is_page() && 'post' != get_post_type() && ! is_404() ) {
			$post_type = get_post_type_object( get_post_type() );
			echo wp_kses( $before, 'rt-content' ) . esc_html( $post_type->labels->singular_name ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_attachment() ) {
			$parent = get_post( $post->post_parent );
			$cat    = get_the_category( $parent->ID );
			$cat    = $cat[0];
			echo get_category_parents( $cat, true, ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' );
			echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>';
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' . wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
			}
		} elseif ( is_page() && ! $post->post_parent ) {
			if ( 1 == $show_current ) {
				echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
			}
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id   = $post->post_parent;
			$breadcrumbs = array();
			while ( $parent_id ) {
				$page          = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id     = $page->post_parent;
			}
			$breadcrumbs       = array_reverse( $breadcrumbs );
			$count_breadcrumbs = count( $breadcrumbs );
			for ( $i = 0; $i < $count_breadcrumbs; $i++ ) {
				echo wp_kses( $breadcrumbs[ $i ], 'rt-content' );
				if ( ( count( $breadcrumbs ) - 1 ) != $i ) {
					echo ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
				}
			}
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' . wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
			}
		} elseif ( is_tag() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Posts tagged "', 'cura' ) . single_tag_title( '', false ) . '"' . wp_kses( $after, 'rt-content' );
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Articles posted by ', 'cura' ) . esc_html( $userdata->display_name ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_404() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Error 404', 'cura' ) . wp_kses( $after, 'rt-content' );
		}

		if ( get_query_var( 'paged' ) ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ' (';
			}
			echo esc_html_e( 'Page', 'cura' ) . ' ' . get_query_var( 'paged' );
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ')';
			}
		}

		echo '</div>';
	}
}

/**
 * Undocumented function
 *
 * @param string  $pages Pages.
 * @param integer $range Range.
 * @return void
 */
function radiantthemes_pagination_cpt( $pages = '', $range = 1 ) {
	$showitems = ( $range * 2 ) + 1;

	global $paged;

	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( '' == $pages ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo '<ul class="pagination"><li>Page ' . $paged . ' of ' . $pages . '</li>';
		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo "<a href='" . esc_url( get_pagenum_link( 1 ) ) . "'>&laquo; First</a>";
		}
		if ( $paged > 1 && $showitems < $pages ) {
			echo "<a href='" . esc_url( get_pagenum_link( $paged - 1 ) ) . "'>&lsaquo; Previous</a>";
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				if ( $paged == $i ) {
					echo '<li class="current">' . $i . '</li>';
				} else {
					echo "<a href='" . esc_url( get_pagenum_link( $i ) ) . "' class=\"inactive\">" . $i . '</a>';
				}
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo '<a href="' . esc_url( get_pagenum_link( $paged + 1 ) ) . '">Next &rsaquo;</a>';
		}
		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo "<a href='" . esc_url( get_pagenum_link( $pages ) ) . "'>Last &raquo;</a>";
		}
		echo "</ul>\n";
	}
}

/**
 * Change slug of custom post types
 *
 * @param  [type] $args      description.
 * @param  [type] $post_type description.
 * @return [string]
 */
function radiantthemes_register_post_type_args( $args, $post_type ) {

	if ( 'portfolio' === $post_type ) {
		$args['rewrite']['slug'] = radiantthemes_global_var( 'change_slug_portfolio', '', false );
	}

	if ( 'team' === $post_type ) {
		$args['rewrite']['slug'] = radiantthemes_global_var( 'change_slug_team', '', false );
	}

	if ( 'case-studies' === $post_type ) {
		$args['rewrite']['slug'] = radiantthemes_global_var( 'change_slug_casestudies', '', false );
	}

	return $args;
}
add_filter( 'register_post_type_args', 'radiantthemes_register_post_type_args', 10, 2 );

/**
 * Add new mimes for custom font upload
 */
if ( ! function_exists( 'radiantthemes_upload_mimes' ) ) {
	/**
	 * [radiantthemes_upload_mimes description]
	 *
	 * @param array $existing_mimes description.
	 */
	function radiantthemes_upload_mimes( $existing_mimes = array() ) {
		$existing_mimes['woff']  = 'application/x-font-woff';
		$existing_mimes['woff2'] = 'application/x-font-woff2';
		$existing_mimes['ttf']   = 'application/x-font-ttf';
		$existing_mimes['svg']   = 'image/svg+xml';
		$existing_mimes['eot']   = 'application/vnd.ms-fontobject';
		return $existing_mimes;
	}
}
add_filter( 'upload_mimes', 'radiantthemes_upload_mimes' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_enqueue_scripts() {
	wp_enqueue_style(
		'radiantthemes-admin-styles',
		get_template_directory_uri() . '/inc/radiantthemes-dashboard/css/admin-pages.css',
		array(),
		time()
	);
}
add_action( 'admin_enqueue_scripts', 'radiantthemes_enqueue_scripts' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_dashboard_submenu_page() {
	add_submenu_page(
		'themes.php',
		esc_html__( 'RadiantThemes Dashboard', 'cura' ),
		esc_html__( 'RadiantThemes Dashboard', 'cura' ),
		'manage_options',
		'radiantthemes-dashboard',
		'radiantthemes_screen_welcome'
	);
}
add_action( 'admin_menu', 'radiantthemes_dashboard_submenu_page' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_screen_welcome() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
	require_once get_parent_theme_file_path( '/inc/radiantthemes-dashboard/welcome.php' );
}

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_plugins_submenu_page() {

	add_submenu_page(
		'themes.php',
		esc_html__( 'Radiantthemes Install Plugins', 'cura' ),
		esc_html__( 'Radiantthemes Install Plugins', 'cura' ),
		'manage_options',
		'radiantthemes-admin-plugins',
		'radiantthemes_screen_plugin'
	);

}
add_action( 'admin_menu', 'radiantthemes_plugins_submenu_page' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_screen_plugin() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
	require_once get_parent_theme_file_path( '/inc/radiantthemes-dashboard/install-plugins.php' );
}

/**
 * Redirect to welcome page
 *
 * @return void
 */
function radiantthemes_after_switch_theme() {
	if ( current_user_can( 'manage_options' ) ) {
		wp_safe_redirect( admin_url( 'themes.php?page=radiantthemes-dashboard' ) );
	}
}
add_action( 'after_switch_theme', 'radiantthemes_after_switch_theme' );

/**
 * Function to add Elementor support to various post types.
 *
 * @return void
 */
function radiantthemes_add_cpt_support() {

	// if exists, assign to $cpt_support var.
	$cpt_support = get_option( 'elementor_cpt_support' );

	// check if option DOESN'T exist in db.
	if ( ! $cpt_support ) {
		$cpt_support = array(
			'page',
			'post',
			'testimonial',
			'team',
			'portfolio',
			'client',
			'case-studies',
			'mega_menu',
		); // create array of our default supported post types.
		update_option( 'elementor_cpt_support', $cpt_support ); // write it to the database.
	} elseif ( ! in_array( 'testimonial', $cpt_support, true ) ) {
		$cpt_support[] = 'testimonial'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'team', $cpt_support, true ) ) {
		$cpt_support[] = 'team';
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'portfolio', $cpt_support, true ) ) {
		$cpt_support[] = 'portfolio'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'client', $cpt_support, true ) ) {
		$cpt_support[] = 'client'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'case-studies', $cpt_support, true ) ) {
		$cpt_support[] = 'case-studies'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'mega_menu', $cpt_support, true ) ) {
		$cpt_support[] = 'mega_menu'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	}
	// otherwise do nothing, portfolio already exists in elementor_cpt_support option.
}
add_action( 'after_switch_theme', 'radiantthemes_add_cpt_support' );

/**
 * Function to disable default colors and fonts in Elementor
 *
 * @return void
 */
function radiantthemes_disable_color_fonts_ele() {
	$ele_disable_color = get_option( 'elementor_disable_color_schemes' );
	$ele_disable_fonts = get_option( 'elementor_disable_typography_schemes' );
	$ele_update_fa4    = get_option( 'elementor_load_fa4_shim' );
	if ( ! $ele_disable_color ) {
		update_option( 'elementor_disable_color_schemes', 'yes' );
	}
	if ( ! $ele_disable_color ) {
		update_option( 'elementor_disable_typography_schemes', 'yes' );
	}
	if ( ! $ele_update_fa4 ) {
		update_option( 'elementor_load_fa4_shim', 'yes' );
	}
}
add_action( 'after_switch_theme', 'radiantthemes_disable_color_fonts_ele' );

/**
 * Define the redux/<parent_args_opt_name>/field/typography/custom_fonts callback
 *
 * @param [type] $array Array.
 * @return array
 */
function radiantthemes_custom_fonts( $array ) {
	$theme_options = get_option( 'cura_theme_option' );
	$font_names    = array();
	for ( $i = 1; $i <= 50; $i++ ) {
		if ( ! empty( $theme_options[ 'webfontName' . $i ] ) ) {
			$font_names[] = $theme_options[ 'webfontName' . $i ];
		}
	}

	$final_custom_fonts = array_combine( $font_names, $font_names );
	// make filter magic happen here...
	$array = array(
		esc_html__( 'Custom Fonts', 'cura' ) => $final_custom_fonts,
	);
	return $array;
};

// add the filter.
add_filter( 'redux/cura_theme_option/field/typography/custom_fonts', 'radiantthemes_custom_fonts', 10, 1 );

/**
 * Our hooked in function – $fields is passed via the filter!
 *
 * @param [type] $variablen Description.
 */
function radiantthemes_custom_override_woocommerce_paypal_express_checkout_button_img_url( $variablen ) {
	return get_template_directory_uri() . '/assets/images/Paypal-Checkout.png';
}
add_filter( 'woocommerce_paypal_express_checkout_button_img_url', 'radiantthemes_custom_override_woocommerce_paypal_express_checkout_button_img_url' );

add_filter( 'woocommerce_allow_marketplace_suggestions', '__return_false' );

/**
 * Undocumented function
 *
 * @return array
 */
function radiantthemes_navmenu_navbar_menu_choices() {
	$menus = wp_get_nav_menus();
	$items = array();
	$i     = 0;
	foreach ( $menus as $menu ) {
		if ( 0 == $i ) {
			$default = $menu->slug;
			$i ++;
		}
		$items[ $menu->slug ] = $menu->name;
	}

	return $items;
}

/**
 * Adding Themify icons to icon control in Elementor
 *
 * @param array $tabs Tabs.
 * @return array
 */
function radiantthemes_add_themify_icons_tab( $tabs = array() ) {

	// Append new icons.
	$new_icons = array(
		'arrow-up',
		'arrow-right',
		'arrow-left',
		'arrow-down',
		'arrows-vertical',
		'arrows-horizontal',
		'angle-up',
		'angle-right',
		'angle-left',
		'angle-down',
		'angle-double-up',
		'angle-double-right',
		'angle-double-left',
		'angle-double-down',
		'move',
		'fullscreen',
		'arrow-top-right',
		'arrow-top-left',
		'arrow-circle-up',
		'arrow-circle-right',
		'arrow-circle-left',
		'arrow-circle-down',
		'arrows-corner',
		'split-v',
		'split-v-alt',
		'split-h',
		'hand-point-up',
		'hand-point-right',
		'hand-point-left',
		'hand-point-down',
		'back-right',
		'back-left',
		'exchange-vertical',
		'wand',
		'save',
		'save-alt',
		'direction',
		'direction-alt',
		'user',
		'link',
		'unlink',
		'trash',
		'target',
		'tag',
		'desktop',
		'tablet',
		'mobile',
		'email',
		'star',
		'spray',
		'signal',
		'shopping-cart',
		'shopping-cart-full',
		'settings',
		'search',
		'zoom-in',
		'zoom-out',
		'cut',
		'ruler',
		'ruler-alt-2',
		'ruler-pencil',
		'ruler-alt',
		'bookmark',
		'bookmark-alt',
		'reload',
		'plus',
		'minus',
		'close',
		'pin',
		'pencil',
		'pencil-alt',
		'paint-roller',
		'paint-bucket',
		'na',
		'medall',
		'medall-alt',
		'marker',
		'marker-alt',
		'lock',
		'unlock',
		'location-arrow',
		'layout',
		'layers',
		'layers-alt',
		'key',
		'image',
		'heart',
		'heart-broken',
		'hand-stop',
		'hand-open',
		'hand-drag',
		'flag',
		'flag-alt',
		'flag-alt-2',
		'eye',
		'import',
		'export',
		'cup',
		'crown',
		'comments',
		'comment',
		'comment-alt',
		'thought',
		'clip',
		'check',
		'check-box',
		'camera',
		'announcement',
		'brush',
		'brush-alt',
		'palette',
		'briefcase',
		'bolt',
		'bolt-alt',
		'blackboard',
		'bag',
		'world',
		'wheelchair',
		'car',
		'truck',
		'timer',
		'ticket',
		'thumb-up',
		'thumb-down',
		'stats-up',
		'stats-down',
		'shine',
		'shift-right',
		'shift-left',
		'shift-right-alt',
		'shift-left-alt',
		'shield',
		'notepad',
		'server',
		'pulse',
		'printer',
		'power-off',
		'plug',
		'pie-chart',
		'panel',
		'package',
		'music',
		'music-alt',
		'mouse',
		'mouse-alt',
		'money',
		'microphone',
		'menu',
		'menu-alt',
		'map',
		'map-alt',
		'location-pin',
		'light-bulb',
		'info',
		'infinite',
		'id-badge',
		'hummer',
		'home',
		'help',
		'headphone',
		'harddrives',
		'harddrive',
		'gift',
		'game',
		'filter',
		'files',
		'file',
		'zip',
		'folder',
		'envelope',
		'dashboard',
		'cloud',
		'cloud-up',
		'cloud-down',
		'clipboard',
		'calendar',
		'book',
		'bell',
		'basketball',
		'bar-chart',
		'bar-chart-alt',
		'archive',
		'anchor',
		'alert',
		'alarm-clock',
		'agenda',
		'write',
		'wallet',
		'video-clapper',
		'video-camera',
		'vector',
		'support',
		'stamp',
		'slice',
		'shortcode',
		'receipt',
		'pin2',
		'pin-alt',
		'pencil-alt2',
		'eraser',
		'more',
		'more-alt',
		'microphone-alt',
		'magnet',
		'line-double',
		'line-dotted',
		'line-dashed',
		'ink-pen',
		'info-alt',
		'help-alt',
		'headphone-alt',
		'gallery',
		'face-smile',
		'face-sad',
		'credit-card',
		'comments-smiley',
		'time',
		'share',
		'share-alt',
		'rocket',
		'new-window',
		'rss',
		'rss-alt',
		'control-stop',
		'control-shuffle',
		'control-play',
		'control-pause',
		'control-forward',
		'control-backward',
		'volume',
		'control-skip-forward',
		'control-skip-backward',
		'control-record',
		'control-eject',
		'paragraph',
		'uppercase',
		'underline',
		'text',
		'Italic',
		'smallcap',
		'list',
		'list-ol',
		'align-right',
		'align-left',
		'align-justify',
		'align-center',
		'quote-right',
		'quote-left',
		'layout-width-full',
		'layout-width-default',
		'layout-width-default-alt',
		'layout-tab',
		'layout-tab-window',
		'layout-tab-v',
		'layout-tab-min',
		'layout-slider',
		'layout-slider-alt',
		'layout-sidebar-right',
		'layout-sidebar-none',
		'layout-sidebar-left',
		'layout-placeholder',
		'layout-menu',
		'layout-menu-v',
		'layout-menu-separated',
		'layout-menu-full',
		'layout-media-right',
		'layout-media-right-alt',
		'layout-media-overlay',
		'layout-media-overlay-alt',
		'layout-media-overlay-alt-2',
		'layout-media-left',
		'layout-media-left-alt',
		'layout-media-center',
		'layout-media-center-alt',
		'layout-list-thumb',
		'layout-list-thumb-alt',
		'layout-list-post',
		'layout-list-large-image',
		'layout-line-solid',
		'layout-grid4',
		'layout-grid3',
		'layout-grid2',
		'layout-grid2-thumb',
		'layout-cta-right',
		'layout-cta-left',
		'layout-cta-center',
		'layout-cta-btn-right',
		'layout-cta-btn-left',
		'layout-column4',
		'layout-column3',
		'layout-column2',
		'layout-accordion-separated',
		'layout-accordion-merged',
		'layout-accordion-list',
		'widgetized',
		'widget',
		'widget-alt',
		'view-list',
		'view-list-alt',
		'view-grid',
		'upload',
		'download',
		'loop',
		'layout-sidebar-2',
		'layout-grid4-alt',
		'layout-grid3-alt',
		'layout-grid2-alt',
		'layout-column4-alt',
		'layout-column3-alt',
		'layout-column2-alt',
		'flickr',
		'flickr-alt',
		'instagram',
		'google',
		'github',
		'facebook',
		'dropbox',
		'dropbox-alt',
		'dribbble',
		'apple',
		'android',
		'yahoo',
		'trello',
		'stack-overflow',
		'soundcloud',
		'sharethis',
		'sharethis-alt',
		'reddit',
		'microsoft',
		'microsoft-alt',
		'linux',
		'jsfiddle',
		'joomla',
		'html5',
		'css3',
		'drupal',
		'wordpress',
		'tumblr',
		'tumblr-alt',
		'skype',
		'youtube',
		'vimeo',
		'vimeo-alt',
		'twitter',
		'twitter-alt',
		'linkedin',
		'pinterest',
		'pinterest-alt',
		'themify-logo',
		'themify-favicon',
		'themify-favicon-alt',
	);

	$tabs['my-custom-icons'] = array(
		'name'          => 'rt-themify-icons',
		'label'         => esc_html__( 'Themify Icons', 'cura' ),
		'labelIcon'     => 'ti ti-user',
		'prefix'        => 'ti-',
		'displayPrefix' => 'ti',
		'url'           => 'https://cura.radiantthemes.com/wp-content/themes/cura/assets/css/radiantthemes-all.min.css',
		'icons'         => $new_icons,
		'ver'           => '1.0.0',
	);

	return $tabs;
}
add_filter( 'elementor/icons_manager/additional_tabs', 'radiantthemes_add_themify_icons_tab' );

/**
 * Change Previous/Next icons for Woocommerce pagination.
 *
 * @param array $args Previous/Next Arguments.
 * @return array
 */
function radiantthemes_woo_pagination( $args ) {

	$args['prev_text'] = '<span class="lnr lnr-arrow-left"></span>';
	$args['next_text'] = '<span class="lnr lnr-arrow-right"></span>';

	return $args;
}
add_filter( 'woocommerce_pagination_args', 'radiantthemes_woo_pagination' );

add_filter( 'woocommerce_output_related_products_args', 'radiantthemes_change_number_related_products', 9999 );

/**
 * Undocumented function
 *
 * @param mixed $args Arguments.
 * @return int
 */
function radiantthemes_change_number_related_products( $args ) {
	$args['posts_per_page'] = 4; // # of related products.
	$args['columns']        = 4; // # of columns per row.
	return $args;
}

/**
 * Disable redirection to Getting Started Page after activating Elementor.
 */
add_action(
	'admin_init',
	function() {
		if ( did_action( 'elementor/loaded' ) ) {
			remove_action( 'admin_init', array( \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ) );
		}
	},
	1
);

/**
 * Disable redirection after plugin activation in Woocommerce.
 *
 * @param boolean $boolean Redirect true/false.
 * @return boolean
 */
function radiantthemes_woo_auto_redirect( $boolean ) {
	return true;
}
add_filter( 'woocommerce_prevent_automatic_wizard_redirect', 'radiantthemes_woo_auto_redirect', 20, 1 );

/**
 * Demo Importer
 *
 * @param FW_Ext_Backups_Demo[] $demos Demos.
 * @return FW_Ext_Backups_Demo[]
 */
function radiantthemes_fw_ext_backups_demos( $demos ) {
	$demos_array = array(
		'cura' => array(
			'title'        => __( 'cura', 'cura' ),
			'screenshot'   => 'https://cura.radiantthemes.com/wp-content/themes/cura/screenshot.png',
			'preview_link' => 'https://cura.radiantthemes.com/',
		),
	);

	$download_url = 'https://api.radiantthemes.com/demo-data/cura/';

	foreach ( $demos_array as $id => $data ) {
		$demo = new FW_Ext_Backups_Demo(
			$id,
			'piecemeal',
			array(
				'url'     => $download_url,
				'file_id' => $id,
			)
		);
		$demo->set_title( $data['title'] );
		$demo->set_screenshot( $data['screenshot'] );
		$demo->set_preview_link( $data['preview_link'] );

		$demos[ $demo->get_id() ] = $demo;

		unset( $demo );
	}

	return $demos;
}
add_filter( 'fw:ext:backups-demo:demos', 'radiantthemes_fw_ext_backups_demos' );

// Remove issues with prefetching adding extra views.
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/**
 * Custom query string
 *
 * @param array $vars Query Strings.
 * @return array
 */
function radiantthemes_add_query_vars_filter( $vars ) {
	$vars[] = 'sidebar';
	return $vars;
}
add_filter( 'query_vars', 'radiantthemes_add_query_vars_filter' );

/**
 * WooCommerce Comment Form Fields
 *
 * @param [type] $fields Fields.
 * @return array
 */
function radiantthemes_woo_comment_form_fields( $fields ) {
	if ( function_exists( 'is_product' ) && is_product() ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;

	}
	return $fields;
}
add_filter( 'comment_form_fields', 'radiantthemes_woo_comment_form_fields', 9 );

/**
 * Radiantthemes Website Layout
 *
 * @return void
 */
function radiantthemes_website_layout() {
	global $post;
	if ( class_exists( 'Redux' ) ) {
		if ( 'full-width' === radiantthemes_global_var( 'layout_type', '', false ) ) {
			echo '<div class="radiantthemes-website-layout full-width body-inner">';
		} elseif ( 'boxed' === radiantthemes_global_var( 'layout_type', '', false ) ) {
			echo '<div class="radiantthemes-website-layout boxed">';
		}
	} else {
		echo '<div id="page" class="site full-width">';
	}
	echo '<header id="header" class="rt-dark rt-submenu-light">';
	if ( ! class_exists( 'Redux' ) ) {
		echo '<div class="rt-header-inner">';
		include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
		echo '</div>';
	} elseif ( is_tax( 'product_cat' ) || is_tax( 'product_tag' ) || is_shop() ) {
		$shopdefaultthemeoptions_id = radiantthemes_global_var( 'header_list_text_shop', '', false );
		if ( $shopdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $shopdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} elseif ( is_singular( 'product' ) ) {
		$productdetailpagewsdefaultthemeoptions_id = radiantthemes_global_var( 'header_list_text_product_detail_pages', '', false );
		if ( $productdetailpagewsdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $productdetailpagewsdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} elseif ( is_home() || is_category() || is_archive() || is_tag() || is_author() || is_attachment() ) {
		$blogdefaultthemeoptions_id = radiantthemes_global_var( 'header_list_text_blog', '', false );
		if ( $blogdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $blogdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} elseif ( is_singular( 'post' ) ) {
		$blogdetailpagesdefaultthemeoptions_id = radiantthemes_global_var( 'header_list_text_blog_detail_pages', '', false );
		if ( $blogdetailpagesdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $blogdetailpagesdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} elseif ( is_singular( 'doctor' ) ) {
		$doctordetailpagesdefaultthemeoptions_id = radiantthemes_global_var( 'header_list_text_doctor_detail_pages', '', false );
		if ( $doctordetailpagesdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $doctordetailpagesdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} elseif ( is_404() || is_search() ) {
		$defaultthemeoptions_id = radiantthemes_global_var( 'header_list_text', '', false );
		if ( $defaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $defaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} else {
		wp_reset_postdata();
		$headerBuilder_id = get_post_meta( $post->ID, 'new_custom_header', true );
		if ( $headerBuilder_id ) {
			echo '<div class="rt-header-inner">';
						$template = get_page_by_path( $headerBuilder_id, OBJECT, 'elementor_library' );
						echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template->ID );
			echo '</div>';
		} else {
			$headerbuilderthemeoptions_id = radiantthemes_global_var( 'header_list_text', '', false );
			if ( $headerbuilderthemeoptions_id ) {
				echo '<div class="rt-header-inner">';
						echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $headerbuilderthemeoptions_id );
						echo '</div>';
			} else {
				echo '<div class="rt-header-inner">';
				include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
				echo '</div>';

			}
		}
	}
	echo '</header>';
}

/**
 * Radiantthemes Bannner Selection
 *
 * @return void
 */
function radiantthemes_short_banner_selection() {
	global $post;
	$team_page_info                      = '';
	$radiantthemes_team_bannercheck      = '';
	$portfolio_page_info                 = '';
	$radiantthemes_portfolio_bannercheck = '';
	$case_studies_page_info              = '';
	$radiantthemes_case_studies_banner   = '';
	$radiantthemes_shop_banner           = '';
	$posts_page_id                       = '';
	$radiantthemes_posts_page_bann       = '';

	if ( is_singular( 'doctor' ) || is_tax( 'profession' ) ) {
		$team_page_info = get_page_by_path( 'doctor', OBJECT, 'page' );
		if ( $team_page_info ) {
			$team_page_id                   = $team_page_info->ID;
			$radiantthemes_team_bannercheck = get_post_meta( $team_page_id, 'bannercheck', true );
		}
	} elseif ( is_singular( 'portfolio' ) || is_tax( 'portfolio-category' ) ) {
		$portfolio_page_info = get_page_by_path( 'portfolio', OBJECT, 'page' );
		if ( $portfolio_page_info ) {
			$portfolio_page_id                   = $portfolio_page_info->ID;
			$radiantthemes_portfolio_bannercheck = get_post_meta( $portfolio_page_id, 'bannercheck', true );
		}
	} elseif ( is_singular( 'case-studies' ) || is_tax( 'case-study-category' ) ) {
		$case_studies_page_info = get_page_by_path( 'case-studies', OBJECT, 'page' );
		if ( $case_studies_page_info ) {
			$case_studies_page_id              = $case_studies_page_info->ID;
			$radiantthemes_case_studies_banner = get_post_meta( $case_studies_page_id, 'bannercheck', true );
		}
	} elseif ( class_exists( 'woocommerce' ) && ( is_shop() || is_singular( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) )
						) {
		$shop_page_info = get_page_by_path( 'shop', OBJECT, 'page' );
		if ( $shop_page_info ) {
			$shop_page_id              = $shop_page_info->ID;
			$radiantthemes_shop_banner = get_post_meta( $shop_page_id, 'bannercheck', true );
		}
	} elseif ( is_home() || is_search() || is_category() || is_archive() || is_tag() || is_author() || is_singular( 'post' ) || is_attachment() ) {
		$posts_page_id                 = get_option( 'page_for_posts' );
		$radiantthemes_posts_page_bann = get_post_meta( $posts_page_id, 'bannercheck', true );
	}

	$radiantthemes_bannercheck = get_post_meta( get_the_id(), 'bannercheck', true );

	// CALL BANNER FILES.
	if ( class_exists( 'Redux' ) ) {
		if ( $radiantthemes_bannercheck || $radiantthemes_team_bannercheck || $radiantthemes_portfolio_bannercheck ||
			$radiantthemes_case_studies_banner || $radiantthemes_shop_banner || $radiantthemes_posts_page_bann ) {
				require get_parent_theme_file_path( '/inc/header/banner.php' );
		} elseif ( get_post_type( get_the_ID() ) == 'elementor_library' ) {

		} else {
			require get_parent_theme_file_path( '/inc/header/theme-banner.php' );
		}
	} elseif ( is_404() ) {
	} else {
		require get_parent_theme_file_path( '/inc/header/banner-default.php' );
	}
}
