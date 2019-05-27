<?php

// css and js files

function edsv_setup()
{
    wp_enqueue_style('google-fonts-mandali', '//fonts.googleapis.com/css?family=Mandali&display=swap" rel="stylesheet');
    wp_enqueue_style('google-fonts-anton', '//fonts.googleapis.com/css?family=Anton');
    wp_enqueue_style('bootstrap-style', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '4.3.1');
    wp_enqueue_style('edsv-style', get_stylesheet_uri(), NULL, microtime(), 'all');
    wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.8.1/css/all.css');

    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '1.14.7');
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('popper'), '4.3.1');
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, microtime());
}

add_action('wp_enqueue_scripts', 'edsv_setup');

// Theme support

function edsv_init()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support(
        'html5',
        array('comment-list', 'comment-form', 'search-form')
    );
}

add_action('after_setup_theme', 'edsv_init');

function edsv_post_type() {
    register_post_type('news',
        array(
            'rewrite' => array('slug' => 'news'),
            'labels' => array(
                'name' => 'News',
                'singular_name' => 'Item',
                'add_new_item' => 'Add New Item',
                'edit_item' => 'Edit Item'
            ),
            'menu-icon' => 'dashicons-clipboard',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt', 'comments'
            )
        )
    );
}

add_action('init', 'edsv_post_type');

// Sidebar

function edsv_widgets() {
    register_sidebar(
        array(
            'name' => 'Main Sidebar',
            'id' => 'main_sidebar',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
        );
}
add_action('widgets_init', 'edsv_widgets');

// Filters

function search_filter($query) {
    if($query->is_search()) {
        $query->set('post_type', array('post', 'news'));
    }
}

add_filter('pre_get_posts', 'search_filter');
