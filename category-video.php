<?php
/*
 * Category Template: video-style
 *
 */
?>

<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
<div class="gw row">
    <div class="g one-whole palm-one-whole">
        <h1 class="left-title"><?php single_cat_title(); ?> series</h1>
        <a class="icon-you-tube" href="https://www.youtube.com/channel/UC3vsqrPJWduz1vw3Kw0dEkg/?sub_confirmation=1" target="_blank" rel="nofollow">
            <span>Subscribe to Finest on You Tube</span>
        </a>
    </div>
    <div class="g one-whole palm-one-whole">
        <section class="latest-articles mf-directory-articles">
            <div class="gw">
                <?php
                    $video_cat_ID = get_cat_ID( 'video' );
                    $video_cats   = get_categories( "parent=$video_cat_ID" );
                    $video_query  = new WP_Query;
                    foreach ( $video_cats as $video_cat ) :
                    $video_query->query( array(
                        'cat'                 => $video_cat->term_id,
                        'posts_per_page'      => 1,
                        'no_found_rows'       => true,
                        'ignore_sticky_posts' => true,
                    ));
                ?>
                    <?php while ( $video_query->have_posts() ) : $video_query->the_post() ?>
                        <div class="g one-quarter lap-one-third palm-one-half mob-one-whole">
                            <?php $catID = get_the_category(); ?>
                            <a href="<?php echo esc_url( get_category_link( $catID[0] ) ); ?>">
                                <?php
                                echo '<article class="post-tile mf-pop ';
                                    if(has_category( 'mEats' )) {
                                        echo 'mf-pop--meats">';
                                    }if(has_category( 'Signature Dish' )) {
                                        echo 'mf-pop--signature">';
                                    }elseif(has_category( '' )) {
                                        echo '';
                                    }
                                ?>
                                <div class="mf-pop__logo">
                                    <?php
                                    if(has_category( 'mEats' )) {
                                        echo '<img src="';
                                        echo get_bloginfo('template_url');
                                        echo '/images/video/mEats.svg"/>';
                                    }if(has_category( 'Signature Dish' )) {
                                        echo '<img src="';
                                        echo get_bloginfo('template_url');
                                        echo '/images/video/signature-dish.svg"/>';
                                    }elseif(has_category( '' )) {

                                    }?>
                                </div>
                                <div class="mf-pop__desc">
                                    <?php echo category_description( $catID[0] ); ?>
                                </div>
                                </article>
                            </a>
                        </div>
                    <?php endwhile ?>
                <?php endforeach ?>
            </div>
        </section>
    </div>
</div>
<?php get_footer(); ?>
