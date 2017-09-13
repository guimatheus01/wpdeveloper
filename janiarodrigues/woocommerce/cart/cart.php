<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();
?> 

<?php do_action( 'woocommerce_before_cart' ); ?>
<section class="section-lg sm <?php print wp_kses_post( ( floris_get_option('cart_page') == 2 ? 'cart-page-two-columns' : 'cart-page-one-column' ) ); ?>">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
    		<?php $page   = get_post( get_page( 'cart' ) ); ?>
	        <div class="second-caption style-2">
				<h3 class="h3 title font-fam-2"><?php print esc_html( $page->post_title ); ?></h3> 
			</div>
	<?php endif; ?>
	<div class="for_message"></div>
	<?php if( floris_get_option('cart_page') == 2){ 
			wc_get_template( 'cart/cart-type-two.php' );
		} else {
			wc_get_template( 'cart/cart-type-one.php' );
		}
	?>
</section>
<?php do_action( 'woocommerce_after_cart' ); ?>
