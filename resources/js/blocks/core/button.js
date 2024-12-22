import domReady from '@wordpress/dom-ready';

domReady( function () {
 
    document.querySelectorAll( '.back-history' ).forEach( button => {
        button.addEventListener('click', ( event ) => {
            event.preventDefault();
            
            // Check if there is a history to go back to
            window.history.back();
        });
    });
} );