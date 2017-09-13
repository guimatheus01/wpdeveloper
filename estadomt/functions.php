<?php
/** 
 * Functions file.
 * 
 * To getting start design the theme, please begins by reading on this link. https://codex.wordpress.org/Theme_Development
 * You can make this theme as your parent theme (design new by modify this theme and make it yours).
 * But I recommend that you use this theme as parent and create your new child theme.
 * 
 * Learn more about template hierarchy, please read on this link. https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package bootstrap-basic4
 */


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
require get_template_directory() . '/inc/wp_bootstrap_pagination.php';


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


function customize_wp_bootstrap_pagination($args) {
    
    $args['previous_string'] = 'Anterior';
    $args['next_string'] = 'Proximo';
    
    return $args;
}
add_filter('wp_bootstrap_pagination_defaults', 'customize_wp_bootstrap_pagination');
function add_custom_sizes() {
    add_image_size( 'principal-banner', 702, 545, true );
    add_image_size( 'sub-banner', 300, 300, true );
}
add_action('after_setup_theme','add_custom_sizes');



/************************************************/
/**************** ADMINISTRADOR ****************/
/**********************************************/
// Custom WordPress Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/brand-adm.png);
            width: 300px;
            height: 60px;
            background-size: initial;
            background-position: center;
        }
        body.login {
            background: #000428; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #000428 , #004e92); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #000428 , #004e92); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        #login {
            padding: 15% 0 0 !important;
        }
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
    return 'GMWEBDESIGNER - Websites e Soluções.';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


//Custom dashboard logo
add_action('admin_head', 'my_custom_logo');


//editando o deashboard
function my_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . get_bloginfo('stylesheet_directory') . '/assets/img/brand-adm.png) !important;
color:rgba(0, 0, 0, 0);
background-size: cover;
    background-position: left;
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
#adminmenuback {
    background:#004c90;
}
#wpadminbar {
    background: #000428; /* fallback for old browsers */
    background: -webkit-linear-gradient(to left, #000428 , #004e92); /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to left, #000428 , #004e92); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
    background: #00326a;
}
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
    background: #004c90;
}
#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {
    background-color: #000428;
}
#adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
    background-color: #004c90;
}
#wpadminbar .menupop .ab-sub-wrapper, #wpadminbar .shortlink-input {
    background: #00326a;
}
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'my_custom_logo');

// Customizar o Footer do WordPress
function remove_footer_admin () {
    echo '© <a href="http://www.gmwebdesigner.com.br">GMWEBDESIGNER - Web Sites e Soluções.</a> - Obrigado por acreditar em nos !';
}
add_filter('admin_footer_text', 'remove_footer_admin');
