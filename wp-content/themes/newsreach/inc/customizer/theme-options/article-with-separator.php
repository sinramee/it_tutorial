<?php
/**/
$wp_customize->add_section(
    'article_with_separator_post_section',
    array(
        'title'      => __( 'Article With Separator Post', 'newsreach' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newsreach_options[enable_article_with_separator_post_section]',
    array(
        'default'           => $default_options['enable_article_with_separator_post_section'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_article_with_separator_post_section]',
    array(
        'label'   => __( 'Enable Article With Separator Post Section', 'newsreach' ),
        'section' => 'article_with_separator_post_section',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[article_with_separator_post_title]',
    array(
        'default'           => $default_options['article_with_separator_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[article_with_separator_post_title]',
    array(
        'label'    => __( 'Article With Separator Posts Title', 'newsreach' ),
        'section'  => 'article_with_separator_post_section',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'newsreach_options[select_cat_for_article_with_separator_post]',
    array(
        'default'           => $default_options['select_cat_for_article_with_separator_post'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[select_cat_for_article_with_separator_post]',
    array(
        'label'   => __( 'Choose Article With Separator Post Category', 'newsreach' ),
        'section' => 'article_with_separator_post_section',
            'type'        => 'select',
        'choices'     => newsreach_post_category_list(),
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
        'section' => 'article_with_separator_post_section',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[article_with_separator_bg_color]',
    array(
        'default' => $default_options['article_with_separator_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'newsreach_options[article_with_separator_bg_color]',
        array(
            'label' => __('Background Color', 'newsreach'),
            'section' => 'article_with_separator_post_section',
            'type' => 'color',
        )
    )
);
