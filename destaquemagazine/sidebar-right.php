<div id="page-sidebar" class="col-sm-12 col-md-4 col-lg-4">
	<div id="secondary" class="widget-area">
		<div class="widget">
			<h3 class="wg-title">Categorias</h3>
			<ul>
			<?php 
				$categories = get_categories( array(
				    'orderby' => 'name',
				    'parent'  => 1
				) );
				foreach ( $categories as $category ) {
				    printf( '<li><a href="%1$s">%2$s</a></li>',
				        esc_url( get_category_link( $category->term_id ) ),
				        esc_html( $category->name )
				    );
				}
			?>
			</ul>
		</div>
		<div class="widget">
			<h3 class="wg-title">Postagens Recente</h3>
			<ul>
				<?php
					$args = array( 'post_type' => 'post', 'orderby' => 'date',  'order' => 'desc', 'showposts' => 6);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
				?>
				<li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
		</div>
		<div class="widget widget_newsletterwidget">
			<h3 class="wg-title">INSCREVA-SE</h3>
			Você pode se inscrever aqui para obter as nossas últimas notícias.
			<div class="newsletter newsletter-widget">
				<form>
					<!-- INSERIR PLUGIN DE INSCREVER -->
					<input class="newsletter-email mb-1" type="email" value="" placeholder="Email"/>
					<input class="newsletter-submit" type="submit" value="Subscribe"/>
				</form>
			</div>
		</div>
	</div>
</div>