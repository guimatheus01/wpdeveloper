<?php get_header(); 
while ( have_posts() ) : the_post(); ?>
    
            <section class="container">
                <div class="anuncio-meio">
                    <?php echo(do_shortcode('[wp_bannerize_pro categories="centro-site"]')); ?>
                </div>
                <div class="title-single">
                    <span class="cat-single"><?php echo the_category(); ?></span>
                    <h2><?php echo get_the_title(); ?></h2>
                </div>
                <div class="row">
                    <article class="col-md-8 col-lg-9 content-single">
                        <div>
                            <h3><?php the_excerpt(); ?></h3>
                            <ul class="list-inline">
                                <li><?php echo get_the_author(); ?></li>
                                <li>|</li>
                                <li><?php echo get_the_date(); ?></li>
                            </ul>
                            <br>
                        </div>
                        <div class="">
                            <?php the_content(); ?>
                        </div>
                        <div class="">
                            <div class="tags-box">
                                <?php the_tags( '<span class="tag">TAGS:</span><ul class="list-inline list-tag"><li>', '  | </li><li>', '</li></ul>' ); ?>    
                            </div>
                            <div class="comments">
                                <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
                            </div>
                            <div class="shared">
                                <ul class="list-inline list-share">
                                    <li><span>Compartilhar:</span></li>
                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="icon-share fb-color">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>  |  Compartilhar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/home?status=<?php the_title(); ?>" target="_blank" class="icon-share tw-color">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>  |  Compartilhar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="whatsapp://send?text=Leia sobre <?php the_title(); ?> no site Estado MT. Acesse: <?php the_permalink(); ?>" class="icon-share wts-color">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i> | Compartilhar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:?subject=NOTÍCIAS ESTADO MT .&amp;body=Leia sobre <?php echo get_the_title(); ?>. Acesse Agora: <?php the_permalink(); ?>" class="icon-share mail-color">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>  |  Compartilhar
                                        </a>
                                    </li>
                                 </ul>
                            </div>                
                        </div>
                    </article>
                    <div class="col-md-4 col-lg-3">
                        <?php get_sidebar('right'); ?>
                    </div>
                </div>
            </section>

            <?php get_sidebar('center'); ?>
<?php endwhile; get_footer();