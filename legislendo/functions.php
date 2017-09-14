<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */


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

        wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
        wp_enqueue_style('bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '3.3.7');
        wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3');
        wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');

        wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js', array(), '3.3.1');
        wp_register_script('respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js', array(), '1.4.2');
        $wp_scripts->add_data('respond-script', 'conditional', 'lt IE 9');
        wp_enqueue_script('respond-script');
        wp_register_script('html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.min.js', array(), '3.7.3');
        $wp_scripts->add_data('html5-shiv-script', 'conditional', 'lte IE 9');
        wp_enqueue_script('html5-shiv-script');
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), '3.3.7', true);
        wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array(), false, true);
        wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());
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




//habilitando modulos
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'diretoria', 'slide_principal', 'projetos', 'galerias') ); // Capas
    add_theme_support('menus');// menus
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
    //resumo paginas
    add_post_type_support( 'page' ,'excerpt' );
    //Recorte imagem
    add_image_size('apoio', 605, 450, true);

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}









/******************************************/
/**************** BANNERS ****************/
/****************************************/
add_action( 'init', 'type_banner' );
function type_banner() {
  register_post_type( 'banners',
    array(
    'supports'  => array('title','thumbnail'),
      'labels' => array(
        'name' => __( 'Banners Principal' ),
        'singular_name' => __( 'Banner Principal' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-visibility',
      'taxonomies' => array(
            'rede_social'
        ),
      'rewrite' => array('slug' => 'banner'),
    )
  );
}




/*******************************************/
/**************** PRODUTOS ****************/
/*****************************************/
add_action( 'init', 'type_produtos' );
function type_produtos() {
  register_post_type( 'produtos',
    array(
    'supports'  => array('title','thumbnail', 'editor', 'excerpt'),
      'labels' => array(
        'name' => __( 'Produtos' ),
        'singular_name' => __( 'Produto' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-visibility',
      'taxonomies' => array(
            'rede_social'
        ),
      'rewrite' => array('slug' => 'produtos'),
    )
  );
}

/****************************************/
/**************** APOIO ****************/
/**************************************/
add_action( 'init', 'type_apoio' );
function type_apoio() {
  register_post_type( 'apoio',
    array(
    'supports'  => array('title','thumbnail', 'editor', 'excerpt'),
      'labels' => array(
        'name' => __( 'Apoio' ),
        'singular_name' => __( 'Apoio' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-visibility',
      'taxonomies' => array(
            'rede_social'
        ),
      'rewrite' => array('slug' => 'apoio'),
    )
  );
}













/************************************************/
/**************** ADMINISTRADOR ****************/
/**********************************************/
// Custom WordPress Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/gsw.png);
               width: 150px;
                height: 150px;
                background-size: 150%;
                background-position: center;
        }
        body.login {background: #633188;}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


//Link na tela de login para a página inicial 
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return 'GSW Agência Web - Criação de sites em Cuiabá';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


//Custom dashboard logo
add_action('admin_head', 'my_custom_logo');


//editando o deashboard
function my_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . get_bloginfo('stylesheet_directory') . '/assets/gsw.png) !important;
background-position: 0 0;
color:rgba(0, 0, 0, 0);
background-size: 145%;
    background-position: center;
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
#adminmenuback {
    background: #633188;
}
#wpadminbar {
    background: #633188;
}
#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
    background-color: #633188;
}
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
    background: #482463;
}
#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {
    background-color: #21102d;
}
#adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
    background-color: #361a4a;
}
#wpadminbar .menupop .ab-sub-wrapper, #wpadminbar .shortlink-input {
    background: #321844;
}
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'my_custom_logo');

// Customizar o Footer do WordPress
function remove_footer_admin () {
    echo '© <a href="http://gsw.net.br/">GSW Agência Web </a> - Criação de sites em Cuiabá';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/* Adicionando meta tags ao header */
function add_meta_tags() {
    echo '<meta property="og:description" content="O melhor instrumento de apoio parlamentar." />';
    echo '<meta name="keywords" content="Projetos de Lei, Projetos de Leis, Projetos de Leis Municipais, Leis Municipais, Leis, Modelos de Leis Municipais, Kit de Leis Municipais, Aperfeiçoamento Parlamentar, Leis para vereadores, Modelos de Leis para Vereadores, Modelos de Leis para Câmaras Municipais, Modelo de Leis Municipais, Destaque-se como Vereador, Parlamento Municipal moderno, Como se faz uma Lei, CPI, Hinos Nacionais, Hinos do Mercosul, Parlatino, Constituições Estaduais, Constituições Federais, Modelos de Regimentos Internos, Regimentos Internos, Modelos de Leis Orgânicas, Leis Orgânicas Municipais, Assessoria Parlamentar, Acessor Parlamentar, Secretário Parlamentar, Câmaras Municipais, União das Câmaras de Mato Grosso, Associação dos Municipios de Mato Grosso, Mato Grosso, Legislação Municipal, Legislação Brasileira, Legislação Estadual, Como Elaborar uma Lei Municipal, Órgãos de Controles Municipais, Tribunais de Contas Estaduais, Tribunal de Contas de Mato Grosso, Assembleias Legislativas, Assembleia Legislativa de Mato Grosso." />';
}
add_action('wp_head', 'add_meta_tags');