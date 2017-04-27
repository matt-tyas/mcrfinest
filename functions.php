<?php
/**
 * Twenty Twelve functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

	function register_my_menus() {
	register_nav_menus(
		array(
		'secondary-menu' => __( 'Secondary Menu' )
		)
	);
	register_nav_menus(
		array(
		'footer-menu' => __( 'Footer Menu' )
		)
	);
	}


	add_action( 'init', 'register_my_menus' );

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
	if ( function_exists( 'add_image_size' ) ) {
	    add_image_size( 'cat-post-thumb', 172, 88, true );
	    add_image_size( 'big-post-thumb', 308, 158, true );
	    add_image_size( 'big-article-image', 750, 450, true );
		add_image_size( 'sq-post-thumb', 400, 400, true );
		// add_image_size( 'large-post-thumb', 120, 120, true );
		// add_image_size( 'mini-post-thumb', 50, 50, true );
	}

	function setup() {
    // ...

    add_theme_support( 'post-thumbnails' ); // This feature enables post-thumbnail support for a theme
    // To enable only for posts:
    //add_theme_support( 'post-thumbnails', array( 'post' ) );
    // To enable only for posts and custom post types:
    //add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );

    // Register a new image size.
    // This means that WordPress will create a copy of the post image with the specified dimensions
    // when you upload a new image. Register as many as needed.
    // Adding custom image sizes (name, width, height, crop)
    /*add_image_size( 'cat-post-thumb', 172, 88, true );
    add_image_size( 'big-post-thumb', 224, 115, true );
    add_image_size( 'big-article-image', 750, 366, true );
    add_image_size( 'large-post-thumb', 120, 120, true );
    add_image_size( 'mini-post-thumb', 50, 50, true );*/
    // ...
}
	/////


}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds latest version of Jquery from Google CDN
	 */
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js", false, null);
	   wp_enqueue_script('jquery');
	}

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	// wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	/*
	 * Loads our special font CSS file.
	 *
	 * The use of Open Sans by default is localized. For languages that use
	 * characters not supported by the font, the font can be disabled.
	 *
	 * To disable in a child theme, use wp_dequeue_style()
	 * function mytheme_dequeue_fonts() {
	 *     wp_dequeue_style( 'twentytwelve-fonts' );
	 * }
	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	 */

	/* translators: If there are characters in your language that are not supported
	   by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language, translate
		   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'twentytwelve-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	//wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
	//$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

// Disable comments on attachment pages
function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Homepage Header advert', 'twentytwelve' ),
		'id' => 'header-advert',
		'description' => __( 'The very top banner in the website header', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Twitter Stream', 'twentytwelve' ),
		'id' => 'twitter-stream',
		'description' => __( 'Finest Twitter', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="sub-title-link"><a href="https://twitter.com/intent/user?screen_name=McrFinest"><span class="icon-twitter"></span> ',
		'after_title' => '</a></h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage advert square 1', 'twentytwelve' ),
		'id' => 'homepage-advert-1',
		'description' => __( 'Homepage top four squares adverts', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage advert square 2', 'twentytwelve' ),
		'id' => 'homepage-advert-2',
		'description' => __( 'Homepage top four squares adverts', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage advert square 3', 'twentytwelve' ),
		'id' => 'homepage-advert-3',
		'description' => __( 'Homepage top four squares adverts', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage advert square 4', 'twentytwelve' ),
		'id' => 'homepage-advert-4',
		'description' => __( 'Homepage top four squares adverts', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage CTA 1', 'twentytwelve' ),
		'id' => 'homepage-cta-1',
		'description' => __( 'Call to action under the slider', 'twentytwelve' ),
		'before_widget' => '<div class="discover">',
		'after_widget' => '</div>',
		'before_title' => '<span class="discover-cta">',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage CTA 2', 'twentytwelve' ),
		'id' => 'homepage-cta-2',
		'description' => __( 'Call to action under the slider', 'twentytwelve' ),
		'before_widget' => '<div class="discover">',
		'after_widget' => '</div>',
		'before_title' => '<span class="discover-cta">',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage CTA 3', 'twentytwelve' ),
		'id' => 'homepage-cta-3',
		'description' => __( 'Call to action under the slider', 'twentytwelve' ),
		'before_widget' => '<div class="discover">',
		'after_widget' => '</div>',
		'before_title' => '<span class="discover-cta">',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage CTA 4', 'twentytwelve' ),
		'id' => 'homepage-cta-4',
		'description' => __( 'Call to action under the slider', 'twentytwelve' ),
		'before_widget' => '<div class="discover">',
		'after_widget' => '</div>',
		'before_title' => '<span class="discover-cta">',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Optional 1', 'twentytwelve' ),
		'id' => 'homepage-optional-1',
		'description' => __( 'Homepage Optional 1', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Optional 2', 'twentytwelve' ),
		'id' => 'homepage-optional-2',
		'description' => __( 'Homepage Optional 2', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Optional 3', 'twentytwelve' ),
		'id' => 'homepage-optional-3',
		'description' => __( 'Homepage Optional 3', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Optional 4', 'twentytwelve' ),
		'id' => 'homepage-optional-4',
		'description' => __( 'Homepage Optional 4', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Optional 5', 'twentytwelve' ),
		'id' => 'homepage-optional-5',
		'description' => __( 'Homepage Optional 5', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Optional 6', 'twentytwelve' ),
		'id' => 'homepage-optional-6',
		'description' => __( 'Homepage Optional 6', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Optional 7', 'twentytwelve' ),
		'id' => 'homepage-optional-7',
		'description' => __( 'Homepage Optional 7', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Optional 8', 'twentytwelve' ),
		'id' => 'homepage-optional-8',
		'description' => __( 'Homepage Optional 8', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Inner Page Optional', 'twentytwelve' ),
		'id' => 'inner-page-optional',
		'description' => __( 'Inner Page Optional', 'twentytwelve' ),
		'before_widget' => '<div class="featured-articles">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 1', 'twentytwelve' ),
		'id' => 'category-page-advert-1',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 2', 'twentytwelve' ),
		'id' => 'category-page-advert-2',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 3', 'twentytwelve' ),
		'id' => 'category-page-advert-3',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 4', 'twentytwelve' ),
		'id' => 'category-page-advert-4',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 5', 'twentytwelve' ),
		'id' => 'category-page-advert-5',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 6', 'twentytwelve' ),
		'id' => 'category-page-advert-6',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 7', 'twentytwelve' ),
		'id' => 'category-page-advert-7',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 8', 'twentytwelve' ),
		'id' => 'category-page-advert-8',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 9', 'twentytwelve' ),
		'id' => 'category-page-advert-9',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Category Page Advert 10', 'twentytwelve' ),
		'id' => 'category-page-advert-10',
		'description' => __( 'Category page advert', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Site Footer', 'twentytwelve' ),
		'id' => 'site-footer',
		'description' => __( 'Site wide footer', 'twentytwelve' ),
		'before_widget' => '<div class="footer-text">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="sub-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Site Sponsor 1', 'twentytwelve' ),
		'id' => 'site-sponsor-1',
		'description' => __( 'Site Sponsor 1', 'twentytwelve' ),
		'before_widget' => '<div class="sponsor">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Site Sponsor 2', 'twentytwelve' ),
		'id' => 'site-sponsor-2',
		'description' => __( 'Site Sponsor 2', 'twentytwelve' ),
		'before_widget' => '<div class="sponsor">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Site Sponsor 3', 'twentytwelve' ),
		'id' => 'site-sponsor-3',
		'description' => __( 'Site Sponsor 3', 'twentytwelve' ),
		'before_widget' => '<div class="sponsor">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );



}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

/**
 * Filter the except length
 */

function get_excerpt($limit, $source = null){
    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'&hellip;';
    return $excerpt;
}

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
	$background_color = get_background_color();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function twentytwelve_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_customize_preview_js() {
	wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );

/* Breadcrumb */
function dimox_breadcrumbs() {

	/* === OPTIONS === */
	$text['home']     = 'Home'; // text for the 'Home' link
	$text['category'] = ' %s'; // text for a category page
	$text['search']   = 'Search results for "%s"'; // text for a search results page
	$text['tag']      = 'Articles tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles by %s'; // text for an author page
	$text['404']      = 'Oh dear... missing page!'; // text for the 404 page

	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter   = ' &raquo; '; // delimiter between crumbs
	$before      = '<span class="current">'; // tag before the current crumb
	$after       = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$homeLink = get_bloginfo('url') . '/';
	$linkBefore = '<span typeof="v:Breadcrumb">';
	$linkAfter = '</span>';
	$linkAttr = ' rel="v:url" property="v:title"';
	$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

	if (is_home() || is_front_page()) {

		if ($showOnHome == 1) echo '<div class="breadcrumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';

	} else {

		echo '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
			$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo $delimiter;
			}
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div>';

	}
} // end dimox_breadcrumbs()

// Home Link in Menu

function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

// Login image and link

function custom_login_logo() {
	echo '<style type="text/css">h1 a { height:80px !important; width: 304px !important; background: url("http://www.manchestersfinest.com/wp-content/uploads/2017/03/finest-brand-landscape-new.jpg") 75% 55% no-repeat !important; }</style>';
}
add_action('login_head', 'custom_login_logo');







// Custom post type - finest directory
function create_post_type() {
	$labels = array(
      'name'               => _x( 'Directory', 'post type general name' ),
      'singular_name'      => _x( 'Directory', 'post type singular name' ),
      'add_new_item'       => __( 'Add New lisitng' ),
      'edit_item'          => __( 'Edit listing' ),
      'new_item'           => __( 'New Listing' ),
      'all_items'          => __( 'All listings' ),
      'view_item'          => __( 'View Directory' ),
      'search_items'       => __( 'Search Directory' ),
      'not_found'          => __( 'No listings found' ),
      'not_found_in_trash' => __( 'No listings found in the Trash' ),
      'parent_item_colon'  => '',
      'menu_name'          => 'Directory'
    );
    $args = array(
      'labels'        => $labels,
      'description'   => 'Finest business directory',
	  'register_meta_box_address' => 'mcr_add_address_metaboxes',
      'public'        => true,
      'menu_position' => 4,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
      'has_archive'   => true,
	  'taxonomies' => array('category', 'post_tag')
    );
    register_post_type( 'directory', $args );
}
add_action( 'init', 'create_post_type' );



/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'directory_address_setup' );
add_action( 'load-post-new.php', 'directory_address_setup' );

/* Meta box setup function. */
function directory_address_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'directory_address_meta_boxes' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'directory_address_save_meta', 10, 2 );
}

function directory_address_meta_boxes() {

  add_meta_box(
    'directory_address_meta_box_class',      // Unique ID
    esc_html__( 'Listing address', 'example' ),    // Title
    'directory_address_meta_box',   // Callback function
    'directory',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}

/* Display the post meta box. */
function directory_address_meta_box( $object, $box ) { ?>
  <?php wp_nonce_field( basename( __FILE__ ), 'directory_address_meta_box_class_nonce' ); ?>
  <p>
    <label for="directory_address_meta_box_class"><?php _e( "Add an address for the listing", 'example' ); ?></label>
    <br />
	<textarea style="height: 100px;"class="widefat" id="directory_address_meta_box_class" name="directory_address_meta_box_class"><?php echo get_post_meta( $object->ID, 'directory_address_meta_box_class', true ); ?></textarea>
  </p>
<?php }

/* Save the meta box's post metadata. */
function directory_address_save_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['directory_address_meta_box_class_nonce'] ) || !wp_verify_nonce( $_POST['directory_address_meta_box_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['directory_address_meta_box_class'] ) ? ( $_POST['directory_address_meta_box_class'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'directory_address_meta_box_class';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}



/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'directory_url_setup' );
add_action( 'load-post-new.php', 'directory_url_setup' );

/* Meta box setup function. */
function directory_url_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'directory_url_meta_boxes' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'directory_url_save_meta', 10, 2 );
}

function directory_url_meta_boxes() {

  add_meta_box(
    'directory_url_meta_box_class',      // Unique ID
    esc_html__( 'Listing url', 'example' ),    // Title
    'directory_url_meta_box',   // Callback function
    'directory',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}

/* Display the post meta box. */
function directory_url_meta_box( $object, $box ) { ?>
  <?php wp_nonce_field( basename( __FILE__ ), 'directory_url_meta_box_class_nonce' ); ?>
  <p>
    <label for="directory_url_meta_box_class"><?php _e( "Add a url for the listing", 'example' ); ?></label>
    <br />
	<input type="text" class="widefat" id="directory_url_meta_box_class" name="directory_url_meta_box_class" value="<?php echo get_post_meta( $object->ID, 'directory_url_meta_box_class', true ); ?>" />
  </p>
<?php }

/* Save the meta box's post metadata. */
function directory_url_save_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['directory_url_meta_box_class_nonce'] ) || !wp_verify_nonce( $_POST['directory_url_meta_box_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['directory_url_meta_box_class'] ) ? ( $_POST['directory_url_meta_box_class'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'directory_url_meta_box_class';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}


function add_admin_scripts( $hook ) {

    global $post;

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'directory' === $post->post_type ) {
            wp_enqueue_script(  'myscript', get_stylesheet_directory_uri().'/js/image-uploader.js' );
        }
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

add_action( 'add_meta_boxes', 'listing_image_add_metabox' );
function listing_image_add_metabox () {
	add_meta_box( 'listingimagediv', __( 'Listing Image', 'text-domain' ), 'listing_image_metabox', 'directory', 'normal', 'high');
}

function listing_image_metabox ( $post ) {
	global $content_width, $_wp_additional_image_sizes;

	$image_id = get_post_meta( $post->ID, '_listing_image_id', true );

	$old_content_width = $content_width;
	$content_width = 254;

	if ( $image_id && get_post( $image_id ) ) {

		if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
			$thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
		} else {
			$thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
		}

		if ( ! empty( $thumbnail_html ) ) {
			$content = $thumbnail_html;
			$content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_listing_image_button" >' . esc_html__( 'Remove listing image', 'text-domain' ) . '</a></p>';
			$content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="' . esc_attr( $image_id ) . '" />';
		}

		$content_width = $old_content_width;
	} else {
		$content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
		$content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set listing image', 'text-domain' ) . '" href="javascript:;" id="upload_listing_image_button" id="set-listing-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'text-domain' ) . '" data-uploader_button_text="' . esc_attr__( 'Set listing image', 'text-domain' ) . '">' . esc_html__( 'Set listing image', 'text-domain' ) . '</a></p>';
		$content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="" />';
	}
	echo $content;
}

add_action( 'save_post', 'listing_image_save', 10, 1 );
function listing_image_save ( $post_id ) {
	if( isset( $_POST['_listing_cover_image'] ) ) {
		$image_id = (int) $_POST['_listing_cover_image'];
		update_post_meta( $post_id, '_listing_image_id', $image_id );
	}
}

function listing_image_get_meta ($value) {
global $post;
$image_id = get_post_meta ($post->ID, $value, true);

	if (!empty ($image_id)) {
		return is_array ($image_id) ? stripslashes_deep ($image_id) : stripslashes (wp_kses_decode_entities ($image_id));
	} else {
		return false;
	}
}

add_action( 'edit_form_after_title', 'move_excerpt_meta_box' );
function move_excerpt_meta_box( $post ) {
    if ( post_type_supports( $post->post_type, 'excerpt' ) ) {
        remove_meta_box( 'postexcerpt', $post->post_type, 'normal' ); ?>
        <div class="postbox">
        <h2 class="hndle">Introduction</h2>
		<div class="inside">
        <?php post_excerpt_meta_box( $post );
		echo "</div></div>";
    }
}

remove_filter ('edit_form_after_title', 'wpautop');

// TinyMCE: First line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons') ){
	function base_extended_editor_mce_buttons($buttons) {
		// The settings are returned in this array. Customize to suite your needs.
		return array(
			'formatselect', 'bullist', 'numlist', 'link', 'unlink', 'blockquote', 'charmap', 'removeformat', 'spellchecker', 'fullscreen', 'wp_more', 'wp_help'
		);
		/* WordPress Default
		return array(
			'bold', 'italic', 'strikethrough', 'separator',
			'bullist', 'numlist', 'blockquote', 'separator',
			'justifyleft', 'justifycenter', 'justifyright', 'separator',
			'link', 'unlink', 'wp_more', 'separator',
			'spellchecker', 'fullscreen', 'wp_adv'
		); */
	}
	add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
}

// TinyMCE: Second line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons_2') ){
	function base_extended_editor_mce_buttons_2($buttons) {
		// The settings are returned in this array. Customize to suite your needs. An empty array is used here because I remove the second row of icons.
		return array();
		/* WordPress Default
		return array(
			'formatselect', 'underline', 'justifyfull', 'forecolor', 'separator',
			'pastetext', 'pasteword', 'removeformat', 'separator',
			'media', 'charmap', 'separator',
			'outdent', 'indent', 'separator',
			'undo', 'redo', 'wp_help'
		); */
	}
	add_filter("mce_buttons_2", "base_extended_editor_mce_buttons_2", 0);
}

function wpa_45815($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 2=h2';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wpa_45815');
