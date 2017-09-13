<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}
$prod_related = '';
$prod_relate = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
if( isset($prod_relate['_prod_related']) ) { $prod_related = $prod_relate['_prod_related']; }
if( $prod_related ){
	$related = wc_get_related_products( $product->get_id(), $posts_per_page );
	if ( sizeof( $related ) === 0 ) return;
	$args = apply_filters( 'woocommerce_related_products_args', array(
		'post_type'            => 'product',
		'ignore_sticky_posts'  => 1,
		'no_found_rows'        => 1,
		'posts_per_page'       => $posts_per_page,
		'orderby'              => $orderby,
		'post__in'             => $related,
		'post__not_in'         => array( $product->get_id() )
	) );

	$rel_products = new WP_Query( $args );
	$woocommerce_loop['columns'] = $columns;
	if ( $rel_products->have_posts() ) : ?>
		<section class="section">
			<div class="second-caption style-2">
				<h3 class="h5 md title font-fam-2"><?php esc_html_e( 'Produtos Relacionados', 'floris' ); ?></h3>
			</div>
			<?php woocommerce_product_loop_start(); ?>
				<div class="container-fluid">
					<div class="row">
						<?php while ( $rel_products->have_posts() ) : $rel_products->the_post(); ?>
							<?php wc_get_template_part( 'content', 'related' ); ?>
						<?php endwhile; // end of the loop. ?>
					</div>
				</div>
			<?php woocommerce_product_loop_end(); ?>
		</section>
	<?php endif;
	wp_reset_postdata();
}