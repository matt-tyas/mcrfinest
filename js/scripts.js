$(".mf-loading").fadeOut("fast");

equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

$(window).load(function() {
  equalheight('.equal .post-tile');
});


$(window).resize(function(){
  equalheight('.equal .post-tile');
});


new WOW().init();

/* Weather
---------------------------------- */
$.simpleWeather({
  location: 'manchester, united kingdom',
  unit: 'c',
  success: function(weather) {
    html = '';
    html += '<i class="icon-'+weather.code+'"></i>';
    html += '<p>'+weather.temp+'&deg; '+weather.units.temp+'</p>';
    // html += '<a href="'+weather.link+'">View Forecast &raquo;</a>';

    $("#weather").html(html);
  },
  error: function(error) {
    $("#weather").html("<p>"+error+"</p>");
  }
});

$('#owl-videos').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  responsiveClass: true,
  responsive:{
      0:{
          items:1,
          nav:true
      },
      600:{
          items:3,
          nav:true
      },
      1100:{
          items:4,
          nav:true
      }
  }
})

$('#owl-events').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  responsiveClass: true,
  responsive:{
      0:{
          items:1,
          nav:true
      },
      750:{
          items:3,
          nav:true
      },
      1100:{
          items:4,
          nav:true
      }
  }
})

$('#owl-instagram').owlCarousel({
  loop: true,
  margin: 32,
  nav: true,
  responsiveClass: true,
  responsive:{
      0:{
          items:2,
          nav:true
      },
      600:{
          items:4,
          nav:true
      },
      1100:{
          items:6,
          nav:true
      }
  }
})

$('#owl-directory-videos').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  responsiveClass: true,
  autoHeight:true,
  responsive:{
      0:{
          items:1,
          nav:true
      },
      600:{
          items:1,
          nav:true
      },
      1100:{
          items:1,
          nav:true
      }
  }
})

// $(window).load(function() {
// 	/* This avoids the flags loading in the top left of the browser whilst witing for JS to finish */
//   $('<style> .category-northern-quarter:before { display: block !important; } </style>').appendTo('head');
// });

$(window).scroll(function() {
  var scroll = $(window).scrollTop();

  if (scroll >= 110) {
      $(".site-title--srcoll").addClass("is--shown");
  } else {
      $(".site-title--srcoll").removeClass("is--shown");
  }
});

$(document).ready(function(){

  /* Sticky elements
  ---------------------------------- */
  if ( $('.is--sticky').length ) {
    $('.is--sticky').stick_in_parent({
      parent: ".site-content",
      offset_top: 75
    });
  }

  if ( $('.is--sticky').length ) {
    $('.is--sticky').stick_in_parent({
      parent: ".wrapper",
      offset_top: 75
    });
  }

  if ( $('.ad--sticky').length ) {
    $('.ad--sticky').stick_in_parent({
      parent: ".site-content",
      spacer: ".sticky-spacer",
    });
  }

  if ( $('#navigation').length ) {
    $('#navigation').stick_in_parent({
      parent: ".site",
    });
  }

  var $window = $(window);

  function checkWidth() {
      var windowsize = $window.width();
      if (windowsize < 860) {
        if ( $('.site-title').length ) {
          $('.site-title').stick_in_parent({
            parent: ".site",
          });
        }
      }
      if (windowsize > 860) {
        $('.site-title').trigger("sticky_kit:detach");
      }
  }
  // Execute on load
  checkWidth();
  // Bind event listener
  $(window).resize(checkWidth);

  $(".finder-trigger").click(function() {
    $(this).toggleClass("is--pressed");
    $(".mf-directory-search-home").addClass("is--open");
    return false;
  });

  $(".finder-close-trigger").click(function() {
    $(this).toggleClass("is--pressed");
    $(".mf-directory-search-home").removeClass("is--open");
    return false;
  });

  $(".search-close-trigger").click(function() {
    $("#main-search-reveal").removeClass("is-open");
    return false;
  });

	/* Primary navigation interactions
	---------------------------------- */

  // Adds Accessibility (keyboard navigation) to main nav
  $(function(){
    $('.nav').setup_navigation();
  });

  $.fn.setup_navigation = function(settings) {
    settings = jQuery.extend({
      menuHoverClass: 'focus',
    }, settings);

    // Set tabIndex to -1 so that links can't receive focus until menu is open
    $(this).find('> li > a').next('ul').find('a').attr('tabIndex',-1);

    $(this).find('> li > a').hover(function(){
      $(this).closest('ul').find('.'+settings.menuHoverClass).removeClass(settings.menuHoverClass).find('a').attr('tabIndex',-1);
    });
    $(this).find('> li > a').focus(function(){
      $(this).closest('ul').find('.'+settings.menuHoverClass).removeClass(settings.menuHoverClass).find('a').attr('tabIndex',-1);
      $(this).next('ul')
        .addClass(settings.menuHoverClass)
        .find('a').attr('tabIndex',0);
    });

  // Hide menu if click or focus occurs outside of navigation
  $(this).find('a').last().keydown(function(e){
    if(e.keyCode == 9) {
      // If the user tabs out of the navigation hide all menus
      $('.'+settings.menuHoverClass).removeClass(settings.menuHoverClass).find('a').attr('tabIndex',-1);
    }
  });
  $(document).click(function(){ $('.'+settings.menuHoverClass).removeClass(settings.menuHoverClass).find('a').attr('tabIndex',-1); });

  $(this).click(function(e){
    e.stopPropagation();
  });
}


	// Hover intent
	var config = {
         sensitivity: 3, // number = sensitivity threshold (must be 1 or higher)
         interval: 20,  // number = milliseconds for onMouseOver polling interval
         over: doOpen,   // function = onMouseOver callback (REQUIRED)
         timeout: 20,   // number = milliseconds delay before onMouseOut
         out: doClose    // function = onMouseOut callback (REQUIRED)
    };
    function doOpen() {
        //$(this).addClass("is-pressed");
        $('a[rel]',this).addClass('sub-select');
        $('ul:first',this).addClass('is-shown');
    }
    function doClose() {
        $('a[rel]',this).removeClass('sub-select');
        $('ul:first',this).removeClass('is-shown');
    }
    $("ul#menu-main-navigation li").hoverIntent(config);

    $('#menu-toggle__target').click(function(){
	    $(this).toggleClass('is-pressed');
      $(this).toggleClass('toggle-position');
      $('#search-toggle').toggleClass('toggle-position-search');
    });

	// Slide out side menu
	$('#menu-toggle__target').sidr({
      name: 'sidr-main',
      source: '.site-naviagtion',
      side: 'right'
    });

    // Silde out sub-menu toggle
    $('.sidr-class-toggle__target a[rel]').click(function() {
    //$('.open-sub').click(function() {
    	$(this).toggleClass('is-pressed');
	    $(this).next().toggleClass('is-shown');
	    return false;
    });

    //Search Reveal
	$('#search-toggle').click(function() {
		  $(this).toggleClass('is-pressed');
	    $('#main-search-reveal').toggleClass('is-open');
	    return false;
	 });

  /* PLaceholder Polyfill
	---------------------------------- */
  $('input, textarea').placeholder();


	/* Article Sorting
	---------------------------------- */
	$(window).load(function(){
		var $container = $('#sort-container')
		// initialize Isotope
		$container.isotope({
		// options...
	    resizable: true, // disable normal resizing
	    // set columnWidth to a percentage of container width
	    layoutMode : 'fitRows',
	    masonry: { rowHeight: 360, columnWidth: $container.width() / 12 }
		});
		// update columnWidth on window resize
		$(window).smartresize(function(){
			$container.isotope({
				// update columnWidth to a percentage of container width
				layoutMode : 'fitRows',
				masonry: {
				rowHeight: 360,
				columnWidth: $container.width() / 12
				 }
			});
		});
	});


  ( function( $, window, document, undefined )
  {
      'use strict';

      var $list       = $( '.rw' ),
          $items      = $list.find( '.equal-cols' ),
          setHeights  = function()
          {
              $items.css( 'height', 'auto' );

              var perRow = Math.floor( $list.width() / $items.width() );
              if( perRow == null || perRow < 2 ) return true;

              for( var i = 0, j = $items.length; i < j; i += perRow )
              {
                  var maxHeight   = 0,
                      $row        = $items.slice( i, i + perRow );

                  $row.each( function()
                  {
                      var itemHeight = parseInt( $( this ).outerHeight() );
                      if ( itemHeight > maxHeight ) maxHeight = itemHeight;
                  });
                  $row.css( 'height', maxHeight );
              }
          };

      setHeights();
      $( window ).on( 'resize', setHeights );

  })( jQuery, window, document );

	/* Fit Vid
	---------------------------------- */
  $("#featured-home__video").fitVids();
  $(".mf-section--video .post-tile").fitVids();
	$("#article-content").fitVids();
  $(".featured-home-media").fitVids();
  $(".site-content").fitVids();

});
