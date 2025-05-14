<?php
namespace WritePoetry\BlankSpace\Tests;

use WritePoetry\BlankSpace\Theme_Config;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class blankspaceThemeTest extends TestCase {
    /**
     * Test that get_instance() always returns the same instance
     */
    public function test_get_instance_returns_singleton() {
        $instance1 = Theme_Config::get_instance();
        $instance2 = Theme_Config::get_instance();
        
        $this->assertSame( $instance1, $instance2, 'get_instance() should return the same object' );
    }

    /**
     * Test that constructor is private
     */
    public function test_constructor_is_private() {
        $reflection = new \ReflectionClass(Theme_Config::class);
        $constructor = $reflection->getConstructor();
        
        $this->assertTrue( $constructor->isPrivate(), 'Constructor must be private' );
    }

    /**
     * Test that version() returns a string
     */
    public function test_version_returns_string() {
        $version = Theme_Config::version();
        
        $this->assertIsString( $version, 'version() should return a string' );
        $this->assertNotEmpty( $version, 'version() should not be empty' );
    }

    /**
     * Test that name() returns a string
     */
    public function test_name_returns_string() {
        $name = Theme_Config::name();
        
        $this->assertIsString( $name, 'name() should return a string' );
        $this->assertNotEmpty( $name, 'name() should not be empty' );
    }

    /**
     * Test that cloning is blocked
     */
    public function test_clone_is_blocked() {
        $this->expectException( \Error::class );
        
        $instance = Theme_Config::get_instance();
        $clone = clone $instance;
    }

    /**
     * Test that unserialization is blocked
     */
    public function test_wakeup_is_blocked() {
        $this->expectException( \Exception::class );
        $this->expectExceptionMessage( 'Cannot unserialize a singleton' );
        
        $instance = Theme_Config::get_instance();
        $serialized = serialize( $instance );
        unserialize( $serialized);
    }

    /**
     * Test that values match wp_get_theme() data
     */
    public function test_values_match_wp_theme_data() {
        $theme = wp_get_theme( get_template() );
        
        $this->assertEquals(
            $theme->get( 'Version' ),
            Theme_Config::version(),
            'version() should match theme version'
        );
        
        $this->assertEquals(
            $theme->get( 'Name' ),
            Theme_Config::name(),
            'name() should match theme name'
        );
    }

    /**
     * Test that version is properly cast to string
     */
    public function test_version_is_cast_to_string() {
        $version = Theme_Config::version();
        $this->assertIsString( $version, 'Version should be string type' );
    }

    /**
     * Test that name is properly cast to string
     */
    public function test_name_is_cast_to_string() {
        $name = Theme_Config::name();
        $this->assertIsString( $name, 'Name should be string type' );
    }
}