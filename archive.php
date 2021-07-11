<?php

declare(strict_types = 1);

/**
 * The template for displaying archive pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basic_WP_Theme
 */
get_header();

if (have_posts()) : ?>
    <header>
        <h1><?php the_archive_title(); ?></h1>

        <div><?php the_archive_description(); ?></div>
    </header>

    <?php while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', get_post_type());
    endwhile;

    the_posts_navigation();
else :
    get_template_part('template-parts/content', 'none');
endif;

get_sidebar();
get_footer();
