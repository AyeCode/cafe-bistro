<?php
// Initialize the Framework.
require_once(CAFEBISTRO_FRAMEWORK_REQUIRED_PATH . 'libraries/TGM-Class/class-tgm-plugin-activation.php');

function cafebistro_customizer_init($wp_customize){
  require_once(CAFEBISTRO_FRAMEWORK_REQUIRED_PATH . 'customizer/customizer-init.php');
}
add_action('customize_register','cafebistro_customizer_init');
add_action('tgmpa_register', 'cafebistro_required_plugins');
function cafebistro_required_plugins()
{

    $plugins = array(

        array(
            'name' => 'Simple Page Ordering',
            'slug' => 'simple-page-ordering',
            'required' => false
        ),
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => false
        ),

    );
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'cafe-bistro',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php',            // Parent menu slug.
        'capability' => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true,                    // Show admin notices or not.
        'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message' => '',                      // Message to output right before the plugins table.

        'strings' => array(
            'page_title' => __('Install Required Plugins', 'cafe-bistro'),
            'menu_title' => __('Install Plugins', 'cafe-bistro'),
            'installing' => __('Installing Plugin: %s', 'cafe-bistro'), // %s = plugin name.
            'oops' => __('Something went wrong with the plugin API.', 'cafe-bistro'),
            'notice_can_install_required' => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'cafe-bistro'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'cafe-bistro'
            ), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop(
                'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
                'cafe-bistro'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'cafe-bistro'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update_maybe' => _n_noop(
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'cafe-bistro'
            ), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop(
                'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
                'cafe-bistro'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'cafe-bistro'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'cafe-bistro'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop(
                'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
                'cafe-bistro'
            ), // %1$s = plugin name(s).
            'install_link' => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'cafe-bistro'
            ),
            'update_link' => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'cafe-bistro'
            ),
            'activate_link' => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'cafe-bistro'
            ),
            'return' => __('Return to Required Plugins Installer', 'cafe-bistro'),
            'plugin_activated' => __('Plugin activated successfully.', 'cafe-bistro'),
            'activated_successfully' => __('The following plugin was activated successfully:', 'cafe-bistro'),
            'plugin_already_active' => __('No action taken. Plugin %1$s was already active.', 'cafe-bistro'),  // %1$s = plugin name(s).
            'plugin_needs_higher_version' => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'cafe-bistro'),  // %1$s = plugin name(s).
            'complete' => __('All plugins installed and activated successfully. %1$s', 'cafe-bistro'), // %s = dashboard link.
            'contact_admin' => __('Please contact the administrator of this site for help.', 'cafe-bistro'),
            'nag_type' => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        ),

    );
    tgmpa($plugins, $config);
}

/*
* Enable transparent header class
*/

if(!function_exists('cafebistro_transparent_header')):

  function cafebistro_transparent_header(){
    $trans = get_theme_mod('cafebistro_transparent_header','0');
    
    if($trans == '1' && is_front_page()){
      return true;
    }
    else{
      return false;
    }
  }

endif;

/*
 * 3. Function that return the header image if any
 */
if (!function_exists('cafebistro_get_header_image')):
    function cafebistro_get_header_image()
    {
        $html = '';
        if (get_header_image() != ''):
            $html .= '<img class="img-responsive" src="' . get_header_image() . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt=""/>';
        else:
            return false;
        endif;
        return $html;
    }

    ;
endif;

/*
 * 3.1 - Function that returns the prefix for use into other functions
 */
if (!function_exists('cafebistro_get_prefix')):
    function cafebistro_get_prefix()
    {
        $prefix = '';

        if(is_home()):
            $prefix = 'page';
        elseif (is_page()):
            $prefix = 'page';
        elseif (is_single()):
            $prefix = 'page';
        endif;

        return $prefix;
    }
endif;

/*
 * 3.2 - Function that returns if the menu is sticky
 */
if (!function_exists('cafebistro_sticky_menu')):
    function cafebistro_sticky_menu()
    {
        $is_sticky = get_theme_mod('cafebistro_sticky_menu', '0');

        if ($is_sticky == '1'):
            return ' sticky-header';
        else:
            return false;
        endif;
    }
endif;

/*
 * 5. Function that returns the breadcrumb
 */
if (!function_exists('cafebistro_breadcrumb')):
    function cafebistro_breadcrumb()
    {

        $bc_html = '';
        $base_link = esc_url(home_url('/'));
        $current_link = esc_url(get_permalink(get_queried_object_id()));
        $current_link_title = esc_html(get_the_title(get_queried_object_id()));
        $current_text = '';

        if (is_tax()):
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $current_text = $term->name;
        elseif (is_category()):
            $current_text = single_cat_title("", false);

        elseif (is_tag()):
            $current_text = single_tag_title('', false);

        elseif (is_search()) :
            $current_text = __('Search Results', 'cafe-bistro');
        elseif (is_archive()):
            if (is_year()):
                $current_text = __('Archive for: ', 'cafe-bistro') . get_the_time('Y');
            elseif (is_month()):
                $current_text = __('Archive for ', 'cafe-bistro') . get_the_time('F, Y');
            elseif (is_day()):
                $current_text = __('Archive for ', 'cafe-bistro') . get_the_time('F jS, Y');
            endif;

        endif;

        $bc_html .= '<ul id="single-breadcrumb">';

        $bc_html .= '<li><a href ="' . $base_link . '" title="' . __('Go to the homepage', 'cafe-bistro') . '">' . __('Home', 'cafe-bistro') . '</a> <i class="fa fa-angle-double-right"></i></li>  ';

        if (is_category() || is_tag() || is_archive() || is_search()):
            $bc_html .= '<li id="current-breadcrumb-item">' . $current_text . '</li>';
        else:
            $bc_html .= '<li id="current-breadcrumb-item"><a href="' . $current_link . '">' . $current_link_title . '</a></li>';
        endif;
        $bc_html .= '</ul>';
        return $bc_html;

    }
endif;

/*
 * 16. Function that returns the pagination
 */
add_filter('cafebistro_next_posts_link_attributes', 'cafebistro_next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'cafebistro_prev_posts_link_attributes');

function cafebistro_next_posts_link_attributes()
{
    return 'class="next"';
}

function cafebistro_prev_posts_link_attributes()
{
    return 'class="prev"';
}
/*
 * Function that returns the footer sidebars
 */
if (!function_exists('cafebistro_active_footer')):
    function cafebistro_active_footer()
    {

        $active_footer_sidebars = 0;
        $active_sidebars = array();

        for ($i = 1; $i < 5; $i++) {
            if (is_active_sidebar('cb-footer-' . $i)):
                $active_footer_sidebars++;
            endif;
        }

        if ($active_footer_sidebars == 0):
            return false;

        elseif ($active_footer_sidebars == 1):

            $active_sidebars['class'] = 'col-md-12';
            $active_sidebars['sidebars_count'] = 1;
            return $active_sidebars;

        elseif ($active_footer_sidebars == 2):

            $active_sidebars['class'] = 'col-md-6';
            $active_sidebars['sidebars_count'] = 2;
            return $active_sidebars;

        elseif ($active_footer_sidebars == 3):

            $active_sidebars['class'] = 'col-md-4';
            $active_sidebars['sidebars_count'] = 3;
            return $active_sidebars;

        elseif ($active_footer_sidebars == 4):

            $active_sidebars['class'] = 'col-md-3';
            $active_sidebars['sidebars_count'] = 4;
            return $active_sidebars;

        endif;
    }
endif;