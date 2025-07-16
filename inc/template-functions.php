<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package xDevlabs
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function xdevlabs_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'xdevlabs_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function xdevlabs_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'xdevlabs_pingback_header' );

add_filter( 'block_categories_all', function( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'xdevlabs',
                'title' => 'XDevlabs Blocks',
            ),
        )
    );
}, 10, 2 );

function xdevlabs_register_blocks()
{
    $blocks = [
        'slider',
    ];

    foreach ($blocks as $block) {
        register_block_type( get_template_directory() . '/blocks/' . $block );
    }
}
add_action('init', 'xdevlabs_register_blocks');

if (function_exists('acf_add_options_page')) {
    add_action('acf/init', function() {
        acf_add_options_page(array(
            'page_title' 	=> 'XdevLabs Settings',
            'menu_title'	=> 'XdevLabs Settings',
            'menu_slug' 	=> 'xdevlabs-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
    });
}