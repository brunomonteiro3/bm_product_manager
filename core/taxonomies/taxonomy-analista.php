<?php 
	// Register Custom Taxonomy
	function taxonomy_analista() {

		$labels = array(
			'name'                       => 'Analistas',
			'singular_name'              => 'Analista',
			'menu_name'                  => 'Analistas',
			'all_items'                  => 'Todos os analistas'
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
		register_taxonomy( 'taxonomy_analista', array( 'cpt_produto' ), $args );

	}
	add_action( 'init', 'taxonomy_analista', 0 );