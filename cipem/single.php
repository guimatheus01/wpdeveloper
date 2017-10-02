<?php get_header(); 
    if (have_posts()) {
        while (have_posts()) {
            the_post();

            $info_post=get_post_meta(get_the_ID(), 'posts_shotcode', true );
            //Defininfo o titulo do breadcrumbs.
            $title_header = get_the_title();
?> 
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
                            <li><a href="<?php echo home_url(); ?>/noticias">Notícias</a></li>
                            <li><?php print(limitarTexto($title_header, $limite = 25));?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Main Content \\-->
        <div class="environment-main-content">

            <!--// Main Section \\-->
            <div class="environment-main-section">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-9">
                            <div class="environment-rich-editor environment-event-richeditor">
                               <ul class="blog-grid-option">
                                    <li>
                                        <i class="fa fa-calendar-o"></i>
                                        <time><?php echo get_the_date(); ?></time>
                                    </li>
                                    <li>
                                        <i class="fa fa-user"></i>
                                        <a><?php echo $info_post; ?></a>
                                    </li>
                                    <li>
                                        <span>Compartilhar:</span>
                                    </li>
                                    <li>
                                        <span style="padding-top: 8px; display: block;"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="icon-facebook2"></a></span>
                                    </li>
                                    <li>
                                        <span style="padding-top: 8px; display: block;"><a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank" class="icon-social43"></a></span>
                                    </li>
                                    <li>
                                        <span style="padding-top: 8px; display: block;"><a href="whatsapp://send?text=Veja agora <?php the_title(); ?> no site do CIPEM.  <?php the_permalink(); ?>" class="icon-whatsapp"></a></span>
                                    </li>
                                    <li>
                                        <span style="padding-top: 8px; display: block;"><a href="mailto:?subject=NOTÍCIAS DO CIPEM.&body=Leia sobre <?php the_title(); ?>. Acesse Agora: <?php the_permalink(); ?>" class="icon-mail"></a></span>
                                    </li>
                                </ul>
                                <br>
                            </div>
                            <figure class="environment-event-thumb">
                            <?php if (has_post_thumbnail()):  the_post_thumbnail(); endif; ?>
                            </figure>                            
                            <div class="environment-rich-editor environment-event-richeditor">
                                <?php the_content(); ?>
                            </div>
                            <hr>
                            <div class="fb-comments" data-href="http://www.cipem.org.br/<?php the_permalink(); ?>" data-widht="100%" data-numposts="5"></div>
                            <div class="environment-tag-wrap">
                                <div class="environment-post-tags">
                                  <div class="environment-tags">
                                     <span>Categoria:</span>
                                     <?php 
                                        $categories = get_the_category();
                                            foreach ( $categories as $category ) { 
                                                echo '<a  alt="' . esc_attr( $category->name ) . '" /> '.$category->name.'</a>'; 
                                      ?>
                                    <?php }; ?>
                                  </div>
                                  <div class="environment-blog-social">
                                     <ul>
                                        <li><span>Compartilhar:</span></li>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="icon-facebook2"></a></li>
                                        <li><a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank" class="icon-social43"></a></li>
                                        <li><a href="whatsapp://send?text=Veja agora <?php the_title(); ?> no site do CIPEM.  <?php the_permalink(); ?>" class="icon-whatsapp"></a></li>
                                        <li><li><a href="mailto:?subject=NOTÍCIAS DO CIPEM.&body=Leia sobre <?php the_title(); ?>. Acesse Agora: <?php the_permalink(); ?>" class="icon-mail"></a></li></li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                            <div class="comments-area">
                              <div class="environment-section-heading"><h2><span>Ultimas Notícias Relacionadas</span></h2></div>
                              <ul class="comment-list">
                                <?php
                                    $categories = get_the_category();
                                    $cat_id = $categories[0]->cat_ID;
                                    $args = array( 
                                        'post_type'         => 'post',
                                        'orderby'           => 'date',
                                        'cat'               =>  $cat_id,
                                        'order'             => 'desc',
                                        'post_status'       => 'publish',
                                        'posts_per_page'    => 6, 
                                        'paged' => $paged
                                    );
                                    $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                        $info_post=get_post_meta(get_the_ID(), 'posts_shotcode', true );

                                 ?>
                                 <li>
                                    <div class="thumb-list">
                                       <?php if (has_post_thumbnail()): ?>
                                           <figure><img src="<?php the_post_thumbnail_url('thumbnail'); ?>"></figure>
                                       <?php endif ?>
                                       <div class="text-holder">
                                          <h6><?php the_title(); ?></h6>
                                          <time class="post-date"><?php get_the_date(); ?></time>
                                          <p><?php echo $info_post ?> | <?php echo get_the_date(); ?></p>
                                          <a class="comment-reply-link" href="<?php the_permalink(); ?>">Leia Agora <i class="fa fa-share"></i></a>
                                       </div>
                                    </div>
                                 </li>
                                <?php endwhile ?>
                              </ul>
                           </div>
                        <?php } ?>
                        </div>
                        <!--// SideBaar \\-->
                        <?php get_sidebar('right'); ?>
                        <!--// SideBaar \\-->
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->

<!--         <?php } else {
                        get_template_part('template-parts/section', 'no-results');
                    }// endif;
                    ?>  -->

<?php get_footer(); ?>