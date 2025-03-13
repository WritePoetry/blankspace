<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Child_Theme_Block_Assets
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankSpace;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Child_Theme_Block_Assets' ) ) :

	/**
	 * The Assets class
	 */
	class Child_Theme_Block_Assets extends Block_Assets {
		
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
		* Get the absolute path to a folder relative to the template directory.
		*	
		* @param string $relative_path The relative path to the blocks folder.
		* @return string The path to the blocks folder.
		*/
		public function get_blocks_absolute_path( $relative_path = 'blocks' ) {
			return get_stylesheet_directory() . '/' . $relative_path;
		}
		
	  
	}
endif;
