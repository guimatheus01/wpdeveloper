<?php
/**
 * Display no results from condition if not have posts.
 * 
 * @package bootstrap-basic4
 */
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

 <div class="environment-main-content">

            <!--// Main Section \\-->
            <div class="environment-main-section">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-9">
                            <section class="no-results not-found">	
								<div class="environment-form-result">
							        <h2>Nada Encontrado</h2>
							        <p>Desculpe, mas nada correspondeu aos termos de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.</p>
							        <?php get_template_part('template-parts/partial', 'search-form'); ?> 
							        <div class="clearfix"></div>
							        <a href="<?php echo home_url(); ?>" class="environment-readmore-btn">Voltar para Home</a>
							    </div>
							</section><!-- .no-results -->
                        </div>

                       <!--// SideBaar \\-->
                        <aside class="col-md-3">

                           <!--// Widget Recent Post \\-->
                           <div class="widget widget_recent_blog">
                              <div class="environment-widget-heading"><h2>Notícias Recentes</h2></div>
                              <ul>
                                <?php
                                $args = array( 'post_type' => 'post', 'orderby' => 'date',  'order' => 'asc', 'showposts' => 3);
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                                    $categories = get_the_category();
                                    $cat = $categories[0];
                                ?>      
                                 <li>
                                    <figure><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt=""></a> <a href="<?php the_permalink(); ?>" class="environment-post-hover"><i class="fa fa-angle-double-right"></i></a> </figure>
                                    <div class="environment-recentpost">
                                       <h6><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h6>
                                       <ul class="widget-post">
                                        <li><time><?php the_modified_date(); ?> | </time></li>
                                        <li><a><?php the_author(); ?></a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <?php endwhile; ?>
                              </ul>
                           </div>
                           <!--// Widget Recent Post \\-->


                           <!--// Widget Gallery \\-->
                           <div class="widget widget_gallery">
                              <div class="environment-widget-heading"><h2>Principais Galerias</h2></div>
                              <ul>
                                <?php
                                    $args = array( 'post_type' => 'galeria', 'orderby' => 'date',  'order' => 'asc', 'showposts' => 6);
                                    $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                ?>
                                  <li><a data-fancybox-group="group" href="<?php the_post_thumbnail_url('medium_large'); ?>" class="fancybox"><img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt=""></a></li>
                                  <?php endwhile; ?>
                              </ul>
                           </div>
                           <!--// Widget Gallery \\-->

                           <!--// widget_Cetagories \\-->
                            <div class="widget widget_cetagories">
                                <div class="environment-widget-heading"><h2>Categorias</h2></div>
                                <ul>
                                    <?php 
                                        $categories = get_categories();
                                        foreach ( $categories as $category ) : 
                                            
                                    ?>
                                    <li><a href="<?php echo esc_url(get_category_link( $category->term_id ))  ?>"><?php echo(esc_attr( $category->name )); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!--// widget_Cetagories \\-->

                        </aside>
                        <!--// SideBaar \\-->

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

        </div>
