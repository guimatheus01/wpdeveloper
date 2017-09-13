<?php
/**
 * Checkout terms and conditions checkbox
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$terms_page_id = wc_get_page_id( 'terms' );

if ( $terms_page_id > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) : ?>
    <p class="form-row terms wc-terms-and-conditions">
		<input type="checkbox" class="input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" />
        <label for="terms" class="checkbox"><?php printf( __( 'Eu li e aceito os <a href="%s" target="_blank">termos &amp; condições</a>', 'floris' ), esc_url( wc_get_page_permalink( 'terms' ) ) ); ?> <span class="required">*</span></label>
        <input type="hidden" name="terms-field" value="1" />
    </p>
<?php endif; ?>
