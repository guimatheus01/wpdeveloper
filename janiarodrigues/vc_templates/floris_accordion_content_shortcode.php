<?php
$title = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
<div class="accordion-item">
	<?php if (!empty($title)) { print wp_kses_post( '<div class="accordion-title">'.esc_attr( $title ).'</div>' ); }?>
   	<?php if($content){ print wp_kses_post( '<div class="accordion-content">'.$content.'</div>' );} ?>
</div>