<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Radiant_Admin {

	public function __construct() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10 );
		add_action( 'wp_ajax_radiantthemes_install_plugin', array( $this, 'install_plugin' ) );
		add_action( 'wp_ajax_radiantthemes_activate_plugin', array( $this, 'activate_plugin' ) );
		add_action( 'wp_ajax_radiantthemes_deactivate_plugin', array( $this, 'deactivate_plugin' ) );
		add_action( 'wp_ajax_radiantthemes_update_plugin', array( $this, 'update_plugin' ) );

	}

	public function tgmpa_load( $load ) {
		return true;
	}

	public function install_plugin() {

		if ( current_user_can( 'manage_options' ) ) {

			check_admin_referer( 'tgmpa-install', 'tgmpa-nonce' );

			global $tgmpa;

			$tgmpa->install_plugins_page();

			$url = wp_nonce_url(
				add_query_arg(
					array(
						'plugin'			=> urlencode( $_GET['plugin'] ),
						'tgmpa-deactivate'	=> 'deactivate-plugin',
					),
					$tgmpa->get_tgmpa_url()
				),
				'tgmpa-deactivate',
				'tgmpa-nonce'
			);

			echo esc_html__( 'radiantthemes', 'cura' );
			echo wp_specialchars_decode( $url );

		}

		// this is required to terminate immediately and return a proper response
		wp_die();

	}

	public function activate_plugin() {

		if ( current_user_can( 'edit_theme_options' ) ) {

			check_admin_referer( 'tgmpa-activate', 'tgmpa-nonce' );

			global $tgmpa;

			$plugins = $tgmpa->plugins;

			foreach ( $plugins as $plugin ) {

				if ( isset( $_GET['plugin'] ) && $plugin['slug'] === $_GET['plugin'] ) {

					activate_plugin( $plugin['file_path'] );

					$url = wp_nonce_url(
						add_query_arg(
							array(
								'plugin'			=> urlencode( $_GET['plugin'] ),
								'tgmpa-deactivate'	=> 'deactivate-plugin',
							),
							$tgmpa->get_tgmpa_url()
						),
						'tgmpa-deactivate',
						'tgmpa-nonce'
					);

					echo wp_specialchars_decode( $url );

				}

			} // foreach

		}

		// this is required to terminate immediately and return a proper response
		wp_die();

	}

	public function deactivate_plugin() {

		if ( current_user_can( 'edit_theme_options' ) ) {

			check_admin_referer( 'tgmpa-deactivate', 'tgmpa-nonce' );

			global $tgmpa;

			$plugins = $tgmpa->plugins;

			foreach ( $plugins as $plugin ) {

				if ( isset( $_GET['plugin'] ) && $plugin['slug'] === $_GET['plugin'] ) {

					deactivate_plugins( $plugin['file_path'] );

					$url = wp_nonce_url(
						add_query_arg(
							array(
								'plugin'			=> urlencode( $_GET['plugin'] ),
								'tgmpa-activate'	=> 'activate-plugin',
							),
							$tgmpa->get_tgmpa_url()
						),
						'tgmpa-activate',
						'tgmpa-nonce'
					);

					echo wp_specialchars_decode( $url );

				}

			} // foreach

		}

		// this is required to terminate immediately and return a proper response
		wp_die();

	}

	public function update_plugin() {
		if ( current_user_can( 'manage_options' ) ) {
			check_admin_referer( 'tgmpa-update', 'tgmpa-nonce' );
			global $tgmpa;
			$tgmpa->install_plugins_page();

			$url = wp_nonce_url(
				add_query_arg(
					array(
						'plugin'			=> urlencode( $_GET['plugin'] ),
						'tgmpa-deactivate'	=> 'deactivate-plugin',
					),
					$tgmpa->get_tgmpa_url()
				),
				'tgmpa-deactivate',
				'tgmpa-nonce'
			);

			echo esc_html__( 'radiantthemes', 'cura' );
			echo wp_specialchars_decode( $url );
		}

		// this is required to terminate immediately and return a proper response
		wp_die();
	}

	public function enqueue_scripts() {

		if ( isset( $_GET['page'] ) ) :

			if ( substr( $_GET['page'], 0, 20 ) == "radiantthemes-admin-" ) :

				// admin pages style
				wp_enqueue_style(
					'radiantthemes-plugin-styles',
					get_template_directory_uri() . '/inc/tgmpa/css/admin-pages.css',
					array(),
					time(),
					'all'
				);

				// install plugins scripts
				if ( $_GET['page'] == 'radiantthemes-admin-plugins' ) :

					wp_enqueue_script(
						'radiantthemes-admin-plugins',
						get_template_directory_uri() . '/inc/tgmpa/js/rt-install-plugins.js',
						array( 'jquery' ),
						time(),
						true
					);

				endif;

			endif; // substr

		endif; // isset

	}

}

new Radiant_Admin();
