<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Child_Block_Styles
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
	class Child_Block_Styles extends Block_Styles {

		private $theme_name;
		private $theme_version;
		 
		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();
			$this->theme_name = Child_Theme_Config::get_theme_name();
			$this->theme_version = Child_Theme_Config::get_theme_version();
		}
 
		public function get_blocks_path() {
			// Get the list of stylesheets files in the assets folder. 			
			return get_theme_file_path( $this->blocks_assets_path );
		}
	}
endif;
