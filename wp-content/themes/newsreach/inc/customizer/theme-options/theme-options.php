<?php
$wp_customize->remove_setting('display_header_text');
$wp_customize->remove_control('display_header_text');
$wp_customize->add_setting(
    'newsreach_options[hide_title]',
    array(
        'default' => $default_options['hide_title'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[hide_title]',
    array(
        'type' => 'checkbox',
        'label' => __( 'Hide Site Title', 'newsreach' ),
        'section' => 'title_tagline',
        'priority' => 10,
    )
);

$wp_customize->add_setting(
    'newsreach_options[hide_tagline]',
    array(
        'default' => $default_options['hide_tagline'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'newsreach_options[hide_tagline]',
    array(
        'type' => 'checkbox',
        'label' => __( 'Hide Tagline', 'newsreach' ),
        'section' => 'title_tagline',
        'priority' => 10,
    )
);

/*Site title text size*/
$wp_customize->add_setting(
    'newsreach_options[site_title_text_size]',
    array(
        'default' => $default_options['site_title_text_size'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'newsreach_options[site_title_text_size]',
    array(
        'label' => __('Site Title Text Size', 'newsreach'),
        'description' => __('(Default: 24px) Changes\'re only applicable to desktop version.', 'newsreach'),
        'section' => 'title_tagline',
        'type' => 'number',
        'input_attrs' => array('min' => 1, 'max' => 100, 'style' => 'width: 150px;'),
    )
);
$wp_customize->add_setting(
    'newsreach_options[site_tagline_text_size]',
    array(
        'default' => $default_options['site_tagline_text_size'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'newsreach_options[site_tagline_text_size]',
    array(
        'label' => __('Site Tagline Text Size', 'newsreach'),
        'description' => __('(Default: 16px) Changes\'re only applicable to desktop version.', 'newsreach'),
        'section' => 'title_tagline',
        'type' => 'number',
        'input_attrs' => array('min' => 1, 'max' => 100, 'style' => 'width: 150px;'),
    )
);
/**/

/*Add Theme Options Panel.*/
$wp_customize->add_panel(
    'newsreach_option_panel',
    array(
        'title' => __( 'Theme Options', 'newsreach' ),
        'description' => __( 'Contains all theme settings', 'newsreach'),
        'priority' => 200
    )
);
/**/