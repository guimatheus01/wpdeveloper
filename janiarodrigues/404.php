<?php
	get_header();
?>
<div class="content">
    <div class="top-slider mobile-h">
        <div class="fasion-baner fasion-baner-404">
            <div class="fashion-title">
            	<?php 
                    $fp_array = floris_get_option('foto_404');
            		$fp = $fp_array['url'] ;
            		if($fp) {
            	?>
		                <div class="image">
		                	<img src="<?php print esc_url( $fp ); ?>" alt="image_404" class="resp-img">
		                </div>
	            <?php }?>
                <div class="mobile-404">
                    <img class="resp-img" src="<?php print esc_url( get_template_directory_uri ().'/assets/img/404mobile.png'); ?>" alt="404mobile">
                </div>
                <div class="vertical-align w-full button">
                    <a href="<?php print esc_url( home_url('/') ); ?>" class="button-style-2"><span><?php esc_html_e( 'Volte a página inicial', 'floris' ); ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();