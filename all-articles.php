<?php
/*
 * Template Name: all-articles
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

<div class="gw row">
    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
    <h1>All articles</h1>
        <section class="latest-articles mf-directory-articles">
            <div class="gw equal">
                <!-- Normal Articles Loop -->
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'paged' => get_query_var('paged')
                            );
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                            query_posts(array(
                               'posts_per_page' => 8,
                               'paged' => $paged
                              )
                            );

                            $post_query = new WP_Query($args);
                            if($post_query->have_posts() ) {

                              while($post_query->have_posts() ) { $post_query->the_post(); ?>

                                <div class="g one-quarter lap-one-third palm-one-third mob-one-half">
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
                                            <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
                                        </article>
                                    </a>
                                </div>

                                <?php } } ?>
                </div>
            </section>
            <h3>More articles</h3>
            <?php wp_pagenavi(); ?>

    </div>
</div>
<?php get_footer(); ?>
