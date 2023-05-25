<?php
/*
 * Main Navigation
 */
?>
<nav id="cb-main-navigation">
    <?php
    $cafebistro_menu_args = array(
        'theme_location' => 'main',
        'container' => false,
        'menu_id' => false,
        'menu_class' => 'responsive-menu',
        'echo' => true,
        'fallback_cb' => false);
    wp_nav_menu($cafebistro_menu_args);
    ?>
</nav>
