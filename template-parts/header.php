<header>
    <div>
        <?php the_custom_logo(); ?>
        <?php if (is_front_page() && is_home()) : ?>
            <h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
        <?php else : ?>
            <p><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <?php endif; ?>
        <?php $bsk_wp_theme_description = get_bloginfo('description', 'display'); ?>
        <?php if ($bsk_wp_theme_description || is_customize_preview()) : ?>
            <p><?php echo $bsk_wp_theme_description; ?></p>
        <?php endif; ?>
    </div>

    <nav>
        <button aria-controls="menu" aria-expanded="false"><?php esc_html_e('Menu', 'bsk-wp-theme'); ?></button>
        <?php
        wp_nav_menu(
            [
                'theme_location' => 'primary',
                'menu_id'        => 'menu',
            ]
        );
        ?>
    </nav>
</header>
