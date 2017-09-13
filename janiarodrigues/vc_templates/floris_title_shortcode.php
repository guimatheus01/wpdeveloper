<?php
/*
 *
 * Title with separator shortcode for VC
 *
 */
$title_type = $title_transform = $title = $title_size = $title_color = $subtitle = $el_class = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

?>

<?php if ($title_type == 'type_1') { ?>
    <?php if (!empty($title)) { ?>
        <div class="second-caption <?php print esc_html($css_class); ?>">
            <h3 class="h3 title <?php print esc_html($el_class); ?>" style="<?php if (!empty($title_transform)){ print wp_kses_post( 'text-transform: ' . esc_html($title_transform) . ';line-height: inherit;' ); } if (!empty($title_color)){ print wp_kses_post( 'color: ' . esc_html($title_color) . ';' ); } if (!empty($title_size)){ print wp_kses_post( 'font-size: ' . esc_html($title_size) . 'px;' ); }?>"><?php print esc_html($title); ?></h3>
            <?php if (!empty($subtitle)) {
                print wp_kses_post( '<div class="simple-text"><p>'.$subtitle.'</p></div>' );
            } ?>
        </div>
    <?php } ?>
<?php } ?>
        
<?php if ($title_type == 'type_2') { ?>
    <?php if (!empty($title)) { ?>
        <div class="second-caption style-2 <?php print esc_html($css_class); ?>">
            <h3 class="h3 title font-fam-2 <?php print esc_html($el_class); ?>" style="<?php if (!empty($title_transform)){ print wp_kses_post( 'text-transform: ' . esc_html($title_transform) . ';line-height: inherit;' ); } if (!empty($title_color)){ print wp_kses_post( 'color: ' . esc_html($title_color) . ';' ); } if (!empty($title_size)){ print wp_kses_post( 'font-size: ' . esc_html($title_size) . 'px;' ); } ?>"><?php print esc_html($title); ?></h3>
            <?php if (!empty($subtitle)) {
                print wp_kses_post( '<div class="simple-text"><p>'.$subtitle.'</p></div>' );
            } ?>
        </div>
    <?php } ?>
<?php } ?>        