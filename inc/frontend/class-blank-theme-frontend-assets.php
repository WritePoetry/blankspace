<?php
/**
 * Blank Theme Frontend Class
 *
 * @since    0.0.1
 * @package  Blank_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Blank_Theme_Frontend_Assets' ) ) :

	/**
	 * The main Twenties class
	 */
	class Blank_Theme_Frontend_Assets {
        /**
         * The path to the assets directory.
         *
         * @var string
         */
		private $assets_path;


		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			$this->assets_path = apply_filters( 'blank_theme_blocks_styles_asset_path', 'assets' );

			add_filter( 'writepoetry_register_block_style', array( $this, 'register_block_style' ) );

			add_action( 'after_setup_theme', array( $this, 'load_blocks_styles' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ) );

			add_action( 'after_setup_theme', array( $this, 'editor_styles' ) );

			add_action( 'enqueue_block_editor_assets', array( $this, 'editor_assets' ) );

		}

		public function register_block_style() {
			// Define block styles with their labels and CSS styles
			$block_styles = array(
				'core/list'	=> array(
					array(
						'name'			=> 'primary-disc-list',
						'label'			=> __( 'Primary Color Disc', 'twenties' ),
						'inline_style' => '
						ul.is-style-primary-disc-list {
							list-style-type: disc;
						}

						ul.is-style-primary-disc-list li::marker {
							color: var(--wp--preset--color--primary);
						}',
					),
					array(
						'name'			=> 'secondary-disc-list',
						'label'			=> __( 'Secondary Color Disc', 'twenties' ),
						'inline_style' => '
						ul.is-style-secondary-disc-list {
							list-style-type: disc;
						}

						ul.is-style-secondary-disc-list li::marker {
							color: var(--wp--preset--color--secondary);
						}',
					)
				),
				'core/group' => array(
					'name'         => 'inline',
					'label'        => __( 'Inline', 'twenties' ),
					'is_default'   => true,
					'inline_style' => '.wp-block-group.is-style-inline { display: inline-flex; }',
				),
				'core/cover' => array(
					array(
						'name'         => 'inline1',
						'label'        => __( 'Inline1', 'twenties' ),
						'is_default'   => true,
						'inline_style' => '  .is-style-inline1 { display: block; }',
					),
					array(
						'name'         => 'inline2',
						'label'        => __( 'Inline2', 'twenties' ),
						'inline_style' => '  .is-style-inline2 { display: inline-flex; }',
					),
				)
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

			// Get the base assets path using a filter hook.
			// This allows customization of the path through the 'blank_theme__blocks_styles_asset_path' filter.

			// Use glob to get the list of stylesheets files in the assets folder.
			$blocks_path = glob( get_theme_file_path( $this->assets_path ) . '/*/*.css' );

			/**
			 * Load additional block styles.
			 */
			foreach ( $blocks_path as $block_path ) {

				$block_info = pathinfo( $block_path );

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
		 * @return void
		 */
		public function load_assets() {
			// Load front-end assets.
			$asset = include get_theme_file_path( 'assets/css/screen.asset.php' );

			wp_enqueue_style(
				'themeslug-style',
				get_theme_file_uri( 'assets/css/screen.css' ),
				$asset['dependencies'],
				$asset['version']
			);

			$script_asset = include get_theme_file_path( 'assets/js/screen.asset.php'  );

			wp_enqueue_script(
				'themeslug-screen',
				get_theme_file_uri( 'assets/js/screen.js' ),
				$script_asset['dependencies'],
				$script_asset['version'],
				true
			);
		}




		// Load editor stylesheets.
		public function editor_styles() {
			add_editor_style( [
				get_theme_file_uri( 'assets/css/screen.css' )
			] );
		}

		// Load editor scripts.
		public function editor_assets() {
			$script_asset = include get_theme_file_path( 'assets/js/editor.asset.php'  );
			$style_asset  = include get_theme_file_path( 'assets/css/editor.asset.php' );

			wp_enqueue_script(
				'themeslug-editor',
				get_theme_file_uri( 'assets/js/editor.js' ),
				$script_asset['dependencies'],
				$script_asset['version'],
				true
			);

			wp_enqueue_style(
				'themeslug-editor',
				get_theme_file_uri( 'assets/css/editor.css' ),
				$style_asset['dependencies'],
				$style_asset['version']
			);
		}
	}
endif;

return new Blank_Theme_Frontend_Assets();









