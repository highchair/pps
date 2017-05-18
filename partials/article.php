<article<?php if ( $post->ID == $featured_id ) : ?> class="featured"<?php endif; ?>>
	<a href="<?php the_permalink(); ?>">
		<h2><?php the_title(); ?></h2>
		<?php if ( get_field('event_date') ) : ?>
			<p class="event-date"><?php the_field('event_date'); ?></p>
		<?php endif; ?>
		<?php the_post_thumbnail('medium'); ?>
		<p><?php the_excerpt(); ?></p>
		<p class="read-more">
			<span class="text">Read More</span> <span class="icon-chevron-circle-right"></span>
		</p>
	</a>
</article>