<aside class="related-post gw">
<?php if (have_posts()):?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="g one-third palm-one-half mob-one-whole">
			<article <?php post_class('post-tile post-tile-whole equal-cols'); ?>>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'big-post-thumb'); ?>
					<h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
				</a>
			</article>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
</aside>
