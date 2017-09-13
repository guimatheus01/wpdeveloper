<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
//Contact info for VC
function floris_contact_info_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'floris-contact',
			"name" => esc_html__("Contact info", 'floris'),
			"base" => "floris_contact_info_shortcode",
			'description' => esc_html__( 'Block with short contact information.', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
                array(
                    'type'      => 'dropdown', 
                    'heading'     => esc_html__( 'Type of block', 'floris' ),
                    'description'     => esc_html__( 'Please select type, you can create multiple instance of this component to have them all.', 'floris' ),
                    'param_name'  => 'block_type',
                    'value'       => array(
                        esc_html__( 'Style 1 (adress)', 'floris' )    =>  'style_adr',
                        esc_html__( 'Style 2 (email)', 'floris' )     =>  'style_email',
                        esc_html__( 'Style 3 (phone)', 'floris' )     =>  'style_phone',
                        esc_html__( 'Style 4 (social)', 'floris' )    =>  'style_social',
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Title', 'floris' ),
                    'param_name'  => 'title',
                    'admin_label' => true,
                    'value'       => '',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Address (first line)', 'floris' ),
                    'param_name'  => 'adress',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_adr') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Address (second line)', 'floris' ),
                    'param_name'  => 'adress_two',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_adr') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Email #1', 'floris' ),
                    'param_name'  => 'email_1',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_email') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Email #2(optional)', 'floris' ),
                    'description'     => esc_html__( 'You can enter another Email if you want.(optional)', 'floris' ),
                    'param_name'  => 'email_2',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_email') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Phone number #1', 'floris' ),
                    'param_name'  => 'phone_1',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_phone') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Phone number #2(optional)', 'floris' ),
                    'param_name'  => 'phone_2',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_phone') )
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon #1', 'floris' ),
                    'param_name' => 'icon_1',
                    'value' => '', 
                    'settings' => array(
                        'emptyIcon' => false,
                        'iconsPerPage' => 300,
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'floris' ),
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_social') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Social network #1 link', 'floris' ),
                    'param_name'  => 'social_l1',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_social') )
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon #2', 'floris' ),
                    'param_name' => 'social_t2',
                    'value' => '', 
                    'settings' => array(
                        'emptyIcon' => false,
                        'iconsPerPage' => 300,
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'floris' ),
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_social') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Social network #2 link', 'floris' ),
                    'param_name'  => 'social_l2',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_social') )
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon #3', 'floris' ),
                    'param_name' => 'social_t3',
                    'value' => '', 
                    'settings' => array(
                        'emptyIcon' => false,
                        'iconsPerPage' => 300,
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'floris' ),
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_social') )
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Social network #3 link', 'floris' ),
                    'param_name'  => 'social_l3',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_social') )
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon #4', 'floris' ),
                    'param_name' => 'social_t4',
                    'value' => '', 
                    'settings' => array(
                        'emptyIcon' => false,
                        'iconsPerPage' => 300,
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'floris' ),
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_social') )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Social network #4 link', 'floris' ),
                    'param_name'  => 'social_l4',
                    'value'       => '',
                    'dependency'  => array( 'element' => 'block_type', 'value' => array('style_social') )
                )
			)
		)
	);
	
}
add_action( 'vc_before_init', 'floris_contact_info_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_contact_info_shortcode extends WPBakeryShortCode {
	}
}