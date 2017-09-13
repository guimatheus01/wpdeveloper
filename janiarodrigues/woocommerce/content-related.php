<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-related.php.
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
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-md-3 col-sm-6 col-xs-12">
	<?php
		global $post, $woocommerce, $product;
		$prod_price = $product->get_price_html();
		$sale = get_post_meta( get_the_ID(), '_sale_price', true);
		$pa_liter = $product->get_attribute( 'pa_liter' );
		$prod_url = $product->get_permalink();
		$prod_price = $product->get_price_html();
	?>
	<div class="category-item type-2 hover-image-item">
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
		    	<div class="loader-wrapper button_load"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>
		    <?php } ?>
		</div>	
		<div class="item-title">
			<h4 class="h4 style-2"><a href="<?php print esc_url($prod_url); ?>"> <?php the_title(); ?></a></h4>
			<?php 
                if (class_exists('floris_wcva_shop_page_swatches')) {
                    $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                    print '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                }
            ?>
			<?php if($prod_price){ print wp_kses_post( '<p class="sub-title"><span>'.$prod_price.'</span></p>' );} ?>
		</div>
	</div>
</div>