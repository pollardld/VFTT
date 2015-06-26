/*  =====================================
	Mobile Header Class
=====================================  */
function navChange() {
  	if ( jQuery(window).width() < 800 ) {
    	if ( !jQuery( 'header' ).hasClass( 'mobilenav' ) ) {
	    	jQuery( 'header' ).addClass( 'mobilenav' );
  		}
  	} else {
  		if ( jQuery( 'header' ).hasClass( 'mobilenav' ) ) {
  			jQuery( 'header' ).removeClass( 'mobilenav' );
  		}	
  	}
}

// Open Main Menu
function openNavicon() {
	if ( !jQuery( '.mobilenav' ).hasClass( 'navicon-open' ) ) {
		jQuery( '.mobilenav').addClass( 'navicon-open' );
	} else {
		jQuery( '.mobilenav').removeClass( 'navicon-open' );
	}
}

// Open Sub Menu
function openSubMenu() {
	if ( !jQuery( '.sub-menu' ).hasClass( 'show' ) ) {
		jQuery(this).find( '.sub-menu' ).addClass( 'show' );
	} else {
		jQuery( '.sub-menu' ).removeClass( 'show' );
	}
	jQuery(this).toggleClass('hit');
}

navChange();
jQuery(window).resize( navChange );

// Open Nav Tap
jQuery( '.navicon' ).on( 'click', openNavicon );

// Open Sub Tap
jQuery( '.menu-item-has-children' ).on( 'click', openSubMenu );

// Open Footer Sub Nav 
jQuery( 'footer .menu-item-has-children' ).on( 'click', function() {
	jQuery(this).toggleClass( 'hover' );
});

/*  =====================================
	Seach
=====================================  */

var searchField = document.querySelector('.search-field');
searchField.placeholder='Search';

/*  =====================================
	Zoom
=====================================  */

jQuery(document).ready(function() {

	jQuery('.zoom').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: false
		}
	});

	jQuery('.insta-zoom').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: false
		}
	});
	
});

/*  =====================================
	Mobile Tap
=====================================  */

function addHover() {
	if ( !jQuery(this).hasClass( 'hover' ) ) {
		jQuery(this).addClass( 'hover' );
	} else {
		jQuery(this).removeClass( 'hover' );
	}
}

jQuery( '.main .post-content' ).on( 'click', addHover );
jQuery( '.main .item' ).on( 'click', addHover );


/*  =====================================
	Sidebar Open
=====================================  */

jQuery( '.sidebar-content h2' ).on( 'click', function() {
	jQuery( '.sidebar-content' ).toggleClass( 'height-auto' );
});

jQuery( '.obsessing-over-sidebar-one h2' ).on( 'click', function() {
	jQuery( '.obsessing-over-sidebar-one' ).toggleClass( 'height-auto' );
});

jQuery( '.obsessing-over-sidebar-two h2' ).on( 'click', function() {
	jQuery( '.obsessing-over-sidebar-two' ).toggleClass( 'height-auto' );
});

jQuery( '.sidebar-topp-tags h2' ).on( 'click', function() {
	jQuery( '.sidebar-topp-tags' ).toggleClass( 'height-auto' );
});

jQuery( '.sidebar-search h2' ).on( 'click', function() {
	jQuery( '.sidebar-search' ).toggleClass( 'height-auto' );
});

/*  =====================================
	Waypoints
=====================================  */

jQuery(document).ready(function() {
	
	// Sticky
	jQuery( '.main' ).waypoint( function(direction) {
		if ( direction === "down" ) {
			jQuery( '.header-bg' ).addClass( 'stuck' );
		} else {
			jQuery( '.header-bg' ).removeClass( 'stuck' );
		}
	}, { offset : -50 });

});

// Sticky Topp Posts
var position = jQuery( '.topp-links-sidebar' ).position();

if ( jQuery(window).width() > 800 ) {	
	jQuery( '#topp-posts-target' ).waypoint( function(direction) {
		if ( direction === "down" ) {
			jQuery( '.topp-links-sidebar' ).addClass( 'stuck' );
			jQuery( '.topp-links-sidebar' ).css( 'left', position.left - 5 );
		} else {
			jQuery( '.topp-links-sidebar' ).removeClass( 'stuck' );
		}
	}, { offset : 80 });
}


jQuery(document).ready(function() {
	// Add class to pagination for infinite scroll
	jQuery( '.nav-next a').addClass( 'infinite-more-link' );

	jQuery('.infinite').waypoint( 'infinite', {
		container : '.infinite',
		items : '.infinite-item',
		offset : 'bottom-in-view',
		loadingClass : 'infinite-loading',
		onAfterPageLoad : function() {
			// Scroll Topp loves sidebar up two
			if ( jQuery( '.link2' ).length > 0 ) {
				jQuery( '.topp-link-content' ).addClass( 'next-two' );
			}
			jQuery( '.ad-wrapper:nth-child(28) .ad-1' ).addClass( 'display-none' );
			jQuery( '.ad-wrapper:nth-child(28) .ad-2' ).addClass( 'display-block' );
			// One more infinite scroll
			jQuery( '.nav-next a').addClass( 'infinite-more-link' );
			jQuery('.zoom').magnificPopup({
				type: 'image',
				closeOnContentClick: true,
				image: {
					verticalFit: false
				}
			});
			jQuery( '.main .post-content' ).on( 'click', addHover );
			jQuery( '.main .item' ).on( 'click', addHover );
			
			jQuery('.infinite').waypoint( 'infinite', {
				container : '.infinite',
				items : '.infinite-item',
				offset : 'bottom-in-view',
				loadingClass : 'infinite-loading',
				onAfterPageLoad : function() {
					if ( jQuery( '.link4' ).length > 0 ) {
						jQuery( '.topp-link-content' ).addClass( 'next-four' );
					}
					jQuery( '.ad-wrapper:nth-child(43) .ad-1' ).addClass( 'display-none' );
					jQuery( '.ad-wrapper:nth-child(43) .ad-2' ).addClass( 'display-none' );
					jQuery( '.ad-wrapper:nth-child(43) .ad-3' ).addClass( 'display-block' );
					jQuery( '.nav-next a').prepend( '<span class="pagination-box">More</span>' );
					jQuery('.zoom').magnificPopup({
						type: 'image',
						closeOnContentClick: true,
						image: {
							verticalFit: false
						}
					});
					jQuery( '.main .post-content' ).on( 'click', addHover );
					jQuery( '.main .item' ).on( 'click', addHover );
				}
			});
		}
	});

});

/*  =====================================
	Modal JS
=====================================  */

// Modal Window for about, friends, and press
var $modalWindow = jQuery( '.window-overlay' ),
	$modalBgClose = jQuery( '.window-bg' );
	$logo = jQuery( '.logo-block' ),
	$modalCloseLink = jQuery( '.close-modal' );

// Tap for mobile modal open
jQuery( '.modal-link' ).on( 'click', function() {
	
	jQuery( '.modal-link' ).removeClass( 'current-open' );
	jQuery(this).addClass( 'current-open' );
	jQuery( '.mobilenav').removeClass( 'navicon-open' );
	
	if( !$modalWindow.hasClass( 'window-open' ) ) {	
		$modalWindow.addClass( 'window-open' );
	}

	if( !$logo.hasClass( 'hidden' ) ) {
		$logo.addClass( 'hidden' );
	}
});


// Tap for mobile modal close
jQuery( $modalCloseLink ).on( 'click', function() {
	modalClose();
});

// Tap for mobile modal close on window overlay tap.
jQuery( $modalBgClose ).on( 'click', function() {
	modalClose();
});

function modalClose() {

	jQuery( '.modal-link' ).removeClass( 'current-open' );

	if( $modalWindow.hasClass( 'window-open' ) ) {	
		$modalWindow.removeClass( 'window-open' );
	}
	
	if( $logo.hasClass( 'hidden' ) ) {
		$logo.removeClass( 'hidden' );
	}
}

/*  =====================================
	Press Posts
=====================================  */
jQuery('.more').on( 'click', function(e) {

    e.preventDefault();

    var press_offset = jQuery(this).attr( 'data-posts' ),
        press_forward = jQuery( '.forward' ).attr( 'data-posts' ),
        press_back = jQuery( '.back' ).attr( 'data-posts' );

    jQuery('.press-container').fadeOut();

    jQuery.ajax( {
        type: 'post',
        dataType: 'json',
        url: afp_vars.afp_ajax_url,
        data: {
            action: 'press_posts',
            afp_nonce: afp_vars.afp_nonce,
            offset: press_offset,
        },
        success: function( data, textStatus, XMLHttpRequest ) {
            jQuery('.press-container').html( data.response );
            jQuery('.press-container').fadeIn();
            // console.log( data );
            // console.log( XMLHttpRequest );
        },
        error: function( MLHttpRequest, textStatus, errorThrown ) {
            // console.log( MLHttpRequest );
            // console.log( textStatus );
            // console.log( errorThrown );
            jQuery('.press-container').html( 'No posts found' );
            jQuery('.press-container').fadeIn();
        }
    });

    press_forward = parseInt( press_forward, 10 );
    press_back = parseInt( press_back, 10 );

    if ( jQuery(this).hasClass( 'forward' ) ) {
       
        jQuery( '.forward' ).attr( 'data-posts', press_forward + 6 );
        jQuery( '.back' ).attr( 'data-posts', press_back + 6 );
    
    } else if ( jQuery(this).hasClass( 'back' ) ) {

        jQuery( '.forward' ).attr( 'data-posts', press_forward - 6 );
        jQuery( '.back' ).attr( 'data-posts', press_back - 6 );

    }

    if ( jQuery( '.back' ).attr( 'data-posts' ) == "-6" ) {

        jQuery('.back').css( 'display', 'none' )
    
    } else {

        jQuery('.back').css( 'display', 'inline-block' )

    }

});

/*  =====================================
	Friends Posts
=====================================  */

jQuery('.more-friends').on( 'click', function(e) {

    e.preventDefault();

    var press_offset = jQuery(this).attr( 'data-posts' ),
        press_forward = jQuery( '.forward-friends' ).attr( 'data-posts' ),
        press_back = jQuery( '.back-friends' ).attr( 'data-posts' );

    jQuery('.friends-container').fadeOut();

    jQuery.ajax( {
        type: 'post',
        dataType: 'json',
        url: afp_vars.afp_ajax_url,
        data: {
            action: 'friends_posts',
            afp_nonce: afp_vars.afp_nonce,
            offset: press_offset,
        },
        success: function( data, textStatus, XMLHttpRequest ) {
            jQuery('.friends-container').html( data.response );
            jQuery('.friends-container').fadeIn();
            // console.log( data );
            // console.log( XMLHttpRequest );
        },
        error: function( MLHttpRequest, textStatus, errorThrown ) {
            // console.log( MLHttpRequest );
            // console.log( textStatus );
            // console.log( errorThrown );
            jQuery('.friends-container').html( 'No posts found' );
            jQuery('.friends-container').fadeIn();
        }
    });

    press_forward = parseInt( press_forward, 10 );
    press_back = parseInt( press_back, 10 );

    if ( jQuery(this).hasClass( 'forward-friends' ) ) {
       
        jQuery( '.forward-friends' ).attr( 'data-posts', press_forward + 6 );
        jQuery( '.back-friends' ).attr( 'data-posts', press_back + 6 );
    
    } else if ( jQuery(this).hasClass( 'back-friends' ) ) {

        jQuery( '.forward-friends' ).attr( 'data-posts', press_forward - 6 );
        jQuery( '.back-friends' ).attr( 'data-posts', press_back - 6 );

    }

    if ( jQuery( '.back-friends' ).attr( 'data-posts' ) == "-6" ) {

        jQuery('.back-friends').css( 'display', 'none' )
    
    } else {

        jQuery('.back-friends').css( 'display', 'inline-block' )

    }

});