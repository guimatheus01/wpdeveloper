<?php get_header(); ?>
<div id="main" class="main clearfix">
	<div id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<h1><?php echo single_cat_title(); ?></h1>
					<div class="page-sub-title">Todos as coberturas relacionado a <?php echo single_cat_title(); ?>.</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section mb-4">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-8 col-lg-8 mb-5">
					<?php if ( have_posts() ){ ?>
					<div class="cms-blog cms-blog-grid grid-2">
						<div class="cms-loadmore-post cms-isotope-grid-post row clearfix">
							<?php
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

							//tratando a categoria
							$convert_cat = single_cat_title("",false);
							$converted_cat = preg_replace('/[ -]+/' , '-' , $convert_cat);
							$cat_name = strtolower($convert_cat);


							$args = array( 'post_type' => 'post', 'orderby' => 'date',  'order' => 'desc', 'posts_per_page' => 12, 'category_name' => $cat_name, 'paged' => $paged);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							$img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							?>
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
							<?php endwhile; ?>
						</div>
						<div class="cs_pagination">
							<?php
								if ( function_exists('wp_bootstrap_pagination') )
								wp_bootstrap_pagination();
							?>
						</div>
					</div>
					<?php 
						}else {
							// If no content, include the "No posts found" template.
							get_template_part( 'no-results', 'none' );
						};//endif
					?>
				</div>
				<?php get_sidebar('right'); ?>
			</div>
		</div>
	</div>
</div><!-- #main -->
<?php get_footer(); ?>