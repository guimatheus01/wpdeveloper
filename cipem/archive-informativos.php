<?php /* Template Name: Informativo */
    get_header();
?> 
        <!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Informativo</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo(home_url()); ?>">Home</a></li>
                            <li>Informativo</li>
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
                            <div class="environment-event environment-modren-event">
                                <ul class="row">
                                <?php
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                       $args=array(
                                       'post_type'         => 'informativos',
                                       'order'             => 'desc',
                                       'posts_per_page'    => -1,
                                       'paged'             => $paged
                                    );
                                        $temp = $wp_query;
                                        $wp_query= null;
                                        $wp_query = new WP_Query($args);

                                        if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                                 ?>
                                    <li class="col-md-12">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url(); ?>" alt=""><i class="fa fa-share-square-o"></i></a>
                                            <time></time>
                                        </figure>
                                        <div class="environment-modren-event-text">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <ul class="environment-event-option">
                                                <li>
                                                    <i class="fa fa-clock-o"></i>
                                                    Data:
                                                    <time><?php echo get_the_date(); ?></time>
                                                </li>
                                            </ul>
                                            <p><?php the_excerpt(); ?></p>
                                            <br>
                                            <a href="<?php the_permalink(); ?>" class="environment-readmore-btn">Ler Informativo</a>
                                        </div>
                                    </li>
                                <?php endwhile; endif; ?>
                                </ul>
                               <?php
                                  if ( function_exists('wp_bootstrap_pagination') )  wp_bootstrap_pagination();
                                    $wp_query = null;
                                    $wp_query = $temp;
                                    wp_reset_query();
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

<?php get_footer(); ?>