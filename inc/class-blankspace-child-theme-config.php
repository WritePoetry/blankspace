<?php
/**
 * Main Init Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Config
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankSpace;

/**
 * Main Init class for theme configuration
 */
class Child_Theme_Config extends Theme_Config {
	/**
	 * L'unica istanza della classe.
	 * @var Child_Theme_Config|null
	 */
	public static $theme_name;

	/**
     * Stores the current active theme template.
     *
     * @var string
     */
    protected  $template_name;

	/**
     * Costruttore privato per evitare istanze esterne.
     */
	protected function __construct() {
        $this->init_theme_data( get_stylesheet() );
    }

	/**
	 * Get the name of the parent active theme name.
	 *
	 * @return string Active theme name (stylesheet for child theme or template).
	 */
	public static function get_parent_theme_version() {
		return is_child_theme() ?  wp_get_theme( get_template() )->get( 'Version' )  : null;
	}
}
