<?php

get_header(); /* Template Name: Contato */ 

if (have_posts()) {  while (have_posts()) {  the_post();
?>
 <section class="row page_intro">
        <div class="row m0 inner">
            <div class="container">
                <div class="row">
                    <h5><?php echo get_the_title(); ?></h5>
                    <h2>Fale conosco, será um prazer responder-lo(a) !</h2>
                </div>
            </div>
        </div>
    </section>
    
    <section class="row breadcrumbRow">
        <div class="container">
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
                <div class="col-sm-8 contact_form_area">
                    <h3 class="contact_section_title">entrar em contato</h3>
                    <div class="contactForm row m0">
                        <?php echo do_shortcode('[contact-form-7 id="148" title="Contato"]') ?>
                    </div>
                </div>
                <div class="col-sm-4 contact_address">
                    <h3 class="contact_section_title">Endereço</h3>
                    <div class="row address m0">
                        <div class="media address_line">
                            <div class="media-left icon"><i class="fa fa-map-marker"></i></div>
                            <div class="media-body address_text">Av. Aclimação, N° 335 - Bosque da Saúde <br> Anexo Hospital São Mateus<br>Cuiabá - Mato Grosso</div>
                        </div>
                        <div class="media address_line">
                            <div class="media-left icon"><i class="fa fa-envelope"></i></div>
                            <div class="media-body address_text">comunicacao@cadim.com.br</div>
                        </div>
                        <div class="media address_line">
                            <div class="media-left icon"><i class="fa fa-phone"></i></div>
                            <div class="media-body address_text">(65) 2121-6363</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="row map_row">
        <div class="container">
            <h3 class="contact_section_title">Localização</h3>
            <div id="mapBox" class="row m0"></div>
        </div>
    </section>

<?php }; }; get_footer(); ?>