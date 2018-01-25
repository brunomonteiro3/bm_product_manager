<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/main.min.js"></script>
<?php
	/*
		* Default scripts of the webpage
	*/
	global $js;

	get_scripts();
	
	wp_footer();
?>