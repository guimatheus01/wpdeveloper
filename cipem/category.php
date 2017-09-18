<?php /* Template Name: Notícias */
    get_header();
    if ( have_posts() ) :    
?> 
        <!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php single_cat_title(); ?></h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo(home_url()); ?>">Home</a></li>
                            <li><a href="<?php echo(home_url()); ?>/noticias">Notícias</a></li>
                            <li><?php single_cat_title(); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// SubHeader \\-->

        <!--// Main Content \\-->
        <div class="environment-main-content">

            <!--// Main Section \\-->
            <div class="environment-main-section">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-9">
                            <div class="environment-event environment-event-grid">
                                <ul>
                                    <?php while ( have_posts() ) : the_post(); ?>
                                    <li class="col-md-6">
                                        <section class="box-news">
                                            <figure>
                                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('noticias-page'); ?>" alt=""><i class="fa fa-search-plus fa-2x"></i></a>
                                                <time><i class="fa fa-leaf" aria-hidden="true"></i></time>
                                            </figure>
                                            <div class="environment-event-grid-text">
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                <ul class="environment-large-option">
                                                    <li>
                                                        Catergoria:
                                                        <p><?php echo($cat->name);?></p>
                                                    </li>
                                                    <li>
                                                        Data:
                                                        <time><?php the_modified_date(); ?></time>
                                                    </li>
                                                </ul>
                                                <p><?php the_excerpt(); ?></p>
                                                <a href="<?php the_permalink(); ?>" class="environment-readmore-btn">Leia Mais</a>
                                            </div>
                                        </section>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                                <?php
                                  if ( function_exists('wp_bootstrap_pagination') )
                                    wp_bootstrap_pagination();
                                ?>
                            </div>
                        </div>

                        <?php get_sidebar('right'); ?>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->


    <?php else: ?>

   <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php single_cat_title(); ?></h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo(home_url()); ?>">Home</a></li>
                            <li><?php single_cat_title(); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// SubHeader \\-->
        <!--// Main Content \\-->
        <div class="environment-main-content">
            <!--// Main Section \\-->
            <div class="environment-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="environment-event environment-event-grid text-center">
                                <h1><strong>Infelizmente essa consulta não existe !</strong></h1>
                                <i class="fa fa-frown-o fa-4x" aria-hidden="true" style="font-size: 18em;"></i>
                            </div>
                        </div>
                        <?php get_sidebar('right'); ?>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->


<?php endif; get_footer(); ?>