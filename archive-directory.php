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
    <a href="#" class="finder-trigger"><span aria-hidden="true" data-icon="&#x260c;"></span> Find things to do in&nbsp;Manchester</a>
    <section>
        <div class="gw">
            <div class="g one-whole lap-one-whole palm-one-whole">
                <div class="mf-section mf-directory-search-home mf-directory-search--directory">
                    <h3 class="mf-label"><span class="icon icon-marker"></span> Find something in Manchester</h3>
                    <?php
                        if ( is_active_sidebar( 'directory-search' ) ) : ?>
                        <?php dynamic_sidebar( 'directory-search' ); ?>
                    <?php endif; ?>
                    <a href="#" class="finder-close-trigger"><span aria-hidden="true" data-icon="&#x2612;"></span> Close</a>
                </div>
            </div>
        </div>
    </section>
	<section class="site-content author">
		<?php if ( have_posts() ) : ?>
			<div class="gw">
				<div class="g one-whole palm-one-whole">
					<?php $countPosts = $wp_the_query->post_count; ?>
					<h2 class="results-count">We found <?php echo $countPosts ?> for you</h2>
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
					<div class="gw equal">
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="g one-quarter palm-one-half">
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
						</div>
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
