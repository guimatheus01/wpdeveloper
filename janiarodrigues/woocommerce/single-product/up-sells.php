<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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

$upsells = $product->get_upsell_ids();

if ( sizeof( $upsells ) === 0 ) {
	return;
}

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->get_id() ),
	'meta_query'          => $meta_query
);
$products = new WP_Query( $args );
$woocommerce_loop['columns'] = $columns;
$prod_related = $floris_page_header = $headersettings = '';
$prod_related = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
if ( $products->have_posts() ) : ?>
	<section class="<?php if( !isset($prod_related['_prod_related'])) { print wp_kses_post( 'upsells' );} ?> products section">
		<div class="second-caption style-2">
			<h3 class="h5 md title font-fam-2"><?php esc_html_e( 'You may also like&hellip;', 'floris' ) ?></h3>
		</div>
		<?php woocommerce_product_loop_start(); ?>
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				<?php wc_get_template_part( 'content', 'related' ); ?>
			<?php endwhile; // end of the loop. ?>
		<?php woocommerce_product_loop_end(); ?>
	</section>
<?php endif;
wp_reset_postdata();