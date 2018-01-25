<?php 
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); 
	
		$analistas = get_the_terms(get_the_ID(), 'taxonomy_analista');
		$logo = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="<?php bloginfo('url'); ?>">Gestor de Produtos</a></li>
			<li class="active"><?php the_title(); ?></li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-4 col-lg-2">
		<div class="panel">
			<img src="<?php echo $logo[0]; ?>" class="img-responsive" />
		</div>

		<div class="panel">
			<header class="panel-heading panel-border">
				Dados do produto
			</header>

			<div class="panel-body">		
				<?php if (get_field('email_produto')): ?>					
					<div class="form-group">
						<strong><i class="fa fa-envelope" aria-hidden="true"></i> E-mail do produto:</strong> <br />
						<?php the_field('email_produto'); ?>
					</div>					
				<?php endif ?>

				<?php if (get_field('product_id')): ?>					
					<div class="form-group">
						<strong><i class="fa fa-cart-arrow-down " aria-hidden="true"></i> ID na Stored:</strong> <br />
						<?php the_field('product_id'); ?>
					</div>					
				<?php endif ?>

				<?php 
					if ($analistas) :
				?>			
				<div class="form-group">
					<strong class="mb5 db"><i class="fa fa-address-card" aria-hidden="true"></i> Responsável:</strong>
					
					<div class="row">
						<?php 
							foreach ($analistas as $analista) :
								$avatar = get_field('responsavel_foto', 'taxonomy_analista' . '_' . $analista->term_taxonomy_id);
						?>
							<div class="col-md-4">
								<a href="<?php bloginfo('url'); ?>/equipe/<?php echo $analista->slug; ?>/" data-toggle="tooltip" data-placement="bottom" title="<?php echo $analista->name; ?>">
									<img src="<?php echo $avatar; ?>" class="img-circle img-responsive" />
								</a>
							</div>
						<?php
							endforeach; 
						?>
					</div>
				</div>	
				<?php 
					endif;
				?>		

				<hr />

				<?php edit_post_link('<i class="fa fa-pencil" aria-hidden="true"></i> Editar produto');?>					
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-8 col-lg-5">
		<div class="panel">
			<header class="panel-heading panel-border">
				Promos
			</header>

			<div class="panel-body">	
				<div class="table-responsive">
					<table class="table table-hover latest-order">
						<thead>
							<tr>
								<th>Código</th>
								<th>Data</th>
								<th>Promo</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$args = array (
									'post_type'	=> array( 'cpt_promo' ),
									'posts_per_page' => 20,
									'taxonomy_produto' => $post->post_name
								);

								$produto = new WP_Query( $args );

								if ( $produto->have_posts() ) :
									while ( $produto->have_posts() ) :
										$produto->the_post();
							?>
							<tr>
								<td><?php the_field('codigo_promo') ?></td>
								<td><?php the_date('d\/m\/Y'); ?></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
							</tr>
							<?php 
									endwhile;
								endif;

								wp_reset_query();
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-8 col-lg-5">
		<div class="panel">
			<header class="panel-heading panel-border">
				Disparos
			</header>

			<div class="panel-body">
				&nbsp;
			</div>
		</div>

		<div class="panel">
			<header class="panel-heading panel-border">
				Links Úteis
			</header>

			<div class="panel-body">
				<form class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Vídeo de boas-vindas</strong>
						</div>
						<div class="col-sm-8">
							<a href="<?php the_field('video_boas_vindas'); ?>"><?php the_field('video_boas_vindas'); ?></a>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Área de assinantes</strong>
						</div>
						<div class="col-sm-8">
							<a href="<?php the_field('link_ccp'); ?>"><?php the_field('link_ccp'); ?></a>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Link para compra</strong>
						</div>
						<div class="col-sm-8">
							<a href="<?php the_field('link_checkout'); ?>"><?php the_field('link_checkout'); ?></a>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Plantão de Dúvidas</strong>
						</div>
						<div class="col-sm-8">
							<a href="<?php the_field('link_plantao'); ?>"><?php the_field('link_plantao'); ?></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
		endwhile; 
	endif;
?>