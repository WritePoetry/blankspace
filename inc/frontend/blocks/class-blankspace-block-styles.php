<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Block_Styles
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankSpace;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Block_Styles' ) ) :

	/**
	 * The Assets class
	 */
	class Block_Styles extends Assets {
		
		private $theme_name;
		
		private $theme_version;

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();
			
			$this->theme_name = Theme_Config::name();
			$this->theme_version = Theme_Config::version();

			
			add_action( 'init', array( $this, 'register_block_styles' ) );

			add_filter( 'blankspace_register_block_style', array( $this, 'get_block_styles' ) );
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
				 *   Add new Block Styles just using the `blankspace_register_block_style` hook. An example here: [Add new Blocks Styles via filter](https://github.com/WritePoetry/_blank-theme/blob/f39ad41e6ac3a9b5c8ec6f2467ea44b7055ef8df/themes/twentytwenty-child/functions.php#L41).
				 */
				foreach ( apply_filters( 'blankspace_register_block_style', array() ) as $block_name => $style_properties ) {

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
						'label'        => __( 'Primary Color Disc', 'blankspace' ),
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
						'label'        => __( 'Secondary Color Disc', 'blankspace' ),
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
						'label'        => __( 'Checked', 'blankspace' ),
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
						'label'        => __( 'None', 'blankspace' ),
						'inline_style' => 'ul.is-style-none { list-style: none; }',
					),
				),
				'core/cover'      => array(
					array(
						'name'         => 'inline1',
						'label'        => __( 'Inline1', 'blankspace' ),
						'is_default'   => true,
						'inline_style' => '  .is-style-inline1 { display: block; }',
					),
					array(
						'name'         => 'inline2',
						'label'        => __( 'Inline2', 'blankspace' ),
						'inline_style' => '  .is-style-inline2 { display: inline-flex; }',
					),
				),
				'core/media-text' => array(
					array(
						'name'         => 'rounded-image',
						'label'        => __( 'Rounded Image', 'blankspace' ),
						'is_default'   => false,
						'inline_style' => '  .is-style-rounded-image img { border-radius: var(--wp--custom--core-media-text--border-radius, 20px); }',
					),
				),
				'core/group'      => array(
					'name'         => 'inline',
					'label'        => __( 'Inline', 'blankspace' ),
					'is_default'   => true,
					'inline_style' => '.wp-block-group.is-style-inline { display: inline-flex; }',
				),
			);

			return $block_styles;
		}
	}
endif;
