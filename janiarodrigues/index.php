<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The main template file.
 *
 * Works as index and fallback.
 *
 */

 get_header();

?>
<div class="content">
    <section class="info-section blog-section">
        <div class="second-caption style-2">
	        <?php
	        $title=$post_excerpt='';
	        $blog = get_option( 'page_for_posts' );
	        $post_id = get_post( $blog );
	        if( $post_id ){
		        $title = $post_id->post_title;
		        $post_excerpt = $post_id->post_excerpt;
	        }
	        ?>
            <h3 class="h5 md title font-fam-2">
				<?php
				switch ( true ) {
					# Home page
					case ( is_home() ):
						$page_for_posts = get_option('page_for_posts', true);
						if ($page_for_posts) {
							print get_the_title($page_for_posts);
						} else {
							_e('Latest Posts', 'floris');
						}
						break;
					# Archive
					case ( is_archive() ):
						$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
						if ($term && isset($term->name)) {
							print wp_kses_post( $term->name );
						} elseif (is_post_type_archive()) {
							$queried_object = get_queried_object();
							if (isset($queried_object->labels) && isset($queried_object->labels->name)) {
								print wp_kses_post( $queried_object->labels->name );
							}
						} elseif (is_day()) {
							printf(__('Daily Archives: %s', 'floris'), get_the_date());
						} elseif (is_month()) {
							printf(__('Monthly Archives: %s', 'floris'), get_the_date('F Y'));
						} elseif (is_year()) {
							printf(__('Yearly Archives: %s', 'floris'), get_the_date('Y'));
						} elseif (is_author()) {
							global $post;
							$author_id = $post->post_author;
							$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
							$google_profile = get_the_author_meta('google_profile', $curauth->ID);
							if ($google_profile) {
								printf(__('Author Archives:', 'floris'));
								print '<a href="' . esc_url($google_profile) . '" rel="me">' . $curauth->display_name . '</a>';
							} else {
								printf(__('Author Archives: %s', 'floris'), get_the_author_meta('display_name', $author_id));
							}
						} else {
							single_cat_title();
						}
						break;
					# Search
					case ( is_search() ):
						printf(__('Search Results for %s', 'floris'), get_search_query());
						break;
					# 404 black hole o_O
					case ( is_404() ):
						_e('File Not Found', 'floris');
						break;
					# Default
					default:
						the_title();
				}
				?>
			</h3>
            <?php if($post_excerpt){print wp_kses_post( '<div class="simple-text"><p>'.$post_excerpt.'</p></div>' );} ?>
        </div>
        <?php
        	$blog_type = floris_get_option( 'button-set-blog' );
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
		            <div class="blog-box">
		            	<?php 
		                	if (have_posts()) {  
		                    	while (have_posts()) { the_post();
		                    		if( has_post_format( 'video' ) ) {
		                    			$video_block = $video = '';
							            $video_block = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
							            if(isset($video_block['video-url'])){ $video = $video_block['video-url'];}
		                ?>
										<div <?php post_class('blog-item left animation-img video_block'); ?>>
							            	<?php if( function_exists( 'floris_post_video' ) && $video ){ floris_post_video($video); } ?>
						                    <div class="vertical-align">
						                        <?php if (floris_get_option('post_date', 1)){ print wp_kses_post( '<span class="date">'.get_the_time('F j, Y').'</span>' ); }?>
						                        <?php if (floris_get_option('post_title', 1)){ print wp_kses_post( '<a href="'.get_the_permalink().'" class="font-fam-2">'.get_the_title().'</a>' );} ?>
						                        <div class="post-info">
						                            <?php if (floris_get_option('post_cat', 1)){ the_category(', ');} ?>
						                            <?php if (floris_get_option('post_author', 1)){ print wp_kses_post( '<a href="'.get_author_posts_url( $post->ID, get_the_author_meta( "user_nicename" ) ).'">'.esc_html__('By','floris').' '.get_the_author().'</a>' );}?>
						                            <?php if (floris_get_option('post_comments', 1)){ $comments_count = wp_count_comments($post->ID); print wp_kses_post( '<span><i class="icon-comment-empty"></i>'.$comments_count->total_comments.'</span>' ); }?>
						                        	<?php if (floris_get_option('post_like', 1)){ floris_get_simple_likes_button( get_the_ID() );}?>
						                        </div>
						                        <div class="simple-text">
						                            <?php if (floris_get_option('post_excerpt', 1)){ the_excerpt(); }?>
						                        </div>
						                    </div>
						                </div>
									<?php } else { ?>
						                <div <?php post_class('blog-item left animation-img'); ?>>
						            		<?php 
						                		$image_id = get_post_thumbnail_id();
				                      			$image_link  = wp_get_attachment_url($image_id);
				                      			if($image_link){
				                      		?>
							                    <div class="image">
							                        <div class="bg">
							                        	<a href="<?php the_permalink(); ?>"><img src="<?php print esc_url( $image_link ); ?>" alt="blog-image"></a>
							                        </div>
							                    </div>
							                <?php } ?>
						                    <div class="vertical-align <?php if(!$image_link){ print esc_html('post_no_image');} ?>">
						                        <?php if (floris_get_option('post_date', 1)){ print wp_kses_post( '<span class="date">'.get_the_time('F j, Y').'</span>' ); }?>
						                        <?php if (floris_get_option('post_title', 1)){ print wp_kses_post( '<a href="'.get_the_permalink().'" class="font-fam-2">'.get_the_title().'</a>' );} ?>
						                        <div class="post-info">
						                            <?php if (floris_get_option('post_cat', 1)){ the_category(', ');} ?>
						                            <?php if (floris_get_option('post_author', 1)){ print wp_kses_post( '<a href="'.get_author_posts_url( $post->ID, get_the_author_meta( "user_nicename" ) ).'">'.esc_html__('By','floris').' '.get_the_author().'</a>' );}?>
						                            <?php if (floris_get_option('post_comments', 1)){ $comments_count = wp_count_comments($post->ID); print wp_kses_post( '<span><i class="icon-comment-empty"></i>'.$comments_count->total_comments.'</span>' ); }?>
						                        	<?php if (floris_get_option('post_like', 1)){ floris_get_simple_likes_button( get_the_ID() );}?>
						                        </div>
						                        <div class="simple-text">
						                            <?php if (floris_get_option('post_excerpt', 1)){ the_excerpt(); }?>
						                        </div>
						                    </div>
						                </div>
		                		<?php } }
							floris_pagination($post->max_num_pages);
							} 
						wp_reset_postdata();?>
		            </div>
		        </div>
        	<?php } elseif($blog_type == '2'){ ?> 
        		<!--no sidebar-->
		        <div class="container blog-container">
		        	<?php 
		                if (have_posts()) {  
		                    while (have_posts()) { the_post();
		                    	if( has_post_format( 'video' ) ) {
	                    			$video_block = $video = '';
						            $video_block = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
						            if(isset($video_block['video-url'])){ $video = $video_block['video-url'];}
	                ?>
									<div <?php post_class('blog-item left animation-img video_no_sidebar'); ?>>
						            	<?php if( function_exists( 'floris_post_video' ) && $video ){ floris_post_video($video); } ?>
					                    <div class="vertical-align">
					                        <?php if (floris_get_option('post_date', 1)){ print wp_kses_post( '<span class="date">'.get_the_time('F j, Y').'</span>' ); }?>
					                        <?php if (floris_get_option('post_title', 1)){ print wp_kses_post( '<a href="'.get_the_permalink().'" class="font-fam-2">'.get_the_title().'</a>' );} ?>
					                        <div class="post-info">
					                            <?php if (floris_get_option('post_cat', 1)){ the_category(', ');} ?>
					                            <?php if (floris_get_option('post_author', 1)){ print wp_kses_post( '<a href="'.get_author_posts_url( $post->ID, get_the_author_meta( "user_nicename" ) ).'">'.esc_html__('By','floris').' '.get_the_author().'</a>' );}?>
					                            <?php if (floris_get_option('post_comments', 1)){ $comments_count = wp_count_comments($post->ID); print wp_kses_post( '<span><i class="icon-comment-empty"></i>'.$comments_count->total_comments.'</span>' ); }?>
					                        	<?php if (floris_get_option('post_like', 1)){ floris_get_simple_likes_button( get_the_ID() );}?>
					                        </div>
					                        <div class="simple-text">
					                            <?php if (floris_get_option('post_excerpt', 1)){ the_excerpt(); }?>
					                        </div>
					                    </div>
					                </div>
								<?php } else { ?>
			                    	<div <?php post_class('blog-item blog-type-1 left animation-img'); ?>>
			                    		<?php 
					                		$image_id = get_post_thumbnail_id();
			                      			$image_link  = wp_get_attachment_url($image_id);
			                      			if($image_link){
			                      		?>
						                    <div class="image">
						                        <div class="bg">
						                        	<a href="<?php the_permalink(); ?>"><img src="<?php print esc_url( $image_link ); ?>" alt="blog-image"></a>
						                        </div>
						                    </div>
						                <?php } ?>
					                    <div class="title vertical-align <?php if(!$image_link){ print esc_html('post_no_image');} ?>">
						                    <?php if (floris_get_option('post_date', 1)){ print wp_kses_post( '<span class="date">'.get_the_time('F j, Y').'</span>' ); }?>
						                    <?php if (floris_get_option('post_title', 1)){ print wp_kses_post( '<a href="'.get_the_permalink().'" class="font-fam-2">'.get_the_title().'</a>' );} ?>
						                    <div class="post-info">
						                        <?php if (floris_get_option('post_cat', 1)){  the_category(', ');} ?>
						                        <?php if (floris_get_option('post_author', 1)){ print wp_kses_post( '<a href="'.get_author_posts_url( $post->ID, get_the_author_meta( "user_nicename" ) ).'">'.esc_html__('By','floris').' '.get_the_author().'</a>' );}?>
						                        <?php if (floris_get_option('post_comments', 1)){ $comments_count = wp_count_comments($post->ID); print wp_kses_post( '<span><i class="icon-comment-empty"></i>'.$comments_count->total_comments.'</span>' ); }?>
						                        <?php if (floris_get_option('post_like', 1)){ floris_get_simple_likes_button( get_the_ID() );}?>
						                    </div>
						                    <div class="simple-text">
						                        <?php if (floris_get_option('post_excerpt', 1)){ the_excerpt(); }?>
						                    </div>
						                </div>
						            </div>
		             		<?php } }
		             	floris_pagination($post->max_num_pages);
						} 
					wp_reset_postdata();?>
		        </div>
		    <?php }else{ ?>
		    	<!--right sidebar-->
		    	<div class="container blog-container blog-sidebar">
		            <div class="blog-box">
		            	<?php 
		                	if (have_posts()) {  
		                    	while (have_posts()) { the_post(); 
		                    		if( has_post_format( 'video' ) ) {
		                    			$video_block = $video = '';
							            $video_block = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
							            if(isset($video_block['video-url'])){ $video = $video_block['video-url'];}
		                ?>
										<div <?php post_class('blog-item left animation-img video_block'); ?>>
							            	<?php if( function_exists( 'floris_post_video' ) && $video ){ floris_post_video($video); } ?>
						                    <div class="vertical-align">
						                        <?php if (floris_get_option('post_date', 1)){ print wp_kses_post( '<span class="date">'.get_the_time('F j, Y').'</span>' ); }?>
						                        <?php if (floris_get_option('post_title', 1)){ print wp_kses_post( '<a href="'.get_the_permalink().'" class="font-fam-2">'.get_the_title().'</a>' );} ?>
						                        <div class="post-info">
						                            <?php if (floris_get_option('post_cat', 1)){ the_category(', ');} ?>
						                            <?php if (floris_get_option('post_author', 1)){ print wp_kses_post( '<a href="'.get_author_posts_url( $post->ID, get_the_author_meta( "user_nicename" ) ).'">'.esc_html__('By','floris').' '.get_the_author().'</a>' );}?>
						                            <?php if (floris_get_option('post_comments', 1)){ $comments_count = wp_count_comments($post->ID); print wp_kses_post( '<span><i class="icon-comment-empty"></i>'.$comments_count->total_comments.'</span>' ); }?>
						                        	<?php if (floris_get_option('post_like', 1)){ floris_get_simple_likes_button( get_the_ID() );}?>
						                        </div>
						                        <div class="simple-text">
						                            <?php if (floris_get_option('post_excerpt', 1)){ the_excerpt(); }?>
						                        </div>
						                    </div>
						                </div>
									<?php } else { ?>
						                <div <?php post_class('blog-item left animation-img'); ?>>
					            			<?php 
						                		$image_id = get_post_thumbnail_id();
				                      			$image_link  = wp_get_attachment_url($image_id);
				                      			if($image_link){
				                      		?>
							                    <div class="image">
							                        <div class="bg">
							                        	<a href="<?php the_permalink(); ?>"><img src="<?php print esc_url( $image_link ); ?>" alt="blog-image"></a>
							                        </div>
							                    </div>
							                <?php } ?>
						                    <div class="vertical-align <?php if(!$image_link){ print esc_html('post_no_image');} ?>">
						                        <?php if (floris_get_option('post_date', 1)){ print wp_kses_post( '<span class="date">'.get_the_time('F j, Y').'</span>' ); }?>
						                        <?php if (floris_get_option('post_title', 1)){ print wp_kses_post( '<a href="'.get_the_permalink().'" class="font-fam-2">'.get_the_title().'</a>' );} ?>
						                        <div class="post-info">
						                            <?php if (floris_get_option('post_cat', 1)){ the_category(', ');} ?>
						                            <?php if (floris_get_option('post_author', 1)){ print wp_kses_post( '<a href="'.get_author_posts_url( $post->ID, get_the_author_meta( "user_nicename" ) ).'">'.esc_html__('By','floris').' '.get_the_author().'</a>' );}?>
						                            <?php if (floris_get_option('post_comments', 1)){ $comments_count = wp_count_comments($post->ID); print wp_kses_post( '<span><i class="icon-comment-empty"></i>'.$comments_count->total_comments.'</span>' ); }?>
						                        	<?php if (floris_get_option('post_like', 1)){ floris_get_simple_likes_button( get_the_ID() );}?>
						                        </div>
						                        <div class="simple-text">
						                            <?php if (floris_get_option('post_excerpt', 1)){ the_excerpt(); }?>
						                        </div>
						                    </div>
						                </div>
		                		<?php } }
							floris_pagination($post->max_num_pages);							
							} 
						wp_reset_postdata();?>
		            </div>
		            <div class="sidebar-box">
		            	<?php 
		            		if ( is_active_sidebar( 'sidebar-1' )){
		            			dynamic_sidebar('Single Blog');
		            		}else {
		            			esc_html_e( 'Add widgets in Sidebar Single Blog', 'floris' );
			                }
		            	?>
		            </div>
		        </div>
		    <?php } ?>

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
<?php get_footer();