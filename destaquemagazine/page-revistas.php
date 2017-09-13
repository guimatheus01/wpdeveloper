<?php /* Template Name: Revistas */ get_header(); if (have_posts()) {?>
<div id="main" class="main clearfix">
	<div id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<h1>REVISTA</h1>
					<div class="page-sub-title">Veja todas as nossas revitas.</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section mb-9">
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12 pl-0 pr-0">
					<div class="cms-grid-wraper cms-grid-portfolio">
						<div class="cms-grid">
							<?php
								$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								$args = array( 'post_type' => 'revistas', 'orderby' => 'date',  'order' => 'desc', 'posts_per_page' => 6, 'paged' => $paged);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
									$img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
							?>
							<div class="cms-grid-item col-xs-12 col-sm-12 col-md-4 col-lg-4 portfolio-branding">
								<div class="portfolio-wrapper muliples">
									<div class="entry-content revistas">
										<div class="entry-media cms-blog-media cms-media overlay-wrap">
											<img  src="<?php echo $img_src[0]; ?>" alt="Revista Destaque Magazine - <?php echo the_title(); ?>" />
											<div class="overlay">
												<div class="overlay-content">
													<a class="icon circle" data-titulo="<?php echo the_title(); ?>" data-width="600" data-height="800" data-remote="false" data-toggle="modal" data-target="#<?php echo get_the_ID(); ?>">
														<i class="fa fa-search-plus"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="entry-header">
										<h4 class="entry-title"><a><?php the_title(); ?></a></h4>
										<div class="entry-meta cms-meta">
											<ul class="list-unstyled list-inline">
												<li class="detail-terms">
													<a href=""><?php echo get_the_date('F'); ?></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal Page -->
							<div id="<?php echo get_the_ID(); ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h2 class="modal-title"><?php the_title(); ?></h2>
										</div>
										<div class="modal-body">
											<?php the_field('shortcod_da_revista'); ?>
										</div>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
						<div class="cs_pagination">
							<?php
								wp_bootstrap_pagination();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }; get_footer(); ?>