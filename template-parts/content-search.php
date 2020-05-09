<?php
/**
 * Template part for displaying results in search pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basic_WP_Theme
 */
?>

<article <?php post_class(); ?>>
    <header>
        <h2><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

        <?php if ('post' === get_post_type()) : ?>
            <div>
                <?php bsk_wp_theme_posted_on(); ?>
                <?php bsk_wp_theme_posted_by(); ?>
            </div>
        <?php endif; ?>
    </header>

    <?php bsk_wp_theme_post_thumbnail(); ?>

    <section>
        <?php the_excerpt(); ?>
    </section>

    <footer>
        <?php bsk_wp_theme_entry_footer(); ?>
    </footer>
</article>
