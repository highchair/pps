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

    <?php if (is_singular('post')) : ?>
      <section class="meta">

        <span class="datetime">Published <?php printf(__('<time pubdate>%1$s</time>', 'ppsri'), get_the_time('M d, Y')); ?></span>
        in <span class="category"><?php echo get_the_category_list(', '); ?>.</span>

      </section>
    <?php endif; ?>

    <article>
    
      <?php the_content(); ?>

    </article>

    <?php if ( is_singular('post') && has_tag() ) : ?>
      <section class="meta">
        <div class="tags">
          <span class="label">Tags: </span>
          <?php the_tags('',''); ?>
        </div>
      </section>
    <?php endif; ?>

    <section class="pagination">

      <div class="prev">
        <?php if (get_adjacent_post(false, '', true)): ?>

          <p class="label">Previous:</p>
          <?php previous_post_link('%link'); ?>

        <?php endif; ?>
      </div>

      <div class="next">
        <?php if (get_adjacent_post(false, '', false)): ?>

          <p class="label">Next:</p>
          <?php next_post_link('%link'); ?>
          
        <?php endif; ?>
      </div>

    </section>

    <?php get_sidebar(); ?>

  <?php endwhile; endif; ?>

    
      
  </main>

<?php get_footer(); ?>

