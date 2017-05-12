<!-- <div class="g two-thirds palm-one-whole">
    <?php $do_not_duplicate = array();  ?>
    <?php
        $my_query = new WP_Query('tag=mf-home&posts_per_page=1');
        while ($my_query->have_posts()) : $my_query->the_post();
        $do_not_duplicate[] = $post->ID;
    ?>
        <article class="featured-home-media">
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php
                $videoLink = get_the_post_video_url( $post->ID );
                $videoPost = the_post_video( $size );
                $videoFlag = has_post_video( $post->ID );
                $videoPost = get_the_post_video( $post->ID, $size );
                $videoImgLink = get_the_post_video_image_url( $post->ID );
                $videoImg = get_the_post_video_image( $post->ID );
            ?>
            <?php elseif (get_the_post_video_url($post->ID) ) : ?>
            <?php endif; ?>
            <a href="<?php the_permalink() ?>" rel="bookmark">
                <div class="excerpt">
                    <h3 class="beta"><?php the_title(); ?></h3>
                    <div class="intro">
                        <p><?php echo get_excerpt(140); ?></p>
                    </div>
                </div>
            </a>
        </article>
    <?php endwhile; ?>
</div> -->

<!-- <div class="g one-whole palm-one-whole">
    <div class="mf-latest-articles">
        <h3 class="delta">Latest articles</h3>
        <?php
            $my_query = new WP_Query('cartegory=articles&posts_per_page=5');
            while ($my_query->have_posts()) : $my_query->the_post();
            $do_not_duplicate[] = $post->ID;
        ?>
        <h4 class="gamma"><?php the_title(); ?></h4>
        <?php endwhile; ?>
    </div>
</div> -->
