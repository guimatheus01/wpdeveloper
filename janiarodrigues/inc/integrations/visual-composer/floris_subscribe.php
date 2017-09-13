<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
//SUBSCRIBE for VC *
function floris_subscribe_shortcode_fn_vc() {

	vc_map(
		array(
			"icon" => 'floris-subscribe',
			"name" => esc_html__("Subscribe", 'floris'),
			"base" => "floris_subscribe_shortcode",
			'description' => esc_html__( 'MailChimp Subscribe form', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Block title', 'floris' ),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__( 'Add title to block.', 'floris' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Block subtitle', 'floris' ),
                    'param_name' => 'subtitle',
                    'value' => '',
                    'description' => esc_html__( 'Add subtitle to block.', 'floris' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Text on button', 'floris' ),
                    'param_name' => 'b_text',
                    'value' => '',
                    'description' => esc_html__( 'Add text to button in subscribe block.', 'floris' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Thank you message (after form submit) ', 'floris' ),
                    'param_name' => 't_mes',
                    'value' => '',
                    'description' => esc_html__( 'Add text to thank you pop-up after submit.', 'floris' )
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Enter your MailChimp form url', 'floris' ),
                    'admin_label' => true,
                    'description'    => esc_html__( 'It can be found in Mailchimp / Lists / -Select list- / Signup forms / General Forms. eg:  http://eedsefpurl.com/bSfdsehnOb.', 'floris' ),
                    'param_name' => 'mc_form_url'
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
add_action( 'vc_before_init', 'floris_subscribe_shortcode_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_subscribe_shortcode extends WPBakeryShortCode {
	}
}