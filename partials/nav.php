<header id="header">
	<a href="index.php">
		<h1 class="logo-text">Providence Preservation Society</h1>
	</a>
	<nav role="navigation">

		<div class="secondary">
			<a class="toggle-nav" href="javascript:void(0)"><span class="icon-bars"></span> Menu</a> 
			<a href="javascript:void(0)">About</a> 
			<a href="javascript:void(0)">News</a> 
			<a href="javascript:void(0)">Contact</a>
			<div class="desktop-search"><a href="javascript:void(0)">Search</a></div>
		</div>

		<div class="primary-nav">
		  	<?php ppsri_primary_nav(); ?>
			<?php echo get_search_form(); ?>
		</div>

	</nav>

</header>