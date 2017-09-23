<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php if (is_home()) {
		//SCRIPT SEO
		    $title_page = get_bloginfo('name') .' - '. get_bloginfo('description');
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
		<meta name="theme-color" content="#ffbe00">
		<meta name="apple-mobile-web-app-status-bar-syle" content="#ffbe00">
		<meta name="msapplication-navbutton-color" content="#ffbe00">

		<link rel="author" href="https://www.facebook.com/guimatheus1"/>
		<link rel="publisher" href="https://www.facebook.com/gmwebdesigner/"/>
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
		<meta property="article:author" content="https://www.facebook.com/legislendo" />
		<meta property="article:publisher" content="https://www.facebook.com/legislendo" />

		<meta property="twitter:card" content="summary_large_image" />
		<meta property="twitter:site" content="@legislendo" />
		<meta property="twitter:domain" content="www.legislendo.com.br" />
		<meta property="twitter:title" content="<?php echo $title_page ?>" />
		<meta property="twitter:description" content="<?php echo $description_page; ?>" />
		<meta property="twitter:image:src" content="<?php echo $img_page; ?>" />
		<meta property="twitter:url" content="<?php echo $link_page ?>" />
		
		<?php wp_head(); ?>

		<!-- Bootstrap -->
		<link href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="<?php echo get_template_directory_uri() ?>/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- FlexSlider -->
		<link href="<?php echo get_template_directory_uri() ?>/assets/scripts/FlexSlider/flexslider.css" rel="stylesheet">
		<!-- Nivo Lightbox -->
		<link href="<?php echo get_template_directory_uri() ?>/assets/scripts/Nivo-Lightbox/nivo-lightbox.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri() ?>/assets/scripts/Nivo-Lightbox/themes/default/default.css" rel="stylesheet">
		<!-- Style.css -->
		<link href="<?php echo get_template_directory_uri() ?>/assets/css/style.css" rel="stylesheet">

		<!-- Favicons -->
		<!-- Generated using http://realfavicongenerator.net/ -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/favicons/favicon.png">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>

		<!-- Header -->
		<header class="header">
			<div class="top clearfix">
				<p></p>
			</div> <!-- end .top -->
			<div class="container clearfix">
				<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/brand.png" alt="Drive Pro"></a></div>
				<div class="header-contacts">
					<a href="mailto:contato@legislendo.com.br">
						<div class="header-contact">
						<div class="small-round-icon"><i class="fa fa-envelope"></i></div>
						contato@legislendo.com.br
					</div>  <!-- end .header-contact -->
					</a>
					<div class="header-contact">
						<div class="small-round-icon"><i class="fa fa-phone"></i></div>
						 (65) 3027-4407
					</div>  <!-- end .header-contact -->
				</div> <!-- end .header-contacts -->
				<a href="" class="responsive-menu-open">Menu <i class="fa fa-bars"></i></a>
			</div> <!-- end .container -->
			<div class="main-header clearfix">
				<div class="container">
					<?php
			            wp_nav_menu( array(
			                'menu'              => 'primary',
			                'theme_location'    => 'primary',
			                'depth'             => 2,
			                'container'         => 'nav',
			                'container_class'   => 'main-nav',
			        		
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new BootstrapBasicMyWalkerNavMenu())
			            );
			        ?>
					<?php get_search_form(); ?>
				</div> <!-- end .container -->
			</div> <!-- end .main-header -->
		</header> <!-- end .header -->
		<div class="responsive-menu">
			<a href="" class="responsive-menu-close">Fechar <i class="fa fa-times"></i></a>
			<nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
			<form class="search-form">
				<input type="search" id="responsive-menu-search" name="search" placeholder="Procure Aqui">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form> <!-- end .search-form -->
		</div> <!-- end .responsive-menu -->
