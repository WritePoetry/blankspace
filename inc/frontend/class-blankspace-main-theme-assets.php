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
use function WritePoetry\BlankSpace\Helpers\scandir;


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
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();
			
			// Get the theme name.
			$this->theme_name = Theme_Config::template_name();
			$this->is_child_theme = false;
			$this->assets_folder = trim( apply_filters( 'blankspace_assets_path', 'assets' ), '/' );
				
			add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ) );
		}

		/**
		 * Load Parent theme front-end assets.
		 *
		 * @return void
		 */
		public function load_assets() {
 			$path = get_template_directory() . '/' . $this->assets_folder;

			// Check if the path exists.
			if ( ! is_dir( $path ) ) {
				return;
			}

			// Get the CSS and JS files from the child theme.
			$js_files = (array) scandir( $path, 'js', -1 );
			$css_files = (array) scandir( $path, 'css', -1 );
					 
			$this->enqueue_theme_assets( $js_files, $css_files, $this->theme_name, $this->is_child_theme );


			// Load active plugin assets.
			// $this->load_plugins_assets( $this->theme_name );
		}
		
		
		private function get_files( $file_path ) {	
			// Get the asset files.
			$asset_path = get_parent_theme_file_path( $file_path );
			return $this->get_dependencies_files_from_folder( $asset_path );			
		}
	}
endif;
