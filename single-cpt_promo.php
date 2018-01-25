<?php 
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); 

		$produtos = get_the_terms(get_the_ID(), 'taxonomy_produto');

		foreach ($produtos as $produto) :
			if ( $produto_data = get_page_by_path( $produto->slug, OBJECT, 'cpt_produto' ) ) :
				$produto_data_ID = $produto_data->ID;
			endif;
		endforeach;			
?>

<div class="row">
	<div class="col-md-12">	
		<ol class="breadcrumb">
			<li><a href="<?php bloginfo('url'); ?>">Gestor de Produtos</a></li>
			<li><a href="<?php bloginfo('url'); ?>/produto/<?php echo $produto->slug; ?>"><?php echo $produto->name; ?></a></li>
			<li class="active">Detalhes da promo</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<header class="panel-heading panel-border">
				Título: <?php the_title(); ?>
			</header>
			<div class="panel-body">
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1"data-toggle="tab">Visão Geral</a></li>
						<li><a href="#tab2" data-toggle="tab">Valores e regras</a></li>
						<li class=""><a href="#tab3"data-toggle="tab">Disparos</a></li>
					</ul>
					<div class="tab-content panel wrapper">
						<div id="tab1" class="tab-pane fade">
							<div class="row">
								<div class="col-md-6">
									<form class="form-horizontal">
										<div class="form-group">
											<div class="col-sm-4">
												<strong>Nome do produto:</strong>
											</div>
											<div class="col-sm-8">
												<?php 
													if ($produtos): 
														foreach ($produtos as $produto) :
												?>
													<a href="<?php bloginfo('url'); ?>/produto/<?php echo $produto->slug; ?>"><?php echo $produto->name; ?></a>
												<?php 
													endforeach; 
													else :
												?>
													<?php edit_post_link('<span class="label label-danger">Esta promo não está atrelada à nenhum produto. <i class="fa fa-pencil" aria-hidden="true"></i></span>');?>				
												<?php
													endif;
												?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4">
												<strong>Responsável:</strong>
											</div>
											<div class="col-sm-8">												
												<?php													
													$responsaveis = get_the_terms( $produto_data_ID, 'taxonomy_analista' );

													foreach ($responsaveis as $responsavel) :
														echo $responsavel->name . ', ';
													endforeach;
												?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4"><i class="fa fa-pencil" aria-hidden="true"></i> <strong>Copywriter responsável:</strong>
											</div>
											<div class="col-sm-8">											
												<?php													
													$copywriters = get_the_terms( get_the_ID(), 'taxonomy_copywriter' );

													foreach ($copywriters as $copywriter) :
														echo $copywriter->name;
													endforeach;
												?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4"><i class="fa fa-calendar" aria-hidden="true"></i> <strong>Data de Lançamento:</strong>
											</div>
											<div class="col-sm-8">
												<?php the_date('d\/m\/Y'); ?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4"><i class="fa fa-envelope" aria-hidden="true"></i> <strong>E-mail do produto:</strong>
											</div>
											<div class="col-sm-8">
												<?php the_field('email_produto', $produto_data->ID); ?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4"><strong>Tipo do produto:</strong>
											</div>
											<div class="col-sm-8">
												Back-end (Premium)
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4"><strong>Sigla do produto:</strong>
											</div>
											<div class="col-sm-8">
												<?php the_field('sigla', $produto_data->ID); ?>
											</div>
										</div>
									</form>
								</div>
								<div class="col-md-6">
									<form class="form-horizontal">
										<div class="form-group">
											<div class="col-sm-4">
												<strong>Código:</strong>
											</div>
											<div class="col-sm-8">
												<?php if (get_field('codigo_promo')): ?>
													<?php the_field('codigo_promo') ?>
												<?php else : ?>
													<?php edit_post_link('<span class="label label-danger">Nenhum código informado <i class="fa fa-pencil" aria-hidden="true"></i></span>');?>
												<?php endif; ?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4">
												<strong>Link para copy texto:</strong>
											</div>
											<div class="col-sm-8">
												<?php if (get_field('link_copy_texto')): ?>
													<a href="<?php the_field('link_copy_texto') ?>" target="_blank"><?php the_field('link_copy_texto') ?></a>
												<?php else : ?>
													<?php edit_post_link('<span class="label label-danger">Nenhum link informado <i class="fa fa-pencil" aria-hidden="true"></i></span>');?>
												<?php endif; ?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-4">
												<strong>Link para copy vídeo:</strong>
											</div>
											<div class="col-sm-8">
												<?php if (get_field('link_copy_video')): ?>
													<a href="<?php the_field('link_copy_video') ?>" target="_blank"><?php the_field('link_copy_video') ?></a>
												<?php else : ?>
													<?php edit_post_link('<span class="label label-danger">Nenhum link informado <i class="fa fa-pencil" aria-hidden="true"></i></span>');?>
												<?php endif; ?>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div id="tab2" class="tab-pane fade">							
							<div class="row">
								<div class="col-md-6">
									<?php if( have_rows('valores_e_versoes') ): ?>
										<h4><strong>Valores e versões</strong></h4>	

										<table class="table table-striped latest-order">
											<thead>
												<th>
													<strong>Versão</strong>
												</th>
												<th>
													<strong>Valor</strong>
												</th>
											</thead>
											<tbody>
												<?php while ( have_rows('valores_e_versoes') ) : the_row(); ?>
												<tr>
													<td><?php the_sub_field('versao'); ?></td>
													<td><?php the_sub_field('valor'); ?></td>
												</tr>
												<?php endwhile; ?>
											</tbody>
										</table>
									<?php else : ?>
										<?php edit_post_link('<span class="label label-danger">Nenhuma informação cadastrada <i class="fa fa-pencil" aria-hidden="true"></i></span>');?>
									<?php endif; ?>
	
									<hr />
									
									<?php if( have_rows('oferta') ): ?>
										<h4><strong>Oferta</strong></h4>	

										<table class="table table-striped latest-order">
											<thead>
												<th>
													<strong>Versão</strong>
												</th>
												<th>
													<strong>Detalhes</strong>
												</th>
											</thead>
											<tbody>
												<?php while ( have_rows('oferta') ) : the_row(); ?>
												<tr>
													<td><?php the_sub_field('oferta_versao') ?></td>
													<td><?php the_sub_field('oferta_detalhes') ?></td>
												</tr>
												<?php endwhile; ?>
											</tbody>
										</table>
									<?php endif; ?>
								</div>
								<div class="col-md-6">
									<?php if( have_rows('regras_de_desconto') ): ?>
										<h4><strong>Regras de desconto</strong></h4>										

										<table class="table table-striped latest-order">
											<thead>
												<th>
													<strong>Condição</strong>
												</th>
												<th>												
													<strong>Descrição</strong>
												</th>
											</thead>
											<tbody>
												<?php while ( have_rows('regras_de_desconto') ) : the_row(); ?>
												<tr>
													<td><?php the_sub_field('oferta_desconto_condicao') ?></td>
													<td><?php the_sub_field('oferta_desconto_descricao') ?></td>
												</tr>
												<?php endwhile; ?>
											</tbody>
										</table>
									<?php endif; ?>

									<hr>

									<?php if (get_field('regra_de_cancelamento')): ?>
										<h4><strong>Regras de Cancelamento</strong></h4>										

										<?php the_field('regra_de_cancelamento'); ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div id="tab3" class="tab-pane fade active in">
							<div class="row">
								<?php 
									$disparos = get_field('disparos');

									foreach ($disparos as $disparo): 
								?>									
									<div class="form-group">
										<div class="col-sm-4">
											<strong>Título:</strong>
										</div>
										<div class="col-sm-8">
											<a href="<?php echo get_the_permalink($disparo['ID']); ?>"><?php echo $disparo['title']; ?></a>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="well well-sm mbot-0">
						<small>
							A última atualização desta promo foi em  <?php the_modified_date('d\/m\/Y – g:i a'); ?>, por <?php the_modified_author(); ?>. <br />
							Criado por: <?php the_author_meta('display_name'); ?> (<?php the_author_meta('user_email'); ?>).
						</small>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>

<?php 
		endwhile; 
	endif;
?>