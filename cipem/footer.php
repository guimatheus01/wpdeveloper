 <!--// Main Section \\-->
            <div class="environment-footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="environment-fancy-title"><h2><span> Sindicatos</span></h2></div>
                            <!--// Partner \\-->
                            <div class="environment-partner-slider">
                                <?php
                                    $args = array( 'post_type' => 'sindicato', 'orderby' => 'date',  'order' => 'desc', 'showposts' =>  10);
                                    $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                        $img_thumb=get_post_meta(get_the_ID(), 'revista_capa', true );
                                ?>
                                <div> <a data-toggle="modal" data-target="#myModal-<?php echo get_the_ID(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" title="<?php the_title(); ?>"<?php the_title(); ?>"></a> </div>

                                <?php endwhile; ?>
                            </div>
                            <!--// Partner \\-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Main Content \\-->
        <!--// Footer \\-->
        <footer id="environment-footer" class="environment-footer-two">
            <span class="footer-transparent"></span>
            <div class="environment-footer-widget">
                <div class="container">
                    <div class="row">
                        <!--// Widget Contact Info \\-->
                        <aside class="col-md-4 widget widget_contact_info">
                            <div class="environment-footer-title"><h2>Sobre o CIPEM</h2></div>
                            <p>Centro das Indústrias Produtoras e Exportadoras de Madeira  do Estado de Mato Grosso.</p>
                            <ul>
                                <li><i class="fa fa-map-marker"></i> Av. Historiador Rubens de Mendonça, nº 4193, Centro Político Administrativo – CEP: 78049-940</li>
                                <li><i class="fa fa-phone"></i>(65) 3644-3666</li>
                            </ul>
                            <ul class="environment-footer-social">
                               <li><a href="https://www.facebook.com/setorflorestaldeMT/" class="icon-facebook2"></a></li>
                                <li><a href="https://twitter.com/CipemMT" target="_blank" class="icon-social43"></a></li>
                                <li><a href="https://www.instagram.com/cipemmt/" target="_blank" class="icon-instagram"></a></li>
                                <li><a href="https://www.youtube.com/user/Manejosustentavel" target="_blank" class="icon-youtube"></a></li>
                                <li><a href="https://soundcloud.com/user-440742351" target="_blank" class="icon-soundcloud2"></a></li>
                            </ul>
                        </aside>
                        <!--// Widget Contact Info \\-->
                        <!--// Widget Latest News \\-->
                        <aside class="col-md-4 widget widget_latest_news">
                            <div class="environment-footer-title"><h2>Últimas Noticias</h2></div>
                            <ul>
                                <?php
                                    $args = array( 'post_type' => 'post', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 2);
                                    $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                        $categories = get_the_category();
                                        $cat = $categories[0];
                                 ?>
                                <li>
                                    <?php if (has_post_thumbnail()): ?>
                                        <figure><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium'); ?>" alt=""></a></figure>
                                    <?php endif ?>
                                    <section>
                                        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                        <time><time><?php echo get_the_date(); ?></time></time>
                                    </section>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                        </aside>
                        <!--// Widget Latest News \\-->
                        <!--// Widget Twitter \\-->
                        <aside class="col-md-4 widget widget_twitter">
                            <div class="environment-footer-title"><h2>Facebook Feeds</h2></div>
                            <?php echo do_shortcode('[custom-facebook-feed]'); ?>
                        </aside>
                        <!--// Widget Twitter \\-->
                    </div>
                </div>
            </div>
            <!--// CopyRight Section \\-->
            <div class="environment-copyright environment-copyright-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="environment-copyright-wrap">
                                <a href="<?php echo home_url(); ?>" class="environment-footer-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.png" alt=""></a>
                                <p>© <?php echo date('Y'); ?> - Todos os Direitos Reservados. -  <a class="gsw" href="http://gsw.net.br/" target="_blank" title="A GSW é uma empresa de soluções completas e personalizadas na web, para que sua empresa posicione-se no topo do mercado virtual."></a></p>
                                <a href="#" class="environment-back-top"><i class="fa fa-angle-up"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// CopyRight Section \\-->
        </footer>
        <!--// Footer \\-->
    <div class="clearfix"></div>
    </div>
    <!--// Main Wrapper \\-->
    <!-- MODAL SINDICATOS -->
    <?php
        $args = array( 'post_type' => 'sindicato', 'orderby' => 'date',  'order' => 'desc', 'showposts' =>  10);
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <div class="modal fade bs-example-modal-lg" id="myModal-<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php the_title(); ?></h4>
          </div>
          <div class="modal-body">
            <div class="col-md-8"><?php the_content(); ?></div>
            <div class="col-md-4"><?php the_post_thumbnail('full'); ?></div>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <!-- MODAL SINDICATOS -->
    <!-- jQuery (necessary for JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/script/jquery.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGP7Lh2Iz05jwbyw0pXcMgM-JTrIue6N4&callback=init" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/script/functions.js"></script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    $(".fancybox-right").fancybox({
        beforeShow : function() {
            var alt = this.element.find('img').attr('alt');          
            this.inner.find('img').attr('alt', alt);            
            this.title = alt;
        }
    });
    </script>  
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); 

    ga('create', 'UA-26453807-2', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('require', 'linkid', 'linkid.js');
    jQuery(a[href^="http"]).filter(function () { if (!this.href.match(/.*\.(zip|mp3*|mpe*g|pdf|docx*|pptx*|xlsx*|rar*)(\?.*)?$/)) { if (this.href.indexOf('devops.web-dorado.info') == -1) { return this.href }; } }).click(function (e) { ga('send', 'event', 'outbound', 'click', this.href, {'nonInteraction': 1}); });
    jQuery('a').filter(function () { return this.href.match(/.*\.(zip|mp3*|mpe*g|pdf|docx*|pptx*|xlsx*|rar*)(\?.*)?$/); }).click(function (e) { ga('send', 'event', 'download', 'click', this.href, {'nonInteraction': 1}); }); jQuery('a[href^="mailto"]').click(function (e) { ga('send', 'event', 'email', 'send', this.href, {'nonInteraction': 1}); });

    ga('send', 'pageview');
    </script>

    <?php wp_footer(); ?>
  </body>
</html>

