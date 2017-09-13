<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
//VC integration
// Set VC as theme.
if( function_exists('vc_set_as_theme') ){
	function floris_vcAsTheme() {
		vc_set_as_theme(true);
	}
	add_action( 'vc_before_init', 'floris_vcAsTheme' );
}

// Initialize VC modules.
get_template_part( '/inc/integrations/visual-composer/floris_title' );
get_template_part( '/inc/integrations/visual-composer/floris_products' );
get_template_part( '/inc/integrations/visual-composer/floris_products_category' );
get_template_part( '/inc/integrations/visual-composer/floris_products_category_filter' );
get_template_part( '/inc/integrations/visual-composer/floris_instagram');
get_template_part( '/inc/integrations/visual-composer/floris_banner');
get_template_part( '/inc/integrations/visual-composer/floris_video');
get_template_part( '/inc/integrations/visual-composer/floris_post');
get_template_part( '/inc/integrations/visual-composer/floris_banner_slider');
get_template_part( '/inc/integrations/visual-composer/floris_category_with_product');
get_template_part( '/inc/integrations/visual-composer/floris_single_category');
get_template_part( '/inc/integrations/visual-composer/floris_image_box');
get_template_part( '/inc/integrations/visual-composer/floris_google_map');
get_template_part( '/inc/integrations/visual-composer/floris_contact_info');
get_template_part( '/inc/integrations/visual-composer/floris_accordion');
get_template_part( '/inc/integrations/visual-composer/floris_team');