<?php
/**
 * Twenties Child Theme
 *
 * @package Twenty_Twenty_Child
 */

/*
Use this filter to change the default path for additional blocks styles.
add_filter( 'writepoetry_blocks_styles_asset_path', function () {
	return 'assets/block';
} );
*/

/**
 * Copy the following lines in your functions.php theme file
 * if you want to remove some particular mime type
 * added by this plugin
 */

add_filter(
	'upload_mimes',
	function ( $mimes ) {
		// Optional. Remove a mime type.
		unset( $mimes['exe'] );
		unset( $mimes['svg'] );
		unset( $mimes['svgz'] );

		return $mimes;
	}
);

add_filter(
	'mime_types',
	function ( $wp_get_mime_types ) {
		// Optional. Remove a mime type.
		unset( $wp_get_mime_types['exe'] );
		unset( $wp_get_mime_types['svg'] );
		unset( $wp_get_mime_types['svgz'] );

		return $wp_get_mime_types;
	}
);




add_filter(
	'writepoetry_register_block_style',
	function () {
		// Define block styles with their labels and CSS styles.
		$block_styles = array(
			'core/group' => array(
				'name'         => 'inline',
				'label'        => __( 'Inline', 'twenties' ),
				'is_default'   => true,
				'inline_style' => '.wp-block-group.is-style-inline { display: inline-flex; }',
			),
			'core/cover' => array(
				array(
					'name'         => 'inline1',
					'label'        => __( 'Inline1', 'twenties' ),
					'is_default'   => true,
					'inline_style' => '  .is-style-inline1 { display: block; }',
				),
				array(
					'name'         => 'inline2',
					'label'        => __( 'Inline2', 'twenties' ),
					'inline_style' => '  .is-style-inline2 { display: inline-flex; }',
				),
			),
		);

		return $block_styles;
	}
);

add_action( 'init', 'projectslug_register_meta' );

function projectslug_register_meta() {
    register_meta(
        'post',
        'projectslug_image_url',
        array(
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => 'string',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    
    register_meta(
        'post',
        'projectslug_image_alt',
        array(
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => 'string',
            'sanitize_callback' => 'wp_strip_all_tags'
        )
    );
}

// Load front-end assets.
add_action( 'wp_enqueue_scripts', 'themeslug_assets' );

function themeslug_assets() {
	$asset = include get_theme_file_path( 'public/css/screen.asset.php' );

	wp_enqueue_style(
		'themeslug-style',
		get_theme_file_uri( 'public/css/screen.css' ),
		$asset['dependencies'],
		$asset['version']
	);
	
	$script_asset = include get_theme_file_path( 'public/js/screen.asset.php'  );
 
	wp_enqueue_script(
		'themeslug-screen',
		get_theme_file_uri( 'public/js/screen.js' ),
		$script_asset['dependencies'],
		$script_asset['version'],
		true
	);

}

// Load editor stylesheets.
add_action( 'after_setup_theme', 'themeslug_editor_styles' );

function themeslug_editor_styles() {
	add_editor_style( [
		get_theme_file_uri( 'public/css/screen.css' )
	] );
}

// Load editor scripts.
add_action( 'enqueue_block_editor_assets', 'themeslug_editor_assets' );

function themeslug_editor_assets() {
	$script_asset = include get_theme_file_path( 'public/js/editor.asset.php'  );
	$style_asset  = include get_theme_file_path( 'public/css/editor.asset.php' );

	wp_enqueue_script(
		'themeslug-editor',
		get_theme_file_uri( 'public/js/editor.js' ),
		$script_asset['dependencies'],
		$script_asset['version'],
		true
	);

	wp_enqueue_style(
		'themeslug-editor',
		get_theme_file_uri( 'public/css/editor.css' ),
		$style_asset['dependencies'],
		$style_asset['version']
	);
}