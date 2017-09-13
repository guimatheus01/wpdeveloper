<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
	exit; // Exit if accessed directly
}
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	print wp_kses_post( get_the_password_form() );
	 	return;
	 }
?>
<div id="product-<?php the_ID(); ?>" <?php post_class('content'); ?>>
	
	<div class="product-top border-b" >
		<?php
			/**
			 * woocommerce_before_single_product_summary hook.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="sale-desc">
			<div class="desc">	
			<?php
				/**
				 * woocommerce_single_product_summary hook.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>
			</div>
		</div>
	</div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );

		if( floris_get_option('product_subscribe', 1) ) {
			$mailchimp_ID_woo = floris_get_option('mailchimp_ID_woo');
			$mailchimp_title_woo = floris_get_option('mailchimp_title_woo');
			$mailchimp_title2_woo = floris_get_option('mailchimp_title2_woo');
			$mailchimp_button_woo = floris_get_option('mailchimp_button_woo');
			if($mailchimp_ID_woo){
	?>
			<section class="section-xs prod_subsr">
			    <div class="container">
			    	<?php 
						$shortcode='';
						if($mailchimp_title_woo){ $shortcode.=' title="'.$mailchimp_title_woo.'" '; }
						if($mailchimp_title2_woo){ $shortcode.=' description="'.$mailchimp_title2_woo.'" '; }
						if($mailchimp_button_woo){ $shortcode.=' submit="'.$mailchimp_button_woo.'" '; }
						if( function_exists( 'floris_mailchimp' ) ){ floris_mailchimp($mailchimp_ID_woo, $shortcode); }
					?>
				</div>
			</section>
		<?php } } ?>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
<div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
