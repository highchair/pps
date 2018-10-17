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

      <div class="items">

        <?php

        $featured = get_field('featured_content');

        if ( $featured ) {
          foreach ( $featured as $post):
            setup_postdata($post);
            get_template_part('partials/article-sm');
          endforeach;
          wp_reset_postdata();
        }

        ?>

      </div>

    </section>

    <section class="primary block">

      <?php the_field('primary_block'); ?>

      <div class="expand">
        <a class="button primary" href="javascript:void(0)">Show More</a>
      </div>

    </section>

    <section class="secondary block">

      <?php the_field('secondary_block'); ?>

      <?php if ( have_rows('button_group') ) : ?>

        <div class="buttons"><div class="button-group">

          <?php while ( have_rows('button_group') ) : the_row(); ?>
          <div>
            <a href="<?php echo get_sub_field('link'); ?>" class="button primary"><?php echo get_sub_field('text'); ?></a>
          </div>
          <?php endwhile; ?>

        </div></div>

      <?php endif; ?>

      <div class="expand">
        <a class="button secondary" href="javascript:void(0)">Show More</a>
      </div>

    </section>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>