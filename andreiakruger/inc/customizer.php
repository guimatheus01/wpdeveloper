<?php
/**
 * Madang Theme Customizer.
 *
 * @package Madang
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function madang_customize_register( $wp_customize ) {
    
    //add description
    $wp_customize->add_setting( 'madang_desc',
                                array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_desc', array(
            'label'     => esc_html__( 'Description', 'madang' ),
            'section'   => 'title_tagline',
            'priority'  => 10,
            'type'      => 'textarea'
    ) );
    
    //add footnote
    $wp_customize->add_setting( 'madang_footnote',
                                array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_footnote', array(
            'label'     => esc_html__( 'Footer Note', 'madang' ),
            'section'   => 'title_tagline',
            'priority'  => 10,
            'type'      => 'textarea'
    ) );
    
    //add widget location
    $wp_customize->add_setting( 'sidebar_location', array(
                               'sanitize_callback' => 'madang_sanitize_text',
    ) );
    
    $wp_customize->add_control( 'sidebar_location', array(
                               'label'     => esc_html__( 'Widget sidebar location', 'madang' ),
                               'section'   => 'madang_advanced',
                               'priority'  => 30,
                               'type'      => 'radio',
                               'choices'   => array(
                                        'left'  => 'Left',
                                        'right' => 'Right',
                                        //'colored' => 'Colored',
                                ),
    ) );

    //add social network support
    $wp_customize->add_section( 'madang_social_section' , array(
            'title'       => esc_html__( 'Social Networks', 'madang' ),
            'priority'    => 23,
            'description' => 'Set up social network links and icons, enter Twitter API keys.',
    ) );
    
    $wp_customize->add_setting( 'facebook', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     ) );
    
    $wp_customize->add_control( 'facebook', array(
             'label'     => esc_html__( 'Facebook', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'youtube', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     ) );
    
    $wp_customize->add_control( 'youtube', array(
             'label'     => esc_html__( 'Youtube', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'twitter', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     ) );
    
    $wp_customize->add_control( 'twitter', array(
             'label'     => esc_html__( 'Twitter', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'linkedin', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( 'linkedin', array(
             'label'     => esc_html__( 'LinkedIn', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'pinterest', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( 'pinterest', array(
             'label'     => esc_html__( 'Pinterest', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'google', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( 'google', array(
             'label'     => esc_html__( 'Google', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'tumblr', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( 'tumblr', array(
             'label'     => esc_html__( 'Tumblr', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'instagram', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( 'instagram', array(
             'label'     => esc_html__( 'Instagram', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'vimeo', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( 'vimeo', array(
             'label'     => esc_html__( 'Vimeo', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'vk', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( 'vk', array(
             'label'     => esc_html__( 'Vkontakte', 'madang' ),
             'section'   => 'madang_social_section',
             'priority'  => 10,
             'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'disqus', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( 'disqus', array(
           'label'     => esc_html__( 'Disqus', 'madang' ),
           'section'   => 'madang_social_section',
           'priority'  => 10,
           'type'      => 'text'
    ) );
    
    // add "Header" section
    $wp_customize->add_section( 'madang_header' , array(
            'title'      => esc_html__( 'Header', 'madang' ),
            'priority'   => 22,
    ) );
    
    // add setting for page comment toggle checkbox
    $wp_customize->add_setting( 'madang_page_comment_toggle', array(
            'default' => 1,
            'sanitize_callback' => 'madang_sanitize_text',
    ) );
    
    // add control for page comment toggle checkbox
    $wp_customize->add_control( 'madang_page_comment_toggle', array(
            'label'     => esc_html__( 'Show comments on pages?', 'madang' ),
            'section'   => 'madang_advanced',
            'priority'  => 10,
            'type'      => 'checkbox'
    ) );
    
    // enable cart icon
    $wp_customize->add_setting( 'madang_cart', array(
             'default' => 1,
             'sanitize_callback' => 'madang_sanitize_text',
             ) );

    // add control for page comment toggle checkbox
    $wp_customize->add_control( 'madang_cart', array(
             'label'     => esc_html__( 'Enable Cart', 'madang' ),
             'section'   => 'madang_header',
             'priority'  => 10,
             'description' => 'If using WooCommerce plugin enable this option. Choose plan button will be removed.',
             'type'      => 'checkbox'
             ) );

    //dashboard link
    $wp_customize->add_setting( 'madang_dash_link', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     ) );
    
    $wp_customize->add_control( 'madang_dash_link', array(
           'label'     => esc_html__( 'Choose plan link', 'madang' ),
           'section'   => 'madang_header',
           'priority'  => 10,
           'type'      => 'text'
    ) );

    //dashboard link text
    $wp_customize->add_setting( 'madang_dash_link_text', array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     ) );
    
    $wp_customize->add_control( 'madang_dash_link_text', array(
           'label'     => esc_html__( 'Choose plan text', 'madang' ),
           'section'   => 'madang_header',
           'priority'  => 10,
           'type'      => 'text'
    ) );
    
    
    //header navigation type
    $wp_customize->add_setting( 'madang_header_scheme', array(
                               'sanitize_callback' => 'madang_sanitize_text',
    ) );
    
    $wp_customize->add_control( 'madang_header_scheme', array(
                               'label'     => esc_html__( 'Header type', 'madang' ),
                               'section'   => 'madang_header',
                               'priority'  => 10,
                               'type'      => 'radio',
                               'choices'   => array(
                                        'green'  => 'Colored',
                                        'white' => 'White',
                                        //'colored' => 'Colored',
                                ),
                               ) );

    //add logo support
    $wp_customize->add_section( 'madang_logo_section' , array(
            'title'       => esc_html__( 'Logo', 'madang' ),
            'priority'    => 20,
            'description' => 'Upload a logo to replace the default site name and description in the header',
    ) );
    
    $wp_customize->add_setting( 'madang_logo',
                               array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'madang_logo', array(
            'label'    => esc_html__( 'Logo Desktop', 'madang' ),
            'section'  => 'madang_logo_section',
            'settings' => 'madang_logo',
    ) ) );
    
    //Logo Desktop Width
    $wp_customize->add_setting( 'madang_logo_width', array(
                               'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_logo_width', array(
                               //'label'     => esc_html__( 'Logo Desktop Width', 'madang' ),
                               'section'   => 'madang_logo_section',
                               'priority'  => 10,
                               'description' => 'Maximum width of your desktop logo in px. Height will be adjusted automatically.',
                               'type'      => 'number'
                                ) );

    // //Logo Desktop Height
    // $wp_customize->add_setting( 'madang_logo_height', array(
    //                            'sanitize_callback' => 'madang_sanitize_text',
    //                             ) );
    
    // $wp_customize->add_control( 'madang_logo_height', array(
    //                            //'label'     => esc_html__( 'Logo Desktop Height', 'madang' ),
    //                            'section'   => 'madang_logo_section',
    //                            'priority'  => 10,
    //                            'description' => 'Height of your desktop logo in px',
    //                            'type'      => 'number'
    //                             ) );

    //add mobile logo support
    $wp_customize->add_setting(
                               'madang_logo_mobile',
                               array(
                                     //'default'     => '#000000',
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     //'transport'   => 'postMessage',
                                     )
                               );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'madang_logo_mobile', array(
            'label'    => esc_html__( 'Logo Mobile', 'madang' ),
            'section'  => 'madang_logo_section',
            'settings' => 'madang_logo_mobile',
    ) ) );
    
    //Logo Mobile Width
    $wp_customize->add_setting( 'madang_logo_mobile_width', array(
                               'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_logo_mobile_width', array(
                               //'label'     => esc_html__( 'Logo Desktop Width', 'madang' ),
                               'section'   => 'madang_logo_section',
                               'priority'  => 10,
                               'description' => 'Maximum width of your mobile logo in px. Height will be adjusted automatically.',
                               'type'      => 'number'
                                ) );

    // //Logo Desktop Height
    // $wp_customize->add_setting( 'madang_logo_mobile_height', array(
    //                            'sanitize_callback' => 'madang_sanitize_text',
    //                             ) );
    
    // $wp_customize->add_control( 'madang_logo_mobile_height', array(
    //                            //'label'     => esc_html__( 'Logo Desktop Height', 'madang' ),
    //                            'section'   => 'madang_logo_section',
    //                            'priority'  => 10,
    //                            'description' => 'Height of your mobile logo in px',
    //                            'type'      => 'number'
    //                             ) );

    //add footer logo support
    $wp_customize->add_setting( 'madang_logo_footer',
                               array(
                                     'sanitize_callback' => 'madang_sanitize_text',
                                     )  );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'madang_logo_footer', array(
            'label'    => esc_html__( 'Logo Footer', 'madang' ),
            'section'  => 'madang_logo_section',
            'settings' => 'madang_logo_footer',
    ) ) );

    
    //Theme Main Color
    $wp_customize->add_setting( 'madang_main_color', array(
                                                            'sanitize_callback' => 'madang_sanitize_text',
                                                            )  );
    
    $wp_customize->add_control(
       new WP_Customize_Color_Control(
            $wp_customize,
            'main_color',
            array(
                'label'      => esc_html__( 'Theme Main Color', 'madang' ),
                'section'    => 'colors',
                'settings'   => 'madang_main_color',
            ) )
    );
    
    $wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'background_color' );
    //Theme Sub Color
    $wp_customize->add_setting( 'madang_sub_color', array(
                                                           'sanitize_callback' => 'madang_sanitize_text',
                                                           )  );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sub_color',
            array(
                'label'      => esc_html__( 'Theme Sub Color', 'madang' ),
                'section'    => 'colors',
                'settings'   => 'madang_sub_color',
            ) )
    );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->add_section( 'custom_css', array(
                                                    'title' => esc_html__( 'Custom CSS', 'madang' ),
                                                    'description' => esc_html__( 'Add custom CSS here', 'madang' ),
                                                    'panel' => '', // Not typically needed.
                                                    'priority' => 160,
                                                    'capability' => 'edit_theme_options',
                                                    'theme_supports' => '', // Rarely needed.
                                                    ) );
    
    
    // add "Advanced" section
    $wp_customize->add_panel( 'madang_ecommerce_panel' , array(
                             'title'      => esc_html__( 'E-commerce', 'madang' ),
                             'description'    =>  esc_html__('E-commerce, banner, units, products master settings.', 'madang'),
                             'priority'   => 80,
                             'capability'     => 'edit_theme_options',
                             ) );

    $wp_customize->add_section( 'madang_ecommerce', array(
                                'priority'       => 10,
                                'capability'     => 'edit_theme_options',
                                'theme_supports' => '',
                                'title'          => esc_html__('Products', 'madang'),
                                'description'    => esc_html__('Configure product visual and styling settings.', 'madang'),
                                'panel'  => 'madang_ecommerce_panel',
                                ) );

    $wp_customize->add_section( 'madang_ecommerce2', array(
                                'priority'       => 10,
                                'capability'     => 'edit_theme_options',
                                'theme_supports' => '',
                                'title'          => esc_html__('Support', 'madang'),
                                'description'    => esc_html__('Cart, checkout banner and support page settings.', 'madang'),
                                'panel'  => 'madang_ecommerce_panel',
                                ) );

    //metering units
    $wp_customize->add_setting( 'madang_metering', array(
                               'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_metering', array(
                               'label'     => esc_html__( 'Units postfix', 'madang' ),
                               'section'   => 'madang_ecommerce',
                               'priority'  => 10,
                               'description' => 'When fats, proteins, carbohydrates are calculated you can add postfix like g or oz after each number.',
                               'type'      => 'text'
                                ) );
    //metering calories
    $wp_customize->add_setting( 'madang_calories', array(
                               'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_calories', array(
                               'label'     => esc_html__( 'Calories postfix', 'madang' ),
                               'section'   => 'madang_ecommerce',
                               'priority'  => 10,
                               'description' => 'When calories are calculated you can add postfix like kKal or J after each number.',
                               'type'      => 'text'
                                ) );

    //products per page
    $wp_customize->add_setting( 'madang_products_num', array(
                               'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_products_num', array(
                               'label'     => esc_html__( 'Number of products', 'madang' ),
                               'section'   => 'madang_ecommerce',
                               'priority'  => 10,
                               'description' => 'Default number of products per category in grid',
                               'type'      => 'text'
                                ) );

    //product popup
    $wp_customize->add_setting( 'madang_popup', array(
                               'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_popup', array(
                               'label'     => esc_html__( 'Quick product preview', 'madang' ),
                               'section'   => 'madang_ecommerce',
                               'priority'  => 10,
                               'description' => 'Open product preview in popup window instead of opening in new page.',
                               'type'      => 'checkbox'
                                ) );

    // cart help banner
    $wp_customize->add_setting( 'madang_help_banner', array(
                                 'default' => 1,
                                 'sanitize_callback' => 'madang_sanitize_text',
                                 ) );
    
    $wp_customize->add_control( 'madang_help_banner', array(
                                 'label'     => esc_html__( 'Help Banner', 'madang' ),
                                 'section'   => 'madang_ecommerce2',
                                 'priority'  => 10,
                                 'description' => 'Enable or disable support help banner in cart',
                                 'type'      => 'checkbox'
                                 ) );
    //banner title
    $wp_customize->add_setting( 'madang_banner_title', array(
                               'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_banner_title', array(
                               'label'     => esc_html__( 'Banner Title', 'madang' ),
                               'section'   => 'madang_ecommerce2',
                               'priority'  => 10,
                               'description' => 'Banner title.',
                               'type'      => 'text'
                                ) );


    //banner text
    $wp_customize->add_setting( 'madang_banner_text', array(
                               'sanitize_callback' => 'madang_sanitize_textarea',
                                ) );
    
    $wp_customize->add_control( 'madang_banner_text', array(
                               'label'     => esc_html__( 'Banner Text', 'madang' ),
                               'section'   => 'madang_ecommerce2',
                               'priority'  => 10,
                               'description' => 'Banner call to action text.',
                               'type'      => 'textarea'
                                ) );


    //banner link
    $wp_customize->add_setting( 'madang_banner_link', array(
                               'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_banner_link', array(
                               'label'     => esc_html__( 'Banner Link', 'madang' ),
                               'section'   => 'madang_ecommerce2',
                               'priority'  => 10,
                               'description' => 'Link to support page on contacts.',
                               'type'      => 'text'
                                ) );


    //banner CTA text
    $wp_customize->add_setting( 'madang_banner_cta', array(
                               'sanitize_callback' => 'madang_sanitize_text',
                                ) );
    
    $wp_customize->add_control( 'madang_banner_cta', array(
                               'label'     => esc_html__( 'Banner link text', 'madang' ),
                               'section'   => 'madang_ecommerce2',
                               'priority'  => 10,
                               'description' => 'Link text to support page on contacts.',
                               'type'      => 'text'
                                ) );

    //banner background
    $wp_customize->add_setting( 'madang_banner_background',
                               array(
                               'sanitize_callback' => 'madang_sanitize_text',
                               )  );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'madang_banner_background', array(
                                'label'    => esc_html__( 'Banner Background Image', 'madang' ),
                                'section'  => 'madang_ecommerce2',
                                'priority'  => 10,
                                'settings' => 'madang_banner_background',
                                ) ) );

    // add "Advanced" section
    $wp_customize->add_section( 'madang_advanced' , array(
                                 'title'      => esc_html__( 'Advanced', 'madang' ),
                                 'priority'   => 100,
                                 ) );
    
    // add setting for page comment toggle checkbox
    $wp_customize->add_setting( 'madang_minified', array(
                                 'default' => 1,
                                 'sanitize_callback' => 'madang_sanitize_text',
                                 ) );
    
    // add control for page comment toggle checkbox
    $wp_customize->add_control( 'madang_minified', array(
                                 'label'     => esc_html__( 'Minify JS and CSS', 'madang' ),
                                 'section'   => 'madang_advanced',
                                 'priority'  => 10,
                                 'description' => 'May significantly improve website performance and overall load times',
                                 'type'      => 'checkbox'
                                 ) );

    // add setting for page comment toggle checkbox
    $wp_customize->add_setting( 'madang_maps_api', array(
                                 'default' => 1,
                                 'sanitize_callback' => 'madang_sanitize_text',
                                 ) );

    // add control for page comment toggle checkbox
    $wp_customize->add_control( 'madang_maps_api', array(
                                 'label'     => esc_html__( 'Google Maps API Key', 'madang' ),
                                 'section'   => 'madang_advanced',
                                 'priority'  => 15,
                                 'description' => 'Can be obtained here: https://developers.google.com/maps/documentation/javascript/get-api-key',
                                 'type'      => 'text'
                                 ) );



}
add_action( 'customize_register', 'madang_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function madang_customize_preview_js() {
	wp_enqueue_script( 'madang_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'madang_customize_preview_js' );


function madang_sanitize_text( $str ) {
    return wp_kses( $str, array( 
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
    ) );
} 

function madang_sanitize_textarea( $str ) {
    return wp_kses( $str, array( 
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
    ) );
} 

