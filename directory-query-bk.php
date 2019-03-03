<div class="mf-directory-picks">
    <h2>Directory</h2>
    <?php // The Query
        wp_reset_query();
        global $wp_query;
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $term = $wp_query->queried_object;
        $args=array(
            'ignore_sticky_posts' => true,
            'posts_per_page' => 3,
            'post_type' => 'directory',
            'suppress_filters' => true,
            'tag' => 'directory-top-3',
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
