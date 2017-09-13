<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Product categories with filter for VC
 *
 */

function floris_products_category_filter_fn_vc() {
	vc_map(
		array(
			"icon" => 'floris-cat-w-filter',
			"name" => esc_html__("Product categories with filter", 'floris'),
			"base" => "floris_products_category_filter_shortcode",
			'description' => esc_html__( 'Display product categories', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
                array(
                    'type'          => 'vc_efa_chosen',
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
                    'heading' => esc_html__( 'Items per page', 'floris' ),
                    'param_name' => 'post_count',
                    'value' => '4',
                    'description' => esc_html__( 'Enter items per page', 'floris' )
                ),
                array(
                    'type'      => 'dropdown', 
                    'heading'     => __( 'Add dark layer to block?', 'floris' ),
                    'param_name'  => 'layer_style',
                    'admin_label' => true,
                    'value'       => array(
                        'Yes'    =>  'type_one',
                        'No'   =>  'type_two',
                    )
                ),
                array(
                    'type'     => 'checkbox',
                    'heading' => esc_html__( 'Show title/price under product image', 'floris' ),
                    'save_always' => true,
                    'param_name' => 'title_price_under',
                    'default' => false
                ),
			)
		)
	);
}

add_action( 'vc_before_init', 'floris_products_category_filter_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_products_category_filter_shortcode extends WPBakeryShortCode {
	}
}