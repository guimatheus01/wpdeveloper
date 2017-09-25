<?php 
get_header();

if (have_posts()) {  while (have_posts()) {  the_post();

?> 
<section class="row page_intro">
        <div class="row m0 inner">
            <div class="container">
                <div class="row">
                    <h2><?php the_title(); ?></h2>
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
                    <li><?php the_title(); ?></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="row service_details">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 serviceDetailsSection text-justify"> 
                    <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                    <br>                   
                    <?php the_content(); ?>
                </div>
                <div class="col-sm-4 sidebar">
                    <div class="row m0 widget other_services">
                        <h5 class="widget_heading">outros exames</h5>
                        <ul class="list-unstyled services_list">
                            <?php
                               $args = array( 'post_type' => 'exames', 'showposts' => -1);
                               $loop = new WP_Query( $args );
                               $titlepage = get_the_title();
                               while ( $loop->have_posts() ) : $loop->the_post();
                                    $get_title = get_the_title();
                                    $displayoff = ($get_title ===  $titlepage) ? 'display:none' : '' ;
                            ?>
                            <li style="<?php echo $displayoff; ?>"><i class="fa fa-arrow-right"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="row m0 quick_block branches">
                        <div class="row m0 inner">
                            <div class="row heading m0">
                                <h5>Acesse agora</h5>
                                <h3>Resultados de Exames</h3>
                            </div>
                            <p>Veja o resultado de seus exames. Disponiveis para os medicos e pacientes.</p>
                            <a href="<?php echo home_url(); ?>/exames">Veja Agora</a>
                        </div>
                    </div>
                    <div class="row m0 quick_block emmergency">
                        <div class="row m0 inner">
                            <div class="row heading m0">
                                <h5>Localização</h5>
                                <h3>Saiba onde Estamos</h3>
                            </div>
                            <p>Entre em contato com a cadim, estamos esperando por você.</p>
                            <a href="/contato">entrar em contato</a>
                        </div>
                    </div>
                    <div class="row m0 quick_block bill_payments">
                        <div class="row m0 inner">
                            <div class="row heading m0">
                                <h5>Dúvidas ?</h5>
                                <h3>Tire seuas Dúvidas</h3>
                            </div>
                            <p>Reunimos as duvidas mais frequentes para você.</p>
                            <a href="/duvidas">Tirar Dúvidas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row quick_blocks_row quick_blocks_row2">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </section>
<?php }; }; get_footer(); ?> 