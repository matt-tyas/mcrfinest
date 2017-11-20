<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section class="site-content">
		<div class="gw" role="main">

			<div class="g two-thirds palm-one-whole">

				<?php if ( have_posts() ) : ?>

				<h1><?php printf( __( 'Search results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

				<?php // twentytwelve_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php // twentytwelve_content_nav( 'nav-below' ); ?>

				<?php else : ?>

				<div class="search-page"><?php include( TEMPLATEPATH . '/searchform-extended.php'); ?></div>

				<h2><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h2>
				<div class="entry-content">
					<p class="muted"><?php _e( 'Sorry, we could not find anything that matched that. Try searching again.', 'twentytwelve' ); ?></p>
					<?php // get_search_form(); ?>
				</div><!-- .entry-content -->

				<?php endif; ?>

		</div>

		<div class="g one-third palm-one-whole">

			<div class="gw">
				<div class="g one-half lap-one-whole  palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-1' ) ) : ?>
			        <?php dynamic_sidebar( 'category-page-advert-1' ); ?>
					<?php endif; ?>
				</div>
				<div class="g one-half lap-one-whole  palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-2' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-2' ); ?>
					<?php endif; ?>
				</div>
				<div class="g one-half lap-one-whole  palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-3' ) ) : ?>
			        <?php dynamic_sidebar( 'category-page-advert-3' ); ?>
			        <?php endif; ?>
			    </div>
				<div class="g one-half lap-one-whole  palm-one-quarter mob-one-half">
				 	<?php
			        if ( is_active_sidebar( 'category-page-advert-4' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-4' ); ?>
			        <?php endif; ?>
				</div>
				<div class="g one-half  lap-one-whole palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-5' ) ) : ?>
			        <?php dynamic_sidebar( 'category-page-advert-5' ); ?>
			        <?php endif; ?>
			    </div>
				<div class="g one-half lap-one-whole  palm-one-quarter mob-one-half">
				 	<?php
			        if ( is_active_sidebar( 'category-page-advert-6' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-6' ); ?>
			        <?php endif; ?>
				</div>
				<div class="g one-half lap-one-whole  palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-7' ) ) : ?>
			        <?php dynamic_sidebar( 'category-page-advert-7' ); ?>
			        <?php endif; ?>
			    </div>
				<div class="g one-half  lap-one-whole  palm-one-quarter mob-one-half">
				 	<?php
			        if ( is_active_sidebar( 'category-page-advert-8' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-8' ); ?>
			        <?php endif; ?>
				</div>
				<div class="g one-half lap-one-whole palm-one-quarter mob-one-half">
				 	<?php
			        if ( is_active_sidebar( 'category-page-advert-9' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-9' ); ?>
			        <?php endif; ?>
				</div>
				<div class="g one-half  lap-one-whole  palm-one-quarter mob-one-half">
				 	<?php
			        if ( is_active_sidebar( 'category-page-advert-10' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-10' ); ?>
			        <?php endif; ?>
				</div>
				<div class="g one-half  lap-one-whole  palm-one-quarter mob-one-half">
				 	<?php
			        if ( is_active_sidebar( 'category-page-advert-11' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-11' ); ?>
			        <?php endif; ?>
				</div>
				<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-12' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-12' ); ?>
					<?php endif; ?>
				</div>
				<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-13' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-13' ); ?>
					<?php endif; ?>
				</div>
				<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-14' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-14' ); ?>
					<?php endif; ?>
				</div>
				<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-15' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-15' ); ?>
					<?php endif; ?>
				</div>
				<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-16' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-16' ); ?>
					<?php endif; ?>
				</div>
				<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-17' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-17' ); ?>
					<?php endif; ?>
				</div>
				<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-18' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-18' ); ?>
					<?php endif; ?>
				</div>
			</div>
				<div class="social-inline">
					<?php get_template_part('social'); ?>
				</div>

		</div>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
