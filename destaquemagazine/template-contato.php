<?php /* Template Name: Contato */ get_header(); ?>
<div id="main" class="main clearfix">
	<div id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<h1>CONTATO</h1>
					<div class="page-sub-title">A revista Destaque Magazine tem sede em Cuiabá, Mato Grosso, direcionada ao público AA A B+ com interesses altamente sofisticados em conteúdo e consumo.</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section mb-10">
		<div class="container">
			<div class="row">
				<div data-wow-delay="0.3s" class="col-sm-4 pull-left wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
					<div class="cms-fancy-box-single">
						<div class="cms-fancyboxes-body">
							<div class="cms-fancybox-item">
								<div class="fancy-box-icon pull-left">
									<div class="fancy-box-icon-inner">
										<i class="pe-7s-map-marker"></i>
									</div>
								</div>
								<div class="fancy-box-content-wrap has-icon-image">
									<h4>LOCALIZAÇÃO</h4>
									<div class="fancy-box-content">
										<p>Av. Isaac Póvoas - 164 - Sala 01 - Centro - Cuiabá - MT - 78005-340</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div data-wow-delay="0.3s" class="col-sm-4 pull-left wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
					<div class="cms-fancy-box-single">
						<div class="cms-fancyboxes-body">
							<div class="cms-fancybox-item">
								<div class="fancy-box-icon pull-left">
									<div class="fancy-box-icon-inner">
										<i class="pe-7s-phone"></i>
									</div>
								</div>
								<div class="fancy-box-content-wrap has-icon-image">
									<h4>TELEFONES</h4>
									<div class="fancy-box-content">
										<p>(65) 3622-5445<br> (65) 3621-5867 <br>(65) 98434-0969</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div data-wow-delay="0.3s" class="col-sm-4 pull-left wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
					<div class="cms-fancy-box-single">
						<div class="cms-fancyboxes-body">
							<div class="cms-fancybox-item">
								<div class="fancy-box-icon pull-left">
									<div class="fancy-box-icon-inner">
										<i class="pe-7s-mail-open-file"></i>
									</div>
								</div>
								<div class="fancy-box-content-wrap has-icon-image">
									<h4>E-mail</h4>
									<div class="fancy-box-content">
										<p>contato@destaquemagazine.com.br</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section mb-10">
		<div class="container">
			
		</div>
		
	</div>
	<div class="section mb-10">
		<div class="container">
			<div class="row">
				<div data-wow-delay="0.3s" class="col-sm-5 pt-10 wow fadeInLeft" style="visibility: hidden; animation-delay: 0.3s; animation-name: none;">
					<h1 class="text-center">Formulário de Contato</h1>
					<p class="desc">Envie sua Mensagem</p>
				</div>
				<div data-wow-delay="0.3s" class="col-sm-7 wow fadeInRight" style="visibility: hidden; animation-delay: 0.3s; animation-name: none;">
					<?php echo do_shortcode('[contact-form-7 id="5" title="Formulário de contato 1"]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>