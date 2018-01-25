<?php 
	$count_posts = wp_count_posts('cpt_produto');
	$published_posts = $count_posts->publish;
?>

<div class="row">
	<div class="col-md-8">
		<ol class="breadcrumb">
			<li>Gestor de Produtos</li>
			<li class="active">Visão geral</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="panel">
			<header class="panel-heading panel-border">
				Produtos
			</header>

			<div class="panel-body">		
				<div class="order-short-info">
					<span class="mtop-10"> Produtos cadastrados: <strong><?php echo $published_posts; ?> </strong></span>
					<a href="#" class="pull-right pull-left-xs btn btn-primary btn-sm">Ver todos</a>
				</div>

				<hr />

				<div class="table-responsive">
					<table class="table table-hover latest-order">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome do Produto</th>
								<th>Promos</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$args = array (
									'post_type'	=> array( 'cpt_produto' ),
									'posts_per_page' => 20
								);

								$produto = new WP_Query( $args );

								if ( $produto->have_posts() ) :
									while ( $produto->have_posts() ) :
										$produto->the_post();


							?>
							<tr>
								<td><a href="<?php the_permalink(); ?>"><?php the_field('product_id'); ?></a></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
								<td>
									<a href="<?php the_permalink(); ?>">															
										<?php 
											$productData = get_term_by( 'slug', $post->post_name, 'taxonomy_produto'); 
											if ($productData) :
												echo $productData->count;
											endif;	
										?>
									</a>
								</td>
							</tr>
							<?php 
									endwhile;
								endif;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel">
			<header class="panel-heading panel-border">
				Promos recentes
			</header>

			<div class="panel-body">		
				<div class="order-short-info">
					<span class="mtop-10"> Promos cadastradas: <strong>123</strong></span>
					<a href="#" class="pull-right pull-left-xs btn btn-primary btn-sm">Ver todas</a>
				</div>

				<hr />

				<div class="table-responsive">
					<table class="table table-hover latest-order">
						<thead>
							<tr>
								<th>Código</th>
								<th>Título</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$args = array (
									'post_type'	=> array( 'cpt_promo' ),
									'posts_per_page' => 20
								);

								$produto = new WP_Query( $args );

								if ( $produto->have_posts() ) :
									while ( $produto->have_posts() ) :
										$produto->the_post();
							?>
							<tr>
								<td><a href="<?php the_permalink(); ?>"><?php the_field('codigo_promo'); ?></a></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
							</tr>
							<?php 
									endwhile;
								endif;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel">
			<header class="panel-heading panel-border">
				Disparos
			</header>

			<div class="panel-body">		
				Breve
			</div>
		</div>
	</div>
</div>