<?php get_header(); ?>
    <section class="container">
        <div class="anuncio-meio">
            <?php echo(do_shortcode('[wp_bannerize_pro categories="centro-site"]')); ?>
        </div>
    </section>

	<section class="container">
		<h3 class="title-more-news"><?php echo single_cat_title(); ?></h3>
	</section>

    <section class="container">
        <div class="row">
            <div class="col-md-8">
            	<?php 	if ( have_posts() ) : ?> 
                <ul class="list-unstyled">
                    <?php
                    	$cat = get_the_category();
                    	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $args = array( 
                            'post_type' => 'post',
                            'orderby' => 'date',
                            'order' => 'asc',
                            'cat' => $cat[0]->term_id,
                            'posts_per_page' => 6,
                            'paged'          => $paged
                        );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();

                    ?>
                    <li>
                        <div class="box-news-borded">
                            <div class="col-sm-4 col-md-6 col-lg-5">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo the_post_thumbnail_url('medium'); ?>" alt="<?php echo  the_title(); ?>" class="img-responsive img-box-news-borded">
                                </a>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-7">
                                <h4><?php the_title(); ?></h4>
                                <p class="info-box-news-borded"><small><?php echo get_the_author(); ?>  |  <?php echo get_the_date(); ?></small></p>
                                <p><small><?php the_excerpt(); ?></small></p>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php
				  if ( function_exists('wp_bootstrap_pagination') )
				    wp_bootstrap_pagination();
				?>
            	<?php else: ?>
            	<div class="jumbotron">
				  <h1><i class="fa fa-frown-o fa-5x" aria-hidden="true"></i></h1>
				  <p>Infelismente notícias relacionadas a <b><?php echo single_cat_title(); ?></b> não tem conteúdo cadastrados.</p>
				  <p><a href="<?php echo home_url(); ?>" role="button">Pagina Principal</a></p>
				</div>
            	<?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar('right'); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>