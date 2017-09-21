<?php get_header(); /* Template Name: Videos */ ?>
<section class="row page_intro">
    <div class="row m0 inner">
        <div class="container">
            <div class="row">
                <h5>Confira todos</h5>
                <h2>Videos</h2>
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
                <li>Videos</li>
            </ul>
        </div>
    </div>
</section>
<section class="row service_block_row bgf">
    <div class="container">
        <div class="row titleRow">
            <h5>Veja todos nossos</h5>
            <h2>Videos</h2>
        </div>
        <div class="row">
            <?php
                $args = array( 'post_type' => 'videos', 'showposts' => -1);
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    $video = get_field('embbed_youtube');
            ?>
            <div class="col-sm-6 col-md-6 service_block">
                <a>
                    <div class="row m0 inner">
                        <div class="row icon"><iframe src="<?php echo $video; ?>" class="embed-responsive-item" frameborder="0"></iframe></div>
                        <a><h4><?php echo strtoupper(get_the_title()); ?></h4></a>
                        <p><?php echo the_excerpt(); ?></p>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>