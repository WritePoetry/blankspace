<?php
/**
 * Storefront NUX Admin Class
 *
 * @package  storefront
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Twenties_Ajax' ) ) :

	/**
	 * The Twenties Ajax class
	 */
	class Twenties_Ajax {
		/**
		 * Setup class.
		 *
		 * @since 2.2.0
		 */
		public function __construct() {
			add_action( 'wp_ajax_nopriv_pagination', array( $this, 'my_ajax_pagination' ) );
			add_action( 'wp_ajax_pagination', array( $this, 'my_ajax_pagination' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'localize_scripts' ) );
		}


		/**
		 * Set WooCommerce pages to use the full width template.
		 *
		 * @since 2.2.0
		 */
		public function localize_scripts() {
			$params = array(
				'ajaxurl'    => admin_url( 'admin-ajax.php' ),
				'data_var_1' => 'value 1',
				'data_var_2' => 'value 2',
			);

			wp_localize_script( 'twenties-frontend-ajax', 'twenties_frontend_ajax_object', $params );
			
			// example in js file
			// Get the pagination from the server
			// let params = new URLSearchParams( {
			// 	action:  'pagination'
			// } );

			// fetch( `${writewhite_frontend_ajax_object.ajaxurl}?${params}`)
			// 	.then( ( response ) => response.text() )
			// 	.then( data => console.log(data) )
			// 	.catch( ( error ) => console.error( error ) );
		}

		public function my_ajax_pagination() {

			echo get_bloginfo( 'title' );
			die();
		}
	}

endif;

return new Twenties_Ajax();
