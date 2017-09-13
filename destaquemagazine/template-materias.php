<?php /* Template Name: Materias */ get_header(); ?>
<div id="main" class="main clearfix">
	<div id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<h1>MATÉRIAS</h1>
					<div class="page-sub-title">Os melhores eventos da cidade.</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section mb-4">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-8 col-lg-8 mb-5">
					<div class="cms-blog cms-blog-grid grid-2">
						<div class="cms-loadmore-post cms-isotope-grid-post row clearfix">
							<?php
								$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								$args = array( 'post_type' => 'post', 'orderby' => 'date',  'order' => 'desc', 'posts_per_page' => 8, 'paged' => $paged);
							
								$temp = $wp_query;
	                            $wp_query= null;
	                            $wp_query = new WP_Query($args);

                                if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 

							?>
							<div class="cms-grid-item text-center col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="blog-wrapper">
									<div class="entry-media noticias">
										<a href="<?php the_permalink(); ?>">
											<img width="1000" height="676" src="<?php echo the_post_thumbnail_url('medium'); ?>" alt="" />
										</a>
									</div>
									<div class="entry-content">
										<div class="entry-header">
											<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
											<div class="entry-meta cms-meta">
												<ul class="list-unstyled list-inline">
													<li class="detail-date"><a><?php echo(get_the_date()); ?></a></li>
													<li class="detail-terms">
														<a>
															<?php
																$categories = get_the_category();
																if ( ! empty( $categories ) ) {
																echo esc_html( $categories[0]->name );
																}
															?>
														</a>
													</li>
												</ul>
											</div>
										</div>
										<a class="more-link" href="<?php the_permalink(); ?>" >Veja Agora &rarr;</a>
									</div>
								</div>
							</div>
							<?php endwhile; endif; ?>
						</div>
						<div class="cs_pagination">
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
				<?php get_sidebar('right'); ?>
			</div>
		</div>
	</div>
</div><!-- #main -->
<?php get_footer(); ?>