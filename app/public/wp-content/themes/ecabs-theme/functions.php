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

// Testimonials Custom Post Type
function create_testimonials_custom_post_type() {

    $labels = array(
        'name'                  => _x('Testimonials', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Testimonials', 'textdomain'),
        'name_admin_bar'        => __('Testimonial', 'textdomain'),
        'archives'              => __('Testimonial Archives', 'textdomain'),
        'attributes'            => __('Testimonial Attributes', 'textdomain'),
        'parent_item_colon'     => __('Parent Testimonial:', 'textdomain'),
        'all_items'             => __('All Testimonials', 'textdomain'),
        'add_new_item'          => __('Add New Testimonial', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Testimonial', 'textdomain'),
        'edit_item'             => __('Edit Testimonial', 'textdomain'),
        'update_item'           => __('Update Testimonial', 'textdomain'),
        'view_item'             => __('View Testimonial', 'textdomain'),
        'view_items'            => __('View Testimonials', 'textdomain'),
        'search_items'          => __('Search Testimonial', 'textdomain'),
        'not_found'             => __('Not found', 'textdomain'),
        'not_found_in_trash'    => __('Not found in Trash', 'textdomain'),
        'featured_image'        => __('Client Image', 'textdomain'),
        'set_featured_image'    => __('Set client image', 'textdomain'),
        'remove_featured_image' => __('Remove client image', 'textdomain'),
        'use_featured_image'    => __('Use as client image', 'textdomain'),
        'insert_into_item'      => __('Insert into testimonial', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this testimonial', 'textdomain'),
        'items_list'            => __('Testimonials list', 'textdomain'),
        'items_list_navigation' => __('Testimonials list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter testimonials list', 'textdomain'),
    );

    $args = array(
        'label'                 => __('Testimonials', 'textdomain'),
        'description'           => __('Client testimonials or reviews', 'textdomain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-testimonial',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_in_rest'          => true,
        'capability_type'       => 'post',
    );

    register_post_type('testimonials', $args);
}
add_action('init', 'create_testimonials_custom_post_type', 0);

// Testimonials Carousel Shortcode
function testimonials_carousel_shortcode() {

    ob_start();

    wp_enqueue_style('owl-carousel-style', get_template_directory_uri() . '/css/third-party/owl.carousel.min.css');
    wp_enqueue_script( 'owl-carousel-script', get_template_directory_uri() . '/js/third-party/owl.carousel.min.js', array('jquery'), '1.0.0', true );

    include locate_template('templates/testimonials-carousel-template.php');
    
    return ob_get_clean();
}
add_shortcode('testimonials-carousel', 'testimonials_carousel_shortcode');

// Redirects
add_action('template_redirect', function () {
    if (is_front_page()) {
        wp_redirect(home_url('/ecabs-premium-rides/'), 301);
        exit;
    }
});