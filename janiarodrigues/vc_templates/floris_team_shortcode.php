<?php
/*
 *
 * Team shortcode for VC
 *
 */
$image = $name = $position = $social_fb = $social_in = $social_tw = $social_tum = $social_pi = ''; 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$img = ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';
?>
<!-- end of code from VC -->

<div class="text-center">
    <div class="team-img" style="display: inline-block;">
        <?php if($image){ print wp_kses_post( '<img src="'.esc_url( $img ).'" alt="image">' );}?>
            <div class="team-social">
                <ul>
                    <?php if (!empty($social_fb)) { ?>
                        <li><a href="<?php print esc_url($social_fb); ?>" class="icon-facebook" target="_blank"></a></li>
                    <?php } ?>
                    <?php if (!empty($social_tw)) { ?>
                        <li><a href="<?php print esc_url($social_tw); ?>" class="icon-twitter" target="_blank"></a></li>
                    <?php } ?>
                    <?php if (!empty($social_in)) { ?>
                        <li><a href="<?php print esc_url($social_in); ?>" class="icon-instagram" target="_blank"></a></li>
                    <?php } ?>
                    <?php if (!empty($social_tum)) { ?>
                        <li><a href="<?php print esc_url($social_tum); ?>" class="icon-tumbler" target="_blank"></a></li>
                    <?php } ?>
                    <?php if (!empty($social_pi)) { ?>
                        <li><a href="<?php print esc_url($social_pi); ?>" class="icon-pinterest-circled" target="_blank"></a></li>
                    <?php } ?>
                </ul>
            </div>
    </div>
    <?php if($position){ print wp_kses_post( '<span class="position">'.$position.'</span>' );}?>
    <?php if($name){ print wp_kses_post( '<h3 class="team-name">'.$name.'</h3>' );}?>
</div>
