<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if( function_exists( 'floris_favicon_info' ) ){ floris_favicon_info(); }?>
	<?php if( function_exists( 'floris_open_graph' ) ){ floris_open_graph(); }; wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $menu_type = floris_get_option( 'header_layout');
    $burger_menu_type = floris_get_option( 'header-style', 'burger-menu' );
    $burger_menu = '';
    $opacity = 'opacity';
    $logo_class = 'hidden-mob align-scroll';
    $enable_border = floris_get_option('enable_border', 0);
    if($menu_type == '2'){ $logo_class = 'align-scroll';$opacity='';}
    if($burger_menu_type === 'no-bg'){
        $burger_menu = 'no-bg';
    }elseif($burger_menu_type === 'circle'){
        $burger_menu = 'circle';
    }
?>
    <?php if ( floris_get_option('enable_preload', 1) && floris_get_option('home_preload', 1) == false || floris_get_option('home_preload', 1) == true && is_front_page()){ ?>
        <div class="loading">
            <span class="loader_span">
                <span class="loader_right" style="background:<?php print esc_attr( floris_get_option('preload_color') ); ?>;"></span>
                <span class="loader_left" style="background:<?php print esc_attr( floris_get_option('preload_color') ); ?>;"></span>
            </span>  
        </div>
    <?php }        
        if( $enable_border ) { ?>
            <div class="border-top" style="background:<?php print esc_attr( floris_get_option('border_color') ); ?>"></div>
            <div class="border-bottom" style="background:<?php print esc_attr( floris_get_option('border_color') ); ?>"></div>
    <?php } ?>

<!-- HEADER -->
<?php 
    $header_style = 'style=left:0;right:0;top:0;';
    $classes = get_body_class();
    if (in_array('admin-bar',$classes)) {
        $header_style = 'style=left:0;right:0;top:32px;';
    }
    $mega_menu_position = floris_get_option('mega_menu_position');
    $header_elem = $head_elem = '';
    if( class_exists( 'WooCommerce' ) && is_shop()){
    	$page_id = get_option( 'woocommerce_shop_page_id' ); 
    }else{
    	$page_id = get_the_ID();
    }
    $header_elem = get_post_meta( $page_id, 'floris_meta_page_opt', true );
    if(isset($header_elem['_header_elem'])){ $head_elem = $header_elem['_header_elem'];}
?>
    <header class="header-style-1 <?php print wp_kses_post( ( floris_get_option('header_fixed') ? 'fixed' : '' ).' '.( $menu_type == '2' ? 'type-2' : '' ).' '.( $menu_type == '3' ? 'floris-mega-menu' : '' ).' '.( $mega_menu_position && $menu_type == '3' ? $mega_menu_position : '' ).' '.( $head_elem ? 'mega_menu_light' : '' ).' '.( $burger_menu ? $burger_menu : '' ).' '.( !floris_get_option('header_sticky') ? 'header_no_sticky' : '' ) ); ?>" <?php if(!$enable_border){ print esc_html( $header_style );} ?>>
        <?php if( $menu_type != 3 ){ ?>
            <div class="burger-menu <?php print esc_html( $burger_menu ); if($menu_type == '2'){ print wp_kses_post( ' type-2' );} ?>"><span></span></div>
        <?php 
            }
            if(floris_get_option('button-lang') == '1'){
                if( $head_elem ) {
                    print wp_kses_post( '<div class="lang_left"><div class="lang-light">' );
                        do_action('wpml_add_language_selector');
                    print wp_kses_post( '</div></div>' );
                } else {
                    print wp_kses_post( '<div class="lang_left">' );
                        do_action('wpml_add_language_selector');
                    print wp_kses_post( '</div>' );
                }
            }

            $page_logo = $header_logo = $pagelogo = $page_mobile_logo='';

            if( class_exists( 'WooCommerce' ) && is_shop()){
                $page_id = get_option( 'woocommerce_shop_page_id' ); 
            }else{
                $page_id = get_the_ID();
            }            
            $page_logo = get_post_meta( $page_id, 'floris_meta_page_opt', true );
            if(isset($page_logo['_header_logo'])){ $header_logo = $page_logo['_header_logo'];}
            if(isset($page_logo['_page_logo'])){ $pagelogo = $page_logo['_page_logo'];}
            if(isset($page_logo['_page_mobile_logo'])){ $page_mobile_logo = $page_logo['_page_mobile_logo'];}
            $logo_array = floris_get_option('logo');
            $logo_url = ( $logo_array['url'] ? $logo_array['url'] : get_template_directory_uri().'/images/logo.png' );
            $logo_mobile_array = floris_get_option('logo_mobile');
            $logo_mobile_url = ( $logo_mobile_array['url'] ? $logo_mobile_array['url'] : get_template_directory_uri().'/images/mobile_logo.png' );
            $result_link  = wp_get_attachment_url($pagelogo);
            $page_mobile_logo_link  = wp_get_attachment_url($page_mobile_logo);
            $logo_dimensions = floris_get_option('logo_dimensions');
            $fl_logo_width = $logo_dimensions['width'];
            $fl_logo_height = $logo_dimensions['height'];
            $logo_space = floris_get_option('logo_spaces');
            $logo_t_b = $logo_space['height'];
            $logo_l_r = $logo_space['width'];
            if( is_tax('product_cat') ){
                global $wp_query;
                $cat = $wp_query->get_queried_object();
                $cat_logo = get_term_meta( $cat->term_id, 'floris_custom_category_options', true );
                $cat_logo_link = $logo_url;
                $cat_logo_mobile_link = $logo_mobile_url;
                if(isset($cat_logo['cat_logo_mobile']) && $cat_logo['cat_logo_mobile']){ $cat_logo_mobile_link = wp_get_attachment_url($cat_logo['cat_logo_mobile']);}
                if(isset($cat_logo['cat_logo']) && $cat_logo['cat_logo']){ $cat_logo_link = wp_get_attachment_url($cat_logo['cat_logo']); }                
                print wp_kses_post( '
                    <a class="logo dark_logo '.( $menu_type == 3 ? 'logo_left' : $logo_class ).' '.$opacity.'" href="'.esc_url(home_url( '/' )).'">
                        '.( $cat_logo_mobile_link ? '<img class="logo_mobile theme_logo_mobile" src="'.esc_url( $cat_logo_mobile_link ).'" alt="" '.( !empty($fl_logo_width) || !empty($fl_logo_height ) || !empty($logo_t_b) || !empty($logo_l_r )  ? 'style="width:'.$fl_logo_width.';height:'.$fl_logo_height.'; margin-top:'.$logo_t_b.'; margin-bottom:'.$logo_t_b.'; margin-left:'.$logo_l_r.'; margin-right:'.$logo_l_r.';"' : '') .'>' : '' ).'
                        <img class="theme_logo_light" src="'.esc_url( $cat_logo_link ).'" alt="" '.( !empty($fl_logo_width) || !empty($fl_logo_height ) || !empty($logo_t_b) || !empty($logo_l_r )  ? 'style="width:'.$fl_logo_width.';height:'.$fl_logo_height.'; margin-top:'.$logo_t_b.'; margin-bottom:'.$logo_t_b.'; margin-left:'.$logo_l_r.'; margin-right:'.$logo_l_r.';"' : '') .'>
                        <img class="theme_logo_scroll" src="'.esc_url( $logo_url ).'" alt="" '.( !empty($fl_logo_width) || !empty($fl_logo_height ) || !empty($logo_t_b) || !empty($logo_l_r ) ? 'style="width:'.$fl_logo_width.';height:'.$fl_logo_height.'; margin-top:'.$logo_t_b.'; margin-bottom:'.$logo_t_b.'; margin-left:'.$logo_l_r.'; margin-right:'.$logo_l_r.';"' : '') .'>
                    </a>' );
            } else {
                if( $header_logo && $result_link) {
                    print wp_kses_post( '
                        <a class="logo light_logo '.( $menu_type == 3 ? 'logo_left' : $logo_class ).' '.$opacity.'" href="'.esc_url( home_url( '/' ) ).'">
                            '.( $page_mobile_logo_link ? '<img class="logo_mobile_light theme_logo_mobile_light" src="'.esc_url( $page_mobile_logo_link ).'" alt="" '.( !empty($fl_logo_width) || !empty($fl_logo_height ) || !empty($logo_t_b) || !empty($logo_l_r ) ? 'style="width:'.$fl_logo_width.';height:'.$fl_logo_height.'; margin-top:'.$logo_t_b.'; margin-bottom:'.$logo_t_b.'; margin-left:'.$logo_l_r.'; margin-right:'.$logo_l_r.';"' : '') .'>' : '' ).'
                            <img class="img_light theme_logo_light" src="'.esc_url( $result_link ).'" alt="" '.( !empty($fl_logo_width) || !empty($fl_logo_height ) || !empty($logo_t_b) || !empty($logo_l_r ) ? 'style="width:'.$fl_logo_width.';height:'.$fl_logo_height.'; margin-top:'.$logo_t_b.'; margin-bottom:'.$logo_t_b.'; margin-left:'.$logo_l_r.'; margin-right:'.$logo_l_r.';"' : '') .'>
                            <img class="theme_logo_scroll" src="'.esc_url( $result_link ).'" alt="" '.( !empty($fl_logo_width) || !empty($fl_logo_height ) || !empty($logo_t_b) || !empty($logo_l_r ) ? 'style="width:'.$fl_logo_width.';height:'.$fl_logo_height.'; margin-top:'.$logo_t_b.'; margin-bottom:'.$logo_t_b.'; margin-left:'.$logo_l_r.'; margin-right:'.$logo_l_r.';"' : '') .'>
                        </a>' );
                }else{
                    print wp_kses_post( '
                        <a class="logo dark_logo '.( $menu_type == 3 ? 'logo_left' : $logo_class ).' '.$opacity.'" href="'.esc_url(home_url( '/' )).'">
                            '.( $logo_mobile_url ? '<img class="logo_mobile theme_logo_mobile" src="'.esc_url( $logo_mobile_url ).'" alt="" '.( !empty($fl_logo_width) || !empty($fl_logo_height ) || !empty($logo_t_b) || !empty($logo_l_r ) ? 'style="width:'.$fl_logo_width.';height:'.$fl_logo_height.'; margin-top:'.$logo_t_b.'; margin-bottom:'.$logo_t_b.'; margin-left:'.$logo_l_r.'; margin-right:'.$logo_l_r.';"' : '') .'>' : '').'
                            <img class="theme_logo" src="'.esc_url( $logo_url ).'" alt="" '.( !empty($fl_logo_width) || !empty($fl_logo_height ) || !empty($logo_t_b) || !empty($logo_l_r ) ? 'style="width:'.$fl_logo_width.';height:'.$fl_logo_height.'; margin-top:'.$logo_t_b.'; margin-bottom:'.$logo_t_b.'; margin-left:'.$logo_l_r.'; margin-right:'.$logo_l_r.';"' : '') .'>
                        </a>' );
                }
            }
            if( $menu_type != 3 ){
        ?>
        <nav class="slide-menu" style="background:<?php print esc_attr( floris_get_option('menu_bg_color') ); ?>;">
            <div class="table-align">
                <div class="cell-view">
                    <div class="container-menu">
                        <?php
                            if( floris_get_option('enable_main_menu', 1) ){
                                $menu_class = 'list-menu main-type-2';
                                if($menu_type == '2'){$menu_class = 'list-menu';}
                                if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
                                    wp_nav_menu( array( 'theme_location' => 'primary-menu',
                                                        'container'      => 'ul',
                                                        'menu_class'     => $menu_class,
                                                        'sort_column'    => 'menu_order',
                                                        'link_before'    => '<span>',
                                                        'link_after'     => '</span>',
                                                        'depth'          => 3
                                    ) );
                                } else {
                                    print wp_kses_post( '<h4 class="h4 info">'.esc_html__( 'Please assign primary menu in Appearance->Menus', 'floris' ).'</h4>' );
                                }
                            }
                        ?>
                    </div> 
                </div>
                <?php
                    if($menu_type == '2'){
                    }else{
                        if( floris_get_option('header_left', 1) ) {
                            print wp_kses_post( '<div class="menu-copy"><span>'.floris_get_option('header_left_text').'</span></div>' );
                        }
                    }
                    if( floris_get_option('header_social', 1) ) { ?>
                        <div class="menu-folow share-link">
                            <?php 
                                $social = floris_get_option('soc-slides');
                                if( ! empty( $social) ) {
                                foreach ( $social as $val )
                                    if($val['url'] && $val["description"]) {
                                        print wp_kses_post( '<a href="'.$val["url"].'" target="_blank"><i class="'.$val["description"].'"></i><i class="'.$val["description"].'"></i></a>' );
                                    }
                            } ?>
                        </div>
                    <?php } ?>
            </div> 
        </nav>
        <?php } elseif ( $menu_type == 3 && floris_get_option('enable_main_menu') ) {
            $megamenu_active = is_plugin_active('megamenu/megamenu.php');
            if( $megamenu_active ){
                $settings = get_option( 'megamenu_settings' );
                if( isset( $settings['mega-menu']['enabled'] ) ){
                    if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'mega-menu' ) ) {
                        wp_nav_menu( array( 'theme_location' => 'mega-menu',
                                    'container'      => 'ul',
                                    'menu_class'     => 'menu_mega',
                                    'depth'          => 3
                        ) );
                    } else {
                        print wp_kses_post( '<h4 class="h4 mega-menu-info">'.esc_html__( 'Please assign primary menu in Appearance->Menus', 'floris' ).'</h4>' );
                    }
                } else {
                    print wp_kses_post( '<h4 class="h4 mega-menu-info">'.esc_html__( 'Enable Max Mega Menu in Appearance->Menus->Max Mega Menu Settings', 'floris' ).'</h4>' );
                }
            } else {
                print wp_kses_post( '<h4 class="h4 mega-menu-info">'.esc_html__( 'Max Mega Menu Plugin not Activated!', 'floris' ).'</h4>' );
            }
        } ?>
            <div class="menu-icon <?php print wp_kses_post( ( is_plugin_active('sitepress-multilingual-cms/sitepress.php') && floris_get_option('button-lang') == '1' ? 'menu-icon-lang' : '' ) ); ?>">
                <?php 
                    if(floris_get_option('button-lang') == '1'){
                        if( $head_elem ) {
                            print wp_kses_post( '<div class="lang-light">' );
                            do_action('wpml_add_language_selector');
                            print wp_kses_post( '</div>' );
                        } else {
                            do_action('wpml_add_language_selector');
                        }
                    }                    
                    $floris_active = is_plugin_active('floris-plugin/floris-plugin.php');
                    $woo_active = is_plugin_active('woocommerce/woocommerce.php');                    
                    if( floris_get_option('header_search', 1) ) {
                        $woo_class = 'woo_not';
                        if($woo_active && $floris_active){$woo_class = '';}
                        if( $head_elem) {
                            print wp_kses_post( '<a href="#" class="search-menu hover-light '.$woo_class.'"><i class="icon-search-new"></i></a>' );
                        } else{
                            print wp_kses_post( '<a href="#" class="search-menu hover-icon '.$woo_class.'"><i class="icon-search-new"></i></a>' );
                        }
                    }
                    if($woo_active && $floris_active){
                        $cart_contents_count = WC()->cart->get_cart_contents_count();
                        $multilingual = get_option('_wcml_settings');
                        $enable_multi_currency = $multilingual['enable_multi_currency'];
                        if( $head_elem) {?>
                            <a href="<?php print esc_url( wc_get_cart_url() ); ?>" class="shop-menu hover-light <?php print wp_kses_post( ( !$enable_multi_currency ? 'popup-open' : '' ) ); ?>" data-popup="popup-2"><i class="icon-basket"></i><?php if($cart_contents_count !== 0){ echo '<span class="cart_count cart_count_header">'.$cart_contents_count.'</span>'; }?></a>
                        <?php } else { ?>
                            <a href="<?php print esc_url( wc_get_cart_url() ); ?>" class="shop-menu hover-icon <?php print wp_kses_post( ( !$enable_multi_currency ? 'popup-open' : '' ) ); ?>" data-popup="popup-2"><i class="icon-basket"></i><?php if($cart_contents_count !== 0){ echo '<span class="cart_count cart_count_header">'.$cart_contents_count.'</span>'; }?></a>
                        <?php }
                    }
                ?>         
            </div>
            <?php if($menu_type == '2'){ print wp_kses_post( '<div class="layer-dark"></div>' );} ?>
            <?php get_template_part('searchform');?>
    </header>