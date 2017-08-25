<header id="header">
	<div class="pps-head" role="banner">
    <div class="pps-head--logo">
      <img srcset="
          <?php echo get_stylesheet_directory_uri(); ?>/library/header/pps_logo_sm.png 192w,
          <?php echo get_stylesheet_directory_uri(); ?>/library/header/pps_logo_lg.png 362w"
        src="<?php echo get_stylesheet_directory_uri(); ?>/library/header/pps_logo_lg.png">
    </div>
    <div class="pps-head--empire">
      <img srcset="
          <?php echo get_stylesheet_directory_uri(); ?>/library/header/empire_sm.png 314w,
          <?php echo get_stylesheet_directory_uri(); ?>/library/header/empire_lg.png 588w"
        src="<?php echo get_stylesheet_directory_uri(); ?>/library/header/empire_lg.png">
    </div>
    <div class="pps-head--transom"></div>
    <div class="pps-head--armory">
      <img srcset="
          <?php echo get_stylesheet_directory_uri(); ?>/library/header/armory_sm.png 188w,
          <?php echo get_stylesheet_directory_uri(); ?>/library/header/armory_lg.png 352w"
        src="<?php echo get_stylesheet_directory_uri(); ?>/library/header/armory_lg.png">
    </div>
    <div class="pps-head--bar"></div>
    <div class="pps-head--indy">
      <img srcset="
          <?php echo get_stylesheet_directory_uri(); ?>/library/header/indytrust_sm.png 222w,
          <?php echo get_stylesheet_directory_uri(); ?>/library/header/indytrust_lg.png 416w"
        src="<?php echo get_stylesheet_directory_uri(); ?>/library/header/indytrust_lg.png">
    </div>
  </div>
	<a href="<?php echo get_home_url(); ?>">
		<h1 class="logo-text">Providence Preservation Society</h1>
	</a>
	<nav>

		<div class="secondary-nav">
			<a class="toggle-nav" href="javascript:void(0)"><span class="icon-bars"></span> Menu</a> 
			<?php ppsri_secondary_nav(); ?>
			<div class="desktop-search"><a href="javascript:void(0)">Search</a></div>
		</div>

		<div class="primary-nav">
			<a class="toggle-nav" href="javascript:void(0)"><span class="icon-close"></span> Exit</a>
		  	<?php ppsri_primary_nav(); ?>
			<?php echo get_search_form(); ?>
		</div>

	</nav>
</header>