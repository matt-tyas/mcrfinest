<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<div class="gw row">

	<div class="g two-thirds  palm-one-whole">


<article class="f-article media" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<h1><?php the_title(); ?></h1>
		<?php else : ?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="media__img search--img">
		<?php
			$post_thumbnail_id = get_post_thumbnail_id( );
			$imagesized = wp_get_attachment_image_src( $post_thumbnail_id, 'big-post-thumb');
			if ($imagesized[1] == 224) {
				the_post_thumbnail('big-post-thumb');
			} else {
				the_post_thumbnail('cat-post-thumb');
			}
		?>
	</div>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

		<?php else : ?>

				<div id="article-content" class="entry-content">
	                <h2 class="alpha"><?php the_excerpt(); ?></h2>
	                <div class="directory-image">
						<?php echo wp_get_attachment_image( listing_image_get_meta('_listing_image_id'), 'full'); ?>
					</div>
				</div>
				<div class="gw row">
			        <div class="g two-thirds palm-one-whole">
						<?php the_content(); ?>
					</div>
					<div class="g one-third palm-one-whole">
						<div class="directory__address">
							<?php the_title(); ?>
							<?php $og_text = get_post_meta($post->ID, 'directory_address_meta_box_class', true);
								echo wpautop( $og_text );
							?>
							<a href="<?php echo get_post_meta($post->ID, 'directory_url_meta_box_class', true); ?>">
							<?php $og_text_2 = get_post_meta($post->ID, 'directory_url_meta_box_class', true);
								echo preg_replace("~^(?:f|ht)tps?://~i", '', $og_text_2);
							?>
							</a>
						</div>
					</div>
				</div>
                <div class="gw row">
			        <div class="g palm-one-whole">
                        <h2>Latest <?php the_title(); ?> articles</h2>
                        <?php if (function_exists('related_posts') ) : related_posts(); endif; ?>
                    </div>
                </div>
			</div>

			<?php endif; ?>

			<div class="g one-third palm-one-whole readability-right">

				<aside class="social-links">
					<h5 class="sub-title">// Share this on&hellip;</h5>
					<ul class="nav nav--banner">
						<li>
						<a title="<?php the_title(); ?>" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>source=tweetbutton&amp;text=<?php the_title(); ?> <?php the_permalink(); ?>&amp;url=<?php the_permalink(); ?>&amp;<?php the_permalink(); ?>via=Manchesters_Finest" target="_blank" rel="nofollow" class="btn btn--twitter">Twitter</a>
						</li>
						<li><a title="<?php the_title(); ?>" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="nofollow" class="btn btn--facebook">Facebook</a></li>
						<li><a class="btn btn--finest" href="mailto:?subject=Article from Manchester's Finest - <?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" title="Send to a friend">Email</a></li>
					</ul>
				</aside>

				<div class="ad-sense">
					<h5 class="sub-title ad-title">// Advert</h5>
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Article Custom size 2 -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:248px;height:248px"
					     data-ad-client="ca-pub-0654331869436657"
					     data-ad-slot="1388693406"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>

			</div>

			<div class="g one-quarter palm-one-whole">

				<div class="gw">
					<div class="g one-whole palm-one-whole mob-one-whole">
						<h5 class="sub-title ad-title">// Partners</h5>
					</div>
					<div class="g one-whole palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-1' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-1' ); ?>
						<?php endif; ?>
					</div>

					<div class="g one-whole palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-2' ) ) : ?>
						<?php dynamic_sidebar( 'category-page-advert-2' ); ?>
						<?php endif; ?>
					</div>

					<div class="g one-whole palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-3' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-3' ); ?>
				        <?php endif; ?>
				    </div>

					<div class="g one-whole palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-4' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-4' ); ?>
				        <?php endif; ?>
					</div>

					<div class="g one-whole palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-5' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-5' ); ?>
				        <?php endif; ?>
				    </div>

					<div class="g one-whole palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-6' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-6' ); ?>
				        <?php endif; ?>
					</div>

					<div class="g one-whole palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-7' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-7' ); ?>
				        <?php endif; ?>
				    </div>

					<div class="g one-whole palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-8' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-8' ); ?>
				        <?php endif; ?>
					</div>

					<div class="g one-whole palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-9' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-9' ); ?>
				        <?php endif; ?>
				    </div>

					<div class="g one-whole palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-10' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-10' ); ?>
				        <?php endif; ?>
					</div>

				</div>

			</div>


		</div>

</article><!-- #post -->
