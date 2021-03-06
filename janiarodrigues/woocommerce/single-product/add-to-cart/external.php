<?php
/**
 * External product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/external.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
<div class="desc-button">
	<a href="<?php print esc_url( $product_url ); ?>" target="_blank" rel="nofollow" class="button button-style braun"><span><?php print esc_html( $button_text ); ?></span></a>
</div>
<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>