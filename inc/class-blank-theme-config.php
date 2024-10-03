<?php
/**
 * Main Init Class
 *
 * @package           WritePoetry/BlankTheme
 * @subpackage        WritePoetry/BlankTheme/Config
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankTheme;

/**
 * Main Init class for theme configuration
 */
class Config {
	/**
	 * Stores the current active theme object.
	 *
	 * @var WP_Theme
	 */
	private static $theme;

	/**
	 * Initializes the theme object.
	 */
	public static function init() {
		self::$theme = wp_get_theme( self::get_theme_name() );
	}

	/**
	 * Get the current theme version.
	 * Ensures the theme is initialized before accessing it.
	 *
	 * @return string|false Theme version or false if not available.
	 */
	public static function get_theme_version() {
		if ( ! self::$theme ) {
			self::init();
		}

		$theme_version = self::$theme->get( 'Version' );

		return is_string( $theme_version ) ? $theme_version : false;
	}

	/**
	 * Get the active theme name.
	 *
	 * @return string Active theme name (stylesheet for child theme or template).
	 */
	public static function get_theme_name() {
		return is_child_theme() ? get_stylesheet() : get_template();
	}
}
