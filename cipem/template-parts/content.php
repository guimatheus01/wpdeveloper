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
        
    <?php endif; ?>
    <div class="environment-modren-event-text">
        <h3><a><?php the_title(); ?></a></h3>
        <ul class="environment-event-option">
            <li>
                <i class="fa fa-clock-o"></i>
                Data:
                <time><?php echo get_the_date(); ?></time>
                <?php echo get_post_type() ?>
            </li>
        </ul>
        <?php if (get_post_type() == "industria"): ?>
             <p><a data-toggle="modal" data-target="#myModal-<?php echo get_the_ID(); ?>" class="environment-fancy-btn">Veja<span></span></a></p>
         <?php else: ?>
            <p><a href="<?php the_permalink(); ?>" class="environment-fancy-btn">Leia Mais<span></span></a></p>
        <?php endif ?>
    </div>
</li>
<?php if (get_post_type() == "industria"): ?>
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
<?php endif ?>