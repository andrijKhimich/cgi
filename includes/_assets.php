<?php
/*
 * Подключение стилей и скриптов
 * */

function my_assets()
{
	wp_deregister_script('jquery-core');
	wp_register_script('jquery-core', get_stylesheet_directory_uri() . '/libs/js/jquery-3.5.0.min.js');
	wp_enqueue_script('jquery');
	// wp_enqueue_style('autocomplete-style', get_template_directory_uri() . '/libs/css/jquery-ui.min.css');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/build/css/main.css');
	wp_enqueue_script('ukiyo-js', get_stylesheet_directory_uri() . '/libs/js/ukiyo.min.js', true);
	wp_enqueue_script('lenis-js', get_stylesheet_directory_uri() . '/libs/js/lenis.min.js', true);

	wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/build/js/main.js',  array('jquery'), '1.0', true);
	// wp_enqueue_script('search-js', get_stylesheet_directory_uri() . '/build/static/js/modules/search.js',  array('jquery'), '1.0', true);
	// wp_localize_script('search-js', 'ajax_object', array(
	// 	'ajax_url' => admin_url('admin-ajax.php'),
	// 	'search_url' => home_url('/')
	// ));
	// wp_enqueue_script('autocomplete-js', get_stylesheet_directory_uri() . '/libs/js/jquery-ui.min.js',  array('jquery'), '1.0', true);

	// if (is_page_template('page-home.php')) {
	// 	wp_enqueue_style('page-home-css', get_template_directory_uri() . '/build/static/css/pages/page-home.css');
	// }
	// if (is_page_template('page-partnership.php')) {
	// 	wp_enqueue_style('page-partnership-css', get_template_directory_uri() . '/build/static/css/pages/page-partnership.css');
	// }

	if (is_404()) {
		wp_enqueue_style('404', get_template_directory_uri() . '/build/static/css/pages/page-404.css');
	}

	// if (is_search()) {
	// 	wp_enqueue_style('search', get_template_directory_uri() . '/build/static/css/pages/page-search.css');
	// }
}

add_action('wp_enqueue_scripts', 'my_assets');

add_action('admin_enqueue_scripts', 'load_admin_style');
function load_admin_style()
{
	wp_enqueue_style('admin-style-css', get_template_directory_uri() . '/admin-style.css');
}
add_editor_style('admin-style.css');
