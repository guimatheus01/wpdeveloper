<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 *
 * Image block for VC
 *
 */
function floris_image_box_fn_vc() {

	vc_map(
		array(
			"icon" => 'floris-img-box',
			"name" => esc_html__("Box image", 'floris'),
			"base" => "floris_image_box_shortcode",
			'description' => esc_html__( 'Info box with title, icon and desc.', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Title type', 'floris'),
					'param_name' => 'box_type',
					'value' => array(
						esc_html__( 'Type 1', 'floris' ) => 'type_1',
						esc_html__( 'Type 2 (with text right allign)', 'floris' ) => 'type_2',
						esc_html__( 'Type 3 (with text left allign)', 'floris' ) => 'type_3',
					)
				),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Block image', 'floris' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'floris' )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Block title', 'floris' ),
                    'param_name'  => 'title',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'box_type', 'value' => array('type_2', 'type_3') )
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => esc_html__( 'Text', 'floris' ),
                    'param_name'  => 'subtitle',
                    'value'       => '',
                    'description' => esc_html__( 'Add text to block.', 'floris' ),
                    'dependency'  => array( 'element' => 'box_type', 'value' => array('type_2', 'type_3') )
                ),
			)
		)
	);

}
add_action( 'vc_before_init', 'floris_image_box_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_image_box_shortcode extends WPBakeryShortCode {
	}
}