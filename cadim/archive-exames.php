<?php get_header(); /* Template Name: Exames */ ?>
<section class="row page_intro">
	<div class="row m0 inner">
		<div class="container">
			<div class="row">
				<h5>Confira todos</h5>
				<h2>Exames</h2>
			</div>
		</div>
	</div>
</section>
<section class="row breadcrumbRow">
	<div class="container">
		<div class="row inner m0">
			<ul class="breadcrumb">
				<li><a href="<?php echo home_url(); ?>">Home</a></li>
				<li>Exames</li>
			</ul>
		</div>
	</div>
</section>
<section class="row service_block_row bgf">
	<div class="container">
		<div class="row titleRow">
			<h5>Conheça todos nossos</h5>
			<h2>EXAMES</h2>
		</div>
		<div class="row">
			<?php
			$args = array( 'post_type' => 'exames', 'showposts' => -1);
			$loop = new WP_Query( $args );
			$count = 1;
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="col-sm-6 col-md-4 service_block">
				<a href="<?php the_permalink(); ?>">
					<div class="row m0 inner">
						<div class="row icon"><img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt=""></div>
						<a href="<?php the_permalink(); ?>"><h4><?php echo strtoupper(get_the_title()); ?></h4></a>
						<p><?php echo the_excerpt(); ?></p>
					</div>
				</a>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>