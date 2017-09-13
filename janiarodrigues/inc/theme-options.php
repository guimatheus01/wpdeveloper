<?php
if ( ! defined( 'ABSPATH' ) ) exit;

//This file hooks the redux options panel. While Redux powered by TT FW plugin.
add_filter('redux/options/floris_opt/sections', 'floris_redux_options');
if ( ! function_exists( 'floris_redux_options' ) ) {
    function floris_redux_options( $sections ) {

    $sections = array();

    $sections[] = array(
        'title'  => esc_html__( 'General Settings', 'floris' ),
        'id'     => 'general',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id' => 'general-quickstart',
                'type'   => 'info',
                'style'  => 'info',
                'title' => esc_html__( 'Quick Start', 'floris' ),
            ),
            array(
                'id'    => 'favicon_info1',
                'type'  => 'media',
                'url'      => true,
                'readonly'    => false,
                'title' => esc_html__( 'Favicon Icon', 'floris' ),
            ),
            array(
                'id' => 'logo-settings',
                'type'   => 'info',
                'style'  => 'info',
                'title'            => esc_html__( 'Logo Settings', 'floris' ),
            ),
            array(
                'id' => 'logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Header Logo(Desktop)', 'floris' ),
                'readonly'    => false,
            ),
            array(
                'id' => 'logo_mobile',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Header Logo(Mobile)', 'floris' ),
                'readonly'    => false,
            ),
            array(
                'id'    => 'logo_dimensions',
                'type'     => 'dimensions',
                'units'    => 'px',
                'title'    => __('Logo dimensions (width/height)', 'floris'),
                'subtitle' => __('Add your own logo dimensions (width/height)', 'floris'),
            ),
            array(
                'id'    => 'logo_spaces',
                'type'     => 'dimensions',
                'units'    => 'px',
                'title'    => __('Logo space', 'floris'),
                'subtitle' => __('Add your own logo sapcing (margin-left && margin-right/margin-top && margin-bottom)', 'floris'),
            ),
            array(
                'id' => '404-options',
                'type'   => 'info',
                'style'  => 'info',
                'title'  => esc_html__( '404 Page', 'floris' ),
            ),
            array(
                'id' => 'foto_404',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Page foto', 'floris' ),
                'readonly'    => false,
            ),
            array(
                'id' => 'other-options',
                'type'   => 'info',
                'style'  => 'info',
                'title'  => esc_html__( 'Other settings', 'floris' ),
            ),
            array(
                'id'       => 'button-lang',
                'type'     => 'button_set',
                'title'    => esc_html__('Switch language', 'floris'),
                'options' => array(
                    '1' => 'Header', 
                    '2' => 'Footer', 
                    '3' => 'No', 
                 ), 
                'default' => '1'
            ),
            array(
                'id' => 'back_top',
                'type'     => 'switch',
                'title' => esc_html__('Enable Back To Top Button?' ,'floris'),
                'subtitle' => esc_html__( 'Do you want to enable back to top button?', 'floris' ),
                'default'  => true
            ),
        )
    );
//Layout
    $sections[] = array(
        'icon' => 'el el-website',
        'title' => esc_html__( 'Layout', 'floris' ),
        'id'               => 'lay-options',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id'       => 'button-set-blog',
                'type'     => 'button_set',
                'title'    => esc_html__('Archive Layout', 'floris'),
                'subtitle' => esc_html__('Default archive layout ( front page, category, tag, author, archive ).', 'floris'),
                'options' => array(
                    '1' => 'Left Sidebar', 
                    '2' => 'No Sidebar', 
                    '3' => 'Right Sidebar'
                 ), 
                'default' => '3'
            ),
            array(
                'id'       => 'button-set-single',
                'type'     => 'button_set',
                'title'    => esc_html__('Single Blog Layout', 'floris'),
                'subtitle' => esc_html__('Set your blog layout to display single blog post.', 'floris'),
                'options' => array(
                    '1' => 'Left Sidebar', 
                    '2' => 'No Sidebar', 
                    '3' => 'Right Sidebar'
                 ), 
                'default' => '3'
            ),
        )
    );
//Header Settings
    $sections[] = array(
        'icon' => 'dashicons dashicons-align-center',
        'title' => esc_html__( 'Header', 'floris' ),
        'id'               => 'layout-options',
        'customizer_width' => '400px',
        'fields'           => array(

            array(
                'id' => 'header_layout',
                'type'     => 'image_select',
                'title' => esc_html__( 'Menu', 'floris' ),
                'subtitle' => esc_html__( 'Select header layout. Note that naked headers are applicable to Pages only.', 'floris' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Default Header', 'floris'),
                        'img' => FLORIS_THEME_DIRURI. 'inc/images/hdr1.jpg',
                        'title' => esc_html__('Default Header.', 'floris')
                    ),
                    '2' => array(
                        'alt' => esc_html__('Naked Header', 'floris'),
                        'img' => FLORIS_THEME_DIRURI. 'inc/images/hdr2.jpg',
                        'title' => esc_html__('Left Header.', 'floris')
                    ),
                    '3' => array(
                        'alt' => esc_html__('Mega Menu Header', 'floris'),
                        'img' => FLORIS_THEME_DIRURI. 'inc/images/hdr3.jpg',
                        'title' => esc_html__('Mega Menu Header.', 'floris')
                    ),
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'mega_menu_position',
                'type'     => 'button_set',
                'title'    => esc_html__('Select Mega Menu navigation position', 'floris'),
                'options' => array(
                    'left' => 'Left', 
                    'center' => 'Center', 
                    'right' => 'Right'
                ), 
                'default' => 'center',
                'required' => array('header_layout', 'equals', array('3')),
            ),
            array(
                'id' => 'header-style',
                'type' => 'select',
                'title' => esc_html__('Menu button', 'floris'),
                'options' => array(
                    'burger-menu' => esc_html__('Style 1', 'floris'),
                    'no-bg' => esc_html__('Style 2', 'floris'),
                    'circle' => esc_html__('Style 3', 'floris')
                ),
                'default' => 'burger-menu'
            ),
            array(
                'id' => 'header_search',
                'type'     => 'switch',
                'title' => esc_html__('Search Button' ,'floris'),
                'subtitle' => esc_html__( 'Add or not the search button on the header.', 'floris' ),
                'default'  => true
            ),
            array(
                'id' => 'enable_main_menu',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Main Menu', 'floris' ),
                'subtitle' => esc_html__( 'Once enabled, please create and set menu as primary menu in Appearance -> Menus.', 'floris' ),
                'desc'   => esc_html__( 'If turned off, text options appear below.', 'floris' ),
                'default'  => true
            ),
            array(
                'id' => 'header_left',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Custom Header (Left)', 'floris' ),
                'subtitle' => esc_html__( 'Activate to add the custom text below to the theme header.', 'floris' ),
                'desc'   => esc_html__( 'If turned off, default text will appear.', 'floris' ),
                'default'  => true
            ),
            array(
                'id' => 'header_left_text',
                'type'     => 'textarea',
                'title' => esc_html__( 'Custom Text (Left)', 'floris' ),
                'subtitle' => esc_html__( 'Custom HTML and Text that will appear in the lower header of your theme.', 'floris' ),
                'validate' => 'html',
                'default'  => ''
            ),
            array(
                'id' => 'header_social',
                'type'     => 'switch',
                'title' => esc_html__('Enable social' ,'floris'),
                'subtitle' => esc_html__( 'Once enabled, please create and set Social / Contact Settings.', 'floris' ),
                'default'  => true
            ),
            array(
                'id'       => 'header_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Sticky Header', 'floris' ),
                'default'  => true
            ),
            array(
                'id'       => 'header_fixed',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Fixed Position', 'floris' ),
                'subtitle' => esc_html__( 'Check this option if you want to have a sticky header which remains visible at the top of the browser on scroll.', 'floris' ),
                'default'  => false,
                'required' => array('header_sticky', 'equals', array('1'))
            ),
            array(
                'id'        => 'header_beh_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Sticky header background color', 'floris' ),
                'required'  => array( array('header_fixed','equals','1'), array('header_sticky','equals','1'), ),
                'default'   => array(
                    'color' => '#fff',
                    'alpha' => 1
                ),
                'options'   => array(
                    'choose_text' => esc_html__( 'Choose', 'floris' ),
                    'cancel_text' => esc_html__( 'Cancel', 'floris' ),
                    'input_text'  => esc_html__( 'Select Color', 'floris' )
                ),
                'output'    => array( 'background-color'  => '#b69176' )
            )
        )
    );

//Footer Settings
    $sections[] = array(
        'icon' => 'el el-photo',
        'title' => esc_html__( 'Footer', 'floris' ),
        'id'               => 'footer-settings1',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id' => 'footer_social',
                'type'     => 'switch',
                'title' => esc_html__('Enable social' ,'floris'),
                'subtitle' => esc_html__( 'Once enabled, please create and set Social / Contact Settings.', 'floris' ),
                'default'  => true
            ),
            array(
                'id' => 'footer_menu',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Footer menu', 'floris' ),
                'subtitle' => esc_html__( 'Once enabled, please create and set menu as footer menu in Appearance -> Menus.', 'floris' ),
                'desc'   => esc_html__( 'If turned off, text options appear below.', 'floris' ),
                'default'  => true
            ),
            array(
                'id' => 'footer_right',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Custom Footer (Right)', 'floris' ),
                'subtitle' => esc_html__( 'Activate to add the custom text below to the theme footer.', 'floris' ),
                'desc'   => esc_html__( 'If turned off, default text will appear.', 'floris' ),
                'default'  => false
            ),
            array(
                'id' => 'footer_right_text',
                'type'     => 'textarea',
                'title' => esc_html__( 'Custom Text (Right)', 'floris' ),
                'subtitle' => esc_html__( 'Custom HTML and Text that will appear in the lower footer of your theme.', 'floris' ),
                'validate' => 'html',
                'default'  => ''
            ),
            array(
                'id' => 'footer-style',
                'type' => 'select',
                'title' => esc_html__('Footer Style', 'floris'),
                'options' => array(
                    '1' => esc_html__('Style 1', 'floris'),
                    '2' => esc_html__('Style 2', 'floris'),
                ),
                'required' => array('custom_footer', 'equals', array('0')),
                'default' => '1'
            ),
            array(
                'id' => 'custom_footer',
                'type'     => 'switch',
                'title' => esc_html__('Custom your footer style?' ,'floris'),
                'default'  => '0'
            ),
            array(
                'id' => 'background_footer',
                'type'     => 'background',
                'title' => esc_html__( 'Footer Background', 'floris' ),
                'required' => array('custom_footer', 'equals', array('1')),
                'default'  => array('background-color' => '#b69176', 'background-image' => '', 'background-repeat' => '', 'background-position' => '', 'background-size' => '', 'background-attachment' => '')
            ),
        )
    );
//Menu panel
    $sections[] = array(
        'icon' => 'el el-credit-card',
        'title' => esc_html__( 'Menu panel', 'floris' ),
        'id'               => 'menu-options',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id' => 'primary_menu',
                'type'     => 'typography',
                'title' => esc_html__( 'Main Menu Typography', 'floris' ),
                'google'      => true, 
                'font-backup' => true,
                'text-transform' => true,
                'subsets' => true,
                'output'      => array('.header-style-1 .slide-menu .container-menu .list-menu > li a, .header-style-1 .slide-menu .container-menu .list-menu > li a span'),
                'units'       =>'px',
                'desc' => esc_html__( 'Custom typography for main menu.', 'floris' ),
                'default'  => ''
            ),
            array(
                'id' => 'footer_menu1',
                'type'     => 'typography',
                'title' => esc_html__( 'Footer Menu Typography', 'floris' ),
                'google'      => true, 
                'font-backup' => true,
                'text-transform' => true,
                'subsets' => true,
                'output'      => array('#menu-footer-menu a'),
                'units'       =>'px',
                'desc' => esc_html__( 'Custom typography for footer menu.', 'floris' ),
                'default'  => ''
            ),
        )
    );
//Styling
    $sections[] = array(
        'icon' => 'el el-tint',
        'title' => esc_html__( 'Styling', 'floris' ),
        'id'               => 'styling-options',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id' => 'skins_color',
                'type'     => 'color',
                'title' => esc_html__( 'Color Skins', 'floris' ),
                'default'     => '#b69176',
                'validate'    => 'color',
                'output'   => array(
                    'color'             => '#mega-menu-wrap-mega-menu #mega-menu-mega-menu > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link:hover, #mega-menu-wrap-mega-menu #mega-menu-mega-menu > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link:focus, #mega-menu-wrap-mega-menu #mega-menu-mega-menu > li.mega-menu-item > a.mega-menu-link:hover, #mega-menu-wrap-mega-menu #mega-menu-mega-menu > li.mega-menu-item > a.mega-menu-link:focus, .menu-icon a.hover-light:hover:after, .menu-icon a.hover-icon:hover:after, .woocommerce div.product form.cart .group-button:hover,.sale-desc .group_table a:hover,.guaven_woos_titlediv:hover,.guaven_woos_suggestion_listproduct_cat:hover,.woocommerce form.lost_reset_password input[type=submit]:hover, .woocommerce form.login input[type=submit]:hover, .woocommerce-MyAccount-content a:hover, .shop_table.order_details a:hover, #payment a:hover, .login a:hover, .sidebar-shop-wrapper .widget.widget_recently_viewed_products a span:hover, .sidebar-shop-wrapper .widget.widget_top_rated_products a span:hover, .sidebar-shop-wrapper .widget_price_filter .price_slider_amount button:hover, .sidebar-shop-wrapper .widget_product_search input[type="submit"]:hover, .sidebar-shop-wrapper .widget.widget_products a span:hover, .sidebar-shop-wrapper .widget li a:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce-message a:hover,.share-link a i:nth-child(2), .desc .h4 a:hover, .variations .reset_variations:hover, .checkout-page-one-column .product-name a:hover, .checkout-showcoupon-page a:hover, .woocommerce form.checkout_coupon input[type="submit"]:hover, #payment.woocommerce-checkout-payment input[type="submit"]:hover, .checkout-page-two-columns .checkout-product-name a:hover, .button-style:hover, .cart-page-one-column .shop_table.cart .product-name a:hover, .woocommerce-remove-coupon,.woocommerce-remove-coupon:hover, .actions a:hover, .cart-page-two-columns .shop_table.cart .product-details a:hover, .counter .rs-fl-number:hover, .rs-count-block:hover, .popular-posts .wpp-post-title:hover, .widget_popularpost .wpp-post-title:hover, .coll-item .title a:hover, #btt, .btn-quickview:hover:before, .woocommerce a.button.button-style.braun:hover, .button-style.braun:hover, .woocommerce input.button:hover, .widget_categories li a:hover, .widget li a:hover, .popular-posts .wpp-post-title:hover, .blog-container .blog-item a:hover, .blog-container .blog-item a:hover i, .single-share li a:hover, .related-block a:hover, footer .share-link i:after, .footer-nav li a:hover, .reply a:hover, .main-caption .h2:hover a, .item-title .h4:hover, .list-slide li a:hover, .list-slide li a.act, .woocommerce .woocommerce-breadcrumb a:hover, .fasion-item .title a:hover, .coll-item.col-50 .title .h3 a:hover, .blog-item a:hover, .contact-box a:hover, .accordion-title.active, .accordion-title:hover, .check-item .text .h5 a:hover, .woocommerce-MyAccount-navigation li.is-active a, .woocommerce-MyAccount-navigation li a:hover, .woocommerce table.my_account_orders .order-actions .button:hover, .category-item.type-2 .sub-title span, .category-item.type-2 .h4:hover a, .menu-folow i:after, .fasion-item .title a:hover, .fasion-caption .title .h3 a:hover, a.search-menu i, a.shop-menu i',
                    'background-color'  => '#lang_sel a.lang_sel_sel:hover,#lang_sel li ul a:hover,.woocommerce div.product form.cart .group-button,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .sidebar-shop-wrapper .widget_price_filter .price_slider_amount button, .sidebar-shop-wrapper .widget_product_tag_cloud a:hover, .sidebar-shop-wrapper .widget_product_search input[type="submit"], .select2-results .select2-highlighted, .actions a, .woocommerce #review_form #respond .form-submit input:hover, #commentform.comment-form .form-submit input:hover, .new.sale, .border-top, .border-bottom, .loader_right, .loader_left, .header-style-1.type-2 .slide-menu, #btt:hover, .woocommerce a.button.button-style.braun, .button-style.braun, .pages a:hover, .pages a.active, .prev-page:hover, .next-page:hover, .button-style-2:before, .button-style-2:after, .loader-wrapper .loader-inner > div, .woocommerce input.button, .tag-list li a:hover, .wp-tag-cloud li a:hover, .swiper-pagination-bullet-active.swiper-pagination-bullet:after, .swiper-pagination-bullet:hover:after, .button-style-3:hover, .button-style-3:focus, .team-social, .accordion-title:before, .accordion-title:after, .woocommerce table.my_account_orders .order-actions .button, .button-style, .send-button:before, .yikes-easy-mc-submit-button:before, .btn-primary.focus, .btn-primary:focus',
                    'border-color'      => '.woocommerce div.product form.cart .group-button,.woocommerce form.lost_reset_password input[type=submit], .woocommerce form.login input[type=submit], .sidebar-shop-wrapper .widget_price_filter .price_slider_amount button, .sidebar-shop-wrapper .widget_product_tag_cloud a, .sidebar-shop-wrapper .widget_product_search input[type="submit"], .woocommerce form.checkout_coupon input[type="submit"], #payment.woocommerce-checkout-payment input[type="submit"], .actions a, .counter .rs-fl-number:hover, .rs-count-block:hover, #commentform.comment-form .form-submit input, .new.sale, #btt, .button-style-2.border, .woocommerce input.button, .woocommerce a.button.button-style.braun:hover, .special-style h1, .special-style h2, .special-style h3, .special-style h4, .special-style h5, .special-style h6, .woocommerce table.my_account_orders .order-actions .button, .check-pay .button-style, .button-style, .send-button, .yikes-easy-mc-form .yikes-easy-mc-submit-button, .btn-primary.focus, .btn-primary:focus',
                )
            ),
            array(
                'id' => 'enable_preload',
                'type'     => 'switch',
                'title' => esc_html__( 'Show Preloader', 'floris' ),
                'desc' => esc_html__( 'Show preloader?', 'floris' ),
                'default'  => '1'
            ), 
            array(
                'id' => 'preload_color',
                'type'     => 'color',
                'title' => esc_html__( 'Preloader color', 'floris' ),
                'required' => array('enable_preload', 'equals', array('1')),
                'default'     => '#b69176',
                'transparent' => true,
                'validate'    => 'color',
            ),
            array(
                'id' => 'home_preload',
                'type'     => 'switch',
                'title' => esc_html__( 'Show Preloader only on Home', 'floris' ),
                'desc' => esc_html__( 'Show preloader only on Home?', 'floris' ),
                'default'  => '0'
            ),
            array(
                'id' => 'enable_border',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Border', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'border_color',
                'type'     => 'color',
                'title' => esc_html__( 'Border color', 'floris' ),
                'required' => array('enable_border', 'equals', array('1')),
                'default'     => '#b69176',
                'transparent' => true,
                'validate'    => 'color',
            ),
            array(
                'id' => 'menu_bg_color',
                'type'     => 'color',
                'title' => esc_html__( 'Menu background color', 'floris' ),
                'default'     => '#f7ebeb',
                'transparent' => true,
                'validate'    => 'color',
            ),
        )
    );
//Typography
    $sections[] = array(
        'icon' => 'el el-font',
        'title' => esc_html__( 'Typography', 'floris' ),
        'id'               => 'typog-options',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id' => 'typ_body',
                'type'     => 'typography',
                'title' => esc_html__( 'Body', 'floris' ),
                'subtitle' => esc_html__( 'Select custom font for your main body text.', 'floris' ),
                'google'      => true, 
                'font-backup' => true,
                'subsets' => true,
                'text-transform' => false,
                'output'      => array('body *, .sub-title span, .second-caption .simple-text p, .main-caption .h2, .images-block-title p, .yikes-mailchimp-container .yikes-easy-mc-form input, .second-caption.style-2 .title, .second-caption.style-2 .simple-text p, .fasion-caption .title .sub-title, .font-fam-1, .font-fam-2, .blog-item .simple-text p, .prev-page, .next-page, .pages a, .pages span, .h5, .wpb_text_column h5, .font-fam-3, .desc .title, .desc .h4, .panel.entry-content h2, .panel.entry-content h3, form.checkout h3, .woocommerce form.checkout .payment_method_cod label, .cart-empty, .my-account h2, .woocommerce #review_form #respond .form-submit input, .category-item.type-2 .sub-title span, .popup-wraper .simple-text a, .blog-container .blog-item a, .widget h4, .widget li, .widget li a, .widget li span, .popular-posts .wpp-post-title, .widget_popularpost .wpp-post-title, .popular-posts .wpp-date, .widget_popularpost .wpp-date, .single-post-data, .single-box p, .single-box > ul li, .special-style h1, .special-style h2, .special-style h3, .special-style h4, .special-style h5, .special-style h6, .single-box .special-style ul li, ol li, .info-part h4, .tag-list li a, .comment-date, .comment-title, .comment-form input, .comment-form textarea, .related-block a, .related-block span, .about-title, .about-info p, .team-name, .position, .contact-box h3, .contact-box p, .contact-box a, .accordion-title, .accordion-content, .woocommerce form.checkout label, .woocommerce form .form-row label, .woocommerce input.button, .button.wc-forward, .to-search-item .item-title .sub-content, .actions a, .woocommerce a.button.button-style.braun, .sidebar-shop-wrapper .widget h4, .sidebar-shop-wrapper .widget_product_tag_cloud a, .guaven_woos_titlediv'),
                'units'       =>'px',
                'default'  => ''
            ),
            // array(
            //     'id'        => 'opt-multi-media',
            //     'type'      => 'multi_media',
            //     'title'     => 'Multi Media Selector',
            //     'subtitle'  => 'Multi file media selector',
            //     'labels'    => array(
            //         'upload_file'       => __('Select File(s)', 'floris'),
            //         'remove_image'      => __('Remove Image', 'floris'),
            //         'remove_file'       => __('Remove', 'floris'),
            //         'file'              => __('File: ', 'floris'),
            //         'download'          => __('Download', 'floris'),
            //         'title'             => __('Multi Media Selector', 'floris'),
            //         'button'            => __('Add or Upload File','floris')
            //     ),
            //     'library_filter'  => array('ttf','otf','woff'),
            //     'max_file_upload' => 5
            // ),
            array(
                'id' => 'typ_h1',
                'type'     => 'typography',
                'title' => esc_html__( 'Heading 1', 'floris' ),
                'google'      => true, 
                'font-backup' => true,
                'subsets' => true,
                'text-transform' => true,
                'output'      => array('h1, h1.h1, h1.h2, h1.h3, h1.h4, h1.h5, h1.h6, .wpb_text_column h1, h1 a, h1.h1 a, h1.h1.style-1, h1.h1.style-2, h1.h1.style-3, h1.h1.style-4, .widget h1, .special-style h1, .info-part h1, .main-caption .h2, .category-baner .title .h1, .category-baner .title.col-white .h1, .h1.style-2'),
                'units'       =>'px',
                'default'  => ''
            ),
            array(
                'id' => 'typ_h2',
                'type'     => 'typography',
                'title' => esc_html__( 'Heading 2', 'floris' ),
                'google'      => true, 
                'font-backup' => true,
                'subsets' => true,
                'text-transform' => true,
                'output'      => array('h2, h2.h1, h2.h2, h2.h3, h2.h4, h2.h5, h2.h6, .wpb_text_column h2, h2 a, h2.h1 a, h2.h2.style-1, h2.h2.style-2, h2.h2.style-3, h2.h2.style-4, .widget h2, .special-style h2, .info-part h2, h2.h1.style-2, .asseccories-baner h2.h1, .title.about-banner h2.h1, .cart-page-two-columns .cart_totals > h2'),
                'units'       =>'px',
                'default'  => ''
            ),
            array(
                'id' => 'typ_h3',
                'type'     => 'typography',
                'title' => esc_html__( 'Heading 3', 'floris' ),
                'google'      => true, 
                'font-backup' => true,
                'subsets' => true,
                'text-transform' => true,
                'output'      => array('h3, h3.h1, h3.h2, h3.h3, h3.h4, h3.h5, h3.h6, .wpb_text_column h3, h3 a, h3.h1 a, h3.style-1, h3.style-2, h3.style-3, h3.style-4, .widget h3, .special-style h3, .info-part h3, .second-caption h3.title, .images-block-title h3.title, .second-caption.style-2 h3.title, .fasion-caption .title h3.h3, .video-title h3.h3, .comment-block h3.title, .related-box h3 a, h3.about-title, h3.team-name, .contact-box h3, form.checkout h3, #customer_details h3'),
                'units'       =>'px',
                'default'  => ''
            ),
            array(
                'id' => 'typ_h4',
                'type'     => 'typography',
                'title' => esc_html__( 'Heading 4', 'floris' ),
                'google'      => true, 
                'font-backup' => true,
                'subsets' => true,
                'text-transform' => true,
                'output'      => array('h4, h4.h1, h4.h2, h4.h3, h4.h4, h4.h5, h4.h6, .wpb_text_column h4, h4 a, h4.style-1, h4.style-2, h4.style-3, h4.style-4, .item-title .h4, .widget h4, .special-style h4, .info-part h4, .sidebar-shop-wrapper .widget h4'),
                'units'       =>'px',
                'default'  => ''
            ),
            array(
                'id' => 'typ_h5',
                'type'     => 'typography',
                'title' => esc_html__( 'Heading 5', 'floris' ),
                'google'      => true, 
                'font-backup' => true,
                'subsets' => true,
                'text-transform' => true,
                'output'      => array('h5, h5.h1, h5.h2, h5.h3, h5.h4, h5.h5, h5.h6, .wpb_text_column h5, h5 a, h5.style-1, h5.style-2, h5.style-3, h5.style-4, .widget h5, .special-style h5, .info-part h5, .check-wrap h5.title, .check-item .text h5.h5'),
                'units'       =>'px',
                'default'  => ''
            ),
            array(
                'id' => 'typ_h6',
                'type'     => 'typography',
                'title' => esc_html__( 'Heading 6', 'floris' ),
                'google'      => true, 
                'font-backup' => true,
                'subsets' => true,
                'text-transform' => true,
                'output'      => array('h6, h6.h1, h6.h2, h6.h3, h6.h4, h6.h5, h6.h6, .wpb_text_column h6, h6 a, h6.style-1, h6.style-2, h6.style-3, h6.style-4, .widget h6, .special-style h6, .info-part h6, .contact-form h6.title'),
                'units'       =>'px',
                'default'  => ''
            )
        )
    );
//Blog Settings
    $sections[] = array(
        'icon' => 'dashicons dashicons-edit',
        'title' => esc_html__( 'Blog', 'floris' ),
        'id'               => 'blog-options',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id' => 'blog-info',
                'type'   => 'info',
                'style'  => 'info',
                'title'            => esc_html__( 'Blog Page', 'floris' ),
            ),
            array(
                'id' => 'post_title',
                'type'     => 'switch',
                'title' => esc_html__('Enable Blog post title' ,'floris'),
                'subtitle' => esc_html__( 'Do you want to enable blog post title?', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'post_author',
                'type'     => 'switch',
                'title' => esc_html__('Show Author' ,'floris'),
                'desc' => esc_html__( 'Show author on blog?', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'post_cat',
                'type'     => 'switch',
                'title' => esc_html__('Show Category' ,'floris'),
                'desc' => esc_html__( 'Show category on blog?', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'post_date',
                'type'     => 'switch',
                'title' => esc_html__('Show Date' ,'floris'),
                'desc' => esc_html__( 'Show date on blog?', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'post_comments',
                'type'     => 'switch',
                'title' => esc_html__('Show Comments' ,'floris'),
                'desc' => esc_html__( 'Show Comments blog?', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'post_like',
                'type'     => 'switch',
                'title' => esc_html__('Show Like' ,'floris'),
                'desc' => esc_html__( 'Show Like blog?', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'post_excerpt',
                'type'     => 'switch',
                'title' => esc_html__('Show the excerpt' ,'floris'),
                'desc' => esc_html__( 'Show excerpt blog?', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'post_subscribe',
                'type'     => 'switch',
                'title' => esc_html__('Show subscribe' ,'floris'),
                'desc' => esc_html__( 'Show subscribe blog?', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'mailchimp_ID',
                'type'     => 'text',
                'title' => esc_html__( 'MailChimp ID Form', 'floris' ),
                'required' => array('post_subscribe', 'equals', array('1')),
                'default'  => '',
            ),  
            array(
                'id' => 'mailchimp_title',
                'type'     => 'switch',
                'title' => esc_html__( 'Block title', 'floris' ),
                'required' => array('post_subscribe', 'equals', array('1')),
                'default'  => '1',
            ),
            array(
                'id' => 'mailchimp_title2',
                'type'     => 'switch',
                'title' => esc_html__( 'Block subtitle', 'floris' ),
                'required' => array('post_subscribe', 'equals', array('1')),
                'default'  => '1',
            ),
            array(
                'id' => 'mailchimp_button',
                'type'     => 'text',
                'title' => esc_html__( 'Text on button', 'floris' ),
                'subtitle' => esc_html__( 'Add text to button in subscribe block.', 'floris' ),
                'required' => array('post_subscribe', 'equals', array('1')),
                'default'  => '',
            ),                     
            array(
                'id' => 'single-info',
                'type'   => 'info',
                'style'  => 'info',
                'title'            => esc_html__( 'Single page posts', 'floris' ),
            ),
            array(
                'id' => 'post_image',
                'type'     => 'switch',
                'title' => esc_html__('Show Featured Image' ,'floris'),
                'desc' => esc_html__( 'Show featured image on single blog post?', 'floris' ),
                'default'  => '1'
            ),
            array(
                'id' => 'post_tag',
                'type'     => 'switch',
                'title' => esc_html__('Show Tags post' ,'floris'),
                'default'  => '1'
            ),            
            array(
                'id' => 'post_share',
                'type'     => 'switch',
                'title' => esc_html__('Show Share post' ,'floris'),
                'default'  => '1'
            ),
            array(
                'id' => 'post_share_fb',
                'type'     => 'text',
                'title' => esc_html__( 'Facebook', 'floris' ),
                'required' => array('post_share', 'equals', array('1')),
                'default'  => 'http://www.facebook.com',
            ),
            array(
                'id' => 'post_share_tw',
                'type'     => 'text',
                'title' => esc_html__( 'Twitter', 'floris' ),
                'required' => array('post_share', 'equals', array('1')),
                'default'  => 'http://twitter.com',
            ),            
            array(
                'id' => 'post_share_g',
                'type'     => 'text',
                'title' => esc_html__( 'Google+', 'floris' ),
                'required' => array('post_share', 'equals', array('1')),
                'default'  => 'https://plus.google.com',
            ),            
            array(
                'id' => 'post_share_p',
                'type'     => 'text',
                'title' => esc_html__( 'Pinterest', 'floris' ),
                'required' => array('post_share', 'equals', array('1')),
                'default'  => 'http://pinterest.com',
            ),
            array(
                'id' => 'post_related',
                'type'     => 'switch',
                'title' => esc_html__('Show Related Posts' ,'floris'),
                'default'  => '1'
            ),
        )
    );
//WooCommerce
    $sections[] = array(
        'icon' => 'dashicons dashicons-cart',
        'title' => esc_html__( 'WooCommerce', 'floris' ),
        'id'               => 'woo-settings',
        'customizer_width' => '450px',
    );
    $sections[] = array(
        'icon' => 'dashicons dashicons-cart',
        'title' => esc_html__( 'Shop', 'floris' ),
        'id'               => 'shop-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id' => 'general-woo-page',
                'type'   => 'info',
                'style'  => 'info',
                'title' => esc_html__( 'Shop, Category Pages', 'floris' ),
            ),
            array(
                'id'       => 'woo_sidebar',
                'type'     => 'button_set',
                'title'    => esc_html__('Shop, Category Pages Layout', 'floris'),
                'options' => array(
                    '1' => 'Left Sidebar', 
                    '2' => 'No Sidebar', 
                    '3' => 'Right Sidebar'
                 ), 
                'default' => '2'
            ),
            array(
                'id' => 'woo_products',
                'type'     => 'image_select',
                'title' => esc_html__( 'WooCommerce Shop Areas', 'floris' ),
                'subtitle' => esc_html__( 'Select how many areas you want to display.', 'floris' ),
                'options'  => array(
                    '1' => array('img' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-1.png'),
                    '2' => array('img' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-2.png'),
                    '3' => array('img' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-3.png'),
                    '4' => array('img' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-4.png'),
                ),
                'default'  => '4'
            ),
            array(
                'id' => 'product_button',
                'type'     => 'switch',
                'title' => esc_html__('Show Read More/Add to Cart button' ,'floris'),
                'default'  => '0'
            ),
            array(
                'id' => 'prod_quickview_btn',
                'type' => 'switch',
                'title' => esc_html__('Show Quickview Button' ,'floris'),
                'default'  => '1'
            ),
            array(
                'id' => 'prod_shop_backside',
                'type' => 'switch',
                'title' => esc_html__('Backside Product' ,'floris'),
                'default'  => '0'
            ),
            array(
                'id'       => 'prod_per_page',
                'type'     => 'text',
                'title'    => esc_html__( 'Products per page', 'floris' ),
                'default'  => '10',
            ), 
            array(
                'id' => 'general-cart-page',
                'type'   => 'info',
                'style'  => 'info',
                'title' => esc_html__( 'WooCommerce Cart', 'floris' ),
            ),
            array(
                'id' => 'cart_page',
                'type'     => 'image_select',
                'title' => esc_html__( 'WooCommerce Cart Areas', 'floris' ),
                'subtitle' => esc_html__( 'Select how many areas you want to display.', 'floris' ),
                'options'  => array(
                    '1' => array('img' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-1.png'),
                    '2' => array('img' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-2.png'),
                ),
                'default'  => '2'
            ),
            array(
                'id' => 'general-checkout-page',
                'type'   => 'info',
                'style'  => 'info',
                'title' => esc_html__( 'WooCommerce Checkout', 'floris' ),
            ),
            array(
                'id' => 'checkout_page',
                'type'     => 'image_select',
                'title' => esc_html__( 'WooCommerce Checkout Areas', 'floris' ),
                'subtitle' => esc_html__( 'Select how many areas you want to display.', 'floris' ),
                'options'  => array(
                    '1' => array('img' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-1.png'),
                    '2' => array('img' => FLORIS_THEME_DIRURI .'inc/images/footer-widgets-2.png'),
                ),
                'default'  => '2'
            ),
        )
    );
    $sections[] = array(
        'icon' => 'dashicons dashicons-cart',
        'title' => esc_html__( 'Single Product', 'floris' ),
        'id'               => 'single-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id' => 'product_reviews',
                'type'     => 'switch',
                'title' => esc_html__('Enable Reviews' ,'floris'),
                'default'  => '0'
            ),
            array(
                'id' => 'products_sku',
                'type'     => 'switch',
                'title' => esc_html__('Enable SKU' ,'floris'),
                'default'  => '1'
            ),
            array(
                'id' => 'products_category',
                'type'     => 'switch',
                'title' => esc_html__('Enable Category' ,'floris'),
                'default'  => '1'
            ),
            array(
                'id' => 'products_tag',
                'type'     => 'switch',
                'title' => esc_html__('Enable Tag' ,'floris'),
                'default'  => '1'
            ),
            array(
                'id' => 'glob_product_bg_color',
                'type' => 'color',
                'validate' => 'color',
                'title' => esc_html__( 'Product background color', 'floris' ),
                'default' => '',
            ),
            array(
                'id' => 'glob_thumb_bg_color',
                'type' => 'color',
                'validate' => 'color',
                'title' => esc_html__( 'Product thumbs background color', 'floris' ),
                'default' => ''
            ),
            array(
                'id' => 'product_variable',
                'type'     => 'switch',
                'title' => esc_html__('Show Product variations in thumbnails' ,'floris'),
                'default'  => '0'
            ),
            array(
                'id' => 'product_subscribe',
                'type'     => 'switch',
                'title' => esc_html__('Enable subscribe' ,'floris'),
                'default'  => '0'
            ),
            array(
                'id' => 'mailchimp_ID_woo',
                'type'     => 'text',
                'title' => esc_html__( 'MailChimp ID Form', 'floris' ),
                'required' => array('product_subscribe', 'equals', array('1')),
                'default'  => '',
            ),  
            array(
                'id' => 'mailchimp_title_woo',
                'type'     => 'switch',
                'title' => esc_html__( 'Block title', 'floris' ),
                'required' => array('product_subscribe', 'equals', array('1')),
                'default'  => '1',
            ),
            array(
                'id' => 'mailchimp_title2_woo',
                'type'     => 'switch',
                'title' => esc_html__( 'Block subtitle', 'floris' ),
                'required' => array('product_subscribe', 'equals', array('1')),
                'default'  => '1',
            ),
            array(
                'id' => 'mailchimp_button_woo',
                'type'     => 'text',
                'title' => esc_html__( 'Text on button', 'floris' ),
                'subtitle' => esc_html__( 'Add text to button in subscribe block.', 'floris' ),
                'required' => array('product_subscribe', 'equals', array('1')),
                'default'  => '',
            ),
            array(
                'id' => 'prod_img_cover',
                'type'     => 'switch',
                'title' => esc_html__( 'Product Image to Cover all area', 'floris' ),
                'default'  => '0',
            ),
            array(
                'id' => 'prod_img_auto',
                'type' => 'switch',
                'title' => esc_html__( 'Padding Option auto', 'floris' ),
                'required' => array('prod_img_cover', 'equals', array('0')),
                'default' => '1',
            ),
            array(
                'id'       => 'prod_img_spa',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'units'    => array('em', 'px', '%'),
                'title'    => __('Padding Option custom', 'floris'),
                'required' => array( array('prod_img_cover','equals','0'), array('prod_img_auto','equals','0'), ),
                'default'  => array(
                    'padding-top'    => '1%', 
                    'padding-right'  => '2%', 
                    'padding-bottom' => '3%', 
                    'padding-left'   => '4%',
                    'units'          => '%', 
                )
            ),
            array(
                'id'      => 'custom_share',
                'type'    => 'switch',
                'title'   => esc_html__( 'Custom share buttons', 'floris' ),
                'default' => '0',
            ),
            array(
                'id'          => 'share-slides',
                'type'        => 'slides',
                'title'       => esc_html__('Share button', 'floris'),
                'desc'        => wp_kses_post('Go to <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a>  click on desired icon, on landed page copy icon class name paste in above box, add before class name fa.  Ex. fa fa-linkedin<br /> Go to <a href="https://support.sharethis.com/hc/en-us/articles/218912477-Supported-Social-Sharing-Services-on-ShareThis" target="_blank">ShareThis</a>, select your social network. Example facebook, twitter, plusone.', 'floris'),
                'required'    => array('custom_share', 'equals', array('1')),
                'placeholder' => array(
                    'title'       => esc_html__('Social name', 'floris'),
                    'description' => esc_html__('Favicon icon', 'floris'),
                    'url'         => esc_html__('Social link', 'floris'),
                ),
            ),
        )
    );
//Social Settings
    $sections[] = array(
        'icon' => 'dashicons dashicons-share',
        'title' => esc_html__( 'Social', 'floris' ),
        'id'               => 'connect-settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => 'soc-slides',
                'type'        => 'slides',
                'title'       => esc_html__('Social media', 'floris'),
                'subtitle'    => esc_html__('Icon, favicon, link!', 'floris'),
                'desc'        => wp_kses_post('Go to <a href="http://fontawesome.io/icons/">Font Awesome</a>  click on desired icon, on landed page copy icon class name paste in above box, add before class name fa.  Ex. fa fa-linkedin', 'floris'),
                'placeholder' => array(
                    'title'           => esc_html__('Social name', 'floris'),
                    'description'     => esc_html__('Favicon icon', 'floris'),
                    'url'             => esc_html__('Social link', 'floris'),
                ),
            ),
        )
    );
//Custom Codes
    $sections[] = array(
        'icon' => 'el el-cogs',
        'title' => esc_html__( 'Custom Codes', 'floris' ),
        'id'               => 'codes-settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id' => 'codes_header',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Header Custom Codes', 'floris' ),
                'subtitle' => esc_html__( 'It will apply to wp_head hook.', 'floris' ),
                'default'  => ''
            ),
            array(
                'id' => 'codes_footer',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Footer Custom Codes', 'floris' ),
                'subtitle' => esc_html__( 'It will apply to wp_footer hook.', 'floris' ),
                'default'  => ''
            ),
        )
    );
//Custom CSS
    $sections[] = array(
        'icon' => 'el el-css',
        'title' => esc_html__( 'Custom CSS', 'floris' ),
        'id'               => 'css-settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id' => 'custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom CSS', 'floris' ),
                'subtitle' => esc_html__( 'Paste your custom CSS code here.', 'floris' ),
                'mode'     => 'css',
                'theme'    => 'chrome',
                'default'  => ''
            ),
        )
    );
//JS code
    $sections[] = array(
        'icon' => 'el el-screenshot',
        'title' => esc_html__( 'JS Code', 'floris' ),
        'id'               => 'css-settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id' => 'custom_js',
                'type' => 'ace_editor',
                'title' => esc_html__('JS Code', 'floris'),
                'subtitle' => esc_html__('Paste your custom JS code here.', 'floris'),
                'mode' => 'javascript',
                'theme' => 'monokai',
                'default' => ''
            )
        )
    );
//Google Maps
    $sections[] = array(
        'icon' => 'dashicons dashicons-location',
        'title' => esc_html__( 'Google Maps', 'floris' ),
        'id'               => 'google-maps-settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id' => 'google_maps_key',
                'type' => 'text',
                'title' => esc_html__('Google Maps API Key', 'floris'),
                'default' => '123456789'
            )
        )
    );
//One Click Update
    $sections[] = array(
        'icon'       => 'el-icon-random',
        'icon_class' => 'el-icon-large',
        'title'      => __('One Click Update', 'floris'),
        'id'         => 'one-click-update',
        'desc'       => '',
        'submenu'    => true,
        'fields'     => array(
            array(
                'id'    => 'info_warning',
                'type'  => 'info',
                'title' => __('Envato Market Plugin: ', 'floris'),
                'style' => 'warning',
                'desc'  => __('You can now use Envato Market plugin to enable auto udpate for all your ThemeForest\'s themes, download it here: <a target="_blank" href="https://github.com/envato/wp-envato-market">Envato Market plugin</a>, or read the <a target="_blank" href="http://www.wpexplorer.com/envato-market-plugin-guide/">detail guide</a> on WPExplorer.', 'floris')
            )
        )
    );
    $sections[] = array(
        'icon'       => 'el-icon-website',
        'icon_class' => 'el-icon-large',
        'title'      => __('Demo import', 'floris'),
        'id'         => 'demo_import',
        'desc'       => '',
        'submenu'    => true,
        'fields'     => array(
            array(
                'id'    => 'info_warning',
                'type'  => 'info',
                'style' => 'warning',
                'desc'  => __('Please go to Appearance / Import Demo Data page to import necessary demo content. If that menu item doesn\'t exist, please make sure "One Click Demo Import" plugin installed and activated.', 'floris')
            )
        )
    );


//License
    $whitelist = array( '127.0.0.1', '::1' );
    if( !in_array( $_SERVER['REMOTE_ADDR'], $whitelist) ){
        $sections[] = array(
            'icon'       => 'el-lock-alt',
            'icon_class' => 'el-icon-large',
            'title'      => __('License', 'floris'),
            'desc'       => '',
            'class'      => 'show',
            'submenu'    => true,
            'fields'     => array(
                array(
                    'id' => 'purchase_code_verification',
                    'type' => 'text',
                    'title' => esc_html__('Enter item purchase code:', 'floris'),
                    'default' => '123456789',
                    'desc'  => '<a href="javascript:void(0);" id="validation_activate" class="validation_activate_buttons" data-verify="0">Register the code</a> <a href="javascript:void(0);" id="validation_deactivate" class="validation_activate_buttons" data-verify="1">Deregister the code</a> <a href="#popup_license" id="popup_license_button">popup license</a>'
                ),
                array(
                    'id'    => 'verification_status',
                    'type'  => 'info',
                    'style' => 'warning',
                    'desc'  => __('1')
                )
            )
        );
    }
        return $sections;
    }
    // Retrieve theme option values
    if ( ! function_exists('floris_wpcharming_option') ) {
        function floris_wpcharming_option($id, $fallback = false, $key = false ) {
            global $wpc_option;
            if ( $fallback == false ) $fallback = '';
            $output = ( isset($wpc_option[$id]) && $wpc_option[$id] !== '' ) ? $wpc_option[$id] : $fallback;
            if ( !empty($wpc_option[$id]) && $key ) {
                $output = $wpc_option[$id][$key];
            }
            return $output;
        }
    }
}