<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * @package cura
 */

// Check if Redux installed.
if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
	return;
}
// This is your option name where all the Redux data is stored.
$opt_name = 'cura_theme_option';

/**
 * SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args  = array(
	// TYPICAL -> Change these values as you need/desire.
	'opt_name'             => $opt_name,
	'disable_tracking'     => true,
	'display_name'         => $theme->get( 'Name' ),
	'display_version'      => esc_html__( 'Powered By: RadiantThemes Customizer', 'cura' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'cura' ),
	'page_title'           => esc_html__( 'Theme Options', 'cura' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => false,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-hammer',
	'admin_bar_priority'   => 50,
	'global_variable'      => '',
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => 61,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => 'dashicons-hammer',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '_options',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'footer_credit'        => $theme->get( 'Name' ),
	'show_import_export'   => true,
	'show_options_object'  => true,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
	'database'             => '',
	'use_cdn'              => true,
	'ajax_save'            => true,
	'hints'                => array(
		'icon_position' => 'right',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color' => 'light',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'duration' => '500',
				'event'    => 'mouseleave unfocus',
			),
		),
	),
);
Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 *
 * ---> START SECTIONS
 *
 */
$ext_path = get_template_directory() . 'inc/redux-framework/extensions/';
Redux::setExtensions( $opt_name, $ext_path );

/**
 * As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */

// -> START Basic Fields.
Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'General', 'cura' ),
		'icon'  => 'el el-cog',
		'id'    => 'theme-general',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Layout', 'cura' ),
		'icon'       => 'el el-screen',
		'id'         => 'layout',
		'subsection' => true,
		'fields'     => array(
			// Layout Type.
			array(
				'id'       => 'layout_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Layout Type', 'cura' ),
				'subtitle' => esc_html__( 'Select layout type.', 'cura' ),
				'options'  => array(
					'full-width' => 'Full Width',
					'boxed'      => 'Boxed',
				),
				'default'  => 'full-width',
			),

			// Layout Type Boxed Width.
			array(
				'id'            => 'layout_type_boxed_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Boxed Width', 'cura' ),
				'subtitle'      => esc_html__( 'Select Boxed width. Min is 1000px, Max is 1400px and Default is 1200px.', 'cura' ),
				'min'           => 1000,
				'step'          => 10,
				'max'           => 1400,
				'default'       => 1200,
				'display_value' => 'text',
				'required'      => array(
					array(
						'layout_type',
						'equals',
						'boxed',
					),
				),
			),

			// Layout Type Boxed Background Color.
			array(
				'id'       => 'layout_type_boxed_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Boxed Background Color', 'cura' ),
				'subtitle' => esc_html__( 'Applies for Boxed layout. (Please Note: This can be overright by setting section background color.)', 'cura' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-website-layout',
				),
				'required' => array(
					array(
						'layout_type',
						'equals',
						'boxed',
					),
				),
			),

			// Layout Type Body Background.
			array(
				'id'       => 'layout_type_body_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Body Background', 'cura' ),
				'subtitle' => esc_html__( 'Choose a background for the theme. (Please Note: This can be overright by setting section background color.)', 'cura' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Favicon', 'cura' ),
		'id'         => 'favicon',
		'icon'       => 'el el-bookmark-empty',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'favicon',
				'type'     => 'media',
				'title'    => esc_html__( 'Favicon', 'cura' ),
				'subtitle' => esc_html__( 'You can upload Favicon on your website. (.ico 32x32 pixels)', 'cura' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Favicon-Default.png',
				),
			),

			array(
				'id'       => 'apple-icon',
				'type'     => 'media',
				'title'    => esc_html__( 'Apple Touch Icon', 'cura' ),
				'subtitle' => esc_html__( 'apple-touch-icon.png 192x192 pixels', 'cura' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Favicon-192x192-Default.png',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Typekit Fonts', 'cura' ),
		'id'         => 'typekit-fonts',
		'icon'       => 'el el-fontsize',
		'subsection' => true,
		'fields'     => array(

			// typekit Switch.
			array(
				'id'       => 'active_typekit',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Typekit', 'cura' ),
				'subtitle' => esc_html__( 'Choose if want to activate typekit or not.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => false,
			),

			array(
				'id'       => 'typekit-id',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Typekit ID Here', 'cura' ),
				'default'  => '',
				'required' => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),

			array(
				'id'       => 'body-typekit',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Body typography', 'cura' ),
				'subtitle' => esc_html__( 'Add the Typekit font family name Here.', 'cura' ),
				'default'  => '',
				'required' => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),

			array(
				'id'       => 'heading-typekit',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Headings typography', 'cura' ),
				'subtitle' => esc_html__( 'Add the Typekit font family name Here.', 'cura' ),
				'default'  => '',
				'required' => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Fonts', 'cura' ),
		'id'         => 'basic-settings',
		'icon'       => 'el el-fontsize',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'             => 'general_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'General', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font of your website.', 'cura' ),
				'font-family'    => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => false,
				'all_styles'     => false,
				'output'         => array( 'body' ),
				'units'          => 'px',
				'default'        => array(
					'font-weight'    => '200',
					'font-size'      => '20px',
					'color'          => '#828282',
					'line-height'    => '32px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),
			array(
				'id'             => 'general_typography2',
				'type'           => 'typography',
				'title'          => esc_html__( 'General', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font of your website.', 'cura' ),
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => false,
				'all_styles'     => false,
				'output'         => array( 'body' ),
				'units'          => 'px',
				'default'        => array(
					'font-family'    => 'Jost',
					'font-weight'    => '400',
					'font-size'      => '16px',
					'color'          => '#696969',
					'line-height'    => '28px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						false,
					),
				),
			),

			array(
				'id'             => 'h1_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H1', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H1 tags of your website.', 'cura' ),
				'font-family'    => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => false,
				'all_styles'     => false,
				'output'         => array( 'h1' ),
				'units'          => 'px',
				'default'        => array(
					'font-weight'    => '200',
					'font-size'      => '20px',
					'color'          => '#101010',
					'line-height'    => '32px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),

			array(
				'id'             => 'h1_typography2',
				'type'           => 'typography',
				'title'          => esc_html__( 'H1', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H1 tags of your website.', 'cura' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h1' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Jost',
					'font-weight'    => '500',
					'font-size'      => '50px',
					'color'          => '#101010',
					'line-height'    => '60px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						false,
					),
				),
			),

			array(
				'id'             => 'h2_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H2', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H2 tags of your website.', 'cura' ),
				'font-family'    => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => false,
				'all_styles'     => false,
				'output'         => array( 'h2' ),
				'units'          => 'px',
				'default'        => array(
					'font-weight'    => '200',
					'font-size'      => '20px',
					'color'          => '#101010',
					'line-height'    => '32px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),
			array(
				'id'             => 'h2_typography2',
				'type'           => 'typography',
				'title'          => esc_html__( 'H2', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H2 tags of your website.', 'cura' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h2' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Jost',
					'font-weight'    => '500',
					'font-size'      => '40px',
					'color'          => '#101010',
					'line-height'    => '50px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						false,
					),
				),
			),

			array(
				'id'             => 'h3_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H3', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H3 tags of your website.', 'cura' ),
				'font-family'    => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => false,
				'all_styles'     => false,
				'output'         => array( 'h3' ),
				'units'          => 'px',
				'default'        => array(
					'font-weight'    => '200',
					'font-size'      => '20px',
					'color'          => '#101010',
					'line-height'    => '32px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),
			array(
				'id'             => 'h3_typography2',
				'type'           => 'typography',
				'title'          => esc_html__( 'H3', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H3 tags of your website.', 'cura' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h3' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Jost',
					'font-weight'    => '500',
					'font-size'      => '36px',
					'color'          => '#101010',
					'line-height'    => '46px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						false,
					),
				),
			),

			array(
				'id'             => 'h4_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H4', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H4 tags of your website.', 'cura' ),
				'font-family'    => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => false,
				'all_styles'     => false,
				'output'         => array( 'h4' ),
				'units'          => 'px',
				'default'        => array(
					'font-weight'    => '200',
					'font-size'      => '20px',
					'color'          => '#101010',
					'line-height'    => '32px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),
			array(
				'id'             => 'h4_typography2',
				'type'           => 'typography',
				'title'          => esc_html__( 'H4', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H4 tags of your website.', 'cura' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h4' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Jost',
					'font-weight'    => '500',
					'font-size'      => '25px',
					'color'          => '#101010',
					'line-height'    => '35px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						false,
					),
				),
			),

			array(
				'id'             => 'h5_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H5', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H5 tags of your website.', 'cura' ),
				'font-family'    => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => false,
				'all_styles'     => false,
				'output'         => array( 'h5' ),
				'units'          => 'px',
				'default'        => array(
					'font-weight'    => '200',
					'font-size'      => '20px',
					'color'          => '#101010',
					'line-height'    => '32px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),
			array(
				'id'             => 'h5_typography2',
				'type'           => 'typography',
				'title'          => esc_html__( 'H5', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H5 tags of your website.', 'cura' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h5' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Jost',
					'font-weight'    => '500',
					'font-size'      => '22px',
					'color'          => '#101010',
					'line-height'    => '32px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						false,
					),
				),
			),

			array(
				'id'             => 'h6_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H6', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H6 tags of your website.', 'cura' ),

				'font-family'    => false,

				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => false,
				'all_styles'     => false,
				'output'         => array( 'h6' ),
				'units'          => 'px',
				'default'        => array(
					'font-weight'    => '200',
					'font-size'      => '20px',
					'color'          => '#101010',
					'line-height'    => '32px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						true,
					),
				),
			),
			array(
				'id'             => 'h6_typography2',
				'type'           => 'typography',
				'title'          => esc_html__( 'H6', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H6 tags of your website.', 'cura' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h6' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Jost',
					'font-weight'    => '500',
					'font-size'      => '18px',
					'color'          => '#101010',
					'line-height'    => '32px',
					'letter-spacing' => '0',
				),
				'required'       => array(
					array(
						'active_typekit',
						'equals',
						false,
					),
				),
			),
		),
	)
);

$fields_array      = array();
$how_many_sections = 50;

for ( $i = 1; $i <= $how_many_sections; $i++ ) {
	$j               = $i - 1;
	$sectionstartid  = 'section-start-';
	$sectionstartid .= $i;

	if ( 1 === $i ) {
		$sectionstart = array(
			'id'     => $sectionstartid,
			'type'   => 'section',
			'title'  => esc_html__( 'Custom Font ', 'cura' ) . $i,
			'indent' => true,
		);
	} else {
		$sectionstart = array(
			'id'       => $sectionstartid,
			'type'     => 'section',
			'title'    => esc_html__( 'Custom Font ', 'cura' ) . $i,
			'indent'   => true,
			'required' => array(
				array(
					'webfontName' . $j,
					'!=',
					false,
				),
			),
		);
	}

	$webfontnameid  = 'webfontName';
	$webfontnameid .= $i;

	$webfontname = array(
		'id'    => $webfontnameid,
		'type'  => 'text',
		'title' => esc_html__( 'Font Name', 'cura' ),
		'desc'  => esc_html__( 'Give this any custom Name', 'cura' ),
	);

	$woofid  = 'woff';
	$woofid .= $i;

	$woof = array(
		'id'             => $woofid,
		'type'           => 'media',
		'title'          => esc_html__( 'WOFF ', 'cura' ),
		'class'          => 'medium-text',
		'mode'           => false,
		'preview'        => false,
		'library_filter' => array( 'woof' ),
		'placeholder'    => 'No Fonts selected',
	);

	$wooftwoid  = 'woffTwo';
	$wooftwoid .= $i;

	$wooftwo = array(
		'id'             => $wooftwoid,
		'type'           => 'media',
		'title'          => esc_html__( 'WOFF2 ', 'cura' ),
		'class'          => 'medium-text',
		'mode'           => false,
		'preview'        => false,
		'library_filter' => array( 'woof2' ),
		'placeholder'    => 'No Fonts selected',
	);

	$ttfid  = 'ttf';
	$ttfid .= $i;

	$ttf = array(
		'id'          => $ttfid,
		'type'        => 'media',
		'title'       => esc_html__( 'TTF ', 'cura' ),
		'class'       => 'medium-text',
		'mode'        => false,
		'preview'     => false,
		'placeholder' => 'No Fonts selected',
	);

	$svgid  = 'svg';
	$svgid .= $i;

	$svg = array(
		'id'          => $svgid,
		'type'        => 'media',
		'title'       => esc_html__( 'SVG ', 'cura' ),
		'class'       => 'medium-text',
		'mode'        => false,
		'preview'     => false,
		'placeholder' => 'No Fonts selected',
	);

	$eotid  = 'eot';
	$eotid .= $i;

	$eot = array(
		'id'          => $eotid,
		'type'        => 'media',
		'title'       => esc_html__( 'EOT ', 'cura' ),
		'class'       => 'medium-text',
		'mode'        => false,
		'preview'     => false,
		'placeholder' => 'No Fonts selected',
	);

	$sectionendid  = 'section-end-';
	$sectionendid .= $i;

	$sectionend = array(
		'id'     => $sectionendid,
		'type'   => 'section',
		'indent' => false,
	);

	array_push( $fields_array, $sectionstart );
	array_push( $fields_array, $webfontname );
	array_push( $fields_array, $woof );
	array_push( $fields_array, $wooftwo );
	array_push( $fields_array, $ttf );
	array_push( $fields_array, $svg );
	array_push( $fields_array, $eot );
	array_push( $fields_array, $sectionend );
}

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Custom Fonts', 'cura' ),
		'icon'       => 'el el-screen',
		'id'         => 'custom-fonts',
		'desc'       => esc_html__( 'Upload Custom Fonts.', 'cura' ),
		'subsection' => true,
		'fields'     => $fields_array,
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Custom Slug', 'cura' ),
		'icon'       => 'el el-folder-open',
		'id'         => 'custom_slug',
		'subsection' => true,
		'fields'     => array(

			// color info.
			array(
				'id'    => 'info_change_slug',
				'type'  => 'info',
				'title' => esc_html__( 'Change Custom Post Type Slug', 'cura' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),
			array(
				'id'       => 'change_slug_portfolio',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio', 'cura' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'cura' ),
				'validate' => 'no_special_chars',
				'default'  => 'project',
			),
			array(
				'id'       => 'change_slug_team',
				'type'     => 'text',
				'title'    => esc_html__( 'Team', 'cura' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'cura' ),
				'validate' => 'no_special_chars',
				'default'  => 'team',
			),
			array(
				'id'       => 'change_slug_casestudies',
				'type'     => 'text',
				'title'    => esc_html__( 'Case Study', 'cura' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'cura' ),
				'validate' => 'no_special_chars',
				'default'  => 'case-studies',
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Preloader', 'cura' ),
		'icon'       => 'el el-hourglass',
		'id'         => 'preloader',
		'subsection' => true,
		'fields'     => array(

			// Preloader Info.
			array(
				'id'    => 'info_preloader',
				'type'  => 'info',
				'title' => esc_html__( 'Preloader Options', 'cura' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Preloader Switch.
			array(
				'id'       => 'preloader_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Preloader', 'cura' ),
				'subtitle' => esc_html__( 'Choose if want to activate Preloader or not.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => false,
			),

			// Preloader Style.
			array(
				'id'       => 'preloader_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Preloader Style', 'cura' ),
				'subtitle' => esc_html__( 'Select Style of the Preloader. (Powered By: "Loading.io")', 'cura' ),
				'options'  => array(
					'circle'    => 'Circle',
					'default'   => 'Default',
					'dual-ring' => 'Dual Ring',
					'ellipsis'  => 'Ellipsis',
					'facebook'  => 'Facebook',
					'grid'      => 'Grid',
					'heart'     => 'Heart',
					'hourglass' => 'Hourglass',
					'ring'      => 'Ring',
					'ripple'    => 'Ripple',
					'roller'    => 'Roller',
					'spinner'   => 'Spinner',
					'percent'   => 'Percentage RightSlide',
				),
				'default'  => 'roller',
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Background Color.
			array(
				'id'       => 'preloader_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Preloader Background Color', 'cura' ),
				'subtitle' => esc_html__( 'Pick a background color for the Preloader.', 'cura' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.preloader',
				),
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Color.
			array(
				'id'       => 'preloader_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Preloader Color', 'cura' ),
				'subtitle' => esc_html__( 'Pick a color for the Preloader.', 'cura' ),
				'default'  => array(
					'color' => '#212127',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color'    => '.lds-circle, .lds-default > div, .lds-ellipsis > div, .lds-facebook > div, .lds-grid > div, .lds-heart > div, .lds-heart > div:after, .lds-heart > div:before, .lds-roller > div:after, .lds-spinner > div:after',
					'border-color'        => '.lds-ripple > div',
					'border-top-color'    => '.lds-dual-ring:after, .lds-hourglass:after, .lds-ring > div',
					'border-bottom-color' => '.lds-dual-ring:after, .lds-hourglass:after',
				),
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Timeout.
			array(
				'id'            => 'preloader_timeout',
				'type'          => 'slider',
				'title'         => esc_html__( 'Preloader Timeout', 'cura' ),
				'subtitle'      => esc_html__( 'Select preloader timeout after successful page load. Min is 100ms, Max is 5000ms and Default is 500ms.', 'cura' ),
				'min'           => 100,
				'step'          => 100,
				'max'           => 5000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Scroll To Top', 'cura' ),
		'icon'       => 'el el-chevron-up',
		'id'         => 'scroll_to_top',
		'subsection' => true,
		'fields'     => array(

			// Scroll To Top Info.
			array(
				'id'    => 'info_scroll_to_top',
				'type'  => 'info',
				'title' => esc_html__( 'Scroll To Top Options', 'cura' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Scroll To Top Switch.
			array(
				'id'       => 'scroll_to_top_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Scroll To Top', 'cura' ),
				'subtitle' => esc_html__( 'Choose if want to activate Scroll To Top or not.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => true,
			),

			// Scroll To Top Direction.
			array(
				'id'       => 'scroll_to_top_direction',
				'type'     => 'select',
				'title'    => esc_html__( 'Direction', 'cura' ),
				'subtitle' => esc_html__( 'Select Direction of the Scroll To Top.', 'cura' ),
				'options'  => array(
					'left'  => 'Left',
					'right' => 'Right',
				),
				'default'  => 'right',
				'required' => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

			// Scroll To Top Background Color.
			array(
				'id'       => 'scroll_to_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'cura' ),
				'subtitle' => esc_html__( 'Pick a background color for the Scroll To Top.', 'cura' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body > .scrollup',
				),
				'required' => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

			// Scroll To Top Icon Color.
			array(
				'id'       => 'scroll_to_top_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Icon Color', 'cura' ),
				'subtitle' => esc_html__( 'Pick a icon color for the Scroll To Top.', 'cura' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => 'body > .scrollup',
				),
				'required' => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Analytics Code', 'cura' ),
		'icon'       => 'el el-folder-open',
		'id'         => 'analytics_code',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'google_site_verification_code',
				'type'     => 'text',
				'title'    => esc_html__( 'Google Site Verification Code', 'cura' ),
				'subtitle' => esc_html__( 'Put Google Site Verification Content. i.e. +2nxGUDJ4QpAZ5l9Bs4jdiLVC21AIh5d1Nl23908vVuFHs34=', 'cura' ),
				'validate' => 'no_special_chars',
				'default'  => '',
			),
			array(
				'id'       => 'google_analytics_code',
				'type'     => 'text',
				'title'    => esc_html__( 'Google Analytics Code', 'cura' ),
				'subtitle' => esc_html__( 'Put Google Analytics code here ( Put the whole code including UA i.e. UA-XXXXX-Y).', 'cura' ),
				'validate' => 'no_special_chars',
				'default'  => '',
			),
			array(
				'id'       => 'fb_pixel_code',
				'type'     => 'text',
				'title'    => esc_html__( 'FB Pixel Code', 'cura' ),
				'subtitle' => esc_html__( 'Put FB Pixel Code code here.', 'cura' ),
				'validate' => 'no_special_chars',
				'default'  => '',
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Header', 'cura' ),
		'icon'  => 'el el-website',
		'id'    => 'header',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'General', 'cura' ),
		'icon'       => 'el el-cog-alt',
		'id'         => 'general',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'header_list_text',
				'title'    => __( 'Select Header Style', 'cura' ),
				'subtitle' => esc_html__( 'If you want to disable header, then create a "Blank Header" and choose that.', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-header',
						),
					),
				),
			),

			array(
				'id'       => 'header_list_text_blog',
				'title'    => __( 'Select Header Style for Blog Page', 'cura' ),
				'subtitle' => esc_html__( 'If you want to disable header, then create a "Blank Header" and choose that.', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-header',
						),
					),
				),
			),

			array(
				'id'       => 'header_list_text_blog_detail_pages',
				'title'    => __( 'Select Header Style for Blog Detail Pages', 'cura' ),
				'subtitle' => esc_html__( 'If you want to disable header, then create a "Blank Header" and choose that.', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-header',
						),
					),
				),
			),
			array(
				'id'       => 'header_list_text_doctor_detail_pages',
				'title'    => __( 'Select Header Style for Doctor Detail Pages', 'cura' ),
				'subtitle' => esc_html__( 'If you want to disable header, then create a "Blank Header" and choose that.', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-header',
						),
					),
				),
			),

			array(
				'id'       => 'header_list_text_shop',
				'title'    => __( 'Select Header Style for Shop Page', 'cura' ),
				'subtitle' => esc_html__( 'If you want to disable header, then create a "Blank Header" and choose that.', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-header',
						),
					),
				),
			),

			array(
				'id'       => 'header_list_text_product_detail_pages',
				'title'    => __( 'Select Header Style for Product Detail Pages', 'cura' ),
				'subtitle' => esc_html__( 'If you want to disable header, then create a "Blank Header" and choose that.', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-header',
						),
					),
				),
			),


		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Short Header', 'cura' ),
		'icon'       => 'el el-website',
		'id'         => 'inner_page_banner',
		'subsection' => true,
		'fields'     => array(

			// Short Header Style Options.
			array(
				'id'       => 'short-header',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Select Short Header', 'cura' ),
				'subtitle' => esc_html__( 'Choose what kind of short header you want to set.', 'cura' ),
				'options'  => array(
					'Banner-With-Breadcrumb' => array(
						'alt'   => esc_html__( 'Banner-With-Breadcrumb', 'cura' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-With-Breadcrumb.png' ),
						'title' => esc_html__( 'Banner & Breadcrumb', 'cura' ),
					),
					'Banner-only'            => array(
						'alt'   => esc_html__( 'Banner Only', 'cura' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-Only.png' ),
						'title' => esc_html__( 'Banner Only', 'cura' ),
					),
					'breadcrumb-only'        => array(
						'alt'   => esc_html__( 'Breadcrumb-Only', 'cura' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Breadcrumb-Only.png' ),
						'title' => esc_html__( 'Breadcrumb Only', 'cura' ),
					),
					'banner-none'            => array(
						'alt'   => esc_html__( 'Banner None', 'cura' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-None.png' ),
						'title' => esc_html__( 'Banner None', 'cura' ),
					),
				),
				'default'  => 'Banner-With-Breadcrumb',
			),

			// Inner Page Banner Info.
			array(
				'id'    => 'inner_page_banner_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Inner Page Banner', 'cura' ),
			),

			// Inner Page Banner Background.
			array(
				'id'       => 'inner_page_banner_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Inner Page Banner Background', 'cura' ),
				'subtitle' => esc_html__( 'Set Background for Inner Page Banner. (Please Note: This is the default image of Inner Page Banner section. You can change background image on respective pages.)', 'cura' ),
				'default'  => array(
					'background-image'    => '',
					'background-color'    => '#eff0f2',
					'background-position' => 'center center',
					'background-repeat'   => 'no-repeat',
					'background-size'     => 'cover',

				),
				'output'   => array(
					'.wraper_inner_banner',
				),
			),

			// Inner Page Banner Border Bottom.
			array(
				'id'       => 'inner_page_banner_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Inner Page Banner Border Bottom', 'cura' ),
				'subtitle' => esc_html__( 'Set Border Bottom for Inner Page Banner.', 'cura' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_inner_banner_main',
				),
			),

			// Inner Page Banner Padding.
			array(
				'id'             => 'inner_page_banner_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Inner Page Banner Height', 'cura' ),
				'subtitle'       => esc_html__( 'Set padding for inner page banner area.', 'cura' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '117px',
					'padding-bottom' => '10px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_main > .container',
				),
			),

			// Inner Page Banner Title Font.
			array(
				'id'             => 'inner_page_banner_title_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Title Font', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner title.', 'cura' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Jost',
					'font-weight'    => '500',
					'font-size'      => '48px',
					'color'          => '#101010',
					'line-height'    => '58px',
					'text-transform' => 'capitalize',
				),
				'output'         => array(
					'.inner_banner_main .title',
				),
			),

			// Inner Page Banner Subtitle Font.
			array(
				'id'             => 'inner_page_banner_subtitle_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Subtitle Font', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner subtitle.', 'cura' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Jost',
					'font-weight' => '400',
					'font-size'   => '16px',
					'color'       => '#101010',
					'line-height' => '36px',
				),
				'output'         => array(
					'.inner_banner_main .subtitle',
				),
			),

			// Inner Page Banner Alignment.
			array(
				'id'      => 'inner_page_banner_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Inner Page Banner Alignment', 'cura' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'left',
			),

			// Breadcrumb Style Info.
			array(
				'id'    => 'breadcrumb_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Breadcrumb', 'cura' ),
			),

			// Breadcrumb Arrow Style.
			array(
				'id'       => 'breadcrumb_arrow_style',
				'type'     => 'select',
				'title'    => __( 'Breadcrumb Arrow Style', 'cura' ),
				'subtitle' => __( 'Select an icon for breadcrumb arrow.', 'cura' ),
				'data'     => 'elusive-icons',
				'default'  => 'el el-chevron-right',
			),

			// Breadcrumb Font.
			array(
				'id'             => 'breadcrumb_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Breadcrumb Font', 'cura' ),
				'subtitle'       => esc_html__( 'This will be the default font of your Inner Page Banner Breadcrumb.', 'cura' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Jost',
					'font-weight' => '400',
					'font-size'   => '16px',
					'color'       => '#696969',
					'line-height' => '28px',
				),
				'output'         => array(
					'.inner_banner_breadcrumb #crumbs, .inner_banner_breadcrumb #crumbs a',
				),
			),

			// Breadcrumb Padding.
			array(
				'id'             => 'breadcrumb_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Breadcrumb Padding', 'cura' ),
				'subtitle'       => esc_html__( 'Set padding for breadcrumb area.', 'cura' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '0px',
					'padding-bottom' => '37px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_breadcrumb > .container',
				),
			),

			// Breadcrumb Alignment.
			array(
				'id'      => 'breadcrumb_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Breadcrumb Alignment', 'cura' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'left',
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Footer', 'cura' ),
		'icon'   => 'el el-photo',
		'id'     => 'footer',
		'fields' => array(

			// Footer Style Info.
			array(
				'id'    => 'footer_style_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Footer Style', 'cura' ),
			),

			// Footer Style Options.
			array(
				'id'       => 'footer-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Footer Style', 'cura' ),
				'subtitle' => esc_html__( 'Select footer style. (N.B.: Please set style for individual footer on their respective settings below.)', 'cura' ),
				'options'  => array(
					'footer-default' => array(
						'alt'   => esc_html__( 'Default Footer', 'cura' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Default.png' ),
						'title' => esc_html__( 'Default Footer', 'cura' ),
					),
					'footer-custom'  => array(
						'alt'   => esc_html__( 'Custom Footer', 'cura' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Custom.png' ),
						'title' => esc_html__( 'Custom Footer ', 'cura' ),
					),
				),
				'default'  => 'footer-default',
			),

			// START OF FOOTER ONE OPTIONS.

			// Footer One Info.
			array(
				'id'       => 'footer_one_info',
				'type'     => 'info',
				'title'    => esc_html__( 'Footer Default Settings', 'cura' ),
				'class'    => 'radiant-subheader',
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Open social links in new window.
			array(
				'id'       => 'hide-footer-widget',
				'type'     => 'switch',
				'title'    => esc_html__( 'Hide footer widget area', 'cura' ),
				'default'  => true,
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Background.
			array(
				'id'       => 'footer_one_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'cura' ),
				'subtitle' => esc_html__( 'Set Background for Footer.', 'cura' ),
				'output'   => array(
					'.wraper_footer.style-default',
				),
				'required' => array(
					array(
						'hide-footer-widget',
						'equals',
						true,
					),
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Main Background.
			array(
				'id'       => 'footer_one_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'cura' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section.', 'cura' ),
				'default'  => array(
					'background-color' => '#161b27',
				),
				'output'   => array(
					'.wraper_footer.style-default .wraper_footer_main',
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Main Bottom Border.
			array(
				'id'       => 'footer_one_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'cura' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section.', 'cura' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.17,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-default .wraper_footer_main',
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Copyright Background.
			array(
				'id'       => 'footer_one_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'cura' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background.', 'cura' ),
				'default'  => array(
					'background-color' => '#161b27',
				),
				'output'   => array(
					'.wraper_footer.style-default .wraper_footer_copyright',
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Copyright Text.
			array(
				'id'       => 'footer_one_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'cura' ),
				'subtitle' => esc_html__( 'Enter Copyright Text.', 'cura' ),
				'default'  => esc_html__( 'Cura - Designed by RadiantThemes for Themeforest', 'cura' ),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// END OF FOOTER DEFAULT OPTIONS.

			// START OF FOOTER CUSTOM OPTIONS.

			// Footer Eleven Info.
			array(
				'id'       => 'footer_custom_info',
				'type'     => 'info',
				'class'    => 'radiant-subheader',
				'title'    => esc_html__( 'Custom Footer Settings', 'cura' ),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),

			array(
				'id'       => 'footer_list_text',
				'title'    => __( 'Elementor Section Template', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-footer',
						),
					),
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),
			array(
				'id'       => 'shop_footer_text',
				'title'    => __( 'Shop Footer Template', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-footer',
						),
					),
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),
			array(
				'id'       => 'shop_details_footer_text',
				'title'    => __( 'Product Details Footer Template', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-footer',
						),
					),
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),
			array(
				'id'       => 'doctor_details_footer_text',
				'title'    => __( 'Doctor Details Footer Template', 'cura' ),
				'type'     => 'select',
				'data'     => 'posts',
				'args'     => array(
					'post_type'      => 'elementor_library',
					'posts_per_page' => -1,
					'orderby'        => 'title',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'elementor_library_category',
							'field'    => 'slug',
							'terms'    => 'custom-footer',
						),
					),
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),

			// Footer Custom Stucking.
			array(
				'id'       => 'footer_custom_stucking',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stucking Option', 'cura' ),
				'subtitle' => esc_html__( 'Choose if you want the stucking effect on footer or not.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => true,
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),

			// END OF FOOTER OPTIONS.
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Elements', 'cura' ),
		'icon'  => 'el el-braille',
		'id'    => 'elements',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Scroll Bar', 'cura' ),
		'id'         => 'scroll_bar',
		'icon'       => 'el el-adjust-alt',
		'subsection' => true,
		'fields'     => array(

			// Display Footer Main Section.
			array(
				'id'       => 'scrollbar_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Custom Scrollbar', 'cura' ),
				'subtitle' => esc_html__( 'Choose if Custom Scrollbar will be activate or not. (Please Note: This will take effect on infinity scroll areas but not for entire website.)', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => false,
			),

			// Scroll Bar Color.
			array(
				'id'       => 'scrollbar_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Scroll Bar Color', 'cura' ),
				'subtitle' => esc_html__( 'Pick a color for Scroll Bar.', 'cura' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 1,
				),
			),

			// Scroll Bar Width.
			array(
				'id'       => 'scrollbar_width',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'height'   => false,
				'title'    => esc_html__( 'Scroll Bar Width', 'cura' ),
				'subtitle' => esc_html__( 'Set width for Scroll Bar.', 'cura' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'width' => '7',
					'units' => 'px',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Button', 'cura' ),
		'icon'       => 'el el-off',
		'id'         => 'button-style',
		'subsection' => true,
		'fields'     => array(

			// Button Padding.
			array(
				'id'             => 'button_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Button Padding', 'cura' ),
				'subtitle'       => esc_html__( 'Allow padding for buttons.', 'cura' ),
				'default'        => array(
					'padding-top'    => '17px',
					'padding-right'  => '45px',
					'padding-bottom' => '17px',
					'padding-left'   => '45px',
					'units'          => 'px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Button Background Color.
			array(
				'id'       => 'button_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'cura' ),
				'subtitle' => esc_html__( 'Pick a background color for buttons.', 'cura' ),
				'default'  => array(
					'color' => '#5f27d4',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Background Color Hover.
			array(
				'id'       => 'button_background_color_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Background Color', 'cura' ),
				'subtitle' => esc_html__( 'Pick a background color for buttons hover.', 'cura' ),
				'default'  => array(
					'color' => '#1ed5a4',
				),
				'output'   => array(
					'background-color' => '.radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .shop_single > .summary form.cart .button:hover, .shop_single #review_form #respond input[type=submit]:hover, .woocommerce button.button[name=apply_coupon]:hover, .woocommerce button.button[name=update_cart]:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce form.checkout_coupon .form-row .button:hover, .woocommerce #payment #place_order:hover, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a:hover, .widget-area > .widget.widget_price_filter .button:hover, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .comments-area .comment-form > p button[type=reset]:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:hover span,.widget-area > .widget.widget_search .search-form input[type="submit"]:hover',
				),
			),

			// Border.
			array(
				'id'      => 'button_border',
				'type'    => 'border',
				'title'   => esc_html__( 'Border', 'cura' ),
				'default' => array(
					'border-top'    => '1px',
					'border-right'  => '1px',
					'border-bottom' => '1px',
					'border-left'   => '1px',
					'border-style'  => 'solid',
					'border-color'  => '#5f27d4',
				),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Border Color.
			array(
				'id'      => 'button_hover_border_color',
				'type'    => 'border',
				'title'   => esc_html__( 'Hover Border Color', 'cura' ),
				'default' => array(
					'border-top'    => '1px',
					'border-right'  => '1px',
					'border-bottom' => '1px',
					'border-left'   => '1px',
					'border-style'  => 'solid',
					'border-color'  => '#1ed5a4',
				),
				'output'  => array(
					' .radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .shop_single > .summary form.cart .button:hover, .shop_single #review_form #respond input[type=submit]:hover, .woocommerce button.button[name=apply_coupon]:hover, .woocommerce button.button[name=update_cart]:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce form.checkout_coupon .form-row .button:hover, .woocommerce #payment #place_order:hover, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a:hover, .widget-area > .widget.widget_price_filter .button:hover, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .comments-area .comment-form > p button[type=submit]:hover, .comments-area .comment-form > p button[type=reset]:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Border Radius.
			array(
				'id'             => 'border-radius',
				'type'           => 'spacing',
				'mode'           => 'margin',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Border Radius', 'cura' ),
				'subtitle'       => esc_html__( 'Users can change the Border Radius for Buttons.', 'cura' ),
				'all'            => false,
				'default'        => array(
					'margin-top'    => '5px',
					'margin-right'  => '5px',
					'margin-bottom' => '5px',
					'margin-left'   => '5px',
					'units'         => 'px',
				),
			),

			// Box Shadow.
			array(
				'id'      => 'theme_button_box_shadow',
				'type'    => 'box_shadow',
				'title'   => esc_html__( 'Theme Button Box Shadow', 'cura' ),
				'units'   => array( 'px', 'em', 'rem' ),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
				'opacity' => true,
				'rgba'    => true,
				'default' => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '0',
					'spread'       => '0',
					'opacity'      => '0.01',
					'shadow-color' => '#000000',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),

			),

			// Button Typography.
			array(
				'id'             => 'button_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Button Typography', 'cura' ),
				'subtitle'       => esc_html__( 'Typography options for buttons. Remember, this will effect all buttons of this theme. (Please Note: This change will effect all theme buttons, including Radiants Buttons, Radiant Contact Form Button, Radiant Fancy Text Box Button.)', 'cura' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Jost',
					'font-weight' => '500',
					'font-size'   => '14px',
					'color'       => '#ffffff',
					'line-height' => '27px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Font Color.
			array(
				'id'       => 'button_typography_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Hover Font Color', 'cura' ),
				'subtitle' => esc_html__( 'Select button hover font color.', 'cura' ),
				'default'  => '#ffffff',
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .shop_single > .summary form.cart .button:hover, .shop_single #review_form #respond input[type=submit]:hover, .woocommerce button.button[name=apply_coupon]:hover, .woocommerce button.button[name=update_cart]:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce form.checkout_coupon .form-row .button:hover, .woocommerce #payment #place_order:hover, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a:hover, .widget-area > .widget.widget_price_filter .button:hover, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .comments-area .comment-form > p button[type=submit]:hover, .comments-area .comment-form > p button[type=reset]:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Icon Color.
			array(
				'id'       => 'button_typography_icon',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Icon Color', 'cura' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present. (Please Note: This option will work only for "Theme Button" element.)', 'cura' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main i',
				),
			),

			// Hover Icon Color.
			array(
				'id'       => 'button_typography_icon_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Icon Color', 'cura' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present. (Please Note: This option will work only for "Theme Button" element.)', 'cura' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover i',
				),
			),

			// Hover Style.
			array(
				'id'       => 'button_hover_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hover Style', 'cura' ),
				'subtitle' => esc_html__( 'Select Hover Style of the "Button". (Please Note: This option will work only for "Theme Button" element.)', 'cura' ),
				'options'  => array(
					'one'   => 'Style One (Fade)',
					'two'   => 'Style Two (Sweep Right)',
					'three' => 'Style Three (Zoom Out)',
					'four'  => 'Style Four (Fade with Icon Right)',
					'five'  => 'Style Five (3D Shadow With SlideUp)',
					'six'   => 'Style Six (Horizontal Shake)',
					'seven' => 'Style Seven (Zoom Out)',
				),
				'default'  => 'five',
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Pages', 'cura' ),
		'icon'  => 'el el-book',
		'id'    => 'pages-option',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Error 404', 'cura' ),
		'icon'       => 'el el-error',
		'id'         => '404_error',
		'subsection' => true,
		'fields'     => array(

			// START OF 404 ERROR ONE OPTIONS.

			// Footer One Info.
			array(
				'id'    => '404_error_one_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Settings', 'cura' ),
				'class' => 'radiant-subheader',
			),

			// 404 Error One Content.
			array(
				'id'       => '404_error_one_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'cura' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style One".)', 'cura' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => '<h1>Oops! Page is not available</h1><h2>We\'re not being able to find the page you\'re looking for</h2>',
			),

			// 404 Error One Button Text.
			array(
				'id'       => '404_error_one_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'cura' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style One".', 'cura' ),
				'default'  => esc_html__( 'Back To Home', 'cura' ),
			),

			// 404 Error One Button Link.
			array(
				'id'       => '404_error_one_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'cura' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style One".', 'cura' ),
				'default'  => site_url(),
			),

			// END OF 404 ERROR ONE OPTIONS.
		),
	)
);
if ( class_exists( 'Radiantthemes_Addons' ) ) {
	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Maintenance Mode', 'cura' ),
			'icon'       => 'el el-broom',
			'id'         => 'maintenance_mode',
			'subsection' => true,
			'fields'     => array(

				// Maintenance Mode Switch.
				array(
					'id'       => 'maintenance_mode_switch',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Maintenance Mode?', 'cura' ),
					'subtitle' => esc_html__( 'Choose if want to Activate Maintenance Mode.', 'cura' ),
					'on'       => esc_html__( 'Yes', 'cura' ),
					'off'      => esc_html__( 'No', 'cura' ),
					'default'  => false,
				),



				// START OF MAINTENANCE MODE ONE OPTIONS.
				// Maintenance Mode One Info.
				array(
					'id'    => 'maintenance_mode_one_info',
					'type'  => 'info',
					'title' => esc_html__( 'Maintenance Mode  Settings', 'cura' ),
					'class' => 'radiant-subheader',
				),

				// Maintenance Mode One Background.
				array(
					'id'       => 'maintenance_mode_one_background',
					'type'     => 'background',
					'title'    => esc_html__( 'Maintenance Mode Background', 'cura' ),
					'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode.)', 'cura' ),
					'default'  => array(
						'background-image' => get_template_directory_uri() . '/assets/images/Maintenance-More-Style-One-Image.png',
						'background-color' => '#ffffff',
					),
					'output'   => array(
						'.wraper_maintenance_main.style-one',
					),
				),

				// Maintenance Mode One Content.
				array(
					'id'       => 'maintenance_mode_one_content',
					'type'     => 'editor',
					'title'    => esc_html__( 'Maintenance Mode Content', 'cura' ),
					'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style One".)', 'cura' ),
					'args'     => array(
						'teeny' => false,
					),
					'default'  => '<h1>The Website Is Currently <strong>Under Construction</strong></h1><h2>Please Check Back Soon...</h2>',
				), // END OF MAINTENANCE MODE ONE OPTIONS.


			),
		)
	);

	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Coming Soon', 'cura' ),
			'icon'       => 'el el-warning-sign',
			'id'         => 'coming_soon',
			'subsection' => true,
			'fields'     => array(

				// Coming Soon Switch.
				array(
					'id'       => 'coming_soon_switch',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Coming Soon', 'cura' ),
					'subtitle' => esc_html__( 'Choose if want to activate Coming Soon mode.', 'cura' ),
					'on'       => esc_html__( 'Yes', 'cura' ),
					'off'      => esc_html__( 'No', 'cura' ),
					'default'  => false,
				),

				// Coming Soon Launch Date-Time.
				array(
					'id'       => 'coming_soon_datetime',
					'type'     => 'text',
					'title'    => esc_html__( 'Launch Date & Time', 'cura' ),
					'subtitle' => esc_html__( 'Enter Launch Date & Time.', 'cura' ),
					'default'  => date( 'Y-m-d h:i', strtotime( '+1 Months' ) ),
				),

				// START OF COMING SOON ONE OPTIONS.
				// Coming Soon One Info.
				array(
					'id'    => 'coming_soon_one_info',
					'type'  => 'info',
					'title' => esc_html__( 'Coming Soon Settings', 'cura' ),
					'class' => 'radiant-subheader',
				),

				// Coming Soon One Background.
				array(
					'id'       => 'coming_soon_one_background',
					'type'     => 'background',
					'title'    => esc_html__( 'Coming Soon Background', 'cura' ),
					'subtitle' => esc_html__( 'Set Background for Coming Soon.', 'cura' ),
					'default'  => array(
						'background-image'    => get_template_directory_uri() . '/assets/images/Coming-Soon-Style-One-Background-Image.jpg',
						'background-color'    => '#f7f7f7',
						'background-size'     => 'cover',
						'background-position' => 'center center',
					),
					'output'   => array(
						'.wraper_comingsoon_main.style-one',
					),
				),

				// Coming Soon One Content.
				array(
					'id'       => 'coming_soon_one_content',
					'type'     => 'editor',
					'title'    => esc_html__( 'Coming Soon Content', 'cura' ),
					'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body.', 'cura' ),
					'args'     => array(
						'teeny' => false,
					),
					'default'  => '<img class="aligncenter size-full" src="' . get_template_directory_uri() . '/assets/images/coming-soon-logo.png' . '" alt="Coming Soon" /><h1>Coming Soon</h1>',
				),
				// Coming Soon One Content.
				array(
					'id'       => 'coming_soon_one_subscribe',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Coming Soon Subscribe Form', 'cura' ),
					'subtitle' => esc_html__( 'Paste the Contact Form 7 Shortcode here.', 'cura' ),
				),
				// END OF COMING SOON ONE OPTIONS.
			),
		)
	);
}
Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Search', 'cura' ),
		'icon'       => 'el el-search-alt',
		'id'         => 'search',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'search_page_banner_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Search Page Banner Image', 'cura' ),
				'subtitle' => esc_html__( 'Select search page banner image', 'cura' ),
			),

			array(
				'id'       => 'search_page_banner_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Page Title', 'cura' ),
				'subtitle' => esc_html__( 'Enter search page banner title', 'cura' ),
				'default'  => 'Search',
			),

			array(
				'id'       => 'search_page_banner_subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Page Subtitle', 'cura' ),
				'subtitle' => esc_html__( 'Enter search page banner subtitle', 'cura' ),
				'default'  => '',
			),

		),
	)
);
if ( class_exists( 'Tribe__Events__Main' ) ) {
	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Event', 'cura' ),
			'icon'       => 'el el-calendar',
			'id'         => 'banner_layout',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'events_banner_details',
					'type'     => 'select',
					'title'    => esc_html__( 'Banner Details', 'cura' ),
					'subtitle' => esc_html__( 'Select Banner options', 'cura' ),
					'options'  => array(
						'banner-breadcumbs' => 'Short Banner With Breadcumbs',
						'banner-only'       => 'Short Banner Only',
						'breadcumbs-only'   => 'Breadcumbs Only',
						'none'              => 'None',
					),
					'default'  => 'banner-breadcumbs',
				),
				array(
					'id'       => 'event_banner_image',
					'type'     => 'media',
					'url'      => false,
					'title'    => esc_html__( 'Event Banner Image', 'cura' ),
					'subtitle' => esc_html__( 'Select event banner image', 'cura' ),
					'required' => array(
						array(
							'events_banner_details',
							'!=',
							'none',
						),
						array(
							'events_banner_details',
							'!=',
							'breadcumbs-only',
						),
					),
				),
				array(
					'id'       => 'event_banner_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Event Title', 'cura' ),
					'subtitle' => esc_html__( 'Enter event banner title', 'cura' ),
					'default'  => 'Events',
					'required' => array(
						array(
							'events_banner_details',
							'!=',
							'none',
						),
						array(
							'events_banner_details',
							'!=',
							'breadcumbs-only',
						),
					),
				),
				array(
					'id'       => 'event_banner_subtitle',
					'type'     => 'text',
					'title'    => esc_html__( 'Event Subtitle', 'cura' ),
					'subtitle' => esc_html__( 'Enter event banner subtitle', 'cura' ),
					'default'  => '',
					'required' => array(
						array(
							'events_banner_details',
							'!=',
							'none',
						),
						array(
							'events_banner_details',
							'!=',
							'breadcumbs-only',
						),
					),
				),
			),
		)
	);
}

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Blog', 'cura' ),
		'icon'  => 'el el-bullhorn',
		'id'    => 'blog',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Blog Layout', 'cura' ),
		'icon'       => 'el el-check-empty',
		'id'         => 'blog_layout',
		'subsection' => true,
		'fields'     => array(

			// Blog Style.
			array(
				'id'       => 'blog-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Style', 'cura' ),
				'subtitle' => esc_html__( 'Select blog style', 'cura' ),
				'options'  => array(
					'default' => array(
						'alt'   => 'Default',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Default.png',
						'title' => esc_html__( 'Default', 'cura' ),
					),
					'one'     => array(
						'alt'   => 'Classic',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Classic.png',
						'title' => esc_html__( 'Classic', 'cura' ),
					),
					'five'    => array(
						'alt'   => 'Standard',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Metro.png',
						'title' => esc_html__( 'Standard', 'cura' ),
					),
				),
				'default'  => 'default',
			),

			// Blog Layout.
			array(
				'id'       => 'blog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Layout', 'cura' ),
				'subtitle' => esc_html__( 'Select blog layout', 'cura' ),
				'options'  => array(
					'leftsidebar'  => array(
						'alt' => 'Left Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Left-Sidebar.png',
					),
					'nosidebar'    => array(
						'alt' => 'No Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-No-Sidebar.png',
					),
					'rightsidebar' => array(
						'alt' => 'Right Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Right-Sidebar.png',
					),
				),
				'default'  => 'rightsidebar',
				'required' => array(
					array(
						'blog-style',
						'!=',
						'default',
					),
				),
			),

			// Blog Layout Sidebar Width.
			array(
				'id'       => 'blog-layout-sidebar-width',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Width', 'cura' ),
				'subtitle' => esc_html__( 'Select sidebar width for blog pages.', 'cura' ),
				'options'  => array(
					'three-grid' => '3 Grids',
					'four-grid'  => '4 Grids',
					'five-grid'  => '5 Grids',
				),
				'default'  => 'three-grid',
				'required' => array(
					array(
						'blog-layout',
						'!=',
						'nosidebar',
					),
				),
			),

			// Blog showing.
			array(
				'id'       => 'blog-showing',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Posts loading', 'cura' ),
				'subtitle' => esc_html__( 'How to load blog', 'cura' ),
				'required' => array(
					array(
						'blog-style',
						'!=',
						'default',
					),
				),
				'options'  => array(
					'pagination' => array(
						'alt' => 'pagination',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-pagination.gif',
					),
				),

			),

		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Single Page Layout', 'cura' ),
		'icon'       => 'el el-bold',
		'id'         => 'blog_single_layout',
		'subsection' => true,
		'fields'     => array(

			// Single Page Style.
			array(
				'id'       => 'blog_single_layout_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Single Page Style', 'cura' ),
				'subtitle' => esc_html__( 'Select blog single page style', 'cura' ),
				'options'  => array(
					'default' => array(
						'alt'   => 'Default',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Single-Style-Default.png',
						'title' => esc_html__( 'Default', 'cura' ),
					),
					'one'     => array(
						'alt'   => 'Style One',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Single-Style-One.png',
						'title' => esc_html__( 'Style One', 'cura' ),
					),
					'two'     => array(
						'alt'   => 'Style Two',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Single-Style-Two.png',
						'title' => esc_html__( 'Style Two', 'cura' ),
					),
				),
				'default'  => 'default',
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Blog Options', 'cura' ),
		'icon'       => 'el el-ok-sign',
		'id'         => 'blog_options',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'display_social_sharing',
				'type'     => 'switch',
				'title'    => esc_html__( 'Social Sharing Box', 'cura' ),
				'subtitle' => esc_html__( 'Select if you want to show Social Sharing icons on Blog Page (applicable for default structure).', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => false,
			),
			array(
				'id'       => 'display_author_information',
				'type'     => 'switch',
				'title'    => esc_html__( 'Author Information Box', 'cura' ),
				'subtitle' => esc_html__( 'Select if you want to show author information on Blog Details Page.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_categries',
				'type'     => 'switch',
				'title'    => esc_html__( 'Categories', 'cura' ),
				'subtitle' => esc_html__( 'Select if you want to show the categories on both Blog Page and Blog Details Page.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Tags', 'cura' ),
				'subtitle' => esc_html__( 'Select if you want to show the tags on both Blog Page and Blog Details Page.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_navigation',
				'type'     => 'switch',
				'title'    => esc_html__( 'Navigation', 'cura' ),
				'subtitle' => esc_html__( 'Select if you want to previous and next navigation the Previous/Next Navigation on Blog Details Page.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_related_article',
				'type'     => 'switch',
				'title'    => esc_html__( 'Related Article', 'cura' ),
				'subtitle' => esc_html__( 'Select if you want to show related article on Blog Details Page.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => false,
			),

			array(
				'id'       => 'blog_comment_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Comments', 'cura' ),
				'subtitle' => esc_html__( 'Select if you want to show comments on Blog Details Page.', 'cura' ),
				'on'       => esc_html__( 'Yes', 'cura' ),
				'off'      => esc_html__( 'No', 'cura' ),
				'default'  => true,
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Team', 'cura' ),
		'icon'  => 'el el-user',
		'id'    => 'team',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Team Details', 'cura' ),
		'icon'       => 'el el-address-book',
		'id'         => 'team_details',
		'subsection' => true,
		'fields'     => array(

			// Team Details Style.
			array(
				'id'       => 'team_details_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Team Details Style', 'cura' ),
				'subtitle' => esc_html__( 'Select team details style', 'cura' ),
				'options'  => array(
					'blank' => array(
						'alt'   => 'Blank',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Team-Details-Style-Blank.png',
						'title' => esc_html__( 'Blank', 'cura' ),
					),
					'one'   => array(
						'alt'   => 'Style One',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Team-Details-Style-One.png',
						'title' => esc_html__( 'Style One', 'cura' ),
					),
				),
				'default'  => 'blank',
			),

		),
	)
);

if ( class_exists( 'woocommerce' ) ) {

	Redux::setSection(
		$opt_name,
		array(
			'title' => esc_html__( 'Shop', 'cura' ),
			'icon'  => 'el el-shopping-cart',
			'id'    => 'shop',
		)
	);

	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Product Listing', 'cura' ),
			'icon'       => 'el el-list-alt',
			'id'         => 'product_listing',
			'subsection' => true,
			'fields'     => array(

				// Product Listing Layout.
				array(
					'id'       => 'shop-style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Listing Layout', 'cura' ),
					'subtitle' => esc_html__( 'Select Product Listing Layout', 'cura' ),
					'options'  => array(
						'shop-style-three-column' => array(
							'title' => 'Three Column',
							'alt'   => 'Three Column',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-One.jpg',
						),
						'shop-style-four-column'  => array(
							'title' => 'Four Column',
							'alt'   => 'Four Column',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Two.jpg',
						),
						'shop-style-five-column'  => array(
							'title' => 'Five Column',
							'alt'   => 'Five Column',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Three.jpg',
						),
						'shop-style-six-column'   => array(
							'title' => 'Six Column',
							'alt'   => 'Six Column',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Four.jpg',
						),
					),
					'default'  => 'shop-style-four-column',
				),

				// Products Per Page.
				array(
					'id'       => 'shop-products-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Products Per Page', 'cura' ),
					'subtitle' => esc_html__( 'Put number of products you wants to show per page', 'cura' ),
					'default'  => '12',
					'validate' => 'numeric',
				),

				// Sidebar.
				array(
					'id'       => 'shop-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar.', 'cura' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'cura' ),
					'options'  => array(
						'shop-leftsidebar'  => array(
							'alt' => 'Left Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Left-Sidebar.jpg',
						),
						'shop-nosidebar'    => array(
							'alt' => 'No Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-No-Sidebar.jpg',
						),
						'shop-rightsidebar' => array(
							'alt' => 'Right Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-nosidebar',
				),

				// Shop Box Style.
				array(
					'id'       => 'shop_box_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Shop Box Style', 'cura' ),
					'subtitle' => esc_html__( 'Select Style of the Shop Box.', 'cura' ),
					'options'  => array(
						'style-seven' => array(
							'title' => 'With Hover',
							'alt'   => 'With Hover image',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Eight.jpg',
						),
					),
					'default'  => 'style-seven',
				),


				array(
					'id'       => 'sale_tag_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Sale Tag Color', 'cura' ),
					'subtitle' => esc_html__( 'Select Sale Tag  color.', 'cura' ),
					'default'  => '#ffffff;',
					'output'   => array(
						'color' => '.woocommerce span.onsale',
					),
				),
				array(
					'id'       => 'sale_tag_background_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Sale Tag Background Color', 'cura' ),
					'subtitle' => esc_html__( 'Select Sale Tag Background  color.', 'cura' ),
					'default'  => '#FF583C;',
					'output'   => array(
						'background'        => '.woocommerce span.onsale',
						'border-left-color' => '.woocommerce span.onsale::before,.woocommerce span.onsale::after',
					),
				),

			),
		)
	);

	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Product Details', 'cura' ),
			'icon'       => 'el el-shopping-cart',
			'id'         => 'product_details',
			'subsection' => true,
			'fields'     => array(

				// Product Details Layout.
				array(
					'id'       => 'shop-details-style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Details Layout', 'cura' ),
					'subtitle' => esc_html__( 'Select Product Details Layout', 'cura' ),
					'options'  => array(
						'style-one' => array(
							'alt' => 'Style One',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-One.jpg',
						),
					),
					'default'  => 'style-one',
				),

				// Sidebar.
				array(
					'id'       => 'shop-details-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar', 'cura' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'cura' ),
					'options'  => array(
						'shop-details-leftsidebar'  => array(
							'alt'   => 'Left Sidebar',
							'title' => 'Left Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Left-Sidebar.jpg',
						),
						'shop-details-nosidebar'    => array(
							'alt'   => 'No Sidebar',
							'title' => 'No Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-No-Sidebar.jpg',
						),
						'shop-details-rightsidebar' => array(
							'alt'   => 'Right Sidebar',
							'title' => 'Right Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-details-nosidebar',
				),

			),
		)
	);

}

Redux::setSection(
	$opt_name,
	array(
		'title'   => esc_html__( 'Social Icons', 'cura' ),
		'icon'    => 'el el-globe',
		'id'      => 'social_icons',
		'submenu' => false,
		'fields'  => array(

			// Open social links in new window.
			array(
				'id'      => 'social-icon-target',
				'type'    => 'switch',
				'title'   => esc_html__( 'Open links in new window', 'cura' ),
				'desc'    => esc_html__( 'Open social links in new window', 'cura' ),
				'default' => true,
			),

			// Google +.
			array(
				'id'    => 'social-icon-googleplus',
				'type'  => 'text',
				'title' => esc_html__( 'Google +', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Facebook.
			array(
				'id'      => 'social-icon-facebook',
				'type'    => 'text',
				'title'   => esc_html__( 'Facebook', 'cura' ),
				'desc'    => esc_html__( 'Link to the profile page', 'cura' ),
				'default' => '#',
			),

			// Twitter.
			array(
				'id'      => 'social-icon-twitter',
				'type'    => 'text',
				'title'   => esc_html__( 'Twitter', 'cura' ),
				'desc'    => esc_html__( 'Link to the profile page', 'cura' ),
				'default' => '#',
			),

			// Vimeo.
			array(
				'id'    => 'social-icon-vimeo',
				'type'  => 'text',
				'title' => esc_html__( 'Vimeo', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// YouTube.
			array(
				'id'    => 'social-icon-youtube',
				'type'  => 'text',
				'title' => esc_html__( 'YouTube', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Flickr.
			array(
				'id'    => 'social-icon-flickr',
				'type'  => 'text',
				'title' => esc_html__( 'Flickr', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// LinkedIn.
			array(
				'id'      => 'social-icon-linkedin',
				'type'    => 'text',
				'title'   => esc_html__( 'LinkedIn', 'cura' ),
				'desc'    => esc_html__( 'Link to the profile page', 'cura' ),
				'default' => '#',
			),

			// Pinterest.
			array(
				'id'      => 'social-icon-pinterest',
				'type'    => 'text',
				'title'   => esc_html__( 'Pinterest', 'cura' ),
				'desc'    => esc_html__( 'Link to the profile page', 'cura' ),
				'default' => '#',
			),

			// Xing.
			array(
				'id'    => 'social-icon-xing',
				'type'  => 'text',
				'title' => esc_html__( 'Xing', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Viadeo.
			array(
				'id'    => 'social-icon-viadeo',
				'type'  => 'text',
				'title' => esc_html__( 'Viadeo', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Vkontakte.
			array(
				'id'    => 'social-icon-vkontakte',
				'type'  => 'text',
				'title' => esc_html__( 'Vkontakte', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Tripadvisor.
			array(
				'id'    => 'social-icon-tripadvisor',
				'type'  => 'text',
				'title' => esc_html__( 'Tripadvisor', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Tumblr.
			array(
				'id'    => 'social-icon-tumblr',
				'type'  => 'text',
				'title' => esc_html__( 'Tumblr', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Behance.
			array(
				'id'    => 'social-icon-behance',
				'type'  => 'text',
				'title' => esc_html__( 'Behance', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Instagram.
			array(
				'id'    => 'social-icon-instagram',
				'type'  => 'text',
				'title' => esc_html__( 'Instagram', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Dribbble.
			array(
				'id'    => 'social-icon-dribbble',
				'type'  => 'text',
				'title' => esc_html__( 'Dribbble', 'cura' ),
				'desc'  => esc_html__( 'Link to the profile page', 'cura' ),
			),

			// Skype.
			array(
				'id'    => 'social-icon-skype',
				'type'  => 'text',
				'title' => esc_html__( 'Skype', 'cura' ),
				'desc'  => wp_kses( 'Skype login. You can use <strong>callto:</strong> or <strong>skype:</strong> prefix', 'rt-content' ),
			),

		),
	)
);
