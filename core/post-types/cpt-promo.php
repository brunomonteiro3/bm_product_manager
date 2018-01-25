<?php
	// Register Custom Post Type (Products)
	function cpt_promo() {
		$labels = array(
			'name'                  => 'Promos',
			'singular_name'         => 'Promo',
		);
		$args = array(
			'label'                 => 'Promo',
			'labels'                => $labels,
			'supports'              => array(
											'title'),
			'taxonomies'            => array(),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'menu_icon'				=> 'dashicons-cart',
			'rewrite'				=> array('slug'=>'promo')
		);
		register_post_type( 'cpt_promo', $args );

	}
	add_action( 'init', 'cpt_promo', 0 );