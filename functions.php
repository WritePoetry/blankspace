<?php
/**
 * Write White Theme
 *
 * @package Twenty_Twenty_Child
 */

/**
 * Get theme version.
 */
$stylesheet		= 'write-white';
$theme_version  = wp_get_theme( $stylesheet )->get( 'Version' );
$version_string = is_string( $theme_version ) ? $theme_version : false;

$blank_theme = (object) array(
	'name'		 => $stylesheet,
	'version'    => $theme_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-blank-theme.php',
	'assets'       => require 'inc/frontend/class-blank-theme-frontend-assets.php',
	'blocks'       => require 'inc/frontend/class-blank-theme-frontend-blocks.php'
);

/**
 * Initialize Jetpack compatibility.
 */
if ( class_exists( 'Jetpack' ) ) {
	// $twenties->jetpack = require 'inc/class-twenties-jetpack.php';
}

/**
 * Initialize TranslatePress - Multilingual compatibility.
 */
if (class_exists( 'TRP_Translate_Press' ) ) {
	require 'inc/translatepress-multilingual/blank-theme-translatepress-template-functions.php';
}


// require 'inc/class-twenties-ajax.php';
