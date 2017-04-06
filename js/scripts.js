$(window).load(function() {
	/* When the page has loaded show the category
	---------------------------------------------
	This avoids the flags loading in the top left of the browser whilst witing for isotope to finish */
	$(".tag-highlight").show();
	$(".category-northern-quarter").show();
});

$(document).ready(function(){

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
	$("#article-content").fitVids();

});
