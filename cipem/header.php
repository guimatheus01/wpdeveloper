<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <?php if (is_home()) {
        //SCRIPT SEO
        $title_page = get_bloginfo('name');
        $description_page = get_bloginfo('description');
        $img_page =  get_template_directory_uri(). '/assets/images/logo.png'; 
        $link_page = home_url();
    }else{
        $title_page = get_bloginfo('name') .' - '. get_the_title();
        $description_page = the_excerpt();
        $img_page = (has_post_thumbnail()) ?  get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/logo.png' ;
        $link_page = get_the_permalink();
    } ?>

    <title><?php echo $title_page ?></title>
    <meta name="description" content="<?php echo $description_page; ?>" />
    <meta name="robots" content="index, follow"/>
    <meta name="theme-color" content="#8c9c7b">
    <meta name="apple-mobile-web-app-status-bar-syle" content="#8c9c7b">
    <meta name="msapplication-navbutton-color" content="#8c9c7b">

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
    <meta property="article:author" content="https://www.facebook.com/setorflorestaldeMT" />
    <meta property="article:publisher" content="https://www.facebook.com/setorflorestaldeMT" />

    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="@CipemMT" />
    <meta property="twitter:domain" content="www.cipem.org.br" />
    <meta property="twitter:title" content="<?php echo $title_page ?>" />
    <meta property="twitter:description" content="<?php echo $description_page; ?>" />
    <meta property="twitter:image:src" content="<?php echo $img_page; ?>" />
    <meta property="twitter:url" content="<?php echo $link_page ?>" />

    <?php wp_head(); ?>

    <!-- Css Files -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/flaticon.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-slider.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/color.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <!--// Main Wrapper \\-->
    <div class="environment-main-wrapper">

        <!--// Header \\-->
        <header id="environment-header" class="environment-header-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"> <a href="<?php echo home_url(); ?>" class="environment-logo"><img class="brand" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt=""></a> </div>
                    <div class="col-md-9">
                        
                        <!--// TopStrip \\-->
                        <div class="environment-top-strip">
                            <ul class="environment-strip-icon">
                                <li><a href="https://www.facebook.com/setorflorestaldeMT/" target="_blank" class="icon-social23"></a></li>
                                <li><a href="https://twitter.com/CipemMT" target="_blank" class="icon-social43"></a></li>
                                <li><a href="https://www.instagram.com/cipemmt/" target="_blank" class="icon-instagram"></a></li>
                                <li><a href="https://www.youtube.com/user/Manejosustentavel" target="_blank" class="icon-youtube"></a></li>
                                <li><a href="https://soundcloud.com/user-440742351" target="_blank" class="icon-soundcloud"></a></li>
                            </ul>
                            <ul class="environment-strip-info">
                                <li><i class="fa fa-map-marker"></i>Av. Historiador Rubens de Mendonça, 4193, Centro Político.</li>
                                <li><i class="fa fa-phone"></i> (65) 3644-3666</li>
                            </ul>
                        </div>
                        <!--// TopStrip \\-->

                        <div class="environment-main-section">
                            <!--// Navigation \\-->
                            <nav class="navbar navbar-default">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="true">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                 <?php
                                    wp_nav_menu( array(
                                        'menu'              => 'primary',
                                        'theme_location'    => 'primary',
                                        'depth'             => 2,
                                        'container'         => 'div',
                                        'container_class'   => 'collapse navbar-collapse',
                                        'container_id'      => 'navbar-collapse-1',
                                        'menu_class'        => 'nav navbar-nav',
                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker())
                                    );
                                ?>

                            </nav>
                            <!--// Navigation \\-->
                            <ul class="environment-user-option">
                                <li><a href="#" class="environment-search-btn environment-bgcolor"><i class="fa fa-search"></i></a>
                                    <?php echo(get_search_form()); ?>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>
        <!--// Header \\-->