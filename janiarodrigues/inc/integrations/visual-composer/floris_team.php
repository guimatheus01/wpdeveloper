<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 *
 * Team for VC
 *
 */


function floris_team_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'floris-team',
			"name" => esc_html__("Team", 'floris'),
			"base" => "floris_team_shortcode",
			'description' => esc_html__( 'Team member block.', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Team member image', 'floris' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'floris' ),
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Name', 'floris' ),
                    'param_name' => 'name',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Team member name.', 'floris' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Position', 'floris' ),
                    'param_name' => 'position',
                    'value' => '',
                    'description' => esc_html__( 'Team member position.', 'floris' )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Facebook', 'floris' ),
                    'param_name'  => 'social_fb',
                    'value'       => '',
                    'description' => esc_html__( 'Enter facebook social link url.', 'floris' ),
                    'group'       => 'Social URL'
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Instagram', 'floris' ),
                    'param_name'  => 'social_in',
                    'value'       => '',
                    'description' => esc_html__( 'Enter instagram social link url.', 'floris' ),
                    'group'       => 'Social URL'
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Tumbler', 'floris' ),
                    'param_name'  => 'social_tum',
                    'value'       => '',
                    'description' => esc_html__( 'Enter tumbler social link url.', 'floris' ),
                    'group'       => 'Social URL'
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Twitter', 'floris' ),
                    'param_name'  => 'social_tw',
                    'value'       => '',
                    'description' => esc_html__( 'Enter twitter social link url.', 'floris' ),
                    'group'       => 'Social URL'
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Pinterest', 'floris' ),
                    'param_name'  => 'social_pi',
                    'value'       => '',
                    'description' => esc_html__( 'Enter pinterest social link url.', 'floris' ),
                    'group'       => 'Social URL'
                ),
                 
			)
		)
	);
	
}
add_action( 'vc_before_init', 'floris_team_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_team_shortcode extends WPBakeryShortCode {
	}
}