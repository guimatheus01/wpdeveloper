<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $woocommerce_loop;

if ( ! $crosssells = WC()->cart->get_cross_sells() ) {
	return;
}

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => apply_filters( 'woocommerce_cross_sells_total', $posts_per_page ),
	'orderby'             => $orderby,
	'post__in'            => $crosssells,
	'meta_query'          => WC()->query->get_meta_query()
);

$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'cross-sells';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_cross_sells_columns', $columns );

if ( $products->have_posts() ) : ?>

	<div class="cross-sells">
		<div class="second-caption style-2">
			<h3 class="h5 title font-fam-2"><?php esc_html_e( 'You may be interested in&hellip;', 'floris' ) ?></h3>
		</div>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<div class="col-md-12 col-sm-6 col-xs-12">
					<?php
						global $post, $product ;
						$prod_price = $product->get_price_html();
						$sale = get_post_meta( get_the_ID(), '_sale_price', true);
						$pa_liter = $product->get_attribute( 'pa_liter' );
						$prod_url = $product->get_permalink();
						$prod_price = $product->get_price_html();
					?>
					<div class="category-item type-2">
						<?php if($sale){ ?>
							<div class="new braun sale"><?php print esc_html('sale', 'floris'); ?></div>
						<?php } ?>
						<?php if ( has_post_thumbnail() ) { 
							$image = get_the_post_thumbnail_url( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
							}
						?>
						<div class="image">
						  	<a href="<?php print esc_url($prod_url); ?>"><img src="<?php print esc_url($image); ?>" alt="product"></a>
						  	<?php 
                				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                				if(is_plugin_active('floris-plugin/floris-plugin.php') && floris_get_option('prod_quickview_btn') && !$product->is_type('external')){ 
            				?>
						    	<span class="btn-quickview" data-url="<?php print esc_url($prod_url); ?>" data-product_id="<?php the_ID(); ?>" data-close="<?php print esc_url( get_template_directory_uri().'/assets/img/close_sm.png' );?>"></span>
						    	<div class="loader-wrapper button_load"><div class="1loader-inner ball-pulse"><div></div><div></div><div></div></div></div>
						    <?php } ?>
						</div>	
						<div class="item-title">
							<h4 class="h4 style-2"><a href="<?php print esc_url($prod_url); ?>"> <?php the_title(); ?></a></h4>
							<?php if($prod_price){ print wp_kses_post( '<p class="sub-title"><span>'.$prod_price.'</span></p>' );} ?>
						</div>
					</div>
				</div>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_query();
