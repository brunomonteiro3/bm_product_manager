<aside id="aside" class="ui-aside">
	<ul class="nav" ui-nav>
		<li class="nav-head">
			<h5 class="nav-title text-uppercase light-txt">Navegação</h5>
		</li>

		<li>
			<a href=""><i class="fa fa-home"></i><span>Produtos</span><i class="fa fa-angle-right pull-right"></i></a>
			<ul class="nav nav-sub">
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
					<li><a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a></li>
				<?php 
						endwhile;
					endif;
				?>
			</ul>
		</li>
		
		<li>
			<a href=""><i class="fa fa-home"></i><span>Ofertas</span><i class="fa fa-angle-right pull-right"></i></a>
			<ul class="nav nav-sub">
				<?php 
					$args = array (
						'post_type'	=> array( 'cpt_promo' ),
						'posts_per_page' => 20
					);

					$promo = new WP_Query( $args );

					if ( $promo->have_posts() ) :
						while ( $promo->have_posts() ) :
							$promo->the_post();
				?>
					<li><a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a></li>
				<?php 
						endwhile;
					endif;
				?>
			</ul>
		</li>
	
		<li class="active"><a href="index.html"><span>Disparos</span></a></li>
	</ul>
</aside>