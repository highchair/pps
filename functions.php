<?php

/*

PROVIDENCE PRESERVATION SOCIETY Theme Functions
Author: Kay Belardinelli
URL: http://kangabell.co

*/


/************* BASICS ***************/

// set maximum allowed width for content
if ( ! isset( $content_width ) )
    $content_width = 1400;

// remove WP version from RSS
add_filter('the_generator', 'ppsri_rss_version');
// clean up gallery output in wp
add_filter('gallery_style', 'ppsri_gallery_style');
// remove p tags from category description
remove_filter('term_description','wpautop');

// enqueue base scripts and styles
add_action('wp_enqueue_scripts', 'ppsri_scripts_and_styles', 999);

// launching this stuff after theme setup
add_action('after_setup_theme','ppsri_theme_support');
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'ppsri_register_sidebars' );
// adding the search form
add_filter( 'get_search_form', 'ppsri_wpsearch' );
// modify output of categories widget
add_filter('wp_list_categories', 'ppsri_cat_count');

// cleaning up random code around images & blockquotes
add_filter('the_content', 'ppsri_filter_ptags_on_images');
add_filter('the_content', 'ppsri_filter_ptags_on_blockquotes');
// cleaning up excerpt
add_filter('excerpt_more', 'ppsri_excerpt_more');


/*********************
CLEANUP
*********************/

// remove WP version from RSS
function ppsri_rss_version() { return ''; }

// remove WP version from scripts
function ppsri_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) )
      $src = remove_query_arg( 'ver', $src );
  return $src;
}

// remove injected CSS from gallery
function ppsri_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

// remove the p from around imgs & blockquotes (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function ppsri_filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
function ppsri_filter_ptags_on_blockquotes($content){
  return preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $content);
}

// Change "[...]more>>" to "...".
function ppsri_excerpt_more($more) {
  global $post;
  return '...';
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading jquery and reply script
function ppsri_scripts_and_styles() {
  if (!is_admin()) {

    // main stylesheet
    wp_register_style( 'ppsri-stylesheet', get_template_directory_uri() . '/library/stylesheets/screen.css', array(), filemtime( plugin_dir_path( __FILE__ ) .  '/library/stylesheets/screen.css' ), 'all' );

    // theme scripts files
    wp_register_script( 'ppsri-nav-js', get_template_directory_uri() . '/library/scripts/nav.js', array( 'jquery' ), '', true );
    wp_register_script( 'ppsri-searchbar-js', get_template_directory_uri() . '/library/scripts/searchbar.js', array( 'jquery' ), '', true );
    wp_register_script( 'ppsri-equalize-and-expand-js', get_template_directory_uri() . '/library/scripts/equalize-and-expand.js', array( 'jquery' ), '', true );
    wp_register_script( 'ppsri-waypoints-js', get_template_directory_uri() . '/library/scripts/waypoints.js', array( 'jquery' ), '', true );

    // modernizr media queries
    wp_register_script( 'modernizr-mq', get_template_directory_uri() . '/library/scripts/vendor/modernizr-mq.min.js', array( 'jquery' ), '', false );

    // waypoints for sticky elements
    wp_register_script( 'waypoints', get_template_directory_uri() . '/library/scripts/vendor/waypoints.min.js', array( 'jquery' ), '', true );

    // enqueue styles and scripts
    wp_enqueue_style( 'ppsri-stylesheet' );

    wp_enqueue_script( 'ppsri-nav-js' );
    wp_enqueue_script( 'ppsri-searchbar-js' );
    wp_enqueue_script( 'ppsri-equalize-and-expand-js' );
    wp_enqueue_script( 'ppsri-waypoints-js' );

    wp_enqueue_script( 'modernizr-mq' );

    wp_enqueue_script( 'waypoints' );

    // create site url variable to be used in js
    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
    wp_localize_script( 'ppsri-js', 'wpurl', $translation_array );

    // Add GA tracking
    $this_blog_id = get_current_blog_id();
    if ( function_exists('ppsri_GA_snippet') ) {
      echo ppsri_GA_snippet( $this_blog_id );
    }    
  }
}


/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function ppsri_theme_support() {

  // rss thingy
  add_theme_support('automatic-feed-links');

  // wp menus
  add_theme_support( 'menus' );

  // registering wp3+ menus
  register_nav_menus(
    array(
      'primary-nav' => __( 'Primary Navigation', 'ppsri' ),
      'secondary-nav' => __( 'Secondary Navigation', 'ppsri' )
    )
  );

  // featured images
  add_theme_support( 'post-thumbnails' ); 
  add_image_size( 'grid-thumb', 680, 295, array( 'center', 'center') );
    
} /* end ppsri theme support */

// Switching GA tracking codes based on the site
function ppsri_GA_snippet($current_id) {
  $GA_UA = 'UA-3259148-1';
  if ( $current_id == '2') {
    // This is the PPS DB site
    $GA_UA = 'UA-3259148-5';
  }
  return "<script async src=\"https://www.googletagmanager.com/gtag/js?id=" . $GA_UA . "\"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '" . $GA_UA . "');
  </script>";
}
add_action( 'init', 'ppsri_GA_snippet' );
add_action( 'wp', 'ppsri_GA_snippet' );


/*********************
MENUS & NAVIGATION
*********************/

// main nav: primary
function ppsri_primary_nav() {
  wp_nav_menu(array(
    'menu' => __( 'Primary Navigation', 'ppsri' ),
    'container' => false,
    'theme_location' => 'primary-nav',
    'depth' => 1,
  ));
}

// main nav: secondary
function ppsri_secondary_nav() {
  wp_nav_menu(array(
    'menu' => __( 'Secondary Navigation', 'ppsri' ),
    'container' => false,
    'theme_location' => 'secondary-nav',
    'depth' => 1,
  ));
}


/************* MODIFIED TITLE ********************/
// makes a nicely formatted title to go in the head of the document

function ppsri_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  return $title;
}
add_filter( 'wp_title', 'ppsri_wp_title', 10, 2 );


/************* ACTIVE SIDEBARS ********************/

function ppsri_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar',
        'name' => __('Sidebar', 'ppsri'),
        'description' => __('The sidebar for the blog and archive pages.', 'ppsri'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'id' => 'address',
        'name' => __('Address', 'ppsri'),
        'description' => __('The address in the footer', 'ppsri'),
        'before_widget' => '',
        'after_widget' => '',
    ));
    register_sidebar(array(
        'id' => 'contact-info',
        'name' => __('Contact Info', 'ppsri'),
        'description' => __('The contact info in the footer', 'ppsri'),
        'before_widget' => '',
        'after_widget' => '',
    ));
    register_sidebar(array(
        'id' => 'social',
        'name' => __('Social Links', 'ppsri'),
        'description' => __('The social media links in the footer', 'ppsri'),
        'before_widget' => '',
        'after_widget' => '',
    ));
}


/************* SEARCH FORM LAYOUT *****************/

// Search Form
if ( !function_exists('ppsri_wpsearch') ) {
  function ppsri_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="search" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit" class="primary">Search</button>
    </form>';
    return $form;
  }
}

/************* SHORT VERSION OF EXCERPT *****************/

function short_excerpt($new_length = 20, $new_more = '...') {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
  add_filter('excerpt_more', function () use ($new_more) {
    return $new_more;
  });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

/************* MODIFY CATEGORIES WIDGET OUTPUT *****************/

function ppsri_cat_count($links) {

  // wrap the anchor with a span, remove the parentheses, and wrap the count with a span
  $links = str_replace('<a', '<span class="name"><a', $links);
  $links = str_replace('</a> (', '</a></span> <span class="count">', $links);
  $links = str_replace(')', '</span>', $links);

  return $links;
}


/************* LIST CHILD PAGES *****************/

// List Children of Current Page
function ppsri_list_child_pages() { 

  global $post; 

  if ( is_page() && $post->post_parent ) { // if this page is the parent

    $childpages = wp_list_pages( 'sort_column=menu_order&depth=3&title_li=&child_of=' . $post->post_parent . '&echo=0' );

  } else { // if it's a child

    $childpages = wp_list_pages( 'sort_column=menu_order&depth=3&title_li=&child_of=' . $post->ID . '&echo=0' );

  }
  if ( $childpages ) {

    $string = '<ul class="pages-menu">' . $childpages . '</ul>';
  }

  return $string;
}

?>
