<?php
/**
 * WritePoetry BlankSpace Theme
 *
 * @package WritePoetry\BlankSpace
 */

namespace WritePoetry\BlankSpace;

// Load the autoloader.
if ( is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Initialize all the core classes of the theme
 */
if ( class_exists( 'WritePoetry\\BlankSpace\\Init' ) ) {
	Init::register_services();
}
