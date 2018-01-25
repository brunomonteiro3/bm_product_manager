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
				<p>
					Este disparo foi feito em: <strong><?php echo get_field('data', $post->ID); ?></strong> e é referente a promo <strong><a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a></strong>.
				</p> 

				<div class="col-md-12 text-center">
					<iframe src="<?php echo $post->guid; ?>" frameborder="0" width="600" height="1000"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>