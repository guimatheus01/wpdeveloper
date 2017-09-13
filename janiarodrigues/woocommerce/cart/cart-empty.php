<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}?>
<section class="section-lg sm">
    <?php $page = get_post( get_page( 'cart' ) ); ?>
    <div class="second-caption style-2">
		<h3 class="h3 title font-fam-2"><?php print esc_html( $page->post_title ); ?></h3> 
	</div>
	<?php wc_print_notices(); ?>

	<?php do_action( 'woocommerce_cart_is_empty' ); ?>

	<?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
		<p class="return-to-shop">
			<a class="button-style" href="<?php print esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><span><?php esc_html_e( 'Retornar para Comprar', 'floris' ) ?></span></a>
		</p>
	<?php endif; ?>
</section>