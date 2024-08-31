<?php
/**
 * Blank Theme Frontend Class
 *
 * @since    0.0.1
 * @package  Blank_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Blank_Theme_Frontend_Blocks' ) ) :

	/**
	 * The main Twenties class
	 */
	class Blank_Theme_Frontend_Blocks {


		/**
		 * Setup class.
		 *
		 * @since 0.0.5
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'register_block_bindings' ) );
		}

		public function register_block_bindings () {
			
			$sources = array(
				'write-white/copyright' => array(
					'label' => __( 'Copyright', 'whritewhite' ),
					'get_value_callback' => array( $this, 'copyright_binding' ),
				),
				'write-white/admin-email' => array(
					'label' => __( 'Admin Email Address', 'whritewhite' ),
					'get_value_callback' => array( $this, 'email_address_binding' ),
				),
			);
			 
			
			foreach ( $sources as $source_name => $source_properties ) {
				register_block_bindings_source( $source_name, $source_properties );
			}
		}

		public function copyright_binding() {
			return '&copy; ' . date( 'Y' );
		}
		
		public function email_address_binding() {
			$admin_email = get_option( 'admin_email' );
			
			return '<a href="mailto:' . $admin_email .'">' . $admin_email . '</a>';
		}
	}
endif;

return new Blank_Theme_Frontend_Blocks();









