<?php declare(strict_types = 1); ?>

<article <?php post_class(); ?>>
    <header>
        <h1><?php the_title(); ?></h1>
    </header>

    <?php basic_wp_theme_post_thumbnail(); ?>

    <section>
        <?php the_content(); ?>
    </section>
</article>
