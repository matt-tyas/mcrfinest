<?php if (have_posts()):?>
	<?php while (have_posts()) : the_post(); ?>
	<article role="complementary" class="media">
		<a href="<?php the_permalink() ?>" rel="bookmark">
    	<div class="media__img">
			<?php
				$post_thumbnail_id = get_post_thumbnail_id( );
				$imagesized = wp_get_attachment_image_src( $post_thumbnail_id, 'cat-post-thumb');
				if ($imagesized[1]) {
					the_post_thumbnail('cat-post-thumb');
				} else {
					//
				}
			?>
		</div>
		<div class="related-post__right">
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
		</div>
		</a>
	</article>
	<?php endwhile; ?>
<?php else: ?>
