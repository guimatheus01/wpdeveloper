<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product, $woocommerce;
$attachment_ids = $product->get_gallery_image_ids();

if( $product->is_type('variable') && floris_get_option('product_variable') ){
	$variations = $product->get_available_variations();
	foreach ( $variations as $variation ) { 
		if (!empty($variation['image_id'])) {
			$attachment_ids[] = $variation['image_id'];
		}
	}
}

if ( $attachment_ids) {
?>
<?php $data = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
	$prod_thumbs_bg = '';
	if(isset($data['_thumbs_bg_color'])){ $prod_thumbs_bg = $data['_thumbs_bg_color']; }
	if( empty($prod_thumbs_bg) && floris_get_option('glob_thumb_bg_color') ){ $prod_thumbs_bg = floris_get_option('glob_thumb_bg_color'); }
?>
	<div class="gallery-thumbs swiper-container-horizontal" data-xs-slides="3" data-sx-slides="4" data-sm-slides="5" data-md-slides="5" data-lg-slides="5" data-add-slides="5">
		<div class="swiper-wrapper">
			<?php if (has_post_thumbnail()) {?>
				<div class="swiper-slide" >
					<div class="thumbs-item active" <?php if (!empty($prod_thumbs_bg)) { ?> style="background: <?php print esc_html($prod_thumbs_bg); ?>;" <?php } ?>>
						<?php 
							$image_id = get_post_thumbnail_id();
							$image_post  = wp_get_attachment_image_src($image_id, '', true);
							print wp_kses_post( '<img src="'.$image_post[0].'" alt="'.$image_post[3].'" />' );
						?>
					</div>
				</div>
				<?php 
					foreach ( $attachment_ids as $attachment_id ) { 
					$image_link  = wp_get_attachment_image_src($attachment_id, '', true);
				?>
					<div class="swiper-slide" >
						<div class="thumbs-item" <?php if (!empty($prod_thumbs_bg)) { ?> style="background: <?php print esc_html($prod_thumbs_bg); ?>;" <?php } ?>>
							<?php print wp_kses_post( '<img src="'.$image_link[0].'" alt="'.$image_link[3].'" />' );?>
						</div>
					</div>
				<?php } 
				} ?>
		</div>
	</div>
	<?php
}