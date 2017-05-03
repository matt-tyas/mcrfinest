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
        <section class="latest-articles">
            <h1><?php single_cat_title(); ?></h1>
            <div id="sort-container">
                <!-- Normal Articles Loop -->
               <?php if (have_posts()) : while (have_posts()) : the_post();
                     //if (in_array($post->ID, $do_not_duplicate)) continue;
                ?>
                <article <?php post_class('post-tile'); ?>>
                    <a href="<?php the_permalink() ?>" rel="bookmark">
                    <?php
                        $post_thumbnail_id = get_post_thumbnail_id( );
                        $imagesized = wp_get_attachment_image_src( $post_thumbnail_id, 'big-post-thumb');
                        if ($imagesized[1] == 224) {
                            the_post_thumbnail('big-post-thumb');
                        } else {
                            the_post_thumbnail('cat-post-thumb');
                        }
                    ?>
                    <h3><?php the_title(); ?></h3>
                    <div class="intro">
                        <?php the_excerpt(); ?>
                    </div>
                    </a>
                </article>
                <?php endwhile; endif; ?>
            </section>
            <?php wp_pagenavi(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
