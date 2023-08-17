<?php
/**/
$wp_customize->add_section(
    'footer_recommended_post_sectioon',
    array(
        'title'      => __( 'Footer Related Post', 'newsreach' ),
        'panel'      => 'newsreach_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newsreach_options[enable_footer_recommended_post_section]',
    array(
        'default'           => $default_options['enable_footer_recommended_post_section'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_footer_recommended_post_section]',
    array(
        'label'   => __( 'Enable Footer Related Post Section', 'newsreach' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[footer_recommended_post_title]',
    array(
        'default'           => $default_options['footer_recommended_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[footer_recommended_post_title]',
    array(
        'label'    => __( 'Footer Recoommended Posts Title', 'newsreach' ),
        'section'  => 'footer_recommended_post_sectioon',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'newsreach_options[select_cat_for_footer_recommended_post]',
    array(
        'default'           => $default_options['select_cat_for_footer_recommended_post'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[select_cat_for_footer_recommended_post]',
    array(
        'label'   => __( 'Choose Footer Related Post Category', 'newsreach' ),
        'section' => 'footer_recommended_post_sectioon',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
    )
);

$wp_customize->add_setting(
    'newsreach_options[enable_category_meta]',
    array(
        'default'           => $default_options['enable_category_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_category_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'newsreach' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[enable_post_excerpt]',
    array(
        'default'           => $default_options['enable_post_excerpt'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_post_excerpt]',
    array(
        'label'   => __( 'Enable Post Excerpt Meta', 'newsreach' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
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
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[enable_author_meta]',
    array(
        'default'           => $default_options['enable_author_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'newsreach' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);
