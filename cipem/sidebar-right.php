                <!--// SideBaar \\-->
                        <aside class="col-md-3 col-xs-12">
                           <?php if (is_page( 'noticias' )): ?>                            
                           <?php else:  ?>
                           <!--// Widget Recent Post \\-->
                           <div class="widget widget_recent_blog">
                              <div class="environment-widget-heading"><h2>Notícias Recentes</h2></div>
                              <ul>
                                <?php
                                $args = array( 'post_type' => 'post', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 3);
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                                    $categories = get_the_category();
                                    $cat = $categories[0];
                                    $info_post=get_post_meta(get_the_ID(), 'posts_shotcode', true );
                                ?>      
                                 <li>
                                    <?php if (has_post_thumbnail()): ?>
                                      <figure><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt=""></a> <a href="<?php the_permalink(); ?>" class="environment-post-hover"><i class="fa fa-angle-double-right"></i></a> </figure>
                                    <?php endif ?>
                                    <div class="environment-recentpost">
                                       <h6><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h6>
                                       <ul class="widget-post">
                                        <li><time><?php echo get_the_date(); ?> | </time></li>
                                        <li><a><?php echo $info_post; ?></a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <?php endwhile; ?>
                              </ul>
                           </div>
                           <!--// Widget Recent Post \\-->
                           <?php endif; ?>
                          <?php if (is_page( 'galeria', 'fotos' )):  else:  ?>
                           <!--// Widget Gallery \\-->
                           <div class="widget widget_gallery">
                              <div class="environment-widget-heading"><h2>Principais Galerias</h2></div>
                              <ul>
                                <?php
                                    $args = array( 'post_type' => 'galeria', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 6);
                                    $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                ?>
                                  <li>
                                    <a data-fancybox-group="group" href="<?php the_post_thumbnail_url('medium_large'); ?>" class="fancybox-right">
                                      <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php echo the_title(); ?> <br> <a href='<?php the_permalink(); ?>'>Clique aqui e veja o album agora ! </a>">
                                      </a>
                                  </li>
                                  <?php endwhile; ?>
                              </ul>
                           </div>
                           <?php endif; ?>
                           <!--// Widget Gallery \\-->
                           <!--// widget_Cetagories \\-->
                            <div class="widget widget_cetagories">
                                <div class="environment-widget-heading"><h2>Categorias</h2></div>
                                <ul>
                                    <?php 
                                        $categories = get_categories(array('parent' => 59 ));
                                        foreach ( $categories as $category ) : 
                                    ?>
                                    <li><a href="<?php echo esc_url(get_category_link( $category->term_id ))  ?>"><?php echo(esc_attr( $category->name )); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!--// widget_Cetagories \\-->
                        </aside>
                        <!--// SideBaar \\-->




