<?php
/**
 * Dynamic CSS Propoerty Based on Theme Options
 *
 * @package Dizy
 */

$font_face  = '';

$theme_options = get_option( 'cura_theme_option' );
for ( $i = 0; $i <= 50; $i++ ) {
	if ( ! empty( $theme_options[ 'webfontName' . $i ] ) ) {
		$font_name  = $theme_options[ 'webfontName' . $i ];

		$urls = array();
		if( ! empty( $theme_options[ 'woff' . $i ]['url'] ) ) {
			$urls[] = 'url(' . esc_url( $theme_options[ 'woff' . $i ]['url'] ) . ')';
		}
		if( ! empty( $theme_options[ 'woffTwo' . $i ]['url'] ) ) {
			$urls[] = 'url(' . esc_url( $theme_options[ 'woffTwo' . $i ]['url'] ) . ')';
		}
		if( ! empty( $theme_options[ 'ttf' . $i ]['url'] ) ) {
			$urls[] = 'url(' . esc_url( $theme_options[ 'ttf' . $i ]['url'] ) . ')';
		}
		if( ! empty( $theme_options[ 'svg' . $i ]['url'] ) ) {
			$urls[] = 'url(' . esc_url( $theme_options[ 'svg' . $i ]['url'] ) . ')';
		}
		if( ! empty( $theme_options[ 'eot' . $i ]['url'] ) ) {
			$urls[] = 'url(' . esc_url( $theme_options[ 'eot' . $i ]['url'] ) . ')';
		}

		$font_face .= '@font-face {' . "\n";
		$font_face .= 'font-family:"' . esc_attr( $font_name ) . '";' . "\n";
		$font_face .= 'src:';
		$font_face .= implode( ', ', $urls ) . ';';
		$font_face .= '}' . "\n";
	}
}
echo wp_kses( $font_face, 'rt-content' );

$color_solid = '';
$color_rgba  = '';
if ( 'custom-color' === $radiantthemes_theme_options['color_scheme_type'] ) {
	$color_solid = $radiantthemes_theme_options['color_scheme_type_custom']['color'];
	$color_rgba  = $radiantthemes_theme_options['color_scheme_type_custom']['rgba'];
} elseif ( 'predefined-color' === $radiantthemes_theme_options['color_scheme_type'] ) {
	$color_solid = $radiantthemes_theme_options['color_scheme_type_predefined'];
	$color_rgba  = $radiantthemes_theme_options['color_scheme_type_predefined'];
}
?>

<?php

/*
--------------------------------------------------------------
>>> THEME COLOR SCHEME CSS || DO NOT CHANGE THIS WITHOUT PROPER KNOWLEDGE
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
// RadiantThemes Website Layout
// RadiantThemes Custom
// RadiantThemes Header Style
	// RadiantThemes Header Style One
	// RadiantThemes Header Style Two
	// RadiantThemes Header Style Six
	// RadiantThemes Header Style Sixteen
// RadiantThemes Inner Banner Style
// RadiantThemes Footer Style
	// RadiantThemes Footer Style Two
	// RadiantThemes Footer Style Eleven
// RadiantThemes Elements
	// RadiantThemes Elements Theme Button
	// RadiantThemes Elements Dropcap
	// RadiantThemes Elements Blockquote
	// RadiantThemes Elements Accordion
	// RadiantThemes Elements Pricing Table
	// RadiantThemes Elements List Style
	// RadiantThemes Elements Testimonial
	// RadiantThemes Elements Tab
	// RadiantThemes Elements Iconbox
	// RadiantThemes Elements Progress Bar
	// RadiantThemes Elements Theme Button
	// RadiantThemes Elements Portfolio
	// RadiantThemes Elements Fancy Text Box
	// RadiantThemes Elements Custom Menu
	// RadiantThemes Elements Blog
	// RadiantThemes Elements Animated Link
	// RadiantThemes Elements Timeline
	// RadiantThemes Elements Team
	// RadiantThemes Elements Currency Converter
	// RadiantThemes Elements Contact Box
	// RadiantThemes Elements Case Studies Slider
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Website Layout
--------------------------------------------------------------
*/
?>

.radiantthemes-website-layout.boxed{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['layout_type_boxed_width'] ); ?>px ;
}

@media (min-width: 1200px){

	.radiantthemes-website-layout.boxed .container{
	    width: calc( <?php echo esc_attr( $radiantthemes_theme_options['layout_type_boxed_width'] ); ?>px - 30px) ;
	}

	.radiantthemes-website-layout.boxed .container.page-container{
	    width: <?php echo esc_attr( $radiantthemes_theme_options['layout_type_boxed_width'] ); ?>px ;
	}

}

.radiantthemes-website-layout.boxed .container-fluid{
	max-width: calc( <?php echo esc_attr( $radiantthemes_theme_options['layout_type_boxed_width'] ); ?>px - 30px) ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Custom
--------------------------------------------------------------
*/
?>

a,
a:hover,
a:focus,
.sidr-close,
.widget-area > .widget .tagcloud > [class*='tag-link-']:hover,
.widget-area > .widget.widget_rss ul li .rss-date:before,
.post.single-post .entry-meta > .holder > .data .meta > span a:hover,
.post-tags a[rel='tag']:hover,
.post.style-one .post-meta > span i,
.post.style-two .entry-main .post-meta > span i,
.post.style-three .entry-main .post-meta > span i,
.radiantthemes-shop-box.style-one > .holder > .data .price,
.radiantthemes-shop-box.style-five > .holder:hover > .data > .action-buttons > .button,
.radiantthemes-shop-box.style-five > .holder:hover > .data > .action-buttons > .added_to_cart,
.wraper_maintenance_main.style-one .maintenance_main_item h2,
.wraper_maintenance_main.style-three .maintenance_main_item h1 strong,
.default-page ul:not(.contact) > li:before,
.comment-content ul:not(.contact) > li:before,
.comments-area ol.comment-list li .reply{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.nicescroll-cursors,
.hamburger-menu-main .widget-title:before,
.widget-area > .widget .widget-title:after,
.widget-area > .widget.widget_archive ul li a:before,
.widget-area > .widget.widget_categories ul li a:before,
.widget-area > .widget.widget_meta ul li a:before,
.widget-area > .widget.widget_pages ul li a:before,
.widget-area > .widget.widget_nav_menu ul li a:before,
.widget-area > .widget.widget_price_filter .ui-slider .ui-slider-range,
.widget-area > .widget.widget_price_filter .ui-slider .ui-slider-handle,
.radiantthemes-search-form .form-row button[type=submit],
.nav > [class*='menu-'] > ul.menu > li:before,
.footer_main_item ul.social li a:hover,
.footer_main_item .widget-title:before,
.pagination > *.current,
.woocommerce nav.woocommerce-pagination ul li span.current,
.post.style-two .entry-main .post-read-more .btn,
.post.style-three .entry-main .post-read-more .btn,
.post.style-five > .holder .category-list span,
.error_main .btn:before,
.radiantthemes-shop-box.style-one > .holder > .pic > .onsale,
.radiantthemes-shop-box.style-one > .holder > .action-buttons > .button,
.radiantthemes-shop-box.style-one > .holder > .action-buttons > .added_to_cart,
.radiantthemes-shop-box.style-one > .holder > .onsale,
.radiantthemes-shop-box.style-two > .holder > .onsale,
.maintenance_main .maintenance-progress > .maintenance-progress-bar,
.maintenance_main .maintenance-progress > .maintenance-progress-bar > .maintenance-progress-percentage > span,
.radiantthemes-search-form .form-row button[type=submit],
.wraper_error_main.style-one .error_main .btn,
.wraper_error_main.style-two .error_main .btn,
.wraper_error_main.style-three .error_main_item .btn,
.wraper_error_main.style-four .error_main .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.shop_single > .onsale{
	background-color: <?php echo esc_attr( $color_solid ); ?> !important;
}

.edit-link{
	background-color: <?php echo esc_attr( $color_rgba ); ?> ;
}

.footer_main_item ul.social li a:hover,
.widget-area > .widget select:focus,
.widget-area > .widget .tagcloud > [class*='tag-link-']:hover,
.rt-shop-box.style-two > .holder > .pic > .data{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.maintenance_main .maintenance-progress > .maintenance-progress-bar > .maintenance-progress-percentage > span:before{
	border-top-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiant-contact-form.element-two .form-row .wpcf7-form-control-wrap:before{
	border-bottom-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.default-page blockquote,
.comment-content blockquote{
	border-left-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Header Style One
--------------------------------------------------------------
*/
?>

body[data-header-style='header-style-one'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_one_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-one'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_one_hamburger_width'] ); ?>px ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Two
--------------------------------------------------------------
*/
?>

body[data-header-style='header-style-two'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_two_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-two'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_two_hamburger_width'] ); ?>px ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Six
--------------------------------------------------------------
*/
?>

body[data-header-style='header-style-six'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_six_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-six'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_six_hamburger_width'] ); ?>px ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Sixteen
--------------------------------------------------------------
*/
?>

body[data-header-style='header-style-sixteen'] #hamburger-menu{
	max-width: <?php echo esc_attr( $radiantthemes_theme_options['header_sixteen_hamburger_width'] ); ?>px ;
}

body[data-header-style='header-style-sixteen'] #hamburger-menu.right{
	right: -<?php echo esc_attr( $radiantthemes_theme_options['header_sixteen_hamburger_width'] ); ?>px ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Inner Banner Style
--------------------------------------------------------------
*/
?>

.wraper_inner_banner_main .inner_banner_main{
	text-align: <?php echo esc_attr( $radiantthemes_theme_options['inner_page_banner_alignment'] ); ?> ;
}

.wraper_inner_banner_breadcrumb .inner_banner_breadcrumb{
	text-align: <?php echo esc_attr( $radiantthemes_theme_options['breadcrumb_alignment'] ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Footer Style
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Footer Style Two
--------------------------------------------------------------
*/
?>

.wraper_footer.style-two .footer_main_item input[type="submit"],
.wraper_footer.style-two .footer_main_item input[type="button"],
.wraper_footer.style-two .footer_main_item button[type="submit"],
.wraper_footer.style-two .footer_main_item button[type="button"]{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Footer Style Eleven
--------------------------------------------------------------
*/
?>

.wraper_footer.style-eleven .footer_main_item input[type="submit"],
.wraper_footer.style-eleven .footer_main_item input[type="button"],
.wraper_footer.style-eleven .footer_main_item button[type="submit"],
.wraper_footer.style-eleven .footer_main_item button[type="button"]{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Elements Theme Button
--------------------------------------------------------------
*/
?>

.radiantthemes-button > .radiantthemes-button-main, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .widget-area > .widget.widget_price_filter .button, .rt-fancy-text-box.element-one > .holder > .more > a, .rt-fancy-text-box.element-two > .holder > .more > a, .rt-fancy-text-box.element-three > .holder > .more > a, .rt-fancy-text-box.element-four > .holder > .more > a, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Dropcap
--------------------------------------------------------------
*/
?>

.radiantthemes-dropcaps.element-two > .holder > .radiantthemes-dropcap-letter{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiantthemes-dropcaps.element-two > .holder > .radiantthemes-dropcap-letter{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiantthemes-dropcaps.element-three > .holder > .radiantthemes-dropcap-letter,
.radiantthemes-dropcaps.element-seven > .holder > .radiantthemes-dropcap-letter,
.radiantthemes-dropcaps.element-eight > .holder > .radiantthemes-dropcap-letter{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Blockquote
--------------------------------------------------------------
*/
?>

.rt-blockquote.element-one > blockquote > i.fa{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Accordion
--------------------------------------------------------------
*/
?>

.radiantthemes-accordion.element-one .radiantthemes-accordion-item.radiantthemes-active > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon,
.radiantthemes-accordion.element-two .radiantthemes-accordion-item.radiantthemes-active,
.radiantthemes-accordion.element-two .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon > .line:before,
.radiantthemes-accordion.element-two .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon > .line:after{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Pricing Table
--------------------------------------------------------------
*/
?>



<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements List Style
--------------------------------------------------------------
*/
?>

.radiantthemes-list.element-one ul li:before,
.radiantthemes-list.element-two ul li:before,
.radiantthemes-list.element-three ul li:before,
.radiantthemes-list.element-four ul li:before,
.radiantthemes-list.element-five ul li:before,
.radiantthemes-list.element-six ul li:before,
.radiantthemes-list.element-seven ul li:before,
.radiantthemes-list.element-eight ul li:before,
.radiantthemes-list.element-nine ul li:before{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Testimonial
--------------------------------------------------------------
*/
?>

.testimonial.element-one .testimonial-item > .holder > .testimonial-title .designation,
.testimonial.element-two .testimonial-item > .holder > .testimonial-data:before,
.testimonial.element-two .testimonial-item > .holder > .testimonial-title > .testimonial-title-data .designation{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.testimonial.element-one .testimonial-item > .holder > .testimonial-pic > .testimonial-pic-holder > .testimonial-pic-icon,
.testimonial.element-two .testimonial-item > .holder > .testimonial-pic > .testimonial-pic-holder > .testimonial-pic-icon,
.testimonial[class*="element-"].owl-nav-style-two .owl-nav > .owl-prev,
.testimonial[class*="element-"].owl-nav-style-two .owl-nav > .owl-next,
.testimonial[class*="element-"].owl-dot-style-one .owl-dots > .owl-dot > span,
.testimonial[class*="element-"].owl-dot-style-two .owl-dots > .owl-dot > span{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Tab
--------------------------------------------------------------
*/
?>

.rt-tab.element-three > ul.nav-tabs > li > a:before,
.rt-tab.element-four > ul.nav-tabs > li > a:before,
.rt-tab.element-seven > ul.nav-tabs > li.active > a:before,
.rt-tab.element-eight > ul.nav-tabs > li > a:before,
.rt-tab.element-nine > ul.nav-tabs > li > a:before,
.rt-tab.element-ten > ul.nav-tabs > li > a:before,
.rt-tab.element-eleven > ul.nav-tabs > li > a:before{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-tab.element-one > ul.nav-tabs > li.active > a,
.rt-tab.element-three > ul.nav-tabs > li.active > a,
.rt-tab.element-three > ul.nav-tabs > li.active > a i,
.rt-tab.element-six > ul.nav-tabs > li.active > a,
.rt-tab.element-eight > ul.nav-tabs > li.active > a,
.rt-tab.element-ten > ul.nav-tabs > li.active > a{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-tab.element-six > ul.nav-tabs > li > a:before{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Iconbox
--------------------------------------------------------------
*/
?>

.radiantthemes-iconbox.element-one > .radiantthemes-iconbox-holder > i{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Progress Bar
--------------------------------------------------------------
*/
?>

.rt-progress-bar.element-one > .progress > .progress-bar{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Theme Button
--------------------------------------------------------------
*/
?>

.radiantthemes-button > .radiantthemes-button-main,
.gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit],
.radiant-contact-form .form-row input[type=button],
.radiant-contact-form .form-row button[type=submit],
.post.style-two .post-read-more .btn,
.post.style-three .entry-main .post-read-more .btn,
.widget-area > .widget.widget_price_filter .button,
.rt-fancy-text-box.element-one > .holder > .more > a,
.rt-fancy-text-box.element-two > .holder > .more > a,
.rt-fancy-text-box.element-three > .holder > .more > a,
.rt-fancy-text-box.element-four > .holder > .more > a,
.rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn,
.rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn,
.rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn,
.rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn,
.rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Portfolio
--------------------------------------------------------------
*/
?>

.rt-portfolio-box.element-ten .rt-portfolio-box-item > .holder > .overlay ul.category-list li{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Fancy Text Box
--------------------------------------------------------------
*/
?>

.rt-fancy-text-box.element-two > .holder .icon i,
.rt-fancy-text-box.element-three > .holder:hover .more .btn{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Custom Menu
--------------------------------------------------------------
*/
?>

.radiantthemes-custom-menu.element-one ul.menu li a:before{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Blog
--------------------------------------------------------------
*/
?>

.blog.element-one .blog-item > .holder > .data ul.meta-data > li.category,
.blog.element-one .blog-item > .holder > .data .btn{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

.blog.element-one .blog-item > .holder > .data .btn:before{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Animated Link
--------------------------------------------------------------
*/
?>

.rt-animated-link.element-one > .holder > .main-link,
.rt-animated-link.element-two > .holder > .main-link,
.rt-animated-link.element-three > .holder > .main-link,
.rt-animated-link.element-four > .holder > .main-link,
.rt-animated-link.element-five > .holder > .main-link,
.rt-animated-link.element-six > .holder > .main-link,
.rt-animated-link.element-seven > .holder > .main-link,
.rt-animated-link.element-eight > .holder > .main-link{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-animated-link.element-three > .holder > .main-link:before,
.rt-animated-link.element-four > .holder > .main-link:before,
.rt-animated-link.element-five > .holder > .main-link:before,
.rt-animated-link.element-six > .holder > .main-link > .dot-holder > .dots,
.rt-animated-link.element-seven > .holder > .main-link:before,
.rt-animated-link.element-seven > .holder > .main-link:after,
.rt-animated-link.element-eight > .holder > .main-link-fliper{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-animated-link.element-one > .holder:before{
    border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Timeline
--------------------------------------------------------------
*/
?>

.radiantthemes-timeline.element-one > .radiantthemes-timeline-item > .radiantthemes-timeline-item-datestamp,
.radiantthemes-timeline.element-two > .radiantthemes-timeline-item > .radiantthemes-timeline-item-line:after{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiantthemes-timeline.element-one > .radiantthemes-timeline-item > .holder > .radiantthemes-timeline-item-data .month,
.radiantthemes-timeline.element-three > .radiantthemes-timeline-slider .radiantthemes-timeline-item .radiantthemes-timeline-item-data .date{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiantthemes-timeline.element-two > .radiantthemes-timeline-item > .radiantthemes-timeline-item-dot,
.radiantthemes-timeline.element-three > .radiantthemes-timeline-slider > .owl-thumbs > .owl-thumb-item.active:after{
    border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Team
--------------------------------------------------------------
*/
?>

.team.element-one .team-item > .holder > .pic > .pic-data .designation,
.team.element-one .team-item > .holder > .data .designation{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Currency Converter
--------------------------------------------------------------
*/
?>

.radiantthemes-currency-converter.element-one .radiantthemes-currency-converter-form .radiantthemes-currency-converter-form-row select{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Contact Box
--------------------------------------------------------------
*/
?>

.radiantthemes-contact-box ul.contact li i{
    color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Case Studies Slider
--------------------------------------------------------------
*/
?>

.radiantthemes-case-studies-slider.element-one .radiantthemes-case-studies-slider-item.first-item > .holder > .table > .table-cell > .data .btn{
    background-color: <?php echo esc_attr( $color_solid ); ?> ;
}
