<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The main template file.
 *
 * It is used to show single post.
 *
 */

get_header();

?>
<div class="content">
    <section class="info-section blog-section">
        <div class="container">
            <div class="second-caption style-2">
                <?php if (floris_get_option('post_date', 1)){ print wp_kses_post( '<span class="single-post-data">'.get_the_time('F j, Y').'</span>' );} ?>
                <h3 class="h5 md title font-fam-2"><?php the_title(); ?></h3>
            </div>
        </div>
        <?php 
        	wpb_set_post_views(get_the_ID());
        	$blog_type = floris_get_option( 'button-set-single' );
        	if($blog_type == '1'){ 
       	?>
       		<!--left sidebar-->
       		<div class="container blog-container blog-sidebar">
       			<div class="sidebar-box sidebar-left">
	            	<?php 
	            		if ( is_active_sidebar( 'sidebar-1' )){
	            			dynamic_sidebar('Single Blog');
	            		}else {
		                    esc_html_e( 'Add widgets in Sidebar Single Blog', 'floris' );
		                }
	            	?>
	            </div>
	            <div class="blog-box single-box single-box-lef">
	            	<div class="special-style">
		            	<?php 
		            		if (floris_get_option('post_image', 1)){
		            			if( has_post_format( 'video' ) ) {
	                    			$video_block = $video = '';
						            $video_block = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
						            if(isset($video_block['video-url'])){ $video = $video_block['video-url'];}
									if( function_exists( 'floris_post_video' ) && $video ){ floris_post_video($video); }
								} else {
			            			$image_id = get_post_thumbnail_id();
			                    	$image_link  = wp_get_attachment_url($image_id);
			                    	if($image_link){ print wp_kses_post( '<div class="text-center"><img src="'.esc_url( $image_link ).'" alt="image"></div>' );}
			                    }
		                   	}
		                ?>
		                <?php 
		              		if ( have_posts() ) : 
	                            while ( have_posts() ) : the_post();
	                        		the_content();
	                        	endwhile;
	                        endif;
	                       	wp_reset_postdata();
		                ?>
	                </div>
	                <div class="info-part">
	                	<?php 
	                		if (floris_get_option('post_tag', 1)){
		                		$tags =  get_the_tags(); 
		                		if($tags){
		                			print wp_kses_post( '<div class="info-post-col"><h4>'.esc_html__( 'tags', 'floris' ).':</h4>' );
		                			the_tags('<ul class="tag-list"><li>','</li><li>','</li></ul>'); 
		                			print wp_kses_post( '</div>' );
		                		}
	                		}
	                	?>
	                	<?php 
	                		if (floris_get_option('post_share', 1)){ 
	                			$fb = floris_get_option('post_share_fb'); 
								$tw = floris_get_option('post_share_tw'); 
								$g = floris_get_option('post_share_g'); 
								$p = floris_get_option('post_share_p');
								if($fb || $tw || $g || $p){ 
	                	?>
				                    <div class="info-post-col">
				                        <h4><?php esc_attr_e( 'share:', 'floris' ); ?></h4>
				                        <?php
											$pinImg = '';
											if(has_post_thumbnail( $post->ID ) ) {
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
												$pinImg = urlencode($image[0]);
											}
											$permalink = esc_attr( urlencode( get_permalink() ) );
											$title = esc_attr( urlencode( get_the_title() ) );
										?>
										<ul class="single-share">
											<?php
												if($fb){?>
													<li><a href="<?php print esc_url( $fb );?>/sharer.php?u=<?php print esc_attr( urlencode( get_permalink() ) ); ?>" target="_blank" class="icon-facebook"></a></li>
												<?php }
												if($tw){?>
													<li><a href="<?php print esc_url( $tw );?>/home?status='<?php print esc_attr( urlencode( get_the_title() ) ); ?>'-'<?php print esc_attr( urlencode( get_permalink() ) ); ?>" target="_blank" class="icon-twitter"></a></li>
												<?php }
												if($g){?>
													<li><a href="<?php print esc_url( $g );?>/share?url='<?php print esc_attr( urlencode( get_permalink() ) ); ?>&title=<?php print esc_attr( urlencode( get_the_title() ) ); ?>" target="_blank" class="icon-gplus"></a></li>
												<?php }
													if($p){?>
														<li><a href="<?php print esc_url( $p ); ?>/pin/create/button/?url=<?php print esc_attr( urlencode( get_permalink() ) ); ?>&media=<?php print esc_url( $pinImg ); ?>&description=<?php print esc_attr( urlencode( get_the_title() ) ); ?>" target="_blank" class="icon-pinterest"></a></li>
												<?php }	?>
				                        </ul>
				                    </div>
		                <?php } } ?>
	                </div>

	                <div class="comment-block">
	                	<?php 
	                		if (floris_get_option('post_comments', 1)){ 
	                			if ( comments_open() ) { comments_template( '', true ); } 
	                		}
	                	?>
	                </div>
	            </div>
	        </div>
       	<?php } elseif($blog_type == '2'){ ?>
       		<!--no sidebar-->
       		<div class="container blog-container blog-sidebar">
	            <div class="single-box single-box-full">
	            	<div class="special-style">
		            	<?php 
		            		if (floris_get_option('post_image', 1)){
		            			if( has_post_format( 'video' ) ) {
	                    			$video_block = $video = '';
						            $video_block = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
						            if(isset($video_block['video-url'])){ $video = $video_block['video-url'];}
									if( function_exists( 'floris_post_video' ) && $video ){ floris_post_video($video); }
								} else {
			            			$image_id = get_post_thumbnail_id();
			                    	$image_link  = wp_get_attachment_url($image_id);
			                    	if($image_link){ print wp_kses_post( '<div class="text-center"><img src="'.esc_url( $image_link ).'" alt="image"></div>' );}
			                    }
		                   	}
		                ?>
		                <?php 
		              		if ( have_posts() ) : 
	                            while ( have_posts() ) : the_post();
	                        		the_content();
	                        	endwhile;
	                        endif;
	                       	wp_reset_postdata();
		                ?>
	                </div>
	                <div class="info-part">
	                	<?php 
	                		if (floris_get_option('post_tag', 1)){
		                		$tags =  get_the_tags(); 
		                		if($tags){
		                			print wp_kses_post( '<div class="info-post-col"><h4>'.esc_html__( 'tags', 'floris' ).':</h4>' );
		                			the_tags('<ul class="tag-list"><li>','</li><li>','</li></ul>'); 
		                			print wp_kses_post( '</div>' );
		                		}
	                		}
	                	?>
	                	<?php 
	                		if (floris_get_option('post_share', 1)){ 
	                			$fb = floris_get_option('post_share_fb'); 
								$tw = floris_get_option('post_share_tw'); 
								$g = floris_get_option('post_share_g'); 
								$p = floris_get_option('post_share_p');
								if($fb || $tw || $g || $p){ 
	                	?>
				                    <div class="info-post-col">
				                        <h4><?php esc_attr_e( 'share:', 'floris' ); ?></h4>
				                        <?php
											$pinImg = '';
											if(has_post_thumbnail( $post->ID ) ) {
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
												$pinImg = urlencode($image[0]);
											}
											$permalink = esc_attr( urlencode( get_permalink() ) );
											$title = esc_attr( urlencode( get_the_title() ) );
										?>
										<ul class="single-share">
											<?php
												if($fb){?>
													<li><a href="<?php print esc_url( $fb );?>/sharer.php?u=<?php print esc_attr( urlencode( get_permalink() ) ); ?>" target="_blank" class="icon-facebook"></a></li>
												<?php }
												if($tw){?>
													<li><a href="<?php print esc_url( $tw );?>/home?status='<?php print esc_attr( urlencode( get_the_title() ) ); ?>'-'<?php print esc_attr( urlencode( get_permalink() ) ); ?>" target="_blank" class="icon-twitter"></a></li>
												<?php }
												if($g){?>
													<li><a href="<?php print esc_url( $g );?>/share?url='<?php print esc_attr( urlencode( get_permalink() ) ); ?>&title=<?php print esc_attr( urlencode( get_the_title() ) ); ?>" target="_blank" class="icon-gplus"></a></li>
												<?php }
													if($p){?>
														<li><a href="<?php print esc_url( $p ); ?>/pin/create/button/?url=<?php print esc_attr( urlencode( get_permalink() ) ); ?>&media=<?php print esc_url( $pinImg ); ?>&description=<?php print esc_attr( urlencode( get_the_title() ) ); ?>" target="_blank" class="icon-pinterest"></a></li>
												<?php }	?>
				                        </ul>
				                    </div>
		                <?php } } ?>
	                </div>

	                <div class="comment-block">
	                	<?php 
	                		if (floris_get_option('post_comments', 1)){ 
	                			if ( comments_open() ) { comments_template( '', true ); } 
	                		}
	                	?>
	                </div>
	            </div>
	        </div>
		<?php }else{ ?>
		    <!--right sidebar-->
	        <div class="container blog-container blog-sidebar">
	            <div class="blog-box single-box">
	            	<div class="special-style">
		            	<?php 
		            		if (floris_get_option('post_image', 1)){
		            			if( has_post_format( 'video' ) ) {
	                    			$video_block = $video = '';
						            $video_block = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
						            if(isset($video_block['video-url'])){ $video = $video_block['video-url'];}
									if( function_exists( 'floris_post_video' ) && $video ){ floris_post_video($video); }
								} else {
			            			$image_id = get_post_thumbnail_id();
			                    	$image_link  = wp_get_attachment_url($image_id);
			                    	if($image_link){ print wp_kses_post( '<div class="text-center"><img src="'.esc_url( $image_link ).'" alt="image"></div>' );}
			                    }
		                   	}
		                ?>
		                <?php 
		              		if ( have_posts() ) : 
	                            while ( have_posts() ) : the_post();
	                        		the_content();
	                        		wp_link_pages($floris_pag_nav);;
	                        	endwhile;
	                        endif;
	                       	wp_reset_postdata();
		                ?>
	                </div>
	                <div class="info-part">
	                	<?php 
	                		if (floris_get_option('post_tag', 1)){
		                		$tags =  get_the_tags(); 
		                		if($tags){
		                			print wp_kses_post( '<div class="info-post-col"><h4>'.esc_html__( 'tags', 'floris' ).':</h4>' );
		                			the_tags('<ul class="tag-list"><li>','</li><li>','</li></ul>'); 
		                			print wp_kses_post( '</div>' );
		                		}
	                		}
	                	?>
	                	<?php 
	                		if (floris_get_option('post_share', 1)){ 
	                			$fb = floris_get_option('post_share_fb'); 
								$tw = floris_get_option('post_share_tw'); 
								$g = floris_get_option('post_share_g'); 
								$p = floris_get_option('post_share_p');
								if($fb || $tw || $g || $p){ 
	                	?>
				                    <div class="info-post-col">
				                        <h4><?php esc_attr_e( 'share:', 'floris' ); ?></h4>
				                        <?php
											$pinImg = '';
											if(has_post_thumbnail( $post->ID ) ) {
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
												$pinImg = urlencode($image[0]);
											}
											$permalink = esc_attr( urlencode( get_permalink() ) );
											$title = esc_attr( urlencode( get_the_title() ) );
										?>
										<ul class="single-share">
											<?php
												if($fb){?>
													<li><a href="<?php print esc_url( $fb );?>/sharer.php?u=<?php print esc_attr( urlencode( get_permalink() ) ); ?>" target="_blank" class="icon-facebook"></a></li>
												<?php }
												if($tw){?>
													<li><a href="<?php print esc_url( $tw );?>/home?status='<?php print esc_attr( urlencode( get_the_title() ) ); ?>'-'<?php print esc_attr( urlencode( get_permalink() ) ); ?>" target="_blank" class="icon-twitter"></a></li>
												<?php }
												if($g){?>
													<li><a href="<?php print esc_url( $g );?>/share?url='<?php print esc_attr( urlencode( get_permalink() ) ); ?>&title=<?php print esc_attr( urlencode( get_the_title() ) ); ?>" target="_blank" class="icon-gplus"></a></li>
												<?php }
													if($p){?>
														<li><a href="<?php print esc_url( $p ); ?>/pin/create/button/?url=<?php print esc_attr( urlencode( get_permalink() ) ); ?>&media=<?php print esc_url( $pinImg ); ?>&description=<?php print esc_attr( urlencode( get_the_title() ) ); ?>" target="_blank" class="icon-pinterest"></a></li>
												<?php }	?>
				                        </ul>
				                    </div>
		                <?php } } ?>
	                </div>

	                <div class="comment-block">
	                	<?php 
	                		if (floris_get_option('post_comments', 1)){ 
	                			if ( comments_open() ) { comments_template( '', true ); } 
	                		}
	                	?>
	                </div>
	            </div>
	            <div class="sidebar-box">
	            	<?php 
	            		if ( is_active_sidebar( 'sidebar-1' )){
	            			dynamic_sidebar('Single Blog');
	            		}else {
		                    esc_html_e( 'Add widgets in Sidebar Single Blog', 'floris');
		                }
	            	?>
	            </div>
	        </div>
        <?php } ?>
		<?php 
			if (floris_get_option('post_related', 1)){ 
				$orig_post = $post;
				global $post;
				$categories = get_the_category($post->ID);
				if ($categories) {
					$category_ids = array();
					foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
					$args=array(
						'category__in' => $category_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=> 3,
						'ignore_sticky_posts'=>1
					);
					$my_query = new wp_query( $args );
					if( $my_query->have_posts() ) {?>
						<div class="related-block">
				            <div class="container related-container">
			                	<div class="second-caption style-2">
			                    	<h3 class="h5 md title font-fam-2"><?php esc_html_e( 'Related Posts', 'floris' ); ?></h3>
			                	</div>
			                	<div class="row">
						<?php while( $my_query->have_posts() ) {
							$my_query->the_post();?>
								<div class="col-sm-4 related-box">
									<?php 
					            		$related_image_id = get_post_thumbnail_id();
					                    $related_image_link  = wp_get_attachment_url($related_image_id);
					                    if($related_image_link){ print wp_kses_post( '<a href="'.get_the_permalink().'"><img src="'.esc_url( $related_image_link ).'" alt="related_image"></a>' );}
					                ?>
			                        <span><?php the_time('F j, Y'); ?></span>
			                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			                    </div>
						<?php } ?>
						      	</div>
			            	</div>
			        	</div>
					<?php }
				}
				$post = $orig_post;
				wp_reset_query();
			}
		?>
    </section>
    <?php
		if( floris_get_option('post_subscribe', 1) ) {
			$mailchimp_ID = floris_get_option('mailchimp_ID');
			$mailchimp_title = floris_get_option('mailchimp_title');
			$mailchimp_title2 = floris_get_option('mailchimp_title2');
			$mailchimp_button = floris_get_option('mailchimp_button');
			if($mailchimp_ID){
	?>
			<section class="section-xs">
			    <div class="container">
			    	<?php 
						$shortcode='';
						if($mailchimp_title){ $shortcode.=' title="'.$mailchimp_title.'" '; }
						if($mailchimp_title2){ $shortcode.=' description="'.$mailchimp_title2.'" '; }
						if($mailchimp_button){ $shortcode.=' submit="'.$mailchimp_button.'" '; }
						if( function_exists( 'floris_mailchimp' ) ){ floris_mailchimp($mailchimp_ID, $shortcode); } else { _e('<span class="not_floris">Floris Plugin not Activated!</span>','floris'); }
					?>
				</div>
			</section>
		<?php } } ?>
</div>	
<?php get_footer(); ?>