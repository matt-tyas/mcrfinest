<div class="social-wrap">
    <aside class="social-links is--sticky">
        <h5 class="sub-title">Share this</h5>
        <ul class="social social-share">
            <li>
                <a class="btn-circle btn--secondary twitter" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>source=tweetbutton&amp;text=<?php the_title(); ?> <?php the_permalink(); ?>&amp;<?php the_permalink(); ?>" target="_blank" rel="nofollow"><span aria-hidden="true" class="icon-twitter"></span><span class="accessibility">Share article on Twitter</span></a>
            </li>
            <li>
                <a class="btn-circle btn--secondary facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="nofollow"><span aria-hidden="true" class="icon-facebook"></span><span class="accessibility">Share article on Facebook</span></a>
            </li>
            <li class="mobile-only">
                <a class="btn-circle btn--secondary whatsapp" href="whatsapp://send?text=<?php the_title(); ?> <?php the_permalink(); ?>" data-action="share/whatsapp/share" target="_blank" rel="nofollow">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/whatsapp.svg" alt="whatsapp logo" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/images/icons/whatsapp.png'">
                <span class="accessibility">Share article via Whatsapp</span></a>
            </li>
            <li>
                <a class="btn-circle btn--secondary instagram" href="mailto:?subject=Article from Manchester's Finest - <?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" target="_blank" title="Follow on Instagram"><span aria-hidden="true" class="icon-envelope"></span><span class="accessibility">Share article on email</span></a>
            </li>
        </ul>
    </aside>
</div>
