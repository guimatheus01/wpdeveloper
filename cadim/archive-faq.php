<?php get_header(); /* Template Name: Faq */ ?>
<section class="row page_intro">
    <div class="row m0 inner">
        <div class="container">
            <div class="row">
                <h5>Confira todos</h5>
                <h2>Dúvidas Frequentes</h2>
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
                <li>Dúvidas Frequentes</li>
            </ul>
        </div>
    </div>
</section>
<section class="row service_block_row bgf">
    <div class="container">
        <div class="row titleRow">
            <h5>tire todas suas</h5>
            <h2>Dúvidas Frequentes</h2>
        </div>
        <div class="">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
                $args = array( 'post_type' => 'faq', 'showposts' => -1);
                $loop = new WP_Query( $args );

                $count = 0;

                while ( $loop->have_posts() ) : $loop->the_post();                   
                    $count++;
                    $in = ($count == 1) ? 'in' : '' ;
            ?>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo $count; ?>">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo get_the_id(); ?>" aria-expanded="true" aria-controls="<?php echo get_the_id(); ?>">
                      <?php echo get_the_title(); ?>
                    </a>
                  </h4>
                </div>
                <div id="<?php echo get_the_id(); ?>" class="panel-collapse collapse <?php echo $in; ?>" role="tabpanel" aria-labelledby="heading<?php echo $count; ?>">
                  <div class="panel-body">
                   <?php the_content(); ?>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>