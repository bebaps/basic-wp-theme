<?php

declare(strict_types = 1);

/**
 * Basic WP Theme functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Basic_WP_Theme
 */

if (!defined('BASIC_WP_THEME_VERSION')) {
    define('BASIC_WP_THEME_VERSION', '1.0.0');
}

add_action('after_setup_theme', 'basic_wp_theme_setup');
add_action('after_setup_theme', 'basic_wp_theme_content_width', 0);
add_action('widgets_init', 'basic_wp_theme_widgets_init');
add_action('wp_enqueue_scripts', 'basic_wp_theme_scripts');

if (!function_exists('basic_wp_theme_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function basic_wp_theme_setup()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /**
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            [
                'primary' => esc_html__('Primary', 'basic-wp-theme'),
            ]
        );

        /**
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
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

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            [
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            ]
        );
    }
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function basic_wp_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('basic_wp_theme_content_width', 960);
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function basic_wp_theme_widgets_init()
{
    register_sidebar(
        [
            'name' => esc_html__('Sidebar', 'basic-wp-theme'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'basic-wp-theme'),
            'before_widget' => '<aside class="%2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        ]
    );
}

/**
 * Enqueue scripts and styles.
 */
function basic_wp_theme_scripts()
{
    wp_enqueue_style('basic-wp-theme-style', get_stylesheet_uri(), [], BASIC_WP_THEME_VERSION);

    if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
