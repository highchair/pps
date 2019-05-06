<!doctype html>  

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> ><!--<![endif]-->

<head>
	
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<title>
		<?php wp_title('//', true, 'right'); ?>
	</title>
	
	<!-- mobile meta -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">	

	<!-- wordpress head functions -->
	<?php wp_head(); ?>

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/library/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/library/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/library/icons/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/library/icons/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/library/icons/safari-pinned-tab.svg" color="#4881cb">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/library/icons/favicon.ico">
  <meta name="apple-mobile-web-app-title" content="PPSri.org">
  <meta name="application-name" content="PPSri.org">
  <meta name="msapplication-TileColor" content="#4881cb">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri() ?>/library/icons/mstile-150x150.png">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri() ?>/library/icons/mstile-144x144.png">
  <meta name="msapplication-config" content="<?php echo get_template_directory_uri() ?>/library/icons/browserconfig.xml">
  <meta name="theme-color" content="#d1dcf2">
  <?php
    if ( ! is_user_logged_in() ) {
      $this_id = get_current_blog_id();
      echo ppsri_GA_snippet( $this_id );
    } else {
      echo '<!-- GA code suppressed for logged in users -->';
    }
  ?>

  <!-- create template directory url variable to be used in our javascript -->
  <script>
  var stylesheetDir = "<?php bloginfo('stylesheet_directory') ?>";
  </script>

<?php if ( ! is_user_logged_in() ) { ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-3259148-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'UA-3259148-1');
  </script>
<?php } ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part('partials/nav'); ?>
