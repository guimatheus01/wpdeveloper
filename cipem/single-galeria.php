<?php get_header(); 
    if (have_posts()) {  while (have_posts()) {  the_post();
        //Defininfo o titulo do breadcrumbs.
        $title_header = get_the_title();
        $limite = 10;
?> 
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li><a href="<?php echo home_url(); ?>/fotos">Galeria de Fotos</a></li>
                            <li><?php print(limitarTexto($title_header, $limite = 25));?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Main Content \\-->
        <div class="environment-main-content">
            <!--// Main Section \\-->
            <div class="environment-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="environment-gallery environment-masonery-gallery">
                                <ul class="row">
                                    <?php 

                                         $large_image_url_zoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'galeria-page' );
                                         $images = rwmb_meta( 'image_advanced', array('type'=>'image_advanced','size'=>'full') );
                                        //loop do slider
                                        foreach ( $images as $image ) { $fo = $fo + 1; $i = $i + 1;
                                            $large_image_url_original = wp_get_attachment_image_src( $image['ID'], 'galeria-page' );
                                            $large_image_url_zoom = wp_get_attachment_image_src($image['ID'], 'full' );
                                    ?>
                                    <li class="col-md-4">
                                        <figure>
                                            <a data-fancybox-group="group" href="<?=$large_image_url_zoom[0]; ?>" class="fancybox"><img src="<?=$large_image_url_original[0]; ?>" alt=""><i class="icon-signs23"></i></a>
                                            <figcaption>
                                                <span class="environment-top-bottom-border"></span>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <?php }; ?>  
                                </ul>
                            </div>
                            <div class="environment-rich-editor environment-event-richeditor">
                                <?php the_content(); ?>
                            </div>
                            <div class="environment-rich-editor environment-event-richeditor">
                                <hr>
                                <div class="fb-comments" data-href="http://www.cipem.org.br/<?php the_permalink( $post ); ?>" data-widht="100%" data-numposts="5"></div>
                            </div>
                            <div class="environment-tag-wrap">
                                <div class="environment-post-tags">
                                  <div class="environment-tags">
                                     <span>Data:</span>
                                     <a><?php the_modified_date(); ?></a>

                                  </div>
                                  <div class="environment-blog-social">
                                     <ul>
                                        <li><span>Compartilhar:</span></li>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="icon-facebook2"></a></li>
                                        <li><a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank" class="icon-social43"></a></li>
                                        <li><a href="whatsapp://send?text=Veja agora o album <?php the_title(); ?> no site do CIPEM.  <?php the_permalink(); ?>" class="icon-whatsapp"></a></li>
                                        <li><li><a href="mailto:?subject=FOTOS DO CIPEM.&body=Veja agora no site do cipem, nossa Galeria sobre <?php the_title(); ?>. Veja Agora: <?php the_permalink(); ?>" class="icon-mail"></a></li></li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                            <!--// Related Event \\-->
                            <div class="environment-event environment-related-event">
                                <div class="environment-section-heading"><h2><span>Galerias Recentes</span></h2></div>
                                <ul class="row">
                                    <?php
                                        $args = array( 'post_type' => 'galeria', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 3);
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                    ?>
                                    <li class="col-md-4">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
                                            <time></time>
                                        </figure>
                                        <div class="environment-related-event-text">
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <ul class="environment-large-option">
                                                <li>
                                                    Organizer:
                                                    <a><?php the_author(); ?></a>
                                                </li>
                                                <li>
                                                    Data:
                                                    <time><?php the_modified_date(); ?></time>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <!--// Related Event \\-->
                        <?php } ?>
                        </div>
                        <!--// SideBaar \\-->
                        <?php get_sidebar('right'); ?>
                        <!--// SideBaar \\-->
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->
        <!-- <?php } else {
                get_template_part('template-parts/section', 'no-results');
                    }// endif;
                    ?>  -->
<?php get_footer(); ?>