<?php
/**
 * Grouped product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/grouped.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $post;
$parent_product_post = $post;
do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<form class="cart <?php print wp_kses_post( ( isset( $_POST['add-to-cart'] ) ? 'group-add' : '' ) ); ?>" method="post" enctype='multipart/form-data'>
	<table cellspacing="0" class="group_table">
		<tbody>
			<?php
				foreach ( $grouped_products as $product_id ) :
					if ( ! $product = wc_get_product( $product_id ) ) {
						continue;
					}
					if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) && ! $product->is_in_stock() ) {
						continue;
					}
					$post    = get_post( $product->get_id() );
					setup_postdata( $post );
					?>
					<tr>
						<td>
							<label for="product-<?php print esc_html( $product_id ); ?>">
								<?php print wp_kses_post( $product->is_visible() ? '<a href="' . esc_url( apply_filters( 'woocommerce_grouped_product_list_link', get_permalink(), $product_id ) ) . '">' . esc_html( get_the_title() ) . '</a>' : esc_html( get_the_title() ) ); ?>
							</label>
						</td>
						<?php do_action ( 'woocommerce_grouped_product_list_before_price', $product ); ?>
						<td class="price">
							<?php
								print wp_kses( $product->get_price_html(), array( 'span' => array(), 'del' => array(), 'ins' => array() ) );

								if ( $availability = $product->get_availability() ) {
									$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';
									print apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
								}
							?>
						</td>
						<td>
							<?php 
								if ( $product->is_sold_individually() || ! $product->is_purchasable() ) :
									woocommerce_template_loop_add_to_cart();
								else :
									$quantites_required = true;
							?>
							<?php 
							  	$product_id = $product->get_id();
								$_product = wc_get_product( $product_id );
								$price = $_product->get_price();
							?>
								<div class="counter jx font-fam-2 rs-add-bl">
								 	<div class="minus-val rs-count-block"><i class="fa fa-minus"></i></div>
										<input class="rs-fl-number" name="quantity[<?php print wp_kses_post( $product_id ); ?>]" type="text" value="0">
									<div class="plus-val rs-count-block"><i class="fa fa-plus"></i></div>
							 	</div>
							<?php endif; ?>
						</td>
					</tr>
					<?php
				endforeach;
				// Reset to parent grouped product
				$post    = $parent_product_post;
				$product = wc_get_product( $parent_product_post->ID );
				setup_postdata( $parent_product_post );
			?>
		</tbody>
	</table>
	<input type="hidden" name="add-to-cart" value="<?php print esc_attr( $product->get_id() ); ?>" />
	<?php if ( $quantites_required ) : ?>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<button type="submit" class="single_add_to_cart_button group-button button button-style braun"><span><?php print wp_kses_post( $product->single_add_to_cart_text() ); ?></span></button>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>
</form>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>