<?php 
	// Register Custom Taxonomy
	function taxonomy_promo() {

		$labels = array(
			'name'                       => 'Promos',
			'singular_name'              => 'Promos',
			'menu_name'                  => 'Promos',
			'all_items'                  => 'Todos as Promos'
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
		register_taxonomy( 'taxonomy_promo', array( 'cpt_calendar' ), $args );

	}
	add_action( 'init', 'taxonomy_promo', 0 );