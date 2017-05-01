<article>
	<h2><?php the_title(); ?></h2>
	<?php the_post_thumbnail('medium'); ?>
	<p><?php the_excerpt(); ?></p>
	<a class="read-more" href="<?php the_permalink(); ?>">
		<span class="text">Read More</span> <span class="icon-chevron-circle-right"></span>
	</a>
</article>