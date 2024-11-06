<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Styles
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankSpace;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Child_Theme_Assets' ) ) :

	/**
	 * The Assets class
	 */
	class Child_Theme_Assets extends Assets {
		
		private $theme_name;

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();
			
			// Get the theme name.
			$this->theme_name = get_stylesheet();
			add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ) );
		}

		/**
		 * Load front-end assets.
		 *
		 * @return void
		 */
		public function load_assets() {

			// Load theme assets.
			$css = $this->get_files( $this->assets_css_path, 'css' );
			$js = $this->get_files( $this->assets_js_path, 'js' );
			
			$this->load_theme_assets( $js, $css, $this->theme_name);

			// Get the active plugins list.
			// $this->load_plugins_assets( $this->theme_name );
		}
		
		
		private function get_files( $file_path, $file_type ) {
			// Get the asset files from the child theme.
			$child_asset_files = $this->get_dependencies_files_from_folder( get_theme_file_path( $file_path ) );	

			// Get the final files from the child theme.
			$child_files = $this->get_files_from_folder( 
				get_theme_file_path( $this->assets_css_path ) . "*.$file_type" 
			);
			
			// Filter CSS files to include only those without a corresponding .asset.php file.
			foreach ( $child_files as $child_file ) {
				$child_asset_file = str_replace( ".$file_type", '.asset.php', $child_file );
				if ( ! file_exists( $child_asset_file ) ) {
					$child_asset_files[] = $child_file;
				}
			}

			return $child_asset_files;
		}
	

	}
endif;
