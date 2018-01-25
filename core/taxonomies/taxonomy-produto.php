<?php 
	// Register Custom Taxonomy
	function taxonomy_produto() {

		$labels = array(
			'name'                       => 'Produtos',
			'singular_name'              => 'Produtos',
			'menu_name'                  => 'Produtos',
			'all_items'                  => 'Todos os produtos'
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'taxonomy_produto', array( 'cpt_promo' ), $args );

	}
	add_action( 'init', 'taxonomy_produto', 0 );