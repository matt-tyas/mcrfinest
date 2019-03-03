<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
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
          <h1><?php single_cat_title(); ?></h1>
     </div>
</div>
<div class="gw row">
      <div class="g one-third palm-one-whole">
         <?php echo do_shortcode('[searchandfilter id="74989"]'); ?>
      </div>
      <div class="g two-thirds palm-one-whole">
         <section class="latest-articles mf-directory-articles" id="ajax-search">

             <div class="gw equal">
               <?php

                global $wp_query;
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                $term = $wp_query->queried_object;
                $args=array(
                    'ignore_sticky_posts' => true,
                    'post_type' => 'directory',
                    'suppress_filters' => true,
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
                wp_reset_query();
            ?>
            <?php while ( $new_query->have_posts()) : $new_query->the_post(); ?>
                 <div class="g one-third lap-one-half palm-one-third mob-one-half">
                    <a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
                        <article <?php post_class('post-tile'); ?>>
                            <?php
                                 $post_thumbnail_id = get_post_thumbnail_id( );
                                 $imagesized = wp_get_attachment_image_src( $post_thumbnail_id, 'big-post-thumb');
                                 if ($imagesized[1] > 308) {
                                    the_post_thumbnail('big-post-thumb');
                                 } else {
                                    the_post_thumbnail('cat-post-thumb');
                                 }
                            ?>
                            <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
                        </article>
                    </a>
                 </div>
            <?php endwhile; ?>
            </div>
          </section>
          <?php wp_pagenavi(); ?>
     </div>
 <?php get_footer(); ?>
