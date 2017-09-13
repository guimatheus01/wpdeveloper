<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $post, $wp_query;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$colms = floris_get_option('woo_products');
$prod_shop_backside = floris_get_option('prod_shop_backside');
$coll_class = '';
$woo_cat_product=1;
$prod_cat_backside=1;
if( !is_shop() ){
    $cat = $wp_query->get_queried_object();
	$data_cat = get_term_meta( $cat->term_id, 'floris_custom_category_options', true );
	if( isset($data_cat['woo_cat_product']) ){ $woo_cat_product = $data_cat['woo_cat_product']; }
	if( isset($data_cat['prod_cat_backside']) ){ $prod_cat_backside = $data_cat['prod_cat_backside']; }
}

global $woocommerce_loop;
if ($woocommerce_loop['name'] !== '') {
	$colms = $woocommerce_loop['columns'];
}	

if( $woo_cat_product != '1' ){
	if($woo_cat_product == '2'){ $coll_class = 'col-full'; }
	elseif($woo_cat_product == '3'){ $coll_class = 'col-50'; }
	elseif($woo_cat_product == '4'){ $coll_class = 'col-33'; }
	else{ $coll_class = 'col-25'; }
} else {
	if($colms == '1'){ $coll_class = 'col-full'; }
	elseif($colms == '2'){ $coll_class = 'col-50'; }
	elseif($colms == '3'){ $coll_class = 'col-33'; }
	else{ $coll_class = 'col-25'; }
}
?>
<div <?php post_class($coll_class); ?>>
	<?php
    	$sale = get_post_meta( $product->get_id(), '_sale_price', true);
    	$pa_liter = $product->get_attribute( 'pa_liter' );
    	$prod_url = $product->get_permalink();
   	?>
	<div class="category-item hover-image-item">
		<?php if ( has_post_thumbnail() ) { 
			$image = wp_get_attachment_image_url( get_post_thumbnail_id( $product->get_id() ), 'full' );
			$prod_img = floris_opt_aq_resize( $image, '1902', '1068', false, true);
			}
		?>
		<div class="image">
			<?php if($sale){ ?>
				<div class="new sale"><?php print esc_html('sale', 'floris'); ?></div>
			<?php } 
			if( has_post_thumbnail() ) {
				if( $prod_cat_backside != 1){ $prod_backside = $prod_cat_backside;}
				else { $prod_backside = $prod_shop_backside; }
                $thumb_link = '';
                if( $prod_backside ){
                    $attachment_ids = $product->get_gallery_image_ids();
                    if ( $attachment_ids ) {  $count = 1;
                        foreach ( $attachment_ids as $attachment_id ) { 
                            $thumb_link  = wp_get_attachment_image_src($attachment_id, '', true);
                            if( $count >= 1 )break;
                        $count++;}
                    }
                }
                if( $prod_backside && $thumb_link ){
        	?>
                <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                    <div class="flipper">
                        <a class="front" href="<?php print esc_url($prod_url); ?>">
                            <img src="<?php print esc_url( $prod_img ); ?>" alt="product">
                        </a>
                        <a class="back" href="<?php print esc_url($prod_url); ?>">
                            <img src="<?php print esc_url( $thumb_link[0] ); ?>" alt="product_thumb">
                        </a>
                    </div>
                </div>
                <?php } else { ?>
			  		<a href="<?php print esc_url($prod_url); ?>"><img src="<?php print esc_url($prod_img); ?>" alt="product"></a>
			  	<?php 
			  		}
	                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	                if(is_plugin_active('floris-plugin/floris-plugin.php') && floris_get_option('prod_quickview_btn') && !$product->is_type('external')){ 
	            ?>
			    	<span class="btn-quickview" data-url="<?php print esc_url($prod_url); ?>" data-product_id="<?php echo $product->get_id(); ?>" data-close="<?php print esc_url( get_template_directory_uri().'/assets/img/close_sm.png' );?>"></span>
			    	<div class="loader-wrapper button_load"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>
			    <?php } 
			} ?>
		</div>	
		<div class="item-title">
			<h4 class="h4"><a href="<?php print esc_url($prod_url); ?>"><?php the_title(); ?></a></h4>
			<?php 
                if (class_exists('floris_wcva_shop_page_swatches')) {
                    $floris_wcva_shop_page_swatches = new floris_wcva_shop_page_swatches;
                    print '<div class="floris_swatches_shop">'.$floris_wcva_shop_page_swatches->wcva_change_shop_attribute_swatches($product).'</div>';
                }
            ?>
			<p class="sub-title"><?php if($pa_liter) { print wp_kses_post( '<b>'.esc_html($pa_liter).'&nbsp;&ndash;</b>' ); } ?><span> <?php print wp_kses( $product->get_price_html(), array( 'span' => array(), 'del' => array(), 'ins' => array() ) ); ?></span></p>
			<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>
	</div>
</div>