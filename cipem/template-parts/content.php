<?php
/**
 * Display the post content in "generic" or "standard" format.
 * This will be use in the loop and full page display.
 * 
 * @package bootstrap-basic4
 */
?> 
<li class="col-md-12">
    <?php if (has_post_thumbnail()): ?>
        <figure><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""><i class="fa fa-share-square-o"></i></a></figure>
    <?php else: ?>
        <figure><a href="<?php the_permalink(); ?>"><img src="http://localhost/gsw_project/cipem_local/wp-content/themes/cipem/assets/images/logo.png" alt=""><i class="fa fa-share-square-o"></i></a></figure>
    <?php endif; ?>
    <div class="environment-modren-event-text">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <ul class="environment-event-option">
            <li>
                <i class="fa fa-clock-o"></i>
                Data:
                <time><?php the_modified_date(); ?></time>
            </li>
        </ul>
        <p><a href="<?php the_permalink(); ?>" class="environment-fancy-btn">Leia Mais<span></span></a></p>
    </div>
</li>