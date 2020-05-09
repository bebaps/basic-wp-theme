<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Basic_WP_Theme
 */

if (!function_exists('bsk_wp_theme_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function bsk_wp_theme_posted_on()
    {
        $time_string = '<time datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            esc_html_x('Posted on %s', 'post date', 'bsk-wp-theme'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span>' . $posted_on . '</span>';
    }
endif;

if (!function_exists('bsk_wp_theme_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function bsk_wp_theme_posted_by()
    {
        $byline = sprintf(
            esc_html_x('by %s', 'post author', 'bsk-wp-theme'),
            '<span><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span> ' . $byline . '</span>';
    }
endif;

if (!function_exists('bsk_wp_theme_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function bsk_wp_theme_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            $categories_list = get_the_category_list(esc_html__(', ', 'bsk-wp-theme'));
            if ($categories_list) {
                printf('<span>' . esc_html__('Posted in %1$s', 'bsk-wp-theme') . '</span>', $categories_list);
            }

            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'bsk-wp-theme'));
            if ($tags_list) {
                printf('<span>' . esc_html__('Tagged %1$s', 'bsk-wp-theme') . '</span>', $tags_list);
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span>';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        __('Leave a Comment <span>on %s</span>', 'bsk-wp-theme'),
                        [
                            'span' => [
                                'class' => [],
                            ],
                        ]
                    ),
                    wp_kses_post(get_the_title())
                )
            );
            echo '</span>';
        }
    }
endif;

if (!function_exists('bsk_wp_theme_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function bsk_wp_theme_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) : ?>

            <figure>
                <?php the_post_thumbnail(); ?>
            </figure>

        <?php else : ?>

            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    'post-thumbnail',
                    [
                        'alt' => the_title_attribute(
                            [
                                'echo' => false,
                            ]
                        ),
                    ]
                );
                ?>
            </a>

        <?php
        endif;
    }
endif;
