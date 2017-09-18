<?php get_header(); 
    if (have_posts()) {  while (have_posts()) {  the_post();
        
        $link_video=get_post_meta(get_the_ID(), 'oembed', true );
        $embed_video = explode('watch?v=', $link_video);
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
                                <iframe height="500" src="https://www.youtube.com/embed/<?php echo(ltrim($embed_video[1])); ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="environment-rich-editor environment-event-richeditor">
                                <br>
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
                                     <a><?php echo get_the_date(); ?></a>

                                  </div>
                                  <div class="environment-blog-social">
                                     <ul>
                                        <li><span>Compartilhar:</span></li>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="icon-facebook2"></a></li>
                                        <li><a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank" class="icon-social43"></a></li>
                                        <li><a href="whatsapp://send?text=Assista agora o video <?php the_title(); ?> no site do CIPEM.  <?php the_permalink(); ?>" class="icon-whatsapp"></a></li>
                                        <li><li><a href="mailto:?subject=VIDEOS DO CIPEM.&body=Veja agora no site do cipem, nossos videos sobre <?php the_title(); ?>. Veja Agora: <?php the_permalink(); ?>" class="icon-mail"></a></li></li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                            <!--// Related Event \\-->
                            <div class="environment-event environment-related-event">
                                <div class="environment-section-heading"><h2><span>Galerias Recentes</span></h2></div>
                                <ul class="row">
                                    <?php
                                        $args = array( 'post_type' => 'video', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 3);
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                            $link_video=get_post_meta(get_the_ID(), 'oembed', true );
                                            $embed_video = explode('watch?v=', $link_video);
                                    ?>
                                    <li class="col-md-4">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>"><iframe height="200" src="https://www.youtube.com/embed/<?php echo(ltrim($embed_video[1])); ?>" frameborder="0" allowfullscreen></iframe></a>
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
                                                    <time><?php echo get_the_date(); ?></time>
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

<!--         <?php } else {
                        get_template_part('template-parts/section', 'no-results');
                    }// endif;
                    ?>  -->

<?php get_footer(); ?>