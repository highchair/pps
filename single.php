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

      <span class="datetime">Published <?php printf(__('<time pubdate>%1$s</time>', 'ppri'), get_the_time('M d, Y')); ?></span>
      in <span class="category"><?php echo get_the_category_list(', '); ?>.</span>
      
      <?php if ( has_tag() ) : ?>
        <div class="tags">
          <span class="label">Tags: </span>
          <?php the_tags('',''); ?>
        </div>
      <?php endif; ?>

    </section>

    <section class="pagination">

      <div class="prev">
        <p class="label">Previous:</p>
        <?php previous_post_link('%link'); ?>
      </div>
      <div class="next">
        <p class="label">Next:</p>
        <?php next_post_link('%link'); ?>
      </div>

    </section>

    <?php get_sidebar(); ?>

  <?php endwhile; endif; ?>

    
      
  </main>

<?php get_footer(); ?>

