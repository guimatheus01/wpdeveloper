<?php /* Template Name: biblioteca */
    get_header();
?> 
        <!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Biblioteca</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo(home_url()); ?>">Home</a></li>
                            <li>Biblioteca</li>
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
                            <div class="environment-cause environment-cause-simplegrid">
                                <ul>
                                    <?php
                                        $args = array( 'post_type' => 'biblioteca', 'orderby' => 'title',  'order' => 'asc', 'showposts' => -1);
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                    ?>
                                    <li class="col-md-6 col-md-4 box-biblioteca">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
                                        </figure>
                                        <section>
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <p></p>
                                            <a href="<?php the_permalink(); ?>" class="environment-fancy-btn">Ler<span></span></a>
                                        </section>
                                        <div class="cause-simplegrid-bottom">
                                            
                                        </div>
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

<?php get_footer(); ?>