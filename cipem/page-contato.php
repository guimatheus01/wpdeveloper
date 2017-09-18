<?php get_header(); /* Template Name: Contatos */
    if (have_posts()) {
        while (have_posts()) {
            the_post();

?> 
<!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li>Contato</li>
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
                        
                        <div class="col-md-12">
                            <div class="environment-title-wrap">
                                <div class="environment-fancy-title"><h2>Fale<span> Conosco</span></h2></div>
                                <p>Este é o canal que disponibilizamos para que nossos leitores entrem em contato conosco. Preencha o formulário abaixo corretamente e envie seu recado, dúvida, crítica ou sugestão para nossa equipe.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="environment-contactus-info">
                                <ul class="row">
                                    <li class="col-md-12">
                                        <span><i class="fa fa-phone"></i></span>
                                        <div class="environment-contactus-text">
                                            <h5>Telefone</h5>
                                            <p>(65) 3644-3666</p>
                                        </div>
                                    </li>
                                    <li class="col-md-12">
                                        <span><i class="fa fa-envelope"></i></span>
                                        <div class="environment-contactus-text">
                                            <h5>E-mail</h5>
                                            <p><a href="mailto:imprensa@cipem.org.br">imprensa@cipem.org.br</a></p>
                                        </div>
                                    </li>
                                    <li class="col-md-12">
                                        <span><i class="fa fa-map-marker"></i></span>
                                        <div class="environment-contactus-text">
                                            <h5>Localização</h5>
                                            <p>Av. Historiador Rubens de Mendonça, nº 4193, Centro Político.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="environment-contact-form">
                               <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="environment-title-wrap">
                                <div class="environment-fancy-title"><h2>ONDE <span> ESTAMOS</span></h2></div>
                            </div>
                            <div class="environment-location-map"><div id="map"></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->


<?php }}; get_footer(); ?>