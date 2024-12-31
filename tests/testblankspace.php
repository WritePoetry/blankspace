<?php

namespace WritePoetry\BlankSpace\Tests;

use PHPUnit\Framework\TestCase;
use Yoast\PHPUnitPolyfills\Polyfills\AssertIsType;


/**
 * Get a plugin option from the WordPress database.
 *
 * @param string $name
 *
 * @return mixed
 */
function demo_get_option( $name ) {
	return get_option( 'writepoetry_' . $name );
}

/**
 * Sample test case.
 */
class TestBlankSpace extends TestCase {

	use AssertIsType;
	public function test_theme_activated() {
        $this->assertTrue( wp_get_theme()->get( 'TextDomain' ) === 'blankspace' );
    }

    public function test_style_css_loaded() {
		$this->markTestSkipped( 'style.css in not loaded on this theme.' );

        $this->assertTrue( file_exists( get_template_directory() . '/style.css' ) );
        $this->assertTrue( wp_style_is( 'blankspace-style', 'enqueued' ) );
    }

    public function test_functions_php_exists() {
        $this->assertTrue( file_exists( get_template_directory() . '/functions.php' ) );
    }

    public function test_theme_supports_post_thumbnails() {
        $this->assertTrue( current_theme_supports( 'post-thumbnails' ) );
    }

    public function test_theme_registers_nav_menu() {
		$this->markTestSkipped( 'Navigation menu locations is not registered for this theme.' );

        $this->assertTrue( has_nav_menu( 'primary' ) );
    }

    public function test_index_php_exists() {
		$this->markTestSkipped( 'WordPress no longer requires block themes to include an index.php file.' );

        $this->assertTrue( file_exists( get_template_directory() . '/index.php' ) );
    }
	
}