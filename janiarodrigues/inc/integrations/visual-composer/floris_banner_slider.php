<?php
//Banner slider for VC
// Parent Element
function floris_banner_slider_fn_vc() {
    vc_map( 
        array(
            "icon" => 'floris-banner-slider',
            'name'                    => esc_html__( 'Banner Slider' , 'floris' ),
            'base'                    => 'floris_banner_slider_shortcode',
            'description'             => esc_html__( 'Slider on the top of the page', 'floris' ),
            'as_parent'               => array('only' => 'floris_banner_slider_content_shortcode'),
            'content_element'         => true,
            "js_view" => 'VcColumnView',
            "category" => esc_html__('Floris', 'floris'),
            'params'          => array(
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__( 'Autoslideshow', 'floris' ),
                    'param_name'  => 'slider_play',
                    'value'       => array( esc_html__( 'Enable Autoplay', 'floris' ) => 'yes' ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Autoplay Speed', 'floris' ),
                    'param_name'  => 'slider_speed',
                    'value'       => '2500',
                    'admin_label' => true,
                    'description' => esc_html__( 'Speed in ms', 'floris' ),
                    'dependency'  => array( 'element' => 'slider_play', 'value' => array('yes') )
                ),
            )
        )
    );
}
add_action( 'vc_before_init', 'floris_banner_slider_fn_vc' );

// Nested Element
function floris_banner_slider_content_fn_vc() {
    
    vc_map(
        array(
            "icon" => 'floris-banner-slider',
            'name'            => esc_html__('Banner Slider Content', 'floris'),
            'base'            => 'floris_banner_slider_content_shortcode',
            'description'     => esc_html__( 'Banner Slider Content Element', 'floris' ),
            "category" => esc_html__('floris Theme', 'floris'),
            'content_element' => true,
            'as_child'        => array('only' => 'floris_banner_slider_shortcode'),
            'params'          => array(

                array(
                    'type'        => 'attach_image',
                    'heading'     => esc_html__( 'Slider Background image', 'floris' ),
                    'param_name'  => 'background_image',
                    'value'       => '',
                    'description' => esc_html__( 'Select image for Slider background from media library.', 'floris' ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Slide title', 'floris' ),
                    'param_name'  => 'title',
                    'value'       => '',
                    'admin_label'  => true,
                    'description' => esc_html__( 'Add title to slide.', 'floris' ),
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => esc_html__( 'Slide subtitle', 'floris' ),
                    'param_name'  => 'subtitle',
                    'value'       => '',
                    'description' => esc_html__( 'Add subtitle title to slide.', 'floris' ),
                ),
                array(
                    'type'        => 'attach_image',
                    'heading'     => esc_html__( 'Slide Image', 'floris' ),
                    'param_name'  => 'sl_image',
                    'value'       => '',
                    'description' => esc_html__( 'Select image for slide from media library.', 'floris' ),
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__( 'Add product to slide?', 'floris' ),
                    'param_name'  => 'add_product',
                    'description' => esc_html__( 'Check this to add product to slide (Title, Subtitle and Slide Image options will be not availavle to use).', 'floris' ),
                    'value'       => array( esc_html__( 'Yes, please', 'floris' ) => 'yes' ),
                ),
                array(
                    'type'          => 'dropdown',
                    'heading'       => esc_html__( 'Select Product', 'floris' ),
                    'param_name'    => 'prod_wocommerce',
                    'placeholder'   => esc_html__( 'Select prooduct', 'floris' ),
                    'value'         => floris_element_cat( 'products', array(
                      'sort_order'  => 'ASC',
                      'post_type'    => 'product',
                      'posts_per_page'   => '25',
                      'post_status'      => 'publish'
                    ) ),
                    'std'         => '',
                    'admin_label'  => true,
                    'description' => esc_html__( 'You can choose spesific product to show it is slide.', 'floris' ),
                    'dependency'  => array( 'element' => 'add_product', 'value' => array('yes') )
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__( "Background colour", "floris" ),
                    "param_name" => "tr_bg_color",
                    "value" => '#ffffff',
                    "description" => esc_html__( "Choose background colour for right side of slide.", "floris" )
                )
            ),
        ) 
    );
}
add_action( 'vc_before_init', 'floris_banner_slider_content_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_floris_banner_slider_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_floris_banner_slider_content_shortcode extends WPBakeryShortCode {

    }
}