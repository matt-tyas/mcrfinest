<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="site-content">
	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
	<main class="gw">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="g one-whole palm-one-whole">

			<?php get_template_part( 'content-directory', get_post_format() ); ?>
		</div>
		<?php endwhile; // end of the loop. ?>
	</main>
</div><!-- #primary -->

<?php get_footer(); ?>
