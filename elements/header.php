<header id="header" class="ui-header">

	<div class="navbar-header">
		<!--logo start-->
		<a href="<?php bloginfo('url'); ?>" class="navbar-brand">
			<img src="https://i.imgur.com/8S9W01c.png" width="90" />
		</a>
		<!--logo end-->
	</div>

	<div class="search-dropdown dropdown pull-right visible-xs">
		<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-search"></i></button>
		<div class="dropdown-menu">
			<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
				<input class="form-control" placeholder="Buscar" name="s" type="search" value="<?php echo get_search_query() ?>" />
			</form>
		</div>
	</div>

	<div class="navbar-collapse nav-responsive-disabled">
		<form class="navbar-form pull-right search-form-menu" role="search" method="get" action="<?php echo home_url( '/' ); ?>">						
			<input id="search-field" type="search" class="form-control" placeholder="Busca" value="<?php echo get_search_query() ?>" name="s" />
		</form>		
	</div>
</header>