<?php 
/**
 * Populates array with values from an array
 *
 * @param array $target Array to be populated
 * @param array $values Values to populate $target
 * @param bool $beginning Populate unshifting array
 */
function populate_array(&$target, $values, $beginning = false) {
	if ($beginning) {
		if (isset($target)) {
			foreach ($target as $tgt) {
				$values[] = $tgt;
			}
		}
		$target = $values;
	} else {
		foreach ($values as $value) {
			$target[] = $value;
		}
	}
}

// Enable support for thumbnails

add_theme_support( 'post-thumbnails' ); 

// Custom logo - Admin

function admin_custom_logo() {
?>
	<style type="text/css">
		.login #login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-empiricus.png);
			background-position: center bottom;
			background-size: auto;
			width: 100%;
			margin-bottom: 30px;
		}
	</style>
<?php 
}

add_action( 'login_enqueue_scripts', 'admin_custom_logo' );

/*
**
Hide Admin Menu Itens If User Is Not Admin
**
*/

if (!current_user_can('administrator') ) :
	function my_admin_menu() {
		remove_menu_page('edit.php?post_type=page');
		remove_menu_page('edit.php');
		remove_menu_page('upload.php');
		remove_menu_page('edit-comments.php');
		remove_menu_page('themes.php');

	}

	add_action('admin_menu', 'my_admin_menu');
endif;