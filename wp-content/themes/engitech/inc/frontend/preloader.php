<?php

if( engitech_get_option('preload') != false ){

    function engitech_body_classes( $classes ) {

    	$classes[] = 'royal_preloader';

    	return $classes;        
    }
    add_filter( 'body_class', 'engitech_body_classes' );

    function engitech_preload_body_open_script() {
        echo '<div id="royal_preloader" data-width="'.engitech_get_option('preload_logo_width').'" data-height="'.engitech_get_option('preload_logo_height').'" data-url="'.engitech_get_option('preload_logo').'" data-color="'.engitech_get_option('preload_text_color').'" data-bgcolor="'.engitech_get_option('preload_bgcolor').'"></div>';
        
    }
    add_action( 'wp_body_open', 'engitech_preload_body_open_script' );

    function engitech_preload_scripts() {
    	wp_enqueue_style('engitech-preload', get_template_directory_uri().'/css/royal-preload.css');
    }
    add_action( 'wp_enqueue_scripts', 'engitech_preload_scripts' );

}