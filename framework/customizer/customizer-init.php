<?php

if (class_exists('WP_Customize_Control') && !class_exists('CafeBistro_Custom_Content')) :
    class CafeBistro_Custom_Content extends WP_Customize_Control
    {
        // Whitelist content parameter
        public $content = '';

        /**
         * Render the control's content.
         *
         * Allows the content to be overriden without having to rewrite the wrapper.
         *
         * @since   1.0.0
         * @return  void
         */
        public function render_content()
        {
            if (isset($this->label)) {
                echo '<span class="customize-control-title">' . $this->label . '</span>';
            }
            if (isset($this->content)) {
                echo $this->content;
            }
            if (isset($this->description)) {
                echo '<span class="description customize-control-description">' . $this->description . '</span>';
            }
        }
    }
endif;
/*
* Homepage builder
*/
$wp_customize->add_panel('cafebistro_home_builder', array(
    'priority' => 9,
    'title' => __('Homepage Builder', 'cafe-bistro'),
    'description' => __('Build the home page like the demo', 'cafe-bistro'),
    'active_callback' => 'is_front_page',
));

$wp_customize->add_section(
    'cafebistro_homepage_settings_section',
    array(
        'title' => __('Header Text & Buttons', 'cafe-bistro'),
        'description' => __('After uploading a header image fill this forms to enhance your header.', 'cafe-bistro'),
        'panel' => 'cafebistro_home_builder',
    )
);
$wp_customize->add_section(
    'cafebistro_homepage_about_section',
    array(
        'title' => __('About Section', 'cafe-bistro'),
        'description' => __('Set your about section.', 'cafe-bistro'),
        'panel' => 'cafebistro_home_builder',
    )
);
$wp_customize->add_section(
    'cafebistro_homepage_main_dish_section',
    array(
        'title' => __('Main Dish Section', 'cafe-bistro'),
        'description' => __('The main dish section.', 'cafe-bistro'),
        'panel' => 'cafebistro_home_builder',
    )
);
$wp_customize->add_section(
    'cafebistro_homepage_reservations_section',
    array(
        'title' => __('Reservation Section', 'cafe-bistro'),
        'description' => __('Add a nice reservation section.', 'cafe-bistro'),
        'panel' => 'cafebistro_home_builder',
    )
);

$wp_customize->add_section(
    'cafebistro_homepage_contact_section',
    array(
        'title' => __('Contact Section', 'cafe-bistro'),
        'description' => __('This is our contact section. You can use it among with the Contact form 7 plugin.', 'cafe-bistro'),
        'panel' => 'cafebistro_home_builder',
    )
);

/*
 * Header settings
 */
$wp_customize->add_setting(
    'cafebistro_header_above_title',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'cafebistro_header_above_title',
    array(
        'type' => 'text',
        'label' => __('The small text above the header title', 'cafe-bistro'),
        'section' => 'cafebistro_homepage_settings_section',
        'settings' => 'cafebistro_header_above_title',

    ));

$wp_customize->add_setting(
    'cafebistro_header_title',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'cafebistro_header_title',
    array(
        'type' => 'text',
        'label' => __('The title of the header.', 'cafe-bistro'),
        'section' => 'cafebistro_homepage_settings_section',
        'settings' => 'cafebistro_header_title',

    ));


$wp_customize->add_setting(
    'cafebistro_header_below_title',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'cafebistro_header_below_title',
    array(
        'type' => 'text',
        'label' => __('The small text below the header title', 'cafe-bistro'),
        'section' => 'cafebistro_homepage_settings_section',
        'settings' => 'cafebistro_header_below_title',

    ));

$wp_customize->add_setting(
    'cafebistro_header_btn_text',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'cafebistro_header_btn_text',
    array(
        'type' => 'text',
        'label' => __('The header button text.', 'cafe-bistro'),
        'section' => 'cafebistro_homepage_settings_section',
        'settings' => 'cafebistro_header_btn_text',

    ));

$wp_customize->add_setting(
    'cafebistro_header_btn_url',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
    'cafebistro_header_btn_url',
    array(
        'type' => 'text',
        'label' => __('The header button url.', 'cafe-bistro'),
        'section' => 'cafebistro_homepage_settings_section',
        'settings' => 'cafebistro_header_btn_url',

    ));


/*
* About Section
*/

$wp_customize->add_setting(
	'cafebistro_theme_about_page',
	array(
		'default' => '',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	'cafebistro_theme_about_page',
	array(
		'type' => 'dropdown-pages',
		'label' => __('Select the about page.', 'cafe-bistro'),
		'section' => 'cafebistro_homepage_about_section',
		'settings' => 'cafebistro_theme_about_page',

	));

/*
* Main dish
*/
$wp_customize->add_setting(
	'cafebistro_theme_main_dish_page',
	array(
		'default' => '',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	'cafebistro_theme_main_dish_page',
	array(
		'type' => 'dropdown-pages',
		'label' => __('Select the main dish page.', 'cafe-bistro'),
		'section' => 'cafebistro_homepage_main_dish_section',
		'settings' => 'cafebistro_theme_main_dish_page',

	));



$wp_customize->add_setting(
    'cafebistro_main_dish_subtitle',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);
$wp_customize->add_control(
    'cafebistro_main_dish_subtitle',
    array(
        'type' => 'text',
        'label' => __('Main dish section subtitle', 'cafe-bistro'),
        'section' => 'cafebistro_homepage_main_dish_section',
        'settings' => 'cafebistro_main_dish_subtitle',
    ));

/*
* Reservation
*/
$wp_customize->add_setting(
	'cafebistro_theme_reservations_page',
	array(
		'default' => '',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	'cafebistro_theme_main_dish_page',
	array(
		'type' => 'dropdown-pages',
		'label' => __('Select the reservation page.', 'cafe-bistro'),
		'section' => 'cafebistro_homepage_reservations_section',
		'settings' => 'cafebistro_theme_reservations_page',

	));

/*
* Contact Settings
*/
$wp_customize->add_setting(
	'cafebistro_theme_contact_page',
	array(
		'default' => '',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	'cafebistro_theme_contact_page',
	array(
		'type' => 'dropdown-pages',
		'label' => __('Select the contact page.', 'cafe-bistro'),
		'section' => 'cafebistro_homepage_contact_section',
		'settings' => 'cafebistro_theme_contact_page',

	));
/** GENERAL SECTION Options**/

$wp_customize->add_section(
    'cb_general_settings_section',
    array(
        'title' => __('General Settings', 'cafe-bistro'),
        'description' => __('General Settings for this theme.', 'cafe-bistro'),
        'priority' => 10,
    )
);
$wp_customize->add_setting(
    'cafebistro_transparent_header',
    array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_setting(
    'cafebistro_sticky_menu',
    array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field'
    )
);


$wp_customize->add_control(
    'cafebistro_transparent_header',
    array(
        'type' => 'select',
        'label' => __('Enable transparent header. Front page', 'cafe-bistro'),
        'section' => 'cb_general_settings_section',
        'settings' => 'cafebistro_transparent_header',
        'choices' => array(
            '0' => __('No', 'cafe-bistro'),
            '1' => __('Yes', 'cafe-bistro'),
        )
    ));

/** Register Controls **/
$wp_customize->add_control(
    'cafebistro_sticky_menu',
    array(
        'type' => 'select',
        'label' => __('Make navigation menu sticky', 'cafe-bistro'),
        'section' => 'cb_general_settings_section',
        'settings' => 'cafebistro_sticky_menu',
        'choices' => array(
            '0' => __('No', 'cafe-bistro'),
            '1' => __('Yes', 'cafe-bistro'),
        )
    ));