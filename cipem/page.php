<?php get_header(); 
    if (have_posts()) {
        while (have_posts()) {
            the_post();

?> 
<!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li><?php  the_title(); ?></li>
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

                        <div class="col-md-8">
                            <div class="environment-contact-form">
                               <?php the_content(); ?>
                            </div>
                        </div>
                        <?php get_sidebar('right'); ?>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->


<?php }}; get_footer(); ?>