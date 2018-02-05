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
				<div class="table-responsive">
					<table class="table table-hover latest-order">
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th class="text-center">ID</th>
								<th>Nome do Produto</th>
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
										$logo = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
							?>
							<tr>
								<td align="center"><a href="<?php the_permalink(); ?>"><img src="<?php echo $logo[0]; ?>" width="50" /></a></td>
								<td align="center"><a href="<?php the_permalink(); ?>"><?php the_field('product_id'); ?></a></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
							</tr>
							<?php 
									endwhile;
								endif;
							?>
						</tbody>
					</table>	

					<hr />

					<div class="order-short-info">
						<span class="mtop-10"> Produtos cadastrados: <strong><?php echo $published_posts; ?> </strong></span>
						<a href="#" class="pull-right pull-left-xs btn btn-primary btn-sm">Ver todos</a>
					</div>
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
				<div class="table-responsive">
					<table class="table table-hover latest-order">
						<thead>
							<tr>
								<th>Código</th>
								<th>Data</th>
								<th>Título</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$args = array (
									'post_type'			=> array( 'cpt_promo' ),
									'posts_per_page' 	=> 20,
									'post_status'			=> array('publish', 'future')
								);

								$produto = new WP_Query( $args );

								if ( $produto->have_posts() ) :
									while ( $produto->have_posts() ) :
										$produto->the_post();
							?>
							<tr>
								<td><a href="<?php the_permalink(); ?>"><?php the_field('codigo_promo'); ?></a></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_date('d\/m\/Y'); ?></a></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
							</tr>
							<?php 
									endwhile;
								endif;

								wp_reset_query();
							?>
						</tbody>
					</table>

					<hr /> 

					<div class="order-short-info">
						<a href="#" class="pull-right pull-left-xs btn btn-primary btn-sm">Ver todas</a>
					</div>
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
				<table class="table table-striped latest-order">
					<thead>
						<th>
							<strong>Título</strong>
						</th>
						<th>
							<strong>Data do disparo</strong>
						</th>
						<th>
							&nbsp;
						</th>
					</thead>
					<?php 
						$attachments = get_posts( array(
							'post_type' => 'attachment',
							'posts_per_page' => 10,
							'post_mime_type'	=> 'text/html'
						) );

						if ( $attachments ) :
							foreach ( $attachments as $attachment ) :
					?>
					<tr>
						<td><?php echo $attachment->post_title; ?></td>
						<td><?php the_field('data_disparo', $attachment->ID); ?></td>
						<td><a href="<?php echo get_permalink($attachment->ID); ?>">Visualizar</a></td>
					</tr>
					<?php 
							endforeach;
						endif;
					?>
				</table>
			</div>
		</div>
	</div>
</div>