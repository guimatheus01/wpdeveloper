<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$attribute_keys = array_keys( $attributes );
do_action( 'woocommerce_before_add_to_cart_form' );
if( $available_variations ){
	foreach($available_variations as $key => $color) {
		foreach ($color as $key2 => $color2) {
			if( $key2 == 'image_src' ){	$color[$key2] = $color['image_link']; }
			if( $key2 == 'image_srcset' ){ $color[$key2] = ''; }
			if( $key2 == 'image_sizes' ){
				$sizes = wp_get_attachment_image_src( attachment_url_to_postid( $color['image_link'] ) , '', true );			
				$color[$key2] = $sizes[1].'x'.$sizes[2]; 
			}
		}
	    $available_variations[$key] = $color;
	}
}
?>
<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php print wp_kses_post( absint( $product->get_id() ) ); ?>" data-product_variations="<?php print wp_kses_post( htmlspecialchars( json_encode( $available_variations ) ) )?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>
	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'Este produto está atualmente fora de estoque e indisponível', 'floris' ); ?></p>
	<?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<td class="label"><label for="<?php print wp_kses_post( sanitize_title( $attribute_name ) ); ?>"><?php print wp_kses_post( wc_attribute_label( $attribute_name ) ); ?></label></td>
						<td class="value">
							<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) : $product->get_variation_default_attribute( $attribute_name );
								wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
								print end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Limpar Seleção', 'floris' ) . '</a>' ) : '';
							?>
						</td>
					</tr>
		        <?php endforeach;?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<div class="single_variation_wrap">
			<?php
				/**
				 * woocommerce_before_single_variation Hook.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * woocommerce_after_single_variation Hook.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>
	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>
<?php echo do_shortcode('[floris_accordion_shortcode list_type2="false"][floris_accordion_content_shortcode title="Medidas e Tamanhos"]<div class="table-responsive"><table class="table table-hover" style="border-top: 25px solid #2e2e2e;"><tr><th></th><th colspan="2">P</th><th colspan="2">M</th><th colspan="2">G</th></tr><tr style="background-color: #E0E0E0;" ><td><strong>MEDIDAS</strong></td><td>38</td><td>40</td><td>42</td><td>44</td><td>46</td><td>48</td></tr><tr><td>Busto</td><td>86</td><td>90</td><td>94</td><td>98</td><td>102</td><td>106</td></tr><tr><td>Cintura</td><td>64</td><td>68</td><td>72</td><td>76</td><td>80</td><td>84</td></tr><tr><td>Quadril</td><td>92</td><td>96</td><td>100</td><td>104</td><td>108</td><td>112</td></tr></table></div>[/floris_accordion_content_shortcode]') ?>
<br><br>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>