<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basic_WP_Theme
 */
?>

<section>
    <header>
        <h1><?php esc_html_e('Nothing Found', 'bsk-wp-theme'); ?></h1>
    </header>

    <div>
        <?php if (is_search()) : ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms.', 'bsk-wp-theme'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bsk-wp-theme'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>
