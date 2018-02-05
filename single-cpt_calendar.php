<?php 
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); 
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
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-body">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php 
		endwhile; 
	endif;
?>