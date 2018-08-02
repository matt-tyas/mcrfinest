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
                <span>Subscribe to Finest on YouTube</span>
            </a>
        </div>
        <div class="g one-whole palm-one-whole">
            <section class="latest-articles mf-directory-articles">
                <div class="gw">
                    Test.
                </div>
            </section>
        </div>
    </div>
<?php get_footer(); ?>
