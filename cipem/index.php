<?php get_header(); ?>
        <!--// Main Banner \\-->
        <div class="environment-banner">
            <!--// Slider \\-->
            <div class="environment-banner-one">
                <?php
                    $args = array( 'post_type' => 'banner', 'orderby' => 'date',  'order' => 'asc', 'showposts' => 9);
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                 ?>
                <div class="environment-banner-one-layer">
                    <a href="<?php the_field('link_do_banner'); ?>">
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
            <!--// Slider \\-->          
        </div>
        <!--// Main Content \\-->
        <div class="environment-main-content">
        <!--// Main Section 
            <div class="environment-main-section environment-minus-margin">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="enviroment-services-strip">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <h2 class="enviroment-heading"><span>Rádio</span> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CIPEM</h2>
                                    </li>
                                    <li class="col-md-6">
                                        <i class="fa fa-volume-up"></i>
                                        <h2>Fique por dentro das noticias do CIPEM.</h2>
                                    </li>
                                    <li class="col-md-3">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                        <h2><span>Ouça</span><br> <a href="<?php echo home_url(); ?>/radio-cipem" class="enviroment-heading link-radio">AGORA</a></h2>
                                    </li>
                                     <li class="col-md-3">
                                        <i class="icon-three3"></i>
                                        <h2><span>The</span> BETTER</h2>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            // Main Section \\-->
            <div class="environment-main-section environment-services-space no-space-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="enviroment-services enviroment-simple-services">
                                <ul class="row">
                                    <li class="col-md-6">
                                        <div class="enviroment-services-left" onclick="location.href='<?php echo home_url(); ?>/manejo-florestal';" style="cursor: pointer;">
                                            <span><i class="icon-nature3"></i></span>
                                            <section>
                                                <h5><a href="<?php echo home_url(); ?>/manejo-florestal">Manejo Florestal</a></h5>
                                                <p>Saiba mais sobre esta técnica e suas vantagens.</p>
                                            </section>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="enviroment-services-right" onclick="location.href='<?php echo home_url(); ?>/dados-do-setor';" style="cursor: pointer;">
                                            <span><i class="icon-nature3"></i></span>
                                            <section>
                                                <h5><a href="<?php echo home_url(); ?>/dados-do-setor">Dados do Setor</a></h5>
                                                <p>Confira dados econômicos e de produção do setor de base florestal.</p>
                                            </section>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="enviroment-services-left" onclick="location.href='<?php echo home_url(); ?>/noticias';" style="cursor: pointer;">
                                            <span><i class="icon-technology9"></i></span>
                                            <section>
                                                <h5><a href="<?php echo home_url(); ?>/noticias">Sala de Imprensa</a></h5>
                                                <p>Acompanhe nossas notícias, fotos e vídeos.</p>
                                            </section>
                                        </div>
                                    </li>
                                    <li class="col-md-6">
                                        <div class="enviroment-services-right" onclick="location.href='<?php echo home_url(); ?>/legislacoes';" style="cursor: pointer;">
                                            <span><i class="icon-arrows10"></i></span>
                                            <section>
                                                <h5><a href="<?php echo home_url(); ?>/legislacoes">Legislação</a></h5>
                                                <p>Conheça as principais normas e leis que regem as atividades do setor.</p>
                                            </section>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr> <br><br>
                    <div class="col-sm-6 col-md-7">
                        <div class="environment-counter">
                             <?php
                                $args = array( 'post_type' => 'avisos', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 1);
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                             ?>                        
                            <div class="environment-project-medium-wrap brief-news">                              
                                <figure><strong class="title-brief-news"><i class="fa fa-exclamation" aria-hidden="true"></i> FIQUE DE OLHO!</strong><a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url(); ?>" alt=""></a></figure>
                                <section>
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="environment-readmore-btn">Saiba mais</a>
                                    <br>
                                </section>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <div class="environment-counter guia">
                            <br>
                            <div class="border">
                                <a href="<?php echo home_url(); ?>/guia-da-industria" class="environment-donate-btn"><span>GUIA DA INDÚSTRIA</span></a>
                                <div class="clearfix"></div>
                                <p>Aqui você confere todas as empresas filiadas aos sindicatos que compõem o Cipem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="environment-main-section environment-blog-grid-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="environment-fancy-title"><h2>Últimas <span> Noticias</span></h2></div>
                            <div class="environment-blog environment-blog-grid">
                                <ul class="row news shop-grid-slider">
                                     <?php
                                        $args = array( 'post_type' => 'post', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 9);
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                            $categories = get_the_category();
                                            $cat = $categories[0];
                                            $info_post=get_post_meta(get_the_ID(), 'posts_shotcode', true );
                                     ?>
                                    <li class="col-md-4">
                                    <?php if (has_post_thumbnail()): ?>
                                        <figure><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt=""><i class="fa fa-share-square-o"></i></a></figure>
                                    <?php endif ?>
                                        <div class="environment-blog-grid-text">
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                                            <p><?php the_excerpt(); ?></p>
                                            <ul class="blog-grid-option">
                                                <li>
                                                    <i class="fa fa-calendar-o"></i>
                                                    <time><?php echo get_the_date(); ?></time>
                                                </li>
                                                <li>
                                                    <i class="fa fa-archive"></i>
                                                    <a><?php echo($cat->name); ?></a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-user"></i>
                                                    <a><?php echo $info_post; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                <div class="row text-center">
                                    <br><br>
                                    <a href="<?php echo home_url(); ?>/noticias" class="environment-readmore-btn">Ler Todas Noticias</a>
                                    <br><br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <!--// Main Section \\-->
            <div class="environment-main-section">
                <div class="container-fluid">
                    <div class="environment-fancy-title"><h2>Galeria de<span> Fotos</span></h2></div>
                    <div class="environment-project environment-modren-project">
                        <ul class="row">
                            <?php
                                $args = array( 'post_type' => 'galeria', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 4);
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                            ?>
                            <li class="col-md-3">
                                <figure>
                                    <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large'); ?> " alt=""></a>
                                    <figcaption>
                                        <span class="environment-top-bottom-border"></span>
                                        <div class="environment-gallery-text">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <span><a href="<?php the_permalink(); ?>" class="readmore-btn">Ver Fotos</a></span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <?php endwhile ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
            <div class="environment-main-section environment-blog-grid-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="environment-fancy-title"><h2>Galeria de<span> Vídeos</span></h2></div>
                            <div class="environment-blog environment-blog-grid">
                                <div class="row">
                                    <div class="col-md-6 col-md-push-3">
                                        <figure>
                                            <a href="<?php echo home_url(); ?>/sobre"><iframe height="300" src="https://www.youtube.com/embed/w7Pnw-OOrWg" frameborder="0" allowfullscreen=""></iframe></a>
                                        </figure>
                                        <section class="text-center">
                                            <br>
                                            <span>Veja o vídeo institucional do CIPEM.</span>
                                        </section>
                                    </div>
                                </div>
                                <br><br>
                                <ul class="row">
                                    <?php
                                        $args = array( 'post_type' => 'video', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 3);
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                            $link_video=get_post_meta(get_the_ID(), 'oembed', true );
                                            $embed_video = explode('watch?v=', $link_video); 
                                    ?>
                                    <li class="col-md-4">
                                        <figure><a href="<?php the_permalink(); ?>"><iframe height="210" src="https://www.youtube.com/embed/<?php echo(ltrim($embed_video[1])); ?>" frameborder="0" allowfullscreen></iframe><i class="fa fa-share-square-o"></i></a></figure>
                                        <div class="environment-blog-grid-text">
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p><?php the_excerpt(); ?></p>
                                            <ul class="blog-grid-option">
                                                <li>
                                                    <i class="fa fa-calendar-o"></i>
                                                    <time><?php echo get_the_date(); ?></time>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                <div class="row text-center">
                                    <br>
                                    <a href="<?php echo home_url(); ?>/video" class="environment-readmore-btn">Ver Todos Videos</a>
                                    <br><br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
            <div class="environment-main-section environment-donate-sectionfull">
                <span class="donate-transparent"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="environment-section-text">
                                <h2></h2>
                                <p>" Fundado em 2004, o Cipem abrange 100% dos municípios produtores de madeira nativa de Mato Grosso. "</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="environment-donate-form">
                                <h2>Assine agora a <span>Newsletter</span></h2>
                                <p>Fique por dentro de tudo que acontece no Cipem.</p>
                                <form>
                                    <?php echo do_shortcode('[mc4wp_form id="75"]'); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="environment-main-section environment-modren-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="environment-fancy-title"><h2>Informativo <span>Cipem</span></h2></div>
                            <div class="environment-event environment-modren-event">
                                <ul class="row">
                                    <?php
                                        $args = array( 'post_type' => 'informativos', 'orderby' => 'date',  'order' => 'desc', 'showposts' =>  1);
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                            $img_thumb=get_post_meta(get_the_ID(), 'informativos_capa', true );
                                    ?>
                                    <li class="col-md-12">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url('medium_large'); ?>" alt=""><i class="fa fa-share-square-o"></i></a>
                                            <time><?php echo get_the_date(); ?></time>
                                        </figure>
                                        <div class="environment-modren-event-text">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <br>
                                            <p><?php the_excerpt(); ?><br><br></p>
                                            <p><a href="<?php the_permalink(); ?>" class="environment-fancy-btn">Leia Agora<span></span></a></p>
                                        </div>
                                    </li>
                                    <?php endwhile ?>
                                </ul>
                                <div class="row text-center">
                                    <br>
                                    <a href="<?php echo home_url(); ?>/informativos" class="environment-readmore-btn">Ler Todos Informativos</a>
                                    <br><br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>

