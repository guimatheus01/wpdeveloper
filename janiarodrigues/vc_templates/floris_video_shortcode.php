<?php
/*
 *
 * Video shortcode for VC
 *
 */
$title = $image = $link = $link_v = ''; 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$img = ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';

$rest = substr($link, -11);
$embed = substr($link, -13, 1);

?>



<section class="section-full video-h <?php print esc_html($css_class); ?>">
	<div class="bg" <?php if (!empty ($image)) { ?> style="background-image:url(<?php print esc_url($img); ?>)" <?php } ?> ></div>
	<div class="container">
        <div class="vertical-align w-full video-title">
        	<?php if (!empty($link)) { ?>
        		<?php if($embed == 'd') { ?> 
	        		<div class="play-button" data-video="<?php print esc_url($link); ?>?autoplay=1"><i class="icon-play"></i></div>
	        	<?php } else {  ?>
	        		<div class="play-button" data-video="<?php print esc_attr('https://www.youtube.com/embed/'); ?><?php print esc_attr($rest); ?>?autoplay=1"><i class="icon-play"></i></div>	
	        	<?php } ?>	
	        <?php } ?>
	        <?php if (!empty($link_v)) { ?>
	        <div class="play-button" data-video="<?php print esc_url($link_v); ?>?autoplay=1"><i class="icon-play"></i></div>
	        <?php } ?>
	        <?php if (!empty ($title)) { ?>
		    <h3 class="h3"><?php print esc_html($title); ?></h3>
            <?php } ?>
        </div>      
	</div>
	<div class="video-item">
	    <div class="video-wrapper">
		    <div class="video-iframe"></div>
			<div class="close-video"><span>+</span></div>
	    </div>
	</div>
</section>