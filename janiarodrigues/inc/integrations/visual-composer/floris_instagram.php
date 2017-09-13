<?php
if (!defined('ABSPATH')) {
    die('-1');
}
/*
 *
 * Instagram for VC
 *
 */

function floris_instagram_fn_vc()
{
    vc_map(
        array(
            "icon" => 'floris-instagram',
            "name" => esc_html__("Instagram block", 'floris'),
            "base" => "floris_instagram_shortcode",
            "category" => esc_html__('Floris', 'floris'),
            "params" => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Instagram type', 'floris'),
                    'param_name' => 'instagram_type',
                    'value' => array(
                        esc_html__( 'Type 1', 'floris') => 'type_1',
                        esc_html__( 'Type 2', 'floris') => 'type_2',
                        esc_html__( 'Type 3', 'floris') => 'type_3',
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'floris'),
                    'param_name' => 'title',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__('Enter title name', 'floris')
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Subtitle', 'floris'),
                    'param_name' => 'subtitle',
                    'value' => '',
                    'description' => esc_html__('Write your subtitle header. The subtilte is added at the bottom of the header title.', 'floris')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Instagram user ID', 'floris'),
                    'param_name' => 'instagram_userid',
                    'value' => '',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Instagram access token', 'floris'),
                    'param_name' => 'instagram_access_token',
                    'value' => '',
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

add_action('vc_before_init', 'floris_instagram_fn_vc');

if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_floris_instagram_shortcode extends WPBakeryShortCode
    {
    }
}