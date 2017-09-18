<?php
/** 
 * The search template.
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();
    if (have_posts()) {

?> 
<!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php printf(__('Resultados por: %s', 'bootstrap-basic4'), '<span>' . get_search_query() . '</span>'); ?></h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li><?php echo('<span>' . get_search_query() . '</span>'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// SubHeader \\-->

        <!--// Main Content \\-->
        <div class="environment-main-content">
            <!--// Main Section \\-->
            <div class="environment-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="environment-section-heading"><h2><span>Resultados Relacionados</span></h2></div>
                            <div class="environment-event environment-modren-event">
                                <ul class="row">
                                    <?php
                                        while (have_posts()) {
                                            the_post();
                                            get_template_part('template-parts/content', get_post_format());
                                        }// endwhile;
                                        if ( function_exists('wp_bootstrap_pagination') )
                                              wp_bootstrap_pagination();
                                    ?>
                                </ul>
                            </div>
                        </div>
                       <?php get_sidebar('right'); ?>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

        </div>


       


        <?php } else {
            get_template_part('template-parts/section', 'no-results');
        }// endif;
        ?>   
        <!--// Main Content \\-->
<?php get_footer();