<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<section class="site-content author">
		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		<h1>Find what you want to do in Manchester</h1>
		<div class="mf-directory-search">
	   		<?php echo do_shortcode('[searchandfilter id="25457"]'); ?>
	    </div>
		<?php if ( have_posts() ) : ?>
			<div class="gw">
				<div class="g one-whole palm-one-whole">
					<?php $countPosts = $wp_the_query->post_count; ?>
					<p>We found <?php echo $countPosts ?> for you</p>
				</div>
			</div>
			<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>

			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>

			<div class="gw">
				<div class="g one-whole palm-one-whole">
					<div id="sort-container">
						<?php while ( have_posts() ) : the_post(); ?>
						<article <?php post_class('post-tile'); ?>>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
								<?php
								    $post_thumbnail_id = get_post_thumbnail_id( );
									$imagesized = wp_get_attachment_image_src( $post_thumbnail_id, 'big-post-thumb');
									if ($imagesized[1] == 308) {
										the_post_thumbnail('big-post-thumb');
									} else {
										the_post_thumbnail('cat-post-thumb');
									}
								?>
								<span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
								<h3><?php the_title(); ?></h3>
								<div class="intro">
								<p><?php echo get_excerpt(140); ?></p>
							</div>
							</a>
						</article>
					<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<?php wp_pagenavi(); ?>
	</section><!-- #primary -->
<?php get_footer(); ?>
