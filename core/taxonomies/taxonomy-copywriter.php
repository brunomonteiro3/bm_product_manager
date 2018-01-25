<?php 
	// Register Custom Taxonomy
	function taxonomy_copywriter() {

		$labels = array(
			'name'                       => 'Copywriter',
			'singular_name'              => 'Copywriter',
			'menu_name'                  => 'Copywriter',
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
		register_taxonomy( 'taxonomy_copywriter', array( 'cpt_promo' ), $args );

	}
	add_action( 'init', 'taxonomy_copywriter', 0 );