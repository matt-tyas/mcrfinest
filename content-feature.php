<?php
/*
 * Template Name: Featured wide
 * Template Post Type: post, page, product
 */
 get_header();
?>

<article class="mf-article-featured" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mf-article-featured__image">
        <?php the_post_thumbnail('big-post-thumb'); ?>
    </div>
    <div class="mf-article-featured__intro">
        <h1><?php the_title(); ?></h1>
        <p><?php echo get_the_excerpt(); ?></p>
    </div>




</article><!-- #post -->

<?php get_footer(); ?>
