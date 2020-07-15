<article <?php if ( isset($featured_id) && $post->ID == $featured_id ) : ?>class="featured"<?php endif; ?>>
	<a href="<?php the_permalink(); ?>">

		<?php if ( !is_page_template( 'events-page.php' ) ) : ?>
			<section class="meta">

			  <span class="datetime"><?php printf(__('<time pubdate>%1$s</time>', 'ppsri'), get_the_time('M d, Y')); ?></span>

			</section>
		<?php endif; ?>

		<h2><?php the_title(); ?></h2>

		<?php if ( get_field('event_date') ) : ?>
			<p class="event-date"><?php the_field('event_date'); ?></p>
		<?php endif; ?>

		<?php the_post_thumbnail('grid-thumb'); ?>

		<p><?php the_excerpt(); ?></p>

		<p class="read-more">
			<span class="text">Read More</span> <span class="icon-chevron-circle-right"></span>
		</p>

	</a>
</article>
