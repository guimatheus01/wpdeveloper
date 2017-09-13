﻿<?php /* Template Name: Cobertura */ get_header(); ?>
<div id="main" class="main clearfix">
	<div id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<h1>COBERTURA</h1>
					<div class="page-sub-title">Fique por dentro de tudo que acontece.</div>
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
                                
								$args = array( 'post_type' => 'galerias', 'orderby' => 'date',  'order' => 'desc', 'posts_per_page' => 9, 'paged' => $paged);
								$temp = $wp_query;
                                $wp_query= null;
                                $wp_query = new WP_Query($args);
                                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                                if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
							?>
							<div class="cms-grid-item col-xs-12 col-sm-12 col-md-4 col-lg-4 portfolio-branding box-galeria">
								<div class="portfolio-wrapper muliples">
									<div class="entry-content galeria">
									<a href="<?php the_permalink(); ?>">
										<div class="entry-media cms-blog-media cms-media overlay-wrap">
												<img  src="<?php echo the_post_thumbnail_url( 'large' );  ?>" alt="Revista Destaque Magazine - <?php echo get_the_title(); ?>" />
											<div class="overlay"></div>
										</div>
									</a>
									</div>
									<div class="entry-header">
										<h4 class="entry-title"><a><?php the_title(); ?></a></h4>
										<div class="entry-meta cms-meta">
											<ul class="list-unstyled list-inline">
												<li class="detail-terms">
													<a href=""><?php echo get_the_date(); ?></a>
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
							<?php endwhile; endif; ?>
						</div>						
					</div>
				</div>
			</div>
			<div class="cs_pagination">
			<br><hr><br>
			<?php
              if ( function_exists('wp_bootstrap_pagination') ){  wp_bootstrap_pagination();
                $wp_query = null;
                $wp_query = $temp;
                wp_reset_query();
               };
            ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>