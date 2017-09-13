<?php

$background_image = $sl_image = $title = $subtitle = $tr_bg_color = $add_product =  $id = $prod_wocommerce = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if( class_exists( 'WooCommerce' ) ) {
    // params for WP_Query
            $args = array(
                'post_type'      =>  'product',
                'p'              => $prod_wocommerce,
                'posts_per_page' => '1'
            );
            $type_products = new WP_Query($args);
            while ( $type_products->have_posts() ) : $type_products->the_post();
            global $post, $woocommerce, $product;
            $prod_price = $product->get_price_html();
            $prod_name = $product->get_title();
            $meta_data = get_post_meta( $product->get_id(), 'floris_product_options_item', true );
    $background = ( is_numeric( $background_image ) && ! empty( $background_image ) ) ? wp_get_attachment_url( $background_image ) : '';
    $slide_img = ( is_numeric( $sl_image ) && ! empty( $sl_image ) ) ? wp_get_attachment_url( $sl_image ) : '';
    ?>
    <div class="swiper-slide">
        <div class="top-slide">
            <div class="left-side">
                <div class="bg" style="background-image:url(<?php print esc_url($background); ?>);"></div>
            </div>
            <div class="right-side" style="background-color: <?php print esc_html( $tr_bg_color ); ?>">
                <div class="main-caption vertical-align">
                    <?php if ($add_product == 'yes') { ?>
                        <div class="image">
                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
                        </div>
                        <h1 class="h2"><a href="<?php the_permalink(); ?>"><?php print esc_html($prod_name); ?></a></h1>
                        <p><?php print esc_html($meta_data); ?></p>
                    <?php } else { ?>
                        <?php if (!empty($sl_image)) { ?>
                            <div class="image">
                                <img src="<?php print esc_url($slide_img); ?>" alt="image">
                            </div>
                        <?php } ?>
                        <?php if (!empty($title)) { ?>
                            <h1 class="h2"><?php print esc_html($title); ?></h1>
                        <?php } ?>
                        <?php if (!empty($subtitle)) { ?>
                            <p><?php print esc_html($subtitle); ?></p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile;
    wp_reset_postdata();
}?>