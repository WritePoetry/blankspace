<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Enqueue_Additional_Assets
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.5
 */

namespace WritePoetry\BlankSpace;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Enqueue_Additional_Assets' ) ) :

	/**
	 * The Assets utilities class
	 */
	class Enqueue_Additional_Assets extends Assets {
	
		

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();

			if ( apply_filters( "blankspace_enable_dashicons", false ) ) {
				add_action( 'wp_enqueue_scripts', array( $this, 'load_dashicons' ) );
			}
		}

		/**
		 * Load Dashicons official icon font.
		 *
		 * @return void
		 */
		public function load_dashicons() {
			// Enqueue icon font.
			wp_enqueue_style( 'dashicons' );
		}
	}
endif;
