<?php get_header(); ?> 
    <section class="container-fluid banner-principal">
        <div class="container">
            <div class="row">
                 <div class="anuncio-meio">
                    <?php echo(do_shortcode('[wp_bannerize_pro categories="centro-site"]')); ?>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <?php
                        $args = array( 
                            'post_type' => 'post',
                            'orderby' => 'date',
                            'order' => 'desc',
                            'cat' => 15,
                            'posts_per_page' => -1
                        );
                        $loop = new WP_Query( $args );
                        $i = 1;
                        while ( $loop->have_posts() ) : $loop->the_post();
                            //Coleta a Categoria
                            $cat_post = get_the_category();
                            $cat_name = $cat_post[0]->name;

                            //condição de tamanho e estilo css
                            $merge = ($i == 1) ? '3' : '1' ;
                            $styling = ($i == 1) ? '' : 'more-info-banner-dtq' ;
                            $size_thumb = ($i == 1) ? 'principal-banner' : 'principal-banner' ; 
                            $more_info = ($i == 1)? '' : $cat_name . ' | ' . get_the_date();
                    ?>
                    <div class="item banner-destaque <?php echo $styling; ?>" data-merge="<?php echo $merge; ?>">
                        <figure>
                          <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url($size_thumb); ?>" alt="<?php echo get_the_title(); ?>">
                            <figcaption><span><?php echo $cat_name; ?></span><br><h3><?php echo get_the_title(); ?></h3> <br> <p><?php echo $more_info; ?></p></figcaption>
                          </a>
                        </figure>
                    </div>
                    <?php $i++; endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled">
                    <?php
                        $args = array( 
                            'post_type' => 'post',
                            'orderby' => 'date',
                            'order' => 'desc',
                            'cat' => 6,
                            'posts_per_page' => 3
                        );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                            //Coleta a Categoria
                            $cat_post = get_the_category();
                            $cat_name = $cat_post[0]->name;
                    ?>
                    <li>
                        <div class="box-news-borded">
                            <div class="col-sm-4 col-md-6 col-lg-5">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo the_post_thumbnail_url('medium'); ?>" alt="<?php echo  the_title(); ?>" class="img-responsive img-box-news-borded">
                                </a>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-7">
                                <p class="category-news"> <?php  echo $cat_name; ?></p>
                                <h4><?php the_title(); ?></h4>
                                <p class="info-box-news-borded"><small><?php echo get_the_author(); ?>  |  <?php echo get_the_date(); ?></small></p>
                                <p><small><?php the_excerpt(); ?></small></p>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="col-md-4">
                <?php get_sidebar('right'); ?>
            </div>
        </div>
    </section>

    <?php get_sidebar('center'); ?>

<?php get_footer(); ?>