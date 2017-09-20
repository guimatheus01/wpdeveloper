<div class="col-sm-12 col-md-4 sidebar">
    <form action="#" class="row m0 search_form widget">
        <h5 class="widget_heading">Pesquisar</h5>
        <div class="input-group">
           <?php echo get_search_form(); ?>
        </div>
    </form>
    <div class="row m0 widget categories">
        <h5 class="widget_heading">Categoria</h5>
        <ul class="list-unstyled">
        	<?php 
				$categories = get_categories( array(
				    'orderby' => 'name',
				    'parent'  => 0
				) );
				 
				foreach ( $categories as $category ) {
				    printf( '<li><a>%2$s</a></li>',
				        esc_url( get_category_link( $category->term_id ) ),
				        esc_html( $category->name )
				    );
				} 
			?>
        </ul>
    </div>
    <?php if (!is_page('noticias')): ?>
	<div class="row m0 widget recent_posts">
        <h5 class="widget_heading">Notícias Recentes</h5>
        <?php
            $args = array( 'post_type' => 'post', 'showposts' => 3);
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
        ?>
        <div class="media recent_post">
            <div class="media-left">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $img_url; ?>" alt="<?php echo get_the_title(); ?>"></a>
            </div>
            <div class="media-body">
                <a href="<?php the_permalink(); ?>"><h5><?php echo get_the_title(); ?></h5></a>
                <p>Em: <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></p>
            </div>
        </div>
    	<?php endwhile; ?>
    </div>    	
    <?php endif ?>
    <div class="row m0 widget tags">
        <h5 class="widget_heading">Tags</h5>
        <div class="row m0 tag_list">
        	<?php 

        		$post_tags = get_tags();
 
				if ( $post_tags ) {
				    foreach( $post_tags as $tag ) {
				    echo "<a class=\"tag\">{$tag->name}</a>"; 
				    }
				}

			?>
        </div>
    </div>
</div>