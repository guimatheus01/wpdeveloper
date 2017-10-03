<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?> 
<form action="<?php print esc_url( wc_get_cart_url() ); ?>" method="post" class="cart_form">
	<div class="col-md-8 col-xs-12">
		<h2 class="form-cart-title"><?php esc_html_e( 'Cesto de compras', 'floris' ); ?></h2>
		<?php do_action( 'woocommerce_before_cart_table' ); ?>
		<table class="shop_table shop_table_responsive cart" cellspacing="0">
			<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<tr class="<?php print esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
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
							<td class="product-details" data-title="<?php esc_html_e( 'Produto', 'floris' ); ?>">
								<?php
									if ( ! $product_permalink ) {
										print apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
									} else {
										print apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
									}
								?>
								<div class="product-quantity-pricing">
									<?php // Meta data
										$_product->set_name($_product->get_title());
										
										print wp_kses_post( WC()->cart->get_item_data( $cart_item ) );

										// Backorder notification
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											print wp_kses_post( '<p class="backorder_notification">' . esc_html__( 'Disponível em ordem pendente', 'floris' ) . '</p>' );
										}
									?>
									<div class="product-quantity">										
										<div class="counter">
											<div class="minus-val rs-count-block"><i class="fa fa-minus"></i></div>
												<input class="rs-fl-number" type="text" min="0" max="<?php print $_product->get_max_purchase_quantity(); ?>" name="<?php print wp_kses_post( 'cart['.$cart_item_key.'][qty]' ); ?>" value="<?php print wp_kses_post( $cart_item['quantity'] ); ?>">
											<div class="plus-val rs-count-block"><i class="fa fa-plus"></i></div>										
										</div>
									</div>
									<div class="product-subtotal">
										<?php print apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
									</div>
								</div>
							</td>
							<td class="product-remove">
								<a href="<?php print esc_url( WC()->cart->get_remove_url( $cart_item_key ) ); ?>" title="<?php esc_html_e( 'Remover esse item', 'floris' ); ?>" data-product_id="<?php print esc_attr( $product_id ); ?>" data-product_sku="<?php print esc_attr( $_product->get_sku() ); ?>"><img src="<?php print esc_url( get_template_directory_uri().'/assets/img/close_sm.png' ); ?>" alt="<?php esc_html_e( 'Remover', 'floris' ) ?>"></a>
							</td>
						</tr>
						<?php
					}
				}
				do_action( 'woocommerce_cart_contents' );
				?>
				<tr>
					<td colspan="6" class="actions">
						<a href="<?php the_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php esc_attr_e( 'Continue Comprando', 'floris' ); ?></a>
						<input type="submit" class="button button-style braun" name="update_cart" value="<?php esc_attr_e( 'Atualizar Cesto', 'floris' ); ?>" />
						<?php do_action( 'woocommerce_cart_actions' ); ?>
						<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					</td>
				</tr>
				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_cart_table' ); ?>
	
	</div>
	<div class="col-md-4 col-xs-12">
		<div class="cart-collaterals">				
			<?php do_action( 'woocommerce_cart_collaterals' ); ?>
		</div>
	</div>
</form>