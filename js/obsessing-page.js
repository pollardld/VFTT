jQuery('.tax-filter').on( 'click', function(e) {

    e.preventDefault();

    if ( jQuery(this).hasClass( 'current' ) ) {
        
        location.reload(true);
    
    } else {

        // Get tag slug from title attirbute
        var selected_category = jQuery(this).attr('rel'),
            selected_term = jQuery(this).attr('title');

        jQuery('.items').fadeOut();

        jQuery.ajax( {
            type: 'post',
            dataType: 'json',
            url: afp_vars.afp_ajax_url,
            data: {
                action: 'obsessing_posts',
                afp_nonce: afp_vars.afp_nonce,
                term: selected_term,
                taxcat: selected_category,
            },
            success: function( data, textStatus, XMLHttpRequest ) {
                jQuery('.items').html( data.response );
                jQuery('.items').fadeIn();
                // console.log( data );
                // console.log( XMLHttpRequest );
            },
            error: function( MLHttpRequest, textStatus, errorThrown ) {
                // console.log( MLHttpRequest );
                // console.log( textStatus );
                // console.log( errorThrown );
                jQuery('.items').html( 'No posts found' );
                jQuery('.items').fadeIn();
            }
        });

        // add current class and x
        jQuery(' .tax-filter' ).removeClass('current');
        jQuery( '.height-auto' ).removeClass( 'height-fiftyfive' );
        jQuery( '.remove-obsession-cat' ).remove();
        jQuery(this).addClass('current');
        jQuery( '.height-auto' ).addClass( 'height-fiftyfive' );
        
        // add exit x
        jQuery(this).after( '<button class="remove-obsession-cat"></button>');

        // add x event handler
        jQuery( '.remove-obsession-cat' ).on( 'click', function() {
            location.reload(true);
        });
    }
});