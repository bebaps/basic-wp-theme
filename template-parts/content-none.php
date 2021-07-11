<?php declare(strict_types = 1); ?>

<section>
    <header>
        <h1><?php esc_html_e('Nothing Found', 'basic-wp-theme'); ?></h1>
    </header>

    <div>
        <?php if (is_search()) : ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms.', 'basic-wp-theme'); ?></p>

            <?php get_search_form(); ?>
        <?php else : ?>
            <p>
                <?php
                esc_html_e(
                    'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.',
                    'basic-wp-theme'
                ); ?>
            </p>

            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>
