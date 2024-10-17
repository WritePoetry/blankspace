<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankTheme
 * @subpackage        WritePoetry/BlankTheme/Block_Styles
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankTheme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Block_Styles' ) ) :

	/**
	 * The Assets class
	 */
	class Block_Styles extends Assets {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();
			add_action( 'init', array( $this, 'register_block_styles' ) );

			add_filter( 'blank_theme_register_block_style', array( $this, 'get_block_styles' ) );
			
			add_action( 'after_setup_theme', array( $this, 'load_blocks_styles' ) );
		}

		/**
		 * Register each block style with its label and CSS style
		 *
		 * @return void
		 */
		public function register_block_styles() {
			// Check if it is possible to use the `register_block_style` function.
			if ( function_exists( 'register_block_style' ) ) {
				/**
				 *   Add new Block Styles just using the `writepoetry_register_block_style` hook. An example here: [Add new Blocks Styles via filter](https://github.com/giacomo-secchi/write-poetry/blob/f39ad41e6ac3a9b5c8ec6f2467ea44b7055ef8df/themes/twentytwenty-child/functions.php#L41).
				 */
				foreach ( apply_filters( 'blank_theme_register_block_style', array() ) as $block_name => $style_properties ) {

					/**
					 * Check for the presence of an inner array key
					 * to correctly determine whether a particular element in the `$block_styles` array
					 * is a single block style definition or an array of block style definitions.
					 */
					if ( isset( $style_properties['name'] ) ) {
						// Register each block style with its label and CSS styles.
						register_block_style( $block_name, $style_properties );
					} else {
						foreach ( $style_properties as $style ) {
							// Register the block style.
							register_block_style( $block_name, $style );
						}
					}
				}
			}
		}

		/**
		 * Load the block styles
		 *
		 * @return void
		 */
		public function get_block_styles() {
			// Define block styles with their labels and CSS styles
			$block_styles = array(
				'core/list'       => array(
					array(
						'name'         => 'primary-disc-list',
						'label'        => __( 'Primary Color Disc', 'whritewhite' ),
						'inline_style' => '
						ul.is-style-primary-disc-list {
							list-style-type: disc;
						}

						ul.is-style-primary-disc-list li::marker {
							color: var(--wp--preset--color--primary);
						}',
					),
					array(
						'name'         => 'secondary-disc-list',
						'label'        => __( 'Secondary Color Disc', 'whritewhite' ),
						'inline_style' => '
						ul.is-style-secondary-disc-list {
							list-style-type: disc;
						}

						ul.is-style-secondary-disc-list li::marker {
							color: var(--wp--preset--color--secondary);
						}',
					),
					array(
						'name'         => 'checked',
						'label'        => __( 'Checked', 'whritewhite' ),
						'inline_style' => '
						 
						@counter-style check {
							system: cyclic;
							symbols: "✅";
							suffix: " ";
						}
						ul.is-style-checked { list-style: check; }',
					),
					array(
						'name'         => 'none',
						'label'        => __( 'None', 'whritewhite' ),
						'inline_style' => 'ul.is-style-none { list-style: none; }',
					),
				),
				'core/cover'      => array(
					array(
						'name'         => 'inline1',
						'label'        => __( 'Inline1', 'whritewhite' ),
						'is_default'   => true,
						'inline_style' => '  .is-style-inline1 { display: block; }',
					),
					array(
						'name'         => 'inline2',
						'label'        => __( 'Inline2', 'whritewhite' ),
						'inline_style' => '  .is-style-inline2 { display: inline-flex; }',
					),
				),
				'core/media-text' => array(
					array(
						'name'         => 'rounded-image',
						'label'        => __( 'Rounded Image', 'whritewhite' ),
						'is_default'   => false,
						'inline_style' => '  .is-style-rounded-image img { border-radius: var(--wp--custom--core-media-text--border-radius, 20px); }',
					),
				),
				'core/group'      => array(
					'name'         => 'inline',
					'label'        => __( 'Inline', 'whritewhite' ),
					'is_default'   => true,
					'inline_style' => '.wp-block-group.is-style-inline { display: inline-flex; }',
				),
			);

			return $block_styles;
		}	
		

		
		/**
		 * Load additional block styles.
		 */
		private function load_additional_block_styles( $blocks_files, $theme_name, $theme_version ) {
			
			foreach ( $blocks_files as $block_path ) {

				$block_info = pathinfo( $block_path );

				// Add blocks styles.
				// Reconstruct block name core/site-title.
				$block_name = basename( $block_info['dirname'] ) . '/' . $block_info['filename'];

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
		 * Enqueues a stylesheet for a specific block.
		 *
		 * @return void
		 */
		public function load_blocks_styles() {
			$theme_name = Config::get_theme_name();
			$theme_version = Config::get_theme_version();
			
			$seach_pattern = is_rtl() ? '/*/*-rtl.css' : '/*/*.css';
			
			// Use glob to get the list of stylesheets files in the assets folder.
			$blocks_path = get_theme_file_path( $this->blocks_assets_path );
			$blocks_files = glob( $blocks_path . $seach_pattern );
			
		 
			// Load block styles of the active theme
			$this->load_additional_block_styles( $blocks_files, $theme_name, $theme_version );

	 
			// Check if a child theme is active
			if ( is_child_theme() ) {
				$parent_theme_blocks_path = get_template_directory() . '/' . $this->blocks_assets_path;
				$parent_theme_blocks_files = glob( $parent_theme_blocks_path . $seach_pattern );
		 
				// Load block styles of the parent theme
				$this->load_additional_block_styles( $parent_theme_blocks_files, get_template(), Config::get_parent_theme_version() );
			}			
		}
	}
endif;
