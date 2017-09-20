<?php get_header(); ?>
    <section class="row bannercontainer p0">
        <div class="preloader"><img src="<?php echo get_template_directory_uri(); ?>/vendors/rs-plugin/assets/loader.gif" alt=""></div>
        <div class="row m0 banner main_slider">
            <ul>
                <?php
                    $args = array( 'post_type' => 'slider_banner', 'showposts' => -1);
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $large_image_url_zoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                ?>
                <li data-transition="random" data-slotamount="<?php echo get_the_id(); ?>" data-masterspeed="200" class="first-slide">
                    <img src="<?php echo $large_image_url_zoom[0];  ?>" alt="<?php echo get_the_title(); ?>" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
    
    <section class="row quick_blocks_row quick_blocks_row_home2">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 quick_block emmergency">
                    <div class="row m0 inner">
                        <div class="row heading m0">
                            <h5>Acesse agora</h5>
                            <h3>Resultados de Exames</h3>
                        </div>
                        <p>Veja o resultado de seus exames. Disponiveis para os medicos e pacientes.</p>
                        <a href="<?php echo home_url(); ?>/exames">Veja Agora</a>
                    </div>
                </div>
                <div class="col-sm-4 quick_block branches">
                    <div class="row m0 inner">
                        <div class="row heading m0">
                            <h5>Localização</h5>
                            <h3>Saiba onde Estamos</h3>
                        </div>
                        <p>Entre em contato com a cadim, estamos esperando por você.</p>
                        <a href="/contato">entrar em contato</a>
                    </div>
                </div>
                <div class="col-sm-4 quick_block bill_payments">
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
    </section>
    
    <section class="row service_tab" id="#exame">
        <div class="container">
            <div class="row titleRow">
                <h5>CONHEÇA OS NOSSOS</h5>
                <h2>EXAMES</h2>
            </div>
            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist" id="service_tab">
                    <?php
                       $args = array( 'post_type' => 'exames', 'showposts' => -1);
                       $loop = new WP_Query( $args );
                       $count = 1;
                       while ( $loop->have_posts() ) : $loop->the_post();
                            $active = ($count == 1) ? "active" : '' ;
                            $count++;
                    ?>
                    <li role="presentation" class="<?php echo $active; ?>"><a href="#<?php echo get_the_id(); ?>" aria-controls="<?php echo get_the_id(); ?>" role="tab" data-toggle="tab"><span></span><?php echo the_title(); ?></a></li>
                    <?php endwhile; ?>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <?php
                       $args = array( 'post_type' => 'exames', 'showposts' => -1);
                       $loop = new WP_Query( $args );
                       $count = 1;
                       while ( $loop->have_posts() ) : $loop->the_post();
                            $active = ($count == 1) ? "active" : '' ;
                            $count++;
                    ?>
                    <div role="tabpanel" class="tab-pane <?php echo $active; ?>" id="<?php echo get_the_id(); ?>">
                        <div class="col-sm-6">
                            <div class="row m0">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title(); ?>" class="img-responsive">
                                <!-- <div class="ts">trusted services</div> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row m0">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="view_all">leia mais</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="row recentpost_acc contentRowPad">
        <div class="container">           
            <div class="row m0 titleRow">
                <h5>Acompanhe o cadim com as</h5>
                <h2>Últimas Notícias</h2>
            </div>
            <div class="row recent_post_home recent_post_home3">
                <div class="col-sm-12 col-md-6">
                <?php
                   $args = array( 'post_type' => 'post', 'showposts' => 4);
                   $loop = new WP_Query( $args );
                   $count = 0;
                   while ( $loop->have_posts() ) : $loop->the_post();
                        $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
                        $count++;
                ?>

                    <div class="media">
                        <div class="media-left">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $img_url; ?>" alt="<?php echo get_the_title(); ?>" class="img-reponsive"></a>
                        </div>
                        <div class="media-body">
                            <a href="<?php the_permalink(); ?>"><h4><?php echo get_the_title(); ?></h4></a>
                            <div class="row m0 meta">Por : <a href=""><?php echo get_the_author(); ?></a> &nbsp; Em : <a href=""><?php echo get_the_date(); ?></a></div>
                            <p><?php the_excerpt(); ?> </p>
                        </div>
                    </div>
                <?php if ($count == 2): ?>
                    </div><div class="col-sm-12 col-md-6">    
                    <?php $count = 0; ?>               
                <?php endif ?>
                
                <?php  endwhile; ?>
                </div>
             </div>
             <div class="col-xs-12 text-center">
                <br><br>
                <a href="<?php echo home_url('noticias' ); ?>" class="view_all">ver todas</a>
             </div>
         </div>
    </section>
    <section class="row team_section bgf">
        <div class="container">
            <div class="row">
                <div class="col-md-12 team_menu">
                    <div class="row titleRow text-left">
                        <h5>Conheça Nosso</h5>
                        <h2>Dr. Carlos</h2>
                    </div>
                </div>
               <div class="col-md-12 team_descss">
                    <div class="row">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane media active" id="doctor1">
                                <div class="media-left media-bottom">
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/pages/doctors/1.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="media-body">
                                    <div class="row titleRow text-left">
                                        <h2>Dr. Carlos Alberto Ferreira</h2>
                                        <h5>CRM.MT 2640</h5>
                                    </div>
                                    <p>Reponsavel tecnico do cadim.</p>
                                    <!-- <ul class="social_list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul> -->
                                </div>
                            </div><!-- Doctor about-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <section class="row book_banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="row m0">
                        <h3 class="bannerTitle">ONLINE HASSLE FREE Appointment BOOKING</h3>
                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia, ipsum eu vulputate pulvinar,</h5>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="row m0">
                        <a href="#" data-toggle="modal" data-target="#appointmefnt_form_pop" class="view_all"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
