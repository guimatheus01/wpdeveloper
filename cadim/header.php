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
            //$description_page = the_excerpt();
            $img_page = (has_post_thumbnail()) ?  get_the_post_thumbnail_url() : get_template_directory_uri() . '/images/logo3.png' ;
            $link_page = get_the_permalink();
        };
    ?>

    <title><?php echo $title_page ?></title>
    <meta name="description" content="<?php echo $description_page; ?>" />
    <meta name="robots" content="index, follow"/>
    <meta name="theme-color" content="#232177">
    <meta name="apple-mobile-web-app-status-bar-syle" content="#232177">
    <meta name="msapplication-navbutton-color" content="#232177">
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
    
    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <?php wp_head(); ?>
    
    <!--Bootstrap and Other Vendors-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendors/owl.carousel/css/owl.carousel.min.css">    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendors/owl.carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendors/flexslider/flexslider.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendors/bootstrap-datepicker/css/datepicker3.css" media="screen">
    
    <!--RS-->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendors/rs-plugin/css/settings.css" media="screen">
    
    <!--Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    
    <!--Mechanic Styles-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/default/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive/responsive.css">
    
    <!--[if lt IE 9]>
      <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/vendors/rs-plugin/css/settings-ie8.css" media="screen">     
      <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>      
    <![endif]-->
    
    

</head>
<body class="default home2">
    
    <section class="row top_bar">
        <div class="container">
            <div class="row m0">
                <div class="fleft schedule"><strong><i class="fa fa-clock-o"></i> Horários</strong>: Segunda - Sexta - 8:00 - 18:00, Sábado - 8:00 - 14:00</div>
                <div class="fright contact_info">
                    <div class="fleft email"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/envelope.jpg" alt="">comunicacao@cadim.com.br</div>
                    <div class="fleft phone"><i class="fa fa-phone"></i> <strong>(65) 2121-6363</strong></div>
                </div>
            </div>
        </div>
    </section>
    
    <nav class="navbar navbar-default navbar-static-top navbar2">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-cadim.png" alt="<?php echo bloginfo('title'); ?>"></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_nav" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-toggle visible-xs" data-toggle="modal" data-target="#appointmefnt_form_pop">Agende Seu Exame</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->            
            <div class="collapse navbar-collapse" id="main_nav"> 
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li class="hidden-xs book"><a href="#" data-toggle="modal" data-target="#appointmefnt_form_pop">Agende Seu Exame</a></li>
                </ul>
                <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'ul',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav navbar-right',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker())
                    );
                ?> 
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>