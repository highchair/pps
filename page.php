<?php get_header(); ?>

<main>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<nav class="breadcrumb">
		<a href="javascript:void(0)">Home</a> &gt;
		<a href="javascript:void(0)">Advocacy</a> &gt;
		<?php the_title(); ?>
	</nav>

	<?php get_sidebar('page'); ?>

	<article>

		<h2><?php the_title(); ?></h2>

		<?php the_content(); ?>

	</article>

	<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>

