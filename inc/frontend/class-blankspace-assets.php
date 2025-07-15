<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Assets
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
		 * The path to the blocks scripts assets directory.
		 *
		 * @var string
		 */
		protected $blocks_scripts_path;
		
		/**
		 * The path to the blocks styles assets directory.
		 *
		 * @var string
		 */
		protected $blocks_styles_path;
		
		
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
			$this->blocks_styles_path = apply_filters( 'blank_theme_blocks_styles_asset_path', $this->assets_path . '/css/blocks' );
			$this->blocks_scripts_path = apply_filters( 'blank_theme_blocks_scripts_asset_path', $this->assets_path . '/js/blocks' );
			
			$this->plugins_assets_path = apply_filters( 'blank_theme_plugins_styles_asset_path', $this->assets_path . '/css/plugins' );

			$this->assets_js_path  = apply_filters( 'blank_theme_js_asset_path', $this->assets_path . '/js/' );
			$this->assets_css_path = apply_filters( 'blank_theme_css_asset_path', $this->assets_path . '/css/' );
		
			// Get the active plugins list.
			$this->active_plugins = get_option( 'active_plugins' );
		}
		
		/**
		 * Filter RTL files based on the current language direction.
		 *
		 * @param array $all_files The list of all files.
		 *
		 * @return array The filtered list of files.
		 */	
		public function filter_rtl_files( array $all_files ): array {
			// Use array_filter to conditionally return the right files based on is_rtl(),
			return array_filter( $all_files, function ( $file ) {
				return strpos( $file, '-rtl.css' ) === ( is_rtl() ? 0 : false );
			} );
		}
			
		
		/**
		 * Enqueue JavaScript assets.
		 *
		 * @param array  $scripts		The asset files to enqueue.
		 * @param string $theme_name	The handle for the enqueued script.
		 * @param bool   $is_child_theme Whether this is a child theme.
		 */
		public function enqueue_scripts(array $scripts, string $theme_name, bool $is_child_theme ): void {
			
			$this->enqueue_assets(
				files: $scripts,
				theme_name: $theme_name,
				is_child_theme: $is_child_theme,
				base_path: $this->assets_js_path,
				callback: function( $handle, $src, $dependencies, $version ) {
					wp_enqueue_script(
						$handle,
						$src,
						$dependencies,
						$version,
						true, // in_footer
						'defer', // strategy
					);
					// wp_script_add_data($handle, 'strategy', 'defer');
				}
			);
		}
		
		/**
		 * Enqueue CSS assets.
		 *
		 * @param array  $styles The asset files to enqueue.
		 * @param string $theme_name      The handle for the enqueued stylesheet.
		 */
		public function enqueue_styles(array $styles, string $theme_name, bool $is_child_theme ): void {
			$this->enqueue_assets(
				files: $styles,
				theme_name: $theme_name,
				is_child_theme: $is_child_theme,
				base_path: $this->assets_css_path,
				callback: function( $handle, $src, $dependencies, $version ) {
					wp_enqueue_style(
						$handle,
						$src,
						$dependencies,
						$version
					);
				}
			);
		}
		
		/**
		 * Private unified asset handler.
		 *
		 * @param array    $files The files to enqueue.
		 * @param string   $theme_name The theme name for handle prefix.
		 * @param bool     $is_child_theme Whether this is a child theme.
		 * @param string   $base_path Base path for the assets.
		 * @param callable $enqueue_callback Function to handle the actual enqueuing.
		 */
		private function enqueue_assets(
			array $files,
			string $theme_name,
			bool $is_child_theme,
			string $base_path,
			callable $callback
		): void {
			foreach ( $files as $file => $asset ) {
				$filename = pathinfo( $file, PATHINFO_FILENAME );
				
				// Skip files starting with underscore.
				if ( $filename[0] === '_' ) {
					continue;
				}
				
				$handle = $theme_name . '-' . $filename;
				$relative_path = trailingslashit( $base_path ) . $file;
				
				$src = $is_child_theme 
					? get_theme_file_uri( $relative_path ) 
					: get_parent_theme_file_uri( $relative_path );

				$callback(
					$handle,
					$src,
					$asset['dependencies'] ?? [],
					$asset['version'] ?? false
				);
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
		 * Get JS files from a folder.
		 *
		 * @param string $file_path The path to the folder.
		 *
		 * @return mixed The list of files.
		 */
		public function get_js_files_from_folder( $file_path ) {
			$search_pattern = '*/*.js';

			return $this->get_files_from_folder( $file_path, $search_pattern );
		}
		
		

		/**
		 * Load and enqueue all theme assets (JS and CSS).
		 * 
		 * @param string $path The base path to assets directory.
		 * @param string $theme_name The theme name for handle prefixing.
		 * @param string $theme_version Version number for cache busting.
		 * @param bool $is_child_theme Whether we're loading child theme assets.
		 */
		public function load_assets(
			string $path,
			string $theme_name,
			string $theme_version,
			bool $is_child_theme
		): void {
			$js_path = trailingslashit( $path ) . $this->assets_js_path;
			$css_path = trailingslashit( $path ) . $this->assets_css_path;

			$js_metadata = $this->get_assets_metadata( $js_path, 'js', $theme_version );
			$css_metadata = $this->get_assets_metadata( $css_path, 'css', $theme_version );

			// Early return if no metadata found.
			if ( ! empty( $js_metadata ) ) {
				$this->enqueue_scripts( $js_metadata, $theme_name, $is_child_theme );
			}

			if ( ! empty( $css_metadata ) ) {
				$this->enqueue_styles( $css_metadata, $theme_name, $is_child_theme );
			}
		}
		
		/**
		 * Scan a directory for assets and their associated metadata.
		 *
		 * Searches for .asset.php files to gather dependencies and version information,
		 * and falls back to theme version or file modification time for unregistered assets.
		 *
		 * @since 1.0.0
		 *
		 * @param string $path           Absolute path to the directory containing assets.
		 * @param string $extension The file extension to look for (js, css, etc.). Default 'js'.
		 * @param string $theme_version  Fallback version string if no asset version is provided.
		 * @return array Associative array of asset files with their metadata.
		 */
		public function get_assets_metadata( $path = null, $extension = 'js', $theme_version = null ) {
			// Normalize the path and ensure a trailing slash.
			$path = untrailingslashit( wp_normalize_path( $path ) );
			
			// Check if the path exists.
			if ( ! is_dir( $path ) ) {
				return;
			}

			\add_filter( 'blankspace_theme_scandir_exclusions', function ( $exclusions ) {
				// Add new exclusions for blocks and plugins.
				$new_exclusions = array(
					'blocks',
					'plugins',
					'admin',
				);

				// Merge existing exclusions with new ones.
				return array_merge( $exclusions, $new_exclusions );
			} );

	
			// Get all files in the directory.
			$all_files = ( array ) scandir( $path, null, -1 );

			if ( empty( $all_files ) ) {
				return;
			}

			// Filter RTL files if the extension is CSS.
			if ( 'css' === $extension ) {
				$all_files = $this->filter_rtl_files( $all_files );
			}
			
			// Arrays to hold files to be loaded.
			$assets_metadata = array();
			$processed_files = array();

			foreach ( $all_files as $key => $file ) {
				$file_ext = pathinfo( $file, PATHINFO_EXTENSION );
		 
				// Process asset files first.
				if ( 'php' === $file_ext || 
					false !== strpos( $file, '.asset.php' ) ) {
					
					if ( ! file_exists( $file ) && ! is_readable( $file ) ) {
						continue;
					} 

					$asset = include $file;
					

					if ( ! is_array( $asset ) ) {
						continue;
					}

					// Replace the '.asset.php' suffix with the target extension from the file name.
					$filename = str_replace( '.asset.php', '.' . $extension, $file );
					
						
					if ( ! in_array( $filename, $all_files ) ) {
						continue;
					}
					
					$k = str_replace( 'asset.php', '', $key ) . $extension;

					// Merges asset metadata with fallback values (empty deps, theme/file version, or current timestamp) and tracks processed files.
					$assets_metadata[$k] = wp_parse_args( $asset, array(
						'dependencies' => array(),
						'version' => $theme_version ?: ( file_exists( $filename ) ? filemtime( $filename ) : time() )
					) );

					$processed_files[] = $filename;
						
					continue;
				}

				// Case 2: Process target extension files not already processed
				if ( $file_ext === $extension && ! in_array( $file, $processed_files, true ) ) {
				
					$assets_metadata[$key] = array(
						'dependencies' => array(),
						'version' => $theme_version ?: ( file_exists( $file ) ? filemtime( $file ) : time() )
					);
				}
			}

			return $assets_metadata;
		}
			
		/**
		 * Get files from a folder.
		 *
		 * @param string $file_path The path to the folder.
		 * @param string $search_pattern The search pattern.
		 *
		 * @return array The list of files.
		 */
		public function get_files_from_folder($file_path, $search_pattern = '*.txt') {
			// Normalizza i separatori di percorso
			$normalized_path = wp_normalize_path(rtrim($file_path, '/\\'));
			
			// Verifica che la directory esista
			if ( ! is_dir( $normalized_path ) ) {
				return [];
			}
			
			try {
				$directory = new \RecursiveDirectoryIterator(
					$normalized_path,
					\FilesystemIterator::SKIP_DOTS | \FilesystemIterator::UNIX_PATHS
				);
				
				$iterator = new \RecursiveIteratorIterator( $directory );
				$files = [];
				
				// Converti il pattern glob in regex
				$regex_pattern = preg_quote( $search_pattern, '/' );
				$regex_pattern = str_replace( '\*', '.*', $regex_pattern );
				$regex_pattern = '/^' . str_replace( '\.', '\.', $regex_pattern) . '$/';
				
				foreach ( $iterator as $file ) {
					if ( $file->isFile() && preg_match($regex_pattern, $file->getFilename() ) ) {
						$files[] = $file->getPathname();
					}
				}
				
				return $files;
				
			} catch ( UnexpectedValueException $e ) {
				// Logga l'errore se necessario
				error_log( 'Directory access error: ' . $e->getMessage() );
				return [];
			}
		}
		/**
		 * Load plugin related assets.
		 *
		 * @return void
		 */
		public function load_plugins_assets( $theme_name ) {
			

			
			// Check if there are active plugins.
			foreach ( $this->active_plugins as $plugin ) {
				$plugin_dir = dirname( $plugin );
				$plugin_path ='plugins/' . $plugin_dir . '/';
				$css_path = $this->assets_css_path . $plugin_path;
				$js_path = $this->assets_js_path . $plugin_path;
				
 
				
				// Load plugin related assets.
				// $this->enqueue_styles( $css_path, $theme_name );
				// $this->enqueue_scripts( $js_path, $theme_name );
			}

		}
	}
endif;
