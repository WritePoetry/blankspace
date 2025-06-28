<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Main_Theme_Assets
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankSpace;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Main_Theme_Assets' ) ) :

	/**
	 * The Assets class
	 */
	class Main_Theme_Assets extends Assets {
		/**
		 * The theme name.
		 *
		 * @var string
		 */
		private $theme_name;
		
		/**
		 * Is child theme.
		 *
		 * @var bool
		 */
		private $is_child_theme;

		/**
		 * The assets folder.
		 *
		 * @var string
		 */
		private $assets_folder;

		/**
		 * The theme version.
		 *
		 * @var string
		 */
		private $theme_version;

		/**
		 * The theme path.
		 *
		 * @var string
		 */
		private $theme_path;

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();
			
			// Get the theme name.
			$this->theme_name = Theme_Config::template_name();
			$this->theme_version = Theme_Config::version();
			$this->is_child_theme = false;
			$this->theme_path = Theme_Config::directory();
			$this->assets_folder = trim( apply_filters( 'blankspace_assets_path', 'assets' ), '/' );

			add_action( 'wp_enqueue_scripts', function( ) {
				// Load the assets from the theme folder.
				$this->load_assets( $this->theme_path, $this->theme_name, $this->theme_version, $this->is_child_theme );
			}, 10, 1 );
		}

		
		
	
	}
endif;
