<?php
/*
Template Name: Events
*/
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

      <?php
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $loop = new WP_Query( array('post_type' => 'events', 'paged' => $paged) );
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