<?php
/**
 * Write White Theme
 *
 * @package Twenty_Twenty_Child
 */

/**
 * Get theme version.
 */
$theme			= wp_get_theme( get_template() );
$theme_version  = $theme->get( 'Version' );
$version_string = is_string( $theme_version ) ? $theme_version : false;

$blank_theme = (object) array(
	'name'		 => $theme->stylesheet,
	'version'    => $version_string,
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
	$blank_theme->jetpack = require 'inc/plugins/jetpack/class-twenties-jetpack.php';
}

/**
 * Initialize TranslatePress - Multilingual compatibility.
 */
if (class_exists( 'TRP_Translate_Press' ) ) {
	$blank_theme->translate_press = require 'inc/plugins/translatepress-multilingual/class-blank-theme-translatepress-template-functions.php';
}

if ( is_admin() ) {
	$blank_theme->admin = require 'inc/admin/class-blank-theme-admin.php';
}

// require 'inc/class-twenties-ajax.php';
