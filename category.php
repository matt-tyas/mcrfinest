<?php
/*
 * Category Template: category
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
        <h1><?php single_cat_title(); ?></h1>
    </div>
    <div class="g one-whole palm-one-whole">
        <section class="latest-articles mf-directory-articles">
            <div class="gw equal">
                <!-- Normal Articles Loop -->
               <?php if (have_posts()) : while (have_posts()) : the_post();
                     //if (in_array($post->ID, $do_not_duplicate)) continue;
                ?>
                    <div class="g one-quarter lap-one-half palm-one-third mob-one-half">
                        <a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
                            <article <?php post_class('post-tile'); ?>>
                                <?php
                                    $post_thumbnail_id = get_post_thumbnail_id( );
                                    $imagesized = wp_get_attachment_image_src( $post_thumbnail_id, 'big-post-thumb');
                                    if ($imagesized[1] == 308) {
                                        the_post_thumbnail('big-post-thumb');
                                    } else {
                                        the_post_thumbnail('cat-post-thumb');
                                    }
                                ?>
                                <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 6 , '&hellip;'); ?></h3>
                                <div class="intro">
                                    <p><?php echo get_excerpt(80); ?></p>
                                </div>
                            </article>
                        </a>
                    </div>
                <?php endwhile; endif; ?>
                </div>
            </section>
            <h3>More articles</h3>
            <?php wp_pagenavi(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
