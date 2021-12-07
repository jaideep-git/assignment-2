<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

function showTimeTheme_enqueue_scripts() {
    $parenthandle = 'twentytwentyone-style'; // This is 'twentytewntyone-style' for the perfect theme.
    $theme = wp_get_theme();
    wp_enqueue_style( 
        $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 
        'perfect-style', 
        get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

add_action( 'wp_enqueue_scripts', 'showTimeTheme_enqueue_scripts' );

function customthemechild_enqueue_styles() {
    wp_enqueue_style( 'customthemechild-style', get_stylesheet_uri(),
        array( 'twenty-twenty-one-style' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}
add_action( 'wp_enqueue_scripts', 'customthemechild_enqueue_styles' );