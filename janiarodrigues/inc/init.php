<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Load the files for theme, with support for overriding the widget via a child theme.
/*-----------------------------------------------------------------------------------*/

include_once get_template_directory(). '/inc/theme-essentials.php';   // Theme Essentials
include_once get_template_directory(). '/inc/theme-options.php';      // Theme options
include_once get_template_directory(). '/inc/theme-functions.php';    // Custom theme functions
include_once get_template_directory(). '/inc/theme-metabox.php';      // Theme Metaboxes
include_once get_template_directory(). '/inc/theme-comments.php';     // Theme comments


//Initialize theme required features & components.
//This is the base setting for required CPTs, based on these settings customer sees options to disable/rename rewrite for cpts in themeoptions.
if(!( function_exists('floris_theme_components') )){

	function floris_theme_components() {
		$theme_components = array(			
			'metaboxes'                 => '1',
			'theme_options'             => '1',
			'common_shortcodes'         => '1',
			'integrate_VC'              => '1',
		);
		// Let filter modify it
		$theme_components = apply_filters( 'floris_theme_component', $theme_components );
		update_option('floris_components', $theme_components);
	}

	// only trigger on first install
	global $pagenow;
	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' || is_admin() && isset( $_GET['theme'] ) && $pagenow == 'customize.php' ){
		add_action( 'init', 'floris_theme_components', 1 );
	}
}

//TGM class for plugin includes.
if( is_admin() ){
	if (!( class_exists( 'TGM_Plugin_Activation' ) ))
		include_once get_template_directory(). '/inc/tgm-activation/plugins.php';   // Theme Essentials
}

//VC integration
if ( function_exists( 'vc_set_as_theme' ) ) {
	include_once get_template_directory(). '/inc/integrations/visual-composer/vc-init.php';   // Theme Essentials
}

//Content Width
if ( ! isset( $content_width ) )
	$content_width = 1140;

//Basic Theme Setup
if ( ! function_exists( 'floris_theme_setup' ) ) {

	function floris_theme_setup() {

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Load the translations
		load_theme_textdomain( 'floris', get_template_directory() . '/lang' );

		// Add custom background support.
		add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );

		// Enable Post Thumbnails ( Featured Image )
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'custom-header' );

		add_editor_style( 'style.css' );

		// Title tag support
		add_theme_support( 'title-tag' );

		// Register Navigation Menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'floris' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'floris' ),
			'mega-menu' => esc_html__( 'Mega Menu', 'floris' ),
		) );

		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form' ) );
		//add_image_size( 'blog', 700, 400, true );
		add_post_type_support( 'page', 'excerpt' );
	}

} add_action( 'after_setup_theme', 'floris_theme_setup' );