<?php declare(strict_types = 1); ?>

<article <?php post_class(); ?>>
    <header>
        <h2>
            <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>

        <?php if ('post' === get_post_type()) : ?>
            <div>
                <?php basic_wp_theme_posted_on(); ?>

                <?php basic_wp_theme_posted_by(); ?>
            </div>
        <?php endif; ?>
    </header>

    <?php basic_wp_theme_post_thumbnail(); ?>

    <section>
        <?php the_excerpt(); ?>
    </section>

    <footer>
        <?php basic_wp_theme_entry_footer(); ?>
    </footer>
</article>
