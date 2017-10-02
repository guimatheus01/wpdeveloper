    <section class="row book_banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="row m0">
                        <h3 class="bannerTitle">AGENDE SEU EXAME</h3>
                        <h5>Faça seu agendamento online. Simples e pratico ! </h5>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="row m0">
                        <a data-toggle="modal" data-target="#appointmefnt_form_pop" class="view_all">Agende Agora !</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="row">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-lg-4 footer_menuList">
                    <div class="heading row m0"><img width="135px" src="<?php echo get_template_directory_uri(); ?>/img/logo-cadim-footer.png" alt="<?php echo(bloginfo('title')); ?>"></div>
                    <div class="row menuList">

                             <?php
                               wp_nav_menu( array(
                                    'menu'              => 'footer-one',
                                    'theme_location'    => 'footer-one',
                                    'depth'             => 2,
                                    'container'         => 'ul',
                                    'container_class'   => 'firstOrderList nav',
                                    'container_id'      => 'bs-example-navbar-collapse-1',
                                    'menu_class'        => 'firstOrderList nav',
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'            => new WP_Bootstrap_Navwalker())
                                );
                            ?> 
                             <?php
                                wp_nav_menu( array(
                                    'menu'              => 'footer-two',
                                    'theme_location'    => 'footer-two',
                                    'depth'             => 2,
                                    'container'         => 'ul',
                                    'container_class'   => 'secondOrderList nav',
                                    'container_id'      => 'bs-example-navbar-collapse-1',
                                    'menu_class'        => 'secondOrderList nav',
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'            => new WP_Bootstrap_Navwalker())
                                );
                            ?> 
                    </div>
                </div>
                <div class="col-sm-4 col-md-6 col-lg-3 footer_address hidden-xs">
                    <div class="heading row m0"></div>
                    <div class="row address m0">
                        <div class="media address_line">
                            <p class="text-justify">
                                <strong>O CADIM</strong> <br>
                                Promover medicina diagnóstica cada vez mais completa auxiliando de maneira eficaz no tratamento clínico e proporcionando o bem estar das pessoas com Ética, responsabilidade e humanidade.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-6 col-lg-4 col-lg-offset-1 footer_address">
                    <div class="heading row m0"></div>
                    <div class="row address m0">
                        <div class="media address_line">
                            <div class="media-left icon"><i class="fa fa-map-marker"></i></div>
                            <div class="media-body address_text">Av. Aclimação, N° 335 - Bosque da Saúde <br>Anexo Hospital São Mateus <br> Cuiabá - Mato Grosso</div>
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
            <div class="row m0 footer_bottom">
                <ul class="list-inline social_menu m0 fleft">
                    <?php
                       $args = array( 'post_type' => 'social', 'showposts' => -1);
                       $loop = new WP_Query( $args );
                       while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <li><a href="<?php echo get_field('link_da_rede_social') ?>" target="_blank"><i class="fa <?php echo get_field('icone_rede_social') ?>"></i></a></li>
                    <?php endwhile; ?>
                </ul>
                <div class="fright copyright">&copy; <a><?php echo bloginfo('title') ?> | <?php echo date('Y') ?></a>. Todos Direitos Reservados. -  <a class="onewave" href="http://www.onewave.com.br/" target="_blank" title="A OneWave é uma empresa de soluções completas e personalizadas na web, para que sua empresa posicione-se no topo do mercado virtual."></a></div>
            </div>
        </div>
    </footer>

    <!-- Return to Top -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    
    <div class="modal fade" id="appointmefnt_form_pop" tabindex="-1" role="dialog" aria-labelledby="appointmefnt_form_pop">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <?php echo do_shortcode('[contact-form-7 id="137" title="Agendamento de Exame"]'); ?>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
    
    <!--jQuery-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.3.min.js"></script>
    <!--Google Map-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2SagnuoBecVaTpQYOsLWw63Iq_o_No6Y"></script>
    <!--Owl Carousel-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/owl.carousel/js/owl.carousel.min.js"></script>
    <!--Counter Up-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/counterup/jquery.counterup.min.js"></script>
    <!--Waypoints-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/waypoints/waypoints.min.js"></script>
    <!--Bootstrap Date-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <!--FlexSlider-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/flexslider/jquery.flexslider-min.js"></script>
    <!--RV-->
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/vendors/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <!--Strella JS-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/revs.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/google-map.js"></script>




    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <script>
    jQuery(function($) {
    $('.navbar .dropdown').hover(function() {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

    }, function() {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

    });

    $('.navbar .dropdown > a').click(function(){
    location.href = this.href;
    });

    });
    </script>
    
</body>
</html>





