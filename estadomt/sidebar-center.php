	<section class="container">
        <div class="newsletter">
            <?php echo do_shortcode('[mc4wp_form id="42"]'); ?>
        </div>
    </section>

    <section class="container">
        <div class="anuncio-meio">
            <?php echo(do_shortcode('[wp_bannerize_pro categories="centro-site"]')); ?>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-12">
            	<?php if (!is_home()): ?>
            		<h3 class="title-more-news">Veja mais Relacionados</h3>
            	<?php else: ?>
            		<h3 class="title-more-news">Agronegócio</h3>
            	<?php endif ?>
            </div>
        </div>
        <div class="row">
        	<?php if (!is_home()): 
        			$cat = get_the_category();
        	?>
        	<ul class="list-unstyled">
               <?php echo(do_shortcode('[ajax_load_more id="5714386219" container_type="div" post_type="post" posts_per_page="6" category="'.$cat[0]->slug.'" pause="false" scroll="false" button_label="Leia Mais" button_loading_label="Carregando mais Notícias..."]')); ?>
            </ul>
			<?php else: ?>        	
            <ul class="list-unstyled">
               <?php echo(do_shortcode('[ajax_load_more id="5714386219" container_type="div" post_type="post" posts_per_page="6" pause="false" scroll="false" button_label="Leia Mais" button_loading_label="Carregando mais Notícias..."]')); ?>
            </ul>
            <?php endif ?>
        </div>
    </section>