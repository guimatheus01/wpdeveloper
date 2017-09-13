<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * 
 *
 * Video block for VC
 *
 */


function floris_video_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'floris-video',
			"name" => esc_html__("Video Block", 'floris'),
			"base" => "floris_video_shortcode",
			'description' => esc_html__( 'Block with video', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Type of Video', 'floris'),
                    'param_name' => 'video_type',
                    'value' => array(
                        esc_html__( 'Youtube', 'floris') => 'type_1',
                        esc_html__( 'Vimeo', 'floris') => 'type_2',
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Block title', 'floris' ),
                    'param_name'  => 'title',
                    'admin_label' => true,
                    'value'       => '',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Block background image', 'floris' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'floris' )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'YouTube video URL', 'floris' ),
                    'param_name'  => 'link',
                    'value'       => '',
                    'description' => esc_html__( 'Add YouTube video URL here.', 'floris' ),
                    'dependency'  => array( 'element' => 'video_type', 'value' => array('type_1') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Vimeo video URL', 'floris' ),
                    'param_name'  => 'link_v',
                    'value'       => '',
                    'description' => esc_html__( 'Add vimeo share video src-code URL here.', 'floris' ),
                    'dependency'  => array( 'element' => 'video_type', 'value' => array('type_2') )
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Css', 'floris'),
                    'param_name' => 'css',
                    'group' => esc_html__('Design options', 'floris'),
                )
			)
		)
	);
	
}
add_action( 'vc_before_init', 'floris_video_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_video_shortcode extends WPBakeryShortCode {
	}
}