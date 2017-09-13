
<?php
/*
 *
 * Contact info shortcode for VC
 *
 */
$block_type = $title = $adress = $adress_two = $email_h1 = $email_h2 = $phone_h1 = $phone_h2 = $phone_1 = $phone_2 = $phone_3 = $email_1 = $email_2 = $social_t1 = $social_t2 = $social_t3 = $social_l1 = $social_l2 = $social_l3 = $icon_1 = ''; 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
<?php if ($block_type == 'style_adr') { ?>
    <!-- Adress -->
    <div class="contact-box">
        <?php if (!empty($title)) { print wp_kses_post( '<h3>'.$title.'</h3>' ); }?>
        <?php if (!empty($adress)) { print wp_kses_post( '<p>'.$adress.'</p>' ); }?>
        <?php if (!empty($adress_two)) { print wp_kses_post( '<p>'.$adress_two.'</p>' ); }?>
    </div>
    <!-- End adress -->
<?php } else if ($block_type == 'style_email') { ?>
    <!-- Email -->
    <div class="contact-box">
        <?php if (!empty($title)) { print wp_kses_post( '<h3>'.$title.'</h3>' ); }?>
        <?php if (!empty($email_1)) { print wp_kses_post( '<a href="mailto:'.esc_html($email_1).'">'.esc_html($email_1).'</a>' );}?>
        <?php if (!empty($email_2)) { print wp_kses_post( '<a href="mailto:'.esc_html($email_2).'">'.esc_html($email_2).'</a>' );}?>
    </div>
    <!-- End Email -->
<?php } else if ($block_type == 'style_phone') { ?>
    <!-- Phone -->
    <div class="contact-box">
        <?php if (!empty($title)) { print wp_kses_post( '<h3>'.$title.'</h3>' ); }?>
        <?php if (!empty($phone_1)) { $phone_n = preg_replace('/[^\dxX]/', '', $phone_1); print wp_kses_post( '<a href="tel:'.esc_html($phone_n).'">'.esc_html($phone_1).'</a>' ); };?>
        <?php if (!empty($phone_2)) { $phone_num = preg_replace('/[^\dxX]/', '', $phone_2); print wp_kses_post( '<a href="tel:'.esc_html($phone_num).'">'.esc_html($phone_2).'</a>' ); };?>
    </div>
    <!-- End phone -->
<?php } else if ($block_type == 'style_social') { ?>
    <!-- Social -->
    <div class="contact-box contact_social">
        <?php if (!empty($title)) { print wp_kses_post( '<h3>'.$title.'</h3>' ); }?>
        <ul>
            <?php if (!empty($icon_1) && !empty($social_l1)) { print wp_kses_post( '<li><a href="'.esc_url($social_l1).'" target="_blank" class="'.esc_html($icon_1).'"></a></li>' ); }?>
            <?php if (!empty($social_t2) && !empty($social_l2)) { print wp_kses_post( '<li><a href="'.esc_url($social_l2).'" target="_blank" class="'.esc_html($social_t2).'"></a></li>' ); }?>
            <?php if (!empty($social_t3) && !empty($social_l3)) { print wp_kses_post( '<li><a href="'.esc_url($social_l3).'" target="_blank" class="'.esc_html($social_t3).'"></a></li>' ); }?>
            <?php if (!empty($social_t4) && !empty($social_l4)) { print wp_kses_post( '<li><a href="'.esc_url($social_l4).'" target="_blank" class="'.esc_html($social_t4).'"></a></li>' ); }?>
        </ul>
    </div>
    <!-- End social -->
<?php } ?>