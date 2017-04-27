<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article class=" media" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>


			<?php if ( is_single() ) : ?>

			<h1><?php the_title(); ?></h1>

			<?php else : ?>
			<h2><?php the_title(); ?></h2>

			<?php endif; // is_single() ?>


		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="media__img search--img">
			<?php
				$post_thumbnail_id = get_post_thumbnail_id( );
				$imagesized = wp_get_attachment_image_src( $post_thumbnail_id, 'big-post-thumb');
				if ($imagesized[1] == 308) {
					the_post_thumbnail('big-post-thumb');
				} else {
					the_post_thumbnail('cat-post-thumb');
				}
			?>
		</div>
		<div class="entry-summary">
			<p><?php echo get_excerpt(140); ?></p>
		</div><!-- .entry-summary -->

		<?php else : ?>
		<div id="article-content" class="entry-content">

            <div class="article-meta">
                <time datetime="2012-02-17"><?php the_date(); ?></time>
                <div class="author">By <?php the_author_posts_link(); ?></div>
            </div>

			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>

			<footer class="entry-meta">
				<?php the_category(); ?>
				<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
					<div class="author-info media">
						<div class="author-avatar media__img">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 120 ) ); ?>
						</div><!-- .author-avatar -->
						<div class="author-description">
							<h2><?php printf( __( '%s', 'twentytwelve' ), get_the_author() ); ?></h2>
							<p><?php the_author_meta( 'description' ); ?></p>
							<div class="author-link">
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
									<?php printf( __( 'View all articles by %s', 'twentytwelve' ), get_the_author() ); ?>
								</a>
							</div><!-- .author-link	-->
						</div><!-- .author-description -->
					</div><!-- .author-info -->
				<?php endif; ?>
			</footer><!-- .entry-meta -->

			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>


	</article><!-- #post -->
	
