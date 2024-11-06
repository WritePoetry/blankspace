<?php
/**
 * Ajax Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Ajax
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

 namespace WritePoetry\BlankSpace;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Ajax' ) ) :

	/**
	 * The Ajax class
	 */
	class Ajax {
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

			wp_localize_script( 'blankspace-frontend-ajax', 'blankspace_frontend_ajax_object', $params );
			
			// example in js file
			// Get the pagination from the server
			// let params = new URLSearchParams( {
			// 	action:  'pagination'
			// } );

			// fetch( `${blankspace_frontend_ajax_object.ajaxurl}?${params}`)
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


