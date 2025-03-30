<?php

/**
 * Function describe for online-store 
 * 
 * @package online-store
 */
include_once( trailingslashit(get_stylesheet_directory()) . 'lib/online-store-metaboxes.php' );
include_once( trailingslashit(get_stylesheet_directory()) . 'lib/custom-config.php' );

add_action('wp_enqueue_scripts', 'online_store_enqueue_styles');

function online_store_enqueue_styles() {
    wp_enqueue_style('maxstore-stylesheet', get_template_directory_uri() . '/style.css', array('bootstrap'));
    wp_enqueue_style('online-store-child-style', get_stylesheet_uri(), array('maxstore-stylesheet'));
}

function online_store_theme_setup() {

    load_child_theme_textdomain('online-store', get_stylesheet_directory() . '/languages');

    add_image_size('maxstore-slider', 1140, 488, true);
}

add_action('after_setup_theme', 'online_store_theme_setup');

// remove unused theme options
function online_store_custom_remove($wp_customize) {
    $wp_customize->remove_control('infobox-text-right');
}

add_action('customize_register', 'online_store_custom_remove', 100);

// remove parent theme homepage style
function online_store_remove_page_templates($templates) {
    unset($templates['template-home.php']);
    return $templates;
}

add_filter('theme_page_templates', 'online_store_remove_page_templates');

// Load theme info page.
if (is_admin()) {
    include_once(trailingslashit(get_template_directory()) . 'lib/welcome/welcome-screen.php');
}
