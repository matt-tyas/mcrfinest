<?php
/**
 * The template for displaying Author Archive pages.
 *
 * Used to display archive-type pages for posts by an author.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
	<section class="site-content author">
		<div role="main">
		<?php if ( have_posts() ) : ?>
			<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>
			<header>
				<h1><?php printf( __( 'Articles by %s', 'twentytwelve' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?></h1>
			</header><!-- .archive-header -->
			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>
			<div class="gw">
				<div class="g two-thirds palm-one-whole">
                    <div class="gw equal">
    					<?php while ( have_posts() ) : the_post(); ?>
							<div class="g one-third palm-one-half">
								<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link" title="Permanent Link to <?php the_title_attribute(); ?>">
	        						<article <?php post_class('post-tile'); ?>>
        								<?php the_post_thumbnail( 'big-post-thumb'); ?>
        								<span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
        							    <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
	        						</article>
								</a>
							</div>
    					<?php endwhile; ?>
                    </div>
				</div>
				<div class="g one-third palm-one-whole">
					<?php
					// If a user has filled out their description, show a bio on their entries.
					if ( get_the_author_meta( 'description' ) ) : ?>
					<div class="author-info media">
							<div class="author-avatar media__img">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 120 ) ); ?>
							</div><!-- .author-avatar -->
							<div class="author-description-page">
								<h2><?php printf( __( '%s', 'twentytwelve' ), get_the_author() ); ?></h2>
								<p><?php the_author_meta( 'description' ); ?></p>
							</div><!-- .author-description -->
						</div><!-- .author-info -->
					<?php endif; ?>
				<div class="gw">
					<div class="g one-half palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-1' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-1' ); ?>
						<?php endif; ?>
					</div>
					<div class="g one-half palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-2' ) ) : ?>
						<?php dynamic_sidebar( 'category-page-advert-2' ); ?>
						<?php endif; ?>
					</div>
					<div class="g one-half palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-3' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-3' ); ?>
				        <?php endif; ?>
				    </div>
					<div class="g one-half palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-4' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-4' ); ?>
				        <?php endif; ?>
					</div>
					<div class="g one-half palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-5' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-5' ); ?>
				        <?php endif; ?>
				    </div>
					<div class="g one-half palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-6' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-6' ); ?>
				        <?php endif; ?>
					</div>
					<div class="g one-half palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-7' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-7' ); ?>
				        <?php endif; ?>
				    </div>
					<div class="g one-half palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-8' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-8' ); ?>
				        <?php endif; ?>
					</div>
					<div class="g one-half palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-9' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-9' ); ?>
				        <?php endif; ?>
				    </div>
					<div class="g one-half palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-10' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-10' ); ?>
				        <?php endif; ?>
					</div>
                    <div class="g one-half palm-one-quarter mob-one-half">
    				 	<?php
    			        if ( is_active_sidebar( 'category-page-advert-11' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-11' ); ?>
    			        <?php endif; ?>
    				</div>
    				<div class="g one-half palm-one-quarter mob-one-half">
    					<?php
    					if ( is_active_sidebar( 'category-page-advert-12' ) ) : ?>
    					<?php dynamic_sidebar( 'category-page-advert-12' ); ?>
    					<?php endif; ?>
    				</div>
    				<div class="g one-half palm-one-quarter mob-one-half">
    					<?php
    					if ( is_active_sidebar( 'category-page-advert-13' ) ) : ?>
    					<?php dynamic_sidebar( 'category-page-advert-13' ); ?>
    					<?php endif; ?>
    				</div>
    				<div class="g one-half palm-one-quarter mob-one-half">
    					<?php
    					if ( is_active_sidebar( 'category-page-advert-14' ) ) : ?>
    					<?php dynamic_sidebar( 'category-page-advert-14' ); ?>
    					<?php endif; ?>
    				</div>
    				<div class="g one-half palm-one-quarter mob-one-half">
    					<?php
    					if ( is_active_sidebar( 'category-page-advert-15' ) ) : ?>
    					<?php dynamic_sidebar( 'category-page-advert-15' ); ?>
    					<?php endif; ?>
    				</div>
    				<div class="g one-half palm-one-quarter mob-one-half">
    					<?php
    					if ( is_active_sidebar( 'category-page-advert-16' ) ) : ?>
    					<?php dynamic_sidebar( 'category-page-advert-16' ); ?>
    					<?php endif; ?>
    				</div>
    				<div class="g one-half palm-one-quarter mob-one-half">
    					<?php
    					if ( is_active_sidebar( 'category-page-advert-17' ) ) : ?>
    					<?php dynamic_sidebar( 'category-page-advert-17' ); ?>
    					<?php endif; ?>
    				</div>
    				<div class="g one-half palm-one-quarter mob-one-half">
    					<?php
    					if ( is_active_sidebar( 'category-page-advert-18' ) ) : ?>
    					<?php dynamic_sidebar( 'category-page-advert-18' ); ?>
    					<?php endif; ?>
    				</div>
				</div>
				</div>
			</div>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<?php wp_pagenavi(); ?>
		</div><!-- #content -->
	</section><!-- #primary -->
<?php get_footer(); ?>
