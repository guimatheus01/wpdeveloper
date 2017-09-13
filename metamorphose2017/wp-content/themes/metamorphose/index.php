<?php get_header(); ?>
 <!-- INICIO -->
        <header id="page-top">
            <div class="container">
                <div class="cronometro">
                    <div id="clock"></div>
                </div>
                <div class="text-center txt_banner"><b>#MANIFESTANDOOREINODEDEUS</b></div>
            </div>
        </header>

        <!-- PROJETO -->
        <section class="container projeto" id="projeto">
            <div class="row">
            	<?php
					$args = array( 'post_type' => 'post', 'page_id' => 13);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
                <div class="col-md-3">
                    <img src="<?php the_post_thumbnail_url();?>" alt="Logo Tema do Projeto" class="img-responsive logo-projeto">
                </div>
                <div class="col-md-offset-2 col-md-7">
	                
                    <p class="text-left">
                        <h2><?php the_title(); ?></h2>
                        <span><?php the_content(); ?></span>
                    </p>
                </div>
                <?php endwhile; ?>
            </div>
        </section>

        <!-- PRELETORES -->
        <section id="preletores" class="preletores">
            <div class="container">
                <div class="row">
                    <h2 class="title">PRELETORES</h2>
                </div>
                <div class="row">
                	<?php
						$args = array( 'post_type' => 'post', 'category_name' => 'preletores','orderby' => 'date', 'order' => 'ASC');
						$loop = new WP_Query( $args );
						$i=0;
						while ( $loop->have_posts() ) : $loop->the_post();
							$i++;
					?>
                    <div class="col-md-3">
                    	<a href="#aboutModal<?php echo $i; ?>" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"> 
	                        <div class="thumbnail">
	                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img_preletor"/>
	                        </div>
	                        <div class="icerik-bilgi">
	                            <h4><?php the_title() ?></h4>
	                        </div>
                        </a>
                    </div>
                	<?php endwhile; ?>
                </div>
            </div>
        </section>

        <!-- PROGRAMAÇÃO -->
        <section class="container programacao" id="programacao">
            <div class="row">
                <h2 class="title_orange">PROGRAMAÇÃO</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
						$args = array( 'post_type' => 'post', 'category_name' => 'programacao');
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
					?>
					<p><?php the_content() ?></p>
					<?php endwhile ?>
                </div>
                <div class="col-md-offset-1 col-md-5 video_institucional">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/36nGQl3IKXk?ecver=2"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <!-- EVANGELISMO -->
        <section class="envagelismo" id="evangelismo">
            <div class="container">
                <div class="row">
                    <h2 class="title_orange">EVANGELISMO</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
						<p class="text-left txt_evangelismo">Os evangelismos serão realizados em <b>Cuiabá, Várzea Grande e Santo Antônio do Leverger </b> nos dias <b>25/02 e 26/02</b> fiquem atentos com as datas e horarios. <br> <b>(Passível de Alteração)</b>
                        <br><br>
                        <strong>CRONOGRAMA</strong>
                        <br>24/02 - Santo Antônio do Leverger
                        <br>25/02 - Orla do Porto (noturno e vespertino)
                        <br>26/02 - Cristo Rei (vespertino)
                        <br>26/02 - Orla do Porto e Santo Antônio do Leverger (noturno)
                        </p>
                    </div>
                    <div class="col-md-6 inscrever">
                        <p class="text-center">Para participar do evangelismo faça sua inscrição no botão abaixo <br><br> <a href="https://docs.google.com/forms/d/e/1FAIpQLSfcmDV0ERLmmex92EgDSwXm3vRnTeqUrYBERNNlZlfOjUaT5w/viewform?c=0&w=1" target="_blank" type="button" class="btn btn-primary btn-lg"><strong>INSCREVER</strong></a></p>
                    </div>
                </div>
<!--                 <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/camisaMasc.png" alt="" class="img-responsive img_evangelismo"></div>
                    <div class="col-md-4"><img src="img/.png" alt="" class="img-responsive img_evangelismo"></div>
                </div> -->
            </div>
        </section>

        <!-- PARTICIPAR -->
        <section class="container participar" id="participar">
            <div class="row">
                <h2 class="title_orange">QUER PARTICIPAR ?</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="text-left"><b>A ENTRADA NO EVENTO SERÁ GRATUITA.</b> Os custos são somente para aquisição da camiseta.</p>
                    <br><br>
                    <p>Os que desejarem realizar inscrição, favor entrar em contato no telefone <br>(65) 3685-2681 ou 9 9905-9343</p>
                </div>
                <div class="col-md-6">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    CAMISETA MANIFESTANDO O REINO
                                </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Camisetas Masculinas (P, M, G, GG, XG), nas cores: Alaranjado, Amarelo, Verde ou Azul. <br>
                                    Camisetas Feemenina Baby Look  (P, M, G, GG, XG), nas cores: Amarelo, Verde ou Rosa. <br>
                                    Valor: <strong>R$ 35.00</strong>.
                                    <br>    
                                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/camisaFem.png" alt="" class="img-responsive img_evangelismo">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/camisaMasc.png" alt="" class="img-responsive img_evangelismo"> -->
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    CAMISETA LONG LINE MANIFESTANDO O REINO
                                </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    Camisetas Long Line Masculinas (P, M, G, GG, XG), nas cores: Alaranjado, Amarelo, Verde ou Azul. <br>
                                    Camisetas Long Line Feminina (P, M, G, GG, XG), nas cores: Amarelo, Verde ou Rosa. <br>
                                    Valor: <strong>R$ 40.00</strong>.
                                    <br>    
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/camisaFem.png" alt="" class="img-responsive img_evangelismo">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/camisaMasc.png" alt="" class="img-responsive img_evangelismo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		<!-- patrocinio -->
        <section class="container patrocinio" id="">
            <div class="row">
                <h2 class="title_orange">PATROCINADORES</h2>
            </div>
            <div class="row">
                	<?php
						$args = array( 'post_type' => 'post', 'category_name' => 'patrocinio', 'orderby' => 'rand');
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
					?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img_preletor"/>
                        </div>
                    </div>
                	<?php endwhile; ?>
                </div>
        </section>

        <!-- MAPA -->
        <section class="local" id="map">
        </section>

<?php get_footer(); ?> 