<?php get_header(); while (have_posts()) { the_post(); ?>
<div id="main" class="main clearfix">
    <div id="page-title" class="page-title">
        <div class="container">
            <div class="row">
                <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h1><?php echo get_the_title(); ?></h1>
                    <div class="page-sub-title"><?php echo get_the_date(); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <?php if(function_exists( 'wp_bannerize' ))  wp_bannerize( 'group=paginas-interna' ); ?>
                <br><br><br>
            </div>
            <div class="row">
                <div class="primary single-portfolio standard">
                    <article>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="entry-media entry-gallery">
                                    <?php
                                    $content = get_field('shortcode_flickr');
                                    echo do_shortcode($content);
                                    ?>
                                </div>
                                <br>
                                <div id="comments" class="comments-area nopaddingleft nopaddingright">
                                    <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="6"></div>
                                </div>
                            </div>
                            <div class="entry-content col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <h2 class="entry-header">Sobre o Álbum</h2>
                                <div class="entry-description">
                                    <?php the_content(); ?>
                                </div>
                                <div class="entry-date">
                                    <h5 class="details-title">Data</h5>
                                    <div class="playfairdisplay"><?php echo get_the_date(); ?></div>
                                </div>
                                <div class="entry-footer clearfix">
                                    <span class="portfolio-share">
                                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank""><i class="fa fa-facebook"></i></a>
                                        <a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
                                        <a target="_blank" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" ><i class="fa fa-google-plus"></i></a>
                                        <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    </div><!-- #main -->
    <?php
    }; //endwhile
    get_footer();
    ?>