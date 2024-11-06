<?php
/**
 * Main Init Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Theme
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.1
 */

namespace WritePoetry\BlankSpace;

/**
 * Main Init class
 */

if ( ! class_exists( 'Setup' ) ) :

	class Setup {
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

			// Loads wp-content/languages/themes/blankspace-it_IT.mo.
			load_theme_textdomain( 'blankspace', trailingslashit( WP_LANG_DIR ) . 'themes' );

			// Loads wp-content/themes/blankspace/languages/it_IT.mo.
			load_theme_textdomain( 'blankspace', get_template_directory() . '/languages' );

			// Make theme available for translation.
			load_theme_textdomain( 'blankspace' );
			if ( ! 'blankspace' === wp_get_theme()->get( 'TextDomain' ) ) {
				// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
				load_theme_textdomain( 'blankspace', get_stylesheet_directory() . '/languages' );

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
