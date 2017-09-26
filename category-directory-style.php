<?php
/*
 * Category Template: directory-style
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
    <div class="g two-fifths palm-one-whole">
        <div class="mf-directory-picks">
            <h2>Directory picks</h2>
            <?php // The Query
                wp_reset_query();
                global $wp_query;
                $term = $wp_query->queried_object;
                $args=array(
                    'ignore_sticky_posts' => true,
                    'posts_per_page' => 5,
                    'post_type' => 'directory',
                    'suppress_filters' => true,
                    // 'tag' => 'finest-picks',
                    'tax_query' => array(
                    array(
                        'taxonomy'  => $term->taxonomy,
                        'field'     => 'slug',
                        'terms'     => $term->slug,
                        )
                    )
                );
                $new_query = new WP_Query($args);
            ?>
            <?php while ( $new_query->have_posts()) : $new_query->the_post(); ?>
                <a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
                    <article <?php post_class('post-tile post-tile--horz'); ?>>
                        <?php
                            echo '<img src="';
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array('165','165'), true );
                                $thumbnail_url = $thumbnail_url[0];
                                echo ( !empty($thumbnail_url) ) ? $thumbnail_url : 'No thumb!';
                            echo '"/>';
                            ?>
                        <h3><?php the_title(); ?></h3>
                        <div class="intro">
                            <p><?php echo get_excerpt(80); ?></p>
                        </div>

                    </article>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
        <div class="g three-fifths palm-one-whole">
            <section class="latest-articles mf-directory-articles">
                <h2>Articles</h2>
                <div class="gw equal">
                    <!-- Normal Articles Loop -->
                    <?php if (have_posts()) : while (have_posts()) : the_post();
                         // if (in_array($post->ID, $do_not_duplicate)) continue;
                    ?>
                    <div class="g one-third lap-one-half palm-one-third mob-one-half">
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
                                <h3><?php the_title(); ?></h3>
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
