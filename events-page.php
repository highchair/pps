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
      $loop = new WP_Query( array( 'post_type'=>'events' ) );
        while ($loop->have_posts()) :
          $loop->the_post();
          include 'partials/article.php';
        endwhile; 
        get_template_part('partials/pagination');
      wp_reset_postdata();
      ?>

    </article>

  </div> <!-- end .main -->

</main>

<?php get_footer(); ?>