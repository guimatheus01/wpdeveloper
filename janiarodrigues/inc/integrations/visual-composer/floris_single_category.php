<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Product categories with filter for VC
 *
 */

function floris_single_category_fn_vc() {
	vc_map(
		array(
			"icon" => 'floris-cat-single',
			"name" => esc_html__("Category with products", 'floris'),
			"base" => "floris_single_category_shortcode",
			'description' => esc_html__( 'Display category with products', 'floris' ),
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
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Number of products', 'floris' ),
                    'param_name' => 'post_count',
                    'value' => '',
                    'description' => esc_html__( 'Add number of products on page', 'floris' )
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

add_action( 'vc_before_init', 'floris_single_category_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_single_category_shortcode extends WPBakeryShortCode {
	}
}