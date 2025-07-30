<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Block_Assets
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

if ( ! class_exists( 'Block_Assets' ) ) :

	/**
	 * The Assets class
	 */
	class Block_Assets extends Assets {
		
		private $theme_name;
		
		private $theme_version;

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();

		 
			
			$this->theme_name = strtolower( Theme_Config::name() );
			$this->theme_version = Theme_Config::version();
			
			add_action( 'after_setup_theme', array( $this, 'load_blocks_assets' ) );
			// add_action( 'render_block', array( $this, 'load_blocks_scripts' ), 10, 2 );
		}

		
		/**
		 * Load additional block styles.
		 */
		public function load_additional_block_styles( $blocks_files, $theme_version ) {
 			foreach ( $blocks_files as $block_path ) {
				$block_name = $this->get_block_name( $block_path );
				$block_handle = $this->get_block_slug( $block_path );
		
				// Enqueue asset.
				wp_enqueue_block_style(
					$block_name,
					array(
						'handle' => $block_handle,
						'src'    => get_theme_file_uri( "$this->assets_path/$block_name.css" ),
						'path'   => wp_normalize_path( $block_path ),
						'ver'    => $theme_version,
					)
				);
			}
		}
		
		/**
		 * Get the block name in standard format (e.g. 'core/site-title').
		 *
		 * @param string $block_path The full path to the block file.
		 * @return string The block name in 'namespace/block-name' format or empty string if invalid.
		 */
		private function get_block_name( $block_path ) {
			// Validate input
			if ( ! is_string( $block_path ) || empty( $block_path ) ) {
				return '';
			}

			// Extract directory name and filename without extension
			$block_dir = basename( dirname( $block_path ) );
			$block_file = pathinfo( $block_path, PATHINFO_FILENAME );

			// Combine to standard block name format (namespace/block-name)
			return $block_dir . '/' . $block_file;
		}

		/**
		 * Get the block slug with theme prefix and hyphens (e.g. 'mytheme-block-core-site-title').
		 *
		 * @param string $block_path The full path to the block file.
		 * @return string The formatted block slug with theme prefix.
		 */
		private function get_block_slug( $block_path ) {
			// First get the standard block name
			$block_name = $this->get_block_name( $block_path );
			
			// Convert to slug format (replace slashes with hyphens)
			$block_slug = str_replace( '/', '-', $block_name );
			
			// Add theme prefix and return
			return $this->theme_name . '-block-' . $block_slug;
		}
				
		/**
		 * Load additional block scripts.
		 */
		public function load_additional_block_scripts( $blocks_files, $theme_version ) {
			// Hook to track rendered blocks.
			add_action('render_block', function ( $block_content, $block ) use ( &$blocks_files, &$theme_version ) {
				if ( isset( $block['blockName'] ) ) {
 
					// TODO: Check this logic, it does not seem to be correct.
					foreach ( $blocks_files as $block_path ) {

						$block_name = $this->get_block_name( $block_path );;
 
						if ( $block['blockName'] == $block_name ) {
 
							$handle = $this->get_block_slug( $block_path );


							$path = trailingslashit( $this->blocks_scripts_path ) . $block_name . '.js';
 
							$src = get_theme_file_uri( $path );
							// $is_child_theme ? get_theme_file_uri( $this->blocks_scripts_path . '/' . $block_name . '.js' ) : get_parent_theme_file_uri( $file );

							$params = array(
								$handle,
								$src,
								['wp-dom-ready'],
								null,
							);
														
							// Enqueue asset.
							wp_enqueue_script( ...$params ); 
						}
					}

				}

				return $block_content;
			}, 10, 2);
	   }

	   /**
		* Get the absolute path to a folder relative to the template directory.
		*	
		* @param string $relative_path The relative path to the blocks folder.
		* @return string The path to the blocks folder.
		*/
		public function get_blocks_absolute_path( $relative_path = 'blocks' ) {

			return get_template_directory() . '/' . $relative_path;
		}
		
		/**
		 * Get the path to a specific blocks subfolder.
		 *
		 * @param string $type The type of resource ('scripts' or 'styles').
		 * @return string The path to the specified subfolder.
		 */
		public function get_blocks_subfolder_path( $type ) {
			$subfolders = [
				'scripts' => $this->blocks_scripts_path,
				'styles'  => $this->blocks_styles_path,
			];

			return isset( $subfolders[ $type ] ) 
				? $this->get_blocks_absolute_path( $subfolders[ $type ] ) 
				: $this->get_blocks_absolute_path();
		}
 
		
		/**
		 * Load blocks assets.
		 */
		public function load_blocks_assets() {
			// Get all files in the directory.
			$js_files = ( array ) scandir( $this->get_blocks_subfolder_path( 'scripts' ), 'js', -1 );
		
	 
			
			// Get css files in the directory.
			$css_files = $this->filter_rtl_files( 
				 ( array ) scandir( $this->get_blocks_subfolder_path( 'styles' ) , 'css', -1 )
			);
			  
			// Load block scripts of the active theme
			$this->load_additional_block_scripts( $js_files, $this->theme_version );
			
			
			// Load block styles of the active theme
			$this->load_additional_block_styles( $css_files, $this->theme_version );
 		}
	}
endif;
