<?php
//Accordion for VC
// Parent Element
function floris_accordion_vc() {
	vc_map( 
		array(
		    "icon" => 'floris-accordion',
		    'name'                    => esc_html__( 'Accordion' , 'floris' ),
		    'base'                    => 'floris_accordion_shortcode',
		    'description'             => esc_html__( 'Create accordion', 'floris' ),
		    'as_parent'               => array('only' => 'floris_accordion_content_shortcode'), 
		    'content_element'         => true,
		    "js_view" => 'VcColumnView',
			"category" => esc_html__('Floris', 'floris'),
            'params'          => array(
                array(
                    'type'      => 'checkbox',
                    'heading'     => esc_html__( 'Please click Save Changes below, and Select child of this modules.', 'floris' ),
                    'description' => esc_html__( 'This checkbox is for information purpose only :)', 'floris' ),
                    'param_name'  => 'list_type2',
                ),
            )
		)
	);
}
add_action( 'vc_before_init', 'floris_accordion_vc' );

// Nested Element
function floris_accordion_content_vc() {
	
	vc_map(
		array(
		    "icon" => 'floris-accordion',
		    'name'            => esc_html__('Accordion Content', 'floris'),
		    'base'            => 'floris_accordion_content_shortcode',
		    'description'     => esc_html__( 'Content Element', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
		    'content_element' => true,
		    'as_child'        => array('only' => 'floris_accordion_shortcode'), 
		    'params'          => array(
		    	
		    	array(
		    		"type" => "textfield",
		    		"heading" => esc_html__("Title", 'floris'),
		    		"param_name" => "title",
				    'admin_label' => true,
				    'description'     => esc_html__( 'Enter title for accordion.', 'floris' ),
		    	),
	            array(
                    'type'        => 'textarea_html',
                    'heading'     => esc_html__( 'Block Content', 'floris' ),
                    'description'     => esc_html__( 'Add content for accordion.', 'floris' ),
                    'param_name'  => 'content'
                )

		    ),
		) 
	);
}
add_action( 'vc_before_init', 'floris_accordion_content_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_floris_accordion_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_floris_accordion_content_shortcode extends WPBakeryShortCode {

    }
}