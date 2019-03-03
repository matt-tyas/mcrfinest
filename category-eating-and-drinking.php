<?php
/*
 * Category Template: eating-and-drinking
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
    <div class="g one-third palm-one-whole">
        <section class="mf-directory-articles">
            <h2>Find</h2>
            <?php
               $terms = get_terms( 'business_types', 'parent=1065' );
               $count = count($terms);
               if ( $count > 0 ){
                echo '<ul class="nav nav--stacked directory-nav">';
                foreach ( $terms as $term ) {
                  echo '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
                }
                echo '</ul>';
               }
            ?>
        </section>
    </div>
    <div class="g two-thirds palm-one-whole">
        <section class="latest-articles mf-directory-articles">
            <h2>Latest in Eating and Drinking</h2>
            <div class="gw equal">
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
<?php get_footer(); ?>
