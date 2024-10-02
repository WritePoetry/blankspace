<?php
/**
 * WritePoetry Blank Theme
 *
 * @package WritePoetry\BlankTheme
 */

namespace WritePoetry\BlankTheme;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

# Load the autoloader.
if ( is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Initialize all the core classes of the theme
 *
 */
if ( class_exists( 'WritePoetry\\BlankTheme\\Init' ) ) {
	Init::register_services();
}


