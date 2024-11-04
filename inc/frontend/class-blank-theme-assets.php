<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankTheme
 * @subpackage        WritePoetry/BlankTheme/Assets
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankTheme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Assets' ) ) :

	/**
	 * The Assets class
	 */
	class Assets {
		/**
		 * The path to the assets directory.
		 *
		 * @var string
		 */
		protected $assets_path;

		/**
		 * The path to the css directory.
		 *
		 * @var string
		 */
		protected $assets_js_path;

		/**
		 * The path to the js directory.
		 *
		 * @var string
		 */
		protected $assets_css_path;

		/**
		 * The path to the blocks assets directory.
		 *
		 * @var string
		 */
		protected $blocks_assets_path;
		
		
		/**
		 * The path to the plugins assets directory.
		 *
		 * @var string
		 */
		protected $plugins_assets_path;

		/**
		 * The list of active plugins.
		 *
		 * @var array
		 */
		protected $active_plugins;
		

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			// Get the base assets path using a filter hook.
			$this->assets_path = apply_filters( 'blank_theme_asset_path', 'assets' );

			// This allows customization of the path through the 'blank_theme_blocks_styles_asset_path' filter.
			$this->blocks_assets_path = apply_filters( 'blank_theme_blocks_styles_asset_path', $this->assets_path . '/css/blocks' );
			$this->plugins_assets_path = apply_filters( 'blank_theme_plugins_styles_asset_path', $this->assets_path . '/css/plugins' );

			$this->assets_js_path  = apply_filters( 'blank_theme_js_asset_path', $this->assets_path . '/js/' );
			$this->assets_css_path = apply_filters( 'blank_theme_css_asset_path', $this->assets_path . '/css/' );
		
			// Get the active plugins list.
			$this->active_plugins = get_option( 'active_plugins' );
		}
		
			
		public function filter_rtl_files( $all_files) {
			// Use array_filter to conditionally return the right files based on is_rtl()
			return array_filter( $all_files, function ( $file ) {
				return strpos( $file, '-rtl.css' ) === ( is_rtl() ? 0 : false );
			} );
		}
		
		/**
		 * Enqueue JavaScript assets.
		 *
		 * @param array  $asset_files The asset files to enqueue.
		 * @param string $handle      The handle for the enqueued script.
		 */
		public function enqueue_js_assets( $asset_files, $handle ) {
			$this->enqueue_assets( $asset_files, $handle, 'js' );
		}
		
		/**
		 * Enqueue CSS assets.
		 *
		 * @param array  $asset_files The asset files to enqueue.
		 * @param string $handle      The handle for the enqueued stylesheet.
		 */
		public function enqueue_css_assets( $asset_files, $handle ) {
			$this->enqueue_assets( $asset_files, $handle, 'css' );
		}
		
		
		/**
		 * Load theme related assets.
		 *
		 * @return void
		 */
		public function load_theme_assets( $js_files, $css_files, $theme_name) {

			$this->enqueue_js_assets( $js_files, $theme_name );
			$this->enqueue_css_assets( $css_files, $theme_name );
		}
	   
 
		/**
		 * Load front-end assets.
		 *
		 * @param string $path The path to the assets.
		 * @param string $file_extension The file_extension of assets to load ('css' or 'js').
		 *
		 * @return void
		 */
		private function enqueue_assets( $asset_files, $stylesheet, $assets_type = 'css' ) {
			foreach ( $asset_files as $asset_file ) {
				// Get file extension.
				$file_extension = pathinfo( $asset_file, PATHINFO_EXTENSION );
				
				if ( 'php' === $file_extension ) {
					$asset = include $asset_file;

					$file_name = basename( $asset_file, '.asset.php' );
				} else {
					$file_name = basename( $asset_file, ".$file_extension" );
				}


				$handle = "$stylesheet-$file_name";
				
				$src = get_theme_file_uri( "$this->assets_css_path$file_name.$assets_type" );

				$params = array(
					$handle,
					$src,
					$asset['dependencies'],
					$asset['version'],
				);
				
				if ( 'css' === $assets_type ) {
					// Enqueue theme stylesheet.
					wp_enqueue_style( ...$params );
				}

				if ( 'js' === $assets_type ) {
					// Pass the script $args as parameters.
					$params[] = $args = array(
						'in_footer' => true,
						'strategy'  => 'defer',
					);

					// Enqueue theme scripts.
					wp_enqueue_script( ...$params );
				}
			}
		}
		
		/**
		 * Get CSS files from a folder.
		 *
		 * @param string $file_path The path to the folder.
		 *
		 * @return mixed The list of files.
		 */
		public function get_css_files_from_folder( $file_path ) {
			$search_pattern = '*/*.css';

			return $this->get_files_from_folder( $file_path, $search_pattern );
		}
		
		/**
		 * Get dependencies files from a folder.
		 *
		 * @param string $file_path The path to the folder.
		 *
		 * @return mixed The list of files.
		 */
		public function get_dependencies_files_from_folder( $file_path ) {
			$search_pattern = '*.asset.php';

			
			return $this->get_files_from_folder( $file_path, $search_pattern );
		}
			
		/**
		 * Get files from a folder.
		 *
		 * @param string $file_path The path to the folder.
		 * @param string $search_pattern The search pattern.
		 *
		 * @return array The list of files.
		 */
		public function get_files_from_folder( $file_path, $search_pattern = '*.txt' ) {
			// check if the path is not ending with a slash.
			$pattern = rtrim( $file_path, '/' ) . '/' . $search_pattern;

			// Get files.
			return glob( $pattern );
		}
		
		/**
		 * Load plugin related assets.
		 *
		 * @return void
		 */
		public function load_plugins_assets( $theme_name ) {
			
			var_dump($this->get_css_files_from_folder( get_parent_theme_file_path($this->assets_css_path )));
 			
			// Check if there are active plugins.
			foreach ( $this->active_plugins as $plugin ) {
				$plugin_dir = dirname( $plugin );
				$plugin_path ='plugins/' . $plugin_dir . '/';
				$css_path = $this->assets_css_path . $plugin_path;
				$js_path = $this->assets_js_path . $plugin_path;
				
 
				
				// Load plugin related assets.
				$this->enqueue_css_assets( $css_path, $theme_name );
				$this->enqueue_js_assets( $js_path, $theme_name );
			}

		}
	}
endif;
