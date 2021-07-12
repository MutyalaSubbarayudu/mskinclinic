<?php
/**
 * Basic Custom Post Types. Custom Post Types include Team, Clients,
 * Portfolios, Our Story and Testimonials.
 *
 * @package RadiantThemes
 *
 * @wordpress-plugin
 * Plugin Name: RadiantThemes Custom Post Type
 * Description: Basic Custom Post Types. Custom Post Types include  Team, Clients, Portfolios, Our Story and Testimonials.
 * Version: 1.0.2
 * Author: RadiantThemes
 * Author URI: http://www.radiantthemes.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: radiantthemes-custom-post-type
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Require files.
require 'short-header.php';
require 'class-radiantthemes-portfolio-colors-metabox.php';
require_once 'mega-menu/class-radiantthemes-menu-walker.php';


require_once 'widget/facebook-page-box/class-radiantthemes-facebook-widget.php';
require_once 'widget/twitter-widget/class-radiantthemes-twitter-widget.php';
require_once 'widget/contact-box/class-radiantthemes-contact-box-widget.php';
require_once 'widget/social-widget/class-radiantthemes-social-widget.php';
require_once 'widget/recent-posts/class-radiantthemes-recent-posts-widget.php';
require_once 'widget/image-box/class-radiantthemes-image-box-widget.php';

/**
 * Remove Notice.
 */
function radiantthemes_unwanted_notice_remove() {
	echo '<style type="text/css">.rs-update-notice-wrap,.vc_license-activation-notice{display:none;}</style>';
}
add_action( 'admin_head', 'radiantthemes_unwanted_notice_remove' );

/**
 * Add custom post types.
 */
function radiantthemes_custom_posts_init() {
	$radiantthemes_dir = ABSPATH . 'wp-content/uploads/radiantthemes/';
	$demo_dir          = $radiantthemes_dir . 'demo-data/';
	$demo_dir_two      = $radiantthemes_dir . 'demo-data/digital-studio';

	if ( ! file_exists( $demo_dir ) || ! file_exists( $demo_dir_two ) ) {
		// Create demo-data folder.
		if ( wp_mkdir_p( $demo_dir ) ) {
			wp_mkdir_p( $demo_dir );
		}

		WP_Filesystem();

		global $wp_filesystem;

		$download_url = plugin_dir_path( __FILE__ ) . 'import/demo.zip';
		$file         = $demo_dir . 'demo.zip';

		$content = $wp_filesystem->get_contents( $download_url );

		$wp_filesystem->put_contents( $file, $content, 0644 );

		$unzipfile = unzip_file( $file, $demo_dir );

		wp_delete_file( $file );
	}
	// Localization.
	load_plugin_textdomain( 'radiantthemes-custom-post-type', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	// Register the "Testimonial" custom post type.
	$testimonials_labels = array(
		'name'                  => _x( 'Testimonials', 'Post type general name', 'radiantthemes-custom-post-type' ),
		'singular_name'         => _x( 'Testimonial', 'Post type singular name', 'radiantthemes-custom-post-type' ),
		'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'radiantthemes-custom-post-type' ),
		'name_admin_bar'        => _x( 'Testimonial', 'Add New on Toolbar', 'radiantthemes-custom-post-type' ),
		'add_new'               => __( 'Add New Testimonial', 'radiantthemes-custom-post-type' ),
		'add_new_item'          => __( 'Add New Testimonials', 'radiantthemes-custom-post-type' ),
		'new_item'              => __( 'New Testimonials', 'radiantthemes-custom-post-type' ),
		'edit_item'             => __( 'Edit Testimonials', 'radiantthemes-custom-post-type' ),
		'view_item'             => __( 'View Testimonials', 'radiantthemes-custom-post-type' ),
		'all_items'             => __( 'All Testimonials', 'radiantthemes-custom-post-type' ),
		'search_items'          => __( 'Search Testimonials', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Testimonials:', 'radiantthemes-custom-post-type' ),
		'not_found'             => __( 'No Testimonials found.', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash'    => __( 'No Testimonials found in Trash.', 'radiantthemes-custom-post-type' ),
		'featured_image'        => _x( 'Client Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'set_featured_image'    => _x( 'Set Client Image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'remove_featured_image' => _x( 'Remove Client image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'use_featured_image'    => _x( 'Use as Client image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'archives'              => _x( 'Testimonials archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'insert_into_item'      => _x( 'Insert into testimonial', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this testimonial', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'filter_items_list'     => _x( 'Filter testimonials list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list_navigation' => _x( 'Testimonials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list'            => _x( 'Testimonials list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
	);

	$post_type_testimonial = array(
		'labels'             => $testimonials_labels,
		'public'             => true,
		'publicly_queryable' => false,
		'menu_icon'          => 'dashicons-testimonial',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'testimonial',
		),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);
	register_post_type( 'testimonial', $post_type_testimonial );

	/**
	 * Register the Testimonial Category taxonomy.
	 */
	$testimonial_label = array(
		'name'                       => _x( 'Testimonial Categories', 'Taxonomy General Name', 'radiantthemes-custom-post-type' ),
		'singular_name'              => _x( 'Testimonial Category', 'Taxonomy Singular Name', 'radiantthemes-custom-post-type' ),
		'menu_name'                  => __( 'Testimonial Category', 'radiantthemes-custom-post-type' ),
		'all_items'                  => __( 'All Testimonial Categories', 'radiantthemes-custom-post-type' ),
		'parent_item'                => __( 'Parent Testimonial Category', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'          => __( 'Parent Testimonial Category:', 'radiantthemes-custom-post-type' ),
		'new_item_name'              => __( 'New Testimonial Category Name', 'radiantthemes-custom-post-type' ),
		'add_new_item'               => __( 'Add New Testimonial Category', 'radiantthemes-custom-post-type' ),
		'edit_item'                  => __( 'Edit Testimonial Category', 'radiantthemes-custom-post-type' ),
		'update_item'                => __( 'Update Testimonial Category', 'radiantthemes-custom-post-type' ),
		'view_item'                  => __( 'View Testimonial Category', 'radiantthemes-custom-post-type' ),
		'separate_items_with_commas' => __( 'Separate Testimonial Categories with commas', 'radiantthemes-custom-post-type' ),
		'add_or_remove_items'        => __( 'Add or remove Testimonial Categories', 'radiantthemes-custom-post-type' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'radiantthemes-custom-post-type' ),
		'popular_items'              => __( 'Popular Testimonial Categories', 'radiantthemes-custom-post-type' ),
		'search_items'               => __( 'Search Testimonial Categories', 'radiantthemes-custom-post-type' ),
		'not_found'                  => __( 'Not Found', 'radiantthemes-custom-post-type' ),
		'no_terms'                   => __( 'No Testimonial Categories', 'radiantthemes-custom-post-type' ),
		'items_list'                 => __( 'Testimonial Categories list', 'radiantthemes-custom-post-type' ),
		'items_list_navigation'      => __( 'Testimonial Categories list navigation', 'radiantthemes-custom-post-type' ),
	);

	$post_type_testimonial = array(
		'labels'            => $testimonial_label,
		'hierarchical'      => true,
		'public'            => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'testimonial-category', array( 'testimonial' ), $post_type_testimonial );
	
	
	
	
	
	
	
	
	
	// Register the "Service" custom post type.
	$services_labels = array(
		'name'                  => _x( 'Services', 'Post type general name', 'radiantthemes-custom-post-type' ),
		'singular_name'         => _x( 'Service', 'Post type singular name', 'radiantthemes-custom-post-type' ),
		'menu_name'             => _x( 'Services', 'Admin Menu text', 'radiantthemes-custom-post-type' ),
		'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'radiantthemes-custom-post-type' ),
		'add_new'               => __( 'Add New Service', 'radiantthemes-custom-post-type' ),
		'add_new_item'          => __( 'Add New Services', 'radiantthemes-custom-post-type' ),
		'new_item'              => __( 'New Services', 'radiantthemes-custom-post-type' ),
		'edit_item'             => __( 'Edit Services', 'radiantthemes-custom-post-type' ),
		'view_item'             => __( 'View Services', 'radiantthemes-custom-post-type' ),
		'all_items'             => __( 'All Services', 'radiantthemes-custom-post-type' ),
		'search_items'          => __( 'Search Services', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Services:', 'radiantthemes-custom-post-type' ),
		'not_found'             => __( 'No Services found.', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash'    => __( 'No Services found in Trash.', 'radiantthemes-custom-post-type' ),
		'featured_image'        => _x( 'Services Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'set_featured_image'    => _x( 'Set Services Image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'remove_featured_image' => _x( 'Remove Services image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'use_featured_image'    => _x( 'Use as Services image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'archives'              => _x( 'Services archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'insert_into_item'      => _x( 'Insert into Service', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Service', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'filter_items_list'     => _x( 'Filter Service list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list_navigation' => _x( 'Service list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list'            => _x( 'Service list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
	);

	$post_type_service = array(
		'labels'             => $services_labels,
		'public'             => true,
		'publicly_queryable' => false,
		'menu_icon'          => 'dashicons-images-alt2',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'service',
		),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);
	register_post_type( 'service', $post_type_service );

	/**
	 * Register the Service Category taxonomy.
	 */
	$service_label = array(
		'name'                       => _x( 'Service Categories', 'Taxonomy General Name', 'radiantthemes-custom-post-type' ),
		'singular_name'              => _x( 'Service Category', 'Taxonomy Singular Name', 'radiantthemes-custom-post-type' ),
		'menu_name'                  => __( 'Service Category', 'radiantthemes-custom-post-type' ),
		'all_items'                  => __( 'All Service Categories', 'radiantthemes-custom-post-type' ),
		'parent_item'                => __( 'Parent Service Category', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'          => __( 'Parent Service Category:', 'radiantthemes-custom-post-type' ),
		'new_item_name'              => __( 'New Service Category Name', 'radiantthemes-custom-post-type' ),
		'add_new_item'               => __( 'Add New Service Category', 'radiantthemes-custom-post-type' ),
		'edit_item'                  => __( 'Edit Service Category', 'radiantthemes-custom-post-type' ),
		'update_item'                => __( 'Update Service Category', 'radiantthemes-custom-post-type' ),
		'view_item'                  => __( 'View Service Category', 'radiantthemes-custom-post-type' ),
		'separate_items_with_commas' => __( 'Separate Service Categories with commas', 'radiantthemes-custom-post-type' ),
		'add_or_remove_items'        => __( 'Add or remove Service Categories', 'radiantthemes-custom-post-type' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'radiantthemes-custom-post-type' ),
		'popular_items'              => __( 'Popular Service Categories', 'radiantthemes-custom-post-type' ),
		'search_items'               => __( 'Search Service Categories', 'radiantthemes-custom-post-type' ),
		'not_found'                  => __( 'Not Found', 'radiantthemes-custom-post-type' ),
		'no_terms'                   => __( 'No Service Categories', 'radiantthemes-custom-post-type' ),
		'items_list'                 => __( 'Service Categories list', 'radiantthemes-custom-post-type' ),
		'items_list_navigation'      => __( 'Service Categories list navigation', 'radiantthemes-custom-post-type' ),
	);

	$post_type_service = array(
		'labels'            => $service_label,
		'hierarchical'      => true,
		'public'            => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'service-category', array( 'service' ), $post_type_service );
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	// Register the "Team" custom post type.
	$team_labels = array(
		'name'                  => _x( 'Team', 'Post type general name', 'radiantthemes-custom-post-type' ),
		'singular_name'         => _x( 'Team', 'Post type singular name', 'radiantthemes-custom-post-type' ),
		'menu_name'             => _x( 'Team', 'Admin Menu text', 'radiantthemes-custom-post-type' ),
		'name_admin_bar'        => _x( 'Team', 'Add New on Toolbar', 'radiantthemes-custom-post-type' ),
		'add_new'               => __( 'Add New Team', 'radiantthemes-custom-post-type' ),
		'add_new_item'          => __( 'Add New Team', 'radiantthemes-custom-post-type' ),
		'new_item'              => __( 'New Team', 'radiantthemes-custom-post-type' ),
		'edit_item'             => __( 'Edit Team', 'radiantthemes-custom-post-type' ),
		'view_item'             => __( 'View Team', 'radiantthemes-custom-post-type' ),
		'all_items'             => __( 'All Team', 'radiantthemes-custom-post-type' ),
		'search_items'          => __( 'Search Team', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Team:', 'radiantthemes-custom-post-type' ),
		'not_found'             => __( 'No Team found.', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash'    => __( 'No Team found in Trash.', 'radiantthemes-custom-post-type' ),
		'featured_image'        => _x( 'Team Member Image', 'Overrides the "Featured Image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'set_featured_image'    => _x( 'Set Team Member Image', 'Overrides the "Set featured image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'remove_featured_image' => _x( 'Remove Team Member Image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'use_featured_image'    => _x( 'Use as Team Member Image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'archives'              => _x( 'Team archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'insert_into_item'      => _x( 'Insert into team', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this team', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'filter_items_list'     => _x( 'Filter team list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list_navigation' => _x( 'Team list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list'            => _x( 'Team list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
	);

	$post_type_team = array(
		'labels'             => $team_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'menu_icon'          => 'dashicons-groups',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'doctor',
		),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);
	register_post_type( 'doctor', $post_type_team );

	/**
	 * Register the "Profession" taxonomy.
	 */
	$profession_label = array(
		'name'                       => _x( 'Professions', 'Taxonomy General Name', 'radiantthemes-custom-post-type' ),
		'singular_name'              => _x( 'Profession', 'Taxonomy Singular Name', 'radiantthemes-custom-post-type' ),
		'menu_name'                  => __( 'Profession', 'radiantthemes-custom-post-type' ),
		'all_items'                  => __( 'All Professions', 'radiantthemes-custom-post-type' ),
		'parent_item'                => __( 'Parent Profession', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'          => __( 'Parent Profession:', 'radiantthemes-custom-post-type' ),
		'new_item_name'              => __( 'New Profession Name', 'radiantthemes-custom-post-type' ),
		'add_new_item'               => __( 'Add New Profession', 'radiantthemes-custom-post-type' ),
		'edit_item'                  => __( 'Edit Profession', 'radiantthemes-custom-post-type' ),
		'update_item'                => __( 'Update Profession', 'radiantthemes-custom-post-type' ),
		'view_item'                  => __( 'View Profession', 'radiantthemes-custom-post-type' ),
		'separate_items_with_commas' => __( 'Separate Professions with commas', 'radiantthemes-custom-post-type' ),
		'add_or_remove_items'        => __( 'Add or remove Professions', 'radiantthemes-custom-post-type' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'radiantthemes-custom-post-type' ),
		'popular_items'              => __( 'Popular Professions', 'radiantthemes-custom-post-type' ),
		'search_items'               => __( 'Search Professions', 'radiantthemes-custom-post-type' ),
		'not_found'                  => __( 'Not Found', 'radiantthemes-custom-post-type' ),
		'no_terms'                   => __( 'No Professions', 'radiantthemes-custom-post-type' ),
		'items_list'                 => __( 'Professions list', 'radiantthemes-custom-post-type' ),
		'items_list_navigation'      => __( 'Professions list navigation', 'radiantthemes-custom-post-type' ),
	);

	$post_type_professional = array(
		'labels'            => $profession_label,
		'hierarchical'      => true,
		'public'            => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'profession', array( 'doctor' ), $post_type_professional );

	

	// Register the "Clients" custom post type.
	$clients_labels = array(
		'name'                  => _x( 'Clients', 'Post type general name', 'radiantthemes-custom-post-type' ),
		'singular_name'         => _x( 'Client', 'Post type singular name', 'radiantthemes-custom-post-type' ),
		'menu_name'             => _x( 'Clients', 'Admin Menu text', 'radiantthemes-custom-post-type' ),
		'name_admin_bar'        => _x( 'Client', 'Add New on Toolbar', 'radiantthemes-custom-post-type' ),
		'add_new'               => __( 'Add New Client', 'radiantthemes-custom-post-type' ),
		'add_new_item'          => __( 'Add New Clients', 'radiantthemes-custom-post-type' ),
		'new_item'              => __( 'New Clients', 'radiantthemes-custom-post-type' ),
		'edit_item'             => __( 'Edit Clients', 'radiantthemes-custom-post-type' ),
		'view_item'             => __( 'View Clients', 'radiantthemes-custom-post-type' ),
		'all_items'             => __( 'All Clients', 'radiantthemes-custom-post-type' ),
		'search_items'          => __( 'Search Clients', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Clients:', 'radiantthemes-custom-post-type' ),
		'not_found'             => __( 'No Clients found.', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash'    => __( 'No Clients found in Trash.', 'radiantthemes-custom-post-type' ),
		'featured_image'        => _x( 'Client Cover Image', 'Overrides the "Featured Image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'set_featured_image'    => _x( 'Set Client Image', 'Overrides the "Set featured image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'remove_featured_image' => _x( 'Remove Client image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'use_featured_image'    => _x( 'Use as Client image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'archives'              => _x( 'Clients archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'insert_into_item'      => _x( 'Insert into Client', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Client', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'filter_items_list'     => _x( 'Filter Clients list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list_navigation' => _x( 'Clients list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list'            => _x( 'Clients list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
	);

	$post_type_client = array(
		'labels'             => $clients_labels,
		'public'             => true,
		'publicly_queryable' => false,
		'menu_icon'          => 'dashicons-businessman',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'client',
		),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' ),
	);
	register_post_type( 'client', $post_type_client );

	/**
	 * Register the Client Category taxonomy.
	 */
	$client_label = array(
		'name'                       => _x( 'Client Categories', 'Taxonomy General Name', 'radiantthemes-custom-post-type' ),
		'singular_name'              => _x( 'Client Category', 'Taxonomy Singular Name', 'radiantthemes-custom-post-type' ),
		'menu_name'                  => __( 'Client Category', 'radiantthemes-custom-post-type' ),
		'all_items'                  => __( 'All Client Categories', 'radiantthemes-custom-post-type' ),
		'parent_item'                => __( 'Parent Client Category', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'          => __( 'Parent Client Category:', 'radiantthemes-custom-post-type' ),
		'new_item_name'              => __( 'New Client Category Name', 'radiantthemes-custom-post-type' ),
		'add_new_item'               => __( 'Add New Client Category', 'radiantthemes-custom-post-type' ),
		'edit_item'                  => __( 'Edit Client Category', 'radiantthemes-custom-post-type' ),
		'update_item'                => __( 'Update Client Category', 'radiantthemes-custom-post-type' ),
		'view_item'                  => __( 'View Client Category', 'radiantthemes-custom-post-type' ),
		'separate_items_with_commas' => __( 'Separate Client Categories with commas', 'radiantthemes-custom-post-type' ),
		'add_or_remove_items'        => __( 'Add or remove Client Categories', 'radiantthemes-custom-post-type' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'radiantthemes-custom-post-type' ),
		'popular_items'              => __( 'Popular Client Categories', 'radiantthemes-custom-post-type' ),
		'search_items'               => __( 'Search Client Categories', 'radiantthemes-custom-post-type' ),
		'not_found'                  => __( 'Not Found', 'radiantthemes-custom-post-type' ),
		'no_terms'                   => __( 'No Client Categories', 'radiantthemes-custom-post-type' ),
		'items_list'                 => __( 'Client Categories list', 'radiantthemes-custom-post-type' ),
		'items_list_navigation'      => __( 'Client Categories list navigation', 'radiantthemes-custom-post-type' ),
	);

	$post_type_client = array(
		'labels'            => $client_label,
		'hierarchical'      => true,
		'public'            => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'client-category', array( 'client' ), $post_type_client );
		

	// Register the Mega Menu custom post type.
	$mega_menu_labels = array(
		'name'               => esc_html__( 'Mega Menus', 'radiantthemes-custom-post-type' ),
		'all_items'          => esc_html__( 'Mega Menus', 'radiantthemes-custom-post-type' ),
		'singular_name'      => esc_html__( 'Mega Menu', 'radiantthemes-custom-post-type' ),
		'add_new'            => esc_html__( 'Add New', 'radiantthemes-custom-post-type' ),
		'add_new_item'       => esc_html__( 'Add New Mega Menu', 'radiantthemes-custom-post-type' ),
		'edit_item'          => esc_html__( 'Edit Mega Menu', 'radiantthemes-custom-post-type' ),
		'new_item'           => esc_html__( 'New Mega Menu', 'radiantthemes-custom-post-type' ),
		'view_item'          => esc_html__( 'View Mega Menu', 'radiantthemes-custom-post-type' ),
		'search_items'       => esc_html__( 'Search Mega Menus', 'radiantthemes-custom-post-type' ),
		'not_found'          => esc_html__( 'No Mega Menus found', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash' => esc_html__( 'No Mega Menus found in Trash', 'radiantthemes-custom-post-type' ),
	);

	$mega_menu_args = array(
		'labels'          => $mega_menu_labels,
		'public'          => true,
		'show_ui'         => true,
		'capability_type' => 'post',
		'hierarchical'    => true,
		'rewrite'         => array(
			'slug' => 'mega_menus',
		),
		'supports'        => array(
			'title',
			'editor',
		),
		'menu_icon'       => 'dashicons-editor-table',
	);
	register_post_type( 'mega_menu', $mega_menu_args );

	/**
	 * Shortcode [home_url] to return WordPress Home Link.
	 *
	 * @return string Returns Link of the home url.
	 */
	function rt_home_url_function() {
		return get_bloginfo( 'url' );
	}
	add_shortcode( 'home_url', 'rt_home_url_function' );
}

/**
 * Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */
add_action( 'init', 'radiantthemes_custom_posts_init' );

/**
 * Add meta box for testimonials
 *
 * @param post $post The post object.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function testimonial_add_meta_boxes( $post ) {
	add_meta_box(
		'testimonial_meta_box',
		esc_html__( 'CLIENT INFORMATION', 'radiantthemes-custom-post-type' ),
		'testimonial_build_meta_box',
		'testimonial',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes_testimonial', 'testimonial_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object.
 */
function testimonial_build_meta_box( $post ) {
	// make sure the form request comes from WordPress.
	wp_nonce_field( basename( __FILE__ ), 'testimonial_meta_box_nonce' );

	// retrieve the _testimonial_designation current value.
	$current_designation = get_post_meta( $post->ID, '_testimonial_designation', true );
	?>
	<div class='inside'>

		<h3><?php esc_html_e( 'Designation', 'radiantthemes-custom-post-type' ); ?></h3>
		<input type="text" class="widefat" name="designation" value="<?php echo esc_attr( $current_designation ); ?>" />

	</div>
	<?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function testimonial_save_meta_box_data( $post_id ) {
	// verify meta box nonce.
	if ( ! isset( $_POST['testimonial_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['testimonial_meta_box_nonce'] ), basename( __FILE__ ) ) ) { // Input var okay.
		return;
	}
	// return if autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	// store custom fields values
	// designation string.
	if ( isset( $_REQUEST['designation'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_testimonial_designation', sanitize_text_field( wp_unslash( $_POST['designation'] ) ) ); // Input var okay.
	}
}
add_action( 'save_post_testimonial', 'testimonial_save_meta_box_data' );

/**
 * Add meta box for team
 *
 * @param post $post The post object.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function team_add_meta_boxes( $post ) {
	add_meta_box(
		'team_meta_box',
		__( 'PERSON INFORMATION', 'radiantthemes-custom-post-type' ),
		'team_build_meta_box',
		'team',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes_team', 'team_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object.
 */
function team_build_meta_box( $post ) {
	// make sure the form request comes from WordPress.
	wp_nonce_field( basename( __FILE__ ), 'team_meta_box_nonce' );

	// retrieve the _team_facebook current value.
	$current_phone = get_post_meta( $post->ID, '_team_phone', true );

	// retrieve the _team_facebook current value.
	$current_email = get_post_meta( $post->ID, '_team_email', true );

	// retrieve the _team_facebook current value.
	$current_facebook = get_post_meta( $post->ID, '_team_facebook', true );

	// retrieve the _team_twitter current value.
	$current_twitter = get_post_meta( $post->ID, '_team_twitter', true );

	// retrieve the _team_gplus current value.
	$current_gplus = get_post_meta( $post->ID, '_team_gplus', true );

	// retrieve the _team_pinterest current value.
	$current_pinterest = get_post_meta( $post->ID, '_team_pinterest', true );

	?>
	<div class='inside'>
		<h3><?php esc_html_e( 'Phone', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="phone" value="<?php echo esc_html( $current_phone ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Email', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="email" value="<?php echo sanitize_email( $current_email ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Facebook Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="facebook" value="<?php echo esc_url( $current_facebook ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Twitter Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="twitter" value="<?php echo esc_url( $current_twitter ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Google Plus Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="gplus" value="<?php echo esc_url( $current_gplus ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Pinterest Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="pinterest" value="<?php echo esc_url( $current_pinterest ); ?>" />
		</p>
	</div>
	<?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function team_save_meta_box_data( $post_id ) {
	// verify meta box nonce.
	if ( ! isset( $_POST['team_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['team_meta_box_nonce'] ), basename( __FILE__ ) ) ) { // Input var okay.
		return;
	}
	// return if autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	// store custom fields values
	// phone link.
	if ( isset( $_REQUEST['phone'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_phone', sanitize_text_field( wp_unslash( $_POST['phone'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// phone link.
	if ( isset( $_REQUEST['email'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_email', sanitize_text_field( wp_unslash( $_POST['email'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// facebook link.
	if ( isset( $_REQUEST['facebook'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_facebook', sanitize_text_field( wp_unslash( $_POST['facebook'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// twitter link.
	if ( isset( $_REQUEST['twitter'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_twitter', sanitize_text_field( wp_unslash( $_POST['twitter'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// gplus link.
	if ( isset( $_REQUEST['gplus'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_gplus', sanitize_text_field( wp_unslash( $_POST['gplus'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// pinterest link.
	if ( isset( $_REQUEST['pinterest'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_pinterest', sanitize_text_field( wp_unslash( $_POST['pinterest'] ) ) ); // Input var okay.
	}
}
add_action( 'save_post_team', 'team_save_meta_box_data' );

/**
 * Add metabox for Client
 *
 * @param WP_Post $post Current post object.
 */
function client_add_meta_box( $post ) {
	add_meta_box(
		'client_meta_box',
		esc_html__( 'Client Alternate Image', 'radiantthemes-custom-post-type' ),
		'client_build_meta_box',
		'client',
		'side',
		'low'
	);
}
add_action( 'add_meta_boxes_client', 'client_add_meta_box' );

function client_image_uploader_field( $name, $value = '' ) {
	$image      = ' button">Upload image';
	$image_size = 'full';
	$display    = 'none';

	if ( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {

		// $image_attributes[0] - image URL
		// $image_attributes[1] - image width
		// $image_attributes[2] - image height

		$image   = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;display:block;" />';
		$display = 'inline-block';

	}

	return '
	<div>
		<a href="#" class="client_upload_image_button' . $image . '</a>
		<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . esc_attr( $value ) . '" />
		<a href="#" class="client_remove_image_button" style="display:inline-block;display:' . $display . '">Remove image</a>
	</div>';
}

function client_build_meta_box( $post ) {
	// Add nonce for security and authentication.
	wp_nonce_field( 'client_nonce_action', 'client_nonce' );

	// Retrieve an existing value from the database.
	$client_alt_img_link = get_post_meta( $post->ID, 'client_alt_img_link', true );

	// Set default values.
	if ( empty( $client_alt_img_link ) ) {
		$client_alt_img_link = '';
	}

	// Form fields.
	$meta_key = 'client_alt_img_link';
	echo client_image_uploader_field( $meta_key, get_post_meta( $post->ID, $meta_key, true ) );
	?>
	<script>
		jQuery(function ($) {
		/*
		* Select/Upload image(s) event
		*/
		$('body').on('click', '.client_upload_image_button', function (e) {
			e.preventDefault();

			var button = $(this),
				custom_uploader = wp.media({
					title: 'Insert image',
					library: {
						// uncomment the next line if you want to attach image to the current post
						// uploadedTo : wp.media.view.settings.post.id,
						type: 'image'
					},
					button: {
						text: 'Use this image' // button label text
					},
					multiple: false // for multiple image selection set to true
				}).on('select', function () { // it also has "open" and "close" events
					var attachment = custom_uploader.state().get('selection').first().toJSON();
					$(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:95%;display:block;" />').next().val(attachment.id).next().show();
					/* if you sen multiple to true, here is some code for getting the image IDs
					var attachments = frame.state().get('selection'),
						attachment_ids = new Array(),
						i = 0;
					attachments.each(function(attachment) {
							attachment_ids[i] = attachment['id'];
						console.log( attachment );
						i++;
					});
					*/
				})
					.open();
		});

		/*
		* Remove image event
		*/
		$('body').on('click', '.client_remove_image_button', function () {
			$(this).hide().prev().val('').prev().addClass('button').html('Upload image');
			return false;
		});

	});
	</script>
	<?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function client_save_meta_box_data( $post_id ) {
	// Add nonce for security and authentication.
	$nonce_name   = $_POST['client_nonce'];
	$nonce_action = 'client_nonce_action';

	// Check if a nonce is set.
	if ( ! isset( $nonce_name ) ) {
		return;
	}

	// Check if a nonce is valid.
	if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
		return;
	}

	// Check if the user has permissions to save data.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Check if it's not an autosave.
	if ( wp_is_post_autosave( $post_id ) ) {
		return;
	}

	// Check if it's not a revision.
	if ( wp_is_post_revision( $post_id ) ) {
		return;
	}

	$meta_key = 'client_alt_img_link';

	update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $meta_key ] ) );

	return $post_id;
}
add_action( 'save_post_client', 'client_save_meta_box_data' );

/**
 * The following function is fired during plugin activation which calls
 * lcpt_setup_post_types function
 */
function lcpt_install() {
	// trigger our function that registers the custom post type.
	radiantthemes_custom_posts_init();

	// clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
}

/**
 * The following function is fired during plugin deactivation
 */
function lcpt_deactivation() {
	// our post type will be automatically removed, so no need to unregister it
	// clear the permalinks to remove our post type's rules.
	flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'lcpt_install' );
register_deactivation_hook( __FILE__, 'lcpt_deactivation' );
