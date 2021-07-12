<?php
/**
 * Header Banner
 *
 * @package Radiantthemes
 */

/**
 * [radiantthemes_page_options description]
 */
function radiantthemes_page_options() {

	function short_header_metabox_font() {
		$google_font_url = '';
		/*
		Translators          : If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'radiantthemes-custom-post-type' ) ) {
			$google_font_url = add_query_arg( 'family', rawurlencode( 'Poppins: 300,400,500,600,700' ), '//fonts.googleapis.com/css' );
		}
		return $google_font_url;
	}
	wp_register_style(
		'radiantthemes-short-header-google-fonts',
		short_header_metabox_font(),
		array(),
		'1.0.0'
	);
	wp_enqueue_style( 'radiantthemes-short-header-google-fonts' );

	wp_register_style(
		'radiantthemes-page-options',
		plugins_url( 'radiantthemes-custom-post-type/css/radiantthemes-page-options.css' ),
		false,
		time()
	);
	wp_enqueue_style( 'radiantthemes-page-options' );

	wp_register_script(
		'radiantthemes-page-options',
		plugins_url( 'radiantthemes-custom-post-type/js/radiantthemes-page-options.js' ),
		array( 'jquery' ),
		time(),
		true
	);
	wp_enqueue_script( 'radiantthemes-page-options' );
}
add_action( 'admin_enqueue_scripts', 'radiantthemes_page_options' );

/**
 * Custom Box
 */
function radiantthemes_page_add_custom_box() {
	$screens = array( 'page', 'post' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'page_sectionid',
			__( 'Page Details', 'radiantthemes-custom-post-type' ),
			'radiantthemes_page_inner_custom_box',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'radiantthemes_page_add_custom_box' );

function wpdocs_register_meta_boxes() {
    add_meta_box( 'video_link', __( 'Video Link', 'textdomain' ), 'wpdocs_my_display_callback', 'post' );
}
//if ( 'video' === get_post_format() ) {
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

//}
function wpdocs_my_display_callback()
{
    ?>
    <div class="radiantthemes-page-options-body-form">
    <input type="text" name="video_link" id="video_link" />
    </div>
    <?php
}


/**
 * Inner Custom Box
 *
 * @global type $post
 * @param type $post description.
 */
function radiantthemes_page_inner_custom_box( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'page_tm' );
	$vbtitle              = get_post_meta( $post->ID, 'banner_title', true );
	$vbstitle             = get_post_meta( $post->ID, 'banner_subtitle', true );
	$vbannercheck         = get_post_meta( $post->ID, 'bannercheck', true );
	$stickyheadercheck = get_post_meta( $post->ID, 'new_custom_sticky_header', true );
	$headercheck = get_post_meta( $post->ID, 'new_custom_header', true );
	$default_bannercheck  = empty( $vbannercheck ) ? 'defaultbannercheck' : $vbannercheck;
	$footercheck = get_post_meta( $post->ID, 'custom_footer', true );
	$floatingcheck = get_post_meta( $post->ID, 'new_custom_floating', true );
	?>
	<?php if ( ! is_front_page() ) { ?>
	
    <!-- radiantthemes-sticky-options -->
	<div id="RadiantThemesPageHeader" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Select Custom Header', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-image-selector -->
			<div class="radiantthemes-page-options-body-image-selector">
                <div style="width:50%;display:inline-block; vertical-align:top;">
				<?php
				$args = array(
					            'posts_per_page'   => -1,
					            'post_type'        => 'elementor_library',
					            'post_status'      => 'publish',
								'elementor_library_category' =>'custom-header',
					        );

		        if( $document_type !== 'all' ){
		            $args['meta_key']   = '_elementor_template_type';
		            $args['meta_value'] = 'section';
		        }
        		$posts_array  = get_posts( $args );

				if ( $posts_array ) {
					echo '<select name="new_custom_header">';

					echo '<option value="0">Theme Default Header</option>';

					foreach ( $posts_array as $key => $value ) {
						if ( $headercheck == $value->post_name ) {
							echo '<option value="' . $value->post_name . '" selected> ' . $value->post_title . '</option>';
						} else {
							echo '<option value="' . $value->post_name . '"> ' . $value->post_title . '</option>';
						}
					}
					echo '</select>';
				}
				?>
               </div>
			   <div style="width:50%;display:inline-block;">
			   <p style="margin:0px;">
			   <?php esc_html_e( ' If you want a different header for any specific page, then select any header style except the ‘Theme Default Header’ from that page. If you don’t want to show the header on any specific page, then choose Blank Header.', 'radiantthemes-custom-post-type' ); ?>
			   </p>
			   </div>

			</div>
			<!-- radiantthemes-page-options-body-image-selector -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	
	<div id="RadiantThemesPageHeader" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Select Header Floating Option', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-image-selector -->
			<div class="radiantthemes-page-options-body-image-selector">
			<select name="new_custom_floating">
			<option value="0" <?php selected( $floatingcheck, '0' ); ?>>Theme Default Floating</option>
			<option value="1" <?php selected( $floatingcheck, '1' ); ?>>Enable Floating</option>
			<option value="2" <?php selected( $floatingcheck, '2' ); ?>>Disable Floating</option>
			</select>
			</div>
			<!-- radiantthemes-page-options-body-image-selector -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	
	<!-- radiantthemes-sticky-header-options -->
	<div id="RadiantThemesPageHeader" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Select Sticky Header', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-image-selector -->
			<div class="radiantthemes-page-options-body-image-selector">

				<?php
				$args = array(
					            'posts_per_page'   => -1,
					            'post_type'        => 'elementor_library',
					            'post_status'      => 'publish',
								'elementor_library_category' =>'sticky-header',
					        );

		        if( $document_type !== 'all' ){
		            $args['meta_key']   = '_elementor_template_type';
		            $args['meta_value'] = 'section';
		        }
        		$posts_array  = get_posts( $args );

				if ( $posts_array ) {
					echo '<select name="new_custom_sticky_header">';

					echo '<option value="0">Theme Default Sticky Header</option>';

					foreach ( $posts_array as $key => $value ) {
						if ( $stickyheadercheck == $value->post_name ) {
							echo '<option value="' . $value->post_name . '" selected> ' . $value->post_title . '</option>';
						} else {
							echo '<option value="' . $value->post_name . '"> ' . $value->post_title . '</option>';
						}
					}
					echo '</select>';
				}
				?>


			</div>
			<!-- radiantthemes-page-options-body-image-selector -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	<!-- radiantthemes-page-options -->
	<div id="RadiantThemesPageBanner" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Select Short Header', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-image-selector -->
			<div class="radiantthemes-page-options-body-image-selector">
				<ul id="RadiantThemesPageBannerSelector">
					<li class="header-default">
						<input type="radio" name="bannercheck" value="defaultbannercheck" <?php checked( $default_bannercheck, 'defaultbannercheck' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Default', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="bannerbreadcumbs">
						<input type="radio" name="bannercheck" value="bannerbreadcumbs" <?php checked( $vbannercheck, 'bannerbreadcumbs' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Banner + Breadcrumbs', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="banneronly">
						<input type="radio" name="bannercheck" value="banneronly" <?php checked( $vbannercheck, 'banneronly' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Only Banner', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="breadcumbsonly">
						<input type="radio" name="bannercheck" value="breadcumbsonly" <?php checked( $vbannercheck, 'breadcumbsonly' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Only Breadcrumbs', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="nobannerbreadcumbs">
						<input type="radio" name="bannercheck" value="nobannerbreadcumbs" <?php checked( $vbannercheck, 'nobannerbreadcumbs' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'None', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
				</ul>
			</div>
			<!-- radiantthemes-page-options-body-image-selector -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	<!-- radiantthemes-page-options -->

	<!-- radiantthemes-page-options -->
	<div id="RadiantThemesPageBannerText" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Custom Title & Subtitle', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-form -->
			<div class="radiantthemes-page-options-body-form">
				<input type="hidden" name="<?php echo $vbannercheck; ?>">
				<input type="text" name="banner_title" id="banner_title" value="<?php echo esc_attr( $vbtitle ); ?>" placeholder="Banner Custom Title"/><br/><br/>
				<input type="text" name="banner_subtitle" id="banner_subtitle" value="<?php echo esc_attr( $vbstitle ); ?>" placeholder="Banner Sub Title"/>
			</div>
			<!-- radiantthemes-page-options-body-form -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	<!-- radiantthemes-page-options -->
	<!-- radiantthemes-footer-options -->
	<div id="RadiantThemesPageHeader" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Select Custom Footer', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-image-selector -->
			<div class="radiantthemes-page-options-body-image-selector">

				<?php
				$args = array(
					            'posts_per_page'   => -1,
					            'post_type'        => 'elementor_library',
					            'post_status'      => 'publish',
					            'elementor_library_category' =>'custom-footer',
					        );

		        if( $document_type !== 'all' ){
		            $args['meta_key']   = '_elementor_template_type';
		            $args['meta_value'] = 'section';
		        }
        		$posts_array  = get_posts( $args );

				if ( $posts_array ) {
					echo '<select name="custom_footer">';

					echo '<option value="0">Theme Default Footer</option>';

					foreach ( $posts_array as $key => $value ) {
						if ( $footercheck == $value->post_name ) {
							echo '<option value="' . $value->post_name . '" selected> ' . $value->post_title . '</option>';
						} else {
							echo '<option value="' . $value->post_name . '"> ' . $value->post_title . '</option>';
						}
					}
					echo '</select>';
				}
				?>


			</div>
			<!-- radiantthemes-page-options-body-image-selector -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	<!-- radiantthemes-footer-options -->
	<?php } ?>
	<?php
}

/**
 * Save Post data
 *
 * @param type $post_id description.
 * @return type
 */
function radiantthemes_page_save_postdata( $post_id ) {
	if ( ( false == strpos( $_SERVER['REQUEST_URI'], 'checkout/?payment-mode=manual' ) ) && ( false == strpos( $_SERVER['REQUEST_URI'], 'index.php' ) ) && ( false == strpos( $_SERVER['REQUEST_URI'], 'checkout/?payment-mode=paypal' ) ) && ( false == strpos( $_SERVER['REQUEST_URI'], 'post-new.php' ) ) && ( false == strpos( $_SERVER['REQUEST_URI'], 'nav-menus.php' ) ) && ( false == strpos( $_SERVER['REQUEST_URI'], 'admin.php' ) ) && ( 'trash' != $_REQUEST['action'] ) ) {
		if ( 'page' == $_REQUEST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}
		if ( ! isset( $_POST['page_tm'] ) || ! wp_verify_nonce( $_POST['page_tm'], plugin_basename( __FILE__ ) ) ) {
			return;
		}
		$post_ID = $_POST['post_ID'];

		$tbtitle       = sanitize_text_field( $_POST['banner_title'] );
		$tbstitle      = sanitize_text_field( $_POST['banner_subtitle'] );
		$tbannercheck  = sanitize_html_class( $_POST['bannercheck'] );
		$tfootercheck  = sanitize_html_class( $_POST['custom_footer'] );
		$theadercheck  = sanitize_html_class( $_POST['new_custom_header'] );
		$thefloatingcheck  = sanitize_html_class( $_POST['new_custom_floating'] );
		$tstickyheadercheck  = sanitize_html_class( $_POST['new_custom_sticky_header'] );

		update_post_meta( $post_ID, 'banner_title', $tbtitle );
		update_post_meta( $post_ID, 'banner_subtitle', $tbstitle );
		update_post_meta( $post_ID, 'bannercheck', $tbannercheck );
		update_post_meta( $post_ID, 'custom_footer', $tfootercheck );
		update_post_meta( $post_ID, 'new_custom_header', $theadercheck );
		update_post_meta( $post_ID, 'new_custom_floating', $thefloatingcheck );
		update_post_meta( $post_ID, 'new_custom_sticky_header', $tstickyheadercheck );

	}
}
add_action( 'save_post', 'radiantthemes_page_save_postdata', 10, 2 );
