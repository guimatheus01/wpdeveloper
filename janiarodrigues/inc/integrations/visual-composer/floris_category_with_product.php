<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Product category with product for VC
 *
 */

function floris_category_with_product_fn_vc() {
	vc_map(
		array(
			"icon" => 'floris-cat-w-prod',
			"name" => esc_html__("Product category with product", 'floris'),
			"base" => "floris_category_with_product_shortcode",
			'description' => esc_html__( 'Display product categories', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
                array(
                    'type'          => 'dropdown',
                    'heading'       => esc_html__( 'Select category', 'floris' ),
                    'param_name'    => 'cats_wocommerce',
                    'placeholder'   => esc_html__( 'Select category', 'floris' ),
                    'value'         => floris_element_cat( 'categories', array(
                      'sort_order'  => 'ASC',
                      'taxonomy'    => 'product_cat',
                      'posts_per_page'   => '15',
                      'post_status'      => 'publish'
                    ) ),
                    'std'         => '',
                    'admin_label'  => true,
                    'description' => esc_html__( 'You can choose spesific category to show it on page', 'floris' ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Button text', 'floris' ),
                    'param_name'  => 'b_title',
                    'value'       => '',
                    'description' => esc_html__( 'Add text to button.', 'floris' )
                ),
                array(
                    'type'        => 'checkbox',
                    'heading'     => esc_html__( 'Backside Product', 'floris' ),
                    'param_name'  => 'prod_backside',
                ),
			)
		)
	);
}

add_action( 'vc_before_init', 'floris_category_with_product_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_category_with_product_shortcode extends WPBakeryShortCode {
	}
}