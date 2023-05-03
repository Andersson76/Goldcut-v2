<?php
/**
 * Loads the WordPress environment and template.
 *
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */
/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */

if ( ! isset( $wp_did_header ) ) {
	
	$wp_did_header = true;
	define( 'WP_USE_THEMES', true );
	
	/** Loads the WordPress Environment and Template */
	require __DIR__ . '/wp-blog-header.php';

	// Load the WordPress library.
	require_once __DIR__ . '/wp-load.php';

	// Set up the WordPress query.
	wp();

	// Load the theme template.
	require_once ABSPATH . WPINC . '/template-loader.php';

}
