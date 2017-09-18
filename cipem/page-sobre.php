<?php get_header();  /* Template Name: Sobre */
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
                            <li><a href="<?php home_url(); ?>">Home</a></li>
                            <li class="active"><?php the_title(); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// SubHeader \\-->
        <div class="environment-main-content">
            <!--// Main Section \\-->
            <div class="environment-main-section environment-aboutus-textfull">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="environment-aboutus-text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="environment-aboutus-img">
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
            <!--// Main Section \\-->
            <div class="environment-main-section environment-testimonial-full environment-donate-sectionfull">
                <span class="testimonial-transparent"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="environment-fancy-title environment-white-color"><h2>Nossos<span> Valores</span></h2></div>
                            <div class="environment-testimonials">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <div class="environment-testimonials-wrap">
                                            <div class="environment-testimonials-text">
                                                <p><strong>MISSÃO</strong></p>
                                                <p>Fortalecer a integração do setor de base florestal e promover a adoção de modelos de negócios economicamente viáveis, socialmente justos e ecologicamente corretos.</p>
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="environment-testimonials-wrap">
                                            <div class="environment-testimonials-text">
                                                <p><strong>VISÃO</strong></p>
                                                <p>Ser referência mundial na representatividade dos interesses do setor de base florestal, atuando em sintonia com as políticas de integração e sustentabilidade.</p>
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="environment-testimonials-wrap">
                                            <div class="environment-testimonials-text">
                                                <p><strong>LEMA</strong></p>
                                                <p>A madeira é nosso negócio, manter a floresta viva é nossa missão!</p>
                                                <p><br><br><br></p>
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
            <!--// Main Section \\-->
            <div class="environment-main-section environment-team-modrenfull">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="environment-fancy-title"><h2>Nossa<span> Equipe</span></h2></div>
                            <div class="environment-team environment-team-modren">
                                <ul class="row">
                                    <?php
                                        $args = array( 'post_type' => 'equipe', 'orderby' => 'date',  'order' => 'desc', 'showposts' => -1);
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                            $cargo=get_post_meta(get_the_ID(), 'equipe_cargo', true );
                                            $email=get_post_meta(get_the_ID(), 'equipe_email', true );
                                     ?>  
                                    <li class="col-md-3">
                                        <div class="environment-team-modren-text">
                                            <h5><a><?php the_title(); ?></a></h5>
                                            <p><?php echo $cargo; ?></p>
                                            <ul class="environment-team-social">
                                                <li><a href="mailto:<?php echo $email; ?>" class="icon-mail" title="Clique aqui e seja re-direcionado ao e-mail padrão do seu dispositivo."></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php endwhile ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->            
        </div>
<?php }}; get_footer(); ?>