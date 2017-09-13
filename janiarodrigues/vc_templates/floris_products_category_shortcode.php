<?php
/*
 *
 * Product category shortcode for VC
 *
 */
$cats_wocommerce = $cat_type = $cat_per_page = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if( class_exists( 'WooCommerce' ) ) {
    $cats = $cats_wocommerce;
    if ($cat_type == 'type_1') { 
        if($cats){
            $catsArr = explode(",", $cats);
            $i = 1;
            foreach ($catsArr as $simple_cat_id) {
                if (is_numeric($simple_cat_id)) {
                    $field_type = 'term_id';
                }else{
                    $field_type = 'slug';
                }
                $term = get_term_by( $field_type, $simple_cat_id, 'product_cat');
                $class = 'left';
                if(($i % 2) == 0){$class = 'right';}
                if($term){
                    $term_name = $term->name;
                    $term_id = $term->term_id;
                    $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    $prod_img = floris_opt_aq_resize( $image, '851', '479', false, true);

                    if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';
                        $prod_img = $image;
                    }
                ?>
                        <div class="coll-item <?php print esc_html( $class ); ?> <?php print esc_html( $css_class ); ?> item-animation">
                            <?php if($prod_img  ){ ?>
                                <div class="image">
                                    <a href="<?php print esc_url( get_category_link($term_id) ); ?>"><img class="category-product-image" src="<?php print esc_url( $prod_img );?>" alt="<?php print esc_html( $term_name ); ?>" /></a>
                                </div>
                            <?php } ?>
                            <div class="title">
                                <div class="h3 font-fam-2"><a href="<?php print esc_url( get_category_link($term_id) ); ?>"><?php print esc_html( $term_name ); ?></a></div>
                            </div>
                        </div>
                <?php   } else { ?>
                            <div class="coll-item <?php print esc_html( $class ); ?> <?php print esc_html($css_class); ?> item-animation">
                                <div class="h4 font-fam-2"><?php esc_html_e('this category does not exist', 'floris'); ?></div>
                            </div>  
                        <?php }
            $i++; } 
        } else {
            $i = 1;
            $terms = get_terms('product_cat', 'orderby=name&hide_empty=1');
            foreach ($terms as $term) {
                $class = 'right';
                if(($i % 2) == 0){$class = 'left';}
                if($term){
                    $term_name = $term->name;
                    $term_id = $term->term_id;
                    $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    $prod_img = floris_opt_aq_resize( $image, '851', '479', false, true);

                    if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';
                        $prod_img = $image;
                    }
                ?>
                        <div class="coll-item <?php print esc_html( $class ); ?> <?php print esc_html( $css_class ); ?> item-animation">
                            <?php if($prod_img  ){ ?>
                                <div class="image">
                                    <a href="<?php print esc_url( get_category_link($term_id) ); ?>"><img class="category-product-image" src="<?php print esc_url( $prod_img );?>" alt="<?php print esc_html( $term_name ); ?>" /></a>
                                </div>
                            <?php } ?>
                            <div class="title">
                                <div class="h3 font-fam-2"><a href="<?php print esc_url( get_category_link($term_id) ); ?>"><?php print esc_html( $term_name ); ?></a></div>
                            </div>
                        </div>
            <?php  } else { ?>
                        <div class="coll-item <?php print esc_html( $class ); ?> <?php print esc_html( $css_class ); ?> item-animation">
                            <div class="h4 font-fam-2"><?php esc_html_e('this category does not exist', 'floris'); ?></div>
                        </div>  
                    <?php }
            $i++; } 
        }
    } elseif ($cat_type == 'type_2') {
        if($cats){
            $catsArr = explode(",", $cats);
            $i = 1;?>
                <div class="skew-wrap <?php print esc_html($css_class); ?>">
                    <div class="container">
            <?php foreach ($catsArr as $simple_cat_id) {
                if (is_numeric($simple_cat_id)) {
                    $field_type = 'term_id';
                }else{
                    $field_type = 'slug';
                }
                $term = get_term_by( $field_type, $simple_cat_id, 'product_cat');
                $class = 'right';
                if(($i % 2) == 0){$class = 'left';}
                if($term){
                    $term_name = $term->name;
                    $term_id = $term->term_id;
                    $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    $prod_img = floris_opt_aq_resize( $image, '485', '472', false, true);
                    if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';
                        $prod_img = $image;
                    }
                ?>
                        <div class="coll-item <?php print esc_html( $class ); ?>  item-animation col-50">
                            <?php if( $prod_img ){ ?>
                                <div class="image">
                                    <a href="<?php print esc_url( get_category_link($term_id) ); ?>"><img class="resp-img" src="<?php print esc_url( $prod_img );?>" alt="<?php print esc_html( $term_name ); ?>" /></a>
                                </div>
                            <?php } ?>
                            <div class="title">
                                <div class="h3 font-fam-2"><a href="<?php print esc_url( get_category_link($term_id) ); ?>"><?php print esc_html( $term_name ); ?></a></div>
                            </div>
                        </div>
            <?php  } else { ?>
                        <div class="item-animation col-50" style="margin-bottom: 120px;">
                            <div class="h4 font-fam-2"><?php esc_html_e('this category does not exist', 'floris'); ?></div>
                        </div>
                    <?php }
            $i++; } ?>
                        </div>
                    </div>    
        <?php } else {
                    $i = 1;?>
                    <div class="skew-wrap <?php print esc_html($css_class); ?>">
                        <div class="container">
                            <?php 
                            $terms = get_terms('product_cat', 'orderby=name&hide_empty=1');
                            foreach ($terms as $term) {
                                $class = 'right';
                                if(($i % 2) == 0){$class = 'left';}
                                if($term){
                                    $term_name = $term->name;
                                    $term_id = $term->term_id;
                                    $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
                                    $image = wp_get_attachment_url( $thumbnail_id );
                                    $prod_img = floris_opt_aq_resize( $image, '485', '472', false, true);
                                    if(!$image){$image = get_template_directory_uri().'/assets/img/random'.rand(1,4).'.jpg';
                                        $prod_img = $image;
                                    }
                                ?>
                                        <div class="coll-item <?php print esc_html( $class ); ?> item-animation col-50">
                                            <?php if($prod_img  ){ ?>
                                                <div class="image">
                                                    <a href="<?php print esc_url( get_category_link($term_id) ); ?>"><img class="resp-img" src="<?php print esc_url( $prod_img );?>" alt="<?php print esc_html( $term_name ); ?>" /></a>
                                                </div>
                                            <?php } ?>
                                            <div class="title">
                                                <div class="h3 font-fam-2"><a href="<?php print esc_url( get_category_link($term_id) ); ?>"><?php print esc_html( $term_name ); ?></a></div>
                                            </div>
                                        </div>
                            <?php  } else { ?>
                                        <div class="item-animation col-50" style="margin-bottom: 120px;">
                                            <div class="h4 font-fam-2"><?php esc_html_e('this category does not exist', 'floris'); ?></div>
                                        </div>
                                    <?php }
                            $i++; } ?>
                        </div>
                    </div> 
            <?php }
    }
}