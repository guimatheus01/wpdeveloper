<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Footer Template
 *
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$test = $color = $repeat = $position = $size = $attachment = $result = '';
if( floris_get_option('custom_footer', 1) ) {
	$background_footer_array = floris_get_option('background_footer');
	$color = $background_footer_array['background-color'];
	$background_image = $background_footer_array['background-image'];
	$repeat = $background_footer_array['background-repeat'];
	$position = $background_footer_array['background-position'];
	$size = $background_footer_array['background-size'];
	$attachment = $background_footer_array['background-attachment'];
}
$footer_type = floris_get_option( 'footer-style' );
$button_lang = floris_get_option('button-lang');


$footer_lang = 0;
if( is_plugin_active('sitepress-multilingual-cms/sitepress.php') ){
	$sitepress_settings = get_option('icl_sitepress_settings');
	if(isset($sitepress_settings['icl_lang_sel_footer'])){
		$lang_footer = $sitepress_settings['icl_lang_sel_footer'];
		if( $lang_footer && $button_lang == '1' ){
			$footer_lang = 1;
		}
	}
}
?>
	    <footer <?php if($footer_type == '2' && floris_get_option('custom_footer') == '0'){print wp_kses_post('class="footer-style-2"');} if( floris_get_option('custom_footer', 1) ){ print wp_kses_post( 'style="background-color:'.$color.'; background-image:url('.$background_image.'); background-repeat:'.$repeat.'; background-attachment:'.$attachment.'; background-position:'.$position.'; background-size:'.$size.';"' );} ?>>
	      	<div class="container">
           	    <div class="info-empresa">
       	           <div class="col-md-6 pay-cert">
       	               <span><small>CERTIFICADOS</small> <br><br></span>
       	               <a href="https://www.google.com/transparencyreport/safebrowsing/diagnostic/?hl=pt-BR#url=http://www.janiarodrigues.com.br" target="_blank" class="celos"><img class="img-responsive" src="http://janiarodrigues.com.br/wp-content/uploads/2016/10/ssl-google-certificado.png"></a>
       	           </div>
       	           <div class="col-md-6 pay-cert">
       	               <span><small>FORMAS DE PAGAMENTO</small> <br><br></span>
       	               <center><img class="img-responsive" src="http://janiarodrigues.com.br/wp-content/uploads/2016/10/todos_animado_550_50.gif"></center>
       	           </div>
           	    </div>
	      	  	<div class="footer">
			      	<?php if( floris_get_option('footer_social', 1) ) { ?>
		                <div class="footer-folow share-link">
		                	<?php 
		                		$social = floris_get_option('soc-slides');
		                		if( ! empty( $social) ) {
					            foreach ( $social as $val )
					            	if($val['url'] && $val["description"]) {
					            		print wp_kses_post( '<a href="'.esc_url( $val["url"] ).'" target="_blank"><i class="'.$val["description"].'"></i><i class="'.$val["description"].'"></i></a>' );
					            	}
					        } ?>
		                </div>
		            <?php } ?>
		            <?php
		                if( $button_lang == '2' ){
	                        do_action('wpml_add_language_selector');
	                    }
			            if( floris_get_option('footer_menu', 1) ){
	                        if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'footer-menu' ) ) {
	                            wp_nav_menu( array( 'theme_location' => 'footer-menu',
	                                                'container'      => 'ul',
	                                                'menu_class'	 => 'footer-nav',
	                                                'sort_column'    => 'menu_order',
	                                                'depth'          => 0
	                            ) );
	                        } else {
	                            esc_html_e( 'Please assign footer menu in Appearance->Menus', 'floris' );
	                        }
	                    }
                    ?>
	             	<div class="copyright"><span>
	             		<?php 
	             			if( floris_get_option('footer_right', 1) ) {
								print wp_kses_post( floris_get_option('footer_right_text') );
							} 
						?></span>
					</div>
					<div class="text-center copy">
        			    <span>© TODOS OS DIREITOS RESERVADOS - <?php echo date('Y') ?> - </span>
        			    <a class="gsw" href="http://gsw.net.br/" target="_blank" title="A ONEWAVE é uma empresa de soluções completas e personalizadas na web, para que sua empresa posicione-se no topo do mercado virtual."></a>
        			</div>
					<?php print wp_kses_post( ( $footer_lang ? '<div class="footer_message">Please, enable Themes Options->General Settings->Switch language->footer</div>' : '' ) ); ?>
	           	</div>
	      	</div>
      	</footer>

     	<!--==========CHECKOUT============-->
     
     	<div class="check-out popup mark-popup-2">
     		<div class="close-popup"><span></span></div>
 			<div class="check-content">
 				<div id="fl-mini-cart-loader">
 					<div class="fl-loader"><?php esc_html_e( 'Atualizando...', 'floris' ); ?>
 						<div class="loader-wrapper button_load"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>
 					</div>
 				</div>
 				<div class="widget_shopping_cart cart_ajax">
 					<div>
	 					<?php
	 						if( class_exists( 'WooCommerce' ) ) { 
		 						woocommerce_mini_cart();
		 					} else { 
						       	esc_html_e( 'WooCommerce not Activated!', 'floris' );
						    } ?>
		 				?> 
	 				</div>
 				</div>
 			</div>
     	</div>   
    <?php 
    if ( floris_get_option('back_top') ) { ?>
		<div id="btt"><i class="fa fa-angle-up"></i></div>
	<?php }
	//photoswipe
	if( is_singular( 'product' ) ){ ?>
		<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="pswp__bg"></div>
		    <div class="pswp__scroll-wrap">
		        <div class="pswp__container">
		            <div class="pswp__item"></div>
		            <div class="pswp__item"></div>
		            <div class="pswp__item"></div>
		        </div>
		        <div class="pswp__ui pswp__ui--hidden">
		            <div class="pswp__top-bar">
		                <div class="pswp__counter"></div>
		                <button class="pswp__button pswp__button--close" title="<?php esc_html_e('Fechar (Esc)', 'floris'); ?>"></button>
		                <button class="pswp__button pswp__button--fs" title="<?php esc_html_e('Tela Cheia', 'floris'); ?>"></button>
		                <button class="pswp__button pswp__button--zoom" title="<?php esc_html_e('Zoom in/out', 'floris'); ?>"></button>
		                <div class="pswp__preloader">
		                    <div class="pswp__preloader__icn">
		                      	<div class="pswp__preloader__cut">
		                        	<div class="pswp__preloader__donut"></div>
		                      	</div>
		                    </div>
		                </div>
		            </div>
		            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
		                <div class="pswp__share-tooltip"></div> 
		            </div>
		            <button class="pswp__button pswp__button--arrow--left" title="<?php esc_html_e('Anterior (arrow left)', 'floris'); ?>"></button>
		            <button class="pswp__button pswp__button--arrow--right" title="<?php esc_html_e('Próximo (arrow right)', 'floris'); ?>"></button>
		            <div class="pswp__caption">
		                <div class="pswp__caption__center"></div>
		            </div>
		        </div>
		    </div>
		</div>
	<?php 
	}
	wp_footer(); ?>
	</body>
</html>