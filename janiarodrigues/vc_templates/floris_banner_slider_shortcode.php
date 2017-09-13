<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$slider_speed = 0;
if( $atts['slider_play'] ){ $slider_speed = $atts['slider_speed']; }
?>
<?php if( class_exists( 'WooCommerce' ) ) { ?>
	<div class="top-slider">
		<div class="swiper-container animation-slider" data-autoplay="<?php print esc_html( $slider_speed ); ?>">
			<div class="swiper-wrapper">
			    <?php if( function_exists( 'floris_content' ) ){ floris_content($content); } else { _e('<span class="not_floris">Floris Plugin not Activated!</span>','floris'); } ?>
			</div>
			<div class="pagination"></div>
			<div class="swiper-arrow-left slider-arrow"><img src="<?php print esc_url( get_template_directory_uri().'/images/arrow_left.png' ); ?>" alt=""></div>
			<div class="swiper-arrow-right slider-arrow"><img src="<?php print esc_url( get_template_directory_uri().'/images/arrow_right.png' ); ?>" alt=""></div>
		</div>
	</div>
<?php } else { ?>
	<div class="vc_empty_space" style="height: 132px"><span class="vc_empty_space_inner"></span></div>
    <h1 class="h3 text-center"><?php esc_html_e('WooCommerce not Activated!', 'floris'); ?></h1>
<?php } ?>