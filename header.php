<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
<!-- Loader -->

<!-- Load Header area partials -->


<?php get_template_part('framework/partials/header-partials/mobile-navigation'); ?>
    <section id="cb-header" class="bistro-header <?php echo cafebistro_sticky_menu(); ?>  <?php echo(cafebistro_transparent_header() ? ' trans-header' : ''); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Logo -->
                    <?php get_template_part('framework/partials/header-partials/logo'); ?>

                </div>
                <div class="col-lg-9 clearfix">

                    <!-- Main Navigation -->
                    <?php get_template_part('framework/partials/header-partials/main-navigation'); ?>

                </div>
            </div>
        </div>
    </section><!-- #cb-header -->

<?php if (cafebistro_get_header_image() != false && is_front_page()): ?>
    <section id="cb-header-image">
        <?php echo cafebistro_get_header_image(); ?>

        <?php
        $header_above_text = get_theme_mod('cafebistro_header_above_title', '');
        $header_title = get_theme_mod('cafebistro_header_title', '');
        $header_below_text = get_theme_mod('cafebistro_header_below_title', '');
        $header_btn_text = get_theme_mod('cafebistro_header_btn_text', '');
        $header_btn_url = get_theme_mod('cafebistro_header_btn_url', '');

        ?>
        <div class="cb-header-content">
            <?php if ($header_above_text != ''): ?>

                <div class="cb-header-above-text">
                    <?php echo esc_html($header_above_text); ?>
                </div>

            <?php endif; ?>

            <?php if ($header_title != ""): ?>
                <div class="cb-header-title">
                    <?php echo esc_html($header_title); ?>
                </div>
            <?php endif; ?>

            <?php if($header_below_text != ''):  ?>
                <div class="cb-below-header">
                    <?php echo esc_html($header_below_text); ?>
                </div>
            <?php  endif; ?>


            <?php if ($header_btn_text != '' && $header_btn_url != ''): ?>

                <a class="cb-btn" href="<?php echo esc_url($header_btn_url); ?>">
                    <?php echo esc_html($header_btn_text); ?>
                </a>

            <?php endif; ?>


        </div>

    </section>

<?php endif; ?>
