<div class="section pb-8">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div data-wow-delay="0.3s" class="text-center mt-6 wow fadeInUp">
					<?php if (is_home() && current_user_can('publish_posts')) { ?>
					<p><?php printf(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bootstrap-basic'), esc_url(admin_url('post-new.php'))); ?></p>
					<?php } elseif (is_search()) { ?>
					<p><?php _e('Desculpe, mas nada corresponde aos seus termos de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.', 'bootstrap-basic'); ?></p>
					<?php echo bootstrapBasicFullPageSearchForm(); ?>
					<?php } else { ?>
					<p><?php _e('IParece que não podemos encontrar o que você está procurando. Talvez outra pesquisa possa ajudar.', 'bootstrap-basic'); ?></p>
					<?php echo bootstrapBasicFullPageSearchForm(); ?>
					<?php } //endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>