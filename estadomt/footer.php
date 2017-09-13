	<div class="container">
        <div class="anuncio-meio">
            <?php echo(do_shortcode('[wp_bannerize_pro categories="baixo-site"]')); ?>
        </div>
    </div>

	<footer>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand.png" class="img-responsive brand-footer">
					</div>
					<div class="col-md-9">
						<?php 
		                  wp_nav_menu(
		                      array(
		                          'depth' => '2',
		                          'theme_location' => 'primary', 
		                          'container' => '<ul>', 
		                          'menu_class' => 'nav navbar-nav footer-menu', 
		                          'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
		                      )
		                  ); 
		                ?> 
					</div>
				</div>
				<div class="row info-footer">
					<div class="col-md-6">
						<p>BEZALIEL DA SILVA NEGRÃO - ME - 06.905.937/0001-92 <br> Rua Quatro, 27 - CPA III - 78058-330 -  Cuiabá/MT</p>
					</div>
					<div class="col-md-6">
						<p>CONTATOS: <br> <a href="tel:065996272202">(65) 9 9627-2202 | <a href="mailto:redacao@estadomt.com.br">redacao@estadomt.com.br</a></a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>

    <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


	<?php wp_footer(); ?>
  </body>
</html>