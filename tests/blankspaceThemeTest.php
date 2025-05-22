<?php
namespace WritePoetry\BlankSpace\Tests;

use WritePoetry\BlankSpace\Theme_Config;
use WritePoetry\BlankSpace\Child_Theme_Config;
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
     * Test that constructor is protected (to allow inheritance while blocking direct instantiation)
     */
    public function test_constructor_is_protected() {
        $reflection = new \ReflectionClass( Theme_Config::class );
        $constructor = $reflection->getConstructor();
        
        $this->assertTrue(
            $constructor->isProtected(), 
            'Constructor must be protected to allow child classes while maintaining singleton pattern'
        );
        
        // Additional check to ensure it's not public
        $this->assertFalse(
            $constructor->isPublic(),
            'Constructor should not be public'
        );
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

        $this->assertEquals(
            get_template(),
            Theme_Config::template_name(),
            'template_name() should match theme name'
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

    /**
     * Test that template name is properly cast to string
     */
    public function test_template_name_is_cast_to_string() {
        $template_name = Theme_Config::template_name();
        $this->assertIsString( $template_name, 'Template should be string type' );
    }






















     /**
     * Test that child class returns different instance than parent
     */
    public function test_child_class_returns_different_instance() {
        $parent = Theme_Config::get_instance();
        $child = Child_Theme_Config::get_instance();
        
        $this->assertNotSame(
            $parent,
            $child,
            'Child class should return its own singleton instance'
        );
    }

    /**
     * Test that child class returns correct instance type
     */
    public function test_child_class_instance_type() {
        $child = Child_Theme_Config::get_instance();
        $this->assertInstanceOf(
            Child_Theme_Config::class,
            $child,
            'get_instance() should return Child_Theme_Config instance'
        );
        
        $this->assertInstanceOf(
            Theme_Config::class,
            $child,
            'Child instance should also be instance of parent'
        );
    }

    /**
     * Test that child template_name() returns stylesheet instead of template
     */
    public function test_child_template_name_returns_stylesheet() {
        if ( ! is_child_theme() ) {
            $this->markTestSkipped('Test requires active child theme');
        }
        
        $this->assertEquals(
            get_stylesheet(),
            Child_Theme_Config::template_name(),
            'Child theme should return stylesheet instead of template'
        );
        
        $this->assertNotEquals(
            Theme_Config::template_name(),
            Child_Theme_Config::template_name(),
            'Parent and child should return different template names'
        );
    }

    /**
     * Test child theme version matches child theme data
     */
    public function test_child_version_matches_theme_data() {
        if ( ! is_child_theme() ) {
            $this->markTestSkipped('Test requires active child theme');
        }
        
        $theme = wp_get_theme( get_stylesheet() );
        $this->assertEquals(
            $theme->get('Version'),
            Child_Theme_Config::version(),
            'Child version should match child theme version'
        );
    }
    

    /**
     * Test that parent theme version is available in child
     */
    public function test_parent_theme_version_available() {
        if ( ! is_child_theme() ) {
            $this->markTestSkipped( 'Test requires active child theme' );
        }
        
        $parent_theme = wp_get_theme(get_template());
        $this->assertEquals(
            $parent_theme->get( 'Version' ),
            Child_Theme_Config::get_parent_theme_version(),
            'Should return parent theme version'
        );
    }

    /**
     * Test constructor override in child class
     */
    public function test_child_constructor_override() {
        $reflection = new \ReflectionClass( Child_Theme_Config::class );
        $constructor = $reflection->getConstructor();
        
        $this->assertTrue(
            $constructor->isProtected(),
            'Child constructor must be protected'
        );
    }

    /**
     * Test child theme name matches child theme data
     */
    public function test_child_name_matches_theme_data() {
        if ( ! is_child_theme() ) {
            $this->markTestSkipped( 'Test requires active child theme' );
        }
        
        $theme = wp_get_theme( get_stylesheet() );
        $this->assertEquals(
            $theme->get('Name'),
            Child_Theme_Config::name(),
            'Child name should match child theme name'
        );
    }
}


