<?php

declare(strict_types = 1);

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Basic_WP_Theme
 */

 add_filter('body_class', 'basic_wp_theme_body_classes');
 add_action('wp_head', 'basic_wp_theme_pingback_header');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function basic_wp_theme_body_classes(array $classes): array
{
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function basic_wp_theme_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
