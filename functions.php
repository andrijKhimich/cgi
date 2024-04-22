<?php
// Functions parts
include_once 'includes/_assets.php';
// include_once 'includes/_post-types-registration.php';
// include_once 'includes/_taxonomies-registration.php';
// include_once 'includes/_ajax.php';
// include_once 'includes/_custom-functions.php';
include_once 'includes/_custom-buttons-tinymce.php';


// Local acf fields
function local_acf_json_save_point($path)
{
	// update path
	$path = get_stylesheet_directory() . '/acf';

	// return
	return $path;
}
add_filter('acf/settings/save_json', 'local_acf_json_save_point');

function my_acf_json_load_point($paths)
{
	unset($paths[0]);
	$paths[] = get_stylesheet_directory() . '/acf';

	return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_myme_types($mime_types)
{
	$mime_types['svg'] = 'image/svg+xml';
	return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

if (function_exists('add_theme_support')) {
	add_theme_support('menus');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}

/*
 * Add Menu Wp
 * */


function site_features()
{
	register_nav_menu('Header menu', 'Header menu');
	register_nav_menu('Sitemap menu', 'Sitemap menu');
	register_nav_menu('What we do menu', 'What we do menu');
	register_nav_menu('Legal menu', 'Legal menu');
};

add_action('after_setup_theme', 'site_features');

add_image_size('full_hd', 1920, 1080);
add_action('wp_print_styles', 'wps_deregister_styles', 100);
function wps_deregister_styles()
{
	wp_deregister_style('contact-form-7');
	// wp_deregister_style('wp-block-library');
	// wp_deregister_style('wp-block-library-theme');
	// wp_deregister_style('wc-block-style');
}

add_filter('wpcf7_autop_or_not', '__return_false');
