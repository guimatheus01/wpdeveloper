<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * 
 *
 * Banner block for VC
 *
 */


function floris_banner_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'floris-banner',
			"name" => esc_html__("Banner", 'floris'),
			"base" => "floris_banner_shortcode",
			'description' => esc_html__( 'Multiple styles of banner', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
                array(
                    'type'      => 'dropdown', 
                    'heading'     => esc_html__( 'Type of banner', 'floris' ),
                    'param_name'  => 'banner_type',
                    'value'       => array(
                        esc_html__( 'Style 1 (with paralax)', 'floris' )            => 'type_one',
                        esc_html__( 'Style 2 (with button)', 'floris' )            => 'type_two',
                        esc_html__( 'Style 3 (with button left allign)', 'floris' ) => 'type_three',
                        esc_html__( 'Style 4 (with button center allign)', 'floris' ) => 'type_four',
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Block title', 'floris' ),
                    'param_name'  => 'title',
                    'admin_label' => true,
                    'value'       => ''
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => esc_html__( 'Subtitle', 'floris' ),
                    'param_name'  => 'subtitle',
                    'value'       => '',
                    'description' => esc_html__( 'Add subtitle to block.', 'floris' ),
                    'dependency'  => array( 'element' => 'banner_type', 'value' => array('type_one', 'type_three', 'type_four') )
                ),

                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Block background image', 'floris' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'floris' )
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Block image', 'floris' ),
                    'param_name' => 'm_image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'floris' ),
                    'dependency'  => array( 'element' => 'banner_type', 'value' => array('type_two') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Button text', 'floris' ),
                    'param_name'  => 'b_title',
                    'value'       => '',
                    'description' => esc_html__( 'Add text to button.', 'floris' ),
                    'dependency'  => array( 'element' => 'banner_type', 'value' => array('type_two', 'type_three', 'type_four') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Button link', 'floris' ),
                    'param_name'  => 'b_link',
                    'value'       => '',
                    'description' => esc_html__( 'Add link to button.', 'floris' ),
                    'dependency'  => array( 'element' => 'banner_type', 'value' => array('type_two', 'type_three', 'type_four') )
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
add_action( 'vc_before_init', 'floris_banner_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_banner_shortcode extends WPBakeryShortCode {
	}
}