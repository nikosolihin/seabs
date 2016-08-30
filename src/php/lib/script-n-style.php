<?php
//=============================================
// Register front-end styles
//=============================================
function saat_styles() {
	wp_deregister_style( 'saat-style' );
	wp_register_style( 'saat-style', get_stylesheet_directory_uri() . '/stylesheets/app.css', false, null );
	wp_enqueue_style( 'saat-style' );
}
add_action( 'wp_enqueue_scripts', 'saat_styles' );

//=============================================
// Register front-end scripts
//=============================================
function saat_scripts() {
	wp_deregister_script( 'saat-script' );
	wp_register_script( 'saat-script', get_stylesheet_directory_uri() . '/javascripts/app.js', false, null, true );
	wp_enqueue_script( 'saat-script' );
}
// add_action( 'wp_enqueue_scripts', 'saat_scripts' );

//=============================================
// Register dashboard style
//=============================================
function saat_admin_styles() {
	wp_deregister_style( 'saat-admin-style' );
	wp_register_style( 'saat-admin-style', get_template_directory_uri() . '/dashboard/custom-style.css', false, '1.0.0' );
	wp_enqueue_style( 'saat-admin-style' );
}
add_action( 'admin_enqueue_scripts', 'saat_admin_styles' );

//=============================================
// Register dashboard script
//=============================================
function saat_admin_scripts() {
	wp_deregister_script( 'saat-admin-script' );
	wp_register_script( 'saat-admin-script', get_template_directory_uri() . '/dashboard/custom-script.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'saat-admin-script' );
}
add_action( 'admin_enqueue_scripts', 'saat_admin_scripts' );
