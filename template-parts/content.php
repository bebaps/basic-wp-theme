<?php declare(strict_types = 1); ?>

<article <?php post_class(); ?>>
    <header>
        <?php if (is_singular()) : ?>
            <h1><?php the_title(); ?></h1>
        <?php else : ?>
            <h2>
                <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
        <?php endif; ?>

        <?php if ('post' === get_post_type()) : ?>
            <div>
                <?php basic_wp_theme_posted_on(); ?>

                <?php basic_wp_theme_posted_by(); ?>
            </div>
        <?php endif; ?>
    </header>

    <?php basic_wp_theme_post_thumbnail(); ?>

    <section>
        <?php
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading <span>"%s"</span>', 'basic-wp-theme'),
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
                'before' => '<div>' . esc_html__('Pages:', 'basic-wp-theme'),
                'after' => '</div>',
            ]
        );
        ?>
    </section>

    <footer>
        <?php basic_wp_theme_entry_footer(); ?>
    </footer>
</article>
