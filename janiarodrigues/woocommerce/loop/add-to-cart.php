<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$product_id 		  = $product->get_id();
$products_qty_in_cart = WC()->cart->get_cart_item_quantities();
$check_qty 			  = isset( $products_qty_in_cart[ $product_id ] ) ? $products_qty_in_cart[ $product_id ] : 0;
$stock 				  = floor( $product->get_stock_quantity() );
$max_qty 			  = $stock - $check_qty;
$manage_stock 		  = get_post_meta( $product_id, '_manage_stock', true );
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if( isset( $products_qty_in_cart[ $product_id ] ) && $stock == $check_qty && $manage_stock == 'yes' ){ 
	$link = get_the_permalink($product_id);
	$text = __('Read More', 'floris');
} else {
	$link = $product->add_to_cart_url();
	$text = $product->add_to_cart_text();
}

if( floris_get_option('product_button', 1) ) {
	print apply_filters( 'woocommerce_loop_add_to_cart_link',
		sprintf( '<a rel="nofollow" href="%s" data-plugin="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s button-style braun no-js"><span>%s</span></a>',
			esc_url( $link ),
			( is_plugin_active('woocommerce-multilingual/wpml-woocommerce.php') ? '0' : '1' ),
			esc_attr( isset( $quantity ) ? $quantity : 1 ),
			esc_attr( $product->get_id() ),
			esc_attr( $product->get_sku() ),
			esc_attr( isset( $class ) ? $class : 'button' ),
			esc_html( $text )
		),
	$product );
}