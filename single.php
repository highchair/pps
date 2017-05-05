<!--
SINGLE POST / ARTICLE PAGE
-->

<?php get_header(); ?>

<nav class="breadcrumb">
  <?php bcn_display(); ?>
</nav>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header>

      <h1><?php the_title(); ?></h1>

      <?php the_post_thumbnail(); ?>

    </header>

    <article>
    
      <?php the_content(); ?>

    </article>

    <section class="meta">
      <span class="datetime"><?php printf(__('<time pubdate>%1$s</time>', 'ppri'), get_the_time('M d, Y')); ?></span>
      | <span class="category"><?php echo get_the_category_list(', '); ?></span>
      <?php the_tags(''); ?>
    </section>

    <?php get_sidebar(); ?>

  <?php endwhile; endif; ?>

    
      
  </main>

<?php get_footer(); ?>

