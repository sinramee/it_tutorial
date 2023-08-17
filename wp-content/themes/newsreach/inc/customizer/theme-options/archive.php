<?php
$wp_customize->add_section(
    'archive_options' ,
    array(
        'title' => __( 'Archive Options', 'newsreach' ),
        'panel' => 'newsreach_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'newsreach_options[global_sidebar_layout]',
    array(
        'default'           => $default_options['global_sidebar_layout'],
        'sanitize_callback' => 'newsreach_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Newsreach_Radio_Image_Control(
        $wp_customize,
        'newsreach_options[global_sidebar_layout]',
        array(
            'label' => __( 'Global Sidebar Layout', 'newsreach' ),
            'section' => 'archive_options',
            'choices' => newsreach_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'newsreach_options[hide_global_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_global_sidebar_mobile'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[hide_global_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Global Sidebar on Mobile', 'newsreach' ),
        'section'     => 'archive_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_archive_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_archive_1',
        array(
            'settings' => 'newsreach_section_seperator_archive_1',
            'section' => 'archive_options',
        )
    )
);

/* Archive Style */
$wp_customize->add_setting(
    'newsreach_options[archive_style]',
    array(
        'default'           => $default_options['archive_style'],
        'sanitize_callback' => 'newsreach_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Newsreach_Radio_Image_Control(
        $wp_customize,
        'newsreach_options[archive_style]',
        array(
            'label'	=> __( 'Archive Style', 'newsreach' ),
            'section' => 'archive_options',
            'choices' => newsreach_get_archive_layouts()
        )
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_archive_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_archive_2',
        array(
            'settings' => 'newsreach_section_seperator_archive_2',
            'section' => 'archive_options',
        )
    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'newsreach_options[archive_post_meta_1]',
    array(
        'default'           => $default_options['archive_post_meta_1'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Newsreach_Checkbox_Multiple(
        $wp_customize,
        'newsreach_options[archive_post_meta_1]',
        array(
            'label'	=> __( 'Archive Post Meta', 'newsreach' ),
            'description'	=> __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'newsreach' ),
            'section' => 'archive_options',
            'choices' => array(
                'author' => __( 'Author', 'newsreach' ),
                'date' => __( 'Date', 'newsreach' ),
                'comment' => __( 'Comment', 'newsreach' ),
                'category' => __( 'Category', 'newsreach' ),
                'tags' => __( 'Tags', 'newsreach' ),
            ),
            'active_callback' => 'newsreach_archive_poost_meta_1',
        )

    )
);
/* Archive Meta */
$wp_customize->add_setting(
    'newsreach_options[archive_post_meta_2]',
    array(
        'default'           => $default_options['archive_post_meta_2'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Newsreach_Checkbox_Multiple(
        $wp_customize,
        'newsreach_options[archive_post_meta_2]',
        array(
            'label' => __( 'Archive Post Meta', 'newsreach' ),
            'description'   => __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'newsreach' ),
            'section' => 'archive_options',
            'choices' => array(
                'author' => __( 'Author', 'newsreach' ),
                'date' => __( 'Date', 'newsreach' ),
                'category' => __( 'Category', 'newsreach' ),
            ),
            'active_callback' => 'newsreach_archive_poost_meta_2',

        )
    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'newsreach_options[archive_post_meta_3]',
    array(
        'default'           => $default_options['archive_post_meta_3'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Newsreach_Checkbox_Multiple(
        $wp_customize,
        'newsreach_options[archive_post_meta_3]',
        array(
            'label' => __( 'Archive Post Meta', 'newsreach' ),
            'description'   => __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'newsreach' ),
            'section' => 'archive_options',
            'choices' => array(
                'author' => __( 'Author', 'newsreach' ),
                'date' => __( 'Date', 'newsreach' ),
                'category' => __( 'Category', 'newsreach' ),
            ),
            'active_callback' => 'newsreach_archive_poost_meta_3',

        )
    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'newsreach_options[archive_post_meta_4]',
    array(
        'default'           => $default_options['archive_post_meta_4'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Newsreach_Checkbox_Multiple(
        $wp_customize,
        'newsreach_options[archive_post_meta_4]',
        array(
            'label' => __( 'Archive Post Meta', 'newsreach' ),
            'description'   => __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'newsreach' ),
            'section' => 'archive_options',
            'choices' => array(
                'category' => __( 'Category', 'newsreach' ),
            ),
            'active_callback' => 'newsreach_archive_poost_meta_4',

        )
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_archive_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_archive_3',
        array(
            'settings' => 'newsreach_section_seperator_archive_3',
            'section' => 'archive_options',
        )
    )
);

$wp_customize->add_setting('newsreach_options[excerpt_length]',
    array(
        'default'           => $default_options['excerpt_length'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsreach_sanitize_number_range',
    )
);
$wp_customize->add_control('newsreach_options[excerpt_length]',
    array(
        'label'       => esc_html__('Excerpt Length', 'newsreach'),
        'description'       => esc_html__( 'Max number of words. Set it to 0 to disable. (step-1)', 'newsreach' ),
        'section'     => 'archive_options',
        'type'        => 'range',
        'input_attrs' => array(
                       'min'   => 0,
                       'max'   => 100,
                       'step'   => 1,
                    ),
    )
);

$wp_customize->add_setting(
    'newsreach_options[enable_excerpt_read_more]',
    array(
        'default'           => $default_options['enable_excerpt_read_more'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_excerpt_read_more]',
    array(
        'label'       => __( 'Enable Read More on Excerpt', 'newsreach' ),
        'section'     => 'archive_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[excerpt_read_more]',
    array(
        'default'           => $default_options['excerpt_read_more'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[excerpt_read_more]',
    array(
        'label'    => __( 'Excerpt Readmore Button Text', 'newsreach' ),
        'section'  => 'archive_options',
        'type'     => 'text',
    )
);