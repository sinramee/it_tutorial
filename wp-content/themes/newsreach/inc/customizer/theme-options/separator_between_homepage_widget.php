<?php
/**/
$wp_customize->add_section(
    'widget_separator_section',
    array(
        'title'      => __( 'Widget Separator with Post', 'newsreach' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newsreach_options[enable_widget_separator_section]',
    array(
        'default'           => $default_options['enable_widget_separator_section'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_widget_separator_section]',
    array(
        'label'   => __( 'Enable widget Separator Post Section', 'newsreach' ),
        'section' => 'widget_separator_section',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[select_cat_for_widget_separator_section]',
    array(
        'default'           => $default_options['select_cat_for_widget_separator_section'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[select_cat_for_widget_separator_section]',
    array(
        'label'   => __( 'Choose Widget Separator Post Category', 'newsreach' ),
        'section' => 'widget_separator_section',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
    )
);


$wp_customize->add_setting(
    'newsreach_options[upload_widget_separator_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'newsreach_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'newsreach_options[upload_widget_separator_image]',
        array(
            'label'           => __( 'Upload Section Background Image', 'newsreach' ),
            'section'         => 'widget_separator_section',
        )
    )
);

$wp_customize->add_setting(
    'newsreach_options[enable_date_meta]',
    array(
        'default'           => $default_options['enable_date_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_date_meta]',
    array(
        'label'   => __( 'Enable Date Meta', 'newsreach' ),
        'section' => 'widget_separator_section',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[widget_separator_bg_color]',
    array(
        'default' => $default_options['widget_separator_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'newsreach_options[widget_separator_bg_color]',
        array(
            'label' => __('Background Color', 'newsreach'),
            'section' => 'widget_separator_section',
            'type' => 'color',
        )
    )
);
