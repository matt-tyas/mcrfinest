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
		<div class="gw" role="main">

			<div class="g two-thirds palm-one-whole">

				<?php while ( have_posts() ) : the_post(); ?>

				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; // end of the loop. ?>

				<h3>Related to <?php the_title(); ?></h2>
				<?php if (function_exists('related_posts') ) : related_posts(); endif; ?>

			</div>

			<div class="g one-third palm-one-whole readability-right">

				<aside class="social-links">
					<h5 class="sub-title">Share this on&hellip;</h5>
					<ul class="nav nav--banner">
						<li>
						<a title="<?php the_title(); ?>" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>source=tweetbutton&amp;text=<?php the_title(); ?> <?php the_permalink(); ?>&amp;url=<?php the_permalink(); ?>&amp;<?php the_permalink(); ?>via=Manchesters_Finest" target="_blank" rel="nofollow" class="btn btn--twitter">Twitter</a>
						</li>
						<li><a title="<?php the_title(); ?>" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="nofollow" class="btn btn--facebook">Facebook</a></li>
						<li><a class="btn btn--finest" href="mailto:?subject=Article from Manchester's Finest - <?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" title="Send to a friend">Email</a></li>
					</ul>
				</aside>

                <div class="gw">
					<div class="g one-whole palm-one-half mob-one-whole">
						<div class="newscta">
								<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
								<style type="text/css">
								#mce-responses { position: fixed; top: 0px; left: 0; width: 100%; }
								#mc_embed_signup div.response { width: 100%; text-align: center;  padding: 1.5em 1em 1em 1em; }
								#mc_embed_signup #mce-success-response { background: #529214; color: #fff;}
								#mc_embed_signup #mce-error-response { background: #CE0000; color: #fff;}
								#mc_embed_signup div#mce-responses { z-index:9999; }
								#mc_embed_signup #mc-embedded-subscribe-form input.mce_inline_error { border: 1px solid #e85c41; }
								#mc_embed_signup .mc-field-group input { opacity: 1;}
								#mc_embed_signup .button { background: #886808; font-size: 20px; }
								#mc_embed_signup .button:hover { background: #b88d0b; }
								#mc_embed_signup .mc-field-group { min-height:60px; }
								#mc_embed_signup form {padding: 0;}
								#mc_embed_signup #mc-embedded-subscribe-form div.mce_inline_error { border: 1px solid #CE0000; }
								</style>
								<div id="mc_embed_signup">
								<form action="//ManchestersFinest.us2.list-manage.com/subscribe/post?u=80f2869a6d1828e3a9de6548f&amp;id=3b2131b21e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
									<div id="mc_embed_signup_scroll">
									<div class="mc-field-group">
										<h4 role="label" for="mce-EMAIL" id="fit-brand" class="brandface-title">GET THE NEWSLETTER</h4>
										<p>Offers, competitions and Mcr news</p>
										<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter your email">
										<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_80f2869a6d1828e3a9de6548f_3b2131b21e" tabindex="-1" value=""></div>
									   <input type="submit" value="Sign up" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
									</div>
										<div id="mce-responses" class="clear">
											<div class="response" id="mce-error-response" style="display:none"></div>
											<div class="response" id="mce-success-response" style="display:none"></div>
										</div>
									</div>
								</form>
							</div>
								<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
						</div>

					<div class="g one-whole palm-one-whole mob-one-whole">
						<h5 class="sub-title ad-title">Partners</h5>
					</div>

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

				</div>

				<div class="ad-sense">
					<h5 class="sub-title ad-title">Advert</h5>
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Article Custom size 2 -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:430px;height:430px"
					     data-ad-client="ca-pub-0654331869436657"
					     data-ad-slot="1388693406"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
