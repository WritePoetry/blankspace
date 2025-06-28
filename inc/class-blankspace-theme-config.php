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
     * Stores the singleton instances.
     * 
     * @var array
     */
    protected static $instances = [];

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
     * Stores the current active theme template.
     *
     * @var string
     */
    protected $template_name;

    /**
     * Stores the current active theme directory.
     *
     * @var string
     */
    protected $directory;

	/**
     * Costruttore privato per evitare istanze esterne.
     */
    protected function __construct() {
        $this->init_theme_data( get_template() );
    }

    /**
     * Inizializza i dati del tema.
     *
     * @param string $source Il nome del tema (stylesheet o template).
     */
    protected function init_theme_data( $source ) {
        $theme = wp_get_theme( $source );
        $this->version = ( string ) $theme->get( 'Version' );
        $this->name = ( string ) $theme->get( 'Name' );
        $this->template_name = $source;
        $this->directory = get_template_directory();
    }

    /**
     * Ottieni l'istanza singleton.
     * @return Theme_Config
     */
    public static function get_instance() {
        $class = static::class;
        
        if ( !isset( self::$instances[$class] ) ) {
            self::$instances[$class] = new static();
        }
        
        return self::$instances[$class];
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
        return static::get_instance()->version;
    }

	/**
	 * Get the active theme name.
	 *
	 * @return string Active theme name (stylesheet for child theme or template).
	 */
    public static function name() {
        return static::get_instance()->name;
    }

    /**
     * Get the active theme template name.
     * 
     * @return string Active theme template name (template for child theme or template).
     */
    public static function template_name() {
        return static::get_instance()->template_name;
    }

    /**
     * Get the active theme directory.
     *
     * @return string Active theme directory.
     */
    public static function directory() {
        return static::get_instance()->directory;
    }
}
