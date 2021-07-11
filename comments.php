<?php

declare(strict_types = 1);

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basic_WP_Theme
 */

/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<section>
    <?php if (have_comments()) : ?>
        <h2>
            <?php $basic_wp_theme_comment_count = get_comments_number(); ?>

            <?php if ('1' === $basic_wp_theme_comment_count) :
                printf(
                    esc_html__('One commnet on &ldquo;%1$s&rdquo;', 'basic-wp-theme'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            else :
                printf(
                    esc_html(
                        _nx(
                            '%1$s comments on &ldquo;%2$s&rdquo;',
                            '%1$s thoughts on &ldquo;%2$s&rdquo;',
                            $basic_wp_theme_comment_count,
                            'comments title',
                            'basic-wp-theme'
                        )
                    ),
                    number_format_i18n($basic_wp_theme_comment_count),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            endif; ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol>
            <?php
            wp_list_comments(
                [
                    'style' => 'ol',
                    'short_ping' => true,
                ]
            );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

        <?php if (!comments_open()) : ?>
            <p><?php
                esc_html_e('Comments are closed.', 'basic-wp-theme'); ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <?php comment_form(); ?>
</section>
