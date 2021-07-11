<?php

declare(strict_types = 1);

/**
 * The template for displaying 404 pages (not found)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Basic_WP_Theme
 */

get_header();
?>

    <section>
        <header>
            <h1><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'basic-wp-theme'); ?></h1>
        </header>

        <div>
            <p><?php esc_html_e('What you are looking for was not found.', 'basic-wp-theme'); ?></p>
        </div>
    </section>

<?php
get_footer();
