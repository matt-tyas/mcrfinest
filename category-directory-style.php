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
        <div class="gw row">
            <div class="g one-half palm-one-whole">
                <h1><?php single_cat_title(); ?> in Manchester</h1>
                <p>Finest is all about bringing you Manchester's best restaurants and bars. Choosing where to go to eat in Manchester can be a daunting task so we're trying to make that easier for you. Try our directory search to find somewhere to eat and drink in Manchester or browse our reviews and articles.</p>
            </div>
            <div class="g one-half palm-one-whole">
                <div class="mf-section mf-grey mf-directory-search-home mf-directory-search--directory">
                    <h3 class="mf-label"><a href="<?php echo get_site_url(); ?>/find/" class="mf-label__link">Find somewhere to eat in Manchester</a></h3>
                    <?php
                        if ( is_active_sidebar( 'directory-search' ) ) : ?>
                        <?php dynamic_sidebar( 'directory-search' ); ?>
                    <?php endif; ?>
                    <a href="#" class="finder-close-trigger"><span aria-hidden="true" data-icon="&#x2612;"></span> Close</a>
                </div>
            </div>
        </div>
    </div>

    <div class="g one-half palm-one-whole">
        <div class="mf-directory-picks">
            <h2>Directory</h2>
            <?php // The Query
                wp_reset_query();
                global $wp_query;
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                $term = $wp_query->queried_object;
                $args=array(
                    'ignore_sticky_posts' => true,
                    'posts_per_page' => 26,
                    'post_type' => 'directory',
                    'suppress_filters' => true,
                    // 'tag' => 'finest-picks',
                    'paged' => get_query_var('paged'),
                    'tax_query' => array(
                    array(
                        'taxonomy'  => $term->taxonomy,
                        'field'     => 'slug',
                        'terms'     => $term->slug,
                        'paged'     => $paged
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
                        <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 6 , '&hellip;'); ?></h3>
                        <div class="intro">
                            <p><?php echo get_excerpt(80); ?></p>
                            <?php
                            // $categories = get_the_category();
                            //     if ( ! empty( $categories ) ) {
                            //         echo esc_html( $categories[0]->name );
                            //     }
                            ?>
                        </div>
                    </article>
                </a>
            <?php endwhile; ?>
        </div>

    </div>
        <div class="g one-half palm-one-whole">
            <section class="latest-articles mf-directory-articles">
                <h2>Articles</h2>
                <div class="gw equal">
                    <!-- Normal Articles Loop -->
                    <?php if (have_posts()) : while (have_posts()) : the_post();
                         // if (in_array($post->ID, $do_not_duplicate)) continue;
                    ?>
                    <div class="g one-half lap-one-half palm-one-third mob-one-half">
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
                    <?php endwhile; endif; ?>
                </div>
            </section>
        </div>
        <div class="gw row">
            <div class="g one-whole palm-one-whole">
                <?php wp_pagenavi(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
