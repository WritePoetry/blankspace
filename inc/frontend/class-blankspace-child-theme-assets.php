<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Child_Theme_Assets
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */
namespace WritePoetry\BlankSpace;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

  

if ( ! class_exists( 'Child_Theme_Assets' ) ) :

	/**
	 * The Assets class
	 */
	class Child_Theme_Assets extends Assets {
		/**
		 * The theme name.
		 *
		 * @var string
		 */
		private $theme_name;

		/**
		 * Is child theme.
		 *
		 * @var bool
		 */
		private $is_child_theme;


		/**
		 * The assets folder.
		 *
		 * @var string
		 */
		private $assets_folder;

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();
			
			// Get the theme name.
			$this->theme_name = Child_Theme_Config::template_name();
			$this->is_child_theme = true;
			$this->assets_folder = trim( apply_filters( 'blankspace_child_assets_path', 'assets' ), '/' );


			add_action( 'wp_enqueue_scripts', function(  ) {
				$path = get_stylesheet_directory() . '/' . $this->assets_folder;

				$this->load_assets(
					$path, $this->theme_name, $this->is_child_theme
				);
			}, 10, 1 );
		}
	}
endif;
