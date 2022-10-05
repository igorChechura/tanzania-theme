<?php
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
		'page_title' 	=> 'Site General Content',
		'menu_title'	=> 'General Content',
		'menu_slug' 	=> 'site-general-content',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
        'icon_url'      => 'dashicons-schedule',
	));
}