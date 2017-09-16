<?php get_header(); /* Template Name: PG Woocomerce */ ?>
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
										<br>
										<div class="col-md-12"><?php the_content(); ?></div>
										<br><br>
										</div> <!-- end .row -->
										</div> <!-- end .container -->
										</div> <!-- end .inner -->
										</section> <!-- end .section -->
										<?php endwhile; // end of the loop. ?>
									</div>
									</div> <!-- end .container -->
									</div> <!-- end .inner -->
									</section> <!-- end .section -->
									<?php get_footer(); ?>