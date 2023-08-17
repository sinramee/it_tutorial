<?php
/**/
$wp_customize->add_section(
    'read_more_post_section',
    array(
        'title'      => __( 'Read More Post', 'newsreach' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newsreach_options[enable_read_more_post_section]',
    array(
        'default'           => $default_options['enable_read_more_post_section'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_read_more_post_section]',
    array(
        'label'   => __( 'Enable Read More Post Section', 'newsreach' ),
        'section' => 'read_more_post_section',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[read_more_post_title]',
    array(
        'default'           => $default_options['read_more_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[read_more_post_title]',
    array(
        'label'    => __( 'Read More Posts Title', 'newsreach' ),
        'section'  => 'read_more_post_section',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'newsreach_options[select_cat_for_read_more_post]',
    array(
        'default'           => $default_options['select_cat_for_read_more_post'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[select_cat_for_read_more_post]',
    array(
        'label'   => __( 'Choose Read More Post Category', 'newsreach' ),
        'section' => 'read_more_post_section',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
    )
);

$wp_customize->add_setting(
    'newsreach_options[read_more_style]',
    array(
        'default'           => $default_options['read_more_style'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[read_more_style]',
    array(
        'label'       => __( 'Select Style', 'newsreach' ),
        'section'     => 'read_more_post_section',
        'type'        => 'select',
        'choices'     => array(
            'style-1' => __( 'Style 1', 'newsreach' ),
            'style-2' => __( 'Style 2', 'newsreach' ),
        ),
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
        'section' => 'read_more_post_section',
        'type'    => 'checkbox',
    )
);

