<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'newsreach' ),
        'description' => __( 'Contains all front page settings', 'newsreach'),
        'priority' => 50
    )
);
/**/
$wp_customize->add_section(
    'home_page_slider_option',
    array(
        'title'      => __( 'Slider Section Options', 'newsreach' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newsreach_options[enable_slider_section]',
    array(
        'default'           => $default_options['enable_slider_section'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_slider_section]',
    array(
        'label'   => __( 'Enable Slider Section', 'newsreach' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[slider_section_presentation_layout]',
    array(
        'default'           => $default_options['slider_section_presentation_layout'],
        'sanitize_callback' => 'newsreach_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Newsreach_Radio_Image_Control(
        $wp_customize,
        'newsreach_options[slider_section_presentation_layout]',
        array(
            'label' => __( 'Slider Slider Layout', 'newsreach' ),
            'section' => 'home_page_slider_option',
            'choices' => newsreach_get_slider_layouts()
        )
    )
);


$wp_customize->add_setting(
    'newsreach_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'newsreach' ),
        'section'     => 'home_page_slider_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'newsreach' ),
            '4' => __( '4', 'newsreach' ),
            '5' => __( '5', 'newsreach' ),
            '6' => __( '6', 'newsreach' ),
        ),
    )
);


$wp_customize->add_setting(
    'newsreach_options[slider_post_content_alignment]',
    array(
        'default'           => $default_options['slider_post_content_alignment'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[slider_post_content_alignment]',
    array(
        'label'       => __( 'Slider Content Alignment', 'newsreach' ),
        'section'     => 'home_page_slider_option',
        'type'        => 'select',
        'choices'     => array(
            'text-right' => __( 'Align Right', 'newsreach' ),
            'text-center' => __( 'Align Center', 'newsreach' ),
            'text-left' => __( 'Align Left', 'newsreach' ),
        ),
    )
);

$wp_customize->add_setting(
    'newsreach_options[slider_section_cat]',
    array(
        'default'           => $default_options['slider_section_cat'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[slider_section_cat]',
    array(
        'label'   => __( 'Choose Slider Category', 'newsreach' ),
        'section' => 'home_page_slider_option',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
    )
);

$wp_customize->add_setting(
    'newsreach_options[enable_slider_post_description]',
    array(
        'default'           => $default_options['enable_slider_post_description'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_slider_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'newsreach' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[enable_slider_cat_meta]',
    array(
        'default'           => $default_options['enable_slider_cat_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_slider_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'newsreach' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[enable_slider_author_meta]',
    array(
        'default'           => $default_options['enable_slider_author_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_slider_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'newsreach' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[enable_slider_date_meta]',
    array(
        'default'           => $default_options['enable_slider_date_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_slider_date_meta]',
    array(
        'label'   => __( 'Enable Date Meta', 'newsreach' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[enable_slider_overlay]',
    array(
        'default'           => $default_options['enable_slider_overlay'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_slider_overlay]',
    array(
        'label'   => __( 'Enable Slider Overlay', 'newsreach' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);