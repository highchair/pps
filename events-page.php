<?php
/*
Template Name: Events
*/

$featured_event = get_field('featured_event');
$featured_id = $featured_event->ID;

?>

<?php get_header(); ?>

<main>
  
  <nav class="breadcrumb">
    <?php bcn_display(); ?>
  </nav>

  <div class="main">

    <?php get_sidebar('page'); ?>

    <article>

      <h1 class="page-title">Upcoming Events</h1>

      <?php // featured event

        if( $featured_event ) { 

          $post = $featured_event;
          setup_postdata( $post );

          include('partials/article.php');

          wp_reset_postdata();

        }

      ?>

      <?php // loop through the rest of the events

        $loop = new WP_Query( array('post_type' => 'events', 'posts_per_page' => -1, 'post__not_in' => array($featured_id) ) );
        
        if ( $loop->have_posts() ) { 
          while ( $loop->have_posts() ) { 
            $loop->the_post();

            get_template_part('partials/article');

          }
        }

      ?>

    </article>

  </div> <!-- end .main -->

</main>

<?php get_footer(); ?>