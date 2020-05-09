<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basic_WP_Theme
 */
?>

<article <?php post_class(); ?>>
    <header>
        <h1><?php the_title(); ?></h1>
    </header>

    <?php bsk_wp_theme_post_thumbnail(); ?>

    <section>
        <?php the_content(); ?>
    </section>
</article>
