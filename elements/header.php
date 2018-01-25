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
			<form >
				<input class="form-control" placeholder="Buscar" type="text">
			</form>
		</div>
	</div>

	<div class="navbar-collapse nav-responsive-disabled">

		<!--toggle buttons start-->
		<ul class="nav navbar-nav">
			<li>
				<a class="toggle-btn" data-toggle="ui-nav" href="">
					<i class="fa fa-bars"></i>
				</a>
			</li>
		</ul>
		<!-- toggle buttons end -->

		<form class="search-content hidden-xs" >
			<button type="submit" name="search" class="btn srch-btn">
				<i class="fa fa-search"></i>
			</button>
			<input type="text" class="form-control" name="keyword" placeholder="Buscar">
		</form>

	</div>

</header>