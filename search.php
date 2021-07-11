<?php

declare(strict_types = 1);

/**
 * The template for displaying search results pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Basic_WP_Theme
 */

get_header();

if (have_posts()) : ?>

    <header>
        <h1><?php
            printf(
                esc_html__('Search Results for: %s', 'basic-wp-theme'),
                '<span>' . get_search_query() . '</span>'
            ); ?>
        </h1>
    </header>

    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', 'search');
    endwhile;

    the_posts_navigation();
else :
    get_template_part('template-parts/content', 'none');
endif;

get_sidebar();
get_footer();
