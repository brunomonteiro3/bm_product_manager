<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/simple-line-icons.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/themify-icons.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/main.css">

	<script src="<?php bloginfo('template_url'); ?>/assets/js/modernizr-custom.js"></script>
	
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico">
</head>