<?php ?>
		      </div>
		</main><!-- #main .wrapper -->
	</div>
		<footer role="contentinfo" id="footer">
			<div class="gw">
				<div class="page">
					<div class="g two-fifths palm-one-whole">
						<h5 class="sub-title">Thank you for your support</h5>
						<div class="footer-text">
							<p>
								There a just a few of us doing this because Manchester is the city we love. Along with our talented contributors we will continue to bring you  the best and brightest Manchester has to offer.
							</p>
						</div>
					</div>
					<div class="g one-fifth palm-one-whole">
						<h5 class="sub-title">Get involved</h5>
						<?php wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'menu_class' => 'nav nav--stacked' )); ?>
					</div>
					<div class="g one-fifth palm-one-half">
						<?php
							if ( is_active_sidebar( 'site-sponsor-3' ) ) : ?>
							<?php dynamic_sidebar( 'site-sponsor-3' ); ?>
						<?php endif; ?>
					</div>
					<div class="g one-fifth palm-one-half">
						<div class="social-inline">
							<?php get_template_part('social'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="nav footer-nav">
				<div class="gw">
					<div class="page">
						<div class="g one-whole">
							<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'nav nav--banner' )); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<?php
	// if(is_front_page()){
    //   // Nothing
	// }
	// else{
	// 	echo '<a href="#" class="finder-trigger-inner"><span aria-hidden="true" data-icon="&#x260c;"></span> Find things to do in&nbsp;Manchester</a>';
	// 	echo '<section class="mf-directory-search-inner">';
	// 	   echo '<div class="gw">';
	// 	        echo '<div class="g one-whole lap-one-whole palm-one-whole">';
	// 	            echo '<div class="mf-section mf-directory-search-home mf-directory-search--directory">';
	//                     dynamic_sidebar( 'directory-search' );
	// 					echo '<a href="#" class="finder-close-trigger-inner"><span aria-hidden="true" data-icon="&#x2612;"></span> Close</a>';
	// 	            echo '</div>';
	// 	        echo '</div>';
	// 	    echo '</div>';
	// 	echo '</section>';
	// 	}
	?>
</div><!-- #page -->
<?php wp_footer(); ?>
<!--[if (lt IE 9) & (!IEMobile)]>
<script src="<?php echo get_template_directory_uri(); ?>/js/libs/imgsizer-min.js"></script>
<![endif]-->
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/selectivizr-min.js"></script>
<![endif]-->
<!-- Plugins -->
<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
<!-- Scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
</body>
</html>
