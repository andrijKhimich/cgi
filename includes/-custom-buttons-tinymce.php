<?php
/**
 * Custom TinyMCE Buttons and ACF Toolbar modifications for the theme.
 *
 * This file contains functions to add custom buttons to the TinyMCE editor
 * and modify the ACF WYSIWYG toolbar.
 *
 * @category   Components
 * @package    WordPress
 * @since      1.0.0
 */

/**
 * Modify the TinyMCE toolbars for ACF WYSIWYG fields.
 *
 * @param array $toolbars Existing toolbars.
 * @return array Modified toolbars.
 */
function my_toolbars( array $toolbars ): array {
	$toolbars['Basic+CustomButtons']    = array();
	$toolbars['Basic+CustomButtons'][1] = array( 'orange', 'decor' );
	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars', 'my_toolbars' );

/**
 * Initialize custom TinyMCE buttons.
 *
 * @return void
 */
function wptuts_buttons(): void {
	add_filter( 'mce_external_plugins', 'wptuts_add_buttons' );
	add_filter( 'mce_buttons', 'wptuts_register_buttons' );
}
add_action( 'init', 'wptuts_buttons' );

/**
 * Add custom TinyMCE plugins.
 *
 * @param array $plugin_array Array of existing TinyMCE plugins.
 * @return array Modified array of TinyMCE plugins.
 */
function wptuts_add_buttons( array $plugin_array ): array {
	$plugin_array['wptuts'] = get_template_directory_uri() . '/includes/custom-buttons-tinymce.js';
	return $plugin_array;
}

/**
 * Register custom TinyMCE buttons.
 *
 * @param array $buttons Array of existing TinyMCE buttons.
 * @return array Modified array of TinyMCE buttons.
 */
function wptuts_register_buttons( array $buttons ): array {
	array_unshift( $buttons, 'orange', 'decor' );
	return $buttons;
}
