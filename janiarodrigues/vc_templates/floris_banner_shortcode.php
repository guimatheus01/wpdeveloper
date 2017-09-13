<?php
/*
 *
 * Banner shortcode for VC
 *
 */
$banner_type = $title = $subtitle = $image = $m_image = $b_title = $b_link = ''; 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$bg_image= ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';
$main_img= ( is_numeric( $m_image ) && ! empty( $m_image ) ) ? wp_get_attachment_url( $m_image ) : '';

?>

<?php if ($banner_type == 'type_one') { ?>
<div class="top-slider sm <?php print esc_html( $css_class ); ?>">
    <div class="category-baner">
        <?php if (!empty($image)) { ?>
        <div class="bg ready data-jarallax" data-jarallax="5" style="background:url(<?php print esc_url($bg_image); ?>)"></div>
        <?php } ?>
        <div class="balck-layer"></div>
        <div class="title vertical-align col-white">
            <?php if (!empty($title)) { ?>
            <h1 class="h1 style-1"><?php print esc_html($title); ?></h1>
            <?php } ?>
            <?php if (!empty($subtitle)) { ?>
            <div class="simple-text font-fam-3">
                <p><?php print esc_html($subtitle); ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

<?php if ($banner_type == 'type_two') { ?>
<div class="top-slider mobile-h <?php print esc_html($css_class); ?>">
    <div class="fasion-baner" <?php if (!empty($image)) { print wp_kses_post( 'style="background: url('.esc_url( $bg_image ). ') repeat;"' ); } ?>>
        <div class="fashion-title">
            <?php if (!empty($title)) { ?>
            <div class="vertical-align">
                <h2 class="h1 style-2"><?php print esc_html($title); ?></h2>
            </div>
            <?php } ?>
            <?php if (!empty($m_image)) { ?>
            <div class="image">
               <img src="<?php print esc_url($main_img); ?>" alt="" class="resp-img">
            </div>
            <?php } ?>
            <?php if (!empty($b_title)) { ?>
            <div class="vertical-align w-full button">
               <a href="<?php if(!empty($b_link)) { print esc_url($b_link); } ?>" class="button-style-2"><span><?php print esc_html($b_title); ?></span></a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

<?php if ($banner_type == 'type_three') { ?>
<div class="top-slider type-2 <?php print esc_html($css_class); ?>">
    <div class="asseccories-baner">
        <div class="bg ready data-jarallax" data-jarallax="5" <?php if (!empty($image)) { print wp_kses_post('style="background: url('.esc_url( $bg_image ).');"' ); } ?>></div>
        <div class="container">
            <div class="title vertical-align">
                <?php if (!empty($title)) { ?>
                <h2 class="h1 style-3 font-fam-2"><?php print esc_html($title); ?></h2>
                <?php } ?>
                <?php if (!empty($subtitle)) { ?>
                <div class="simple-text font-fam-1">
                    <p><?php print esc_html($subtitle); ?></p>
                </div>
                <?php } ?>
                <?php if (!empty($b_title)) { ?>
                <a href="<?php if(!empty($b_link)) { print esc_url($b_link); } ?>" class="button-style-3"><span><?php print esc_html($b_title); ?></span></a>
                <?php } ?>
            </div>
        </div> 
    </div>
</div> 
<?php } ?>
<?php if ($banner_type == 'type_four') { ?>
    <div class="top-slider type-2 <?php print esc_html($css_class); ?>">
        <div class="asseccories-baner">
            <div class="bg ready data-jarallax" data-jarallax="5" <?php if (!empty($image)) { print wp_kses_post( 'style="background: url('.esc_url( $bg_image ).');"' ); } ?>></div>
            <div class="container">
                <div class="title vertical-align about-banner">
                    <?php if (!empty($title)) { ?>
                        <h2 class="h1 style-3 font-fam-2"><?php print esc_html($title); ?></h2>
                    <?php } ?>
                    <?php if (!empty($subtitle)) { ?>
                        <div class="simple-text font-fam-1">
                            <p><?php print esc_html($subtitle); ?></p>
                        </div>
                    <?php } ?>
                    <?php if (!empty($b_title)) { ?>
                        <a href="<?php if(!empty($b_link)) { print esc_url($b_link); } ?>" class="button-style-3"><span><?php print esc_html($b_title); ?></span></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>