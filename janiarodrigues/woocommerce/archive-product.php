<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wp_query;
$cat = $wp_query->get_queried_object();
$woo_sidebar = floris_get_option( 'woo_sidebar' );

get_header( 'shop' );

	/**
	 * woocommerce_before_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 */
	do_action( 'woocommerce_before_main_content' );

	$cat_banner=$woo_cat_sidebar=1;
	$height_1200='620px';$height_992='620px';$height_768='600px';$height_480='470px';
	if( !is_shop() ){
		$data_cat = get_term_meta( $cat->term_id, 'floris_custom_category_options', true );
		if( isset($data_cat['cat_banner']) ){ $cat_banner = $data_cat['cat_banner']; }
		if( isset($data_cat['cat_baner_height'])){ 
			$height_1200 = $data_cat['cat_baner_height']['height_1200'];
			$height_992 = $data_cat['cat_baner_height']['height_992'];
			$height_768 = $data_cat['cat_baner_height']['height_768'];
			$height_480 = $data_cat['cat_baner_height']['height_480'];
		}
		if( isset($data_cat['woo_cat_sidebar']) ){ $woo_cat_sidebar = $data_cat['woo_cat_sidebar']; }
	}
	
	if( is_tax('product_tag') ) : ?>
		<section class="section-lg pattern sm">
		    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<div class="container">
			        <div class="second-caption style-2">
						<h3 class="h3 title font-fam-2"><?php woocommerce_page_title(); ?></h3>
						<div class="simple-text">
							<?php do_action( 'woocommerce_archive_description' ); ?>
						</div>  
					</div>
				</div>

			<?php endif; ?>
		</section>
	<?php elseif ( apply_filters( 'woocommerce_show_page_title', true ) && $cat_banner ) : ?>
		<?php if (!is_search()) { ?>
		<div class="top-slider sm type-2 after_bread" data-height_1200="<?php print esc_html( $height_1200 ); ?>" data-height_992="<?php print esc_html( $height_992 ); ?>" data-height_768="<?php print esc_html( $height_768 ); ?>" data-height_480="<?php print esc_html( $height_480 ); ?>">
	        <div class="category-baner">
		        <?php 
		        	if (is_shop()) {
				        $shop = get_option( 'woocommerce_shop_page_id' );
				        if($shop){
				        	$image = wp_get_attachment_image_src( get_post_thumbnail_id($shop), 'full-size' );
			    ?>
			        	<div class="bg fix" style="background-image:url('<?php print esc_url( $image[0] ); ?>');"></div>
			        	<?php } ?>
				        <div class="title vertical-align">
					        <h1 class="h1 style-1"><?php woocommerce_page_title(); ?></h1>
					        <div class="simple-text font-fam-3">
						       	<?php 
						       		$shop_page = get_post( wc_get_page_id( 'shop' ) );
						       		if($shop_page){
										$description = wc_format_content( $shop_page->post_content );
										print wp_kses_post( '<div class="page-description">' . $description . '</div>' );
									}
								?>
					        </div>
				        </div>
		        <?php 
		    		} else {					 		
				        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_idb', true );
					    $image = wp_get_attachment_url( $thumbnail_id );
					    if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';}
					    $term_data = get_term_meta( $cat->term_id, 'floris_custom_category_options', true );
						$cat_title_color = '';
						if(isset($term_data['cat_title_color'])){
							$cat_title_color = 'style="color:'.$term_data['cat_title_color'].';"';
						}
				?>
				        <div class="bg fix" style="background-image:url('<?php print esc_url($image); ?>');"></div>
					    <div class="title vertical-align">
					        <h1 class="h1 style-1" <?php print wp_kses_post( $cat_title_color ); ?>><?php woocommerce_page_title(); ?></h1>
					        <div class="simple-text font-fam-3" <?php print wp_kses_post( $cat_title_color ); ?>>
						        <?php do_action( 'woocommerce_archive_description' ); ?>
					        </div>
				        </div>
		        <?php } ?>
	        </div>
        </div>
    <?php }else{ ?>
    		<div class="empty-banner"></div>
    <?php } ?>
	<?php endif;

	woocommerce_product_loop_start();

	if( $woo_cat_sidebar != '1' ){
		if( $woo_cat_sidebar == '2' || $woo_cat_sidebar == '4' ){ print wp_kses_post( '<div class="container container_sidebar">' ); }
    	if( $woo_cat_sidebar == '2' ){ do_action( 'woocommerce_sidebar' ); }
    	if( $woo_cat_sidebar == '2' || $woo_cat_sidebar == '4' ){ print wp_kses_post( '<div class="col-md-9 col-sm-12 with_sidebar">' ); }
	} else { 
		if( $woo_sidebar == '1' || $woo_sidebar == '3' ){ print wp_kses_post( '<div class="container container_sidebar">' ); }
    	if( $woo_sidebar == '1' ){ do_action( 'woocommerce_sidebar' ); }
    	if( $woo_sidebar == '1' || $woo_sidebar == '3' ){ print wp_kses_post( '<div class="col-md-9 col-sm-12 with_sidebar">' ); }
    }

	if ( have_posts() ) :
		global $post;		
		woocommerce_product_subcategories();
	?>
		<div class="category-baner <?php print wp_kses_post( ( !$cat_banner ? 'category-no-baner':'' ) ); ?>">
			<div class="title fl-single-cat">
				<?php do_action( 'woocommerce_before_shop_loop' ); ?>
			</div>
		</div>
		<div class="wrapper-post">
			<?php 
				while ( have_posts() ) : the_post();
					wc_get_template_part( 'content', 'product' );
				endwhile; // end of the loop.
				wp_reset_postdata(); 
			?>
		</div>			
	<?php 
		floris_pagination($post->max_num_pages);
	elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :
		wc_get_template( 'loop/no-products-found.php' );
	endif;

	if( $woo_cat_sidebar != '1' ){
		if( $woo_cat_sidebar == '2' || $woo_cat_sidebar == '4' ){ print wp_kses_post( '</div>' ); }
    	if( $woo_cat_sidebar == '4' ){ do_action( 'woocommerce_sidebar' ); }
    	if( $woo_cat_sidebar == '2' || $woo_cat_sidebar == '4' ){ print wp_kses_post( '</div>' ); }
	} else {
		if( $woo_sidebar == '1' || $woo_sidebar == '3' ){ print wp_kses_post( '</div>' ); }
    	if( $woo_sidebar == '3' ){ do_action( 'woocommerce_sidebar' ); }
    	if( $woo_sidebar == '1' || $woo_sidebar == '3' ){ print wp_kses_post( '</div>' ); }
    }

	woocommerce_product_loop_end();

	do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' ); ?>