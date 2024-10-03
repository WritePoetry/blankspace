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
		private $assets_path;

		/**
		 * The path to the css directory.
		 *
		 * @var string
		 */
		private $assets_js_path;

		/**
		 * The path to the js directory.
		 *
		 * @var string
		 */
		private $assets_css_path;

		/**
		 * The path to the blocks assets directory.
		 *
		 * @var string
		 */
		private $blocks_assets_path;


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

			$this->assets_js_path  = apply_filters( 'blank_theme_js_asset_path', $this->assets_path . '/js/' );
			$this->assets_css_path = apply_filters( 'blank_theme_css_asset_path', $this->assets_path . '/css/' );

			add_action( 'init', array( $this, 'register_block_styles' ) );

			add_filter( 'blank_theme_register_block_style', array( $this, 'get_block_styles' ) );

			add_action( 'after_setup_theme', array( $this, 'load_blocks_styles' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ) );
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
		 * Enqueues a stylesheet for a specific block.
		 *
		 * @return void
		 */
		public function load_blocks_styles() {
			global $blank_theme;

			// Use glob to get the list of stylesheets files in the assets folder.
			$blocks_path = get_theme_file_path( $this->blocks_assets_path );

			$blocks_files = glob( $blocks_path . '/*/*.css' );

			/**
			 * Load additional block styles.
			 */
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
						'handle' => "$blank_theme->name-block-$block_slug",
						'src'    => get_theme_file_uri( "$this->assets_path/$block_name.css" ),
						'path'   => wp_normalize_path( $block_path ),
						'ver'    => $blank_theme->version,
					)
				);
			}
		}



		/**
		 * Load front-end assets.
		 *
		 * @param string $path The path to the assets.
		 * @param string $assets_type The assets_type of assets to load ('css' or 'js').
		 *
		 * @return void
		 */
		public function enqueue_assets( $path, $stylesheet, $assets_type = 'css' ) {
			global $blank_theme;
			$theme_name    = Config::get_theme_name();
			$theme_version = Config::get_theme_version();

			// Get the asset files.
			$asset_files = glob( get_parent_theme_file_path( $path ) . '*.asset.php' );

			// Check if it is a child theme.
			if ( is_child_theme() ) {
				$asset_files = array_merge( $asset_files, glob( get_theme_file_path( $path ) . '*.' . $assets_type ) );

			}

			foreach ( $asset_files as $asset_file ) {
				// Load front-end assets.
				$file_extension = pathinfo( $asset_file, PATHINFO_EXTENSION );

				if ( 'php' === $file_extension ) {
					$asset = include $asset_file;

					$file_name = basename( $asset_file, '.asset.php' );
				} else {
					$file_name = basename( $asset_file, ".$assets_type" );
				}

				$params = array(
					"$stylesheet-$file_name",
					get_theme_file_uri( "$path$file_name.$assets_type" ),
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
		 * Load front-end assets.
		 *
		 * @return void
		 */
		public function load_assets() {
			global $blank_theme;

			// Get the theme stylesheet.
			$theme_stylesheet = $blank_theme->name;

			// Check if it is a child theme.
			if ( is_child_theme() ) {
				// Get the child theme stylesheet.
				$theme_stylesheet = get_stylesheet();
			}

			$this->enqueue_assets( $this->assets_js_path, $theme_stylesheet, 'js' );
			$this->enqueue_assets( $this->assets_css_path, $theme_stylesheet );

			// Get the active plugins list.
			$active_plugins = get_option( 'active_plugins' );

			// Check if there are active plugins.
			foreach ( $active_plugins as $plugin ) {
				$plugin_dir = dirname( $plugin );

				// Load plugin assets.
				$this->enqueue_assets( $this->assets_css_path . 'plugins/' . $plugin_dir . '/', $theme_stylesheet );
				$this->enqueue_assets( $this->assets_js_path . 'plugins/' . $plugin_dir . '/', $theme_stylesheet, 'js' );
			}
		}
	}
endif;
