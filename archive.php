<!--
ARCHIVE PAGE TEMPLATE
-->

<?php get_header(); ?>

<main>
  
  <nav class="breadcrumb">
    <?php bcn_display(); ?>
  </nav>

  <div class="main">

    <header>
      <p>
        <?php 
          if (is_category()) { 
            echo 'From Category: ';
          } elseif (is_tag()) {
            echo 'From Tag: ';
          } elseif (is_author()) {
            echo 'From Author: ';
          }
        ?>
      </p>

      <h1>

        <?php 
          if (is_post_type_archive('events')) {
            echo 'Upcoming Events';
          } elseif (is_category()) { 
            single_cat_title();
          } elseif (is_tag()) {
            single_tag_title();
          } elseif (is_author()) {
            global $post;
            $author_id = $post->post_author;
            echo get_the_author_meta('display_name', $author_id);
          } else {
            echo 'Archives';
          }
        ?>

      </h1>

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