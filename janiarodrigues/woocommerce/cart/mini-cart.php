<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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

?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="check-wrap">
	<?php if ( ! WC()->cart->is_empty() ) : ?>
		<h5 class="h5 title"><?php esc_attr_e( 'Sua Cesta', 'floris' ); ?><span class="font-fam-1">(<span class="cart_count" style="padding: 0;"></span> <?php esc_attr_e( 'ITEMS', 'floris' ); ?>)</span></h5>
		<div class="check-item-wrap">
			<?php
				$i = 0;
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
						$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
						$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $cart_item['product_id'] ), 'full'  );
						$thumbnail_url = floris_opt_aq_resize( $thumbnail_url, '120', '120', false, true);
						?>
						<div class="check-item">
							<?php if( $thumbnail_url ){ ?>
								<div class="image">
									<?php if ( ! $_product->is_visible() ) : ?>
										<img src="<?php print esc_url( $thumbnail_url ); ?>" alt="<?php print wp_kses_post( $product_name ); ?>">
									<?php else : ?>
										<a href="<?php print esc_url( $product_permalink ); ?>">
											<img src="<?php print esc_url( $thumbnail_url ); ?>" alt="<?php print wp_kses_post( $product_name ); ?>">
										</a>
									<?php endif; ?>
								</div>
							<?php } ?>
							<div class="text">
								<h5 class="h5 sm"><a href="<?php print esc_url( $product_permalink ); ?>"><?php print wp_kses_post( $product_name ); ?></a></h5>
								<?php $_product->set_name($_product->get_title()); ?>
								<?php print wp_kses_post( WC()->cart->get_item_data( $cart_item ) ); ?>
								<?php print apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
							</div>							
							<div class="delete-item remove_ajax">
								<?php
                                    print apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove_cart" title="%s" data-product_id="%s" data-product_sku="%s" data-cart-item-key="%s"><img src="'.get_template_directory_uri().'/assets/img/close_md.png" alt="" class="resp-img"></a>', 
                                        esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
										esc_html__( 'Remova Este Item', 'floris' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() ),
										$cart_item_key
                                    ), $cart_item_key );
                                ?>
							</div>
						</div>
						<?php
					}
				$i++;}
			?>
			<span class="result_i"><?php print wp_kses_post( floris_get_cart_contents_count() ); ?></span>
		</div>
	<?php else : ?>
		<div class="check-item-wrap">
			<div class="check-item"><?php esc_html_e( 'Nenhum produto no carrinho.', 'floris' ); ?></div>
		</div>
	<?php endif; ?>

</div><!-- end product list -->

<?php if ( ! WC()->cart->is_empty() ) : ?>
	<div class="check-pay-wrap"> 
		<div class="check-pay">
			<div class="price-total font-fam-2"><?php esc_html_e( 'Subtotal', 'floris' ); ?>:<span><?php print WC()->cart->get_cart_subtotal(); ?></span></div>
			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
			<a href="<?php print esc_url( wc_get_cart_url() ); ?>" class="button-style braun get_cart"><span><?php esc_html_e( 'Ver Carrinho', 'floris' ); ?></span></a>
			<a href="<?php print esc_url( wc_get_checkout_url() ); ?>" class="button-style braun get_checkout"><span><?php esc_html_e( 'Checkout', 'floris' ); ?></span></a>
		</div>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
