<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>
<div class="prod-price font-fam-2 <?php if ($product->is_type('variable')) { echo 'variation-prices'; } ?>">
	<?php print wp_kses( $product->get_price_html(), array( 'span' => array(), 'del' => array(), 'ins' => array() ) ); ?>
	<meta itemprop="price" content="<?php print esc_attr( $product->get_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php print esc_attr( get_woocommerce_currency() ); ?>" />
</div>