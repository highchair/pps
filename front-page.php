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
        <br/>&nbsp; <!-- hack -->
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
      <div class="wrapper">

        <h2>About PPS</h2>

        <div class="text">
          <p>
            Sed nisi risus, aliquam at diam quis, facilisis tincidunt erat. Praesent quam dui, congue et orci quis, cursus finibus diam. Integer ac vestibulum ante. In id condimentum libero, ut vulputate tortor. In libero sapien, auctor hendrerit venenatis ut, lobortis vitae tortor. Nullam et ligula condimentum, dignissim erat ut, facilisis diam. Praesent gravida feugiat lacus, aliquam egestas ligula vehicula in. Mauris tincidunt, arcu quis rutrum varius, orci urna feugiat metus, vitae facilisis odio turpis vel sem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum elementum erat vel tempor gravida.
          </p>
          <p>
            Maecenas maximus felis dolor, id fringilla est lacinia a. Mauris efficitur at magna non iaculis. Vivamus in sapien tellus. Sed mollis pulvinar risus, tincidunt facilisis metus sodales at. Etiam vitae metus non magna blandit tristique. Sed laoreet elit non imperdiet pulvinar. Mauris aliquet pretium placerat. In ac imperdiet neque.
          </p>
          <p class="links">
            <span>Learn more about: </span>
            <a href="javascript:void(0)">PPS's Partners in Preservation</a>
          </p>
        </div>

      </div>
    </section>

    <section class="secondary block">
      <div class="wrapper">

        <h2>How You Can Help</h2>
        <div class="text">
          <p>
            <strong>Vestibulum dignissim nec erat et euismod!</strong> Sed nisi risus, aliquam at diam quis, facilisis tincidunt erat. Praesent quam dui, congue et orci quis, cursus finibus diam. Integer ac vestibulum ante. In id condimentum libero, ut vulputate tortor. In libero sapien, auctor hendrerit venenatis ut, lobortis vitae tortor. Nullam et ligula condimentum, dignissim erat ut, facilisis diam. Praesent gravida feugiat lacus, aliquam egestas ligula vehicula in. Mauris tincidunt, arcu quis rutrum varius, orci urna feugiat metus, vitae facilisis odio turpis vel sem. Interdum et malesuada fames ac ante ipsum primis in faucibus. <em>Vestibulum elementum erat vel tempor gravida.</em>
          </p>
        </div>
        <div class="button-group">
          <div><a class="button primary" href="javascript:void(0)">Become a Member</a></div>
          <div><a class="button primary" href="javascript:void(0)">Attend an Event</a></div>
          <div><a class="button primary" href="javascript:void(0)">Volunteer Your Time</a></div>
          <div><a class="button primary" href="javascript:void(0)">Sponsor an Event</a></div>
          <div><a class="button primary" href="javascript:void(0)">Advocate for Preservation</a></div>
          <div><a class="button primary" href="javascript:void(0)">Donate Today</a></div>
          <p class="links">
            <span>Learn more about: </span>
            <a href="javascript:void(0)">PPS's Partners in Preservation</a>
          </p>
        </div>

      </div>
    </section>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>