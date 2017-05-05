<?php get_header(); ?>

<main>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<nav class="breadcrumb">
		<?php bcn_display(); ?>
	</nav>

	<?php get_sidebar('page'); ?>

	<article>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php the_content(); ?>

	</article>

	<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>

