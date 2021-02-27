<?php
/**
 * Devopress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Devopress
 */

define('DOMAIN', 'devopress');
require_once get_template_directory() . '/vendor/autoload.php';

if (!function_exists('devopress_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function devopress_setup()
  {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Devopress, use a find and replace
     * to change 'devopress' to the name of your theme in all the template files.
     */
    load_theme_textdomain(DOMAIN, get_template_directory() . '/languages');

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
      'main' => esc_html__('Main', DOMAIN),
    ]);
  }
endif;
add_action('after_setup_theme', 'devopress_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function devopress_content_width()
{
  $GLOBALS['content_width'] = apply_filters('devopress_content_width', 640);
}

add_action('after_setup_theme', 'devopress_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', function ()
{
  wp_enqueue_style( 'styles', mix( 'style.css', ''), [], null );
  wp_deregister_script('jquery');
  wp_deregister_script('jquery-migrate');
  wp_enqueue_script( 'scripts', mix('script.js', ''), [], null, true);
});

/**
 * Includes
 */
require_once get_template_directory() . '/inc/inc.php';


