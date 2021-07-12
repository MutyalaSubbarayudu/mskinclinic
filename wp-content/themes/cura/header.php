<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package qik
	 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php if ( radiantthemes_global_var( 'preloader_switch', '', false ) ) { ?>
	<!-- preloader -->
	<div class="preloader" data-preloader-timeout="<?php echo esc_attr( radiantthemes_global_var( 'preloader_timeout', '', false ) ); ?>">
		<?php
		if ( ! empty( radiantthemes_global_var( 'preloader_style', '', false ) ) ) {
			include get_parent_theme_file_path( 'inc/preloader/' . radiantthemes_global_var( 'preloader_style', '', false ) . '.php' );
		}
		?>
	</div>
	<!-- preloader -->
		<?php
	}
	?>

	<!-- overlay -->
	<div class="overlay"></div>
	<!-- overlay -->

	<!-- scrollup -->
	<?php if ( radiantthemes_global_var( 'scroll_to_top_switch', '', false ) ) { ?>
		<?php if ( ! empty( radiantthemes_global_var( 'scroll_to_top_direction', '', false ) ) ) : ?>
	<div class="scrollup <?php echo esc_attr( radiantthemes_global_var( 'scroll_to_top_direction', '', false ) ); ?>">
		<?php else : ?>
		<div class="scrollup left">
			<?php endif; ?>
			<span class="ti-angle-up"></span>
		</div>
		<?php } ?>
		<!-- scrollup -->
		<?php radiantthemes_website_layout(); ?>
		<?php radiantthemes_short_banner_selection(); ?>
		<!-- #page -->
		<div id="page" class="site">
			<!-- #content -->
			<div id="content" class="site-content">
