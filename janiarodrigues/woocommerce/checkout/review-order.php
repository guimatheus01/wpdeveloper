<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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
}
?>
<table class="shop_table woocommerce-checkout-review-order-table">
	<?php if( floris_get_option('checkout_page') != 2){ ?>
		<thead>
			<tr>
				<th class="product-name"><?php esc_html_e( 'Thumbnail', 'floris' ); ?></th>
				<th class="product-name"><?php esc_html_e( 'Product', 'floris' ); ?></th>
				<th class="product-total"><?php esc_html_e( 'Total', 'floris' ); ?></th>
			</tr>
		</thead>
	<?php } ?>
	<tbody>
		<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="<?php print esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<?php if( floris_get_option('checkout_page') == 2){ ?>
							<td colspan="2">
								<div class="checkout-product-wrap">
									<?php
										$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $cart_item['product_id'] ), 'full'  );
										$thumbnail_url = floris_opt_aq_resize( $thumbnail_url, '120', '120', false, true);

										if( $thumbnail_url ){
											if ( ! $product_permalink ) {
												print wp_kses_post( $thumbnail );
											} else {
												print wp_kses_post( '<div class="checkout-product-thumbnail"><a href="'.$product_permalink.'"><img src="'.$thumbnail_url.'" alt="'.$_product->get_title().'"></a></div>' );
											}
										}
									?>
									<div class="checkout-product-name product-name">
										<?php 
											if ( ! $product_permalink ) { print apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;'; } 
											else { print apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key ); }
											print apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key );
											print wp_kses_post( WC()->cart->get_item_data( $cart_item ) );
										?>
									</div>
									<div class="checkout-product-total product-total">
										<?php print apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
									</div>
								</div>
							</td>
						<?php } else { ?>
							<td class="product-thumbnail">
								<?php
									$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $cart_item['product_id'] ), 'full'  );
									$thumbnail_url = floris_opt_aq_resize( $thumbnail_url, '120', '120', false, true);

									if( $thumbnail_url ){
										if ( ! $product_permalink ) {
											print wp_kses_post( $thumbnail );
										} else {
											print wp_kses_post( '<a href="'.$product_permalink.'"><img src="'.$thumbnail_url.'" alt="'.$_product->get_title().'"></a>' );
										}
									}
								?>
							</td>
							<td class="product-name">
								<?php 								
									if ( ! $product_permalink ) { print apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;'; } 
									else { print apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key ); }
									print apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key );
									print wp_kses_post( WC()->cart->get_item_data( $cart_item ) );
								?>
							</td>
							<td class="product-total">
								<?php print apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
							</td>
						<?php } ?>
					</tr>
					<?php
				}
			}
			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
	<tfoot>
		<tr class="cart-subtotal">
			<th><?php esc_html_e( 'Subtotal', 'floris' ); ?></th>
			<?php if( floris_get_option('checkout_page') != 2){ print wp_kses_post( '<td></td>' ); }?>
			<td><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>
		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php print esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<?php if( floris_get_option('checkout_page') != 2){ print wp_kses_post( '<td></td>' ); }?>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>
		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
			<?php wc_cart_totals_shipping_html(); ?>
			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
		<?php endif; ?>
		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php print esc_html( $fee->name ); ?></th>
				<?php if( floris_get_option('checkout_page') != 2){ print wp_kses_post( '<td></td>' ); }?>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>
		<?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<tr class="tax-rate tax-rate-<?php print wp_kses_post( sanitize_title( $code ) ); ?>">
						<th><?php print esc_html( $tax->label ); ?></th>
						<?php if( floris_get_option('checkout_page') != 2){ print wp_kses_post( '<td></td>' ); }?>
						<td><?php print wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php print esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<?php if( floris_get_option('checkout_page') != 2){ print wp_kses_post( '<td></td>' ); }?>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>
		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
		<tr class="order-total">
			<th><?php esc_html_e( 'Total', 'floris' ); ?></th>
			<?php if( floris_get_option('checkout_page') != 2){ print wp_kses_post( '<td></td>' ); }?>
			<td><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>
		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
	</tfoot>
</table>