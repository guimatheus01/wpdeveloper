<?php get_header();  ?> 
    <section class="container">
        <div class="anuncio-meio">
            <?php echo(do_shortcode('[wp_bannerize_pro categories="centro-site"]')); ?>
        </div>
    </section>
    <section class="container">
        <h3 class="title-more-news"><?php printf(__('Buscar resultados para: %s', 'bootstrap-basic4'), '<span>' . get_search_query() . '</span>'); ?></h3>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (have_posts()) { ?>
                <ul class="list-unstyled">
                    <?php while (have_posts()) { the_post(); $cat_post = get_the_category();  $cat_name = $cat_post[0]->name;?>
                    <li>
                        <div class="box-news-borded">
                            <div class="col-sm-4 col-md-6 col-lg-5">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <img src="<?php echo the_post_thumbnail_url('medium'); ?>" alt="<?php echo  the_title(); ?>" class="img-responsive img-box-news-borded">
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand.png" alt="<?php echo  the_title(); ?>" class="img-responsive img-box-news-borded">
                                    <?php endif ?>
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
                    <?php }; ?>
                </ul>
                <?php
                  if ( function_exists('wp_bootstrap_pagination') )
                    wp_bootstrap_pagination();
                ?>
                <?php }else{ ?>
                <div class="jumbotron">
                  <h1><i class="fa fa-frown-o fa-5x" aria-hidden="true"></i></h1>
                  <p>Infelismente não encontramos uma resposta para <b><?php printf(__('%s', 'bootstrap-basic4'), '<span>' . get_search_query() . '</span>'); ?></b>. Faça uma nova busca abaixo.</p>
                  <p> <?php get_template_part('template-parts/partial', 'search-form'); ?> </p>
                  <p><a href="<?php echo home_url(); ?>" role="button">Pagina Principal</a></p>
                </div>
                <?php }; ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar('right'); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>


    
