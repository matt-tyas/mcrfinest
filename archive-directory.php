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
	<!-- <section class="border-wrap finder-trigger-section">
		<div class="gw">
			<div class="g one-whole lap-one-whole palm-one-whole">
				<div class="mf-section mf-peach">
					<h1 class="mf-label"><a href="<?php echo get_site_url(); ?>/find/" class="mf-label__link">Find something to do in Manchester</a></h1>
					<a href="#" class="finder-trigger"><span aria-hidden="true" data-icon="&#x260c;"></span> Search now</a>
				</div>
			</div>
		</div>
	</section> -->
    <!-- <section>
        <div class="gw">
            <div class="g one-whole lap-one-whole palm-one-whole">
                <div class="mf-section mf-directory-search-home mf-directory-search--directory">
                    <h1 class="mf-label">Find something to do in Manchester</h1>
                    <?php
                        if ( is_active_sidebar( 'directory-search' ) ) : ?>
                        <?php dynamic_sidebar( 'directory-search' ); ?>
                    <?php endif; ?>
                    <a href="#" class="finder-close-trigger"><span aria-hidden="true" data-icon="&#x2612;"></span> Close</a>
                </div>
            </div>
        </div>
    </section> -->
	<section class="site-content author">
		<div id="directory-results" class="gw">
		<?php if ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php rewind_posts(); ?>
				<div class="gw">
					<div class="g one-whole palm-one-whole">
						<?php $countPosts = $wp_the_query->post_count; ?>
						<h2 class="results-count">We found <?php echo $countPosts ?> for you</h2>
					</div>
				</div>
				<div class="g one-whole palm-one-whole">
					<div class="gw equal">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="g one-quarter lap-one-half palm-one-half">
							<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
								<article <?php post_class('post-tile post-tile--grid'); ?>>
									<?php the_post_thumbnail('big-post-thumb'); ?>
									<h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
								</article>
							</a>
						</div>
					<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php else : ?>
			<?php // get_template_part( 'content', 'none' ); ?>
			<article id="post-0" class="post no-results not-found">
				<h1>Coming soon&hellip;</h1>
				<p>A searchable, Finest curated selection of things to eat, drink and do in Manchester.</p>
			</article>
		<?php endif; ?>
		<?php // wp_pagenavi(); ?>
	</section><!-- #primary -->
<?php get_footer(); ?>
