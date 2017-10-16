<aside class="related-post gw">
<?php if (have_posts()):?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="g one-third palm-one-half mob-one-whole">
			<article <?php post_class('post-tile post-tile-whole equal-cols'); ?>>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'big-post-thumb'); ?>
					<span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
					<h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
					<!-- <div class="intro">
					<p><?php // echo get_excerpt(80); ?></p>
				    </div> -->
				</a>
			</article>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
</aside>
