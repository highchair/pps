<?php get_header(); ?>

<main>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<nav class="breadcrumb">
		<?php bcn_display(); ?>
	</nav>

	<div class="main">

		<?php 
			// if the page is a child or parent, show sidebar navigation
			$children = get_pages( array( 'child_of' => $post->ID ) );
			if ( (is_page() && $post->post_parent) || (is_page() && count( $children ) > 0) ) {
				get_sidebar('page'); 
			}
		?>

		<article>

			<h1 class="page-title"><?php the_title(); ?></h1>

			<?php the_content(); ?>

		</article>

		<?php endwhile; endif; ?>

	</div>

</main>

<?php get_footer(); ?>

