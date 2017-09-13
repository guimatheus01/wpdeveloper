<?php get_header();
	if (have_posts()) {
	while (have_posts()) {
the_post();
?>
<div id="main" class="main clearfix">
	<div id="page-title" class="page-title" <?php if (has_post_thumbnail()): ?>	style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>') !important;" <?php endif ?>>
		<div class="container">
			<div class="row">
				<div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<h1><?php echo get_the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="section mb-4">
		<div class="container">
			<div class=" pb-8 row">
				<?php if(function_exists( 'wp_bannerize' ))
				wp_bannerize( 'group=index-1024-143-2&random=1&limit=1' ); ?>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-lg-8 mb-5">
					<div class="single-post">
						<article>
							<?php if (has_post_thumbnail()): ?>
							<div class="entry-media">
								<img width="1170" height="790" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
							</div>
							<?php endif ?>
							<div class="entry-header">
								<div class="entry-meta cms-meta">
									<ul class="list-unstyled list-inline">
										<li class="detail-date">
											<a><?php echo get_the_date(); ?></a>
										</li>
										<li class="detail-author">
											<a>Em 
												<?php
													$categories = get_the_category();
													if ( ! empty( $categories ) ) {
													echo esc_html( $categories[0]->name );
													}
												?>
											</a>
										</li>
										<li class="detail-date">
											<a>Por <?php echo get_the_author(); ?></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
							<div class="entry-footer clearfix">
								<span class="post-share-title left">
									<span class="h6"><i class="pe-7s-share"></i> Compartilhar</span>
									<span class="post-share">
										<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank""><i class="fa fa-facebook"></i></a>
										<a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
										<a target="_blank" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="_blank"><i class="fa fa-pinterest"></i></a>
										<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" ><i class="fa fa-google-plus"></i></a>
										<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a>
									</span>
								</span>
								<span class="single-tags">
									<span class="h6">Tags</span>
									<span class="tags-list list-tags">
										<?php
											if(get_the_tag_list()) {
												echo get_the_tag_list('<a>', '</a>');
											}
										?>
									</span>
								</span>
							</div>
						</article>
						<div class="entry-author clearfix">
							<div class="entry-author-avatar col-xs-12 nopaddingleft">
								<div class="author-avatar">
									<img alt="" src="<?php echo the_author_image_url(); ?>" class="avatar" height="130" width="130" />
								</div>
								<div class="author-info">
									<h3><small>Escrito por</small><br><?php echo get_the_author_meta('display_name'); ?></h3>
									<p>
										<ul class="list-inline">
										<?php 
											$facebook_profile = get_the_author_meta( 'facebook_profile' );
											if ( $facebook_profile && $facebook_profile != '' ) {
												echo '<li><a target="_blank" class="social-icon-author" href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';
											}
											$insta_profile = get_the_author_meta( 'insta_profile' );
											if ( $insta_profile && $insta_profile != '' ) {
												echo '<li><a target="_blank" class="social-icon-author" href="' . esc_url($insta_profile) . '"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
											}
											$twitter_profile = get_the_author_meta( 'twitter_profile' );
											if ( $twitter_profile && $twitter_profile != '' ) {
												echo '<li><a target="_blank" class="social-icon-author" href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
											}
											$user_url = get_the_author_meta( 'user_url' );
											if ( $user_url && $user_url != '' ) {
												echo '<li><a target="_blank" class="social-icon-author" href="' . esc_url($user_url) . '"><i class="fa fa-globe" aria-hidden="true"></i></a></li>';
											}
										?>
										</ul>
									</p>
									<?php $link_continue = preg_replace('/[ -]+/' , '-' , get_the_author_meta('display_name')); ?>
									<p><a href="<?php echo home_url('/colunista/'); ?><?php echo strtolower($link_continue); ?>">Leia sobre <?php echo get_the_author_meta('first_name'); ?> [+]</a></p>
								</div>
							</div>
						</div>
						<div id="comments" class="comments-area nopaddingleft nopaddingright">
							<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="6"></div>
						</div>
					</div>
				</div>
				<?php get_sidebar('right'); ?>
			</div>
		</div>
	</div>
	</div><!-- #main -->
	<?php }; }; get_footer(); ?>