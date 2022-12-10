<?php

const TEXT_DOMAIN = 'devopress';

require_once get_template_directory() . '/vendor/autoload.php';

require_once get_template_directory() . '/inc/TGM/init.php';
require_once get_template_directory() . '/inc/carbon-fields/init.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/WP_Mail.php';

require_once get_template_directory() . '/api/api.php';

add_action('after_setup_theme', function () {
    load_theme_textdomain( TEXT_DOMAIN, get_template_directory() . '/languages');

    register_nav_menus( [
        'header-menu' => esc_html__('Header menu', TEXT_DOMAIN ),
    ] );

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]
    );
    add_theme_support('customize-selective-refresh-widgets');
});


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'app-font',
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap',
        [ 'app-style' ],
        null
    );
    wp_enqueue_style('app-style', mix('/style.css', ''), [], null );
    wp_enqueue_script('app-script', mix('/script.js', ''), [ 'jquery' ], null, true );
} );
