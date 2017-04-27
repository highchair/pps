<!--
SEARCH RESULTS PAGE
-->

<?php get_header(); ?>

<main>
  
  <header>
    <h1>
      <?php _e('Results for:', 'bhass'); ?></span> <?php echo esc_attr(get_search_query()); ?>
    </h1>
  </header>

  <div>
    <?php
      if (have_posts()) : while (have_posts()) : the_post();
        $class = 'archive';
        include 'partials/article.php';
      endwhile;
        get_template_part('partials/pagination');
      else: ?>
      <h2>No Results</h2>
      <p>We're sorry but no results were found!</p>
    <?php
      endif;
    ?>
  </div>

</main>

<?php get_footer(); ?>

