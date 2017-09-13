<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }

function floris_products_fn_vc() {
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
			"icon" => 'floris-products',
			"name" => esc_html__("Products", 'floris'),
			"base" => "floris_products_shortcode",
			'description' => esc_html__( 'Lists products', 'floris' ),
			"category" => esc_html__('Floris', 'floris'),
			"params" => array(
				array(
                    'type'          => 'dropdown',
                    'heading'       => esc_html__( 'Select category', 'floris' ),
                    'param_name'    => 'cats',
                    'placeholder'   => esc_html__( 'Select category', 'floris' ),
                    'value'         => floris_element_values( 'categories', array(
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
					'type' => 'checkbox',
					'heading' => esc_html__( 'Only featured', 'floris' ),
					'param_name' => 'featured',
					'default' => false
				),		
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Per page', 'floris' ),
					'value' => 6,
					'save_always' => true,
					'param_name' => 'per_page',
					'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'floris' ),
				),
				array(
					'type'     => 'checkbox',
					'heading' => esc_html__( 'Hide "more products" button', 'floris' ),
					'save_always' => true,
					'param_name' => 'hide_button',
					'default' => true
				),
				array(
					'type'     => 'checkbox',
					'heading' => esc_html__( 'Show title/price under product image', 'floris' ),
					'save_always' => true,
					'param_name' => 'title_price_under',
					'default' => false
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Order by', 'floris' ),
					'param_name' => 'orderby',
					'value' => $order_by_values,
					'save_always' => true,
					'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'floris' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Sort order', 'floris' ),
					'param_name' => 'order',
					'value' => $order_way_values,
					'save_always' => true,
					'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'floris' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
				),
			)
		)
	);
}

add_action( 'vc_before_init', 'floris_products_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_floris_products_shortcode extends WPBakeryShortCode {
	}
}