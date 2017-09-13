<?php
/*
 *
 * Subscribe shortcode for VC
 *
 */
$title = $subtitle = $b_text = $t_mes = $mc_form_url = ''; 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
?>

<div class="container <?php print esc_html($css_class); ?>">
    <form <?php if($mc_form_url){ print wp_kses_post( 'action="'.esc_html($mc_form_url).'"' );}?> class="contact-form" id="contact-form">
        <?php if (!empty($title)) { ?>
         <h6 class="h6 title"><?php print esc_html($title); ?><br> <?php if (!empty($subtitle)) { print esc_html($subtitle); } ?></h6>
         <?php } ?>
         <div class="contact-input">
             <input placeholder="Enter you e-mail" name="email" required="" type="email"> 
            <?php if (!empty($t_mes)) { ?>
             <div class="success">
               <span><?php print esc_html($t_mes); ?></span>
             </div>
             <?php } ?>
         </div>
         <?php if (!empty($b_text)) { ?>
         <div class="send-button">
            <input type="submit" class="submit" value="<?php print esc_html($b_text); ?>">
            <span class="icon-ok"></span>
         </div>
         <?php } ?>
    </form>
</div>