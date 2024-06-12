/**
 * WordPress dependencies
 */
// import { store, getContext } from '@wordpress/interactivity';
import domReady from '@wordpress/dom-ready';

const initialize = () => {
	'use strict';

	const root = document.querySelector( '.api-fetch' );

	if ( ! root ) {
		console.error( 'Repo element not found' );
		return;
	}

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
};

if ( typeof window !== 'undefined' ) {
	domReady( initialize );
}

// store( 'create-block', {
// 	actions: {
// 		toggle: () => {
// 			const context = getContext();
// 			context.isOpen = ! context.isOpen;
// 		},
// 	},
// 	callbacks: {
// 		logIsOpen: () => {
// 			const { isOpen } = getContext();
// 			// Log the value of `isOpen` each time it changes.
// 			console.log( `Is open: ${ isOpen }` );
// 		},
// 	},
// } );
