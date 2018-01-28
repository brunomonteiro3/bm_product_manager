<?php 
	$produtos = get_the_terms( $post->post_parent, 'taxonomy_produto' );

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
			<li><a href="<?php echo get_the_permalink($post->post_parent); ?>">Detalhes da promo</a></li>
			<li class="active"><?php the_title(); ?></li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel">			
			<header class="panel-heading panel-border">
				Disparo: <?php the_title(); ?>
			</header>

			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<div class="col-sm-4">
								<strong>Data do disparo:</strong>
							</div>

							<div class="col-sm-8">
								<?php the_field('data_disparo'); ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-4">
								<strong>Promo:</strong>
							</div>

							<div class="col-sm-8">
								<a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a>
							</div>
						</div>
					</div>

					<div style="clear: both"></div>

					<?php edit_post_link('<i class="fa fa-pencil" aria-hidden="true"></i> Editar disparo');?>	
				</div>

				<div class="col-md-6">
					<div class="col-md-12 text-center">
						<iframe src="<?php echo $post->guid; ?>" frameborder="0" width="600" height="1000"></iframe>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>