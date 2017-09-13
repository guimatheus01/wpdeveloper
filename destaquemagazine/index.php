<?php get_header(); ?>
<div id="main" class="main clearfix">
	<div class="section">
		<div class="no-container">
			<div class="owl-carousel owl-theme">
				<?php
					$args = array( 'post_type' => 'banner', 'showposts' => -1);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						$large_image_url_zoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				?>
				<div class="item"><img src="<?php echo get_the_post_thumbnail_url(); ?>"></div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<div class="section mt-9 mb-6">
		<div class="container">
			<div class="row">
				<div data-wow-delay="0.3s" class="col-sm-12 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
					<h1 class="text-center">REVISTA</h1>
					<p class="desc  mb-7">Sua Revista Conceito.</p>
				</div>
			</div>
			<div class="row">
				<?php
					$args = array( 'post_type' => 'revistas', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 1);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						$large_image_url_zoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				?>
				<div class="col-sm-5 text-center">
					<a href="<?php echo the_permalink(); ?>" data-titulo="<?php echo the_title(); ?>" data-width="600" data-height="800" data-remote="false" data-toggle="modal" data-target="#revista"><img src="<?php echo $large_image_url_zoom[0]; ?>" class="img-responsive"/></a>
				</div>
				<div class="col-sm-6">
					<h2 style="text-align: left;"><?php the_title(); ?></h2>
					<p><?php the_content(); ?></p>
					
					<div class="mt-9 mb-6 btn-revistas">
						<a href="<?php the_permalink(); ?>"  data-titulo="<?php echo the_title(); ?>" data-width="600" data-height="800" data-remote="false" data-toggle="modal" data-target="#revista" class="btn btn-primary btn-block  nopaddingleft nopaddingright">Edição Atual</a>
						<a href="<?php echo home_url(); ?>/revistas" class="btn btn-primary btn-block  nopaddingleft nopaddingright">+ Edições</a>
						<a href="<?php echo home_url(); ?>/contato" class="btn btn-primary btn-block  nopaddingleft nopaddingright">Anuncie</a>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<div class="section">
		<div class="container-fluid">
			<div class="row">
				<div data-wow-delay="0.3s" class="col-sm-12 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
					<h1 class="text-center">EVENTOS</h1>
					<p class="desc  mb-7">Os melhores eventos da cidade.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 pl-0 pr-0">
					<div class="cms-grid-wraper cms-grid-portfolio">
						<div class="cms-grid">
							<?php
								$args = array( 'post_type' => 'galerias', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 4);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
									$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
							?>
							<div data-wow-delay="0.2s" class="cms-grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12 nopaddingall overlay-wrap wow fadeIn">
								<div class="cms-grid-media has-thumbnail">
									<img width="1170" height="790" src="<?php print_r($image[0]); ?>" alt="" />
								</div>
								<a href="<?php the_permalink(); ?>"><div class="overlay text-center">
									<div class="overlay-content">
										<h4 class="cms-grid-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h4>
										<div class="cms-grid-categories playfairdisplay">
											<a href="<?php the_permalink(); ?>"><?php get_the_date(); ?></a>
										</div>
									</div>
								</a>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section pt-10 pb-4">
		<div class="container">
			<div class="row">
				<?php if(function_exists( 'wp_bannerize' ))	wp_bannerize( 'group=index-topo' ); ?>
			</div>
		</div>
	</div>
	
	<div class="section pt-8 text-center">
		<div class="container">
			<div class="row">
				<div data-wow-delay="0.3s" class="col-sm-12 wow fadeInUp">
					<h1>MATÉRIAS</h1>
					<p class="desc  mb-7">Fique por dentro.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="section pb-8">
		<div class="container">
			<div class="row">
				<div class="cms-grid-wraper">
					<div class="cms-grid cms-grid-masonry">
						<?php
							$args = array( 'post_type' => 'post', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 3);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<div class="text-center cms-grid-item col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="cms-grid-media overlay-wrap has-thumbnail noticias">
								<img src="<?php echo the_post_thumbnail_url('medium'); ?>" alt="" />
								<a href="<?php the_permalink(); ?>"><div class="overlay">
									<div class="overlay-content">
									</div>
								</div>
							</a>
						</div>
						<h4 class="cms-grid-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
						<div class="cms-grid-meta cms-meta">
							<span class="post-date"><?php echo get_the_date(); ?></span><br>
							<span class="post-category"><a> 
							<?php
								$categories = get_the_category();
								if (!empty($categories)){
									echo esc_html($categories[0]->name);
								};
							?>
							</a></span>
						</div>
						<div class="cms-grid-link">
							<a class="more-link" href="<?php the_permalink(); ?>">Ler Mais &rarr;</a>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section pb-8">
	<div class="container">
		<div class="row">
			<?php if(function_exists( 'wp_bannerize' ))	wp_bannerize( 'group=index-meio' ); ?>
		</div>
	</div>
</div>
<div class="section pt-5 pb-20">
	<div class="container">
		<div class="row">
			<div data-wow-delay="0.3s" class="col-sm-12 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
				<h1 class="text-center mb-7">RESPONSABILIDADE SOCIAL</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 ja-animation ja-animate text-center" data-animation="pop-up" data-delay="400">
				<div class="col-md-12">
					<div class="img-intro text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/amigos.png" alt="">
						<div class="article-content text-center"><br><br>O Projeto Amigos da Sociedade foi criado pela Destaque Magazine para beneficiar entidades locais que dependem de apoio de empresas privadas e voluntários.</div>
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>
<div class="section pb-6">
	<div class="container">
		<div class="row">
			<div data-wow-delay="0.3s" class="col-sm-12 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
				<h1 class="text-center mb-7">DEPOIMENTOS</h1>
			</div>
		</div>
		<div class="row">
			<div data-wow-delay="0.3s" class="col-sm-12 wow fadeIn">
				<div class="cms-carousel cms-carousel-testimonial">
					<?php
						$args = array( 'post_type' => 'testemunhos', 'showposts' => 4);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
					?>
					<div class="cms-carousel-item">
						<div class="cms-carousel-content-wrapper">
							<div class="cms-carousel-content playfairdisplay">
								<img width="150" height="150" style="border-radius:50%;" src="<?php echo the_post_thumbnail_url('medium'); ?>" alt="">
								<p>“ <?php echo get_the_content(); ?> ”</p>
							</div>
							<div class="cms-carousel-title h4">
								<?php echo get_the_title(); ?> &#8211; <?php the_field('profissão'); ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section section-our-team" id="colunista">
	<div class="container">
		<div class="row">
			<div data-wow-delay="0.3s" class="col-sm-12 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
				<h1 class="text-center">COLUNISTAS</h1>
				<p class="desc mb-7">Colunismo de ponta.</p>
			</div>
		</div>
		<div class="row">
			<div class="cms-grid-wraper cms-grid-team">
				<div class="cms-grid cms-grid">
					<?php
						//coletando os usuarios
						$allUsers = get_users('orderby=post_count&order=DESC');
						$users = array();
						// Removedo usuario por função
						foreach($allUsers as $currentUser){
							if(!in_array( 'assinante', $currentUser->roles ) AND !in_array( 'administrator', $currentUser->roles ) AND !in_array( 'editor', $currentUser->roles ) ){
								$users[] = $currentUser;
							}
						}
						foreach($users as $user){
						$author_id = $user->ID;
					?>
					<div data-wow-delay="0.3s" class="text-center cms-grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12 wow fadeInUp colunista">
						<a data-toggle="modal" data-target="#<?php echo $author_id; ?>">
							<div class="cms-grid-media has-thumbnail">
								<img width="300" height="300" src="<?php echo the_author_image_url($author_id); ?>" alt="" />
							</div>
						</a>
						<h4 class="cms-grid-title"><?php echo $user->display_name; ?></h4>
						<div class="cms-grid-team-position"><?php echo get_user_meta($user->ID, 'proficao', true); ?></div>
					</div>
					<div class="modal fade bs-example-modal-lg" id="<?php echo $author_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h2 class="modal-title" id="myModalLabel"><?php echo $user->display_name; ?></h2>
						      </div>
						      <div class="modal-body">
							  	<div class="container">
							  		<div class="row">
							  			<div class="col-md-6">
								      		<img width="400" height="400" src="<?php echo the_author_image_url($author_id); ?>" alt="" />
								    		<p class="description-author"><?php echo get_user_meta($user->ID, 'description', true); ?></p>
									    	<ul class="list-inline">
									    		<li><a>Redes Sociais e Contatos:</a></li>
										    	<?php 
													$facebook_profile = get_user_meta($user->ID, 'facebook_profile', true);
													if ( $facebook_profile && $facebook_profile != '' ) {
														echo '<li><a target="_blank" class="social-icon-author" href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';
													}
													$insta_profile = get_user_meta($user->ID, 'insta_profile', true);
													if ( $insta_profile && $insta_profile != '' ) {
														echo '<li><a target="_blank" class="social-icon-author" href="' . esc_url($insta_profile) . '"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
													}
													$twitter_profile = get_user_meta($user->ID, 'twitter_profile', true);
													if ( $twitter_profile && $twitter_profile != '' ) {
														echo '<li><a target="_blank" class="social-icon-author" href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
													}
													$user_url = get_user_meta($user->ID, 'user_url', true);
													if ( $user_url && $user_url != '' ) {
														echo '<li><a target="_blank" class="social-icon-author" href="' . esc_url($user_url) . '"><i class="fa fa-globe" aria-hidden="true"></i></a></li>';
													}

												?>
												<li><a target="_blank" class="social-icon-author" href="mailto:<?php echo $user->user_email;?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
											</ul>
								      	</div>
								      	<div class="col-md-6">
								      		<h4>Posts Rescente de <?php echo $user->display_name; ?></h4>
								      		<hr>
								      		<ul class="list-unstyled">
												<?php 
													$args = array( 'post_type' => 'post', 'posts_per_page' => 6,'author' => $author_id);
													$loop = new WP_Query( $args );
														while ( $loop->have_posts() ) : $loop->the_post();
												?>
											  		<li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
											  <?php endwhile; ?>
											</ul>
								      	</div>
							  		</div>
							  	</div>
						      </div>
						    </div>
						  </div>
						</div>
					<?php }; //endforeach?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section pb-8">
	<div class="container">
		<div class="row">
			<?php if(function_exists( 'wp_bannerize' ))	wp_bannerize( 'group=index-baixo' ); ?>
	</div>
</div>
<div class="section mb-5 text-center">
	<div class="container">
		<div class="row">
			<div data-wow-delay="0.3s" class="col-sm-12 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
				<h1>SHOPPING</h1>
				<p class="desc">As melhores marcas e ofertas.</p>
			</div>
		</div>
	</div>
</div>
<div class="section mb-5">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="cms-commerce commerce columns-4">
					<ul class="products-list list-unstyled clearfix cms-carousel-shopping">
						<?php						
						$args = array( 'post_type' => 'shopping', 'orderby' => 'rand');
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();							
						?>
						<li class="cms-carousel-item shopping-box">
							<div class="product-item-wrap">
								<div class="product-item-content overlay-wrap">
									<img src="<?php echo the_post_thumbnail_url('medium'); ?>" alt="">
									<div class="overlay">
										<div class="overlay-content">
											<div class="product-item-addtocart text-center">
												<a href="<?php the_field('link_do_produto'); ?>" target="_blank" class="btn btn-default add_to_cart_button product_type_simple">Saiba mais</a>
											</div>
										</div>
									</div>
								</div>
								<div class="product-item-info text-center">
									<h5><a href="<?php the_field('link_do_produto'); ?>" target="_blank"><? the_title(); ?></a></h5>
									<div class="price h4">
										<ins><span class="amount">R$ <?php the_field('preço_do_produto'); ?></span></ins>
									</div>
								</div>
							</div>
						</li>
						<?php endwhile;?>
						</ul><!-- .products-list -->
						</div><!-- .cms-commerce -->
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="section section-client">
			<div class="container">
				<div class="row">
					<div data-wow-delay="0.3s" class="col-sm-12 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
						<h1 class="text-center">NOSSOS CLIENTES</h1>
						<p class="desc mb-7">"É melhor ver algo uma vez que ouvir sobre isso milhares de vezes".
						Por tanto agradar aos olhos de seus clientes. </p>
					</div>
				</div>
				<div class="row">
					<div class="cms-grid-wraper cms-grid-client">
						<div class="cms-grid cms-grid">
							<div class="cms-grid-item col-lg-2 col-md-3 col-sm-6 col-xs-12 text-center">
								<div class="cms-client-logo has-thumbnail">
									<img width="170" height="93" src="<?=get_template_directory_uri(); ?>/images/client/ellus.fw.jpg" alt="client1" />
								</div>
							</div>
							<div class="cms-grid-item col-lg-2 col-md-3 col-sm-6 col-xs-12 text-center">
								<div class="cms-client-logo has-thumbnail">
									<img width="170" height="93" src="<?=get_template_directory_uri(); ?>/images/client/nuun.fw.jpg" alt="client1" />
								</div>
							</div>
							<div class="cms-grid-item col-lg-2 col-md-3 col-sm-6 col-xs-12 text-center">
								<div class="cms-client-logo has-thumbnail">
									<img width="170" height="93" src="<?=get_template_directory_uri(); ?>/images/client/skin.fw.jpg" alt="client1" />
								</div>
							</div>
							<div class="cms-grid-item col-lg-2 col-md-3 col-sm-6 col-xs-12 text-center">
								<div class="cms-client-logo has-thumbnail">
									<img width="170" height="93" src="<?=get_template_directory_uri(); ?>/images/client/todesschini - 03.fw.jpg" alt="client1" />
								</div>
							</div>
							<div class="cms-grid-item col-lg-2 col-md-3 col-sm-6 col-xs-12 text-center">
								<div class="cms-client-logo has-thumbnail">
									<img width="170" height="93" src="<?=get_template_directory_uri(); ?>/images/client/criare.fw.jpg" alt="client1" />
								</div>
							</div>
							<div class="cms-grid-item col-lg-2 col-md-3 col-sm-6 col-xs-12 text-center">
								<div class="cms-client-logo has-thumbnail">
									<img width="170" height="93" src="<?=get_template_directory_uri(); ?>/images/client/net.fw.jpg" alt="client1" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		
		<div class="section section-parallax-2 pb-0">
			<div class="container">
				<div class="row">
					<div data-wow-delay="0.3s" class="col-md-6 col-sm-6 mb-5 wow fadeInLeft" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
						<div class="h2 color-white">NEWSLETTER</div>
						<p>Receba todas as novidades no seu e-mail</p>
					</div>
					<div data-wow-delay="0.3s" class="col-md-6 col-sm-6 wow fadeInRight" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
						<div class="newsletter-inline color-white button-primary">
							<div class="widget widget_newsletterwidget">
								<div class="newsletter newsletter-widget">
									<form>
										<div class="mb-1">
											<input class="newsletter-email" type="email" required="" name="ne" value="" placeholder="Email">
										</div>
										<div>
											<input class="newsletter-submit" type="submit" value="Assinar">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div><!-- #main -->
		<?php get_footer(); ?>