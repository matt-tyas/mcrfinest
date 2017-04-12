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

    <!-- <?php // The Query
        global $wp_query;

        $term = $wp_query->queried_object;

        // $do_not_duplicate = array();

        $args=array(
            'posts_per_page' => -1,
            'post_type' => 'directory',
            'suppress_filters' => true,
            'tag' => 'finest-pick',
            'tax_query' => array(
                    array(
                        'taxonomy'  => $term->taxonomy,
                        'field'     => 'slug',
                        'terms'     => $term->slug,
                        )
                    )
            );
        $new_query = new WP_Query($args);
    ?> -->

    <!-- <div class="g one-third palm-one-whole">

        <h1><?php single_cat_title(); ?></h1>
        <h2>Finest picks</h2>
        <ul>
            <?php if ( $new_query->have_posts()) : $new_query->the_post(); $do_not_duplicate[] = $post->ID; ?>
            <li <?php post_class(''); ?>>
                 <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
            </li>
            <?php wp_reset_postdata(); else : ?>
            <li>No picks as yet&hellip;</li>
            <?php endif; ?>
        </ul>
        <h3>A-Z <?php single_cat_title(); ?> directory</h3>
        <?php // The Query
            global $wp_query;

            $term = $wp_query->queried_object;

            $args=array(
                'posts_per_page' => -1,
                'post_type' => 'directory',
                'order' => 'ASC',
                'suppress_filters' => true,
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
        <ul>
            <?php if ( $new_query->have_posts()) : $new_query->the_post();
                  // if (in_array($post->ID, $do_not_duplicate)) continue; ?>
            <li <?php post_class(''); ?>>
                 <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
            </li>
            <?php wp_reset_postdata(); else : ?>
            <li>No A-Z as yet&hellip;</li>
            <?php endif; ?>
        </ul>
    </div> -->
    <div class="g one-whole palm-one-whole">
        <section class="latest-articles">
            <h1><?php single_cat_title(); ?></h1>
            <!-- <h2>Articles</h2> -->
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
                        if ($imagesized[1] == 308) {
                            the_post_thumbnail('big-post-thumb');
                        } else {
                            the_post_thumbnail('cat-post-thumb');
                        }
                    ?>
                    <h3><?php the_title(); ?></h3>
                    <div class="intro">
                        <p><?php echo get_excerpt(140); ?></p>
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
