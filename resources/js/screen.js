/**
 * WordPress dependencies
 */
import domReady from '@wordpress/dom-ready';

const initialize = () => {
	'use strict';

	const apiFetch = document.getElementsByClassName( 'api-fetch' );

	if ( ! apiFetch.length ) {
		console.error( 'Repo element not found' );
		return;
	}
	
	Array.from( apiFetch ).forEach(( root ) => {
		
		// Get repo from data attribute
		const url = root.getAttribute( 'data-api-url' );
		const link = root.getAttribute( 'data-api-link' );
		const text = root.getAttribute( 'data-api-text' );

		// Get the github repo latest release version from GitHub
		fetch( url )
			.then( ( response ) => response.json() )
			.then( ( data ) => {
				const element = document.createElement( 'a' );

				if ( ! element ) {
					console.error( 'Version element not found' );
					return;
				}

				element.textContent = data[ text ];
				element.href = data[ link ];

				root.appendChild( element );
			} )
			.catch( ( error ) => console.error( error ) );
	});
};

if ( typeof window !== 'undefined' ) {
	domReady( initialize );
}

