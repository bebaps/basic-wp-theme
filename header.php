<?php

declare(strict_types = 1);

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Basic_WP_Theme
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="theme-color" content="#000">

        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
        <?php basic_wp_theme_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <?php basic_wp_theme_body_open(); ?>

        <a href="#mainContent"><?php esc_html_e('Skip to content', 'basic-wp-theme'); ?></a>

        <div>
            <?php get_template_part('template-parts/header'); ?>

            <main id="mainContent">
