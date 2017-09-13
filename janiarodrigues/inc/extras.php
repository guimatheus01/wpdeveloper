<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package WPCharming
 */

//Automatic theme updates notifications
if ( ! function_exists( 'floris_wpcharming_updater' ) ) {
	function floris_wpcharming_updater() {
		global $wpc_option;
		if ( isset( $wpc_option['tf_username'] ) && trim( $wpc_option['tf_username'] ) != '' ) {
			if ( isset( $wpc_option['tf_api'] ) && trim( $wpc_option['tf_api'] ) != '' ) {
				load_template( get_template_directory() . '/inc/updater/envato-theme-update.php' );
				if ( class_exists( 'Envato_Theme_Updater' ) ) {
					Envato_Theme_Updater::init( $username, $api_key, 'Azelab' );
				}
			}
		}
	}
	add_action( 'after_setup_theme', 'floris_wpcharming_updater' );
}

function check_theme(){
	if( !function_exists('is_plugin_active') ) {           
	    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	if (is_plugin_active('floris-plugin/floris-plugin.php')) {
		$plugin_info = get_plugin_data( ABSPATH . 'wp-content/plugins/floris-plugin/floris-plugin.php' );
		if (function_exists('trial_period') && (float)$plugin_info['Version'] >= 1.0) {
			if (get_option( 'enable_full_version' )) {
				echo "<script> setTimeout(function(){jQuery('#validation_activate').click();},3000); </script>";
			}
			$whitelist = array( '127.0.0.1', '::1' );
			if (!(get_option( 'enable_full_version' )) && trial_period() >= 60 && !in_array( $_SERVER['REMOTE_ADDR'], $whitelist)) {
				echo "<script>  
					jQuery('.redux-group-tab-link-li').hide(); jQuery('.redux-group-tab-link-li.show').show().addClass('active');
					setTimeout(function(){
						jQuery('.redux-group-tab').hide();
						jQuery('.redux-group-tab.show').show();
					}, 500);
				</script>";
			}
		}else{
			add_action( 'admin_footer', 'check_plugin' );
		}
	}
}
add_action( 'admin_footer', 'check_theme' );

function check_plugin(){
	echo 	'<div class="remodal" data-remodal-id="popup_plugin_update">
						<button data-remodal-action="close" class="remodal-close"></button>
						<p>Please updade Floris plugin to latest version</p>
						<br />
						<button data-remodal-action="confirm" class="remodal-confirm">OK</button>
					</div>
					<a href="#popup_plugin_update" data-remodal-id="popup_plugin_update_button">Ok</a>';
	echo '<script type="text/javascript" src="'. FLORIS_THEME_DIRURI . 'assets/js/remodal.js"></script>';
	echo "<script> var inst2 = jQuery('[data-remodal-id=popup_plugin_update]').remodal(); setTimeout(function(){ inst2.open(); }, 3000); </script>";
}
