<?php get_header(); ?>

		<!-- Home Slider -->
		<div id="homeslider" class="flexslider homeslider">
			<div class="slides">
				<?php 
					$args = array( 'post_type' => 'banners', 'orderby' => 'date');
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
				<div style="background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>');">
					<div class="caption blue">
					</div> <!-- end .caption -->
				</div>
				<?php endwhile; ?>
			</div> <!-- end .slides -->
		</div> <!-- end homeslider -->

		<section class="section white">
			<div class="inner">
				<div class="container">

					<!-- Services -->
					<div class="heading text-center">
						<h3>Conteúdo</h3>
						<hr class="line" />
						<span>Saiba sobre nossos produtos.</span>
					</div> <!-- end .heading -->
					<div class="row">
						<?php 
							$args = array( 'post_type' => 'produtos', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC');
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
			
						?>
						<div class="col-sm-4">
							<div class="services">
								<div class="icon">
									<div class="inner"><i class="fa fa-th-list"></i></div>
								</div> <!-- end .icon -->
								<div class="content">
									<h5><?php the_title(); ?></h5>
									<p><a href="<?php the_permalink(); ?>">Saiba mais <i class="fa fa-angle-double-right"></i></a></p>
								</div> <!-- end .content -->
							</div> <!-- end .services -->
						</div> <!-- end .col-sm-4 -->
						<?php endwhile; ?>
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</section> <!-- end .section -->

		<section class="section small yellow call-to-action">
			<div class="inner">
				<div class="container">
					<span>O Legislendo você paga apenas uma vêz. Não é mensalidade.</span>
					<span><a href="<?php echo home_url(); ?>/compre-ja" class="button dark">APROVEITE A OPORTUNIDADE</a></span>
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</section>

		<section class="section transparent blue" style="background-image: url('images/background02.jpg');">
			<div class="inner">
				<div class="container">

					<!-- Testimonials -->
					<div class="heading text-center">
						<h3>Apoio</h3>
						<hr class="line" />
					</div> <!-- end .heading -->
					<div class="row">
						<?php 
							$args = array( 'post_type' => 'apoio', 'orderby' => 'rand');
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
			
						?>
						<div class="col-sm-6">
							<div class="testimonial clearfix">
								<div class="testimonial-body">
									<a href="">
										<img src="<?php echo the_post_thumbnail_url('medium'); ?>" alt="" class="img-responsive img-apoio">
									</a>
								</div> <!-- end .testimonial-body -->
							</div> <!-- end .testimonial -->
						</div> <!-- end .col-sm-6 -->
						<?php  endwhile; ?>
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</section> <!-- end .section -->

		<section class="section light">
			<div class="inner">
				<div class="container">
					
					<!-- Links -->
					<div class="heading text-center">
						<h3>Compre o Legislendo</h3>
						<hr class="line" />
					</div> <!-- end .heading -->
					<div class="row">
						<div class="col-sm-6">
							<p class="text-left txt-compre">Garanta já o seu <strong>LEGISLENDO</strong> em condições excepcionais e se posicione na vanguarda da atuação parlamentar na sua cidade. São mais de 1.200 modelos de leis abrangendo todos os segmentos.</p>
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-6">
							<div class="link clearfix">
								<div class="content">
									<i class="fa fa-check-circle-o"></i>
									<span>Compre Já</span>
								</div> <!-- end .content -->
								<div class="arrow"><a href="<?php echo home_url(); ?>/compre-ja"><i class="fa fa-chevron-right"></i></a></div> <!-- end .arrow -->
							</div> <!-- end .link -->
						</div> <!-- end .col-sm-4 -->
					</div> <!-- end .row -->

				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</section> <!-- end .section -->
<?php get_footer(); ?> 