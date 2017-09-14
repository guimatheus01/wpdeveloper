<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices(); ?>

<main> 
	<!-- main content starts -->
    <!-- ============== cart page starts ============== -->
    
    <!-- steps -->
    <div class="block cart-steps">
        <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-12">                            
                  <ul class="text-center steps">
                    <li class="wow fadeInUp step1 animated" ><a href="#" class="hvr-wobble-top"><span>1</span> <?php echo esc_html__("Shopping Cart", "madang");?></a></li>
                    <li class="wow fadeInUp step2 current animated" ><a href="#"  class="hvr-wobble-top"><span>2</span> <?php echo esc_html__("Checkout","madang");?></a></li>
                    <li class="wow fadeInUp step3 animated" ><a href="#" class="hvr-wobble-top"><span>3</span> <?php echo esc_html__("Order Complete","madang");?></a></li>
                </ul>                        
              </div>
          </div>
        </div>
    </div>
    <!--steps ends-->

	<div class="container">
        
        <div class="row block">
            <!--shop table-->
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 shop-list">

            <?php

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', esc_html__( 'You must be logged in to checkout.', 'madang' ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'madang' ); ?></h3>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

			</div>
		</div>

        <!-- help block -->
        <?php $banner_background = (get_theme_mod( 'madang_banner_background', '' ));
            if(empty($banner_background) || '' == $banner_background){

                $banner_background = get_template_directory_uri() . '/images/help-image.jpg';
        } ?>
        <div class="box-soft-gray help-box" style="display:none;background-image: url(<?php echo esc_url($banner_background);?>);" >
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-1 wow left fadeInLeft">
                    <div class="wrap">
                        <h3><?php echo esc_html( get_theme_mod( 'madang_banner_title', 'NEED HELP?' ) ); ?></h3>
                        <h5><?php echo madang_output_html( get_theme_mod( 'madang_banner_text', 'Your banner CTA action text' ) ); ?></h5>
                        <a href="<?php echo esc_url( get_theme_mod( 'madang_banner_link', '#' ) ); ?>" class="btn hvr-wobble-top"><?php echo esc_html( get_theme_mod( 'madang_banner_cta', 'HELP' ) ); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- help block ends-->

	</div>
</main>