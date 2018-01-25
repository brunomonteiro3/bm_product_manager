<?php 
	$product = term_exists($s, 'taxonomy_produto');
	$search = seoUrl($s);
	if ($product !== 0 && $product !== null) {
		wp_redirect(get_bloginfo('url') . '/produto/' . $search, 301);
		exit();
	}