<?php
/**
 * Main Init Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Init
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankSpace;

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
			Setup::class,
			Main_Theme_Assets::class,
			Enqueue_Additional_Assets::class,
			Block_Assets::class,
			Block_Bindings_API::class,
			Block_Styles::class,
		);

		if ( is_admin() ) {
			array_push(
				$services,
				Admin::class
			);
		}

		/**
		 * Initialize Jetpack compatibility.
		 */
		if ( class_exists( 'Jetpack' ) ) {
			array_push(
				$services,
				Jetpack::class
			);
		}

		/**
		 * Initialize TranslatePress - Multilingual compatibility.
		 */
		if ( class_exists( 'TRP_Translate_Press' ) ) {
			array_push(
				$services,
				TranslatePress::class
			);
		}
		
		if ( is_child_theme() ) {
			array_push(
				$services,
				Child_Block_Styles::class,
				Child_Theme_Assets::class
			);
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
