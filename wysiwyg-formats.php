<?php
/*
Plugin Name: WYSIWYG Formats
Description: Creates "Formats" dropdown in the WYSIWYG toolbar for site-specific body elements.
Version:     1.0
Author:      John Spellman
*/

if (!defined('ABSPATH')) exit;

function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');


/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

	$style_formats = array(
		// Each array child is a format with it's own settings
		// Add new elements/classes below
		array(
			'title' => 'H2 Block Title',
			'block' => 'h2',
			'classes' => 'block-title',
			'exact' => true,
		),
		array(
			'title' => 'Button Link',
			'block' => 'a',
			'classes' => 'button-link',
			'exact' => true,
		),
		array(
			'title' => 'Arrow Tall',
			'block' => 'a',
			'classes' => 'arrow-tall',
			'exact' => true,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

?>
