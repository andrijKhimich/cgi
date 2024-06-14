<?php
/**
 * Assets file for the theme.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Rech
 * @since      1.0.0
 */

/**
 * Enqueue theme assets.
 *
 * @return void
 */
function my_assets(): void {
	// Get the theme directory URI.
	$stylesheet_directory_uri = get_stylesheet_directory_uri();
	$template_directory_uri   = get_template_directory_uri();

	// Deregister and register jQuery core.
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', $stylesheet_directory_uri . '/libs/js/jquery-3.5.0.min.js', array(), '3.5.0', false );
	wp_enqueue_script( 'jquery' );

	// Enqueue styles with version numbers.
	wp_enqueue_style( 'splide-core', $template_directory_uri . '/libs/css/splide-core.min.css', array(), filemtime( get_template_directory() . '/libs/css/splide-core.min.css' ) );
	wp_enqueue_style( 'splide-styles', $template_directory_uri . '/libs/css/splide.min.css', array(), filemtime( get_template_directory() . '/libs/css/splide.min.css' ) );
	wp_enqueue_style( 'main-style', $template_directory_uri . '/build/css/main.css', array(), filemtime( get_template_directory() . '/build/css/main.css' ) );

	// Enqueue scripts with version numbers.
	wp_enqueue_script( 'ukiyo-js', $stylesheet_directory_uri . '/libs/js/ukiyo.min.js', array(), filemtime( get_stylesheet_directory() . '/libs/js/ukiyo.min.js' ), true );
	wp_enqueue_script( 'swiper-js', $stylesheet_directory_uri . '/libs/js/splide.min.js', array(), filemtime( get_stylesheet_directory() . '/libs/js/splide.min.js' ), true );
	wp_enqueue_script( 'lenis-js', $stylesheet_directory_uri . '/libs/js/lenis.min.js', array(), filemtime( get_stylesheet_directory() . '/libs/js/lenis.min.js' ), true );
	wp_enqueue_script( 'gsap-js', $stylesheet_directory_uri . '/libs/js/gsap.min.js', array(), filemtime( get_stylesheet_directory() . '/libs/js/gsap.min.js' ), true );
	wp_enqueue_script( 'main-js', $stylesheet_directory_uri . '/build/js/main.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/build/js/main.js' ), true );

	// Conditional enqueues.
	if ( is_single() ) {
		wp_enqueue_style( 'magnific-popup-styles', $template_directory_uri . '/libs/css/magnific-popup.min.css', array(), filemtime( get_template_directory() . '/libs/css/magnific-popup.min.css' ) );
		wp_enqueue_script( 'magnific-popup-js', $stylesheet_directory_uri . '/libs/js/magnific-popup.min.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/libs/js/magnific-popup.min.js' ), true );
	}
	if ( is_404() ) {
		wp_enqueue_style( '404', $template_directory_uri . '/build/css/pages/404.css', array(), filemtime( get_template_directory() . '/build/css/pages/404.css' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'my_assets' );

/**
 * Enqueue admin styles.
 *
 * @return void
 */
function load_admin_style(): void {
	$template_directory_uri = get_template_directory_uri();
	wp_enqueue_style( 'admin-style-css', $template_directory_uri . '/admin-style.css', array(), filemtime( get_template_directory() . '/admin-style.css' ) );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );

// Add custom styles for the WordPress editor.
add_editor_style( 'admin-style.css' );
