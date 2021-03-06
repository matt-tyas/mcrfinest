<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

 if(is_front_page()){
     get_header('home');
 }
 else{
     get_header();
 }
 ?>

<div class="g one-whole">
	<div id="content">
        <h1 class="accessibility">Manchester's Finest and the Northern Quarter</h1>
        <h2 class="accessibility">Restaurants, Bars, Offers and Competitions in Manchester</h2>
		<section class="featured-home">
			<div class="gw">
				<div class="g six-twelfths palm-one-whole">
					<article class="featured-home__super">
						<?php if( get_field('main_video', 'option') ): ?>
							<div class="featured-home__image featured-home__image--video-thumb">
								<?php
									$video = get_field('main_video', 'option'); // Embed Code
								    $video_url = get_field('main_video', 'option', FALSE, FALSE); // URL
							  	    $video_thumb_url = get_video_thumbnail_uri($video_url);
								?>
								<a data-fancybox="gallery" href="<?php echo $video_url; ?>">
                                    <img src="<?php echo $video_thumb_url; ?>" alt=""/>
									<span class="featured-home__image-link"></span>
								</a>
							</div>
						<?php else : ?>
							<div class="featured-home__image">
                                <a href="<?php the_field('main_article_url', 'option'); ?>" class="featured-home__link">
								    <img src="<?php the_field('main_article_image', 'option'); ?>" alt="">
                                </a>
							</div>
						<?php endif; ?>
						<?php if( get_field('main_video', 'option') ): ?>
						<a href="<?php the_field('main_article_url', 'option'); ?>" class="featured-home__link">
							<div class="featured-home__content featured-home__content--video <?php the_field('main_article_colour', 'option'); ?>">
								<h3 class="alpha featured-home__title"><?php the_field('main_article_title', 'option'); ?></h3>
								<p><?php the_field('main_article_introduction', 'option'); ?></p>
							</div>
						</a>
						<?php else : ?>
							<a href="<?php the_field('main_article_url', 'option'); ?>" class="featured-home__link">
								<div class="featured-home__content <?php the_field('main_article_colour', 'option'); ?>">
									<h3 class="alpha featured-home__title"><?php the_field('main_article_title', 'option'); ?></h3>
									<p><?php the_field('main_article_introduction', 'option'); ?></p>
								</div>
							</a>
						<?php endif; ?>
                    </article>
				</div>
                <div class="g six-twelfths palm-one-whole">
					<div class="gw">
						<div class="g one-whole palm-one-whole">
							<div class="featured-home__greeting">
								<div class="featured-home__greeting-content">
                                    <h3><?php the_field('welcome_message', 'option'); ?></h3>
								</div>
								<div id="weather" class="featured-home__weather"></div>
							</div>
						</div>
					</div>
					<div class="gw equal featured-subs">
						<div class="g one-half palm-one-half">
							<a href="<?php the_field('sub_article_url', 'option'); ?>" class="post-tile-link">
								<article class="post-tile <?php the_field('sub_article_colour', 'option'); ?>">
									<?php
										$image = get_field('sub_article_image', 'option');
										$size = 'big-article-image'; // (thumbnail, medium, large, full or custom size)
										if( $image ) {
											echo wp_get_attachment_image( $image, $size );
										}
									?>
									<h3><?php the_field('sub_article_title', 'option'); ?></h3>
									<div class="intro">
										<p><?php the_field('sub_article_introduction', 'option'); ?></p>
									</div>
								</article>
							</a>
						</div>
						<div class="g one-half palm-one-half">
							<a href="<?php the_field('sub_article_two_url', 'option'); ?>" class="post-tile-link">
								<article class="post-tile <?php the_field('sub_article_two_colour', 'option'); ?>">
									<?php
										$image = get_field('sub_article_two_image', 'option');
										$size = 'big-article-image'; // (thumbnail, medium, large, full or custom size)
										if( $image ) {
											echo wp_get_attachment_image( $image, $size );
										}
									?>
									<h3><?php the_field('sub_article_two_title', 'option'); ?></h3>
									<div class="intro">
										<p><?php the_field('sub_article_two_introduction', 'option'); ?></p>
									</div>
								</article>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	    <div id="main" class="wrapper page page--home">
			<div class="mf-offset mf-offset--wide">
				<div class="mf-offset__position mf-offset__position--left">
					<div class="social-inline">
						<?php get_template_part('social'); ?>
					</div>
				</div>
			</div>
			<div class="mf-offset mf-offset--wide">
				<div class="mf-offset__position mf-offset__position--right mf-offset__position--right--news">
					<div class="newscta newscta--home">
						<?php get_template_part('includes/newsletter'); ?>
					</div>
				</div>
			</div>
			<!-- <section class="border-wrap finder-trigger-section">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
    					<div class="mf-section mf-peach">
							<h3 class="mf-label"><a href="<?php echo get_site_url(); ?>/find/" class="mf-label__link">Find something to do in Manchester</a></h3>
							<a href="#" class="finder-trigger"><span aria-hidden="true" data-icon="&#x260c;"></span> Search now</a>
						</div>
					</div>
				</div>
			</section> -->
    		<!-- <section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
    					<div class="mf-section mf-peach mf-directory-search-home">
							<h3 class="mf-label"><a href="<?php echo get_site_url(); ?>/find/" class="mf-label__link">Find something to do in Manchester</a></h3>
    						<?php
    							if ( is_active_sidebar( 'directory-search' ) ) : ?>
    							<?php dynamic_sidebar( 'directory-search' ); ?>
    						<?php endif; ?>
    						<a href="#" class="finder-close-trigger"><span aria-hidden="true" data-icon="&#x2612;"></span> Close</a>
    					</div>
    				</div>
    			</div>
    		</section> -->
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-articles mf-grey wow fadeIn">
							<h3 class="mf-label">Latest articles</h3>
							<div class="gw equal">
							<?php $args1 = array( 'posts_per_page' => 4, 'offset'=> 0);
					            $myposts1 = get_posts( $args1 );
					            foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
				    			<div class="g one-quarter lap-one-half palm-one-half">
									<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
										<article <?php post_class('post-tile post-tile--grid wow fadeInUp'); ?>>
						                    <?php
						                        the_post_thumbnail('big-post-thumb');
						                    ?>
						                    <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
						                </article>
									</a>
								</div>
					        <?php endforeach;
					        wp_reset_postdata();?>
							<a href="<?php echo get_page_link(41139); ?>" class="wow fadeIn mf-label__link-click">View all articles</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="mf-centre">
				<div class="mf-">
					<div class="gw">
						<div class="g one-quarter palm-one-half">
                            <?php
                                if ( is_active_sidebar( 'homepage-advert-1' ) ) : ?>
                                <?php dynamic_sidebar( 'homepage-advert-1' ); ?>
                            <?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
                            <?php
                                if ( is_active_sidebar( 'homepage-advert-2' ) ) : ?>
                                <?php dynamic_sidebar( 'homepage-advert-2' ); ?>
                            <?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
                            <?php
                                if ( is_active_sidebar( 'homepage-advert-3' ) ) : ?>
                                <?php dynamic_sidebar( 'homepage-advert-3' ); ?>
                            <?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
                            <?php
                                if ( is_active_sidebar( 'homepage-advert-4' ) ) : ?>
                                <?php dynamic_sidebar( 'homepage-advert-4' ); ?>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-section--video mf-section--white  wow fadeIn">
						<h3 class="mf-label">Video series and features</h3>
							<?php

							// check if the repeater field has rows of data
							if( have_rows('video_slider', 'options') ):
								echo '<div id="owl-videos" class="owl-carousel">';
							 	// loop through the rows of data
							    while ( have_rows('video_slider', 'options') ) : the_row();
							        // display a sub field value
									echo '<article class="post-tile">';
							        	the_sub_field('video', 'options');
                                        echo '<a class="post-tile-link" href="';
    									the_sub_field('video_link', 'options');
    									echo '">';
											echo '<h3 class="post-tile__title">';
												the_sub_field('video_title', 'options');
											echo '</h3>';
                                        echo '</a>';
									echo '</article>';
							    endwhile;
								echo '</div>';
							else :
							    // no rows found
							endif;
							?>
							<a href="<?php echo get_site_url(); ?>/video" class="wow fadeIn mf-label__link-click">View all video series</a>
						</div>
    				</div>
    			</div>
    		</section>
			<div class="mf-offset">
				<div class="mf-offset__position mf-offset__position--right mf-offset__position--extra-pull mf-offset__width-med">
					<div class="mf-twitter">
						<?php
	 					   if ( is_active_sidebar( 'twitter-stream' ) ) : ?>
	 					   <?php dynamic_sidebar( 'twitter-stream' ); ?>
	 				    <?php endif; ?>
					</div>
				</div>
			</div>
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-articles mf-sand wow fadeIn">
							<?php
							    // Get the ID of a given category
							    $category_id = get_cat_ID( 'Eating & Drinking' );
							    // Get the URL of this category
							    $category_link = get_category_link( $category_id );
							?>
							<h3 class="mf-label"><a href="<?php echo esc_url( $category_link ); ?>" class="mf-label__link">
                                Eating and drinking</a></h3>
							<div class="gw equal">
							<?php $args1 = array( 'posts_per_page' => 4, 'offset'=> 0, 'category' => 975);
					            $myposts1 = get_posts( $args1 );
					            foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
				    			<div class="g one-quarter lap-one-half palm-one-half">
									<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
										<article <?php post_class('post-tile post-tile--grid wow fadeInUp'); ?>>
											<?php
						                        the_post_thumbnail('big-post-thumb');
						                    ?>
                                            <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
						                </article>
									</a>
								</div>
					        <?php endforeach;
					        wp_reset_postdata();?>
							<a href="<?php echo esc_url( $category_link ); ?>" class="wow fadeIn mf-label__link-click">View all articles</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="mf-centre">
				<div class="mf-">
					<div class="gw">
						<div class="g one-quarter palm-one-half">
                            <?php
                                if ( is_active_sidebar( 'homepage-advert-5' ) ) : ?>
                                <?php dynamic_sidebar( 'homepage-advert-5' ); ?>
                            <?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
                            <?php
                                if ( is_active_sidebar( 'homepage-advert-6' ) ) : ?>
                                <?php dynamic_sidebar( 'homepage-advert-6' ); ?>
                            <?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
                            <?php
                                if ( is_active_sidebar( 'homepage-advert-7' ) ) : ?>
                                <?php dynamic_sidebar( 'homepage-advert-7' ); ?>
                            <?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
                            <?php
                                if ( is_active_sidebar( 'homepage-advert-8' ) ) : ?>
                                <?php dynamic_sidebar( 'homepage-advert-8' ); ?>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-articles mf-upcoming wow fadeIn">
							<h3 class="mf-label mf-label--push">Upcoming events</h3>
							<div id="owl-events" class="owl-carousel">
								<?php
		 		    			// http://codex.wordpress.org/Function_Reference/current_time
		 		    			$current_time = current_time('mysql');
		 		    			list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = preg_split( '([^0-9])', $current_time );

		 		    			// Set the hour and minute to midnight so events today that started between midnight and now are still pulled in
		 		    			$midnight_today = $today_year . $today_month . $today_day . '0000';

		 		    			$current_endtimestamp = $today_year . $today_month . $today_day . $hour . $minute;

		 		    			// To pull in events that start later than midnight today
		 		    			$meta_query = array(
		 		    			  'relation'=>'AND',
		 		    			   array(
		 		    			       'key' => '_start_eventtimestamp',
		 		    			       'value' => $midnight_today,
		 		    			       'compare' => '>'
		 		    			   )
		 		    			);

		 		    			/* To pull in events that end later than now - beta,
		 		    			you may not want this and/or it may not work properly which is why I've not done a pull request yet */
		 		    			$meta_query_two = array(
		 		    			   'relation'=>'AND',
		 		    			   array(
		 		    			       'key' => '_end_eventtimestamp',
		 		    			       'value' => $current_endtimestamp,
		 		    			       'compare' => '>'
		 		    			   ),
		 		    			   array(
		 		    			      'key' => '_start_eventtimestamp',
		 		    			       'value' => $midnight_today,
		 		    			       'compare' => '<'
		 		    			       )
		 		    			);

		 		    			// Do first query
		 		    			$args = array(
		 		    			   'post_type' => 'post',
		 		    			   'meta_key' => '_start_eventtimestamp',
		 		    			   'orderby'=> 'meta_value_num',
		 		    			   'order' => 'ASC',
		 		    			   'meta_query' => $meta_query,
		 		    			   'posts_per_page' => 6
		 		    			   );

		 		    			$events = new WP_Query( $args );

		 		    			// Do second query - beta
		 		    			$args = array(
		 		    			   'post_type' => 'post',
		 		    			   'meta_key' => '_start_eventtimestamp',
		 		    			   'orderby'=> 'meta_value_num',
		 		    			   'order' => 'ASC',
		 		    			   'meta_query' => $meta_query_two,
		 		    			   'posts_per_page' => 8
		 		    			   );
		 		    			$events_end = new WP_Query( $args );

		 		    			// Merge posts into new object, removing duplicates (beta)
		 		    			// This will put events that [started before today and end later than now] first
		 		    			$merged = new WP_Query();
		 		    			$merged->posts =  array_unique(array_merge((array)$events_end->posts, (array)$events->posts), SORT_REGULAR);
		 		    			$merged->post_count = count( $merged->posts );
		 		    			//print_r($merged);
		 		    			$events = $merged;

		 		    			if ( $events->have_posts() ) :

		 		    			while ( $events->have_posts() ) : $events->the_post();
		 		    			// Single event

		 		    			// Start
		 		    			// Get start date to display
		 		    			$str = date('l d F H i', strtotime('' . get_post_meta($post->ID, '_start_eventtimestamp', true) .''));
		 		    			list($startweekday,$startday,$startmonth,$starthour,$startminute) = preg_split('/[ ,]/',$str,false,PREG_SPLIT_NO_EMPTY);

		 		    			// Get start time for calculation
		 		    			$calc_start = strtotime('' . get_post_meta($post->ID, '_start_eventtimestamp', true) .'');

		 		    			// Setting month to "None" gives it a value of 100 which we get separately
		 		    			$has_start = get_post_meta($post->ID, '_start_month', true);

		 		    			// End
		 		    			// Get end date to display
		 		    			$str = date('l d F', strtotime('' . get_post_meta($post->ID, '_end_eventtimestamp', true) .''));
		 		    			list($endweekday,$endday,$endmonth) = preg_split('/[ ,]/',$str,false,PREG_SPLIT_NO_EMPTY);

		 		    			// Get end date for calculation
		 		    			$calc_end = strtotime('' . get_post_meta($post->ID, '_end_eventtimestamp', true) .'');

		 		    			// Setting month to "None" gives it a value of 100 which we get separately
		 		    			$has_ending = get_post_meta($post->ID, '_end_month', true);

		 		    			// Don't display the event at all if
		 	    			    // (Start AND End are set to none) OR
		 	    			    // (End is NOT none AND End before midnight today) OR
		 	    			    // (End is none AND Start before midnight today)

		 		    			// This is a terrible way to do it but at least it's quite easy to see what's going on
		 		    			if (!(
		 		    			      ($has_ending == '100' && $has_start == '100') ||
		 		    			      ($has_ending != '100' && $calc_end < strtotime('midnight')) ||
		 		    			      ($has_ending == '100' && $calc_start < strtotime('midnight'))
		 		    			      )) {

		 		    			    echo '<article class="media event">';
		 		    			    echo '<a class="event-link" href="' . get_permalink() . '">';
		 		    			    ?>
		 		    			        <div class="event-date multi-date">
		 		    			    <?php
		 		    			       if ( $has_start !== '100' ) {
		 		    			    ?>
		 	    			            <div class="start-date">
		 	    			                <div class="event-weekday">
		 	    			                    <?php echo $startweekday; ?>
		 	    			                </div>
		 	    			                <div class="event-day">
		 	    			                    <?php echo $startday; ?>
		 	    			                </div>
		 	    			                <div class="event-month">
		 	    			                    <?php echo $startmonth; ?>
		 	    			                </div>
		 	    			            </div>
		 		    			    <?php
		 		    			       }

		 		    			        if ( $has_ending !== '100' ) {
		 		    			    ?>
		 	    			            <div class="end-date">
		 	    			                <div class="event-weekday">
		 	    			                <?php echo $endweekday; ?>
		 	    			                </div>
		 	    			                <div class="event-day">
		 	    			                <?php echo $endday; ?>
		 	    			                </div>
		 	    			                <div class="event-month">
		 	    			                <?php echo $endmonth; ?>
		 	    			                </div>
		 	    			            </div>
		 		    			    <?php
		 		    			        }
		 		    			    ?>
		 		    			       </div>
		 		    			    <?php
		 		    			       // Title
		 		    			       echo '<h3>' . get_the_title() . '</h3>';
		 		    			       // Time and location
		 		    			       echo '<span class="time-location">';
		 		    			       echo $starthour . ':' . $startminute;
		 		    			       echo ' ' . get_post_meta($post->ID, '_event_location', true) . '';
		 		    			       echo '</span>';
		 		    			       echo '</a>';
		 		    			       echo '</article>';
		 		    				}
		 		    			   endwhile;
		 		    			endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="mf-centre">
				<div class="mf-">
					<div class="gw">
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-0' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-0' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-2' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-2' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-3' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-3' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-4' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-4' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-articles mf-peach wow fadeIn">
							<?php
							    // Get the ID of a given category
							    $category_id = get_cat_ID( 'Arts & Culture' );
							    // Get the URL of this category
							    $category_link = get_category_link( $category_id );
							?>
							<h3 class="mf-label"><a href="<?php echo esc_url( $category_link ); ?>" class="mf-label__link">Arts &amp; culture</a></h3>
							<div class="gw equal">
							<?php $args1 = array( 'posts_per_page' => 4, 'offset'=> 0, 'category' => 1058); 
					            $myposts1 = get_posts( $args1 );
					            foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
				    			<div class="g one-quarter lap-one-half palm-one-half">
									<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
										<article <?php post_class('post-tile post-tile--grid wow fadeInUp'); ?>>
											<?php
						                        the_post_thumbnail('big-post-thumb');
						                    ?>
						                    <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
						                </article>
									</a>
								</div>
					        <?php endforeach;
					        wp_reset_postdata();?>
							<a href="<?php echo esc_url( $category_link ); ?>" class="wow fadeIn mf-label__link-click">View all articles</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="mf-centre">
				<div class="mf-">
					<div class="gw">
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-5' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-5' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-6' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-6' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-7' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-7' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-8' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-8' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-articles mf-grey wow fadeIn">
							<?php
							    // Get the ID of a given category
							    $category_id = get_cat_ID( 'Articles' );
							    // Get the URL of this category
							    $category_link = get_category_link( $category_id );
							?>
							<h3 class="mf-label"><a href="<?php echo esc_url( $category_link ); ?>" class="mf-label__link">Articles &amp; reviews</a></h3>
							<div class="gw equal">
							<?php $args1 = array( 'posts_per_page' => 4, 'offset'=> 0, 'category' => array(415, 15));
					            $myposts1 = get_posts( $args1 );
					            foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
				    			<div class="g one-quarter lap-one-half palm-one-half">
									<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
										<article <?php post_class('post-tile post-tile--grid wow fadeInUp'); ?>>
											<?php
						                        the_post_thumbnail('big-post-thumb');
						                    ?>
						                    <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
						                </article>
									</a>
								</div>
					        <?php endforeach;
					        wp_reset_postdata();?>
							<a href="<?php echo esc_url( $category_link ); ?>" class="wow fadeIn mf-label__link-click">View all articles</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="mf-centre">
				<div class="mf-">
					<div class="gw">
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-9' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-9' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-10' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-10' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-11' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-11' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-12' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-12' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-articles mf-baby-blue wow fadeIn">
							<?php
							    // Get the ID of a given category
							    $category_id = get_cat_ID( 'From Mcr to' );
							    // Get the URL of this category
							    $category_link = get_category_link( $category_id );
							?>
							<h3 class="mf-label"><a href="<?php echo esc_url( $category_link ); ?>" class="mf-label__link">From Mcr to</a></h3>
							<div class="gw equal">
							<?php $args1 = array( 'posts_per_page' => 4, 'offset'=> 0, 'category' => 893);
					            $myposts1 = get_posts( $args1 );
					            foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
			    				<div class="g one-quarter lap-one-half palm-one-half">
									<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
										<article <?php post_class('post-tile post-tile--grid wow fadeInUp'); ?>>
											<?php
												the_post_thumbnail('big-post-thumb');
											?>
						                    <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
						                </article>
									</a>
								</div>
					        <?php endforeach;
					        wp_reset_postdata();?>
							<a href="<?php echo esc_url( $category_link ); ?>" class="wow fadeIn mf-label__link-click">View all articles</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="mf-centre">
				<div class="mf-">
					<div class="gw">
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-13' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-13' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-14' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-14' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-15' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-15' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-16' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-16' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-articles mf-lilac wow fadeIn">
							<?php
							    // Get the ID of a given category
							    $category_id = get_cat_ID( 'Lifestyle' );
							    // Get the URL of this category
							    $category_link = get_category_link( $category_id );
							?>
							<h3 class="mf-label"><a href="<?php echo esc_url( $category_link ); ?>" class="mf-label__link">Lifestyle </a></h3>
							<div class="gw equal">
							<?php $args1 = array( 'posts_per_page' => 4, 'offset'=> 0, 'category' => 10);
					            $myposts1 = get_posts( $args1 );
					            foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
				    			<div class="g one-quarter lap-one-half palm-one-half">
									<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
										<article <?php post_class('post-tile post-tile--grid wow fadeInUp'); ?>>
											<?php
						                        the_post_thumbnail('big-post-thumb');
						                    ?>
						                    <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
						                </article>
									</a>
								</div>
					        <?php endforeach;
					        wp_reset_postdata();?>
							<a href="<?php echo esc_url( $category_link ); ?>" class="wow fadeIn mf-label__link-click">View all articles</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="mf-centre">
				<div class="mf-">
					<div class="gw">
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-17' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-17' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-18' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-18' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-19' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-19' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-20' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-20' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-articles mf-pink wow fadeIn">
							<?php
							    // Get the ID of a given category
							    $category_id = get_cat_ID( 'Events' );
							    // Get the URL of this category
							    $category_link = get_category_link( $category_id );
							?>
							<h3 class="mf-label"><a href="<?php echo esc_url( $category_link ); ?>" class="mf-label__link">Events </a></h3>
							<div class="gw equal">
							<?php $args1 = array( 'posts_per_page' => 4, 'offset'=> 0, 'category' => 12);
					            $myposts1 = get_posts( $args1 );
					            foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
				    			<div class="g one-quarter lap-one-half palm-one-half">
									<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
										<article <?php post_class('post-tile post-tile--grid wow fadeInUp'); ?>>
											<?php
						                        the_post_thumbnail('big-post-thumb');
						                    ?>
						                    <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
						                </article>
									</a>
								</div>
					        <?php endforeach;
					        wp_reset_postdata();?>
							<a href="<?php echo esc_url( $category_link ); ?>" class="wow fadeIn mf-label__link-click">View all articles</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="mf-centre">
				<div class="mf-">
					<div class="gw">
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-21' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-21' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-22' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-22' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-23' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-23' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-24' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-24' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-articles mf-mint-green wow fadeIn">
							<?php
							    // Get the ID of a given category
							    $category_id = get_cat_ID( 'Music' );
							    // Get the URL of this category
							    $category_link = get_category_link( $category_id );
							?>
							<h3 class="mf-label"><a href="<?php echo esc_url( $category_link ); ?>" class="mf-label__link">Music </a></h3>
							<div class="gw equal">
							<?php $args1 = array( 'posts_per_page' => 4, 'offset'=> 0, 'category' => 7);
					            $myposts1 = get_posts( $args1 );
					            foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
				    			<div class="g one-quarter lap-one-half palm-one-half">
									<a href="<?php the_permalink() ?>" rel="bookmark" class="post-tile-link">
										<article <?php post_class('post-tile post-tile--grid wow fadeInUp'); ?>>
											<?php
						                        the_post_thumbnail('big-post-thumb');
						                    ?>
						                    <h3><?php echo wp_trim_words ( the_title ( '', '', false ), 12 , '&hellip;'); ?></h3>
						                </article>
									</a>
								</div>
					        <?php endforeach;
					        wp_reset_postdata();?>
							<a href="<?php echo esc_url( $category_link ); ?>" class="wow fadeIn mf-label__link-click">View all articles</a>
							</div>
						</div>
					</div>
				</div>
			</section>
            <div class="mf-centre">
				<div class="mf-">
					<div class="gw">
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-25' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-25' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-26' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-26' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-27' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-27' ); ?>
							<?php endif; ?>
						</div>
						<div class="g one-quarter palm-one-half">
							<?php
								 if ( is_active_sidebar( 'homepage-optional-28' ) ) : ?>
								 <?php dynamic_sidebar( 'homepage-optional-28' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
            <section class="border-wrap">
    			<div class="gw">
    				<div class="g one-whole lap-one-whole palm-one-whole">
						<div class="mf-section mf-section--white">
						<h3 class="mf-label"><a href="https://www.instagram.com/mcrfinest/" class="mf-label__link"><span class="icon icon-instagram"></span> mcrfinest</a></h3>
    						<?php
    							 if ( is_active_sidebar( 'owl-instagram' ) ) : ?>
    							 <?php dynamic_sidebar( 'owl-instagram' ); ?>
    						<?php endif; ?>
    				</div>
    			</div>
    		</section>
	 		</div>
		</div>
	</div>
<?php get_footer(); ?>
