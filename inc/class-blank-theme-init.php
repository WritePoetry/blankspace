<?php
/**
 * Main Init Class
 *
 * @package           WritePoetry/BlankTheme
 * @subpackage        WritePoetry/BlankTheme/Init
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankTheme;

/**
 * Main Init class
 */
final class Init {

	/**
	 * Store all the classes inside an array
	 *
	 * @return array Full list of classes
	 */
	public static function get_services() {

		$services = array(
			// Assets::class,
			Config::class,
			// Setup::class,
		);

		if ( is_admin() ) {
			// array_push(
			// $services,

			// );

			// inc/admin/class-blank-theme-admin.php';
		}

		// if ( Base_Controller::is_woocommerce_activated() ) {
			// array_push(
			// $services,

			// );
		// }

		/**
		 * Initialize Jetpack compatibility.
		 */
		if ( class_exists( 'Jetpack' ) ) {
			// array_push(
			// $services,
			// );
			// $blank_theme->jetpack = require 'inc/plugins/jetpack/class-blank-theme-jetpack.php';
		}

		/**
		 * Initialize TranslatePress - Multilingual compatibility.
		 */
		if ( class_exists( 'TRP_Translate_Press' ) ) {
			// array_push(
			// $services,
			// );
			// require 'inc/plugins/translatepress-multilingual/class-blank-theme-translatepress.php';
		}

		return $services;
	}

	/**
	 * Loop through the classes, initialize them,
	 * and call the register() method if it exists
	 *
	 * @return void
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );

			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 *
	 * @param string $class_name The name of the class to instantiate.
	 * @return object The instantiated object.
	 */
	private static function instantiate( $class_name ) {
		$service = new $class_name();

		return $service;
	}
}
