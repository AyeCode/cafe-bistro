<?php
/*
 * 1. Constants to help us throughout the theme.
 */
DEFINE('CAFEBISTRO_CSS_PATH', get_template_directory_uri() . '/assets/css/');
DEFINE('CAFEBISTRO_JS_PATH', get_template_directory_uri() . '/assets/js/');
DEFINE('CAFEBISTRO_IMAGES_PATH', get_template_directory_uri() . '/assets/images/');
DEFINE('CAFEBISTRO_FONTS_PATH', get_template_directory_uri() . '/assets/fonts/');
DEFINE('CAFEBISTRO_STYLESHEET_PATH', get_stylesheet_uri());
DEFINE('CAFEBISTRO_FRAMEWORK_PATH', get_template_directory_uri() . '/framework/');
DEFINE('CAFEBISTRO_FRAMEWORK_REQUIRED_PATH', get_template_directory() . '/framework/');

/*
 * 2. After setup theme
 */
add_action('after_setup_theme', 'cafebistro_setup');
if (!function_exists('cafebistro_setup')):
    function cafebistro_setup()
    {

        if (!isset($content_width))
            $content_width = 750;

        add_theme_support('automatic-feed-links');
        load_theme_textdomain('cafe-bistro', get_template_directory() . '/languages');
        add_theme_support('html5', array('gallery', 'caption'));

        global $wp_version;
        if (version_compare($wp_version, '4.1', '>=')):
            add_theme_support('title-tag');
        endif;

        register_nav_menus(array(
            'main' => __('Main Navigation', 'cafe-bistro'),
            'footer' => __('Bottom Navigation', 'cafe-bistro')
        ));

        $cafebistro_bg_defaults = array(
            'default-color' => 'ffffff',
            'default-image' => '',
            'wp-head-callback' => 'cafebistro_bg_callback',
        );
        add_theme_support('custom-background', $cafebistro_bg_defaults);

        $cafebistro_header_defaults = array(
            'default-image' => '',
            'random-default' => false,
            'width' => '1920',
            'height' => '820',
            'flex-height' => false,
            'flex-width' => false,
            'default-text-color' => '',
            'header-text' => false,
            'uploads' => true,
            'wp-head-callback' => '',
            'admin-head-callback' => '',
            'admin-preview-callback' => '',
        );
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 150,
            'flex-width' => true,
        ) );

        add_theme_support('custom-header', $cafebistro_header_defaults);

        add_theme_support('post-thumbnails');
        add_image_size('cafebistro-boxed-9', 847, 385, true); // slider image size.
        add_image_size('cafebistro-boxed-12', 1170, 550, true); // Single post type image (boxed 3/4 layout)
        add_image_size('cafebistro-fullwidth', 1920, 700, true); // Single post type image (fulwidth)

   }
endif;

/*
 * 3. Fallback Functions
 */
if (!function_exists('cafebistro_bg_callback')):

    function cafebistro_bg_callback()
    {
        $background = set_url_scheme(get_background_image());
        $color = get_theme_mod('background_color', get_theme_support('custom-background', 'default-color'));

        if (!$background && !$color)
            return;

        $style = $color ? "background-color: #$color;" : '';

        if ($background) {
            $image = " background-image: url('$background');";

            $repeat = get_theme_mod('background_repeat', get_theme_support('custom-background', 'default-repeat'));
            if (!in_array($repeat, array('no-repeat', 'repeat-x', 'repeat-y', 'repeat')))
                $repeat = 'repeat';
            $repeat = " background-repeat: $repeat;";

            $position = get_theme_mod('background_position_x', get_theme_support('custom-background', 'default-position-x'));
            if (!in_array($position, array('center', 'right', 'left')))
                $position = 'left';
            $position = " background-position: top $position;";

            $attachment = get_theme_mod('background_attachment', get_theme_support('custom-background', 'default-attachment'));
            if (!in_array($attachment, array('fixed', 'scroll')))
                $attachment = 'scroll';
            $attachment = " background-attachment: $attachment;";

            $style .= $image . $repeat . $position . $attachment;
        }
        ?>
        <style type="text/css" id="custom-background-css">
            body.custom-background {
            <?php echo esc_html( $style ); ?>
            }
        </style>
        <?php
    }
endif;

/*
 * 4. Enqueue styles + scripts.
 */
add_action('wp_enqueue_scripts', 'cafebistro_styles');
if (!function_exists('cafebistro_styles')):
    function cafebistro_styles()
    {

            wp_enqueue_style('cafebistro-crimson-font', CAFEBISTRO_FONTS_PATH . 'Crimson-Font/stylesheet.css', '', '', 'all');
            wp_enqueue_style('cafebistro-montserrat-font', CAFEBISTRO_FONTS_PATH . 'Montserrat/stylesheet.css', '', '', 'all');
            wp_enqueue_style('cafebistro-playfair-font', CAFEBISTRO_FONTS_PATH . 'Playfair-Display/stylesheet.css', '', '', 'all');
            /*
             * Enqueue the theme's stylesheets
             */

            wp_enqueue_style('bootstrap', CAFEBISTRO_CSS_PATH . 'bootstrap.min.css', '', '', 'all');
            wp_enqueue_style('bootstrap-theme', CAFEBISTRO_CSS_PATH . 'bootstrap-theme.min.css', '', '', 'all');
            wp_enqueue_style('cafebistro-responsive-grid-theme', CAFEBISTRO_CSS_PATH . 'responsive-grid.css', '', '', 'all');
            wp_enqueue_style('cafebistro-navigation-menu', CAFEBISTRO_CSS_PATH . 'navigation-menu.css', '', '', 'all');
            wp_enqueue_style('cafebistro-mobile-menu-theme', CAFEBISTRO_CSS_PATH . 'jquery.sidr.dark.css', '', '', 'all');
            wp_enqueue_style('cafebistro-wordpress-default-css', CAFEBISTRO_CSS_PATH . 'wordpress-default-min.css', '', '', 'all');

            wp_enqueue_style('cafebistro-main-stylesheets', CAFEBISTRO_STYLESHEET_PATH);
            wp_enqueue_style('cafebistro-bistro-css', CAFEBISTRO_CSS_PATH . 'cb-bistro.css', '', '', 'all');
            wp_enqueue_style('cafebistro-responsive-css', CAFEBISTRO_CSS_PATH . 'responsive.css', '', '', 'all');
    }
endif;

add_action('wp_enqueue_scripts', 'cafebistro_scripts');
if (!function_exists('cafebistro_scripts')):
    function cafebistro_scripts()
    {
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');

        wp_enqueue_script('bootstrap', CAFEBISTRO_JS_PATH . 'bootstrap.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-sidr', CAFEBISTRO_JS_PATH . 'jquery.sidr.min.js', array('jquery'), '', true);
        wp_enqueue_script('sticky', CAFEBISTRO_JS_PATH . 'sticky.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-matchHeight', CAFEBISTRO_JS_PATH . 'jquery.matchHeight-min.js', array('jquery'), '', true);

        wp_enqueue_script('jquery-waypoints', CAFEBISTRO_JS_PATH . 'jquery.waypoints.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-stellar', CAFEBISTRO_JS_PATH . 'jquery.stellar.min.js', array('jquery'), '', true);

        wp_enqueue_script('cafebistro-bistro-main-js', CAFEBISTRO_JS_PATH . 'main-js.js', array('jquery'), '', true);
    }
endif;

add_action('wp_head', 'cafebistro_html5shiv');
function cafebistro_html5shiv()
{
    echo '<!--[if lt IE 9]>';
    echo '<script src="' . CAFEBISTRO_JS_PATH . 'html5shiv.min.js"></script>';
    echo '<![endif]-->';
}

function cafebistro_customizer_preview()
{
    wp_enqueue_script('cafebistro-customizer-js', get_template_directory_uri().'/assets/js/customizer.js', array('jquery', 'customize-preview'), '', true);
}

add_action('customize_preview_init', 'cafebistro_customizer_preview');
/*
 * 5. Comments
 */
if (!function_exists('cafebistro_comment')):
    function cafebistro_comment($comment,
                             $args,
                             $depth)
    {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?><?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
        <div class="row">

            <div class="col-md-2">


                <div class="comment-author vcard">
                    <?php
                    if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>

                </div>

            </div>

            <div class="col-md-10">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'cafe-bistro'); ?></em>
                    <br/>
                <?php endif; ?>

                <?php printf(__('<cite class="fn">%s</cite>','cafe-bistro'), get_comment_author_link()); ?>

                <div class="comment-meta commentmetadata">
                    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
                        <?php
                        printf(__('%1$s at %2$s', 'cafe-bistro'), get_comment_date(), get_comment_time()); ?></a><?php edit_comment_link(__('(Edit)', 'cafe-bistro'), '  ', '');
                    ?>
                </div>
                <hr class="comment-name-hr">

                <div class="cafebistro_comment_body">
                    <?php comment_text(); ?>
                </div>
                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>
            </div>
        </div>
        <?php if ('div' != $args['style']) : ?>
        </div>
    <?php endif; ?>
        <?php
    }
endif;
/*
 * 6. Widgets Initialization
 */
/**== Add some sidebars ==**/
add_action('widgets_init', 'cafebistro_sidebars');
function cafebistro_sidebars()
{

    /**== Right sidebar ==**/
    register_sidebar(array(
        'name' => __('Sidebar', 'cafe-bistro'),
        'id' => 'sidebar',
        'description' => __('This is the main sidebar.It is in every page - post. However you can override this setting from within each post.',
            'cafe-bistro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /**== Footer Sidebar 1 ==**/
    register_sidebar(array(
        'name' => __('Footer Sidebar 1', 'cafe-bistro'),
        'id' => 'cb-footer-1',
        'description' => __('This is the sidebar in the footer, on the left', 'cafe-bistro'),
        'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    /**== Footer Sidebar 2 ==**/
    register_sidebar(array(
        'name' => __('Footer Sidebar 2', 'cafe-bistro'),
        'id' => 'cb-footer-2',
        'description' => __('This is the sidebar in the footer, the second on the left', 'cafe-bistro'),
        'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    /**== Footer Sidebar 3 ==**/
    register_sidebar(array(
        'name' => __('Footer Sidebar 3', 'cafe-bistro'),
        'id' => 'cb-footer-3',
        'description' => __('This is the sidebar in the footer, the second on the right', 'cafe-bistro'),
        'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    /**== Footer Sidebar 4 ==**/
    register_sidebar(array(
        'name' => __('Footer Sidebar 4', 'cafe-bistro'),
        'id' => 'cb-footer-4',
        'description' => __('This is the sidebar in the footer, on the right', 'cafe-bistro'),
        'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}
/*
 * . Required Files
 */
function cafebistro_allowed_tags() {
    $my_allowed = wp_kses_allowed_html( 'post' );
    $my_allowed['input'] = array(
        'class' => array(),
        'id'    => array(),
        'name'  => array(),
        'value' => array(),
        'type'  => array(),
    );

    return $my_allowed;
}
require_once(CAFEBISTRO_FRAMEWORK_REQUIRED_PATH . 'base-init.php');
