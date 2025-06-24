<?php 

namespace WritePoetry\BlankSpace\Helpers;


/**
 * Scans a directory for files of a certain extension.
 *
 * @since 3.4.0
 *
 * @param string            $path          Absolute path to search.
 * @param array|string|null $extensions    Optional. Array of extensions to find, string of a single extension,
 *                                         or null for all extensions. Default null.
 * @param int               $depth         Optional. How many levels deep to search for files. Accepts 0, 1+, or
 *                                         -1 (infinite depth). Default 0.
 * @param string            $relative_path Optional. The basename of the absolute path. Used to control the
 *                                         returned path for the found files, particularly when this function
 *                                         recurses to lower depths. Default empty.
 * @return string[]|false Array of files, keyed by the path to the file relative to the `$path` directory prepended
 *                        with `$relative_path`, with the values being absolute paths. False otherwise.
 */

function scandir( $path, $extensions = null, $depth = 0, $relative_path = '' ) {
    if ( ! is_dir( $path ) ) {
        return false;
    }

    if ( $extensions ) {
        $extensions  = (array) $extensions;
        $_extensions = implode( '|', $extensions );
    }

    $relative_path = trailingslashit( $relative_path );
    if ( '/' === $relative_path ) {
        $relative_path = '';
    }

    $results = \scandir( $path );
    $files   = array();

    /**
     * Filters the array of excluded directories and files while scanning theme folder.
     *
     * @since 4.7.4
     *
     * @param string[] $exclusions Array of excluded directories and files.
     */
    $exclusions = (array) apply_filters( 'theme_scandir_exclusions', array( 'CVS', 'node_modules', 'vendor', 'bower_components' ) );

    foreach ( $results as $result ) {
        if ( '.' === $result[0] || in_array( $result, $exclusions, true ) ) {
            continue;
        }
        if ( is_dir( $path . '/' . $result ) ) {
            if ( ! $depth ) {
                continue;
            }
            $found = scandir( $path . '/' . $result, $extensions, $depth - 1, $relative_path . $result );
            $files = array_merge_recursive( $files, $found );
        } elseif ( ! $extensions || preg_match( '~\.(' . $_extensions . ')$~', $result ) ) {
            $files[ $relative_path . $result ] = $path . '/' . $result;
        }
    }

    return $files;
}