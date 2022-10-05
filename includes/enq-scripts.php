<?php
function main_scripts() {
	// main.min.css
	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/assets/styles/main.min.css', array(), filemtime( get_stylesheet_directory() . '/assets/styles/main.min.css' ) );

	// main.min.js
	wp_register_script('main-script', get_stylesheet_directory_uri() . '/assets/scripts/main.min.js', array(), filemtime( get_stylesheet_directory() . '/assets/scripts/main.min.js' ), true);
	wp_enqueue_script('main-script');
}
add_action( 'wp_enqueue_scripts', 'main_scripts' );