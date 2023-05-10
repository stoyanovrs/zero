<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zero
 * @since 1.0.0
 */

/**
 * Add theme support.
 */
function zero_setup() {
	/*
	 * Load additional block styles.
	 */
	$styled_blocks = [ 'quote' ];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "zero-$block_name",
			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.css" ),
			'path'   => get_theme_file_path( "assets/css/blocks/$block_name.css" ),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style( "core/$block_name", $args );
	}
}
add_action( 'after_setup_theme', 'zero_setup' );

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function zero_styles() {
	wp_enqueue_style(
		'zero-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'zero_styles' );

// Woocommerce
require_once get_theme_file_path( 'inc/woo.php' );