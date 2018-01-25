<?php
	// Register Custom Post Type (Products)
	function cpt_produto() {
		$labels = array(
			'name'                  => 'Produtos',
			'singular_name'         => 'Produto',
		);
		$args = array(
			'label'                 => 'Produto',
			'labels'                => $labels,
			'supports'              => array(
											'title', 
											'custom-field',
											'thumbnail'),
			'taxonomies'            => array(),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'menu_icon'				=> 'dashicons-cart',
			'rewrite'				=> array('slug'=>'produto'),
		);
		register_post_type( 'cpt_produto', $args );

	}
	add_action( 'init', 'cpt_produto', 0 );