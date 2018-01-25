<?php 
	$product = term_exists($s, 'taxonomy_produto');
	if ($star !== 0 && $star !== null) {
		wp_redirect(get_bloginfo('url') . '/produto/' . $search, 301);
		exit();
	}