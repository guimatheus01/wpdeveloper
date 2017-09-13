
<?php
/*
 *
 * Google map shortcode for VC
 *
 */
$latitude = $longitude = $zoom = $marker_text = ''; 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$img = ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';

?>
<div class="map-container map-container-type-4">
	<div id="map-canvas" data-lat="<?php print esc_html($latitude); ?>" data-lng="<?php print esc_html($longitude)?>" data-zoom="<?php print esc_html($zoom); ?>" data-style="style-1" data-marker="<?php print esc_url($img); ?>"></div>
	<?php if(!empty($marker_text)) { ?>
		<div class="addresses-block">
		   <a data-lat="<?php print esc_html($latitude); ?>" data-lng="<?php print esc_html($longitude)?>" data-string="<?php print esc_html($marker_text)?>"></a>
		</div>
	<?php } ?>
</div>


<?php 
	wp_enqueue_script( 'map'); 
	wp_enqueue_script( 'maps'); 
?>