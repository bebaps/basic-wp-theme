<?php
/**
 * The sidebar containing the main widget area
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Basic_WP_Theme
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}

dynamic_sidebar('sidebar-1');
