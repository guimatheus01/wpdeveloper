<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */

// Register Custom Navigation Walker
require_once('wp_bootstrap_pagination.php');


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
    $content_width = 1170;
}


if (!function_exists('bootstrapBasicSetup')) {
    /**
     * Setup theme and register support wp features.
     */
    function bootstrapBasicSetup() 
    {
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * 
         * copy from underscores theme
         */
        load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');

        // add theme support title-tag
        add_theme_support('title-tag');

        // add theme support post and comment automatic feed links
        add_theme_support('automatic-feed-links');

        // enable support for post thumbnail or feature image on posts and pages
        add_theme_support('post-thumbnails');

        // allow the use of html5 markup
        // @link https://codex.wordpress.org/Theme_Markup
        add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

        // add support menu
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'bootstrap-basic'),
        ));

        // add post formats support
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        // add support custom background
        add_theme_support(
            'custom-background', 
            apply_filters(
                'bootstrap_basic_custom_background_args', 
                array(
                    'default-color' => 'ffffff', 
                    'default-image' => ''
                )
            )
        );
    }// bootstrapBasicSetup
}
add_action('after_setup_theme', 'bootstrapBasicSetup');


if (!function_exists('bootstrapBasicWidgetsInit')) {
    /**
     * Register widget areas
     */
    function bootstrapBasicWidgetsInit() 
    {
        register_sidebar(array(
            'name'          => __('Header right', 'bootstrap-basic'),
            'id'            => 'header-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));

        register_sidebar(array(
            'name'          => __('Navigation bar right', 'bootstrap-basic'),
            'id'            => 'navbar-right',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ));

        register_sidebar(array(
            'name'          => __('Sidebar left', 'bootstrap-basic'),
            'id'            => 'sidebar-left',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));

        register_sidebar(array(
            'name'          => __('Sidebar right', 'bootstrap-basic'),
            'id'            => 'sidebar-right',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));

        register_sidebar(array(
            'name'          => __('Footer left', 'bootstrap-basic'),
            'id'            => 'footer-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));

        register_sidebar(array(
            'name'          => __('Footer right', 'bootstrap-basic'),
            'id'            => 'footer-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
    }// bootstrapBasicWidgetsInit
}
add_action('widgets_init', 'bootstrapBasicWidgetsInit');


if (!function_exists('bootstrapBasicEnqueueScripts')) {
    /**
     * Enqueue scripts & styles
     */
    function bootstrapBasicEnqueueScripts() 
    {
        global $wp_scripts;

    }// bootstrapBasicEnqueueScripts
}
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');


/**
 * admin page displaying help.
 */
if (is_admin()) {
    require get_template_directory() . '/inc/BootstrapBasicAdminHelp.php';
    $bbsc_adminhelp = new BootstrapBasicAdminHelp();
    add_action('admin_menu', array($bbsc_adminhelp, 'themeHelpMenu'));
    unset($bbsc_adminhelp);
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';

/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';

function customize_wp_bootstrap_pagination($args) {
    $args['previous_string'] = 'Anterior';
    $args['next_string'] = 'Próximo';
    return $args;
}
add_filter('wp_bootstrap_pagination_defaults', 'customize_wp_bootstrap_pagination');


// Corta imagem
if ( function_exists( 'add_image_size' ) ) {

    add_image_size( 'loop', 150, 150, true );
    add_image_size( 'noticia', 370, 250, array( 'center', 'top' ));
    add_image_size( 'galeria', 300, 300, array( 'center', 'top' ));
	add_image_size( 'colunista', 300, 300, array( 'center', 'top' ));
	add_image_size( 'galeria-capa', 475, 320, array( 'center', 'top' ));
	add_image_size( 'produto', 270, 320, array( 'center', 'center' ));

 
}

// GERENCIAMENTO DO BANNER PRINCIPAL
add_action( 'init', 'type_banner' );
function type_banner() {
  register_post_type( 'banner',
    array(
  'supports'  => array('title','thumbnail' ),
      'labels' => array(
        'name' => __( 'Banner Principal' ),
        'singular_name' => __( 'Banner Principal' )
      ),
      'public' => true,
      'has_archive' => true,
    'menu_icon' => 'dashicons-images-alt',
    'taxonomies' => array(
      'produtos_category'
    ),
      //'rewrite' => array('slug' => 'revista'),
    )
  );

}
// GERENCIAMENTO DE REVISTA
add_action( 'init', 'type_revistas' );
function type_revistas() {
  register_post_type( 'revistas',
    array(
  'supports'  => array('title', 'editor',  'thumbnail' ),
      'labels' => array(
        'name' => __( 'Revistas' ),
        'singular_name' => __( 'Revista' )
      ),
      'public' => true,
      'has_archive' => true,
    'menu_icon' => 'dashicons-welcome-add-page',
    'taxonomies' => array(
      'produtos_category'
    ),
      'rewrite' => array('slug' => 'revista'),
    )
  );

}
// GERENCIAMENTO DAS GALERIAS
add_action( 'init', 'type_galerias' );
function type_galerias() {
  register_post_type( 'galerias',
    array(
	'supports'  => array('title', 'editor',  'thumbnail' ),
      'labels' => array(
        'name' => __( 'Galerias' ),
        'singular_name' => __( 'Galeria' )
      ),
      'public' => true,
      'has_archive' => true,
	  'menu_icon' => 'dashicons-images-alt',
	  'taxonomies' => array(
			'produtos_category'
		),
      'rewrite' => array('slug' => 'galerias'),
    )
  );

}
// GERENCIAMENTO DOS COLUNISTAS
// add_action( 'init', 'type_colunistas' );
// function type_colunistas() {
//   register_post_type( 'colunistas',
//     array(
// 	'supports'  => array('title', 'editor',  'thumbnail' ),
//       'labels' => array(
//         'name' => __( 'Colunistas' ),
//         'singular_name' => __( 'Colunista' )
//       ),
//       'public' => true,
//       'has_archive' => true,
// 	  'menu_icon' => 'dashicons-groups',
// 	  'taxonomies' => array(
// 			'produtos_category'
// 		),
//       'rewrite' => array('slug' => 'colunistas'),
//     )
//   );
// }
// GERENCIAMENTO DOS TESTEMUNHOS
add_action( 'init', 'type_testemunhos' );
function type_testemunhos() {
  register_post_type( 'testemunhos',
    array(
  'supports'  => array('title', 'editor',  'thumbnail' ),
      'labels' => array(
        'name' => __( 'Testemunhos' ),
        'singular_name' => __( 'Testemunho' )
      ),
      'public' => true,
      'has_archive' => true,
    'menu_icon' => 'dashicons-format-chat',
    'taxonomies' => array(
      'produtos_category'
    ),
     // 'rewrite' => array('slug' => 'testemunho'),
    )
  );
}
// GERENCIAMENTO DA VITRINE DA LOJA
add_action( 'init', 'type_shopping' );
function type_shopping() {
  register_post_type( 'shopping',
    array(
  'supports'  => array('title', 'thumbnail' ),
      'labels' => array(
        'name' => __( 'Shopping' ),
        'singular_name' => __( 'Shopping' )
      ),
      'public' => true,
      'has_archive' => true,
    'menu_icon' => 'dashicons-cart',
    
      //'rewrite' => array('slug' => 'colunista'),
    )
  );

}
add_action('admin_init','metaboxes');


/*===================================================================================
 * Add Author Links
 * =================================================================================*/
function add_to_author_profile( $contactmethods ) {
  
  $contactmethods['facebook_profile'] = 'Facebook URL';
  $contactmethods['insta_profile'] = 'Instagran URL';
  $contactmethods['twitter_profile'] = 'Twitter URL';
  $contactmethods['proficao'] = 'Qual a Profissão/Função';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);



/************************************************/
/**************** ADMINISTRADOR ****************/
/**********************************************/
// Custom WordPress Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/onewave_adm.png);
               width: 250px;
                height: 75px;
                background-size: contain;
                background-position: center;
        }
        body.login {background: #00ACC1;}
        .login #backtoblog a, .login #nav a {color: #fff !important;}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


//Link na tela de login para a página inicial 
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return 'ONEWAVE - Criação de sites em Cuiabá';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


//Custom dashboard logo
add_action('admin_head', 'my_custom_logo');


//editando o deashboard
function my_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/onewave_adm.png) !important;
background-position: 0 0;
color:rgba(0, 0, 0, 0);
background-size: 233%;
background-position: left 4px;
background-repeat: no-repeat;
width: 120px;
font-size: 28px;
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
#adminmenuback {
    background: #0097A7;
}
#wpadminbar {
    background: #0097A7;
}
#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
    background-color: #0097A7;
}
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
    background: #00BCD4;
}
#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {
    background-color: #006064;
}
#adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
    background-color: #00838F;
}
#wpadminbar .menupop .ab-sub-wrapper, #wpadminbar .shortlink-input {
    background: #00838F;
}
#adminmenu a {
    color: #fff !important;
}
#wpadminbar #wp-admin-bar-wp-logo>.ab-item {
    padding: 0 14px !important;
}
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'my_custom_logo');

// Customizar o Footer do WordPress
function remove_footer_admin () {
    echo '© <a href="http://gsw.net.br/">ONEWAVE</a> - Criação de sites em Cuiabá';
}
add_filter('admin_footer_text', 'remove_footer_admin');




add_filter('rewrite_rules_array', 'kill_feed_rewrites');
function kill_feed_rewrites($rules){

    foreach ($rules as $rule => $rewrite) {

        if ( preg_match('/^foo.*(feed)/',$rule) ) {
            unset($rules[$rule]);
        }

    }

    return $rules;
}