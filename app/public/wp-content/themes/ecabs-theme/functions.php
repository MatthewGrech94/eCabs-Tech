<?php

// Register Menu
function ecabs_register_menus() {
    register_nav_menus(array(
        'header-navigation' => __('Header Navigation', 'ecabs-theme'),
    ));
}
add_action('after_setup_theme', 'ecabs_register_menus');

// eCabs Theme
function ecabs_theme_enqueues() {

    // Enqueue google font
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap', false );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', array(), '6.5.0' );

    // Enqueue main stylesheet
    wp_enqueue_style( 'ecabs-theme-style', get_stylesheet_uri() );

    // Enqueue scripts
    wp_enqueue_script( 'ecabs-theme-script', get_template_directory_uri() . '/js/ecabs-theme-script.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'ecabs_theme_enqueues' );

// Product Template
function product_template_enqueues() {
    if (is_page_template('product-template.php')) {
        // Enqueue style & script
        wp_enqueue_style('product-template-style', get_template_directory_uri() . '/css/product-page.css');
        wp_enqueue_script( 'product-template-script', get_template_directory_uri() . '/js/templates/product-template-script.js', array('jquery'), '1.0.0', true );
    }
}
add_action('wp_enqueue_scripts', 'product_template_enqueues');

// Contact Template
function contact_template_enqueues() {
    if (is_page_template('contact-template.php')) {
        wp_enqueue_style('contact-template-style', get_template_directory_uri() . '/css/contact-page.css');       
    }
}
add_action('wp_enqueue_scripts', 'contact_template_enqueues');

// Redirects
add_action('template_redirect', function () {
    if (is_front_page()) {
        wp_redirect(home_url('/ecabs-premium-rides/'), 301);
        exit;
    }
});