<?php /* Template Name: Colunista */ get_header(); ?>
<div id="main" class="main clearfix">
	<div id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<h1>COLUNISTAS</h1>
					<div class="page-sub-title">Colunismo de ponta.</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section mb-4">
		<div class="container">
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
							//acionando colunista da pagina pcincipal
							//$_GET[]
							foreach($users as $user){
							$author_id = $user->ID;
						?>
						<div data-wow-delay="0.3s" class="text-center cms-grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
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
						        <h4 class="modal-title" id="myModalLabel"><?php echo $user->display_name; ?></h4>
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
	</div><!-- #main -->


	<?php get_footer(); ?>