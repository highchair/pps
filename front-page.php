<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="hero">

      <div class="image" style="background-image:url(<?php the_field('hero_image'); ?>)"></div>

    	<div class="text">
    		<p class="subheading"><?php the_field('hero_subtitle'); ?></p>
    		<h2 class="kilo"><?php the_field('hero_title'); ?></h2>
    		<a class="button secondary" href="<?php the_field('hero_button_link'); ?>"><?php the_field('hero_button_text'); ?></a>
    	</div>

    </section>

    <section class="articles">

      <h2>Recent News and Upcoming Events</h2>

      <?php
      $loop = new WP_Query( array( 'posts_per_page'=>4 ) );
      while ($loop->have_posts()) :
        $loop->the_post();
        get_template_part('partials/article-sm');
      endwhile; wp_reset_postdata();
      ?>

    </section>

    <section class="primary block">

      <?php the_field('primary_block'); ?>

    </section>

    <section class="secondary block">

      <?php the_field('secondary_block'); ?>

    </section>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>