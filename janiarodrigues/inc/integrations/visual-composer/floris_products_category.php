<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Product category for VC
 *
 */

function floris_products_category_fn_vc() {
    $order_by_values = array(
        '',
        esc_html__( 'Date', 'floris' ) => 'date',
        esc_html__( 'ID', 'floris' ) => 'ID',
        esc_html__( 'Author', 'floris' ) => 'author',
        esc_html__( 'Title', 'floris' ) => 'title',
        esc_html__( 'Modified', 'floris' ) => 'modified',
        esc_html__( 'Random', 'floris' ) => 'rand',
        esc_html__( 'Comment count', 'floris' ) => 'comment_count',
        esc_html__( 'Menu order', 'floris' ) => 'menu_order',
    );
    $order_way_values = array(
        '',
        esc_html__( 'Descending', 'floris' ) => 'DESC',
        esc_html__( 'Ascending', 'floris' ) => 'ASC',
    );
	vc_map(
		array(
			"icon" => 'floris-cat-prod',
			"name" => esc_html__("Product categories", 'floris'),
			"base" => "floris_products_category_shortcode",
			'description' => esc_html__( 'Display product categories loop', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Categories type', 'floris'),
                    'param_name' => 'cat_type',
                    'value' => array(
                        esc_html__( 'Type 1', 'floris') => 'type_1',
                        esc_html__( 'Type 2', 'floris') => 'type_2',
                    )
                ),
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
                    'type' => 'css_editor',
                    'heading' => esc_html__('Css', 'floris'),
                    'param_name' => 'css',
                    'group' => esc_html__('Design options', 'floris'),
                ),
			)
		)
	);
}

add_action( 'vc_before_init', 'floris_products_category_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_products_category_shortcode extends WPBakeryShortCode {
	}
}