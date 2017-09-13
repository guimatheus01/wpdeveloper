<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$floris_opt = get_option( '$floris_opt' );

set_transient( '_redux_activation_redirect', false, 30 );
delete_transient( '_dslc_activation_redirect_1' );

//Add default options and show Options Panel after activate
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	// Flush rewrite rules.
	flush_rewrite_rules();
	// redirect
	$floris_update_log = get_option( 'floris_updat_log');
	if( ! is_array($floris_update_log) ) floris_activate_redirect(); // only redirect if its first time activation
}

// Adding redirect
function floris_activate_redirect() {
	header( 'Location: ' . admin_url( 'themes.php?page=tgmpa-install-plugins' ) );
} // End floris_activate_redirect()

// Adding versions
add_action( 'current_screen', 'floris_update_version' );
function floris_update_version( $current_screen ) {
	if ( 'appearance_page_tgmpa-install-plugins' == $current_screen->base ) {
		if( function_exists( 'floris_firstInst_notice' )) add_action( 'admin_notices', 'floris_firstInst_notice' ); // add notice.
	}
	if ( 'toplevel_page__floris' == $current_screen->base ) {

		$woo_theme = wp_get_theme();
		$woo_this_theme_ver = $woo_theme->get( 'Version' );
		$theme_update_log = get_option( 'floris_updat_log');

        if ( ! $theme_update_log ) $theme_update_log = array();

		// First update
		if ( ! in_array('1.0', $theme_update_log) ) {
			array_unshift($theme_update_log, '1.0');
			update_option( 'floris_updat_log', $theme_update_log);
		}

		if ( ! in_array($woo_this_theme_ver, $theme_update_log) ) {
			array_unshift($theme_update_log, $woo_this_theme_ver);
			update_option( 'floris_updat_log', $theme_update_log);
		}
	}
}

if( !function_exists( 'floris_firstInst_notice' )) {
	function floris_firstInst_notice() {
?>
		<div class="updated floris_updated floris_notice_diss notice notice-info is-dismissible" style="position: relative;padding: 25px 12px;">
			<span style="text-align:center;font-weight: bold;color:green;">
				<?php esc_html_e( 'Thanks for Activating Floris WordPress theme.', 'floris' ); ?>
			</span><br /><br />
			<?php esc_html_e( 'Theme requires few bundled plugins to function on its full power. Please Install and Activate plugins below.', 'floris' ); ?><br />
			<?php esc_html_e( 'You can ofcourse choose not to install any particular plugin if you do not need it. ', 'floris' ); ?><br />
			<?php esc_html_e( 'If you do not see any plugin listed below that means all required plugins are active and updated. If this is a first install, you can now move on to ThemeOptions/Demo Content on left menu to import demo content. ', 'floris' ); ?>
		</div>
<?php
	}
}

if ( ! function_exists( 'floris_load_scripts' ) ) {
	function floris_load_scripts() {
		wp_enqueue_script( "comment-reply" );
		// Scripts
		wp_enqueue_script( 'wow_min', FLORIS_THEME_DIRURI . 'assets/js/wow.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'sjm', FLORIS_THEME_DIRURI . 'assets/js/swiper.jquery.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'smoothscroll', FLORIS_THEME_DIRURI . 'assets/js/SmoothScroll.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'jarallax', FLORIS_THEME_DIRURI . 'assets/js/jarallax.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'mousewheel', FLORIS_THEME_DIRURI . 'assets/js/mousewheel.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'all', FLORIS_THEME_DIRURI . 'assets/js/global.js', array( 'jquery' ), null, true );		
		wp_enqueue_script( 'instafeed', FLORIS_THEME_DIRURI . 'assets/js/instafeed.min.js', array( 'jquery' ), null, true );
		wp_register_script( 'map', FLORIS_THEME_DIRURI . 'assets/js/map.js', array( 'jquery' ), null, true );
		
		if (is_plugin_active( 'woocommerce-colororimage-variation-select/woocommerce-colororimage-variation-select.php' )) {
		    wp_enqueue_style( 'wcva-shop-frontend', ''.wcva_PLUGIN_URL.'css/shop-frontend.css'); 
		}  

		//Theme Options
		if ( !floris_get_option('google_maps_key') == '' ){ wp_register_script( 'maps', 'https://maps.googleapis.com/maps/api/js?key='.floris_get_option('google_maps_key').'&callback=initMap', array( 'jquery' ), null, true ); }
		else { wp_register_script( 'maps', 'http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en', array( 'jquery' ), null, true ); }		
		if ( floris_get_option('custom_js') ){ wp_add_inline_script( 'all', floris_get_option('custom_js')); }

		//photoswipe
		if( is_singular( 'product' ) ){
			wp_enqueue_script( 'photoswipe_min', FLORIS_THEME_DIRURI . 'assets/js/photoswipe.min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'photoswipe_ui', FLORIS_THEME_DIRURI . 'assets/js/photoswipe-ui-default.min.js', array( 'jquery' ), null, true );
			wp_enqueue_style( 'default_skin', FLORIS_THEME_DIRURI . 'assets/css/default-skin.css', '', null );
			wp_enqueue_style( 'photoswipe', FLORIS_THEME_DIRURI . 'assets/css/photoswipe.css', '', null );
		}

		// Styles
		wp_enqueue_style( 'bootstrap_min', FLORIS_THEME_DIRURI . 'assets/css/bootstrap.min.css', '', null );
		wp_enqueue_style( 'swiper_min', FLORIS_THEME_DIRURI . 'assets/css/swiper.min.css', '', null );
		wp_enqueue_style( 'idangerous_swiper', FLORIS_THEME_DIRURI . 'assets/css/idangerous.swiper.css', '', null );
		wp_enqueue_style( 'fontello', FLORIS_THEME_DIRURI . 'assets/css/fontello.css', '', null );
		wp_enqueue_style( 'main', FLORIS_THEME_DIRURI . 'assets/css/main.css', '', null );		
		wp_enqueue_style( 'style', FLORIS_THEME_DIRURI . 'assets/css/style.css', '', null );
		wp_enqueue_style( 'loaders', FLORIS_THEME_DIRURI . 'assets/css/loaders.min.css', '', null );
		wp_enqueue_style( 'likes', FLORIS_THEME_DIRURI . 'assets/css/simple-likes-public.css', '', null );
		wp_enqueue_style( 'font-awesome', FLORIS_THEME_DIRURI . 'assets/css/font-awesome.min.css', '', null );
		wp_enqueue_style( 'variation-select', FLORIS_THEME_DIRURI . 'assets/css/variation-select.css', '', null );
		wp_enqueue_style( 'wp-style', get_stylesheet_uri(), '', null );
		if ( floris_get_option('custom_css') ){			
			wp_add_inline_style( 'style', floris_get_option('custom_css'));
		}
		// Fonts
		wp_enqueue_style( 'fonts', floris_g_fonts(), array(), null );
	}
	add_action( 'wp_enqueue_scripts', 'floris_load_scripts');
}
if ( ! function_exists( 'floris_load_preloader_script' ) ) {
	function floris_load_preloader_script() {
		wp_enqueue_script( 'preloader', FLORIS_THEME_DIRURI . 'assets/js/preloader.js', array( 'jquery' ), null, true );
	}
	add_action( 'wp_enqueue_scripts', 'floris_load_preloader_script', 0 );
}

if ( ! function_exists( 'floris_g_fonts' ) ) {
	function floris_g_fonts() {
		$font_url = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'floris' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Josefin Sans:400,700italic,600italic,600,400italic,700|Montserrat:400,700|Libre Baskerville:400,400italic,700|Open Sans:400,600,700,300,800' ), "//fonts.googleapis.com/css" );
		}

		return $font_url;
	}
}

//Pagination
function floris_post_pagination( $atts = NULL ) {
	$show_numbers = true;
	if ( ! $show_numbers ) {
		?>
			<div class="classic-pagination clearfix">
				<div class="fl">
					<?php previous_posts_link(); ?>
					&nbsp;
				</div>
				<div class="fr">
					&nbsp;
					<?php next_posts_link(); ?>
				</div>
			</div>
		<?php
	} else {
		global $paged;
		if ( ! isset( $atts['force_number'] ) ) $force_number = false; else $force_number = $atts['force_number'];
		if ( ! isset( $atts['pages'] ) ) $pages = false; else $pages = $atts['pages'];
		$range = 2;
		$showitems = ($range * 2)+1;
		if ( empty ( $paged ) ) { $paged = 1; }
		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if( ! $pages ) {
				$pages = 1;
			}
		}
		if( 1 != $pages ) {
			?>
			<div class="page-pagination">
				<ul class="clearfix">
					<?php
						if($paged > 2 && $paged > $range+1 && $showitems < $pages) { print wp_kses_post( "<li class='inactive'><a class='num-type far-prev' href='".get_pagenum_link(1)."'></a></li>" ); }
						if($paged > 1 && $showitems < $pages) { print wp_kses_post( "<li class='inactive'><a class='num-type prev' href='".get_pagenum_link($paged - 1)."' ></a></li>" ); }
						for ($i=1; $i <= $pages; $i++){
							if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)){
								print wp_kses_post(  ($paged == $i)? "<li class='active'><a class='active num-type' href='".get_pagenum_link($i)."'>".$i."</a></li>":"<li class='inactive'><a class='num-type inactive' href='".get_pagenum_link($i)."'>".$i."</a></li>" );
							}
						}
						if ($paged < $pages && $showitems < $pages) { print wp_kses_post( "<li class='inactive'><a class='num-type next' href='".get_pagenum_link($paged + 1)."'></a></li>" ); }
						if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) { print wp_kses_post( "<li class='inactive'><a class='num-type far-next'  href='".get_pagenum_link($pages)."'></a></li>" ); }
					?>
				</ul>
			</div>
			<?php
		}
	}
}