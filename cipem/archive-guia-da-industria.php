<?php /* Template Name: Guia */  get_header(); ?> 
        <!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Guia da Indústria</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo(home_url()); ?>">Home</a></li>
                            <li>Guia da Indústria</li>
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
                            <div class="environment-cause environment-cause-list">
                                <div class="col-md-12">
                                <form class="environment-search" action="<?php echo home_url(); ?>">
                                    <input value="Faça sua pesquisa" onblur="if(this.value == '') { this.value ='Faça sua pesquisa'; }" onfocus="if(this.value =='Faça sua pesquisa') { this.value = ''; }" type="search" id="form-search-input" name="s">
                                    <input value="" type="submit">
                                    <i class="fa fa-search"></i>
                                    <input type="hidden" name="post_type" value="industria">
                                </form>
                                </div>
                                <br>
                                <ul>

                                    <?php
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                        $args=array(
                                           'post_type'=>'industria',
                                           'posts_per_page' => 14,
                                           'paged'=>$paged
                                        );
                                        $temp = $wp_query;
                                        $wp_query= null;
                                        $wp_query = new WP_Query($args);

                                        if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                                            $categories = get_the_category();
                                            $title_industria=get_post_meta(get_the_ID(), 'industria_cargo', true );
                                     ?>
                                     <li class="col-md-12">
                                        <div class="environment-cause-list-wrap">
                                           <?php if (has_post_thumbnail()): ?>
                                                <figure><a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url(); ?>" alt=""><i class="fa fa-eye"></i></a></figure>
                                           <?php endif ?>
                                            <section>
                                                <strong><?php echo $title_industria; ?></strong>
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                <div class="environment-cause-donate">
                                                    <span class="color"><?php echo $categories['name'];?></span>
                                                    <span><?php echo get_the_date(); ?>   /</span>
                                                    <a data-toggle="modal" data-target="#myModal-<?php echo get_the_ID(); ?>" class="environment-plan-btn">Ver Indústria</a>
                                                </div>
                                            </section>
                                        </div>
                                    </li>
                                    <div class="modal fade bs-example-modal-lg" id="myModal-<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"><?php the_title(); ?> <br> <small><?php echo $categories['name']; ?></small></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-5"><?php the_post_thumbnail('full'); ?></div>
                                                    <div class="col-md-7"><?php the_content(); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; endif; ?>
                                </ul>
                                <?php
                                  if ( function_exists('wp_bootstrap_pagination') )  wp_bootstrap_pagination();
                                    $wp_query = null;
                                    $wp_query = $temp;
                                    wp_reset_query();
                                ?>
                            </div>

                            
                        </div>

                        <?php get_sidebar('right'); ?>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->

<?php get_footer(); ?>