<?php

declare(strict_types = 1);

/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Basic_WP_Theme
 */

get_header();

while (have_posts()) :
    the_post();

    get_template_part('template-parts/content', get_post_type());

    the_post_navigation(
        [
            'prev_text' => '<span>' . esc_html__('Previous:', 'basic-wp-theme') . '</span> <span>%title</span>',
            'next_text' => '<span>' . esc_html__('Next:', 'basic-wp-theme') . '</span> <span>%title</span>',
        ]
    );

    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
endwhile;

get_sidebar();
get_footer();
