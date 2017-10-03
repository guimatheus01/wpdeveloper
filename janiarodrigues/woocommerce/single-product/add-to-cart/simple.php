<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

// Availability
$availability      = $product->get_availability();
$availability_html = empty( $availability['availability'] ) ? '' : '<h4 class="h4 style-1 stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</h4>';
print apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
$product_id 		  = $product->get_id();
$products_qty_in_cart = WC()->cart->get_cart_item_quantities();
$check_qty 			  = isset( $products_qty_in_cart[ $product_id ] ) ? $products_qty_in_cart[ $product_id ] : 0;
$stock 				  = floor( $product->get_stock_quantity() );
$max_qty 			  = $stock - $check_qty;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if( isset( $products_qty_in_cart[ $product_id ] ) && $stock == $check_qty ){ $max_qty = '-1'; }
elseif( isset( $products_qty_in_cart[ $product_id ] ) && $stock == 0 ){	$max_qty = '0'; }
if ( $product->is_in_stock() ) : ?>
<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product_id ); ?>">
	<div class="desc-button">
		<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	 	<div class="counter jx font-fam-2 rs-add-bl">
		 	<div class="minus-val rs-count-block"><i class="fa fa-minus"></i></div>
				<input class="rs-fl-number" type="text" value="1" name="quantity">
			<div class="plus-val rs-count-block"><i class="fa fa-plus"></i></div>
	 	</div>
	 	<a href="<?php the_permalink(); ?>" class="single_add_to_cart_button button add_to_cart_button button-style braun product_single <?php print wp_kses_post( $max_qty == '-1' ? 'disabled' : '' ); ?>"><span><?php esc_html_e( 'Adicionar no Carrinho', 'floris' );  ?></span></a>
		<input type="hidden" name="add-to-cart" value="<?php print wp_kses_post( absint( $product->get_id() ) ); ?>" />
		<input type="hidden" name="product_id" value="<?php print wp_kses_post( absint( $product->get_id() ) ); ?>" />
		<input type="hidden" name="variation_id" class="variation_id" value="0" />
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
		<div class="for_message"></div>
	</div>
	<?php echo do_shortcode('[floris_accordion_shortcode list_type2="false"][floris_accordion_content_shortcode title="Medidas e Tamanhos"]<div class="table-responsive"><table class="table table-hover"><tr><th></th><th colspan="2">P</th><th colspan="2">M</th><th colspan="2">G</th></tr><tr style="background-color: #E0E0E0;" ><td><strong>MEDIDAS</strong></td><td>38</td><td>40</td><td>42</td><td>44</td><td>46</td><td>48</td></tr><tr><td>Busto</td><td>86</td><td>90</td><td>94</td><td>98</td><td>102</td><td>106</td></tr><tr><td>Cintura</td><td>64</td><td>68</td><td>72</td><td>76</td><td>80</td><td>84</td></tr><tr><td>Quadril</td><td>92</td><td>96</td><td>100</td><td>104</td><td>108</td><td>112</td></tr></table></div>[/floris_accordion_content_shortcode]') ?>
	<br><br>
</form>


<?php endif; ?>



