<footer id="footer-wrapper" class="footer-bottom-layout-5 mt-0">
	<div id="cms-footer-top">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
					<div class="widget">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo3.png" alt="">
						<div class="mt-3"> DESTAQUE MAGAZINE</div>
						Avenida Isaac Póvoas - 164 - Centro - Cuiabá - MT - Brasil <br/>
						65.3622.5445 - 3621.5867 - 8434.0969(102) 3456 789
						<div><a href="mailto:contato@destaquemagazine.com.br">contato@destaquemagazine.com.br</a></div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<div class="widget">
						<h3 class="wg-title">Menu</h3>
						<ul>
						<?php
                            wp_nav_menu( array(
                                'menu'              => 'primary',
                                'theme_location'    => 'primary',
                                'container'         => 'ul'
							));
                        ?>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<div class="widget widget_recent_entries">
						<h3 class="wg-title">Notícias Recente</h3>
						<ul>
							<?php
								$args = array( 'post_type' => 'post', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 5);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
							?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="cms-footer-bottom" class="layout-5 pt-3">
		<div class="container">
			<div class="row">
				<div class="footer-social footer-bottom-3 col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="cms-social">
						<a href="https://www.facebook.com/DestaqueMagazine/" target="_blank" class="fa fa-facebook" title="Facebook"></a>
						<a href="https://twitter.com/DestaqueMag" target="_blank" class="fa fa-twitter" title="Twitter"></a>
						<a href="http://www.instagram.com/destaquemagazine" target="_blank" class="fa fa-instagram" title="Instagram"></a>
					</div>
				</div>
				<div class="footer-address footer-bottom-1 col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="footer-copyright footer-bottom-2">
						<div class="cms-copyright">
							<p>Copyright ©2014 | <?php echo date('Y') ?> -  Destaque Magazine <a href="www.gsw.net.br" target="_blank" class="onewave" title="A OneWave é uma empresa de soluções completas e personalizadas na web, para que sua empresa posicione-se no topo do mercado virtual."></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php if (is_home()): ?>
<!-- Modal Page -->
<div id="revista" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<?php
			$args = array( 'post_type' => 'revistas', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 1);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title"><?php the_title(); ?></h2>
			</div>
			<div class="modal-body revista-frame">
				<?php the_field('shortcod_da_revista'); ?>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif ?>

<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery.min.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery-migrate.min.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery.themepunch.revolution.min.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/bootstrap.min.js'></script>
<script type='text/javascript' src="<?=get_template_directory_uri(); ?>/js/wow.min.js"></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery.parallax-1.1.3.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/main.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/mobile-menu.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery.prettyPhoto.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/waypoints.min.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/modernizr.min.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery.imagesloaded.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery.shuffle.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery.shuffle.init.js'></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/jquery.countTo.js'></script>
<script type="text/javascript" src="<?=get_template_directory_uri(); ?>/js/bootstrap-progressbar.min.js"></script>
<script type='text/javascript' src='<?=get_template_directory_uri(); ?>/js/owl.carousel.min.js'></script>
<script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>

<!-- comentarios do facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
	jQuery(document).ready(function() {
			jQuery('#rev_slider_1_1').show().revolution({
			dottedOverlay:"twoxtwo",
			sliderType:"standard",
			sliderLayout:"auto",
			dottedOverlay:"none",
			delay:9000,
			navigation: {
				keyboardNavigation:"off",
				keyboard_direction: "horizontal",
				mouseScrollNavigation:"off",
				mouseScrollReverse:"default",
				onHoverStop:"on",
				touch:{
					touchenabled:"on",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					swipe_direction: "horizontal",
					drag_block_vertical: false
				}
				,
				arrows: {
					style:"hebe",
					enable:true,
					hide_onmobile:true,
					hide_under:600,
					hide_onleave:true,
					hide_delay:200,
					hide_delay_mobile:1200,
					left: {
						h_align:"left",
						v_align:"center",
						h_offset:20,
						v_offset:0
					},
					right: {
						h_align:"right",
						v_align:"center",
						h_offset:20,
						v_offset:0
					}
				}
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1920,1024,778,480],
			gridheight:[550,550,400,300],
			lazyType:"none",
			shadow:0,
			spinner:"spinner3",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
		});	/*ready*/
</script>
<?php wp_footer(); ?>
</body>
</html>