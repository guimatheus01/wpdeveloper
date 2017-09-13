<?php get_header(); ?>

    <div class="content no-bg section-lg sm">
    	<div class="container">
    		<div class="second-caption">
				<div class="simple-text">
				   	<p>
		                <?php 
							global $wp_query;
							print esc_html( $wp_query->found_posts );
							if ($wp_query->found_posts > 1) {
								esc_html_e(' Resultados encontrados para "', 'floris');
							} else {
								esc_html_e(' Resultado encontrados para "', 'floris');
							}
							the_search_query();
							print wp_kses_post( '"' );
		               	?>
		            </p>
				</div>
			</div>	    
		    <section>
		    	<div class="section-container container-search">
					
		        <?php if(have_posts()) : ?>
					<div class="to-search-items clearfix">
						<?php 
						while (have_posts()) : the_post(); 
						$post_id      = $post->ID;
						$post_type    = get_post_type( $post_id );
						$post_thumb   = get_the_post_thumbnail( $post_id ,'full');
						$post_link    = esc_url(get_permalink( $post_id ));
						$post_content = get_the_excerpt();
						$post_content = substr($post_content, 0, 290);
						$post_content = substr($post_content, 0, strrpos($post_content, ' '));
						$post_date    = get_the_time('F j, Y');
						$post_coms    = '<span class="to-comment-icon"><i class="fa fa-comment-o"></i>'. get_comments_number() .'</span>';

						if ( $post_type == 'post' ) {
							$post_type = 'blog';
						} 
						?>
						<div class="to-search-item">
		                	<div class="category-item hover-image-item">
		                		<div class="image">
			                        <a href="<?php print esc_url( $post_link ); ?>">
			                        <?php 
									if (get_post_format($post_id) == 'gallery') {
										$gallery_ids = themeone_grab_ids_from_gallery();
										if (!empty($gallery_ids)) {
											$post_thumb  = array_slice($gallery_ids, 0, 1);
											$post_thumb1  = array_shift($post_thumb);
											$post_thumb  = wp_get_attachment_image($post_thumb1, 'full');
											print wp_kses_post( $post_thumb );
										}
									} else {
										if ( $post_thumb != '' ) {
											print wp_kses_post( get_the_post_thumbnail( $post_id ,'full') ); 
										} else if ( $post_thumb == '' && $post_type == 'page') {
											print wp_kses_post( '<i class="fa fa-file-text-o"></i>' );
										} else if ( $post_thumb == '' && $post_type == 'blog') {
											print wp_kses_post( '<i class="fa fa-pencil"></i>' );
										} else if ( $post_thumb == '' && $post_type == 'portfolio') {
											print wp_kses_post( '<i class="fa fa-picture-o"></i>' );
										} else if ( $post_thumb == '' && $post_type == 'product') {
											print wp_kses_post( '<i class="steadysets-icon-bag"></i>' );
										}
									}
									?>
			                        </a>
			                    </div>
		                    <div class="item-title">
		                        <h4 class="h4"><a href="<?php print esc_url( $post_link ); ?>"><?php the_title(); ?></a></h4>
		                        <p class="sub-content"><?php print wp_kses_post( $post_content ); ?></p>
		                    </div>
		                    </div>
						</div>
						<?php 
						endwhile; 
						?>
						<?php floris_pagination($post->max_num_pages);?>
						<?php wp_reset_postdata(); ?>
					</div>
					<?php else: ?>
					    <div class="second-caption style-2">
							<div class="simple-text">
				   				<p><?php esc_html_e('Desculpe, não há mensagens para mostrar.', 'floris'); ?><br /><?php esc_html_e('Tente procurar novamente...', 'floris'); ?></p>
				   			</div>
				   		</div>
					<?php endif; ?>
		        </div>
		    </section>
		</div>
	</div>

<?php get_footer();