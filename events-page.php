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

      <h1>Upcoming Events</h1>

      <?php // featured event

        if( $featured_event ): 

          $post = $featured_event;
          setup_postdata( $post ); 

          get_template_part('partials/article');

          wp_reset_postdata();

        endif; 

      ?>

      <?php // loop through the rest of the events
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $loop = new WP_Query( array('post_type' => 'events', 'paged' => $paged, 'post__not_in' => array($featured_id) ) );
      ?>

      <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php get_template_part('partials/article'); ?>
      <?php endwhile; ?>

        <?php if ($loop->max_num_pages > 1) { ?>
          <nav class="prev-next-posts">
            <div class="prev-posts-link">
              <?php echo get_next_posts_link( 'Older Events', $loop->max_num_pages ); ?>
            </div>
            <div class="next-posts-link">
              <?php echo get_previous_posts_link( 'Newer Events' ); ?>
            </div>
          </nav>
        <?php } ?>

      <?php endif; ?>

    </article>

  </div> <!-- end .main -->

</main>

<?php get_footer(); ?>