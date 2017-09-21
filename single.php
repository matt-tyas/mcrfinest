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

		<div class="gw">

            <div class="g one-tenth lap-one-fifth palm-one-whole">
				<div class="social-wrap">
					<aside class="social-links is--sticky">
						<h5 class="sub-title">Share this</h5>
						<ul class="social social-share">
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

			<div class="g six-tenths lap-four-fifths palm-one-whole f-article">

				<?php
					global $post;
					$compare_date = strtotime( "2017-08-29" );
					$post_date    = strtotime( $post->post_date );

					if ( $compare_date > $post_date  ) {

						// Old posts

						while ( have_posts() ) : the_post();

					    if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();

						get_template_part( 'content', get_post_format() );

						endwhile; // end of the loop.

					} else {

						// New format posts

						while ( have_posts() ) : the_post();

						if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();

					    echo "<h1>";
							echo apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) );
						echo "</h1>";

                        echo "<div class='article-meta'>";
                        echo "<time datetime='2012-02-17'>";
                            echo the_date();
                        echo "</time>";
                            echo "<div class='author'> By ";
                                echo the_author_posts_link();
                            echo "</div>";
                        echo "</div>";

						echo "<p class='lead'>";
							echo nl2br(get_the_excerpt());
						echo "</p>";

						echo apply_filters( 'the_content', get_post_field( 'post_content', get_option( 'page_for_posts' ) ) );

						endwhile; // end of the loop.

					}

				?>

				<h3>Related to <?php the_title(); ?></h2>
				<?php if (function_exists('related_posts') ) : related_posts(); endif; ?>

			</div>

			<div class="g three-tenths lap-one-whole palm-one-whole readability-right f-article">

                <div class="gw">
					<div class="g one-whole palm-one-whole mob-one-whole">
					<?php get_template_part('newsletter'); ?>

					<div class="g one-whole palm-one-whole mob-one-whole">
						<h5 class="sub-title ad-title">Partners</h5>
					</div>

					<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-1' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-1' ); ?>
						<?php endif; ?>
					</div>

					<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-2' ) ) : ?>
						<?php dynamic_sidebar( 'category-page-advert-2' ); ?>
						<?php endif; ?>
					</div>

					<div class="g one-half lap-one-quarter  palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-3' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-3' ); ?>
				        <?php endif; ?>
				    </div>

					<div class="g one-half lap-one-quarter  palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-4' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-4' ); ?>
				        <?php endif; ?>
					</div>

					<div class="g one-half lap-one-quarter   palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-5' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-5' ); ?>
				        <?php endif; ?>
				    </div>

					<div class="g one-half lap-one-quarter  palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-6' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-6' ); ?>
				        <?php endif; ?>
					</div>

					<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-7' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-7' ); ?>
				        <?php endif; ?>
				    </div>

					<div class="g one-half lap-one-quarter  palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-8' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-8' ); ?>
				        <?php endif; ?>
					</div>

					<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
						<?php
						if ( is_active_sidebar( 'category-page-advert-9' ) ) : ?>
				        <?php dynamic_sidebar( 'category-page-advert-9' ); ?>
				        <?php endif; ?>
				    </div>

					<div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
					 	<?php
				        if ( is_active_sidebar( 'category-page-advert-10' ) ) : ?>
                        <?php dynamic_sidebar( 'category-page-advert-10' ); ?>
				        <?php endif; ?>
					</div>

					<div class="g one-whole lap-one-half palm-one-half mob-one-half">
						<div class="sticky-spacer">
							<div class="ad-sense ad--sticky">
			 	        		<h5 class="sub-title ad-title">Advert</h5>
			 					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			 					<!-- Home responsive 1 -->
			 					<ins class="adsbygoogle"
			 					     style="display:block"
			 					     data-ad-client="ca-pub-0654331869436657"
			 					     data-ad-slot="6377296206"
			 					     data-ad-format="auto"></ins>
			 					<script>
			 					(adsbygoogle = window.adsbygoogle || []).push({});
			 					</script>
			 				</div>
						</div>
					</div>


				</div>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
