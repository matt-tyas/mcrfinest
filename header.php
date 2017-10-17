<?php ?>
<!doctype html>
<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if lt IE 7]><html class="no-js ie6 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="no-js ie9" <?php language_attributes(); ?>><![endif<]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="cleartype" content="on">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="fb:pages" content="1557163057929499" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="apple-touch-icon" href="http://www.manchestersfinest.com/wp-content/uploads/2011/08/apple-touch-icon.png" />
<script>
  // (function(d) {
  //   var config = {
  //     kitId: 'wqj8qvy',
  //     scriptTimeout: 3000,
  //     async: falsecommit
  //   },
  //   h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  // })(document);
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery-1.9.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr.custom.js"></script>
<!-- Facebook Pixel Code -->
<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '756761724478408');
	fbq('track', 'PageView');
	</script>
	<noscript>
	<img height="1" width="1"
	src="https://www.facebook.com/tr?id=756761724478408&ev=PageView
	&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<style>
@media only screen and (max-width: 859px) {
	.entry-content p {
	    font-size: 16px !important;
	}
}
.g.g-9,
.g.g-10 {
	width: 100% !important;
	padding-left: 0 !important;
}
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<nav class="skip-nav">
	<ul>
		<li><a href="#navigation">Skip to main navigation</a></li>
		<li><a href="#main">Skip to content</a></li>
		<li><a href="#footer">Skip to footer</a></li>
	</ul>
</nav>
<div class="hfeed site">
	<header role="banner" class="gw white-bg">
		<div class="page">
			<div class="g six-twelfths lap-one-half palm-one-whole">
				<?php get_template_part('logo'); ?>
				<div class="site-description accessibility"><?php bloginfo( 'description' ); ?></div>
			</div>
			<nav role="navigation" id="navigation" class="g  one-whole  primary">
				<a class="site-title--srcoll" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">M<span class="accessibility">anchester's</span>F<span class="accessibility">inest</span>
				<div class="site-naviagtion">
				    <div class="main-search-control">
				    	<a id="search-toggle" href="#"><span> <span class="search-text">Search</span></span></a>
				    	<div class="mob-search">
							<?php get_search_form(); ?>
						</div>
				    </div>
					<a href="#sidr-main" id="menu-toggle__target"><span>Menu</span></a>
					<a class="accessibility" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav nav--stacked nav--block nav--mobile visuallyhidden--palm' ) ); ?>
				</div>
			</nav><!-- #site-navigation -->
			<div id="main-search-reveal">
				<div class="main-search">
					<a href="#" class="search-close-trigger"><span aria-hidden="true" data-icon="&#x2612;"></span> Close</a>
					<?php get_search_form(); ?>
				</div>
			</div>
            <div class="g one-half lap-one-half palm-one-whole desk-position">
				<div class="ad-horz">
					<?php
			        if ( is_active_sidebar( 'header-advert' ) ) : ?>
			             <?php dynamic_sidebar( 'header-advert' ); ?>
			        <?php endif; ?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<div <?php post_class( 'page-bg gw' ); ?>>
		<main id="main" class="wrapper page">
			<div class="g  one-whole">
