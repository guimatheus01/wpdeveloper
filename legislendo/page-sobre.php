<?php get_header(); /* Template Name: Sobre */ ?> 
<?php while ( have_posts() ) : the_post(); ?>

<div class="page-title transparent" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>');">
				<div class="inner">
					<h3><?php the_title(); ?></h3>
				</div> <!-- end .inner -->
			</div> <!-- end .page-title -->
			<div class="breadcrumbs">
				<div class="container">
					<span class="breadcrumbs-page-title"><?php the_title(); ?></span>
					<nav class="breadcrumbs-nav">
						<ul>
							<li><a href="<?php echo home_url(); ?>">Home</a></li>
							<li><?php the_title(); ?></li>
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

		<section class="section white">
			<div class="inner">
				<div class="container">
					<div class="about text-justify">
						<div class="left">
							<h2>Como Funciona</h2>
							<p align="justify">Os assuntos abordados pelo LEGISLENDO são divididos em módulos, o que permite uma busca rápida e precisa. São relevantes informações reunidas em único Pen Drive. <br> Aliás, o Pen drive que você está recebendo poderá ser utilizando para arquivamento de outras matérias relevantes de seu interesse, pois, são mais de 6 GB disponíveis para essa finalidade. <br> Simples e eficiente, o LEGISLENDO dispensa complexos conhecimentos em informática, destacando assim seus conhecimentos em gestão parlamentar.</p> 
						</div> <!-- end .left -->
						<div class="image" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>');">
							<div class="inner"></div>
							<div class="about-icon"><div class="inner"><div class="text"></div></div></div>
							<div class="top-left"></div>
							<div class="top-right"></div>
							<div class="bottom-left"></div>
							<div class="bottom-right"></div>
						</div> <!-- end .image -->
						<div class="right">
							<h2>Sobre</h2>
							<p align="justify">O LEGISLENDO é um software que permite acesso rápido aos mais importantes instrumentos para o aprimoramento do Poder Legislativo Municipal. Através dos mais de 1,200 modelos de leis municipais, torna-se possivel adequar os projetos de acordo com as necessidades de cada cidade. <br> Além disso o arquivo da legislação de consultas jurídicas facilitará a condução de Pareceres nos Projetos que tramitarão na Câmara Municipal. <br> Simples e eficiente, o LEGISLENDO estará sobremaneira, destacando seus conhecimentos em gestão parlamentar. Este é o <i>LEGISLENDO, o melhor e mais completo instrument de apoio parlamentar já editado no país.</i></p>
						</div> <!-- end .right -->
						<div class="row" style="width: 50%;font-family: 'Open Sans', sans-serif;font-weight: 400;color: #222;font-size: 16px;float: right;">					
						</div>
					</div> <!-- end .about -->

				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</section> <!-- end .section -->

<?php endwhile; ?>
<?php get_footer(); ?> 



