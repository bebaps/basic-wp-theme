<?php
/**
 * Template part for displaying posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basic_WP_Theme
 */
?>

<article <?php post_class(); ?>>
    <header>
        <?php if (is_singular()) : ?>
            <h1><?php the_title(); ?></h1>
        <?php else : ?>
            <h2><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php endif; ?>

        <?php if ('post' === get_post_type()) : ?>
            <div>
                <?php bsk_wp_theme_posted_on(); ?>
                <?php bsk_wp_theme_posted_by(); ?>
            </div>
        <?php endif; ?>
    </header>

    <?php bsk_wp_theme_post_thumbnail(); ?>

    <section>
        <?php
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading <span>"%s"</span>', 'bsk-wp-theme'),
                    [
                        'span' => [
                            'class' => [],
                        ],
                    ]
                ),
                wp_kses_post(get_the_title())
            )
        );

        wp_link_pages(
            [
                'before' => '<div>' . esc_html__('Pages:', 'bsk-wp-theme'),
                'after'  => '</div>',
            ]
        );
        ?>
    </section>

    <footer>
        <?php bsk_wp_theme_entry_footer(); ?>
    </footer>
</article>
