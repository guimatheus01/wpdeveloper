<?php get_header(); /* Template Name: Noticias */ ?>
<section class="row page_intro">
    <div class="row m0 inner">
        <div class="container">
            <div class="row">
                <h5>Fique por Dentro das</h5>
                <h2>Notícias</h2>
            </div>
        </div>
    </div>
</section>
<section class="row breadcrumbRow">
    <div class="container">
        <style>
            .page_intro.row .inner:before{background: url(<?php echo get_the_post_thumbnail_url(); ?>)!important;background-repeat: no-repeat !important;background-position: center center !important;background-size: cover !important;}
        </style>
        <div class="row inner m0">
            <ul class="breadcrumb">
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li>Notícias</li>
            </ul>
        </div>
    </div>
</section>
<section class="row content_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 blog_list">
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array( 'post_type' => 'post', 'showposts' => 6, 'paged'=>$paged);
                                          
                    $temp = $wp_query;
                    $wp_query= null;
                    $wp_query = new WP_Query($args);

                    if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
                        $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
                ?>
                <div class="media blog">
                    <div class="media-left">
                        <a href="single-post.html"><img src="<?php echo $img_url; ?>" alt="<?php echo get_the_title(); ?>" class="img-reponsive"></a>
                    </div>
                    <div class="media-body">
                        <a href="single-post.html"><h3><?php echo get_the_title(); ?></h3></a>
                        <div class="row m0 meta">Por : <a><?php echo get_the_author(); ?></a> Em : <a><?php echo get_the_date(); ?></a></div>
                        <p><?php the_excerpt(); ?></p>
                        
                        <a href="<?php the_permalink(); ?>" class="view_all">Leia</a>
                    </div>
                </div> <!--single blog-->
                <?php endwhile; endif; ?>

                <div class="row paginationRow">
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
</section>
<?php get_footer(); ?>