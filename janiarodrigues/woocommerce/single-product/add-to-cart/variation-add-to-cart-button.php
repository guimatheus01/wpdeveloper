<?php
/**
 * Single variation cart button
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<div class="counter jx font-fam-2 rs-add-bl">
	 	<div class="minus-val rs-count-block"><i class="fa fa-minus"></i></div>
			<input class="rs-fl-number" type="text" value="1" name="quantity">
		<div class="plus-val rs-count-block"><i class="fa fa-plus"></i></div>
 	</div>
 	<a href="<?php the_permalink(); ?>" class="single_add_to_cart_button button add_to_cart_button button-style braun product_single"><span><?php esc_html_e( 'Adicionar ao Carrinho', 'floris' );  ?></span></a>
	<input type="hidden" name="add-to-cart" value="<?php print wp_kses_post( absint( $product->get_id() ) ); ?>" />
	<input type="hidden" name="product_id" value="<?php print wp_kses_post( absint( $product->get_id() ) ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>