

<?php get_header(); ?>

<main>
  
  <nav class="breadcrumb">
    <?php bcn_display(); ?>
  </nav>

  <div class="main">

    <header>

      <h1>News</h1>

    </header>
    
    <?php
    if ( have_posts() ) { 
      while ( have_posts() ) { the_post();
        get_template_part('partials/article');
      }
      get_template_part('partials/pagination');
    }
    ?>

  </div> <!-- end .main -->

  <?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>