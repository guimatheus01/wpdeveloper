<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <?php if (is_home()) {
        //SCRIPT SEO
       $title_page = get_bloginfo('name');
        $description_page = get_bloginfo('description');
        $img_page =  get_template_directory_uri(). '/assets/img/brand.png'; 
        $link_page = home_url();
        $tags = '';
    }else{
        $title_page = get_bloginfo('name') .' - '. get_the_title();
        $description_page = get_the_excerpt();
        $img_page = (has_post_thumbnail()) ?  get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/logo.png' ;
        $link_page = get_the_permalink();
        $tags = get_the_tags();

    } ?>

    <title><?php echo $title_page; ?></title>
    <meta name="description" content="<?php echo $description_page; ?>" />
    <meta name="keywords" content="<?php if ($tags) {foreach($tags as $tag) { echo $tag->name . ',';  }} ?>"/>
    <meta name="robots" content="index, follow"/>

    <link rel="author" href="https://www.facebook.com/guimatheus1"/>
    <link rel="publisher" href="https://www.facebook.com/gmwebdesigner01"/>
    <link rel="canonical" href="<?php echo $link_page; ?>"/>
    <link rel="base" href="<?php echo home_url(); ?>"/>

    <meta itemprop="name" content="<?php echo $title_page; ?>"/>
    <meta itemprop="description" content="<?php echo $description_page; ?>"/>
    <meta itemprop="image" content="<?php echo $img_page; ?>">
    <meta itemprop="url" content="<?php echo $link_page; ?>"/>

    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $title_page; ?>" />
    <meta property="og:description" content="<?php echo $description_page; ?>" />
    <meta property="og:image" content="<?php echo $img_page; ?>" />
    <meta property="og:url" content="<?php echo $link_page; ?>" />
    <meta property="og:site_name" content="www.estadomt.com.br" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="article:author" content="https://www.facebook.com/guimatheus1" />
    <meta property="article:publisher" content="https://www.facebook.com/gmwebdesigner01" />

    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:domain" content="www.princessjoias.com.br" />
    <meta property="twitter:title" content="<?php echo $title_page; ?>" />
    <meta property="twitter:description" content="<?php echo $description_page; ?>" />
    <meta property="twitter:image:src" content="<?php echo $img_page; ?>" />


    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.min.css">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon.png">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <?php 

                //capturando IP do usuario e exibindo sua localização.
                $content = '[geoip_detect2_get_client_ip]';
                $ip_client = do_shortcode($content);
                $record = geoip_detect2_get_info_from_ip($ip_client, NULL, TRUE);
                $city_name = $record->city->name ;
                

                //capturando data
                setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
                date_default_timezone_set('America/Sao_Paulo');

               ?>
              <p class="text-center top-info"><?php echo $city_name; ?>,  <?php echo strftime('  %A, %d de %B de %Y.', strtotime('today')); ?></p>
            </div>
            <div class="col-md-4">
              <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand.png" class="img-responsive"></a>
            </div>
            <div class="col-xs-5 visible-xs visible-sm">
              <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <?php 
                  wp_nav_menu(
                      array(
                          'depth' => '2',
                          'theme_location' => 'primary', 
                          'container' => false, 
                          'menu_class' => false, 
                          'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                      )
                  ); 
                ?> 
              </div>
              <!-- Use any element to open the sidenav -->
              <span class="btn-menu" onclick="openNav()">&#9776; MENU</span>
            </div>
            <div class="col-xs-7 col-md-4 search">
              <?php echo get_search_form(); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1  visible-md visible-lg">
                <?php 
                  wp_nav_menu(
                      array(
                          'depth' => '2',
                          'theme_location' => 'primary', 
                          'container' => '<ul>', 
                          'menu_class' => 'nav navbar-nav', 
                          'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                      )
                  ); 
                ?> 
                </div><!-- /.navbar-collapse -->
              </div>
            </div>
          </div>
        </div>
      </nav>