<?php

get_header(); /* Template Name: Trabale Conosco */ 

if (have_posts()) {  while (have_posts()) {  the_post();
?>
 <section class="row page_intro">
        <div class="row m0 inner">

            <div class="container">
                <div class="row">
                    <h5><?php echo get_the_title(); ?></h5>
                    <h2>Será um prazer ter você em nossa equipe !</h2>
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
                    <li><?php echo get_the_title(); ?></li>
                </ul>
            </div>
        </div>
    </section>
      
    <section class="row contact_form_row">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 contact_form_area">
                    <h3 class="contact_section_title">envie seu currículo</h3>
                    <div class="contactForm row m0">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }; }; get_footer(); ?>