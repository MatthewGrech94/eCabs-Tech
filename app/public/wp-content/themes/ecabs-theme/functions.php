<?php

function ecabs_register_menus() {
    register_nav_menus(array(
        'header-navigation' => __('Header Navigation', 'ecabs-theme'),
    ));
}
add_action('after_setup_theme', 'ecabs_register_menus');

function ecabs_theme_enqueues() {


    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap', false );

    // Enqueue main stylesheet
    wp_enqueue_style( 'ecabs-theme-style', get_stylesheet_uri() );

    // Enqueue scripts
    wp_enqueue_script(
        'mytheme-scripts', 
        get_template_directory_uri() . '/js/ecabs-theme-script.js', 
        array('jquery'), 
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'ecabs_theme_enqueues' );
