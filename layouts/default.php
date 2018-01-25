<?php
	the_component('components/head');
?>
	<div id="ui" class="ui">
		<?php
			the_component('elements/header');
			the_component('elements/sidebar');
		?>

		<div id="content" class="ui-content ui-content-aside-overlay">
			<div class="ui-content-body">
				<div class="ui-container">  
					<?php
						echo $args['content'];
					?>
				</div>
			</div>
		</div>
	</div>
<?php
	the_component('components/foot');
?>