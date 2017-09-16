<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php bloginfo('title'); ?></title>

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

		<?php wp_head(); ?>

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
