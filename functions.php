<?php
/**
 * Devocraft functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Devocraft
 */

if (!function_exists('devocraft_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function devocraft_setup()
  {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Devocraft, use a find and replace
     * to change 'devocraft' to the name of your theme in all the template files.
     */
    load_theme_textdomain('devocraft', get_template_directory() . '/languages');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
      'main' => esc_html__('Main', 'devocraft'),
    ]);
  }
endif;
add_action('after_setup_theme', 'devocraft_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function devocraft_content_width()
{
  $GLOBALS['content_width'] = apply_filters('devocraft_content_width', 640);
}

add_action('after_setup_theme', 'devocraft_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function devocraft_scripts()
{
  wp_enqueue_style(
    'devocraft-theme-css',
    get_stylesheet_uri(),
    [],
    wp_get_theme()->get('Version')
  );
  wp_enqueue_script(
    'devocraft-theme-js',
    get_template_directory_uri() . '/assets/js/dist/theme.min.js',
    array(),
    wp_get_theme()->get('Version'),
    true
  );
}

add_action('wp_enqueue_scripts', 'devocraft_scripts');

/**
 * TGM Class
 */
require get_template_directory() . '/inc/TGM/tgm-init.php';

/**
 * Classes
 */
require get_template_directory() . '/inc/Classes/Site.php';
require get_template_directory() . '/inc/Classes/Assets.php';

/**
 * Carbon Fields
 */
require get_template_directory() . '/inc/carbon-fields/carbon-fields-init.php';
