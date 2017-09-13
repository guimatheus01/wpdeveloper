<?php get_header(); ?>
<div id="main" class="main clearfix">
	<div id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<h1><?php printf(__('Buscar resultados para: %s', 'bootstrap-basic'), '<span>' . get_search_query() . '</span>'); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="section mb-4">
		<div class="container">
			<?php if (have_posts()) { ?>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-lg-8 mb-5">
					<div class="cms-blog cms-blog-grid grid-2">
						<div class="cms-loadmore-post cms-isotope-grid-post row clearfix">							
						<?php while (have_posts()) { the_post(); ?>
							<div class="cms-grid-item text-center col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="blog-wrapper">
									<div class="entry-media">
										<img width="1000" height="676" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
									</div>
									<div class="entry-content">
										<div class="entry-header">
											<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
											<div class="entry-meta cms-meta">
												<ul class="list-unstyled list-inline">
													<li class="detail-date"><a><?php echo get_the_date(); ?></a></li>
												</ul>
											</div>
										</div>
										<a class="more-link" href="<?php the_permalink(); ?>" >Veja esse Post &rarr;</a>
									</div>
								</div>
							</div>
							<?php };// end while ?>
						</div>
						<div class="cs_pagination">
							<?php bootstrapBasicPagination(); ?>
						</div>
					</div>
				</div>
				<?php get_sidebar('right'); ?>
			</div>
			<?php } else { ?>
			<?php get_template_part('no-results', 'search'); ?>
			<?php } // endif; ?>
		</div>
	</div>
	</div><!-- #main -->
	<?php get_footer(); ?>