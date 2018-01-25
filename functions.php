<?php
	/* Core */
	require_once locate_template('core/init.php');
	require_once locate_template('core/components.php');
	require_once locate_template('core/assets-loader.php');
	require_once locate_template('core/theme-wrapper.php');

	/* Functions */
	require_once locate_template('core/functions/seo-url.php');

	/* Post Types */
	require_once locate_template('core/post-types/cpt-produto.php');
	require_once locate_template('core/post-types/cpt-promo.php');

	/* Taxonomies */
	require_once locate_template('core/taxonomies/taxonomy-analista.php');
	require_once locate_template('core/taxonomies/taxonomy-copywriter.php');
	require_once locate_template('core/taxonomies/taxonomy-produto.php');
?>