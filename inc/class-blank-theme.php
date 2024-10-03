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

			// Loads wp-content/languages/themes/writewhite-it_IT.mo.
			load_theme_textdomain( 'writewhite', trailingslashit( WP_LANG_DIR ) . 'themes' );

			// Loads wp-content/themes/writewhite/languages/it_IT.mo.
			load_theme_textdomain( 'writewhite', get_template_directory() . '/languages' );

			// Make theme available for translation.
			load_theme_textdomain( 'writewhite' );
			if ( ! 'writewhite' === wp_get_theme()->get( 'TextDomain' ) ) {
				// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
				load_theme_textdomain( 'writewhite', get_stylesheet_directory() . '/languages' );

				load_theme_textdomain( wp_get_theme()->get( 'TextDomain' ) );
			}

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

			/**
			 * Add support for responsive embedded content.
			 */
			add_theme_support( 'post-thumbnails' );
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
