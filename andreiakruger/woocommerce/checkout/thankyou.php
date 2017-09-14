<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

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
                    <li class="wow fadeInUp step2 animated" ><a href="#"  class="hvr-wobble-top"><span>2</span> <?php echo esc_html__("Checkout","madang");?></a></li>
                    <li class="wow fadeInUp step3 current animated" ><a href="#" class="hvr-wobble-top"><span>3</span> <?php echo esc_html__("Order Complete","madang");?></a></li>
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

				<?php if ( $order ) : ?>

					<?php if ( $order->has_status( 'failed' ) ) : ?>

						<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

						<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
							<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
							<?php if ( is_user_logged_in() ) : ?>
								<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
							<?php endif; ?>
						</p>

					<?php else : ?>

						<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>

						<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

							<li class="woocommerce-order-overview__order order">
								<?php _e( 'Order number:', 'woocommerce' ); ?>
								<strong><?php echo $order->get_order_number(); ?></strong>
							</li>

							<li class="woocommerce-order-overview__date date">
								<?php _e( 'Date:', 'woocommerce' ); ?>
								<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
							</li>

							<li class="woocommerce-order-overview__total total">
								<?php _e( 'Total:', 'woocommerce' ); ?>
								<strong><?php echo $order->get_formatted_order_total(); ?></strong>
							</li>

							<?php if ( $order->get_payment_method_title() ) : ?>

							<li class="woocommerce-order-overview__payment-method method">
								<?php _e( 'Payment method:', 'woocommerce' ); ?>
								<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
							</li>

							<?php endif; ?>

						</ul>

					<?php endif; ?>

					<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
					<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

				<?php else : ?>

					<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

				<?php endif; ?>


			</div>
		</div>

        <!-- help block -->
        <?php $banner_background = (get_theme_mod( 'madang_banner_background', '' ));
            if(empty($banner_background) || '' == $banner_background){

                $banner_background = get_template_directory_uri() . '/images/help-image.jpg';
        } ?>
        <div class="box-soft-gray help-box" style="background-image: url(<?php echo esc_url($banner_background);?>);" >
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
