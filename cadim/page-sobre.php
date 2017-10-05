<?php

get_header(); /* Template Name: Sobre */ 

if (have_posts()) {  while (have_posts()) {  the_post();
?>
<section class="row page_intro">
        <div class="row m0 inner">
            <div class="container">
                <div class="row">
                    <h5><?php echo get_the_title(); ?></h5>
                    <h2>História do Cadim</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="row breadcrumbRow">
        <div class="container">
            <div class="row inner m0">
                <style>
                    .page_intro.row .inner:before{background: url(<?php echo get_the_post_thumbnail_url(); ?>)!important;background-repeat: no-repeat !important;background-position: center center !important;background-size: cover !important;}
                </style>
                <ul class="breadcrumb">
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><?php echo get_the_title(); ?></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="row who_depts">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 who_weR">
                    <div class="media">
                        <div class="media-left">
                            <?php 
                            $images = get_field('imagens_sobre');

                            if( $images ): ?>
                                <?php foreach( $images as $image ): ?>
                                    <a><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></a> <br>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="media-body text-justify">
                           <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row service_block_row bgf">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 service_block">
                    <div class="row m0 inner">
                        <a><h4>MISSÃO</h4></a>
                        <p><?php echo get_field('missão'); ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 service_block">
                    <div class="row m0 inner">
                        <a><h4>VISÃO</h4></a>
                        <p><?php echo get_field('visão'); ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 service_block">
                    <div class="row m0 inner">
                        <a><h4>VALORES</h4></a>
                        <p><?php echo get_field('valores'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row team_section team_section_about">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3 team_menu">
                    <div class="row titleRow text-left">
                        <h5>conheça nossos médicos</h5>
                        <h2>experiente equipe</h2>
                    </div>

                    <div class="row text-justify">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class=" media"><a>
                                <div class="media-body media-middle">
                                    <div class="row designation">Os Profissionais da Radiologia. O radiologista é médico que se especializa em diagnosticar e tratar as enfermidades e lesões, usando técnicas médicas de imagens, tais como Raios-X, Tomografia Computadorizada, Ressonância Magnética Nuclear, Ultrassonografia, Mamografia, etc...Algumas destas técnicas requerem o uso de radiação e é importante ter formação e compreensão da segurança e proteção com radiação. O radiologista faz o papel de consultor para o médico solicitante ajudando- o a escolher exames apropriados, interpretar as imagens médicas e no uso dos resultados para o cuidado da sua saúde, correlacionar os achados em imagem com outros exames e provas, orientar os técnicos de radiologia sobre a devida forma de se realizar os procedimentos.</div>
                                </div>
                            </a></li>
                        </ul>
                        <a href="<?php echo home_url('/medicos'); ?>" class="view_all">ver todos médicos</a><br><br>
                    </div>
                </div>
                 <div class="col-sm-8 col-md-9 team_descss">
                    <div class="row">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane media active" id="doctor1">
                                <div class="media-left media-bottom">
                                    <br>
                                    <a><img src="../wp-content/uploads/2017/09/medico.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="media-body">
                                    <div class="row titleRow text-left">
                                        <h2>Dr. Carlos Alberto Ferreira</h2>
                                        <h5>Responsável Técnico</h5>
                                    </div>
                                    <p>Atua na área de Ressonância Magnética, Tomografia Computadorizada e Raio-X.</p>
                                </div>
                            </div><!-- Doctor about-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row quick_blocks_row quick_blocks_row2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 quick_block emmergency">
                    <div class="row m0 inner text-center">
                        <div class="row heading m0">
                            <h5>conheça nossos</h5>
                            <h3>Convênios</h3>
                        </div>
                        <p>Conheça quais convênios a cadim atende.</p>
                        <a href="<?php echo home_url('convenios'); ?>">VEJA OS CONVÊNIOS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }; }; get_footer(); ?>