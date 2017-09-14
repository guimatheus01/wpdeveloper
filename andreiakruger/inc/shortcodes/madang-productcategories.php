<?php
/*
Widget Name: Madang Product Category Widget
Description: Create Product Category Listings
Author: Kenzap
Author URI: http://kenzap.com
Widget URI: http://kenzap.com/,
Video URI: http://kenzap.com/
*/

if( class_exists( 'SiteOrigin_Widget' ) ) : 

class madang_productcategories_widget extends SiteOrigin_Widget {

    function __construct() {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
            // The unique id for your widget.
            'madang_productcategories_widget',

            // The name of the widget for display purposes.
            esc_html__('Madang Categories', 'madang'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => esc_html__('Create product category listing', 'madang'),
                'panels_groups' => array('madang'),
                'help'        => 'http://madang_docs.kenzap.com',
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(
            ),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Title', 'madang'),
                    'default' => ''
                ),
                // 'show_header' => array(
                //     'type' => 'checkbox',
                //     'label' => esc_html__('Show toolbar', 'madang'),
                //     'default' => ''
                // ),
                'category' => array(
                    'type' => 'text',
                    'label' => esc_html__('Categories', 'madang'),
                    'description' => esc_html__('Manually select categories. Separate by ","', 'madang'),
                    'default' => ''
                ),
                'per_page' => array(
                    'type' => 'text',
                    'label' => esc_html__('Records per page', 'madang'),
                    'default' => ''
                ),
                // 'orderby' => array(
                //     'type' => 'radio',
                //     'label' => esc_html__( 'Choose default sorting', 'madang' ),
                //     'default' => 'simple',
                //     'options' => array(
                //         '' => esc_html__( 'None', 'madang' ),
                //         'popularity' => esc_html__( 'Popularity', 'madang' ),
                //         'rating' => esc_html__( 'Rating', 'madang' ),
                //         'newest' => esc_html__( 'Newest', 'madang' ),
                //         'lowestprice' => esc_html__( 'Lowest price', 'madang' ),
                //         'highestprice' => esc_html__( 'Highest price', 'madang' ),
 
                //     )
                // ),                
    
            ),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'madang-productcategories';
    }

    function get_template_dir($instance) {
        return 'widgets';
    }
}

siteorigin_widget_register('madang_productcategories_widget', __FILE__, 'madang_productcategories_widget');

endif;

function madang_shortcode_categories( $atts, $content = null ) {
    $atts = shortcode_atts(array(
        "image"         => '',
        "title"         => '',
        "subtitle"      => '',
        "image"         => '',
        "show_header"   => 'true',
        "categories"    => '',
        "per_page"      => '16',
        "images_ofset"  => '',
        "type"          => ''
    ), $atts);

    ob_start(); ?>

    <!-- ================== menu cateogry list====================-->
    <section class="block cat-list-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 top-text-header text-center wow fadeInUp">
                    <h4 class="text-uppercase text-lt text-sp"><?php echo esc_attr( $atts['title'] ); ?></h4>
                </div>
            </div>

            <?php if( class_exists( 'WooCommerce' ) ) : ?>
                <div class="row">
                    <?php $args = array(
                    'number'     => esc_attr( $atts['per_page'] ),
          
                    );

                    $product_categories = get_terms( 'product_cat', $args ); 
                    if ( $product_categories ) : 
                        foreach ( $product_categories as $tag ) : 

                            $thumbnail_id = "";
                            $thumbnail_id = get_woocommerce_term_meta( $tag->term_id, 'thumbnail_id', true );
                            $image = wp_get_attachment_image_src( $thumbnail_id, "madang-product-small" );
                            ?>

                            <!--single cat -->
                            <div class="col-sm-3 cat-wrap wow fadeInLeft">
                                <a href="<?php echo get_term_link($tag->term_id); ?>">
                                    <span><?php echo esc_html( $tag->name ); ?></span>
                                    <figure>
                                        <?php if ( isset( $image ) ) : ?>
                                            <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_html( $tag->name ); ?>">
                                        <?php endif; ?>
                                    </figure>
                                </a>
                            </div>
                            <!-- singel cat ends-->

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- ================== menu cateogry list ends====================-->

    <?php
    wp_reset_postdata();
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}