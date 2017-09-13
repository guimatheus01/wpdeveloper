<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="accordion">
	<?php if( function_exists( 'floris_content' ) ){ floris_content($content); } else { _e('<span class="not_floris">Floris Plugin not Activated!</span>','floris'); } ?>
</div>