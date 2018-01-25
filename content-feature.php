<?php
/*
 * Template Name: Featured wide
 * Template Post Type: post, page, product
 */
get_header(); ?>
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
<article class="mf-article-featured" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mf-article-featured__image">
        <?php the_post_thumbnail('big-post-thumb'); ?>
    </div>
    <?php while ( have_posts() ) : the_post();
        echo "<header class='mf-article-featured__intro'>";
            echo "<h1>";
                echo apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) );
            echo "</h1>";
            echo "<div class='article-meta'>";
                echo "<time datetime=''>";
                    echo the_date();
                echo "</time>";
                echo "<div class='author'> By ";
                    echo the_author_posts_link();
                echo "</div>";
            echo "</div>";
            echo "<p class='lead'>";
                echo nl2br(get_the_excerpt());
            echo "</p>";
            echo "<div class='mf-article-featured__social'>";
                echo get_template_part('social-share');
            echo "</div>";
        echo "</header>";
        echo "<div class='col-nudge'>";
            echo "<div class='gw'>";
                echo "<div class='g three-fifths palm-one-whole'>";
                    echo "<div class='mf-article-featured__content'";
                        echo apply_filters( 'the_content', get_post_field( 'post_content', get_option( 'page_for_posts' ) ) );
                    echo "</div>";
                echo "</div>";
    endwhile; ?>
        <div class='g two-fifths palm-one-whole'>
            <section class="mf-article-featured-right">
            <div class="gw">
                <div class="g one-whole palm-one-whole mob-one-whole">
                <?php get_template_part('newsletter'); ?>
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
                <div class="g one-half lap-one-quarter palm-one-quarter mob-one-half">
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
            </section>
        </div>
        
    </div>
</div>
</article>
<?php get_footer(); ?>
