<div id="mobile-header">
    <a id="responsive-menu-button" href="#cb-mobile-navigation"><i class="fa fa-bars"></i></a>
    <nav id="cb-mobile-navigation">
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
</div>
