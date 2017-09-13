<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 *
 * Google map for VC
 *
 */


function floris_google_map_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'floris-maps',
			"name" => esc_html__("Google map", 'floris'),
			"base" => "floris_google_map_shortcode",
			'description' => esc_html__( 'Google maps block', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Latitude', 'floris' ),
                    'param_name' => 'latitude',
                    'value'      => '40.712332'
                ),
                 
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Longitude', 'floris' ),
                    'param_name' => 'longitude',
                    'value'      => '-74.009596'
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Map zoom', 'floris' ),
                    'param_name'  => 'zoom',
                    'description' => esc_html__( 'Map zooming value. Max # 19, min # 0.', 'floris' ),
                    'value'       => 10
                ),

                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'Marker text', 'floris' ),
                    'holder'     => 'div',
                    'param_name' => 'marker_text'
                ),

                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Marker image', 'floris' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select marker image from media library.', 'floris' ),
                )
			)
		)
	);
	
}
add_action( 'vc_before_init', 'floris_google_map_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_google_map_shortcode extends WPBakeryShortCode {
	}
}