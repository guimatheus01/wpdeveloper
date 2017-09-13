<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $woocommerce, $product;
$attachment_ids = $product->get_gallery_image_ids();
?>
<?php 
	$data = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
	$img_class=$prod_bg=$style=$prod_img_c_d=$prod_img_auto_d=$padding_top_d=$padding_right_d=$padding_bottom_d=$padding_left_d='';
	if(isset($data['_prod_bg_color'])){ $prod_bg = $data['_prod_bg_color'];}
	if( empty($prod_bg) && floris_get_option('glob_product_bg_color') ){ $prod_bg = floris_get_option('glob_product_bg_color'); }

	if(isset($data['prod_img_c_d'])){ $prod_img_c_d = $data['prod_img_c_d'];}
	if(isset($data['prod_img_auto_d'])){ $prod_img_auto_d = $data['prod_img_auto_d'];}
	if(isset($data['fieldset_1'])){ $padding_top_d = $data['fieldset_1']['padding_top_d'];$padding_right_d = $data['fieldset_1']['padding_right_d'];$padding_bottom_d = $data['fieldset_1']['padding_bottom_d'];$padding_left_d = $data['fieldset_1']['padding_left_d'];}

	$prod_img_cover = floris_get_option('prod_img_cover');
	$prod_img_spacing = floris_get_option('prod_img_spa');
	$prod_img_auto = floris_get_option('prod_img_auto');
	if( $prod_img_c_d != '2' && $prod_img_c_d != '' ){
		$style.= 'style="';
			if($prod_img_c_d){ $style.= 'height: 100%;'; $img_class='img_class';}
			elseif($prod_img_auto_d){ $style.= 'height: auto;'; }
			else{ $style.= 'height: auto;padding-top:'.$padding_top_d.';padding-right:'.$padding_right_d.';padding-bottom:'.$padding_bottom_d.';padding-left:'.$padding_left_d.';'; }			
		$style.='"';
	} else {
		if( !$prod_img_cover ){
			$style.= 'style="';
				if($prod_img_auto){ $style.= 'height: auto;'; }
				else{ $style.= 'height: auto;padding-top:'.$prod_img_spacing["padding-top"].';padding-right:'.$prod_img_spacing["padding-right"].';padding-bottom:'.$prod_img_spacing["padding-bottom"].';padding-left:'.$prod_img_spacing["padding-left"].';'; }			
			$style.='"';
		} else{$img_class='img_class';}
	}
?>
<div class="sale-slider two-slider">
	<div class="gallery-top gallery-det-prod" style="margin: 15px;<?php if (!empty($prod_bg)) { print wp_kses_post ( 'background:'.$prod_bg.';' ); }?>">
		<div class="swiper-wrapper photoswipe" itemscope itemtype="http://schema.org/ImageGallery">
			<?php if (has_post_thumbnail()) {?>
				<div class="swiper-slide">
					<div class="sale-item zoom-img" style="text-align:center;">
						<?php 
							$image_id = get_post_thumbnail_id();
							$image_post  = wp_get_attachment_image_src($image_id, '', true);
							if($image_post){
						?>
							<div itemprop="associatedMedia" class="images" itemscope itemtype="http://schema.org/ImageObject">
								<a href="<?php print esc_url($image_post[0]); ?>" itemprop="contentUrl" data-size="<?php print esc_attr($image_post[1]); ?>x<?php print esc_attr($image_post[2]); ?>">
									<img class="<?php print esc_html( $img_class ); ?>" src="<?php print esc_url($image_post[0]); ?>" height="<?php print esc_attr($image_post[1]); ?>" width="<?php print esc_attr($image_post[2]); ?>" sizes="<?php print esc_attr($image_post[1]); ?>x<?php print esc_attr($image_post[2]); ?>" itemprop="thumbnail" alt="<?php print esc_attr($image_post[3]); ?>" <?php print wp_kses_post ( $style ); ?>/>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php 
					foreach ( $attachment_ids as $attachment_id ) { 
					$image_link  = wp_get_attachment_image_src($attachment_id, '', true);
				?>
					<div class="swiper-slide">
						<div class="sale-item zoom-img" style="text-align:center;">
							<div itemprop="associatedMedia" class="images" itemscope itemtype="http://schema.org/ImageObject">
								<a href="<?php print esc_url($image_link[0]); ?>" itemprop="contentUrl" data-size="<?php print esc_attr($image_link[1]); ?>x<?php print esc_attr($image_link[2]); ?>">
									<img class="<?php print esc_html( $img_class ); ?>" src="<?php print esc_url($image_link[0]); ?>" alt="<?php print esc_attr($image_link[3]); ?>" height="<?php print esc_attr($image_link[1]); ?>" sizes="<?php print esc_attr($image_link[1]); ?>x<?php print esc_attr($image_link[2]); ?>" width="<?php print esc_attr($image_link[2]); ?>" itemprop="thumbnail" <?php print wp_kses_post ( $style ); ?>/>
								</a>
							</div>
						</div>
					</div>
				<?php } 
					if( $product->is_type('variable') && floris_get_option('product_variable') ){
					$variations = $product->get_available_variations();
					foreach ( $variations as $variation ) { 
						if (!empty($variation['image_id'])) {
							$variation_link = wp_get_attachment_image_src($variation['image_id'], '', true);	
					?>
			    			<div class="swiper-slide">
								<div class="sale-item zoom-img" style="text-align:center;">
									<div itemprop="associatedMedia" class="images" itemscope itemtype="http://schema.org/ImageObject">
										<a href="<?php print esc_url($variation_link); ?>" itemprop="contentUrl" data-size="<?php print esc_attr($variation_link[1]); ?>x<?php print esc_attr($variation_link[2]); ?>">
											<img class="<?php print esc_html( $img_class ); ?>" src="<?php print esc_url($variation_link[0]); ?>" alt="<?php print esc_attr($variation_link[3]); ?>" height="<?php print esc_attr($variation_link[1]); ?>" sizes="<?php print esc_attr($variation_link[1]); ?>x<?php print esc_attr($variation_link[2]); ?>" width="<?php print esc_attr($variation_link[2]); ?>" itemprop="thumbnail" <?php print wp_kses_post ( $style ); ?>/>
										</a>
									</div>
								</div>
							</div>
				<?php } } }
				?>
			<?php 	
				}else{
					print apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img class="resp-img" src="%s" alt="%s" />', wc_placeholder_img_src(), esc_html__( 'Placeholder', 'floris' ) ), $post->ID );
				}
			?>
		</div>
	</div>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
</div>