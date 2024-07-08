<?php
/**
 * Blank Theme Class
 *
 * @since    0.0.1
 * @package  Blank_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Blank_Theme' ) ) :

	/**
	 * The main Twenties class
	 */
	class Blank_Theme {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'init', array( $this, 'register_block_bindings' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {
			/*
			 * Load Localisation files.
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

			// Loads wp-content/languages/themes/storefront-it_IT.mo.
			load_theme_textdomain( 'twenties', trailingslashit( WP_LANG_DIR ) . 'themes' );

			// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
			load_theme_textdomain( 'twenties', get_stylesheet_directory() . '/languages' );

			// Loads wp-content/themes/storefront/languages/it_IT.mo.
			load_theme_textdomain( 'twenties', get_template_directory() . '/languages' );




			// Add support for block styles.
			add_theme_support( 'wp-block-styles' );



			/**
			 * Add support for editor styles.
			 */
			add_theme_support( 'editor-styles' );


			/**
			 * Enqueue editor styles.
			 */
			// add_editor_style( 'style.css' );


			/**
			 * Add support for responsive embedded content.
			 */
			add_theme_support( 'responsive-embeds' );
 		}



		public function register_block_bindings() {
			register_block_bindings_source( 'twenties/copyright', array(
				'label'              => __( 'Copyright', 'twenties' ),
				'get_value_callback' => array( $this, 'copyright_binding' )
			) );
		}

		public function copyright_binding() {
			return '&copy; ' . date( 'Y' );
		}
	}
endif;

return new Blank_Theme();




/**
 * Copy the following lines in your functions.php theme file
 * if you want to remove some particular mime type
 * added by this plugin
 */

add_filter(
	'upload_mimes',
	function ( $mimes ) {
		// Optional. Remove a mime type.
		unset( $mimes['exe'] );
		unset( $mimes['svg'] );
		unset( $mimes['svgz'] );

		return $mimes;
	}
);

add_filter(
	'mime_types',
	function ( $wp_get_mime_types ) {
		// Optional. Remove a mime type.
		unset( $wp_get_mime_types['exe'] );
		unset( $wp_get_mime_types['svg'] );
		unset( $wp_get_mime_types['svgz'] );

		return $wp_get_mime_types;
	}
);
