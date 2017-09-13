<?php
$title = $amount = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );


?>

    <div class="skew-wrap <?php print esc_html($css_class); ?>">
        <?php if (!empty($title)) { ?>
        <div class="second-caption style-2">
            <h3 class="h5 sm title font-fam-2"><?php print esc_html($title); ?></h3>  
        </div>
        <?php } ?>
        <?php
            $args = array( 'posts_per_page' => $amount );
            $query = new WP_Query( $args );
            $i = 0;
            while ( $query->have_posts() ) {
                $query->the_post() 
        ?>
                <?php if (($i % 2) == 0 ) { 
                        if( has_post_format( 'video' ) ) {
                            $video_block = $video = '';
                            $video_block = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
                            if(isset($video_block['video-url'])){ $video = $video_block['video-url'];}
                ?>
                                <div <?php post_class('blog-item left video_no_sidebar video_short'); ?>>
                        <?php 
                                if( function_exists( 'floris_post_video' ) && $video ){ floris_post_video($video); } else { _e('<span class="not_floris">Floris Plugin not Activated!</span>','floris'); }
                            }else {
                                $thumb = get_post_thumbnail_id();
                                $image_link  = wp_get_attachment_url($thumb);
                        ?>
                    <div <?php post_class('blog-item left'); ?>>
                                <div class="image">
                                    <div class="bg">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php print esc_url( $image_link ); ?>" alt="blog-image"></a>
                                    </div>
                                </div>
                            <?php } ?>
                        <div class="title vertical-align">
                            <span class="date"><?php the_time('F j, Y'); ?></span> 
                            <a href="<?php the_permalink(); ?>" class="font-fam-2"><?php the_title(); ?></a>
                            <div class="simple-text">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                <?php } else { 
                        if( has_post_format( 'video' ) ) {
                            $video_block = $video = '';
                            $video_block = get_post_meta( get_the_ID(), 'floris_meta_page_opt', true );
                            if(isset($video_block['video-url'])){ $video = $video_block['video-url'];}?>
                                <div <?php post_class('blog-item right video_no_sidebar video_short'); ?>>
                        <?php
                                if( function_exists( 'floris_post_video' ) && $video ){ floris_post_video($video); }
                            }else {
                                $thumb = get_post_thumbnail_id();
                                $image_link  = wp_get_attachment_url($thumb);
                        ?>
                    <div <?php post_class('blog-item right'); ?>>
                                <div class="image">
                                    <div class="bg">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php print esc_url( $image_link ); ?>" alt="blog-image"></a>
                                    </div>
                                </div>
                            <?php } ?>
                        <div class="title vertical-align">
                            <span class="date font-fam-1"><?php the_time('F j, Y'); ?></span> 
                            <a href="<?php the_permalink(); ?>" class="font-fam-2"><?php the_title(); ?></a>
                            <div class="simple-text">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>    
                    </div>
                <?php } ?>
            <?php $i++; } 
            wp_reset_postdata();
        ?>
    </div>