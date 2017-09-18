<?php
/** 
 * Functions file.
 * To getting start design the theme, please begins by reading on this link. https://codex.wordpress.org/Theme_Development
 * You can make this theme as your parent theme (design new by modify this theme and make it yours).
 * But I recommend that you use this theme as parent and create your new child theme.
 * 
 * Learn more about template hierarchy, please read on this link. https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package bootstrap-basic4
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

// Required WordPress variable
if (!isset($content_width)) {
    $content_width = 1140;
}


// Configurations ----------------------------------------------------------------------------
// Left sidebar column size. Bootstrap have 12 columns this sidebar column size must not greater than 12.
if (!isset($bootstrapbasic4_sidebar_left_size)) {
    $bootstrapbasic4_sidebar_left_size = 3;
}
// Right sidebar column size.
if (!isset($bootstrapbasic4_sidebar_right_size)) {
    $bootstrapbasic4_sidebar_right_size = 3;
}
// Once you specified left and right column size, while widget was activated in all or some sidebar the main column size will be calculate automatically from these size and widgets activated.
// For example: you use only left sidebar (widgets activated) and left sidebar size is 4, the main column size will be 12 - 4 = 8.
// 
// Title separator. Please note that this value maybe able overriden by other plugins.
if (!isset($bootstrapbasic4_title_separator)) {
    $bootstrapbasic4_title_separator = '|';
}


// Require, include files ---------------------------------------------------------------------
require get_template_directory() . '/inc/classes/Autoload.php';
require get_template_directory() . '/inc/functions/include-functions.php';
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
require get_template_directory() . '/inc/wp_bootstrap_pagination.php';
require get_template_directory() . '/inc/multiple-wp-dropdown-categories.php';



// Setup auto load for load the class files without manually include file by file.
$Autoload = new \BootstrapBasic4\Autoload();
$Autoload->register();
$Autoload->addNamespace('BootstrapBasic4', get_template_directory() . '/inc/classes');
unset($Autoload);

// Call to actions/filters of the theme to enable features, register sidebars, enqueue scripts and styles.
$BootstrapBasic4 = new \BootstrapBasic4\BootstrapBasic4();
$BootstrapBasic4->addActionsFilters();
unset($BootstrapBasic4);

// Call to actions/filters of theme hook to hook into WordPress and make changes to the theme.
$Bsb4Hooks = new \BootstrapBasic4\Hooks\Bsb4Hooks();
$Bsb4Hooks->addActionsFilters();
unset($Bsb4Hooks);

// Call to actions/filters of theme hook to hook into WordPress widgets.
$WidgetHooks = new \BootstrapBasic4\Hooks\WidgetHooks();
$WidgetHooks->addActionsFilters();
unset($WidgetHooks);

// Display theme help page for admin.
$ThemeHelp = new \BootstrapBasic4\Controller\ThemeHelp();
$ThemeHelp->addActionsFilters();
unset($ThemeHelp);

//LIMITAR O TEXTO PARA O TITULOS
function limitarTexto($texto, $limite){
    $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
    return $texto;
}


//HABILITANDO IMAGEM DESTACADA
add_theme_support( 'post-thumbnails' );
//RECORTE DE IMAGEM
add_image_size( 'slider-principal', 1920, 650, array('center','center')); // Hard crop left top
add_image_size( 'noticias-page', 360, 200, array('center','center')); // Hard crop left top
add_image_size( 'search', 458, 342, array('center','center')); // Hard crop left top
add_image_size( 'galeria-page', 262, 220, array('center','center')); // Hard crop left top
add_image_size( 'galeria-index', 460, 250, array('center','center')); // Hard crop left top


/***************************************************/
/**************** TODAS AS PAGINAS ****************/
/*************************************************/
add_filter( 'rwmb_meta_boxes', 'register_breve_noticia' );
function register_breve_noticia( $meta_boxes ){

    $prefix = 'posts_';
    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'standard',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => esc_html__( 'Adicione a informativos', 'your-prefix' ),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        //'post_types' => array( 'post', 'page' ),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority'   => 'high',
        //pages
        'pages' =>  array( 'post' ),
        // Auto save: true, false (default). Optional.
        'autosave'   => true,
        // List of meta fields
        'fields'     => array(
          // TEXT
            array(
                // Field name - Will be used as label
                'name'  => esc_html__( 'Quem escreveu ?', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}shotcode",
                // Field description (optional)
                'desc'  => esc_html__( 'Coloque o nome e onde é autor dessa postagem.', 'your-prefix' ),
                'type'  => 'text',
            ),
        ),
    );
    return $meta_boxes;
}
/***************************************************/
/**************** BANNER PRINCIPAL ****************/
/*************************************************/
add_action( 'init', 'type_banner' );
function type_banner() {
  register_post_type( 'banner',
    array(
    'supports'  => array('title','thumbnail'),
      'labels' => array(
        'name' => __( 'Banner Principal' ),
        'singular_name' => __( 'Banner Principal' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-images-alt2',
      'taxonomies' => array(
            'banner'
        ),
      'rewrite' => array('slug' => 'banner'),
    )
  );
}
/*****************************************/
/**************** AVISOS ****************/
/***************************************/
add_action( 'init', 'type_avisos' );
function type_avisos() {
  register_post_type( 'avisos',
    array(
    'supports'  => array('title','editor', 'thumbnail'),
      'labels' => array(
        'name' => __( 'Avisos' ),
        'singular_name' => __( 'Aviso' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-sticky',
      'taxonomies' => array(
            'avisos'
        ),
      'rewrite' => array('slug' => 'avisos'),
    )
  );
}
/******************************************/
/**************** GALERIA ****************/
/****************************************/
add_filter( 'rwmb_meta_boxes', 'register_galeria' );
function register_galeria( $meta_boxes ){

    $prefix = 'galeria_';
    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'standard',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => esc_html__( 'Adicione fotos para sua galeria', 'your-prefix' ),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        //'post_types' => array( 'post', 'page' ),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority'   => 'high',
        //pages
        'pages' =>  array( 'galeria' ),
        // Auto save: true, false (default). Optional.
        'autosave'   => true,
        // List of meta fields
        'fields'     => array(
          array(
                'id'               => 'image_advanced',
                'name'             => __( 'Adicione aqui -->', 'your-prefix' ),
                'type'             => 'image_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 50,
            ),
        ),

    );
    return $meta_boxes;
}
//REDES SOCIAIS
add_action( 'init', 'type_galeria' );
function type_galeria() {
  register_post_type( 'galeria',
    array(
    'supports'  => array('title','thumbnail', 'editor', 'excerpt'),
      'labels' => array(
        'name' => __( 'Galeria de Fotos' ),
        'singular_name' => __( 'Galeria de Foto' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-images-alt',
      'taxonomies' => array(
            'galeria'
        ),
      'rewrite' => array('slug' => 'galeria'),
    )
  );
}


/*****************************************/
/**************** VIDEOS ****************/
/***************************************/
add_filter( 'rwmb_meta_boxes', 'register_videos' );
function register_videos( $meta_boxes ){

    $prefix = 'video_';
    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'standard',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => esc_html__( 'Adicione o Iframe do Video', 'your-prefix' ),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        //'post_types' => array( 'post', 'page' ),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority'   => 'high',
        //pages
        'pages' =>  array( 'video' ),
        // Auto save: true, false (default). Optional.
        'autosave'   => true,
        // List of meta fields
        'fields'     => array(
            array(
                'id'    => 'oembed',
                'name'  => __( 'oEmbed(s)', 'your-prefix' ),
                'desc'  => esc_html__( 'Cole aqui o link do Youtube.', 'your-prefix' ),
                'type'  => 'oembed',
                // Allow to clone? Default is false
                'clone' => false,
                // Input size
                'size'  => 30,
            ),
        ),

    );
    return $meta_boxes;
}
//REDES SOCIAIS
add_action( 'init', 'type_video' );
function type_video() {
  register_post_type( 'video',
    array(
    'supports'  => array('title','editor', 'excerpt'),
      'labels' => array(
        'name' => __( 'Galeria de Videos' ),
        'singular_name' => __( 'Galeria de Video' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-video-alt2',
      'taxonomies' => array(
            'video'
        ),
      'rewrite' => array('slug' => 'video'),
    )
  );
}


/******************************************/
/**************** informativos ****************/
/****************************************/
add_filter( 'rwmb_meta_boxes', 'register_informativos' );
function register_informativos( $meta_boxes ){

    $prefix = 'informativos_';
    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'standard',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => esc_html__( 'Adicione o Informativo', 'your-prefix' ),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        //'post_types' => array( 'post', 'page' ),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority'   => 'high',
        //pages
        'pages' =>  array( 'informativos' ),
        // Auto save: true, false (default). Optional.
        'autosave'   => true,
        // List of meta fields
        'fields'     => array(
          // TEXT
            array(
                // Field name - Will be used as label
                'name'  => esc_html__( 'Shortcode', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}shotcode",
                // Field description (optional)
                'desc'  => esc_html__( 'Cole aqui o shotcode do ISSU par colocar o informativo.', 'your-prefix' ),
                'type'  => 'text',
            ),
        ),

    );
    return $meta_boxes;
}
//REDES SOCIAIS
add_action( 'init', 'type_informativos' );
function type_informativos() {
  register_post_type( 'informativos',
    array(
    'supports'  => array('title','editor', 'thumbnail'),
      'labels' => array(
        'name' => __( 'Informativos' ),
        'singular_name' => __( 'Informativos' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-book-alt',
      'taxonomies' => array(
            'informativos'
        ),
      'rewrite' => array('slug' => 'informativos'),
    )
  );
}




/********************************************/
/**************** SINDICATO ****************/
/******************************************/
add_filter( 'rwmb_meta_boxes', 'register_sindicato' );
function register_sindicato( $meta_boxes ){

    $prefix = 'sindicato_';
    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'standard',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => esc_html__( 'Adicione a sindicato', 'your-prefix' ),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        //'post_types' => array( 'post', 'page' ),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority'   => 'high',
        //pages
        'pages' =>  array( 'sindicato' ),
        // Auto save: true, false (default). Optional.
        'autosave'   => true,
        // List of meta fields
        'fields'     => array(
          // // TEXT
          //   array(
          //       // Field name - Will be used as label
          //       'name'  => esc_html__( 'Shortcode', 'your-prefix' ),
          //       // Field ID, i.e. the meta key
          //       'id'    => "{$prefix}shotcode",
          //       // Field description (optional)
          //       'desc'  => esc_html__( 'Cole aqui o shotcode da sindicato.', 'your-prefix' ),
          //       'type'  => 'text',
          //   ),
          //   // TEXT
          //   array(
          //       // Field name - Will be used as label
          //       'name'  => esc_html__( 'Imagem Destacada', 'your-prefix' ),
          //       // Field ID, i.e. the meta key
          //       'id'    => "{$prefix}capa",
          //       // Field description (optional)
          //       'desc'  => esc_html__( 'Cole aqui o link da imagem destacada.', 'your-prefix' ),
          //       'type'  => 'text',
          //   ),
        ),

    );
    return $meta_boxes;
}
//REDES SOCIAIS
add_action( 'init', 'type_sindicato' );
function type_sindicato() {
  register_post_type( 'sindicato',
    array(
    'supports'  => array('title','editor', 'thumbnail'),
      'labels' => array(
        'name' => __( 'Sindicatos' ),
        'singular_name' => __( 'Sindicato' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-networking',
      'taxonomies' => array(
            'sindicato'
        ),
      'rewrite' => array('slug' => 'sindicato'),
    )
  );
}

/********************************************/
/**************** SINDICATO ****************/
/******************************************/
add_filter( 'rwmb_meta_boxes', 'register_equipe' );
function register_equipe( $meta_boxes ){

    $prefix = 'equipe_';
    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'standard',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => esc_html__( 'Adicione informações sobre Integrante da Equipe', 'your-prefix' ),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        //'post_types' => array( 'post', 'page' ),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority'   => 'high',
        //pages
        'pages' =>  array( 'equipe' ),
        // Auto save: true, false (default). Optional.
        'autosave'   => true,
        // List of meta fields
        'fields'     => array(
            // TEXT
            array(
                // Field name - Will be used as label
                'name'  => esc_html__( 'Cargo', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}cargo",
                // Field description (optional)
                'desc'  => esc_html__( 'Escreva aqui o Titulo do Cargo.', 'your-prefix' ),
                'type'  => 'text',
            ),
            // TEXT
            array(
                // Field name - Will be used as label
                'name'  => esc_html__( 'E-mail', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}email",
                // Field description (optional)
                'desc'  => esc_html__( 'Coloque aqui e-mail de contato.', 'your-prefix' ),
                'type'  => 'text',
            ),
        ),

    );
    return $meta_boxes;
}
add_action( 'init', 'type_equipe' );
function type_equipe() {
  register_post_type( 'equipe',
    array(
    'supports'  => array('title'),
      'labels' => array(
        'name' => __( 'Equipes' ),
        'singular_name' => __( 'equipe' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-groups',
      'taxonomies' => array(
            'equipe'
        ),
      'rewrite' => array('slug' => 'equipe'),
    )
  );
}
/*********************************************/
/**************** BIBLIOTECA ****************/
/*******************************************/
add_filter( 'rwmb_meta_boxes', 'register_biblioteca' );
function register_biblioteca( $meta_boxes ){

    $prefix = 'biblioteca_';
    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'standard',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => esc_html__( 'Adicione um documento nesta biblioteca', 'your-prefix' ),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        //'post_types' => array( 'post', 'page' ),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority'   => 'high',
        //pages
        'pages' =>  array( 'biblioteca' ),
        // Auto save: true, false (default). Optional.
        'autosave'   => true,
        // List of meta fields
        'fields'     => array(
            // TEXT
            array(
                // Field name - Will be used as label
                'name'  => esc_html__( 'Embed do Documento', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}shotcode",
                // Field description (optional)
                'desc'  => esc_html__( 'Escreva aqui o Embed do Documento. Verefique se o Embed está completo.', 'your-prefix' ),
                'type'  => 'text',
            ),
        ),

    );
    return $meta_boxes;
}
add_action( 'init', 'type_biblioteca' );
function type_biblioteca() {
  register_post_type( 'biblioteca',
    array(
    'supports'  => array('title','editor', 'thumbnail'),
      'labels' => array(
        'name' => __( 'Bibliotecas' ),
        'singular_name' => __( 'Biblioteca' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-download',
      'taxonomies' => array(
            'biblioteca'
        ),
      'rewrite' => array('slug' => 'biblioteca'),
    )
  );
}


/*************************************************/
/**************** GUIA INDUSTRIA ****************/
/***********************************************/
add_filter( 'rwmb_meta_boxes', 'register_industria' );
function register_industria( $meta_boxes ){

    $prefix = 'industria_';
    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'standard',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => esc_html__( 'Adicione informações sobre a Industria', 'your-prefix' ),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        //'post_types' => array( 'post', 'page' ),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority'   => 'high',
        //pages
        'pages' =>  array( 'industria' ),
        // Auto save: true, false (default). Optional.
        'autosave'   => true,
        // List of meta fields
        'fields'     => array(
            // TEXT
            array(
                // Field name - Will be used as label
                'name'  => esc_html__( '´Titulo', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}cargo",
                // Field description (optional)
                'desc'  => esc_html__( 'Escreva aqui o Titulo Completo da Industria.', 'your-prefix' ),
                'type'  => 'text',
            ),
            
        ),

    );
    return $meta_boxes;
}
add_action( 'init', 'type_industria' );
function type_industria() {
  register_post_type( 'industria',
    array(
    'supports'  => array('title','editor', 'thumbnail'),
      'labels' => array(
        'name' => __( 'Industrias' ),
        'singular_name' => __( 'Industria' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-admin-plugins',
      'taxonomies' => array(
            'industria', 'category'
        ),
      'rewrite' => array('slug' => 'industria'),
    )
  );
}




function moveElement( &$array, $a, $b ) {
    $out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
}

function custom_tax_ordering( $taxonomies, $current_post_type ) {
    moveElement( $taxonomies, 2, 0 );
    return $taxonomies;
}
add_filter( 'beautiful_filters_taxonomy_order', 'custom_tax_ordering' );






/************************************************/
/**************** ADMINISTRADOR ****************/
/**********************************************/
// Custom WordPress Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('http://www.onewave.com.br/_recipiente/onewave_adm.png');
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
    return 'OneWave Digital - Criação de sites em Cuiabá';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


//Custom dashboard logo
add_action('admin_head', 'my_custom_logo');


//editando o deashboard
function my_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(http://www.onewave.com.br/_recipiente/onewave_adm.png) !important;
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
    echo '© <a href="http://gsw.net.br/">OneWave Digital</a> - Criação de Sites em Cuiabá';
}
add_filter('admin_footer_text', 'remove_footer_admin');











add_filter( 'terms_clauses', 'jdn_post_type_terms_clauses', 10, 3 );
function jdn_post_type_terms_clauses( $clauses, $taxonomy, $args ) {
  // Make sure we have a post_type argument to run with.
  if( !isset( $args['post_type'] ) || empty( $args['post_type'] ) )
    return $clauses;
    
  global $wpdb;
  // Setup the post types in an array
  $post_types = array();
  
  // If the argument is an array, check each one and cycle through the post types
  if( is_array( $args['post_type'] ) ) {
    
    // All possible, public post types
    $possible_post_types = get_post_types( array( 'public' => true ) );
    
    // Cycle through the post types, add them to our array if they are public
    foreach( $args['post_type'] as $post_type ) {
      if( in_array( $post_type, $possible_post_types ) )
        $post_types[] = "'" . esc_attr( $post_type ) . "\'";
    }
    
  // If the post type argument is a string, not an array
  } elseif( is_string( $args['post_type'] ) ) {
    $post_types[] = "'" . esc_attr( $args['post_type'] ) . "'";
  }
  // If we have valid post types, build the new sql
  if( !empty( $post_types ) ) {
    $post_types_string = implode( ',', $post_types );
    $fields = str_replace( 'tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields'] );
    
    $clauses['fields'] = 'DISTINCT ' . esc_sql( $fields ) . ', COUNT(t.term_id) AS count';
    $clauses['join'] .= ' INNER JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';
    $clauses['where'] .= ' AND p.post_type IN (' . $post_types_string . ')';
    $clauses['orderby'] = 'GROUP BY t.term_id ' . $clauses['orderby'];
  }
    return $clauses;
}

function jdn_get_custom_taxonomy_dropdown( $args ) {
  
  // Taxonomy dropdown arguments
  $defaults = array(
    'taxonomy'    => false,   // required, the default here is a failsafe
    'post_type'   => false,   // pass a value if you want to
    'echo'      => false,   // true to echo, false for return
    'label'     => false,   // false or pass a string for the label
    'query_var'   => false,   // pass the query variable for the selected dropdown value
    'id'      => '',    // set this and the default category 'name' argument
    'wrap'      => 'div',   // the wrapper element. set to false to skip it.
    'wrap_class'    => 'select-wrap', // The custom wrapper class, set to false to skip it
  );
  $args = wp_parse_args( $args, $defaults );
  
  // Be sure we're good to go.
  if( ! $args['taxonomy'] )
    return false;
  
  // Current value of query variable, if there is one
  if( $args['query_var'] ) {
    $query_tax = get_query_var( esc_attr( $args['query_var'] ), false );
    $current = $query_tax ? sanitize_text_field( $query_tax ) : '';
    $args['selected'] = $current;
  }
  
  // We're returning the output of wp_dropdown_cateogies, but we need to know how the end user wants it back in this function,
  // so we'll store that value as a variable and reset the echo argument for the wp_dropdown_categories.
  $echo = esc_attr( $args['echo'] );
  $args['echo'] = false;
  
  // Grab the category dropdown
  $tax_drop = wp_dropdown_categories( $args );
  
  // Add a label
  $label = ( $args['label'] && !empty( $args['id'] ) ) ? '<label for="' . esc_attr( $args['id'] ) . '">' . esc_attr( $args['label'] ) . '</label>' : '';
  
  // Wrap it up
  $class = $args['wrap_class'] ? ' class="' . esc_attr( $args['wrap_class'] ) . '"' : '';
  $tax_drop = ( $args['wrap'] && !empty( $tax_drop ) ) ? '<' . esc_attr( $args['wrap'] ) . $class . '>' . $label . $tax_drop . '</' . esc_attr( $args['wrap'] ) . '>' : $tax_drop;
  
  // Return it or echo it back
  if( $echo ) {
    echo $tax_drop;
  } else {
    return $tax_drop;
  }
}