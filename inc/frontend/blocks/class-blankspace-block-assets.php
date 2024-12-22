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
			
			$this->theme_name = Theme_Config::get_theme_name();
			$this->theme_version = Theme_Config::get_theme_version();
			
			add_action( 'after_setup_theme', array( $this, 'load_blocks_assets' ) );
			// add_action( 'render_block', array( $this, 'load_blocks_scripts' ), 10, 2 );
		}

		
		/**
		 * Load additional block styles.
		 */
		public function load_additional_block_styles( $blocks_files, $theme_name, $theme_version ) {

 			foreach ( $blocks_files as $block_path ) {
				

				// Retrieve the block name from the given file path.
				$block_name = $this->get_block_name_from_path( $block_path );

				// Replace slash with hyphen for filename.
				$block_slug = str_replace( '/', '-', $block_name );
 
				// Enqueue asset.
				wp_enqueue_block_style(
					$block_name,
					array(
						'handle' => "$theme_name-block-$block_slug",
						'src'    => get_theme_file_uri( "$this->assets_path/$block_name.css" ),
						'path'   => wp_normalize_path( $block_path ),
						'ver'    => $theme_version,
					)
				);
			}
		}
		
		/**
		 * Get the block name from the path.
		 *
		 * @param string $path The path to the file.
		 * @return string The file name.
		 */
		private function get_block_name_from_path( $block_path ) {
			// Check if the path is valid
			if ( ! is_string( $block_path ) || empty( $block_path ) ) {
				return ''; // Return an empty string or a default value if the path is empty or invalid
			}

			// Get the directory part and the file name
			$block_dir = dirname( $block_path );
			$block_file = pathinfo( $block_path, PATHINFO_FILENAME );
			
			// Reconstruct block name (e.g. core/site-title).
			return basename( $block_dir ) . '/' . $block_file;
		}
		
		
		/**
		 * Convert a block name to a slug by replacing slashes with hyphens.
		 *
		 * @param string $block_name The block name (e.g., 'core/buttons').
		 * @return string The converted block slug (e.g., 'core-buttons').
		 */
		private function convert_block_name_to_slug( $block_name ) {
			return str_replace( '/', '-', $block_name );
		}
		
		
		/**
		 * Load additional block scripts.
		 */
		public function load_additional_block_scripts( $blocks_files, $theme_name, $theme_version ) {
			
			// Array to store rendered block names.
 

			// Hook to track rendered blocks.
			add_action('render_block', function ( $block_content, $block ) use ( &$blocks_files, &$theme_name, &$theme_version ) {
				if ( isset($block['blockName'] ) ) {
 
					foreach ( $blocks_files as $block_path ) {


						$block_name = $this->get_block_name_from_path( $block_path );
						$block_slug = $this->convert_block_name_to_slug( $block_name );
				 
						if ( $block['blockName'] == $block_name ) {
 
							$handle = "$theme_name-block-$block_slug";
 
							$src = $this->get_theme_file_uri_src( $this->blocks_scripts_path . '/' . $block_name . '.js', false );

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
			
			$js_files = $this->filter_rtl_files( 
				$this->get_js_files_from_folder( 
					$this->get_blocks_subfolder_path( 'scripts' )
				)
			);
			
			$css_files = $this->filter_rtl_files( 
				$this->get_css_files_from_folder( 
					$this->get_blocks_subfolder_path( 'styles' )
				)
			);
			
			
			// Load block scripts of the active theme
			$this->load_additional_block_scripts( $js_files, $this->theme_name, $this->theme_version );
			
			
			// Load block styles of the active theme
			$this->load_additional_block_styles( $css_files, $this->theme_name, $this->theme_version );
 		}
	}
endif;
