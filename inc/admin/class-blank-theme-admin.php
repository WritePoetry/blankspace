<?php
/**
 * Blank Theme Admin Class
 *
 * @since    0.0.6
 * @package  Blank_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Blank_Theme_Admin' ) ) :

	/**
	 * The main Twenties class
	 */
	class Blank_Theme_Admin extends Blank_Theme_Frontend_Assets {

		/**
		 * Setup class.
		 *
		 * @since 0.0.6
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'editor_styles' ) );

			add_action( 'enqueue_block_editor_assets', array( $this, 'editor_assets' ) );
		}


		// Load editor stylesheets.
		public function editor_styles() {
             
			add_editor_style( [
				get_theme_file_uri( 'assets/css/screen.css' )
			] );
		}

		// Load editor scripts.
		public function editor_assets() {

			
			// $script_asset = include get_theme_file_path( 'assets/js/editor.asset.php'  );
			// $style_asset  = include get_theme_file_path( 'assets/css/editor.asset.php' );

			// wp_enqueue_script(
			// 	'themeslug-editor',
			// 	get_theme_file_uri( 'assets/js/editor.js' ),
			// 	$script_asset['dependencies'],
			// 	$script_asset['version'],
			// 	true
			// );

            // wp_enqueue_style(
			// 	"$blank_theme->name-editor",
			// 	get_theme_file_uri( 'assets/css/editor.css' ),
			// 	$style_asset['dependencies'],
			// 	$style_asset['version']
			// );
		}
	}
endif;

return new Blank_Theme_Admin();

