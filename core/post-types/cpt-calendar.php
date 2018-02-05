<?php
	// Register Custom Post Type (Products)
	function cpt_calendar() {
		$labels = array(
			'name'                  => 'Calendário',
			'singular_name'         => 'Calendário',
		);
		$args = array(
			'label'                 => 'Calendário',
			'labels'                => $labels,
			'supports'              => array(
											'title',
											'editor'),
			'taxonomies'            => array(),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'menu_icon'				=> 'dashicons-calendar',
			'rewrite'				=> array('slug'=>'calendario')
		);
		register_post_type( 'cpt_calendar', $args );

	}
	add_action( 'init', 'cpt_calendar', 0 );