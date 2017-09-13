<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}?>
<section class="section-lg sm order-received">
	<div class="container">
		<?php if ( $order ) : ?>
			<?php if ( $order->has_status( 'failed' ) ) : ?>
				<p class="woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'floris' ); ?></p>
				<p class="woocommerce-thankyou-order-failed-actions">
					<a href="<?php print esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pagar', 'floris' ) ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php print esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'Minha Conta', 'floris' ); ?></a>
					<?php endif; ?>
				</p>
			<?php else : ?>
				<p class="woocommerce-thankyou-order-received"><?php print apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Obrigado. Seu pedido foi recebido.', 'floris' ), $order ); ?></p>
				<ul class="woocommerce-thankyou-order-details order_details">
					<li class="order">
						<?php esc_html_e( 'Ordem:', 'floris' ); ?>
						<strong><?php print wp_kses_post( $order->get_order_number() ); ?></strong>
					</li>
					<li class="date">
						<?php esc_html_e( 'Data:', 'floris' ); ?>
						<strong><?php print wp_kses_post( date_i18n( get_option( 'date_format' ), strtotime( wc_get_order($order->get_id()) ) ) ); ?></strong>
					</li>
					<li class="total">
						<?php esc_html_e( 'Total:', 'floris' ); ?>
						<strong><?php print wp_kses_post( $order->get_formatted_order_total() ); ?></strong>
					</li>
					<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="method">
						<?php esc_html_e( 'Metodo de Pagamento:', 'floris' ); ?>
						<strong><?php print wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
					<?php endif; ?>
				</ul>
				<div class="clear"></div>
			<?php endif; ?>
			<div class="pay_metod"><?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?></div>
			<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
		<?php else : ?>
			<p class="woocommerce-thankyou-order-received"><?php print apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Obrigado. Seu pedido foi recebido.', 'floris' ), null ); ?></p>
		<?php endif; ?>
	</div>
</section>