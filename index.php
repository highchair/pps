<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="hero">

      <div class="image" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/library/img/hero-houses.png')">
      	<!-- <img src="<?#php echo get_stylesheet_directory_uri(); ?>/library/img/hero-houses.png"> -->
      </div>
    	<div class="text">
    		<p class="subheading">Event: June 2-3, 2017</p>
    		<h2 class="kilo">2017 Festival of Historic Houses</h2>
    		<a class="button secondary" href="javascript:void(0)">Learn More &amp; Attend</a>
        <br/>&nbsp; <!-- hack -->
    	</div>

    </section>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>