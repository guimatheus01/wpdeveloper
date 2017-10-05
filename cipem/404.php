<?php get_header();?>
        <!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Error 404</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li class="active">Error 404</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// SubHeader \\-->

        <!--// Main Content \\-->
        <div class="environment-main-content environment-error-page">
            <span class="environment-error-transparent"></span>
            <!--// Main Section \\-->
            <div class="environment-main-section">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="environment-error-wrap">
                                <h2>Error <span>4<i class="fa fa-frown-o"></i>4</span></h2>
                                <span>Essa página não existe!</span>
                                <p>Desculpe a página que você está procurando foram removidos, teve seu nome alterado, ou está temporariamente indisponível.</p>
                                <div class="clearfix"></div>
                                <?php get_template_part('template-parts/partial', 'search-form'); ?> 
                                <div class="clearfix"></div>
                                <p><br><br><a href="<?php echo home_url(); ?>" class="environment-readmore-btn">VOLTAR PARA PAGINA PRINCIPAL</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

        </div>
        <!--// Main Content \\-->              
<?php get_footer(); ?>