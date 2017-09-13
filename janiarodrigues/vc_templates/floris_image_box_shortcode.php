<?php
/*
 *
 * Image block shortcode for VC
 *
 */
$box_type = $image = $title = $subtitle = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$main_image= ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';

?>


<?php if($box_type == 'type_1' && $main_image) {?>
    <div class="text-center" >
        <img src="<?php print esc_url( $main_image ); ?>" alt="image" style="max-width: 100%;">
    </div>
<?php } else if($box_type == 'type_2'){?>
    <div class="col-sm-6 about-info-img">
        <?php if($main_image){ print wp_kses_post( '<img src="'.esc_url( $main_image ).'" alt="image" class="resp-img">' );}?>
    </div>
    <div class="col-sm-6 about-info">
        <?php if($title){ print wp_kses_post( '<h3 class="about-title">'.$title.'</h3>' );}?>
        <?php if($subtitle){ print wp_kses_post( '<p>'.$subtitle.'</p>' );}?>
    </div>
<?php } else if($box_type == 'type_3'){?>
    <div class="col-sm-6 about-info about-info2">
        <?php if($title){ print wp_kses_post( '<h3 class="about-title">'.$title.'</h3>' );}?>
        <?php if($subtitle){ print wp_kses_post( '<p>'.$subtitle.'</p>' );}?>
    </div>
    <div class="col-sm-6 about-info-img-right">
        <?php if($main_image){ print wp_kses_post( '<img src="'.esc_url( $main_image ).'" alt="image" class="resp-img">' );}?>
    </div>
<?php } ?>