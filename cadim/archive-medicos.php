<?php

get_header(); /* Template Name: Medicos */ 

if (have_posts()) {  while (have_posts()) {  the_post();
?>
 <section class="row page_intro">
        <div class="row m0 inner">
            <div class="container">
                <div class="row">
                    <h5>Médicos</h5>
                    <h2>Equipe Experiente</h2>
                </div>
            </div>
        </div>
    </section>
    
    <section class="row breadcrumbRow">
        <div class="container">
             <style>
                .page_intro.row .inner:before{background: url('http://www.cadim.com.br/novo/wp-content/uploads/2017/09/GettyImages-520613914.jpg')!important;background-repeat: no-repeat !important;background-position: center center !important;background-size: cover !important;}
            </style>
            <div class="row inner m0">
                <ul class="breadcrumb">
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li>Médicos</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="row team_section_type2 bgf">
        <div class="container">           
            <div class="row dorctors_row">
               <?php
                    $args = array( 'post_type' => 'medicos', 'showposts' => -1);
                    $loop = new WP_Query( $args );
                    $count = 1;
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $img_url =  get_the_post_thumbnail_url(get_the_ID(),'medium');
                ?>
                <div class="col-sm-6 col-md-3 team_member">
                    <div class="row m0 inner">
                        <a href="<?php the_permalink(); ?>">
                            <div class="row m0 image"><img src="<?php echo $img_url; ?>" alt="" class="img-responsive"></div>
                            <div class="row m0 title_row">
                                <h5><?php echo get_the_title(); ?></h5>
                                <div class="row m0 pos"><?php echo get_field('cargo'); ?></div>
                                <div class="row m0 pos"><small><?php echo get_field('especialização'); ?></small></div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>           
        </div>
    </section>

<?php }; }; get_footer(); ?>