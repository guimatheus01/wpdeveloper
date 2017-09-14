<?php get_header(); /* Template Name: Contato */ ?> 
<?php while ( have_posts() ) : the_post(); ?>

<div class="page-title transparent" style="background-image: url('images/background01.jpg');">
				<div class="inner">
					<h3><?php the_title() ?></h3>
				</div> <!-- end .inner -->
			</div> <!-- end .page-title -->
			<div class="breadcrumbs">
				<div class="container">
					<span class="breadcrumbs-page-title"><?php the_title() ?></span>
					<nav class="breadcrumbs-nav">
						<ul>
							<li><a href="<?php echo home_url(); ?>">Home</a></li>
							<li><?php the_title() ?></li>
						</ul>
					</nav> <!-- end .breadcrumbs-nav -->
				</div> <!-- end .container -->
			</div> <!-- end .breadcrumbs -->
		</header> <!-- end .header -->
		<div class="responsive-menu">
			<a href="" class="responsive-menu-close">Fechar <i class="fa fa-times"></i></a>
			<nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
			<form class="search-form">
				<input type="search" id="responsive-menu-search" name="search" placeholder="Procure Aqui">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form> <!-- end .search-form -->
		</div> <!-- end .responsive-menu -->

		<!-- Contact -->
		<div class="full-width-map" id="full-width-map"></div>
		<section class="section yellow text-center">
			<div class="inner">
				<div class="container-fluid">
					<div class="contacts">
						<h5 class="text-center">Fale conosco</h5>
						<hr class="small-line" />
						<div class="row">
							<div class="col-sm-4">
								<div class="contact">
									<div class="icon"><i class="fa fa-map-marker"></i></div>
									<div class="inner">Av. Historiador Rubens de Mendonça n° 990 <br> 6º andar Sala 601, Cuiabá – MT <br> CEP 78008-900</div>
								</div> <!-- end .contact -->
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-4">
								<div class="contact">
									<div class="icon"><i class="fa fa-phone"></i></div>
									<div class="inner">(65) 3027-4407</div>
								</div> <!-- end .contact -->
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-4">
								<div class="contact">
									<div class="icon"><i class="fa fa-envelope"></i></div>
									<div class="inner">contato@legislendo.com.br</div>
								</div> <!-- end .contact -->
							</div> <!-- end .col-sm-4 -->
						</div> <!-- end .row -->
					</div> <!-- end .contacts -->
					<h2 class="contact-heading">FALE CONOSCO</h2>
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</section> <!-- end .section -->
		<section class="section white">
			<div class="inner">
				<div class="container">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<?php echo do_shortcode('[contact-form-7 id="73" title="Formulario de Contato"]'); ?>
						</div>
					</div>
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</section> <!-- end .section -->
<?php endwhile; ?>

<?php get_footer(); ?> 