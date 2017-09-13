  <!-- RODAPE -->
        <footer id="contato">
            <section class="container">
                <div class="row">
                    <div class="col-md-12"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_retina.png" alt="" class="img-responsive logo_footer"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline">
                            <li class="col-md-offset-4 col-xs-offset-2  col-xs-2  col-md-1"><a  class="link_social" title="Facebook do hORAJOVEM" href="https://www.facebook.com/HoraJovem" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                            <li class="col-xs-2 col-md-1"><a  class="link_social" title="Instagran do hORAJOVEM" href="https://www.instagram.com/horajovem/" target="_blank"><i class="fa fa-instagram fa-2x"></i></a></li>
                            <li class="col-xs-2 col-md-1"><a  class="link_social" title="Telefone para cotato" href="tel:65999059343"><i class="fa fa-phone-square fa-2x"></i></a></li>
                            <li class="col-xs-2 col-md-1"><a  class="link_social" title="E-mail para cotato" href="mailto:contato.horajovem@hotmail.com"><i class="fa fa-envelope fa-2x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p class="text-center direitos_footer">&copy; <?php echo date('Y') ?> <?php echo bloginfo('title'); ?> - Todos Direitos Reservados. </p>
                        <p class="text-center gmweb"> <a href="http://gmwebdesigner.com.br" title="Criado e Desenvolvido por: GMWEBDESIGNER - Web Sites e Soluções." target="_blank" class="icon_gmweb"></a></p>
                    </div>
                </div>
            </section>
        </footer>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       
       
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg21mL_AmFxq1hhTIdaiXFg4yjUmUiHUU&callback=initMap"></script>
        <?php
            $args = array( 'post_type' => 'post', 'category_name' => 'preletores','orderby' => 'date', 'order' => 'ASC');
            $loop = new WP_Query( $args );
            $i=0;
            while ( $loop->have_posts() ) : $loop->the_post();
                $i++;
        ?>
        <!-- Modal -->
        <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="myModalLabel">Sobre</h4>
                        </div>
                    <div class="modal-body">
                        <center>
                        <img src="<?php the_post_thumbnail_url(); ?>" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                        <br>
                        <h3 class="media-heading"><?php the_title(); ?></h3>
                        <hr>
                        <center>
                        <p class="text-left"><strong>Biografia: </strong><br>
                            <?php the_content(); ?></p>
                        <br>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <center>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

    </body>
</html>