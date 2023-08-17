<?php
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Banner Section Options', 'newsreach' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newsreach_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'newsreach' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[banner_section_style]',
    array(
        'default'           => $default_options['banner_section_style'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_style]',
    array(
        'label'       => __( 'Banner Section Style', 'newsreach' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'style-1' => __( 'Style 1', 'newsreach' ),
            'style-2' => __( 'Style 2', 'newsreach' ),
            'style-3' => __( 'Style 3', 'newsreach' ),
            'style-4' => __( 'Style 4', 'newsreach' ),
        ),
    )
);


$wp_customize->add_setting(
    'newsreach_options[banner_section_cat_style_4]',
    array(
        'default'           => '',
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_cat_style_4]',
    array(
        'label'   => __( 'Select Category for Banner Slider', 'newsreach' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
        'active_callback' => 'newsreach_is_banner_style_4',
    )
);


$wp_customize->add_setting(
    'newsreach_options[banner_section_cat_style_1]',
    array(
        'default'           => $default_options['banner_section_cat_style_1'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_cat_style_1]',
    array(
        'label'   => __( 'Select Category for Banner Slider', 'newsreach' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
        'active_callback' => 'newsreach_is_banner_style',
    )
);



$wp_customize->add_setting(
    'newsreach_options[banner_section_cat_style_1_grid]',
    array(
        'default'           =>'',
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_cat_style_1_grid]',
    array(
        'label'   => __( 'Select Category for Banner Grid', 'newsreach' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
        'active_callback' => 'newsreach_is_banner_style',
    )
);


$wp_customize->add_setting(
    'newsreach_options[banner_section_cat_style_3]',
    array(
        'default'           => $default_options['banner_section_cat_style_3'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_cat_style_3]',
    array(
        'label'   => __( 'Select Category for Banner', 'newsreach' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
        'active_callback' => 'newsreach_is_banner_style_3',

    )
);


$wp_customize->add_setting(
    'newsreach_options[banner_section_title_1]',
    array(
        'default'           => $default_options['banner_section_title_1'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_title_1]',
    array(
        'label'    => __( 'Grid Column Title ', 'newsreach' ),
        'section'  => 'home_page_banner_option',
        'type'     => 'text',
        'active_callback' => 'newsreach_is_banner_style_1',
    )
);


$wp_customize->add_setting(
    'newsreach_options[banner_section_cat_1]',
    array(
        'default'           => $default_options['banner_section_cat_1'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_cat_1]',
    array(
        'label'   => __( 'Grid Column Category', 'newsreach' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
        'active_callback' => 'newsreach_is_banner_style_1',

    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_banner_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_banner_1',
        array(
            'settings' => 'newsreach_section_seperator_banner_1',
            'section' => 'home_page_banner_option',
            'active_callback' => 'newsreach_is_banner_style_1',

        )
    )
);


$wp_customize->add_setting(
    'newsreach_options[banner_section_title_2]',
    array(
        'default'           => $default_options['banner_section_title_2'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_title_2]',
    array(
        'label'    => __( 'Slider Column Title', 'newsreach' ),
        'section'  => 'home_page_banner_option',
        'type'     => 'text',
        'active_callback' => 'newsreach_is_banner_style_1',
    )
);


$wp_customize->add_setting(
    'newsreach_options[banner_section_cat_2]',
    array(
        'default'           => $default_options['banner_section_cat_2'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_cat_2]',
    array(
        'label'   => __( 'Slider Column Category', 'newsreach' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
        'active_callback' => 'newsreach_is_banner_style_1',
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_banner_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_banner_2',
        array(
            'settings' => 'newsreach_section_seperator_banner_2',
            'section' => 'home_page_banner_option',
            'active_callback' => 'newsreach_is_banner_style_1',
        )
    )
);

$wp_customize->add_setting(
    'newsreach_options[banner_section_title_3]',
    array(
        'default'           => $default_options['banner_section_title_3'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_title_3]',
    array(
        'label'    => __( 'List column Title', 'newsreach' ),
        'section'  => 'home_page_banner_option',
        'type'     => 'text',
        'active_callback' => 'newsreach_is_banner_style_1',
    )
);


$wp_customize->add_setting(
    'newsreach_options[banner_section_cat_3]',
    array(
        'default'           => $default_options['banner_section_cat_3'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[banner_section_cat_3]',
    array(
        'label'   => __( 'List column Category', 'newsreach' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
        'active_callback' => 'newsreach_is_banner_style_1',
    )
);



$wp_customize->add_setting(
    'newsreach_section_seperator_banner_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_banner_3',
        array(
            'settings' => 'newsreach_section_seperator_banner_3',
            'section' => 'home_page_banner_option',
        )
    )
);


$wp_customize->add_setting(
    'newsreach_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'newsreach' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'newsreach' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date Meta', 'newsreach' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);



$wp_customize->add_setting(
    'newsreach_section_seperator_banner_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_banner_4',
        array(
            'settings' => 'newsreach_section_seperator_banner_4',
            'section' => 'home_page_banner_option',
        )
    )
);


$wp_customize->add_setting(
    'newsreach_options[upload_banner_bg_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'newsreach_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'newsreach_options[upload_banner_bg_image]',
        array(
            'label'           => __( 'Background Image', 'newsreach' ),
            'section'         => 'home_page_banner_option',
        )
    )
);

$wp_customize->add_setting(
    'newsreach_options[enable_background_fix]',
    array(
        'default'           => $default_options['enable_background_fix'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_background_fix]',
    array(
        'label'   => __( 'Enable Background Position Fixed', 'newsreach' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[banner_bg_color]',
    array(
        'default' => $default_options['banner_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'newsreach_options[banner_bg_color]',
        array(
            'label' => __('Banner Background Color', 'newsreach'),
            'section' => 'home_page_banner_option',
            'type' => 'color',
        )
    )
);

$wp_customize->add_setting(
    'newsreach_options[banner_text_color]',
    array(
        'default' => $default_options['banner_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'newsreach_options[banner_text_color]',
        array(
            'label' => __('Banner Text Color', 'newsreach'),
            'section' => 'home_page_banner_option',
            'type' => 'color',
        )
    )
);