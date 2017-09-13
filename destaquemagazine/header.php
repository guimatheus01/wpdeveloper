<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if (is_home()) {
            //SCRIPT SEO
            $title_page = get_bloginfo('name');
            $description_page = get_bloginfo('description');
            $img_page =  get_template_directory_uri(). '/images/logo3.png';
            $link_page = home_url();
        }else{
            $title_page = get_bloginfo('name') .' - '. get_the_title();
            $description_page = the_excerpt();
            $img_page = (has_post_thumbnail()) ?  get_the_post_thumbnail_url() : get_template_directory_uri() . '/images/logo3.png' ;
            $link_page = get_the_permalink();
        };
        ?>
        <title><?php echo $title_page ?></title>
        <meta name="description" content="<?php echo $description_page; ?>" />
        <meta name="robots" content="index, follow"/>
        <meta name="theme-color" content="#333">
        <meta name="apple-mobile-web-app-status-bar-syle" content="#333">
        <meta name="msapplication-navbutton-color" content="#333">
        <link rel="author" href="https://www.facebook.com/guimatheus1"/>
        <link rel="publisher" href="https://www.facebook.com/gswdigital/"/>
        <link rel="canonical" href="<?php echo $link_page ?>"/>
        <link rel="base" href="<?php echo home_url(); ?>"/>
        <meta itemprop="name" content="<?php echo $title_page; ?>"/>
        <meta itemprop="description" content="<?php echo $description_page; ?>"/>
        <meta itemprop="image" content="<?php echo $img_page; ?>">
        <meta itemprop="url" content="<?php echo $link_page ?>"/>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $title_page ?>" />
        <meta property="og:description" content="<?php echo $description_page; ?>" />
        <meta property="og:image" content="<?php echo $img_page; ?>" />
        <meta property="og:url" content="<?php echo $link_page ?>" />
        <meta property="og:site_name" content="<?php echo bloginfo( 'name' ); ?>" />
        <meta property="og:locale" content="pt_BR" />
        <meta property="article:author" content="https://www.facebook.com/DestaqueMagazine" />
        <meta property="article:publisher" content="https://www.facebook.com/DestaqueMagazine" />
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:site" content="@DesaqueMagazin" />
        <meta property="twitter:domain" content="http://www.destaquemagazine.com.br/" />
        <meta property="twitter:title" content="<?php echo $title_page ?>" />
        <meta property="twitter:description" content="<?php echo $description_page; ?>" />
        <meta property="twitter:image:src" content="<?php echo $img_page; ?>" />
        <meta property="twitter:url" content="<?php echo $link_page ?>" />
        
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/settings.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css' type='text/css' media='all' />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.min.css" />
        <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/pe-icon-7-stroke.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/prettyPhoto.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/main.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/custom.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css' type='text/css' media='all' />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--wordpress head-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="noo-spinner">
            <div class="spinner">
                <div class="child double-bounce1"></div>
                <div class="child double-bounce2"></div>
            </div>
        </div>
        <div id="cms-page" class="cs-wide header-default clearfix">
            <div id="cms-header-wrapper" class="clearfix">
                <div id="cms-search" class="clearfix">
                    <div class="cms-search-inner container">
                        <div class="cms-search-content">
                            <form>
                                <div class="row">
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 nopaddingright">
                                        <input type="text" value="" name="s" placeholder="Digite o que procura" autofocus/>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <input class="btn btn-primary btn-block submit nopaddingleft nopaddingright" type="submit" value="Buscar" />
                                    </div>
                                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-right">
                                        <a id="header-widget-search-close">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #search -->
                <header id="masthead" class="site-header header-default clearfix">
                    <div id="cms-header" class="cms-header header-default no-sticky clearfix">
                        <div class="container">
                            <div id="cms-header-logo" class="main-navigation pull-left">
                                <a href="<?php echo home_url(); ?>">
                                    <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/logo3.png">
                                </a>
                            </div>
                            <div id="cms-nav-extra" class="cms-nav-extra main-navigation pull-right">
                                <div class="pull-left"></div>
                                <div class="pull-left">
                                    <ul>
                                        <li>
                                            <a id="header-widget-search"><i class="fa fa-search"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div id="cms-menu-mobile" class="pull-left">
                                    <ul>
                                        <li>
                                            <a><i class="fa fa-bars"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="cms-header-navigation" class="cms-header-navigation">
                                <nav id="site-navigation" class="main-navigation clearfix">
                                    <div class="cms-menu pull-right">
                                        <?php wp_nav_menu(array(
                                            'menu' => 'primary', 
                                            'container' => 'ul', 
                                            'container_class' => 'nav-menu',
                                            'menu_class' => 'menu-main-menu-container')); 
                                        ?>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- #site-navigation -->
                    </header><!-- #masthead -->
                    </div><!-- #cms-header-wrapper -->