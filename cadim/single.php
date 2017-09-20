<?php get_header();

if (have_posts()) {  while (have_posts()) {  the_post();

$cat = get_the_category(); 

?> 
 <section class="row page_intro">
        <div class="row m0 inner">
            <div class="container">
                <div class="row">
                    <h5><?php echo $cat['name']; ?></h5>
                    <h2><?php echo get_the_title(); ?></h2>
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
                    <li><a href="<?php echo home_url('/noticias/' ); ?>">Notícas</a></li>
                    <li><?php echo get_the_title(); ?></li>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="row content_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="row m0 blog single_post">
                        <div class="image_row row m0">
                            <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive')); ?>
                        </div>
                        <?php the_content(); ?>
                    </div> <!--Single Post-->
                    <div class="row m0 tags">TAGS: 
                    <?php
                        $posttags = get_the_tags();
                        if ($posttags) {
                          foreach($posttags as $tag) {
                            echo '<a>' .$tag->name. '</a>, '; 
                          }
                        }
                    ?>
                    </div>
                    <div class="widget related row m0">
                        <h5 class="widget_heading">Relacionados</h5>
                        <div class="row m0">
                            <?php
                               $args = array( 'post_type' => 'post', 'showposts' => 2, 'category_name' => $cat);
                               $loop = new WP_Query( $args );
                               while ( $loop->have_posts() ) : $loop->the_post();
                                    $cat_name = get_the_category();
                            ?>
                            <div class="col-sm-6">
                                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                Em "<?php echo $cat_name['name']; ?>"
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="row pager">
                        <div class="col-sm-6 prev">
                            <div class="inner row m0">                              
                                <a><i class="fa fa-arrow-left"></i> Notícia Anterior</a><br>
                                <?php previous_post_link( '%link' ); ?> 
                            </div>
                        </div>
                        <div class="col-sm-6 next">
                            <div class="inner row m0">
                                <a>Próxima Notícia <i class="fa fa-arrow-right"></i></a><br>
                                <?php next_post_link('%link'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row m0 widget comments">
                        <h5 class="widget_heading">Comentários</h5>
                        <div class="media comment">
                            <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
                        </div> <!--Single Comment-->
                    </div>
                </div>
                <?php get_sidebar('right'); ?>
            </div>
        </div>
    </section>

<?php }; }; get_footer(); ?> 