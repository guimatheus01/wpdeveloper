<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 *
 * Posts for VC
 *
 */


function floris_post_fn_vc() {
	vc_map(
		array(
			"icon" => 'floris-posts',
			"name" => esc_html__("Blog posts", 'floris'),
			"base" => "floris_post_shortcode",
			'description' => esc_html__( 'Related post', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array (
				
				array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Block title', 'floris' ),
                    'param_name' => 'title',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Blog post section title.', 'floris' )
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Items per page', 'floris' ),
					'param_name' => 'amount',
					'value' => '',
					'description' => esc_html__( 'Enter items per page', 'floris' )
				),
				array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Css', 'floris'),
                    'param_name' => 'css',
                    'group' => esc_html__('Design options', 'floris'),
                ),
			)
		)
	);
	
}
add_action( 'vc_before_init', 'floris_post_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_post_shortcode extends WPBakeryShortCode {
	}
}