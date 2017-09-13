<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="product_meta">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : 
		if( floris_get_option('products_sku') ){
	?>
		<h4 class="h4 style-1"><?php esc_html_e( 'SKU: ', 'floris' ); ?><?php print wp_kses_post( ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'floris' ) ); ?></h4>
	<?php } endif;
		if( floris_get_option('products_category') ){
			print wp_kses_post( wc_get_product_category_list( $product->get_id(), ', ', '<h4 class="h4 style-1 posted_in">' . _n( 'Categoria:', 'Categorias:', $cat_count, 'floris' ) . ' ', '</h4>' ) );
		} 
		if( floris_get_option('products_tag') ){
			print wp_kses_post( wc_get_product_tag_list( $product->get_id(), ', ', '<h4 class="h4 style-1 tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'floris' ) . ' ', '</h4>' ) ); 
		}
		do_action( 'woocommerce_product_meta_end' );
	?>
</div>