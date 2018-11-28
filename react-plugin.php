<?php
/**
 * Plugin Name: React Plugin
 * Description: Demo Plugin.
 * Version: 1.0.0
 * Text Domain: react-plugin
 * Domain Path: /languages
 * License: GPLv2 or later
 */


// Create Admin Page
add_action( 'admin_menu', function() {
	add_menu_page(
	__( 'React Plugin' ),
	__( 'React Plugin' ),
	'edit_pages',
	'react-plugin',
	function() {
		echo '<div id="react-plugin-app"></div>';
	} );
} );

add_action( 'admin_enqueue_scripts', function( $hook ) {
	if ( 'toplevel_page_react-plugin' !== $hook ) {
		return;
	}

	$url = ! empty( $_SERVER['HTTP_X_DEV_SERVER_URL'] ) ?
		$_SERVER['HTTP_X_DEV_SERVER_URL'] : plugins_url( '', __FILE__ );

	wp_register_script(
		'react-plugin-runtime',
		$url . '/build/runtime.js'
	);

	// Enqueue Scripts
	wp_enqueue_script(
		'react-plugin-script',
		$url . '/build/index.js',
		[ 'react', 'react-dom', 'react-plugin-runtime' ],
		filemtime( __DIR__ . '/build/index.js' ),
		true
	);

	// wp_enqueue_script( 'react-plugin-styles', plugins_url( 'build/HelloWorld.js', __FILE__ ) );

	// Enqueue Styles
} );
