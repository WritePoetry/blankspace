<?php
namespace WritePoetry\BlankSpace\Tests;

use WritePoetry\BlankSpace\Assets;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class blankspaceFileFunctionsTest extends TestCase {

    protected $testDir;
    protected $testFiles = [
        'file1.txt',
        'file2.txt',
        'css/main.css',
        'css/theme.css',
        'js/app.js',
        'js/utils.js',
        'libs/jquery.js',
        'document.pdf',
        'image.jpg',
        'subdir/file3.txt'
    ];

    protected function setUp(): void {
        // Crea una directory temporanea per i test
        $this->testDir = sys_get_temp_dir() . '/file_test_' . uniqid();
        
        mkdir( $this->testDir );
        
        // Crea i file di test
        foreach ( $this->testFiles as $file ) {
            $path = $this->testDir . '/' . $file;
            
            if ( strpos($file, '/' ) !== false) {
                mkdir( dirname( $path ), 0777, true );
            }
            
            touch( $path );
        }
    }

    protected function tearDown(): void {
        // Rimuove la directory temporanea e il suo contenuto
        $this->deleteDirectory( $this->testDir );
    }

    private function deleteDirectory( $dir ) {
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
 

    public function testGetAllFilesFromFolder() {
        $instance = new Assets();
        
        $result = $instance->get_files_from_folder( $this->testDir, '*' );
 
   
        
       


           $expected  = [
        $this->testDir . 'file1.txt',
        $this->testDir . 'file2.txt',
        $this->testDir . 'css/main.css',
        $this->testDir . 'css/theme.css',
        $this->testDir . 'js/app.js',
        $this->testDir . 'js/utils.js',
        $this->testDir . 'libs/jquery.js',
        $this->testDir . 'document.pdf',
        $this->testDir . 'image.jpg',
        $this->testDir . 'subdir/file3.txt'
    ];

        sort( $result );
        sort( $expected );

        
        $this->assertEquals( $expected, $result );
    }
 

    public function testGetFilesFromNonexistentFolder() {
        $instance = new Assets();
        
        $result = $instance->get_files_from_folder( $this->testDir . '/nonexistent', '*.txt');
        
        
        $this->assertEquals([], $result);
    }

    public function testGetFilesWithTrailingSlash() {
        $instance = new Assets();
        
        $result1 = $instance->get_files_from_folder( $this->testDir, '*.txt');
        $result2 = $instance->get_files_from_folder( $this->testDir . '/', '*.txt');
        
        $this->assertEquals($result1, $result2);
    }

    public function testGetFilesFromSubdirectory() {
        $instance = new Assets();
        
        $result = $instance->get_files_from_folder( $this->testDir . '/subdir', '*.txt');
        
        $expected = [
            $this->testDir . '/subdir/file3.txt'
        ];
        
        $this->assertEquals( $expected, $result );
    }

    public function testGetCssFilesFromFolder() {
        $assets = new Assets();
        
        $result = $assets->get_css_files_from_folder($this->testDir);
        
        $expected = [
            $this->testDir . '/css/main.css',
            $this->testDir . '/css/theme.css'
        ];
        
        sort( $result );
        sort( $expected );
        
        $this->assertEquals( $expected, $result );
    }

    public function testGetJsFilesFromFolder() {
        $assets = new Assets();
        
        $result = $assets->get_js_files_from_folder( $this->testDir );
        
        $expected = [
            $this->testDir . '/js/app.js',
            $this->testDir . '/js/utils.js',
            $this->testDir . '/libs/jquery.js'
        ];
        
        sort( $result );
        sort( $expected );
        
        $this->assertEquals( $expected, $result );
    }

    public function testGetDependenciesFilesFromFolder() {
        $assets = new Assets();
        
        $result = $assets->get_dependencies_files_from_folder( $this->testDir );
        
        $expected = [
            $this->testDir . '/dist/main.asset.php',
            $this->testDir . '/dist/vendor.asset.php'
        ];
        
        sort( $result );
        sort( $expected );
        
        $this->assertEquals($expected, $result);
    }
}


