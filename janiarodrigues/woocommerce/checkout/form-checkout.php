<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}?>
<section class="section-lg sm <?php print wp_kses_post( ( floris_get_option('checkout_page') == 2 ? 'checkout-page-two-columns' : 'checkout-page-one-column' ) ); ?>">
	<?php $page   = get_post( get_page( 'checkout' ) ); ?>
    <div class="second-caption style-2">
		<h3 class="h3 title font-fam-2"><?php print esc_html( $page->post_title ); ?></h3> 
	</div>
	<div class="woco-error-checkout">
		<?php wc_print_notices();
		do_action( 'woocommerce_before_checkout_form', $checkout );
		// If checkout registration is disabled and not logged in, the user cannot checkout
		if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
			print apply_filters( 'woocommerce_checkout_must_be_logged_in_message', esc_html__( 'Você precisa estar logado para pagar.', 'floris' ) );
			return;
		}
		?>
	</div>
	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php print esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
		<?php 
			if( floris_get_option('checkout_page') == 2){ print wp_kses_post( '<div class="col-md-7 col-xs-12">' ); }
				if ( sizeof( $checkout->checkout_fields ) > 0 ) :
					do_action( 'woocommerce_checkout_before_customer_details' ); ?>
					<div id="customer_details">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>							
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
					<?php do_action( 'woocommerce_checkout_after_customer_details' );
				endif; 
			if( floris_get_option('checkout_page') == 2){ print wp_kses_post( '</div><div class="col-md-5 col-xs-12">' ); } ?>
				<h3 id="order_review_heading"><?php esc_html_e( 'Seu pedido', 'floris' ); ?></h3>
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
				<?php do_action( 'woocommerce_checkout_after_order_review' );
			if( floris_get_option('checkout_page') == 2){ print wp_kses_post( '</div>' ); }	?>
	</form>
	<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
</section>