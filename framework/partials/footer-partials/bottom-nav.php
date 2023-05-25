<nav id="cb-bottom-navigation">
    <?php
    $bottom_menu_args = array(
        'theme_location' => 'footer',
        'container' => false,
        'menu_id' => false,
        'menu_class' => 'bottom-menu',
        'echo' => true);
    wp_nav_menu($bottom_menu_args);
    ?>
</nav>