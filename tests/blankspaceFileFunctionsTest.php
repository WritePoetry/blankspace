<?php
namespace WritePoetry\BlankSpace\Tests;
 

use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use function WritePoetry\BlankSpace\Helpers\scandir;

 

class blankspaceFileFunctionsTest extends TestCase
{
    protected $testDir;
    protected $testStructure = [
        'file1.php' => '',
        'file2.js' => '',
        'file3.css' => '',
        'subdir' => [
            'subfile1.php' => '',
            'subfile2.js' => '',
            'ignored.txt' => '',
            'node_modules' => [
                'module_file.js' => ''
            ]
        ],
        'vendor' => [
            'vendor_file.php' => ''
        ],
        '.hidden' => 'content',
        'ignored.txt' => ''
    ];

    protected function setUp(): void
    {
        // Create a temporary directory structure
        $this->testDir = sys_get_temp_dir() . '/scandir_test_' . uniqid();
        $this->createDirectoryStructure( $this->testDir, $this->testStructure );
    }

    protected function tearDown(): void
    {
        // Clean up the temporary directory
        $this->removeDirectory( $this->testDir );
    }

    private function createDirectoryStructure( $base, $structure )
    {
        if ( ! file_exists( $base ) ) {
            mkdir( $base, 0777, true );
        }

        foreach ( $structure as $name => $content ) {
            $path = $base . '/' . $name;
            
            if ( is_array( $content ) ) {
                $this->createDirectoryStructure( $path, $content );
            } else {
                file_put_contents( $path, $content );
            }
        }
    }

    private function removeDirectory( $dir )
    {
        if ( ! file_exists( $dir ) ) {
            return;
        }

        $files = new \RecursiveIteratorIterator( 
            new \RecursiveDirectoryIterator( $dir, \RecursiveDirectoryIterator::SKIP_DOTS ),
            \RecursiveIteratorIterator::CHILD_FIRST
         );

        foreach ( $files as $fileinfo ) {
            $action = ( $fileinfo->isDir() ? 'rmdir' : 'unlink' );
            $action( $fileinfo->getRealPath() );
        }

        rmdir( $dir );
    }

    public function testScandirReturnsFalseForNonExistentPath()
    {
        $result = scandir( '/nonexistent/path' );
        $this->assertFalse( $result );
    }

    public function testScandirReturnsAllFilesWithoutExtensionsFilter()
    {
        $result = scandir( $this->testDir, null, 1 );
        
        $expected = [
            'file1.php' => $this->testDir . '/file1.php',
            'file2.js' => $this->testDir . '/file2.js',
            'file3.css' => $this->testDir . '/file3.css',
            'ignored.txt' => $this->testDir . '/ignored.txt',
            'subdir/subfile1.php' => $this->testDir . '/subdir/subfile1.php',
            'subdir/subfile2.js' => $this->testDir . '/subdir/subfile2.js',
            'subdir/ignored.txt' => $this->testDir . '/subdir/ignored.txt'
        ];
        
        $this->assertEquals( $expected, $result );
    }

    public function testScandirFiltersBySingleExtension()
    {
        $result = scandir( $this->testDir, 'php', 1 );
        
        $expected = [
            'file1.php' => $this->testDir . '/file1.php',
            'subdir/subfile1.php' => $this->testDir . '/subdir/subfile1.php'
        ];
        
        $this->assertEquals( $expected, $result );
    }

    public function testScandirFiltersByMultipleExtensions()
    {
        $result = scandir( $this->testDir, ['php', 'js'], 1 );
        
        $expected = [
            'file1.php' => $this->testDir . '/file1.php',
            'file2.js' => $this->testDir . '/file2.js',
            'subdir/subfile1.php' => $this->testDir . '/subdir/subfile1.php',
            'subdir/subfile2.js' => $this->testDir . '/subdir/subfile2.js'
        ];
        
        $this->assertEquals( $expected, $result );
    }

    public function testScandirWithDepthZero()
    {
        $result = scandir( $this->testDir, null, 0 );
        
        $expected = [
            'file1.php' => $this->testDir . '/file1.php',
            'file2.js' => $this->testDir . '/file2.js',
            'file3.css' => $this->testDir . '/file3.css',
            'ignored.txt' => $this->testDir . '/ignored.txt'
        ];
        
        $this->assertEquals( $expected, $result );
    }

    public function testScandirWithDepthOne()
    {
        $result = scandir( $this->testDir, null, 1 );
        
        $expected = [
            'file1.php' => $this->testDir . '/file1.php',
            'file2.js' => $this->testDir . '/file2.js',
            'file3.css' => $this->testDir . '/file3.css',
            'ignored.txt' => $this->testDir . '/ignored.txt',
            'subdir/subfile1.php' => $this->testDir . '/subdir/subfile1.php',
            'subdir/subfile2.js' => $this->testDir . '/subdir/subfile2.js',
            'subdir/ignored.txt' => $this->testDir . '/subdir/ignored.txt'
        ];
        
        $this->assertEquals( $expected, $result );
    }

    public function testScandirExcludesNodeModulesAndVendor()
    {
        $result = scandir( $this->testDir );
        
        $this->assertArrayNotHasKey( 'subdir/node_modules/module_file.js', $result );
        $this->assertArrayNotHasKey( 'vendor/vendor_file.php', $result );
    }

    public function testScandirExcludesHiddenFiles()
    {
        $result = scandir( $this->testDir );
        $this->assertArrayNotHasKey( '.hidden', $result );
    }

    public function testScandirWithRelativePath()
    {
        $result = scandir( $this->testDir . '/subdir', null, 0, 'custom_prefix' );
        
        $expected = [
            'custom_prefix/subfile1.php' => $this->testDir . '/subdir/subfile1.php',
            'custom_prefix/subfile2.js' => $this->testDir . '/subdir/subfile2.js',
            'custom_prefix/ignored.txt' => $this->testDir . '/subdir/ignored.txt'
        ];
        
        $this->assertEquals( $expected, $result );
    }

    public function testScandirWithMultipleFiltersAndDepth()
    {
        $result = scandir( $this->testDir, ['css', 'js'], 1 );
        
        $expected = [
            'file2.js' => $this->testDir . '/file2.js',
            'file3.css' => $this->testDir . '/file3.css',
            'subdir/subfile2.js' => $this->testDir . '/subdir/subfile2.js'
        ];
        
        $this->assertEquals( $expected, $result );
    }
}