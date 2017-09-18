<?php /* Template Name: Videos */
    get_header();

    if ( have_posts() ) :
?> 
        <!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Galeria de Videos</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo(home_url()); ?>">Home</a></li>
                            <li>Galeria de Videos</li>
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
                                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                                        $args = array( 'post_type' => 'video', 'orderby' => 'date', 'order' => 'desc', 'posts_per_page' => 12, 'paged' => $paged);
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                            $link_video=get_post_meta(get_the_ID(), 'oembed', true );
                                            $embed_video = explode('watch?v=', $link_video); 
                                    ?>
                                    <li class="col-md-4 box-video">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>"><iframe height="200" src="https://www.youtube.com/embed/<?php echo(ltrim($embed_video[1])); ?>" frameborder="0" allowfullscreen></iframe></a>
                                            <figcaption> <a href="<?php the_permalink(); ?>">Ver Video</a> </figcaption>
                                        </figure>
                                        <section>
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <a href="<?php the_permalink(); ?>" class="environment-fancy-btn">Ver [+]<span></span></a>
                                        </section>
                                        <div class="cause-simplegrid-bottom">
                                            <span>Data</span>
                                            <span><?php echo get_the_date(); ?></span>
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

<?php  endif; get_footer(); ?>