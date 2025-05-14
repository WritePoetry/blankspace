<?php
/**
 * Main Init Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Theme_Config
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankSpace;

/**
 * Main Init class for theme configuration
 */
class Theme_Config {
	/**
     * L'unica istanza della classe.
     * @var Theme_Config|null
     */
    private static $instance = null;

	/**
	 * Stores the current active theme version.
	 *
	 * @var string
	 */
	private $version;

	/**
	 * Stores the current active theme name.
	 *
	 * @var string
	 */
	private $name;


	/**
     * Costruttore privato per evitare istanze esterne.
     */
    private function __construct() {
		$theme = wp_get_theme( get_template() );
        $this->version =  (string) $theme->get( 'Version' );
        $this->name =  (string) $theme->get( 'Name' );
    }

 	/**
     * Ottieni l'istanza singleton.
     * @return Theme_Config
     */
    public static function get_instance() {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

	/**
     * Blocca la clonazione (per evitare duplicati).
     */
    private function __clone() {}

	 /**
     * Blocca la deserializzazione (per evitare duplicati).
     */
    public function __wakeup() {
        throw new \Exception( "Cannot unserialize a singleton." );
    }	

	/**
	 * Get the active theme version.
	 *
	 * @return string Active theme version.
	 */

	public static function version() {
        return self::get_instance()->version;
    }

	/**
	 * Get the active theme name.
	 *
	 * @return string Active theme name (stylesheet for child theme or template).
	 */
    public static function name() {
        return self::get_instance()->name;
    }
}
