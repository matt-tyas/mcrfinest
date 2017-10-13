<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<div class="gw">
		<div class="site-content">
            <div class="g one-tenth lap-one-fifth palm-one-whole">
				<div class="social-wrap">
					<aside class="social-links is--sticky">
						<h5 class="sub-title">Share this</h5>
						<ul class="nav social social-share">
							<li>
								<a class="btn-circle btn--secondary twitter" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>source=tweetbutton&amp;text=<?php the_title(); ?> <?php the_permalink(); ?>&amp;<?php the_permalink(); ?>" target="_blank" rel="nofollow"><span aria-hidden="true" class="icon-twitter"></span><span class="accessibility">Share article on Twitter</span></a>
							</li>
							<li>
								<a class="btn-circle btn--secondary facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="nofollow"><span aria-hidden="true" class="icon-facebook"></span><span class="accessibility">Share article on Facebook</span></a>
							</li>
							<li>
								<a class="btn-circle btn--secondary instagram" href="mailto:?subject=Article from Manchester's Finest - <?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" target="_blank" title="Follow on Instagram"><span aria-hidden="true" class="icon-envelope"></span><span class="accessibility">Share article on email</span></a>
							</li>
						</ul>
					</aside>
				</div>
			</div>
			<div class="g six-tenths palm-one-whole">
				<div class="f-article media">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<div class="g three-tenths lap-two-tenths palm-one-whole">
			<h5 class="sub-title ad-title">Partners</h5>
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
			</div>
		</div>
	</div>
</div><!-- #primary -->
<?php get_footer(); ?>
