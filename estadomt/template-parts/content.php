<li>
                        <div class="box-news-borded">
                            <div class="col-sm-4 col-md-6 col-lg-5">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo the_post_thumbnail_url('medium'); ?>" alt="<?php echo  the_title(); ?>" class="img-responsive img-box-news-borded">
                                </a>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-7">
                                <p class="category-news"> <?php  echo $cat_name; ?></p>
                                <h4><?php the_title(); ?></h4>
                                <p class="info-box-news-borded"><small><?php echo get_the_author(); ?>  |  <?php echo get_the_date(); ?></small></p>
                                <p><small><?php the_excerpt(); ?></small></p>
                            </div>
                        </div>
                    </li>