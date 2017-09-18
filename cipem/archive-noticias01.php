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
                        <h1>Notícias</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo(home_url()); ?>">Home</a></li>
                            <li>Notícias</li>
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
                                    <?php
                                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                                        $args = array( 
                                            'post_type'         => 'post',
                                            'orderby'           => 'date', 
                                            'order'             => 'desc',
                                            'post_status'       => 'publish',
                                            'posts_per_page'    => 6, 
                                            'paged'             => $paged
                                        );
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                            $categories = get_the_category();
                                            $cat = $categories[0];
                                            $info_post=get_post_meta(get_the_ID(), 'posts_shotcode', true );
                                     ?>
                                    <li class="col-md-6">
                                        <section class="box-news">
                                            <figure>
                                            <?php if (has_post_thumbnail()): ?>
                                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('noticias-page'); ?>" alt=""><i class="fa fa-search-plus fa-2x"></i></a>
                                            <?php endif; ?>
                                                <time><i class="fa fa-leaf" aria-hidden="true"></i></time>
                                            </figure>
                                            <div class="environment-event-grid-text">
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                <ul class="environment-large-option">
                                                    <li>
                                                        Categoria:
                                                        <p><?php echo($cat->name);?></p>
                                                    </li>
                                                    <li>
                                                        Data:
                                                        <time><?php echo get_the_date(); ?></time>
                                                    </li>
                                                    <li>Autor: <p><?php echo $info_post; ?></p></li>
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
<?php endif; get_footer(); ?>