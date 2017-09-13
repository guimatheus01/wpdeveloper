<?php
if (!defined('ABSPATH')) {
    die('-1');
}
/*
  *
 * Team for VC
 *
 */

function floris_title_fn_vc()
{
    vc_map(
        array(
            "icon" => 'floris-title',
            "name" => esc_html__("Title block", 'floris'),
            "base" => "floris_title_shortcode",
            'description' => esc_html__('Title block with subtitle', 'floris'),
            "category" => esc_html__('Floris', 'floris'),
            "params" => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Title type', 'floris'),
                    'param_name' => 'title_type',
                    'value' => array(
                        esc_html__( 'Type 1', 'floris') => 'type_1',
                        esc_html__( 'Type 2', 'floris') => 'type_2',
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Title transform', 'floris'),
                    'param_name' => 'title_transform',
                    'value' => array(
                        esc_html__( 'Uppercase', 'floris') => 'uppercase',
                        esc_html__( 'Normal', 'floris') => 'none',
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
                    'type' => 'textfield',
                    'heading' => esc_html__('Title size', 'floris'),
                    'param_name' => 'title_size',
                    'value' => '',
                    'description' => esc_html__('Title size, only number', 'floris')
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Title  color", 'floris'),
                    "param_name" => "title_color",
                    "value" => "",
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
                    'heading' => esc_html__('Extra class name', 'floris'),
                    'param_name' => 'el_class',
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'floris'),
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

add_action('vc_before_init', 'floris_title_fn_vc');

if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_floris_title_shortcode extends WPBakeryShortCode
    {
    }
}