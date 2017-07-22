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
    <div class="g one-tenth lap-one-fifth palm-one-whole">
        <div class="social-wrap">
            <aside class="social-links">
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

	<div class="g six-tenths lap-four-fifths palm-one-whole f-article">
        <article class="media" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
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
        			if ($imagesized[1] == 308) {
        				the_post_thumbnail('big-post-thumb');
        			} else {
        				the_post_thumbnail('cat-post-thumb');
        			}
        		?>
        	</div>
        	<div class="entry-summary">
        		<p><?php echo get_excerpt(140); ?></p>
        	</div>
        		<?php else : ?>
        				<div id="article-content" class="entry-content">
        	                <p class="lead"><?php echo nl2br(get_the_excerpt()) ?></p>
        	                <div class="directory-image">
                                <?php $hasSlider = get_post_meta( $post->ID, 'directory_slider_meta_box_class', true ); ?>

                                <?php if(!($hasSlider == null || $hasSlider == '')){
                                        echo do_shortcode( get_post_meta($post->ID, 'directory_slider_meta_box_class', true) );
                                    }
                                    else {
                                        echo wp_get_attachment_image( listing_image_get_meta('_listing_image_id'), 'full');
                                } ?>
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
        					<div class="g one-whole">

        						<div class="cf" style="width: 100%; overflow:visible; display: block; clear: both; padding: 0px;">
        						<h2>Latest <?php the_title(); ?> articles</h2>
        						<?php if (function_exists('related_posts') ) : related_posts(); endif; ?>
								</div>
        					</div>

        				</div>
        			</div>
        			<?php endif; ?>

        			<div class="g three-tenths lap-one-whole palm-one-whole readability-right f-article">
        				<div class="gw">
                            <div class="g one-whole palm-one-whole mob-one-whole">
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
        					     style="display:inline-block;width:250px;height:250px"
        					     data-ad-client="ca-pub-0654331869436657"
        					     data-ad-slot="1388693406"></ins>
        					<script>
        					(adsbygoogle = window.adsbygoogle || []).push({});
        					</script>
        				</div>
        			</div>
        		</div>
        </article><!-- #post -->
    </div>
</div>
