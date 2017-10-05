<?php get_header(); /* Template Name: Convênios */ ?>
<section class="row page_intro">
    <div class="row m0 inner">
        <div class="container">
            <div class="row">
                <h5>Confira todos</h5>
                <h2>Convênios</h2>
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
                <li>Convênios</li>
            </ul>
        </div>
    </div>
</section>
<section class="row service_block_row bgf">
    <div class="container">
        <div class="row titleRow">
            <h5>Conheça todos nossos</h5>
            <h2>Convênios</h2>
        </div>
        <div class="row">
            <?php
                $args = array( 'post_type' => 'convenios', 'showposts' => -1);
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            <a href="<?php echo(get_field('link_do_convênio')); ?>" target="_blank">
                <div class="col-sm-6 col-md-4 service_block height-conv">                
                    <div class="row m0 inner box-convenios">
                        <div class="row icon"><img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>"></div>
                        <a><h4><?php echo strtoupper(get_the_title()); ?></h4></a>
                    </div>
                </div>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>