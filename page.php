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
				<?php get_template_part('includes/social-share'); ?>
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
                <div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-19' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-19' ); ?>
					<?php endif; ?>
				</div>
				<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					<?php
					if ( is_active_sidebar( 'category-page-advert-20' ) ) : ?>
					<?php dynamic_sidebar( 'category-page-advert-20' ); ?>
					<?php endif; ?>
				</div>
                <div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
                    <?php
                    if ( is_active_sidebar( 'category-page-advert-21' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-21' ); ?>
                    <?php endif; ?>
                </div>
                <div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
                    <?php
                    if ( is_active_sidebar( 'category-page-advert-22' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-22' ); ?>
                    <?php endif; ?>
                </div>
                <div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
                    <?php
                    if ( is_active_sidebar( 'category-page-advert-23' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-23' ); ?>
                    <?php endif; ?>
                </div>
                <div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
                    <?php
                    if ( is_active_sidebar( 'category-page-advert-24' ) ) : ?>
                    <?php dynamic_sidebar( 'category-page-advert-24' ); ?>
                    <?php endif; ?>
                </div>
			</div>
		</div>
	</div>
</div><!-- #primary -->
<?php get_footer(); ?>
