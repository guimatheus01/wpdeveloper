<?php get_header(); 
    if (have_posts()) {  while (have_posts()) {  the_post();
        $embed=get_post_meta(get_the_ID(), 'biblioteca_shotcode', true );
        //Pegando o titulo em uma variavel
        $title_header = get_the_title();
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
                    <li><a href="<?php echo home_url(); ?>/biblioteca">Biblioteca</a></li>
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
                            <div class="environment-rich-editor environment-event-richeditor">
                                <div class="col-md-7">
                                    <?php echo(do_shortcode($embed)); ?>
                                </div>
                                <div class="col-md-5">
                                    <?php the_content(); ?>
                                </div>
                                <br>
                            </div>
                            <div class="environment-rich-editor environment-event-richeditor">
                                <hr>
                                <div class="fb-comments" data-href="http://www.cipem.org.br/<?php the_permalink(); ?>" data-widht="100%" data-numposts="5"></div>
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
                                        <li><a href="whatsapp://send?text=Veja agora <?php the_title(); ?> no site do CIPEM.  <?php the_permalink(); ?>" class="icon-whatsapp"></a></li>
                                        <li><li><a href="mailto:?subject=BIBLIOTECA DO CIPEM.&body=Veja agora no site do cipem, nosso material sobre <?php the_title(); ?>. Leia Agora: <?php the_permalink(); ?>" class="icon-mail"></a></li></li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                            
                            <!--// Related Event \\-->
                            <div class="environment-event environment-related-event">
                                <div class="environment-section-heading"><h2><span>Informativos Recentes</span></h2></div>
                                <ul class="row">
                                    <?php
                                        $args = array( 'post_type' => 'informativos', 'orderby' => 'date',  'order' => 'asc', 'showposts' => 3);
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
                                                    Autor:
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

<!--         <?php } else {
                        get_template_part('template-parts/section', 'no-results');
                    }// endif;
                    ?>  -->

<?php get_footer(); ?>